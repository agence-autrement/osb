<?php

/*
Plugin Name: Calendrier
*/

/************************ Création Custom Post types ************************/
function create_event_post_type() {
    register_post_type( 'events',
        array(
            'labels'=> array(
                'name'              => 'Events',
                'singular_name'     => 'Event',
                'add_new'           => 'Add New',
                'add_new_item'      => 'Add New Event',
                'edit_item'         => 'Edit Event',
                'new_item'          => 'New Event',
                'view_item'         => 'View Cafe',
                'search_items'      => 'Search Cafes',
                'not_found'         =>  'Nothing Found',
                'not_found_in_trash'=> 'Nothing found in the Trash',
                'parent_item_colon' => ''
            ),
            'public'            => true,
            'publicly_queryable'=> true,
            'show_ui'           => true,
            'query_var'         => true,
            'menu_icon'         => 'dashicons-calendar',
            'rewrite'           => true,
            'capability_type'   => 'post',
            'hierarchical'      => false,
            'menu_position'     => null,
            'supports'          => array('title','editor','thumbnail')
        )
    );
}
add_action( 'init', 'create_event_post_type' );

/************************ Création des Customs fields ************************/

function add_event_meta_boxes() {
    add_meta_box("event_details_meta", "Détails de l'évènement", "add_event_details_event_meta_box", "events", "normal", "low");
}
function add_event_details_event_meta_box()
{
    global $post;
    $custom = get_post_custom( $post->ID );

    ?>
    <style>.width99 {width:99%;}</style>
    <p>
        <label>Date:</label><br />
        <input type="date" name="date" value="<?= @$custom["date"][0] ?>" class="width99" />
    </p>
    <p>
        <label>Artiste:</label><br />
        <input type="text" name="artiste" value="<?= @$custom["artiste"][0] ?>" class="width99" />
    </p>
    <p>
        <label>lieu:</label><br />
        <input type="text" name="lieu" value="<?= @$custom["lieu"][0] ?>" class="width99" />
    </p>
    <p>
        <label>Prix:</label><br />
        <input type="text" name="prix" value="<?= @$custom["prix"][0] ?>" class="width99" />
    </p>
    <p>
        <label>Catégorie:</label><br />
        <input type="text" name="cat" value="<?= @$custom["cat"][0] ?>" class="width99" />
    </p>
    <?php
}

/************************ Sauvegarde des Customs fields ************************/

function save_event_custom_fields(){
    global $post;

    if ( $post )
    {
        update_post_meta($post->ID, "date", @$_POST["date"]);
        update_post_meta($post->ID, "artiste", @$_POST["artiste"]);
        update_post_meta($post->ID, "lieu", @$_POST["lieu"]);
        update_post_meta($post->ID, "prix", @$_POST["prix"]);
        update_post_meta($post->ID, "cat", @$_POST["cat"]);
    }
}
add_action( 'admin_init', 'add_event_meta_boxes' );
add_action( 'save_post', 'save_event_custom_fields' );

/************************ Fonctions Globales ************************/

/*Fonction de filtre*/
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

/*Remove Value from Array*/
function removeElementWithValue($array, $key, $value){
    foreach($array as $subKey => $subArray){
        if($subArray[$key] == $value){
            unset($array[$subKey]);
        }
    }
    return $array;
};

/*Remove Value inferieur*/
function removeElementWithInferiorValue($array, $key, $value){
    foreach($array as $subKey => $subArray){
        if($subArray[$key] < $value){
            unset($array[$subKey]);
        }
    }
    return $array;
};

/*Tri par date*/
function sortByDate($a,$b){
    return ($a['date_calendrier'] <= $b['date_calendrier']) ? -1 : 1;
};

/*Array sans doublon*/
function unique_multidim_array($array, $key) {
    $temp_array = array();
    $i = 0;
    $key_array = array();
    foreach($array as $val) {
        if (!in_array($val[$key], $key_array)) {
            $key_array[$i] = $val[$key];
            $temp_array[$i] = $val;
        }
        $i++;
    }
    return $temp_array;
};

