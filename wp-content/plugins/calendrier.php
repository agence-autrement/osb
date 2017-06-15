<?php

/*
Plugin Name: Calendrier
*/

/************************
 * Fonctions Globales *
 ************************/




/////DEBUG
ini_set('xdebug.var_display_max_depth', 5);
ini_set('xdebug.var_display_max_children', 256);
ini_set('xdebug.var_display_max_data', 1024);

/////////////////////////////////Fonction de filtre

function array_filter_by_value($my_array, $index, $value)
{
    if(is_array($my_array) && count($my_array)>0)
    {
        foreach(array_keys($my_array) as $key){
            $temp[$key] = $my_array[$key][$index];

            if ($temp[$key] == $value){
                $new_array[$key] = $my_array[$key];
            }
        }
    }
    return $new_array;
};

///////////////////////////////////////////////////


function multi_array_filter_by_value($my_array, $index, $value)
{
    if(is_array($my_array) && count($my_array)>0)
    {
        foreach(array_keys($my_array) as $key){
            $temp[$key] = $my_array[$key][$index];

            if(in_array($value, $temp[$key] )){
                $new_array[$key] = $my_array[$key];
            }
        }
    }
    return $new_array;
};


///////////////////////////////////////////////////


///////////////////////////////// Remove Value from Array

function removeElementWithValue($array, $key, $value)
{
    foreach($array as $subKey => $subArray){
        if($subArray[$key] == $value){
            unset($array[$subKey]);
        }
    }
    return $array;
};




///////////////////////////////// Remove Value inferieur

function removeElementWithInferiorValue($array, $key, $value)
{
    foreach($array as $subKey => $subArray){
        if($subArray[$key] < $value){
            unset($array[$subKey]);
        }
    }
    return $array;
};




///////////////////////////////// Tri par date

function sortByDate($a,$b)
{
    return ($a['date_calendrier'] <= $b['date_calendrier']) ? -1 : 1;
};




///////////////////////////////// Array sans doublon

function unique_multidim_array($array, $key)
{
    $temp_array = array();
    $i          = 0;
    $key_array  = array();

    foreach($array as $val) {
        if (!in_array($val[$key], $key_array)) {
            $key_array[$i]  = $val[$key];
            $temp_array[$i] = $val;
        }
        $i++;
    }
    return $temp_array;
};




///////////////////////////////// Généré Input en remontant le CF lieu

function getInputByLieu()
{
    $args       = array('post_type' => 'spectacles');
    $the_query  = new WP_Query($args);

    if ( $the_query->have_posts() ) {
        $table  = array();
        while ($the_query->have_posts()) {
            $the_query->the_post();
            if( have_rows('representations') ):
                while ( have_rows('representations') ) : the_row();
                   $departement = get_sub_field('departement');
                   array_push($table, array($departement));
                endwhile;
            else :
                // no rows found
            endif;
        };
        $table = unique_multidim_array($table,'0');
        foreach($table as $table_un => $values){
            foreach($values as $value){
                if($value == 22){
                    echo "<button type='submit' class='btn_select btn_droite dpt' name='ville' value='".$value."'>Côtes d'Armor</button>";
                }elseif($value == 29){
                    echo "<button type='submit' class='btn_select btn_droite dpt' name='ville' value='".$value."'>Finistère</button>";
                }elseif($value == 35){
                    echo "<button type='submit' class='btn_select btn_droite dpt' name='ville' value='".$value."'>Ille-et-Vilaine</button>";
                }elseif($value == 56){
                    echo "<button type='submit' class='btn_select btn_droite dpt' name='ville' value='".$value."'>Morbihan</button>";
                }
            };
        };
        wp_reset_postdata();
    };
};




///////////////////////////////// WP_QUERY -> Query ALL DATE

function queryAllDate()
{
    $args       = array('post_type' => 'spectacles',
                        'posts_per_page' => '-1'
                    );
    $the_query  = new WP_Query( $args );

    if( $the_query->have_posts() ){
        $table = array();
        while ( $the_query  ->have_posts() ) {
            $the_query      ->the_post();
            $post_id            = get_the_ID();
            $titre              = get_the_title($post_id);
            $link               = get_the_permalink($post_id);
            $thumbnail          = get_the_post_thumbnail_url($post_id, 'full');
            $type               = get_field('type');
            $thematiques        = get_field('thematiques');
            $festivals          = get_field('festivals');
            $tete_daffiche      = get_field('tete_daffiche');
            $compositeur        = get_field('compositeur');
            $instruments_tag    = get_field('instruments_tag');
            $artistes_tag       = get_field('artistes_tag');
            $image_vignette     = get_field('image_vignette');




            if( have_rows('artistes') ){

                $artistes = array();
                $instruments = array();

                while ( have_rows('artistes') ) : the_row();

                    $artiste        = get_sub_field('artiste');
                    $instrument     = get_sub_field('instrument');
                    array_push($artistes, $artiste);
                    array_push($instruments, $instrument);

                endwhile;
            };

            if( have_rows('representations') ){
                while ( have_rows('representations') ) : the_row();
                    $departement        = get_sub_field('departement');
                    $date               = get_sub_field('date');
                    $lieu               = get_sub_field('lieu');
                    $ville_calendrier   = get_sub_field('ville');
                    $lien_billeterie    = get_sub_field('lien_billeterie');

                    $test = array(
                        'id_calendrier'         => $post_id,
                        'date_calendrier'       => $date,
                        'titre_calendrier'      => $titre,
                        'ville_calendrier'      => $ville_calendrier,
                        'lieu_calendrier'       => $lieu,
                        'thumbnail_calendrier'  => $thumbnail,
                        'link'                  => $link,
                        'departement'           => $departement,
                        'artiste_calendrier'    => $artistes,
                        'thematiques'           => $thematiques,
                        'type'                  => $type,
                        'festivals'             => $festivals,
                        'tete_daffiche'         => $tete_daffiche,
                        'compositeur'           => $compositeur,
                        'instrument'            => $instruments,
                        'instruments_tag'       => $instruments_tag,
                        'artistes_tag'          => $artistes_tag,
                        'image_vignette'        => $image_vignette['url'],
                        'lien_billeterie'       => $lien_billeterie,
                    );

                    array_push($table, $test);

                endwhile;
            };

        };


        usort($table, "sortByDate");
        return $table;
    };
};

///////////////////////////////// Affichage AJAX

function displayAjax( $array )
{
    echo '<div class="contenu_grid">';
    foreach ($array as $table_un => $values) {
        setlocale(LC_ALL, "fr_FR.UTF-8");
        $timestamp = $values['date_calendrier'];
        $translate_Day = strftime('%e', strtotime($timestamp));
        $translate_Month = strftime('%B', strtotime($timestamp));

        if($values['thematiques'] == 'les_essentiels'){
            $btn_color = "bot_date--yellow";
        }elseif($values['thematiques'] == 'nouveaux_horizons'){
            $btn_color = "bot_date--green";
        }else{
            $btn_color = "bot_date--blue";
        }; ?>

        <div class="fiche__item" style="
            background-image: url('<?php echo $values['image_vignette'] ?>');
            background-color: black;
            ">
            <div class="left_date">
                <div class="type type--yellow">
                    <?
                    if($values['thematiques'] == 'les_essentiels'){
                        echo 'Les Essentiels';
                    }elseif($values['thematiques'] == 'nouveaux_horizons'){
                        echo 'Nouveaux Horizons';
                    }elseif($values['thematiques'] == 'taliesin'){
                        echo 'Taliesin';
                    };
                    ?>
                </div>
                <div class="titre"><? echo $values['titre_calendrier']; ?></div>
                <a href="<? the_permalink($values['id_calendrier']) ?>" class="link_calendrier">EN SAVOIR +</a>
            </div>
            <div class="right_date">
                <div class="date_jours">
                    <? if ($translate_Day == '1') {
                        echo $translate_Day;
                        echo "<sup>er</sup>";
                    } else {
                        echo $translate_Day;
                    } ?>
                </div>
                <div class="date_mois"><? echo $translate_Month; ?></div>
                <div class="lieu"><? echo $values['ville_calendrier']; ?></div>
            </div>
            <a class="bot_date <? echo $btn_color; ?>" href="<? the_permalink($values['id_calendrier']) ?>#date" target="_blank">Réserver</a>
        </div>
      <?  }
    echo '</div>';
}


function displayPreFiltre()
{
    $table      = queryAllDate();
    $the_value  = $_GET['type'];
    array_filter_by_value($table, 'type', $the_value);
    displayAjax($table);
}





///////////////////////////////// display all date

function displayAllDate()
{
    $table = queryAllDate();
    displayAjax($table);
    wp_reset_postdata();
}




///////////////////////////////// WP_QUERY -> Spectacle

function queryPosts()
{

    $table          = queryAllDate();
    $delete_if_less = date("Ymd");
    $table          = removeElementWithInferiorValue($table,'date_calendrier',$delete_if_less);
    return $table;

};




///////////////////////////////// Affichage Les Essentiels

function queryEssentiels()
{
    $args       = array('post_type' => 'spectacles',
        'posts_per_page' => '-1'
    );
    $the_query  = new WP_Query( $args );

    if( $the_query  ->  have_posts() ){

        $table = array();

        while ( $the_query  ->have_posts() ) {

            $the_query      ->the_post();

            $post_id            = get_the_ID();
            $titre              = get_the_title($post_id);
            $link               = get_the_permalink($post_id);
            $thumbnail          = get_the_post_thumbnail_url($post_id, 'full');
            $type               = get_field('type');
            $thematiques        = get_field('thematiques');
            $festivals          = get_field('festivals');
            $tete_daffiche      = get_field('tete_daffiche');
            $compositeur        = get_field('compositeur');
            $instruments_tag    = get_field('instruments_tag');
            $artistes_tag       = get_field('artistes_tag');
            $displayHome        = get_field('displayHome');

            if( have_rows('artistes') ){
                $artistes = array();
                $instruments = array();
                while ( have_rows('artistes') ) : the_row();
                    $artiste        = get_sub_field('artiste');
                    $instrument     = get_sub_field('instrument');
                    array_push($artistes, $artiste);
                    array_push($instruments, $instrument);
                endwhile;
            };

            if( have_rows('representations') ){

                $representation = array();

                while ( have_rows('representations') ) : the_row();
                    $departement        = get_sub_field('departement');
                    $date               = get_sub_field('date');
                    $lieu               = get_sub_field('lieu');
                    $ville_calendrier   = get_sub_field('ville');
                    $lien_billeterie    = get_sub_field('lien_billeterie');

                    array_push($representation, array($departement, $date, $lieu, $ville_calendrier));

                endwhile;
            };


            if( have_rows('slides') ){

                while ( have_rows('slides') ) : the_row();
                    $slide        = get_sub_field('image');

                endwhile;
            };

            $test = array(
                'id_calendrier'         => $post_id,
                'date_calendrier'       => $date,
                'titre_calendrier'      => $titre,
                'thumbnail_calendrier'  => $thumbnail,
                'link'                  => $link,
                'artiste_calendrier'    => $artistes,
                'thematiques'           => $thematiques,
                'type'                  => $type,
                'festivals'             => $festivals,
                'tete_daffiche'         => $tete_daffiche,
                'compositeur'           => $compositeur,
                'instrument'            => $instruments,
                'instruments_tag'       => $instruments_tag,
                'artistes_tag'          => $artistes_tag,
                'image_vignette'        => $image_vignette['url'],
                'representation'        => $representation,
                'lien_billeterie'       => $lien_billeterie,
                'image'                 => $slide,
                'displayHome'           => $displayHome,
            );

            array_push($table, $test);
            usort($table, "sortByDate");
        };
        return $table;
    };
};





function displayHomeEventSlide()
{

    $table                  = queryEssentiels();
    $table                  = removeElementWithInferiorValue($table,'date_calendrier',$date_event);
    $clear_table_essentiels = multi_array_filter_by_value($table, 'displayHome', 'affiche');
    $sliced                 = array_slice($clear_table_essentiels, 0, 3);
    ?>

            <? foreach($sliced as $representation => $une_rep){ ?>
            <li>
                <div class="date_slider" style="background-image: url('<? echo $une_rep['image']['url'] ?>');">
                    <div class="ancienne_ul">
                        <? foreach($une_rep['representation'] as $la_date){
                            setlocale(LC_ALL, "fr_FR.UTF-8");
                            $timestamp = $la_date[1];
                            $translate_Day = strftime('%e', strtotime($timestamp));
                            $translate_Month = strftime('%B', strtotime($timestamp)); ?>
                            <div class="date_tr">
                                <div class="jour">
                                    <? if ($translate_Day == '1') {
                                        echo $translate_Day;
                                        echo "<sup>er</sup>";
                                    } else {
                                        echo $translate_Day;
                                    } ?>
                                </div>
                                <div class="mois"><? echo $translate_Month ?></div>
                                <div class="lieu"><? echo $la_date[3] ?></div>
                            </div>
                        <? } ?>
                    </div>
                    <div class="thematique">
                        <?
                        if($une_rep['thematiques'] == 'les_essentiels'){
                            echo 'Les Essentiels';
                        }elseif($une_rep['thematiques'] == 'nouveaux_horizons'){
                            echo 'Nouveaux Horizons';
                        }elseif($une_rep['thematiques'] == 'taliesin'){
                            echo 'Taliesin';
                        };
                        ?>
                    </div>
                    <div class="titre">
                        <? echo $une_rep['titre_calendrier']; ?>
                    </div>
                    <div class="artiste">
                        <? echo $une_rep['artiste_calendrier'][0]; ?>
                    </div>
                    <a class="bot_date <? echo $btn_color; ?>" href="<? the_permalink($une_rep['id_calendrier']) ?>#date" target="_blank">Réserver</a>
                    <a class="savoir_plus" href="<? the_permalink($une_rep['id_calendrier']) ?>">En savoir +</a>
                    <a href="<? echo site_url('saison') ?>" class="toute_rep">Toutes les représentations</a>

                </div>
            </li>
        <? } ?>
    <?
    wp_reset_postdata();
};

///////////////////////////////// Affichage des événements par défault

function resultDateDefault()
{
    $table          = queryAllDate();
    $sliced         = array_slice($table, 0, 3);
    displayAjax($sliced);
    wp_reset_postdata();
};




/************************
 * AJAX *
************************/

///////////////////////////////// Scirpts enqueues
function add_js_scripts()
{
    wp_enqueue_script( 'script', get_template_directory_uri().'/library/js/scripts_calendrier.js', array('jquery'), '1.0', true );

    // pass Ajax Url to script.js
    $dir = plugin_dir_url( __FILE__ )."calendrier/ajax-custom.php";
    wp_localize_script('script', 'ajaxtest', $dir ); //
}




///////////////////////////////// ADD ACTIONS WP

/*JS global*/

add_action('wp_enqueue_scripts', 'add_js_scripts');

/*JS Ajax*/

//Departement
add_action( 'wp_ajax_mon_action', 'mon_action' );
add_action( 'wp_ajax_nopriv_mon_action', 'mon_action' );
//Date
add_action( 'wp_ajax_mon_action_date', 'mon_action_date' );
add_action( 'wp_ajax_nopriv_mon_action_date', 'mon_action_date' );
//Thématique
add_action( 'wp_ajax_mon_action_theme', 'mon_action_theme' );
add_action( 'wp_ajax_nopriv_mon_action_theme', 'mon_action_theme' );
//Type
add_action( 'wp_ajax_mon_action_type', 'mon_action_type' );
add_action( 'wp_ajax_nopriv_mon_action_type', 'mon_action_type' );
//multiFilter
add_action( 'wp_ajax_multiFilter', 'multiFilter' );
add_action( 'wp_ajax_nopriv_multiFilter', 'multiFilter' );
//clear_filter
add_action( 'wp_ajax_clear_filter', 'clear_filter' );
add_action( 'wp_ajax_nopriv_clear_filter', 'clear_filter' );




///////////////////////////////// Affichage des postes filtré par département

function mon_action()
{
    global $_POST;
    $ville          = $_POST['ville'];
    $table          = queryAllDate();
    $clear_table    = array_filter_by_value($table,'departement', $ville );
    $count          = count($clear_table);

    if($count == 0){
        $table_zero         = removeElementWithInferiorValue($table,'date_calendrier',$delete_if_less);
        $sliced             = array_slice($table_zero, 0, 3);
    }elseif($count > 3){
        $sliced             = array_slice($clear_table, 0, 3);
    }elseif($count < 3) {
        $array_merge_value  = removeElementWithValue($table, 'departement', $ville);
        $clear_array_to_add = removeElementWithInferiorValue($array_merge_value, 'date_calendrier', $delete_if_less);
        $merge              = array_merge($clear_table, $clear_array_to_add);
        $sliced             = array_slice($merge, 0, 3);
    }else{
        $sliced = $clear_table;
    };

    displayAjax($sliced);

    wp_reset_postdata();
};




///////////////////////////////// Affichage des postes filtré par date

function mon_action_date()
{
    global $_POST;
    $date_event     = $_POST['date'];
    $table          = queryAllDate();
    $clear_table    = array_filter_by_value($table,'date_calendrier', $date_event );
    $count          = count($clear_table);

    if($count == 0){
        $table_zero         = removeElementWithInferiorValue($table,'date_calendrier',$date_event);
        $sliced             = array_slice($table_zero, 0, 3);
    }elseif($count > 3){
        $sliced             = array_slice($clear_table, 0, 3);
    }elseif($count < 3){
        $array_merge_value  = removeElementWithValue($table, 'date_calendrier', $date_event);
        $clear_array_to_add = removeElementWithInferiorValue($array_merge_value,'date_calendrier',$date_event);
        $merge              = array_merge($clear_table, $clear_array_to_add);
        $sliced             = array_slice($merge, 0, 3);
    }else{
        $sliced = $clear_table;
    };

    displayAjax($sliced);

    wp_reset_postdata();
};




///////////////////////////////// Affichage des postes filtré par Thématiques

function mon_action_theme()
{
    global $_POST;
    $theme_event    = $_POST['theme'];
    $table          = queryPosts();
    $clear_table    = array_filter_by_value($table,'thematiques', $theme_event );
    $count          = count($clear_table);

    if($count == 0){
        $table_zero         = removeElementWithInferiorValue($table,'date_calendrier',$delete_if_less);
        $sliced             = array_slice($table_zero, 0, 3);
    }elseif($count > 3){
        $sliced             = array_slice($clear_table, 0, 3);
    }elseif($count < 3){
        $array_merge_value  = removeElementWithValue($table, 'thematiques', $theme_event);
        $clear_array_to_add = removeElementWithInferiorValue($array_merge_value,'date_calendrier',$delete_if_less);
        $merge              = array_merge($clear_table, $clear_array_to_add);
        $sliced             = array_slice($merge, 0, 3);
    }else{
        $sliced = $clear_table;
    };

    displayAjax($sliced);

    wp_reset_postdata();
};




///////////////////////////////// Affichage des postes filtré par Type

function mon_action_type()
{
    global $_POST;
    $type_event     = $_POST['type'];
    $table          = queryPosts();
    $clear_table    = array_filter_by_value($table,'type', $type_event );
    $count          = count($clear_table);

    if($count == 0){
        $table_zero         = removeElementWithInferiorValue($table,'date_calendrier',$delete_if_less);
        $sliced             = array_slice($table_zero, 0, 3);
    }elseif($count > 3){
        $sliced             = array_slice($clear_table, 0, 3);
    }elseif($count < 3){
        $array_merge_value  = removeElementWithValue($table, 'type', $type_event);
        $clear_array_to_add = removeElementWithInferiorValue($array_merge_value,'date_calendrier',$delete_if_less);
        $merge              = array_merge($clear_table, $clear_array_to_add);
        $sliced             = array_slice($merge, 0, 3);
    }else{
        $sliced = $clear_table;
    };

    displayAjax($sliced);

    wp_reset_postdata();
};




///////////////////////////////// MULTIFILTRE