/*Généré Input en remontant le CF lieu*/
function getInputByLieu(){
    $args = array('post_type' => 'events');
    $the_query = new WP_Query($args);
    if ( $the_query->have_posts() ) {
        $table = array();
        while ($the_query->have_posts()) {
            $the_query->the_post();

            $post_id = get_the_ID();
            $lieu = get_post_meta($post_id, 'lieu');
            array_push($table, array($lieu[0]));
        };
        $table = unique_multidim_array($table,'0');
        foreach($table as $table_un => $values){
            foreach($values as $value){
                echo "<input type='submit' name='ville' value='".$value."' >";
            };
        };
        wp_reset_postdata();
    };
};

/************************ AJAX ************************/

/*Scirpts enqueues*/
function add_js_scripts() {
    wp_enqueue_script( 'script', get_template_directory_uri().'/library/js/scripts_calendrier.js', array('jquery'), '1.0', true );

    // pass Ajax Url to script.js
    $dir = plugin_dir_url( __FILE__ )."calendrier/ajax-custom.php";
    wp_localize_script('script', 'ajaxtest', $dir ); //
}

/* ADD ACTIONS WP*/
/*JS global*/
add_action('wp_enqueue_scripts', 'add_js_scripts');
/*JS Ajax*/
add_action( 'wp_ajax_mon_action', 'mon_action' );
add_action( 'wp_ajax_nopriv_mon_action', 'mon_action' );
add_action( 'wp_ajax_mon_action_date', 'mon_action_date' );
add_action( 'wp_ajax_nopriv_mon_action_date', 'mon_action_date' );

/*Affichage des postes filtré par ville*/
function mon_action() {
    global $_POST;
    $ville = $_POST['ville'];
    $args = array('post_type' => 'events');
    $the_query = new WP_Query($args);
    if ( $the_query->have_posts() ) {
        $table = array();
        while ($the_query->have_posts()) {
            $the_query->the_post();
            $post_id = get_the_ID();
            $titre = get_the_title($post_id);
            $link = get_the_permalink($post_id);
            $thumbnail = get_the_post_thumbnail_url($post_id);
            $date = get_post_meta($post_id, 'date');
            $artiste = get_post_meta($post_id, 'artiste');
            $lieu = get_post_meta($post_id, 'lieu');
            $prix = get_post_meta($post_id, 'prix');
            $cat = get_post_meta($post_id, 'cat');
            array_push($table, array(
                'id_calendrier'         =>$post_id,
                'titre_calendrier'      => $titre,
                'date_calendrier'       => $date[0],
                'artiste_calendrier'    => $artiste[0],
                'lieu_calendrier'       => $lieu[0],
                'prix_calendrier'       => $prix[0],
                'cat_calendrier'        => $cat[0],
                'thumbnail_calendrier'  => $thumbnail,
                'link'                  => $link)
            );
        };

        usort($table, "sortByDate");
        $delete_if_less = date("Y-m-d");
        $clear_date = removeElementWithInferiorValue($table,'date_calendrier',$delete_if_less);
        $clear_table = array_filter_by_value($clear_date,'lieu_calendrier', $ville );
        $count = count($clear_table);
        if($count > 3){
            $sliced = array_slice($clear_table, 0, 3);
        }elseif($count < 3){
            $array_merge_value = removeElementWithValue($table, 3, $ville);
            $clear_array_to_add = removeElementWithInferiorValue($array_merge_value,'date_calendrier',$delete_if_less);
            $merge = array_merge($clear_table, $clear_array_to_add);
            $sliced = array_slice($merge, 0, 3);
        }else{
            $sliced = $clear_table;
        };

        echo '<ul>';
        foreach($sliced as $table_un => $values){
            setlocale(LC_ALL, "fr_FR");
            $timestamp = $values['date_calendrier'];
            $translate_Day = strftime ( '%e' , strtotime($timestamp));
            $translate_Month = strftime ( '%B' , strtotime($timestamp));

            if($values['thumbnail_calendrier'] == false){

                echo '<li>';

            }else{
                $bgImage = $values['thumbnail_calendrier'];
                echo '<li style="background-image:url('.$bgImage.'); ">';

            }?>

            <div class="left_event">
                <p class="cat_calendrier"><? echo $values['cat_calendrier']; ?></p>
                <p class="titre_calendrier"><? echo $values['titre_calendrier']; ?></p>
                <p class="artiste_calendrier"><? echo $values['artiste_calendrier']; ?></p>
                <a href="<? echo $values['link']; ?>" class="link_calendrier">EN SAVOIR +</a>
            </div>
            <div class="right_event">
                <!-- <p class="id_calendrier"><? echo $values['id_calendrier']; ?></p>     -->
                <p class="day_calendrier"><?
                    if($translate_Day == '1'){
                        echo $translate_Day;
                        echo "<sup>er</sup>";
                    }else{
                        echo $translate_Day;
                    } ?>
                </p>
                <p class="month_calendrier"><? echo $translate_Month; ?></p>
                <p class="lieu_calendrier"><? echo $values['lieu_calendrier'];?></p>
                <!-- <p class="prix_calendrier"><? echo $values['prix_calendrier']; ?></p> -->
            </div>
            <? echo '</li>';
        };
        echo '</ul>';
    };
    /*reset*/
    wp_reset_postdata();
    die();
};

/*Affichage des postes filtré par date*/
function mon_action_date() {
    global $_POST;
    $date_event = $_POST['date'];
    $args = array('post_type' => 'events');
    $the_query = new WP_Query($args);
    if ( $the_query->have_posts() ) {
        $table = array();
        while ($the_query->have_posts()) {
            $the_query->the_post();
            $post_id = get_the_ID();
            $titre = get_the_title($post_id);
            $link = get_the_permalink($post_id);
            $thumbnail = get_the_post_thumbnail_url($post_id);
            $date = get_post_meta($post_id, 'date');
            $artiste = get_post_meta($post_id, 'artiste');
            $lieu = get_post_meta($post_id, 'lieu');
            $prix = get_post_meta($post_id, 'prix');
            $cat = get_post_meta($post_id, 'cat');
            array_push($table, array(
                'id_calendrier'         =>$post_id,
                'titre_calendrier'      => $titre,
                'date_calendrier'       => $date[0],
                'artiste_calendrier'    => $artiste[0],
                'lieu_calendrier'       => $lieu[0],
                'prix_calendrier'       => $prix[0],
                'cat_calendrier'        => $cat[0],
                'thumbnail_calendrier'  => $thumbnail,
                'link'                  => $link)
            );
        };
        usort($table, "sortByDate");
        $delete_if_less = date("Y-m-d");
        $clear_date = removeElementWithInferiorValue($table,'date_calendrier',$delete_if_less);
        $clear_table = array_filter_by_value($clear_date,'date_calendrier', $date_event );
        $count = count($clear_table);
        if($count > 3){
            $sliced = array_slice($clear_table, 0, 3);
        }elseif($count < 3){
            $array_merge_value = removeElementWithValue($table, 1, $date_event);
            $clear_array_to_add = removeElementWithInferiorValue($array_merge_value,'date_calendrier',$delete_if_less);
            $merge = array_merge($clear_table, $clear_array_to_add);
            $sliced = array_slice($merge, 0, 3);
        }else{
            $sliced = $clear_table;
        };
        echo '<ul>';
        foreach($sliced as $table_un => $values){
            setlocale(LC_ALL, "fr_FR");
            $timestamp = $values['date_calendrier'];
            $translate_Day = strftime ( '%e' , strtotime($timestamp));
            $translate_Month = strftime ( '%B' , strtotime($timestamp));
            if($values['thumbnail_calendrier'] == false){
                echo '<li>';
            }else{
                $bgImage = $values['thumbnail_calendrier'];
                echo '<li style="background-image:url('.$bgImage.'); ">';
            }?>
            <div class="left_event">
                <p class="cat_calendrier"><? echo $values['cat_calendrier']; ?></p>
                <p class="titre_calendrier"><? echo $values['titre_calendrier']; ?></p>
                <p class="artiste_calendrier"><? echo $values['artiste_calendrier']; ?></p>
                <a href="<? echo $values['link']; ?>" class="link_calendrier">EN SAVOIR +</a>
            </div>
            <div class="right_event">
                <!-- <p class="id_calendrier"><? echo $values['id_calendrier']; ?></p>     -->
                <p class="day_calendrier"><?
                    if($translate_Day == '1'){
                        echo $translate_Day;
                        echo "<sup>er</sup>";
                    }else{
                        echo $translate_Day;
                    } ?>
                </p>
                <p class="month_calendrier"><? echo $translate_Month; ?></p>
                <p class="lieu_calendrier"><? echo $values['lieu_calendrier'];?></p>
                <!-- <p class="prix_calendrier"><? echo $values['prix_calendrier']; ?></p> -->
            </div>
            <? echo '</li>';
        };
        echo '</ul>';
    };
/*reset*/
wp_reset_postdata();
die();
};
?>