function multiFilter()
{
    global $_POST;
    $key_to_filter          = $_POST['filter'];
    $table                  = queryAllDate();

    parse_str($key_to_filter, $result_table);

    $lieu_filtre            = $result_table['departement'];
    $type_filtre            = $result_table['type'];
    $instrument_filtre      = $result_table['instruments_tag'];
    $thematiques_filtre     = $result_table['thematiques'];
    $compositeur_filtre     = $result_table['compositeur'];
    $artiste_filtre         = $result_table['artistes_tag'];
    $date_filtre            = $result_table['date_calendrier'];

    /////////// Type
    if($type_filtre != '' && $lieu_filtre == '' && $instrument_filtre == '' && $thematiques_filtre == '' && $compositeur_filtre == '' && $artiste_filtre == '' && $date_filtre == '') {

        $clear_table_final      = array_filter_by_value($table, 'type', $type_filtre);

    }

    /////////// Lieu
    elseif($lieu_filtre != '' && $type_filtre == '' && $instrument_filtre == '' && $thematiques_filtre == '' && $compositeur_filtre == '' && $artiste_filtre == '' && $date_filtre == '') {

        $clear_table_final      = array_filter_by_value($table, 'departement', $lieu_filtre);

    }

    /////////// Instrument
    elseif($instrument_filtre != '' && $lieu_filtre == '' && $type_filtre == '' && $thematiques_filtre == '' && $compositeur_filtre == '' && $artiste_filtre == '' && $date_filtre == '') {

        $clear_table_final      = multi_array_filter_by_value($table, 'instruments_tag', $instrument_filtre);

    }

    /////////// Thématique
    elseif($thematiques_filtre != '' && $lieu_filtre == '' && $instrument_filtre == '' && $type_filtre == '' && $compositeur_filtre == '' && $artiste_filtre == '' && $date_filtre == '') {

        $clear_table_final      = array_filter_by_value($table, 'thematiques', $thematiques_filtre);

    }

    /////////// Compositeur
    elseif($compositeur_filtre != '' && $lieu_filtre == '' && $instrument_filtre == '' && $thematiques_filtre == '' && $type_filtre == '' && $artiste_filtre == '' && $date_filtre == '') {

        $clear_table_final      = multi_array_filter_by_value($table, 'compositeur', $compositeur_filtre);

    }

    /////////// artiste
    elseif($artiste_filtre != '' && $lieu_filtre == '' && $instrument_filtre == '' && $thematiques_filtre == '' && $compositeur_filtre == '' && $type_filtre == '' && $date_filtre == '') {

        $clear_table_final      = multi_array_filter_by_value($table, 'artistes_tag', $artiste_filtre);

    }

    /////////// Date
    elseif($date_filtre != '' && $lieu_filtre == '' && $instrument_filtre == '' && $thematiques_filtre == '' && $compositeur_filtre == '' && $artiste_filtre == '' && $type_filtre == '') {

        $clear_table_final      = array_filter_by_value($table, 'date_calendrier', $date_filtre);

    }


    /********************************
    DEUX CONDITIONS DE FILTRE
    ********************************/



    //type + instrument
    elseif($type_filtre != '' && $lieu_filtre == '' && $instrument_filtre != '' && $thematiques_filtre == '' && $compositeur_filtre == '' && $artiste_filtre == '' && $date_filtre == ''){

        $clear_table_type       = array_filter_by_value($table,'type', $type_filtre );

        $clear_table_final      = multi_array_filter_by_value($clear_table_type, 'instruments_tag', $instrument_filtre);

    }

    //type + lieu
    elseif($type_filtre != '' && $lieu_filtre != '' && $instrument_filtre == '' && $thematiques_filtre == '' && $compositeur_filtre == '' && $artiste_filtre == '' && $date_filtre == ''){

        $clear_table_type       = array_filter_by_value($table,'type', $type_filtre );

        $clear_table_final      = array_filter_by_value($clear_table_type, 'departement', $lieu_filtre);

    }


    //type + thematiques
    elseif($type_filtre != '' && $lieu_filtre == '' && $instrument_filtre == '' && $thematiques_filtre != '' && $compositeur_filtre == '' && $artiste_filtre == '' && $date_filtre == ''){

        $clear_table_type       = array_filter_by_value($table,'type', $type_filtre );

        $clear_table_final      = array_filter_by_value($clear_table_type, 'thematiques', $thematiques_filtre);

    }

    //type + compositeur
    elseif($type_filtre != '' && $lieu_filtre == '' && $instrument_filtre == '' && $thematiques_filtre == '' && $compositeur_filtre != '' && $artiste_filtre == '' && $date_filtre == ''){

        $clear_table_type       = array_filter_by_value($table,'type', $type_filtre );

        $clear_table_final      = multi_array_filter_by_value($clear_table_type, 'compositeur', $compositeur_filtre);

    }

    //type + artiste
    elseif($type_filtre != '' && $lieu_filtre == '' && $instrument_filtre == '' && $thematiques_filtre == '' && $compositeur_filtre == '' && $artiste_filtre != '' && $date_filtre == ''){

        $clear_table_type       = array_filter_by_value($table,'type', $type_filtre );

        $clear_table_final      = multi_array_filter_by_value($clear_table_type, 'artistes_tag', $artiste_filtre);

    }

    //type + date
    elseif($type_filtre != '' && $lieu_filtre == '' && $instrument_filtre == '' && $thematiques_filtre == '' && $compositeur_filtre == '' && $artiste_filtre == '' && $date_filtre != ''){

        $clear_table_type       = array_filter_by_value($table,'type', $type_filtre );

        $clear_table_final      = array_filter_by_value($clear_table_type, 'date_calendrier', $date_filtre);

    }

    //lieu + instrument
    elseif($type_filtre == '' && $lieu_filtre != '' && $instrument_filtre != '' && $thematiques_filtre == '' && $compositeur_filtre == '' && $artiste_filtre == '' && $date_filtre == ''){

        $clear_table_lieu       = array_filter_by_value($table,'departement', $lieu_filtre );

        $clear_table_final      = multi_array_filter_by_value($clear_table_lieu, 'instruments_tag', $instrument_filtre);

    }

    //lieu + thematiques
    elseif($type_filtre == '' && $lieu_filtre != '' && $instrument_filtre == '' && $thematiques_filtre != '' && $compositeur_filtre == '' && $artiste_filtre == '' && $date_filtre == ''){

        $clear_table_lieu       = array_filter_by_value($table,'departement', $lieu_filtre );

        $clear_table_final      = array_filter_by_value($clear_table_lieu, 'thematiques', $thematiques_filtre);

    }

    //lieu + compositeur
    elseif($type_filtre == '' && $lieu_filtre != '' && $instrument_filtre == '' && $thematiques_filtre == '' && $compositeur_filtre != '' && $artiste_filtre == '' && $date_filtre == ''){

        $clear_table_lieu       = array_filter_by_value($table,'departement', $lieu_filtre );

        $clear_table_final      = multi_array_filter_by_value($clear_table_lieu, 'compositeur', $compositeur_filtre);

    }

    //lieu + artiste
    elseif($type_filtre == '' && $lieu_filtre != '' && $instrument_filtre == '' && $thematiques_filtre == '' && $compositeur_filtre == '' && $artiste_filtre != '' && $date_filtre == ''){

        $clear_table_lieu       = array_filter_by_value($table,'departement', $lieu_filtre );

        $clear_table_final      = multi_array_filter_by_value($clear_table_lieu, 'artistes_calendrier', $artiste_filtre);

    }

    //lieu + date
    elseif($type_filtre == '' && $lieu_filtre != '' && $instrument_filtre == '' && $thematiques_filtre == '' && $compositeur_filtre == '' && $artiste_filtre == '' && $date_filtre != ''){

        $clear_table_lieu       = array_filter_by_value($table,'departement', $lieu_filtre );

        $clear_table_final      = array_filter_by_value($clear_table_lieu, 'date_calendrier', $date_filtre);

    }

    //instrument + thematiques
    elseif($type_filtre == '' && $lieu_filtre == '' && $instrument_filtre != '' && $thematiques_filtre != '' && $compositeur_filtre == '' && $artiste_filtre == '' && $date_filtre == ''){

        $clear_table_instrument     = multi_array_filter_by_value($table, 'instruments_tag', $instrument_filtre);

        $clear_table_final          = array_filter_by_value($clear_table_instrument, 'thematiques', $thematiques_filtre);

    }

    //instrument + compositeur
    elseif($type_filtre == '' && $lieu_filtre == '' && $instrument_filtre != '' && $thematiques_filtre == '' && $compositeur_filtre != '' && $artiste_filtre == '' && $date_filtre == ''){

        $clear_table_instrument     = multi_array_filter_by_value($table, 'instruments_tag', $instrument_filtre);

        $clear_table_final          = multi_array_filter_by_value($clear_table_instrument, 'compositeur', $compositeur_filtre);

    }

    //instrument + artiste
    elseif($type_filtre == '' && $lieu_filtre == '' && $instrument_filtre != '' && $thematiques_filtre == '' && $compositeur_filtre == '' && $artiste_filtre != '' && $date_filtre == ''){

        $clear_table_instrument     = multi_array_filter_by_value($table, 'instruments_tag', $instrument_filtre);

        $clear_table_final          = multi_array_filter_by_value($clear_table_instrument, 'artistes_tag', $artiste_filtre);

    }

    //instrument + date
    elseif($type_filtre == '' && $lieu_filtre == '' && $instrument_filtre == '' && $thematiques_filtre == '' && $compositeur_filtre == '' && $artiste_filtre == '' && $date_filtre != ''){

        $clear_table_instrument     = multi_array_filter_by_value($table, 'instruments_tag', $instrument_filtre);

        $clear_table_final          = array_filter_by_value($clear_table_instrument, 'date_calendrier', $date_filtre);

    }

    //thematiques + compositeur
    elseif($type_filtre == '' && $lieu_filtre == '' && $instrument_filtre == '' && $thematiques_filtre != '' && $compositeur_filtre != '' && $artiste_filtre == '' && $date_filtre == ''){

        $clear_table_thematiques      = array_filter_by_value($table, 'thematiques', $thematiques_filtre);

        $clear_table_final            = multi_array_filter_by_value($clear_table_thematiques, 'compositeur', $compositeur_filtre);

    }

    //thematiques + artiste
    elseif($type_filtre == '' && $lieu_filtre == '' && $instrument_filtre == '' && $thematiques_filtre != '' && $compositeur_filtre == '' && $artiste_filtre != '' && $date_filtre == ''){

        $clear_table_thematiques      = array_filter_by_value($table, 'thematiques', $thematiques_filtre);

        $clear_table_final            = multi_array_filter_by_value($clear_table_thematiques, 'artistes_tag', $artiste_filtre);

    }

    //thematiques + date
    elseif($type_filtre == '' && $lieu_filtre == '' && $instrument_filtre == '' && $thematiques_filtre != '' && $compositeur_filtre == '' && $artiste_filtre == '' && $date_filtre != ''){

        $clear_table_thematiques      = array_filter_by_value($table, 'thematiques', $thematiques_filtre);

        $clear_table_final            = array_filter_by_value($clear_table_thematiques, 'date_calendrier', $date_filtre);

    }

    //compositeur + artiste
    elseif($type_filtre == '' && $lieu_filtre == '' && $instrument_filtre == '' && $thematiques_filtre == '' && $compositeur_filtre != '' && $artiste_filtre != '' && $date_filtre == ''){

        $clear_table_compositeur     = multi_array_filter_by_value($table, 'compositeur', $compositeur_filtre);

        $clear_table_final           = multi_array_filter_by_value($clear_table_compositeur, 'artistes_tag', $artiste_filtre);

    }

    //compositeur + date
    elseif($type_filtre == '' && $lieu_filtre == '' && $instrument_filtre == '' && $thematiques_filtre == '' && $compositeur_filtre == '' && $artiste_filtre == '' && $date_filtre != ''){

        $clear_table_compositeur     = multi_array_filter_by_value($table, 'compositeur', $compositeur_filtre);

        $clear_table_final           = array_filter_by_value($clear_table_compositeur, 'date_calendrier', $date_filtre);

    }

    //artiste + date
    elseif($type_filtre == '' && $lieu_filtre == '' && $instrument_filtre == '' && $thematiques_filtre == '' && $compositeur_filtre == '' && $artiste_filtre == '' && $date_filtre != ''){

        $clear_table_artiste      = multi_array_filter_by_value($table, 'artistes_tag', $artiste_filtre);

        $clear_table_final        = array_filter_by_value($clear_table_artiste, 'date_calendrier', $date_filtre);

    }


    /********************************
    TROIS CONDITIONS DE FILTRE
    ********************************/


    //type + lieu + instrument
    elseif($type_filtre != '' && $lieu_filtre != '' && $instrument_filtre != '' && $thematiques_filtre == '' && $compositeur_filtre == '' && $artiste_filtre == '' && $date_filtre == ''){

        $clear_table_type       = array_filter_by_value($table,'type', $type_filtre );

        $clear_table_lieu       = array_filter_by_value($clear_table_type, 'departement', $lieu_filtre);

        $clear_table_final      = multi_array_filter_by_value($clear_table_lieu, 'instruments_tag', $instrument_filtre);

    }

    //type + lieu + thematiques
    elseif($type_filtre != '' && $lieu_filtre != '' && $instrument_filtre == '' && $thematiques_filtre != '' && $compositeur_filtre == '' && $artiste_filtre == '' && $date_filtre == ''){

        $clear_table_type       = array_filter_by_value($table,'type', $type_filtre );

        $clear_table_lieu       = array_filter_by_value($clear_table_type, 'departement', $lieu_filtre);

        $clear_table_final      = array_filter_by_value($clear_table_lieu, 'thematiques', $thematiques_filtre);

    }

    //type + lieu + compositeur
    elseif($type_filtre != '' && $lieu_filtre != '' && $instrument_filtre == '' && $thematiques_filtre == '' && $compositeur_filtre != '' && $artiste_filtre == '' && $date_filtre == ''){

        $clear_table_type       = array_filter_by_value($table,'type', $type_filtre );

        $clear_table_lieu       = array_filter_by_value($clear_table_type, 'departement', $lieu_filtre);

        $clear_table_final      = multi_array_filter_by_value($clear_table_lieu, 'compositeur', $compositeur_filtre);

    }

    //type + lieu + artiste
    elseif($type_filtre != '' && $lieu_filtre != '' && $instrument_filtre == '' && $thematiques_filtre == '' && $compositeur_filtre == '' && $artiste_filtre != '' && $date_filtre == ''){

        $clear_table_type       = array_filter_by_value($table,'type', $type_filtre );

        $clear_table_lieu       = array_filter_by_value($clear_table_type, 'departement', $lieu_filtre);

        $clear_table_final      = multi_array_filter_by_value($clear_table_lieu, 'artistes_tag', $artiste_filtre);

    }

    //type + lieu + date
    elseif($type_filtre != '' && $lieu_filtre != '' && $instrument_filtre == '' && $thematiques_filtre == '' && $compositeur_filtre == '' && $artiste_filtre == '' && $date_filtre != ''){

        $clear_table_type       = array_filter_by_value($table,'type', $type_filtre );

        $clear_table_lieu       = array_filter_by_value($clear_table_type, 'departement', $lieu_filtre);

        $clear_table_final      = array_filter_by_value($clear_table_lieu, 'date_calendrier', $date_filtre);

    }

    //type + instrument + thematiques
    elseif($type_filtre != '' && $lieu_filtre == '' && $instrument_filtre != '' && $thematiques_filtre != '' && $compositeur_filtre == '' && $artiste_filtre == '' && $date_filtre == ''){

        $clear_table_thematiques    = array_filter_by_value($table, 'thematiques', $thematiques_filtre);

        $clear_table_type           = array_filter_by_value($clear_table_thematiques,'type', $type_filtre );

        $clear_table_final          = multi_array_filter_by_value($clear_table_type, 'instruments_tag', $instrument_filtre);

    }

    //type + instrument + compositeur
    elseif($type_filtre != '' && $lieu_filtre == '' && $instrument_filtre != '' && $thematiques_filtre == '' && $compositeur_filtre != '' && $artiste_filtre == '' && $date_filtre == ''){

        $clear_table_compositeur    = multi_array_filter_by_value($table, 'compositeur', $compositeur_filtre);

        $clear_table_type           = array_filter_by_value($clear_table_compositeur,'type', $type_filtre );

        $clear_table_final          = multi_array_filter_by_value($clear_table_type, 'instruments_tag', $instrument_filtre);

    }

    //type + instrument + artiste
    elseif($type_filtre != '' && $lieu_filtre == '' && $instrument_filtre != '' && $thematiques_filtre == '' && $compositeur_filtre == '' && $artiste_filtre != '' && $date_filtre == ''){

        $clear_table_artiste    = multi_array_filter_by_value($table, 'artistes_tag', $artiste_filtre);

        $clear_table_type       = array_filter_by_value($clear_table_artiste,'type', $type_filtre );

        $clear_table_final      = multi_array_filter_by_value($clear_table_type, 'instruments_tag', $instrument_filtre);

    }

    //type + instrument + date
    elseif($type_filtre != '' && $lieu_filtre == '' && $instrument_filtre != '' && $thematiques_filtre == '' && $compositeur_filtre == '' && $artiste_filtre == '' && $date_filtre != ''){

        $clear_table_date       = array_filter_by_value($table, 'date_calendrier', $date_filtre);

        $clear_table_type       = array_filter_by_value($clear_table_date,'type', $type_filtre );

        $clear_table_final      = multi_array_filter_by_value($clear_table_type, 'instruments_tag', $instrument_filtre);

    }

    //type + thématique + compositeur
    elseif($type_filtre != '' && $lieu_filtre == '' && $instrument_filtre == '' && $thematiques_filtre != '' && $compositeur_filtre != '' && $artiste_filtre == '' && $date_filtre == ''){

        $clear_table_type           = array_filter_by_value($table, 'type', $type_filtre);

        $clear_table_thematiques    = array_filter_by_value($clear_table_type, 'thematiques', $thematiques_filtre);

        $clear_table_final          = multi_array_filter_by_value($clear_table_thematiques,'compositeur', $compositeur_filtre );

    }

    //type + thématique + artiste
    elseif($type_filtre != '' && $lieu_filtre == '' && $instrument_filtre == '' && $thematiques_filtre != '' && $compositeur_filtre == '' && $artiste_filtre != '' && $date_filtre == ''){

        $clear_table_type       = array_filter_by_value($table, 'type', $type_filtre);

        $clear_table_thematiques = array_filter_by_value($clear_table_type, 'thematiques', $thematiques_filtre);

        $clear_table_final      = multi_array_filter_by_value($clear_table_thematiques,'artistes_tag', $artiste_filtre );

    }

    //type + thématique + date
    elseif($type_filtre != '' && $lieu_filtre == '' && $instrument_filtre == '' && $thematiques_filtre != '' && $compositeur_filtre == '' && $artiste_filtre == '' && $date_filtre != ''){

        $clear_table_type       = array_filter_by_value($table, 'type', $type_filtre);

        $clear_table_thematiques = array_filter_by_value($clear_table_type, 'thematiques', $thematiques_filtre);

        $clear_table_final      = multi_array_filter_by_value($clear_table_thematiques,'artistes_tag', $artiste_filtre );

    }

    //type + compositeur + artiste
    elseif($type_filtre != '' && $lieu_filtre == '' && $instrument_filtre == '' && $thematiques_filtre == '' && $compositeur_filtre != '' && $artiste_filtre != '' && $date_filtre == ''){

        $clear_table_type       = array_filter_by_value($table, 'type', $type_filtre);

        $clear_table_compositeur= multi_array_filter_by_value($clear_table_type, 'compositeur', $compositeur_filtre);

        $clear_table_final      = array_filter_by_value($clear_table_compositeur,'date_calendrier', $date_filtre );

    }

    //type + compositeur + date
    elseif($type_filtre != '' && $lieu_filtre == '' && $instrument_filtre == '' && $thematiques_filtre == '' && $compositeur_filtre != '' && $artiste_filtre == '' && $date_filtre != ''){

        $clear_table_type       = array_filter_by_value($table, 'type', $type_filtre);

        $clear_table_compositeur= multi_array_filter_by_value($clear_table_type, 'compositeur', $compositeur_filtre);

        $clear_table_final      = array_filter_by_value($clear_table_compositeur,'date_calendrier', $date_filtre );

    }

    //type + artiste + date
    elseif($type_filtre != '' && $lieu_filtre == '' && $instrument_filtre == '' && $thematiques_filtre == '' && $compositeur_filtre == '' && $artiste_filtre != '' && $date_filtre != ''){

        $clear_table_type       = array_filter_by_value($table, 'type', $type_filtre);

        $clear_table_artiste    = multi_array_filter_by_value($clear_table_type, 'artsite_calendrier', $artiste_filtre);

        $clear_table_final      = array_filter_by_value($clear_table_artiste,'date_calendrier', $date_filtre );

    }

    //lieu + instru + theme
    elseif($type_filtre == '' && $lieu_filtre != '' && $instrument_filtre != '' && $thematiques_filtre != '' && $compositeur_filtre == '' && $artiste_filtre == '' && $date_filtre == ''){

        $clear_table_lieu           = array_filter_by_value($table, 'departement', $lieu_filtre);

        $clear_table_instrument     = multi_array_filter_by_value($clear_table_lieu, 'instruments_tag', $instrument_filtre);

        $clear_table_final          = array_filter_by_value($clear_table_instrument,'thematiques', $thematiques_filtre );

    }

    //lieu + instru + comp
    elseif($type_filtre == '' && $lieu_filtre != '' && $instrument_filtre != '' && $thematiques_filtre == '' && $compositeur_filtre != '' && $artiste_filtre == '' && $date_filtre == ''){

        $clear_table_lieu           = array_filter_by_value($table, 'departement', $lieu_filtre);

        $clear_table_instrument     = multi_array_filter_by_value($clear_table_lieu, 'instruments_tag', $instrument_filtre);

        $clear_table_final          = multi_array_filter_by_value($clear_table_instrument,'compositeur', $compositeur_filtre );

    }

    //lieu + instru + artiste
    elseif($type_filtre == '' && $lieu_filtre != '' && $instrument_filtre != '' && $thematiques_filtre == '' && $compositeur_filtre == '' && $artiste_filtre != '' && $date_filtre == ''){

        $clear_table_lieu           = array_filter_by_value($table, 'departement', $lieu_filtre);

        $clear_table_instrument     = multi_array_filter_by_value($clear_table_lieu, 'instruments_tag', $instrument_filtre);

        $clear_table_final          = multi_array_filter_by_value($clear_table_instrument,'artistes_tag', $artiste_filtre);

    }

    //lieu + instru + date
    elseif($type_filtre == '' && $lieu_filtre != '' && $instrument_filtre != '' && $thematiques_filtre == '' && $compositeur_filtre == '' && $artiste_filtre == '' && $date_filtre != ''){

        $clear_table_lieu           = array_filter_by_value($table, 'departement', $lieu_filtre);

        $clear_table_instrument     = multi_array_filter_by_value($clear_table_lieu, 'instruments_tag', $instrument_filtre);

        $clear_table_final          = array_filter_by_value($clear_table_instrument,'date_calendrier', $date_filtre);

    }

    //lieu + thematiques + compositeur
    elseif($type_filtre == '' && $lieu_filtre != '' && $instrument_filtre == '' && $thematiques_filtre != '' && $compositeur_filtre != '' && $artiste_filtre == '' && $date_filtre == ''){

        $clear_table_lieu           = array_filter_by_value($table, 'departement', $lieu_filtre);

        $clear_table_thematiques    = array_filter_by_value($clear_table_lieu, 'thematiques', $thematiques_filtre);

        $clear_table_final          = multi_array_filter_by_value($clear_table_thematiques,'compositeur', $compositeur_filtre);

    }

    //lieu + thematiques + artiste
    elseif($type_filtre == '' && $lieu_filtre != '' && $instrument_filtre == '' && $thematiques_filtre != '' && $compositeur_filtre == '' && $artiste_filtre != '' && $date_filtre == ''){

        $clear_table_lieu           = array_filter_by_value($table, 'departement', $lieu_filtre);

        $clear_table_thematiques    = array_filter_by_value($clear_table_lieu, 'thematiques', $thematiques_filtre);

        $clear_table_final          = multi_array_filter_by_value($clear_table_thematiques,'artistes_tag', $artiste_filtre);

    }

    //lieu + thematiques + date
    elseif($type_filtre == '' && $lieu_filtre != '' && $instrument_filtre == '' && $thematiques_filtre != '' && $compositeur_filtre == '' && $artiste_filtre == '' && $date_filtre != ''){

        $clear_table_lieu           = array_filter_by_value($table, 'departement', $lieu_filtre);

        $clear_table_thematiques    = array_filter_by_value($clear_table_lieu, 'thematiques', $thematiques_filtre);

        $clear_table_final          = array_filter_by_value($clear_table_thematiques,'date_calendrier', $date_filtre);

    }

    //lieu + comp + artiste
    elseif($type_filtre == '' && $lieu_filtre != '' && $instrument_filtre == '' && $thematiques_filtre == '' && $compositeur_filtre != '' && $artiste_filtre != '' && $date_filtre == ''){

        $clear_table_lieu           = array_filter_by_value($table, 'departement', $lieu_filtre);

        $clear_table_compositeur    = multi_array_filter_by_value($clear_table_lieu,'compositeur', $artiste_filtre);

        $clear_table_final          = multi_array_filter_by_value($clear_table_compositeur,'artistes_tag', $artiste_filtre);

    }

    //lieu + comp + date
    elseif($type_filtre == '' && $lieu_filtre != '' && $instrument_filtre == '' && $thematiques_filtre == '' && $compositeur_filtre != '' && $artiste_filtre == '' && $date_filtre != ''){

        $clear_table_lieu           = array_filter_by_value($table, 'departement', $lieu_filtre);

        $clear_table_compositeur    = multi_array_filter_by_value($clear_table_lieu,'compositeur', $artiste_filtre);

        $clear_table_final          = multi_array_filter_by_value($clear_table_compositeur,'date_calendrier', $date_filtre);

    }

    //lieu + artiste + date
    elseif($type_filtre == '' && $lieu_filtre != '' && $instrument_filtre == '' && $thematiques_filtre == '' && $compositeur_filtre == '' && $artiste_filtre != '' && $date_filtre != ''){

        $clear_table_lieu           = array_filter_by_value($table, 'departement', $lieu_filtre);

        $clear_table_artiste        = multi_array_filter_by_value($clear_table_lieu,'artistes_tag', $artiste_filtre);

        $clear_table_final          = multi_array_filter_by_value($clear_table_artiste,'date_calendrier', $date_filtre);

    }

    //instrument + theme + compositeur
    elseif($type_filtre == '' && $lieu_filtre == '' && $instrument_filtre != '' && $thematiques_filtre != '' && $compositeur_filtre != '' && $artiste_filtre == '' && $date_filtre == ''){

        $clear_table_instrument     = multi_array_filter_by_value($table, 'instruments_tag', $instrument_filtre);

        $clear_table_thematiques    = array_filter_by_value($clear_table_instrument,'thematiques', $thematiques_filtre);

        $clear_table_final          = multi_array_filter_by_value($clear_table_thematiques,'compositeur', $compositeur_filtre);

    }

    //instrument + theme + artiste
    elseif($type_filtre == '' && $lieu_filtre == '' && $instrument_filtre != '' && $thematiques_filtre != '' && $compositeur_filtre == '' && $artiste_filtre != '' && $date_filtre == ''){

        $clear_table_instrument     = multi_array_filter_by_value($table, 'instruments_tag', $instrument_filtre);

        $clear_table_thematiques    = array_filter_by_value($clear_table_instrument,'thematiques', $thematiques_filtre);

        $clear_table_final          = multi_array_filter_by_value($clear_table_thematiques,'artistes_tag', $artiste_filtre);

    }

    //instrument + theme + date
    elseif($type_filtre == '' && $lieu_filtre == '' && $instrument_filtre != '' && $thematiques_filtre != '' && $compositeur_filtre == '' && $artiste_filtre == '' && $date_filtre != ''){

        $clear_table_instrument     = multi_array_filter_by_value($table, 'instruments_tag', $instrument_filtre);

        $clear_table_thematiques    = array_filter_by_value($clear_table_instrument,'thematiques', $thematiques_filtre);

        $clear_table_final          = array_filter_by_value($clear_table_thematiques,'date_calendrier', $date_filtre);

    }

    //instrument + comp + artiste
    elseif($type_filtre == '' && $lieu_filtre == '' && $instrument_filtre != '' && $thematiques_filtre == '' && $compositeur_filtre != '' && $artiste_filtre != '' && $date_filtre == ''){

        $clear_table_instrument     = multi_array_filter_by_value($table, 'instruments_tag', $instrument_filtre);

        $clear_table_compositeur    = multi_array_filter_by_value($clear_table_instrument,'compositeur', $compositeur_filtre);

        $clear_table_final          = multi_array_filter_by_value($clear_table_compositeur,'artistes_tag', $artiste_filtre);

    }

    //instrument + comp + date
    elseif($type_filtre == '' && $lieu_filtre == '' && $instrument_filtre != '' && $thematiques_filtre == '' && $compositeur_filtre != '' && $artiste_filtre == '' && $date_filtre != ''){

        $clear_table_instrument     = multi_array_filter_by_value($table, 'instruments_tag', $instrument_filtre);

        $clear_table_compositeur    = multi_array_filter_by_value($clear_table_instrument,'compositeur', $compositeur_filtre);

        $clear_table_final          = array_filter_by_value($clear_table_compositeur,'date_calendrier', $date_filtre);

    }

    //instrument + artiste + date
    elseif($type_filtre == '' && $lieu_filtre == '' && $instrument_filtre != '' && $thematiques_filtre == '' && $compositeur_filtre == '' && $artiste_filtre != '' && $date_filtre != ''){

        $clear_table_instrument     = multi_array_filter_by_value($table, 'instruments_tag', $instrument_filtre);

        $clear_table_artiste        = multi_array_filter_by_value($clear_table_instrument,'artsite_calendrier', $artiste_filtre);

        $clear_table_final          = array_filter_by_value($clear_table_artiste,'date_calendrier', $date_filtre);

    }

    //thematiques + compositeur + artiste
    elseif($type_filtre == '' && $lieu_filtre == '' && $instrument_filtre == '' && $thematiques_filtre != '' && $compositeur_filtre != '' && $artiste_filtre != '' && $date_filtre == ''){

        $clear_table_thematiques    = array_filter_by_value($table,'thematiques', $thematiques_filtre);

        $clear_table_compositeur    = multi_array_filter_by_value($clear_table_thematiques,'compositeur', $compositeur_filtre);

        $clear_table_final          = multi_array_filter_by_value($clear_table_compositeur,'artistes_tag', $artiste_filtre);

    }

    //thematiques + compositeur + date
    elseif($type_filtre == '' && $lieu_filtre == '' && $instrument_filtre == '' && $thematiques_filtre != '' && $compositeur_filtre != '' && $artiste_filtre = '' && $date_filtre != ''){

        $clear_table_thematiques    = array_filter_by_value($table,'thematiques', $thematiques_filtre);

        $clear_table_compositeur    = multi_array_filter_by_value($clear_table_thematiques,'compositeur', $compositeur_filtre);

        $clear_table_final          = array_filter_by_value($clear_table_compositeur,'date_calendrier', $date_filtre);

    }

    //thematiques + artiste + date
    elseif($type_filtre == '' && $lieu_filtre == '' && $instrument_filtre == '' && $thematiques_filtre != '' && $compositeur_filtre != '' && $artiste_filtre = '' && $date_filtre != ''){

        $clear_table_thematiques    = array_filter_by_value($table,'thematiques', $thematiques_filtre);

        $clear_table_artiste        = multi_array_filter_by_value($clear_table_thematiques,'artistes_tag', $artiste_filtre);

        $clear_table_final          = array_filter_by_value($clear_table_artiste,'date_calendrier', $date_filtre);

    }

    //compositeur + artiste + date
    elseif($type_filtre == '' && $lieu_filtre == '' && $instrument_filtre == '' && $thematiques_filtre != '' && $compositeur_filtre != '' && $artiste_filtre = '' && $date_filtre != ''){

        $clear_table_compositeur    = multi_array_filter_by_value($table,'compositeur', $compositeur_filtre);

        $clear_table_artiste        = multi_array_filter_by_value($clear_table_compositeur,'artistes_tag', $artiste_filtre);

        $clear_table_final          = array_filter_by_value($clear_table_artiste,'date_calendrier', $date_filtre);

    }

    /********************************
    QUATRE CONDITIONS DE FILTRE
    ********************************/


    //type + lieu + instrument + thematiques
    elseif($type_filtre != '' && $lieu_filtre != '' && $instrument_filtre != '' && $thematiques_filtre != '' && $compositeur_filtre == '' && $artiste_filtre == '' && $date_filtre == ''){

        $clear_table_type           = array_filter_by_value($table,'type', $type_filtre );

        $clear_table_lieu           = array_filter_by_value($clear_table_type, 'departement', $lieu_filtre);

        $clear_table_instrument     = multi_array_filter_by_value($clear_table_lieu, 'instruments_tag', $instrument_filtre);

        $clear_table_final          = array_filter_by_value($clear_table_instrument, 'thematiques', $thematiques_filtre);

    }

    //type + lieu + instrument + compositeur
    elseif($type_filtre != '' && $lieu_filtre != '' && $instrument_filtre != '' && $thematiques_filtre == '' && $compositeur_filtre != '' && $artiste_filtre == '' && $date_filtre == ''){

        $clear_table_type           = array_filter_by_value($table,'type', $type_filtre );

        $clear_table_lieu           = array_filter_by_value($clear_table_type, 'departement', $lieu_filtre);

        $clear_table_instrument     = multi_array_filter_by_value($clear_table_lieu, 'instruments_tag', $instrument_filtre);

        $clear_table_final          = multi_array_filter_by_value($clear_table_instrument, 'compositeur', $compositeur_filtre);

    }

    //type + lieu + instrument+ artiste
    elseif($type_filtre != '' && $lieu_filtre != '' && $instrument_filtre != '' && $thematiques_filtre == '' && $compositeur_filtre == '' && $artiste_filtre != '' && $date_filtre == ''){

        $clear_table_type           = array_filter_by_value($table,'type', $type_filtre );

        $clear_table_lieu           = array_filter_by_value($clear_table_type, 'departement', $lieu_filtre);

        $clear_table_instrument     = multi_array_filter_by_value($clear_table_lieu, 'instruments_tag', $instrument_filtre);

        $clear_table_final          = multi_array_filter_by_value($clear_table_instrument, 'artistes_tag', $artiste_filtre);

    }

    //type + lieu + instrument + date
    elseif($type_filtre != '' && $lieu_filtre != '' && $instrument_filtre != '' && $thematiques_filtre == '' && $compositeur_filtre == '' && $artiste_filtre == '' && $date_filtre != ''){

        $clear_table_type           = array_filter_by_value($table,'type', $type_filtre );

        $clear_table_lieu           = array_filter_by_value($clear_table_type, 'departement', $lieu_filtre);

        $clear_table_instrument     = multi_array_filter_by_value($clear_table_lieu, 'instruments_tag', $instrument_filtre);

        $clear_table_final          = array_filter_by_value($clear_table_instrument, 'date_calendrier', $date_filtre);

    }

    //type + lieu + thematique + compositeur
    elseif($type_filtre != '' && $lieu_filtre != '' && $instrument_filtre == '' && $thematiques_filtre != '' && $compositeur_filtre != '' && $artiste_filtre == '' && $date_filtre == ''){

        $clear_table_type           = array_filter_by_value($table,'type', $type_filtre );

        $clear_table_lieu           = array_filter_by_value($clear_table_type, 'departement', $lieu_filtre);

        $clear_table_thematiques    = array_filter_by_value($clear_table_lieu, 'thematiques', $thematiques_filtre);

        $clear_table_final          = multi_array_filter_by_value($clear_table_thematiques, 'compositeur', $compositeur_filtre);

    }

    //type + lieu + thematique + artiste
    elseif($type_filtre != '' && $lieu_filtre != '' && $instrument_filtre == '' && $thematiques_filtre != '' && $compositeur_filtre == '' && $artiste_filtre != '' && $date_filtre == ''){

        $clear_table_type           = array_filter_by_value($table,'type', $type_filtre );

        $clear_table_lieu           = array_filter_by_value($clear_table_type, 'departement', $lieu_filtre);

        $clear_table_thematiques    = array_filter_by_value($clear_table_lieu, 'thematiques', $thematiques_filtre);

        $clear_table_final          = multi_array_filter_by_value($clear_table_thematiques, 'artistes_tag', $artiste_filtre);

    }

    //type + lieu + thematique + date
    elseif($type_filtre != '' && $lieu_filtre != '' && $instrument_filtre == '' && $thematiques_filtre != '' && $compositeur_filtre == '' && $artiste_filtre == '' && $date_filtre != ''){

        $clear_table_type           = array_filter_by_value($table,'type', $type_filtre );

        $clear_table_lieu           = array_filter_by_value($clear_table_type, 'departement', $lieu_filtre);

        $clear_table_thematiques    = array_filter_by_value($clear_table_lieu, 'thematiques', $thematiques_filtre);

        $clear_table_final          = array_filter_by_value($clear_table_thematiques, 'date_calendrier', $date_filtre);

    }

    //type + lieu + compositeur + artiste
    elseif($type_filtre != '' && $lieu_filtre != '' && $instrument_filtre == '' && $thematiques_filtre == '' && $compositeur_filtre != '' && $artiste_filtre != '' && $date_filtre == ''){

        $clear_table_type           = array_filter_by_value($table,'type', $type_filtre );

        $clear_table_lieu           = array_filter_by_value($clear_table_type, 'departement', $lieu_filtre);

        $clear_table_compositeur    = multi_array_filter_by_value($clear_table_lieu, 'compositeur', $compositeur_filtre);

        $clear_table_final          = multi_array_filter_by_value($clear_table_compositeur, 'artistes_tag', $artiste_filtre);

    }

    //type + lieu + compositeur + date
    elseif($type_filtre != '' && $lieu_filtre != '' && $instrument_filtre == '' && $thematiques_filtre == '' && $compositeur_filtre != '' && $artiste_filtre == '' && $date_filtre != ''){

        $clear_table_type           = array_filter_by_value($table,'type', $type_filtre );

        $clear_table_lieu           = array_filter_by_value($clear_table_type, 'departement', $lieu_filtre);

        $clear_table_compositeur    = multi_array_filter_by_value($clear_table_lieu, 'compositeur', $compositeur_filtre);

        $clear_table_final          = array_filter_by_value($clear_table_compositeur, 'date_calendrier', $date_filtre);

    }

    //type + lieu + artiste + date
    elseif($type_filtre != '' && $lieu_filtre != '' && $instrument_filtre == '' && $thematiques_filtre == '' && $compositeur_filtre == '' && $artiste_filtre != '' && $date_filtre != ''){

        $clear_table_type           = array_filter_by_value($table,'type', $type_filtre );

        $clear_table_lieu           = array_filter_by_value($clear_table_type, 'departement', $lieu_filtre);

        $clear_table_artiste        = multi_array_filter_by_value($clear_table_lieu, 'artistes_tag', $artiste_filtre);

        $clear_table_final          = array_filter_by_value($clear_table_artiste, 'date_calendrier', $date_filtre);

    }

    //type + instrument + theme + comp
    elseif($type_filtre != '' && $lieu_filtre == '' && $instrument_filtre != '' && $thematiques_filtre != '' && $compositeur_filtre != '' && $artiste_filtre == '' && $date_filtre == ''){

        $clear_table_type           = array_filter_by_value($table,'type', $type_filtre );

        $clear_table_instrument     = multi_array_filter_by_value($clear_table_type, 'instruments_tag', $instrument_filtre);

        $clear_table_thematiques    = array_filter_by_value($clear_table_instrument, 'thematiques', $thematiques_filtre);

        $clear_table_final          = multi_array_filter_by_value($clear_table_thematiques, 'compositeur', $compositeur_filtre);

    }

    //type + instrument + theme + artiste
    elseif($type_filtre != '' && $lieu_filtre == '' && $instrument_filtre != '' && $thematiques_filtre != '' && $compositeur_filtre == '' && $artiste_filtre != '' && $date_filtre == ''){

        $clear_table_type           = array_filter_by_value($table,'type', $type_filtre );

        $clear_table_instrument     = multi_array_filter_by_value($clear_table_type, 'instruments_tag', $instrument_filtre);

        $clear_table_thematiques    = array_filter_by_value($clear_table_instrument, 'thematiques', $thematiques_filtre);

        $clear_table_final          = multi_array_filter_by_value($clear_table_thematiques, 'artistes_tag', $artiste_filtre);

    }

    //type + instrument + theme + date
    elseif($type_filtre != '' && $lieu_filtre == '' && $instrument_filtre != '' && $thematiques_filtre != '' && $compositeur_filtre == '' && $artiste_filtre == '' && $date_filtre != ''){

        $clear_table_type           = array_filter_by_value($table,'type', $type_filtre );

        $clear_table_instrument     = multi_array_filter_by_value($clear_table_type, 'instruments_tag', $instrument_filtre);

        $clear_table_thematiques    = array_filter_by_value($clear_table_instrument, 'thematiques', $thematiques_filtre);

        $clear_table_final          = array_filter_by_value($clear_table_thematiques, 'date_calendrier', $date_filtre);

    }

    //type + instrument + comp + artsite
    elseif($type_filtre != '' && $lieu_filtre == '' && $instrument_filtre != '' && $thematiques_filtre == '' && $compositeur_filtre != '' && $artiste_filtre != '' && $date_filtre == ''){

        $clear_table_type           = array_filter_by_value($table,'type', $type_filtre );

        $clear_table_instrument     = multi_array_filter_by_value($clear_table_type, 'instruments_tag', $instrument_filtre);

        $clear_table_compositeur    = multi_array_filter_by_value($clear_table_instrument, 'compositeur', $compositeur_filtre);

        $clear_table_final          = multi_array_filter_by_value($clear_table_compositeur, 'artistes_tag', $artiste_filtre);

    }

    //type + instrument + comp + date
    elseif($type_filtre != '' && $lieu_filtre == '' && $instrument_filtre != '' && $thematiques_filtre == '' && $compositeur_filtre != '' && $artiste_filtre == '' && $date_filtre != ''){

        $clear_table_type           = array_filter_by_value($table,'type', $type_filtre );

        $clear_table_instrument     = multi_array_filter_by_value($clear_table_type, 'instruments_tag', $instrument_filtre);

        $clear_table_compositeur    = multi_array_filter_by_value($clear_table_instrument, 'compositeur', $compositeur_filtre);

        $clear_table_final          = array_filter_by_value($clear_table_compositeur, 'date_calendrier', $date_filtre);

    }

    //type + thematique + comp + artiste
    elseif($type_filtre != '' && $lieu_filtre == '' && $instrument_filtre == '' && $thematiques_filtre != '' && $compositeur_filtre != '' && $artiste_filtre != '' && $date_filtre == ''){

        $clear_table_type           = array_filter_by_value($table,'type', $type_filtre );

        $clear_table_thematiques    = array_filter_by_value($clear_table_type, 'thematiques', $thematiques_filtre);

        $clear_table_compositeur    = multi_array_filter_by_value($clear_table_thematiques, 'compositeur', $compositeur_filtre);

        $clear_table_final          = multi_array_filter_by_value($clear_table_compositeur, 'artistes_tag', $artiste_filtre);

    }

    //type + thematique + comp + date
    elseif($type_filtre != '' && $lieu_filtre == '' && $instrument_filtre == '' && $thematiques_filtre != '' && $compositeur_filtre != '' && $artiste_filtre == '' && $date_filtre != ''){

        $clear_table_type           = array_filter_by_value($table,'type', $type_filtre );

        $clear_table_thematiques    = array_filter_by_value($clear_table_type, 'thematiques', $thematiques_filtre);

        $clear_table_compositeur    = multi_array_filter_by_value($clear_table_thematiques, 'compositeur', $compositeur_filtre);

        $clear_table_final          = array_filter_by_value($clear_table_compositeur, 'date_calendrier', $date_filtre);

    }

    //type + thematique + artiste + date
    elseif($type_filtre != '' && $lieu_filtre == '' && $instrument_filtre == '' && $thematiques_filtre != '' && $compositeur_filtre == '' && $artiste_filtre != '' && $date_filtre != ''){

        $clear_table_type           = array_filter_by_value($table,'type', $type_filtre );

        $clear_table_thematiques    = array_filter_by_value($clear_table_type, 'thematiques', $thematiques_filtre);

        $clear_table_artiste        = multi_array_filter_by_value($clear_table_thematiques, 'artistes_tag', $artiste_filtre);

        $clear_table_final          = array_filter_by_value($clear_table_artiste, 'date_calendrier', $date_filtre);

    }

    //type + compositeur + artiste + date
    elseif($type_filtre != '' && $lieu_filtre == '' && $instrument_filtre == '' && $thematiques_filtre == '' && $compositeur_filtre != '' && $artiste_filtre != '' && $date_filtre != ''){

        $clear_table_type           = array_filter_by_value($table,'type', $type_filtre );

        $clear_table_compositeur    = multi_array_filter_by_value($clear_table_type, 'compositeur', $compositeur_filtre);

        $clear_table_artiste        = multi_array_filter_by_value($clear_table_compositeur, 'artistes_tag', $artiste_filtre);

        $clear_table_final          = array_filter_by_value($clear_table_artiste, 'date_calendrier', $date_filtre);

    }

    //lieu + instru + theme + comp
    elseif($type_filtre == '' && $lieu_filtre != '' && $instrument_filtre != '' && $thematiques_filtre != '' && $compositeur_filtre != '' && $artiste_filtre == '' && $date_filtre == ''){

        $clear_table_lieu           = array_filter_by_value($table,'departement', $lieu_filtre );

        $clear_table_instrument     = multi_array_filter_by_value($clear_table_lieu, 'instruments_tag', $instrument_filtre);

        $clear_table_thematiques    = array_filter_by_value($clear_table_instrument, 'thematiques', $thematiques_filtre);

        $clear_table_final          = multi_array_filter_by_value($clear_table_thematiques, 'compositeur', $compositeur_filtre);

    }

    //lieu + instru + theme + artiste
    elseif($type_filtre == '' && $lieu_filtre != '' && $instrument_filtre != '' && $thematiques_filtre != '' && $compositeur_filtre == '' && $artiste_filtre != '' && $date_filtre == ''){

        $clear_table_lieu           = array_filter_by_value($table,'departement', $lieu_filtre );

        $clear_table_instrument     = multi_array_filter_by_value($clear_table_lieu, 'instruments_tag', $instrument_filtre);

        $clear_table_thematiques    = array_filter_by_value($clear_table_instrument, 'thematiques', $thematiques_filtre);

        $clear_table_final          = multi_array_filter_by_value($clear_table_thematiques, 'artistes_tag', $artiste_filtre);

    }

    //lieu + instru + theme + date
    elseif($type_filtre == '' && $lieu_filtre != '' && $instrument_filtre != '' && $thematiques_filtre != '' && $compositeur_filtre == '' && $artiste_filtre == '' && $date_filtre != ''){

        $clear_table_lieu           = array_filter_by_value($table,'departement', $lieu_filtre );

        $clear_table_instrument     = multi_array_filter_by_value($clear_table_lieu, 'instruments_tag', $instrument_filtre);

        $clear_table_thematiques    = array_filter_by_value($clear_table_instrument, 'thematiques', $thematiques_filtre);

        $clear_table_final          = array_filter_by_value($clear_table_thematiques, 'date_calendrier', $date_filtre);

    }

    //lieu + instru + compositeur + artiste
    elseif($type_filtre == '' && $lieu_filtre != '' && $instrument_filtre != '' && $thematiques_filtre == '' && $compositeur_filtre != '' && $artiste_filtre != '' && $date_filtre == ''){

        $clear_table_lieu           = array_filter_by_value($table,'departement', $lieu_filtre );

        $clear_table_instrument     = multi_array_filter_by_value($clear_table_lieu, 'instruments_tag', $instrument_filtre);

        $clear_table_compositeur    = multi_array_filter_by_value($clear_table_instrument, 'compositeur', $compositeur_filtre);

        $clear_table_final          = multi_array_filter_by_value($clear_table_compositeur, 'artistes_tag', $artiste_filtre);

    }

    //lieu + instru + compositeur + date
    elseif($type_filtre == '' && $lieu_filtre != '' && $instrument_filtre != '' && $thematiques_filtre == '' && $compositeur_filtre != '' && $artiste_filtre == '' && $date_filtre != ''){

        $clear_table_lieu           = array_filter_by_value($table,'departement', $lieu_filtre );

        $clear_table_instrument     = multi_array_filter_by_value($clear_table_lieu, 'instruments_tag', $instrument_filtre);

        $clear_table_compositeur    = multi_array_filter_by_value($clear_table_instrument, 'compositeur', $compositeur_filtre);

        $clear_table_final          = array_filter_by_value($clear_table_compositeur, 'date_calendrier', $date_filtre);

    }

    //lieu + instru + artiste + date
    elseif($type_filtre == '' && $lieu_filtre != '' && $instrument_filtre != '' && $thematiques_filtre == '' && $compositeur_filtre != '' && $artiste_filtre == '' && $date_filtre != ''){

        $clear_table_lieu           = array_filter_by_value($table,'departement', $lieu_filtre );

        $clear_table_instrument     = multi_array_filter_by_value($clear_table_lieu, 'instruments_tag', $instrument_filtre);

        $clear_table_artiste        = multi_array_filter_by_value($clear_table_instrument, 'artistes_tag', $artiste_filtre);

        $clear_table_final          = array_filter_by_value($clear_table_artiste, 'date_calendrier', $date_filtre);

    }

    //lieu + thematique + compositeur + artiste
    elseif($type_filtre == '' && $lieu_filtre != '' && $instrument_filtre == '' && $thematiques_filtre != '' && $compositeur_filtre != '' && $artiste_filtre != '' && $date_filtre == ''){

        $clear_table_lieu           = array_filter_by_value($table,'departement', $lieu_filtre );

        $clear_table_thematiques    = array_filter_by_value($clear_table_lieu, 'thematiques', $thematiques_filtre);

        $clear_table_compositeur    = multi_array_filter_by_value($clear_table_thematiques, 'compositeur', $compositeur_filtre);

        $clear_table_final          = multi_array_filter_by_value($clear_table_compositeur, 'artistes_tag', $artiste_filtre);

    }

    //lieu + thematique + compositeur + date
    elseif($type_filtre == '' && $lieu_filtre != '' && $instrument_filtre == '' && $thematiques_filtre != '' && $compositeur_filtre != '' && $artiste_filtre == '' && $date_filtre != ''){

        $clear_table_lieu           = array_filter_by_value($table,'departement', $lieu_filtre );

        $clear_table_thematiques    = array_filter_by_value($clear_table_lieu, 'thematiques', $thematiques_filtre);

        $clear_table_compositeur    = multi_array_filter_by_value($clear_table_thematiques, 'compositeur', $compositeur_filtre);

        $clear_table_final          = array_filter_by_value($clear_table_compositeur, 'date_calendrier', $date_filtre);

    }

    //lieu + thematique + artiste + date
    elseif($type_filtre == '' && $lieu_filtre != '' && $instrument_filtre == '' && $thematiques_filtre != '' && $compositeur_filtre == '' && $artiste_filtre != '' && $date_filtre != ''){

        $clear_table_lieu           = array_filter_by_value($table,'departement', $lieu_filtre );

        $clear_table_thematiques    = array_filter_by_value($clear_table_lieu, 'thematiques', $thematiques_filtre);

        $clear_table_artiste        = multi_array_filter_by_value($clear_table_thematiques, 'artistes_tag', $artiste_filtre);

        $clear_table_final          = array_filter_by_value($clear_table_artiste, 'date_calendrier', $date_filtre);

    }

    //lieu + compositeur + artiste + date
    elseif($type_filtre == '' && $lieu_filtre != '' && $instrument_filtre == '' && $thematiques_filtre == '' && $compositeur_filtre != '' && $artiste_filtre != '' && $date_filtre != ''){

        $clear_table_lieu           = array_filter_by_value($table,'departement', $lieu_filtre );

        $clear_table_compositeur    = multi_array_filter_by_value($clear_table_lieu, 'compositeur', $compositeur_filtre);

        $clear_table_artiste        = multi_array_filter_by_value($clear_table_compositeur, 'artistes_tag', $artiste_filtre);

        $clear_table_final          = array_filter_by_value($clear_table_artiste, 'date_calendrier', $date_filtre);

    }

    //instrument + theme + comp + artiste
    elseif($type_filtre == '' && $lieu_filtre == '' && $instrument_filtre != '' && $thematiques_filtre != '' && $compositeur_filtre != '' && $artiste_filtre != '' && $date_filtre == ''){

        $clear_table_instrument     = multi_array_filter_by_value($table, 'instruments_tag', $instrument_filtre);

        $clear_table_thematiques    = array_filter_by_value($clear_table_instrument, 'thematiques', $thematiques_filtre);

        $clear_table_compositeur    = multi_array_filter_by_value($clear_table_thematiques, 'compositeur', $compositeur_filtre);

        $clear_table_final          = multi_array_filter_by_value($clear_table_compositeur, 'artistes_tag', $artiste_filtre);

    }

    //instrument + theme + comp + date
    elseif($type_filtre == '' && $lieu_filtre == '' && $instrument_filtre != '' && $thematiques_filtre != '' && $compositeur_filtre != '' && $artiste_filtre == '' && $date_filtre != ''){

        $clear_table_instrument     = multi_array_filter_by_value($table, 'instruments_tag', $instrument_filtre);

        $clear_table_thematiques    = array_filter_by_value($clear_table_instrument, 'thematiques', $thematiques_filtre);

        $clear_table_compositeur    = multi_array_filter_by_value($clear_table_thematiques, 'compositeur', $compositeur_filtre);

        $clear_table_final          = array_filter_by_value($clear_table_compositeur, 'date_calendrier', $date_filtre);

    }

    //instrument + theme + artiste + date
    elseif($type_filtre == '' && $lieu_filtre == '' && $instrument_filtre != '' && $thematiques_filtre != '' && $compositeur_filtre == '' && $artiste_filtre != '' && $date_filtre != ''){

        $clear_table_instrument     = multi_array_filter_by_value($table, 'instruments_tag', $instrument_filtre);

        $clear_table_thematiques    = array_filter_by_value($clear_table_instrument, 'thematiques', $thematiques_filtre);

        $clear_table_artiste        = multi_array_filter_by_value($clear_table_thematiques, 'artistes_tag', $artiste_filtre);

        $clear_table_final          = array_filter_by_value($clear_table_artiste, 'date_calendrier', $date_filtre);

    }

    //instrument + comp + artiste + date
    elseif($type_filtre == '' && $lieu_filtre == '' && $instrument_filtre != '' && $thematiques_filtre == '' && $compositeur_filtre != '' && $artiste_filtre != '' && $date_filtre != ''){

        $clear_table_instrument     = multi_array_filter_by_value($table, 'instruments_tag', $instrument_filtre);

        $clear_table_compositeur    = multi_array_filter_by_value($clear_table_instrument, 'compositeur', $compositeur_filtre);

        $clear_table_artiste        = multi_array_filter_by_value($clear_table_compositeur, 'artistes_tag', $artiste_filtre);

        $clear_table_final          = array_filter_by_value($clear_table_artiste, 'date_calendrier', $date_filtre);

    }

    //theme + comp + artiste + date
    elseif($type_filtre == '' && $lieu_filtre == '' && $instrument_filtre == '' && $thematiques_filtre != '' && $compositeur_filtre != '' && $artiste_filtre != '' && $date_filtre != ''){

        $clear_table_thematiques    = array_filter_by_value($table, 'thematiques', $thematiques_filtre);

        $clear_table_compositeur    = multi_array_filter_by_value($clear_table_thematiques, 'compositeur', $compositeur_filtre);

        $clear_table_artiste        = multi_array_filter_by_value($clear_table_compositeur, 'artistes_tag', $artiste_filtre);

        $clear_table_final          = array_filter_by_value($clear_table_artiste, 'date_calendrier', $date_filtre);

    }


    /********************************
    CINQ CONDITIONS DE FILTRE
    ********************************/


    //type + lieu + instrument + thematiques + compositeur
    elseif($type_filtre != '' && $lieu_filtre != '' && $instrument_filtre != '' && $thematiques_filtre != '' && $compositeur_filtre != '' && $artiste_filtre == '' && $date_filtre == ''){

        $clear_table_type           = array_filter_by_value($table,'type', $type_filtre );

        $clear_table_lieu           = array_filter_by_value($clear_table_type, 'departement', $lieu_filtre);

        $clear_table_instrument     = multi_array_filter_by_value($clear_table_lieu, 'instruments_tag', $instrument_filtre);

        $clear_table_thematiques    = array_filter_by_value($clear_table_instrument, 'thematiques', $thematiques_filtre);

        $clear_table_final          = multi_array_filter_by_value($clear_table_thematiques, 'compositeur', $compositeur_filtre);

    }

    //type + lieu + instrument + thematiques + artiste
    elseif($type_filtre != '' && $lieu_filtre != '' && $instrument_filtre != '' && $thematiques_filtre != '' && $compositeur_filtre == '' && $artiste_filtre != '' && $date_filtre == ''){

        $clear_table_type           = array_filter_by_value($table,'type', $type_filtre );

        $clear_table_lieu           = array_filter_by_value($clear_table_type, 'departement', $lieu_filtre);

        $clear_table_instrument     = multi_array_filter_by_value($clear_table_lieu, 'instruments_tag', $instrument_filtre);

        $clear_table_thematiques    = array_filter_by_value($clear_table_instrument, 'thematiques', $thematiques_filtre);

        $clear_table_final          = multi_array_filter_by_value($clear_table_thematiques, 'artistes_tag', $artiste_filtre);

    }

    //type + lieu + instrument + thematiques + date
    elseif($type_filtre != '' && $lieu_filtre != '' && $instrument_filtre != '' && $thematiques_filtre != '' && $compositeur_filtre == '' && $artiste_filtre == '' && $date_filtre != ''){

        $clear_table_type           = array_filter_by_value($table,'type', $type_filtre );

        $clear_table_lieu           = array_filter_by_value($clear_table_type, 'departement', $lieu_filtre);

        $clear_table_instrument     = multi_array_filter_by_value($clear_table_lieu, 'instruments_tag', $instrument_filtre);

        $clear_table_thematiques    = array_filter_by_value($clear_table_instrument, 'thematiques', $thematiques_filtre);

        $clear_table_final          = array_filter_by_value($clear_table_thematiques, 'date_calendrier', $date_filtre);

    }


    //type + lieu + instrument + compositeur + artiste
    elseif($type_filtre != '' && $lieu_filtre != '' && $instrument_filtre != '' && $thematiques_filtre == '' && $compositeur_filtre != '' && $artiste_filtre != '' && $date_filtre == ''){

        $clear_table_type           = array_filter_by_value($table,'type', $type_filtre );

        $clear_table_lieu           = array_filter_by_value($clear_table_type, 'departement', $lieu_filtre);

        $clear_table_instrument     = multi_array_filter_by_value($clear_table_lieu, 'instruments_tag', $instrument_filtre);

        $clear_table_compositeur    = multi_array_filter_by_value($clear_table_instrument, 'compositeur', $compositeur_filtre);

        $clear_table_final          = multi_array_filter_by_value($clear_table_compositeur, 'artistes_tag', $artiste_filtre);

    }

    //type + lieu + instrument + comp + date
    elseif($type_filtre != '' && $lieu_filtre != '' && $instrument_filtre != '' && $thematiques_filtre == '' && $compositeur_filtre != '' && $artiste_filtre == '' && $date_filtre != ''){

        $clear_table_type           = array_filter_by_value($table,'type', $type_filtre );

        $clear_table_lieu           = array_filter_by_value($clear_table_type, 'departement', $lieu_filtre);

        $clear_table_instrument     = multi_array_filter_by_value($clear_table_lieu, 'instruments_tag', $instrument_filtre);

        $clear_table_compositeur    = multi_array_filter_by_value($clear_table_instrument, 'compositeur', $compositeur_filtre);

        $clear_table_final          = array_filter_by_value($clear_table_compositeur, 'date_calendrier', $date_filtre);

    }

    //type + lieu + theme + comp + artiste
    elseif($type_filtre != '' && $lieu_filtre != '' && $instrument_filtre == '' && $thematiques_filtre != '' && $compositeur_filtre != '' && $artiste_filtre != '' && $date_filtre == ''){

        $clear_table_type           = array_filter_by_value($table,'type', $type_filtre );

        $clear_table_lieu           = array_filter_by_value($clear_table_type, 'departement', $lieu_filtre);

        $clear_table_thematiques    = array_filter_by_value($clear_table_lieu, 'thematiques', $thematiques_filtre);

        $clear_table_compositeur    = multi_array_filter_by_value($clear_table_thematiques, 'compositeur', $compositeur_filtre);

        $clear_table_final          = multi_array_filter_by_value($clear_table_compositeur, 'artistes_tag', $artiste_filtre);

    }

    //type + lieu + theme + comp + date
    elseif($type_filtre != '' && $lieu_filtre != '' && $instrument_filtre == '' && $thematiques_filtre != '' && $compositeur_filtre != '' && $artiste_filtre == '' && $date_filtre != ''){

        $clear_table_type           = array_filter_by_value($table,'type', $type_filtre );

        $clear_table_lieu           = array_filter_by_value($clear_table_type, 'departement', $lieu_filtre);

        $clear_table_thematiques    = array_filter_by_value($clear_table_lieu, 'thematiques', $thematiques_filtre);

        $clear_table_compositeur    = multi_array_filter_by_value($clear_table_thematiques, 'compositeur', $compositeur_filtre);

        $clear_table_final          = array_filter_by_value($clear_table_compositeur, 'date_calendrier', $date_filtre);

    }

    //type + instrument + theme + comp + artiste
    elseif($type_filtre != '' && $lieu_filtre == '' && $instrument_filtre != '' && $thematiques_filtre != '' && $compositeur_filtre != '' && $artiste_filtre != '' && $date_filtre == ''){

        $clear_table_type           = array_filter_by_value($table,'type', $type_filtre );

        $clear_table_instrument     = multi_array_filter_by_value($clear_table_type, 'instruments_tag', $instrument_filtre);

        $clear_table_thematiques    = array_filter_by_value($clear_table_instrument, 'thematiques', $thematiques_filtre);

        $clear_table_compositeur    = multi_array_filter_by_value($clear_table_thematiques, 'compositeur', $compositeur_filtre);

        $clear_table_final          = multi_array_filter_by_value($clear_table_compositeur, 'artistes_tag', $artiste_filtre);

    }

    //type + instrument + theme + comp + date
    elseif($type_filtre != '' && $lieu_filtre == '' && $instrument_filtre != '' && $thematiques_filtre != '' && $compositeur_filtre != '' && $artiste_filtre == '' && $date_filtre != ''){

        $clear_table_type           = array_filter_by_value($table,'type', $type_filtre );

        $clear_table_instrument     = multi_array_filter_by_value($clear_table_type, 'instruments_tag', $instrument_filtre);

        $clear_table_thematiques    = array_filter_by_value($clear_table_instrument, 'thematiques', $thematiques_filtre);

        $clear_table_compositeur    = multi_array_filter_by_value($clear_table_thematiques, 'compositeur', $compositeur_filtre);

        $clear_table_final          = array_filter_by_value($clear_table_compositeur, 'date_calendrier', $date_filtre);

    }

    //type + instrument + comp + artiste + date
    elseif($type_filtre != '' && $lieu_filtre == '' && $instrument_filtre != '' && $thematiques_filtre == '' && $compositeur_filtre != '' && $artiste_filtre != '' && $date_filtre != ''){

        $clear_table_type           = array_filter_by_value($table,'type', $type_filtre );

        $clear_table_instrument     = multi_array_filter_by_value($clear_table_type, 'instruments_tag', $instrument_filtre);

        $clear_table_compositeur    = multi_array_filter_by_value($clear_table_instrument, 'compositeur', $compositeur_filtre);

        $clear_table_artiste        = multi_array_filter_by_value($clear_table_compositeur, 'artistes_tag', $artiste_filtre);

        $clear_table_final          = array_filter_by_value($clear_table_artiste, 'date_calendrier', $date_filtre);

    }

    //type + theme + comp + artiste + date
    elseif($type_filtre != '' && $lieu_filtre == '' && $instrument_filtre == '' && $thematiques_filtre != '' && $compositeur_filtre != '' && $artiste_filtre != '' && $date_filtre != ''){

        $clear_table_type           = array_filter_by_value($table,'type', $type_filtre );

        $clear_table_thematiques    = array_filter_by_value($clear_table_type, 'thematiques', $thematiques_filtre);

        $clear_table_compositeur    = multi_array_filter_by_value($clear_table_thematiques, 'compositeur', $compositeur_filtre);

        $clear_table_artiste        = multi_array_filter_by_value($clear_table_compositeur, 'artistes_tag', $artiste_filtre);

        $clear_table_final          = array_filter_by_value($clear_table_artiste, 'date_calendrier', $date_filtre);

    }

    //lieu + instru + theme + comp + artiste
    elseif($type_filtre == '' && $lieu_filtre != '' && $instrument_filtre != '' && $thematiques_filtre != '' && $compositeur_filtre != '' && $artiste_filtre != '' && $date_filtre == ''){

        $clear_table_lieu           = array_filter_by_value($table,'departement', $lieu_filtre );

        $clear_table_instrument     = multi_array_filter_by_value($clear_table_lieu, 'instruments_tag', $instrument_filtre);

        $clear_table_thematiques    = array_filter_by_value($clear_table_instrument, 'thematiques', $thematiques_filtre);

        $clear_table_compositeur    = multi_array_filter_by_value($clear_table_thematiques, 'compositeur', $compositeur_filtre);

        $clear_table_final          = multi_array_filter_by_value($clear_table_compositeur, 'artistes_tag', $artiste_filtre);

    }

    //lieu + instru + theme + comp + date
    elseif($type_filtre == '' && $lieu_filtre != '' && $instrument_filtre != '' && $thematiques_filtre != '' && $compositeur_filtre != '' && $artiste_filtre == '' && $date_filtre != ''){

        $clear_table_lieu           = array_filter_by_value($table,'departement', $lieu_filtre );

        $clear_table_instrument     = multi_array_filter_by_value($clear_table_lieu, 'instruments_tag', $instrument_filtre);

        $clear_table_thematiques    = array_filter_by_value($clear_table_instrument, 'thematiques', $thematiques_filtre);

        $clear_table_compositeur    = multi_array_filter_by_value($clear_table_thematiques, 'compositeur', $compositeur_filtre);

        $clear_table_final          = array_filter_by_value($clear_table_compositeur, 'date_calendrier', $date_filtre);

    }

    //lieu + instru + theme + artiste + date
    elseif($type_filtre == '' && $lieu_filtre != '' && $instrument_filtre != '' && $thematiques_filtre != '' && $compositeur_filtre == '' && $artiste_filtre != '' && $date_filtre != ''){

        $clear_table_lieu           = array_filter_by_value($table,'departement', $lieu_filtre );

        $clear_table_instrument     = multi_array_filter_by_value($clear_table_lieu, 'instruments_tag', $instrument_filtre);

        $clear_table_thematiques    = array_filter_by_value($clear_table_instrument, 'thematiques', $thematiques_filtre);

        $clear_table_artiste        = multi_array_filter_by_value($clear_table_thematiques, 'artistes_tag', $artiste_filtre);

        $clear_table_final          = array_filter_by_value($clear_table_artiste, 'date_calendrier', $date_filtre);

    }

    //lieu + instru + comp + artiste + date
    elseif($type_filtre == '' && $lieu_filtre != '' && $instrument_filtre != '' && $thematiques_filtre == '' && $compositeur_filtre != '' && $artiste_filtre != '' && $date_filtre != ''){

        $clear_table_lieu           = array_filter_by_value($table,'departement', $lieu_filtre );

        $clear_table_instrument     = multi_array_filter_by_value($clear_table_lieu, 'instruments_tag', $instrument_filtre);

        $clear_table_compositeur    = multi_array_filter_by_value($clear_table_instrument, 'compositeur', $compositeur_filtre);

        $clear_table_artiste        = multi_array_filter_by_value($clear_table_compositeur, 'artistes_tag', $artiste_filtre);

        $clear_table_final          = array_filter_by_value($clear_table_artiste, 'date_calendrier', $date_filtre);

    }

    //lieu + theme + comp + artiste + date
    elseif($type_filtre == '' && $lieu_filtre != '' && $instrument_filtre == '' && $thematiques_filtre != '' && $compositeur_filtre != '' && $artiste_filtre != '' && $date_filtre != ''){

        $clear_table_lieu           = array_filter_by_value($table,'departement', $lieu_filtre );

        $clear_table_thematiques    = multi_array_filter_by_value($clear_table_lieu, 'thematiques', $thematiques_filtre);

        $clear_table_compositeur    = multi_array_filter_by_value($clear_table_thematiques, 'compositeur', $compositeur_filtre);

        $clear_table_artiste        = multi_array_filter_by_value($clear_table_compositeur, 'artistes_tag', $artiste_filtre);

        $clear_table_final          = array_filter_by_value($clear_table_artiste, 'date_calendrier', $date_filtre);

    }

    //instrument + theme + comp + artiste + date
    elseif($type_filtre == '' && $lieu_filtre == '' && $instrument_filtre != '' && $thematiques_filtre != '' && $compositeur_filtre != '' && $artiste_filtre != '' && $date_filtre != ''){

        $clear_table_instrument     = multi_array_filter_by_value($table, 'instruments_tag', $instrument_filtre);

        $clear_table_thematiques    = multi_array_filter_by_value($clear_table_instrument, 'thematiques', $thematiques_filtre);

        $clear_table_compositeur    = multi_array_filter_by_value($clear_table_thematiques, 'compositeur', $compositeur_filtre);

        $clear_table_artiste        = multi_array_filter_by_value($clear_table_compositeur, 'artistes_tag', $artiste_filtre);

        $clear_table_final          = array_filter_by_value($clear_table_artiste, 'date_calendrier', $date_filtre);

    }


    /********************************
    SIX CONDITIONS DE FILTRE
    ********************************/

    //type + lieu + instrument + thematiques + compositeur + artiste
    elseif($type_filtre != '' && $lieu_filtre != '' && $instrument_filtre != '' && $thematiques_filtre != '' && $compositeur_filtre != '' && $artiste_filtre != '' && $date_filtre == ''){

        $clear_table_type           = array_filter_by_value($table,'type', $type_filtre );

        $clear_table_lieu           = array_filter_by_value($clear_table_type, 'departement', $lieu_filtre);

        $clear_table_instrument     = multi_array_filter_by_value($clear_table_lieu, 'instruments_tag', $instrument_filtre);

        $clear_table_thematiques    = array_filter_by_value($clear_table_instrument, 'thematiques', $thematiques_filtre);

        $clear_table_compositeur    = multi_array_filter_by_value($clear_table_thematiques, 'compositeur', $compositeur_filtre);

        $clear_table_final          = multi_array_filter_by_value($clear_table_compositeur, 'artistes_tag', $artiste_filtre);

    }

    //type + lieu + instrument + thematiques + compositeur + date
    elseif($type_filtre != '' && $lieu_filtre != '' && $instrument_filtre != '' && $thematiques_filtre != '' && $compositeur_filtre != '' && $artiste_filtre == '' && $date_filtre != ''){

        $clear_table_type           = array_filter_by_value($table,'type', $type_filtre );

        $clear_table_lieu           = array_filter_by_value($clear_table_type, 'departement', $lieu_filtre);

        $clear_table_instrument     = multi_array_filter_by_value($clear_table_lieu, 'instruments_tag', $instrument_filtre);

        $clear_table_thematiques    = array_filter_by_value($clear_table_instrument, 'thematiques', $thematiques_filtre);

        $clear_table_compositeur    = multi_array_filter_by_value($clear_table_thematiques, 'compositeur', $compositeur_filtre);

        $clear_table_final          = multi_array_filter_by_value($clear_table_compositeur, 'date_calendrier', $date_filtre);

    }

    ///// ALL
    elseif($type_filtre != '' && $lieu_filtre != '' && $instrument_filtre != '' && $thematiques_filtre != '' && $compositeur_filtre != '' && $artiste_filtre != '' && $date_filtre != ''){

        $clear_table_type           = array_filter_by_value($table,'type', $type_filtre );

        $clear_table_lieu           = array_filter_by_value($clear_table_type, 'departement', $lieu_filtre);

        $clear_table_instrument     = multi_array_filter_by_value($clear_table_lieu, 'instruments_tag', $instrument_filtre);

        $clear_table_thematiques    = array_filter_by_value($clear_table_instrument, 'thematiques', $thematiques_filtre);

        $clear_table_compositeur    = multi_array_filter_by_value($clear_table_thematiques, 'compositeur', $compositeur_filtre);

        $clear_table_artiste        = multi_array_filter_by_value($clear_table_compositeur, 'artistes_tag', $artiste_filtre);

        $clear_table_final          = multi_array_filter_by_value($clear_table_artiste, 'date_calendrier', $date_filtre);
    }


    ///// NONE
    elseif($type_filtre == '' && $lieu_filtre == '' && $instrument_filtre == '' && $thematiques_filtre == '' && $compositeur_filtre == '' && $artiste_filtre == '' && $date_filtre == ''){

        $clear_table_final      = $table;
    }


    $count = count($clear_table_final);



    if($count == 0){

        $table_zero = removeElementWithInferiorValue($table,'date_calendrier',$delete_if_less);
        //$sliced     = array_slice($table_zero, 0, 3);

        echo '<div class="contenu_grid no_result">';
        echo 'Aucun spectacle ne correspond à vos critères de recherche.';
        echo '</div>';
        get_template_part('vous-aimerez');

    }else{
        $sliced     = $clear_table_final;
        displayAjax($sliced);
    };
};

function preFilter()
{

    $type_get = $_GET['type'];

    $table          = queryAllDate();
    $table          = array_filter_by_value($table,'type', $type_get);

    displayAjax($table);

}

?>