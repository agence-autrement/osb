<?php

/*
Plugin Name: Calendrier
*/

/************************
 * Fonctions Globales *
 ************************/

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


///////////////////////////////// Généré Input en remontant le CF lieu

function getInputByLieu()
{
    $args = array('post_type' => 'spectacles');
    $the_query = new WP_Query($args);
    if ( $the_query->have_posts() ) {
        $table = array();
        while ($the_query->have_posts()) {
            $the_query->the_post();

            if( have_rows('representations') ):
                while ( have_rows('representations') ) : the_row();
                   $departement = get_sub_field('departement');
                endwhile;
            else :
                // no rows found
            endif;
            array_push($table, array($departement));
        };

        $table = unique_multidim_array($table,'0');
        foreach($table as $table_un => $values){
            foreach($values as $value){
                if($value == 22){
                    echo "<button type='submit' name='ville' value='".$value."'>Côte d'Armor</button>";
                }elseif($value == 29){
                    echo "<button type='submit' name='ville' value='".$value."'>Finistère</button>";
                }elseif($value == 35){
                    echo "<button type='submit' name='ville' value='".$value."'>Ille-et-Vilaine</button>";
                }elseif($value == 56){
                    echo "<button type='submit' name='ville' value='".$value."'>Morbihan</button>";
                }
            };
        };
        wp_reset_postdata();
    };
};


///////////////////////////////// Généré Input en remontant le CF Catégorie

function getInputByTheme()
{
    $args       = array('post_type' => 'events');
    $the_query  = new WP_Query($args);

    if ($the_query->have_posts()) {
        $table = array();
        while ($the_query->have_posts()) {

            $the_query  ->the_post();
            $post_id    = get_the_ID();
            $theme      = get_post_meta($post_id, 'cat');
            array_push($table, array($theme[0]));
        };

        $table = unique_multidim_array($table, '0');
        foreach ($table as $table_un => $values) {

            foreach ($values as $value) {

                echo "<input type='submit' name='cat' value='" . $value . "'><br>";

            };
            wp_reset_postdata();
        };
    };
};


///////////////////////////////// WP_QUERY -> Spectacle

function queryPosts()
{
    $args       = array('post_type' => 'spectacles');
    $the_query  = new WP_Query( $args );

    if( $the_query->have_posts() ){
        $table = array();
        while ( $the_query->have_posts() ) {
            $the_query  ->the_post();
            $post_id    = get_the_ID();
            $titre      = get_the_title($post_id);
            $link       = get_the_permalink($post_id);
            $thumbnail  = get_the_post_thumbnail_url($post_id, 'full');

            if( have_rows('representations') ){
                while ( have_rows('representations') ) : the_row();
                    $departement        = get_sub_field('departement');
                    $date               = get_sub_field('date');
                    $lieu               = get_sub_field('lieu');
                    $ville_calendrier   = get_sub_field('ville');
                    $artiste            = get_sub_field('artiste_calendrier');
                endwhile;
            };
            array_push($table, array(
                    'id_calendrier'         => $post_id,
                    'titre_calendrier'      => $titre,
                    'date_calendrier'       => $date,
                    'ville_calendrier'      => $ville_calendrier,
                    'lieu_calendrier'       => $lieu,
                    'thumbnail_calendrier'  => $thumbnail,
                    'link'                  => $link,
                    'departement'           => $departement,
                    'artiste_calendrier'    => $artiste,
                )
            );
        };
    };
    usort($table, "sortByDate");
    $delete_if_less = date("Ymd");
    $table     = removeElementWithInferiorValue($table,'date_calendrier',$delete_if_less);
    return $table;
};



///////////////////////////////// Affichage des événements par défault

function resultDateDefault()
{
    $table          = queryPosts();
    $sliced         = array_slice($table, 0, 3);
    echo '<ul>';
        foreach($sliced as $table_un => $values){
            setlocale(LC_ALL, "fr_FR");
            $timestamp          = $values['date_calendrier'];
            $translate_Day      = strftime ( '%e' , strtotime($timestamp));
            $translate_Month    = strftime ( '%B' , strtotime($timestamp));
            if($values['thumbnail_calendrier'] == false){
                echo '<li>';
            }else{
                $bgImage = $values['thumbnail_calendrier'];
                echo '<li style="background-image:url('.$bgImage.'); ">';
            }
                ?>
                <div class="left_event">
                    <p class="cat_calendrier"><? echo $values['cat_calendrier']; ?></p>
                    <p class="titre_calendrier"><? echo $values['titre_calendrier']; ?></p>
                    <p class="artiste_calendrier"><? echo $values['artiste_calendrier']; ?></p>
                    <a href="<? echo $values['link']; ?>" class="link_calendrier">EN SAVOIR +</a>
                </div>
                <div class="right_event">
                    <p class="day_calendrier"><?
                        if($translate_Day == '1'){
                            echo $translate_Day;
                            echo "<sup>er</sup>";
                        }else{
                            echo $translate_Day;
                        } ?>
                    </p>
                    <p class="month_calendrier"><? echo $translate_Month; ?></p>
                    <p class="lieu_calendrier"><? echo $values['ville_calendrier'];?></p>
                </div>
                <?
            echo '</li>';
        };
    echo '</ul>';
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

add_action( 'wp_ajax_mon_action', 'mon_action' );
add_action( 'wp_ajax_nopriv_mon_action', 'mon_action' );
add_action( 'wp_ajax_mon_action_date', 'mon_action_date' );
add_action( 'wp_ajax_nopriv_mon_action_date', 'mon_action_date' );


///////////////////////////////// Affichage des postes filtré par département

function mon_action()
{
    global $_POST;
    $ville          = $_POST['ville'];
    $table          = queryPosts();
    $clear_table    = array_filter_by_value($table,'departement', $ville );
    $count          = count($clear_table);

    if($count > 3){
        $sliced = array_slice($clear_table, 0, 3);
    }elseif($count < 3){
        $array_merge_value  = removeElementWithValue($table, 'departement', $ville);
        $clear_array_to_add = removeElementWithInferiorValue($array_merge_value,'date_calendrier',$delete_if_less);
        $merge              = array_merge($clear_table, $clear_array_to_add);
        $sliced             = array_slice($merge, 0, 3);
    }else{
        $sliced = $clear_table;
    };

    echo '<ul>';
        foreach($sliced as $table_un => $values){
            setlocale(LC_ALL, "fr_FR");
            $timestamp          = $values['date_calendrier'];
            $translate_Day      = strftime ( '%e' , strtotime($timestamp));
            $translate_Month    = strftime ( '%B' , strtotime($timestamp));

            if($values['thumbnail_calendrier'] == false){
                echo '<li>';
            }else{
                $bgImage = $values['thumbnail_calendrier'];
                echo '<li style="background-image:url('.$bgImage.'); ">';
            }
                ?>
                <div class="left_event">
                    <p class="cat_calendrier"><? echo $values['cat_calendrier']; ?></p>
                    <p class="titre_calendrier"><? echo $values['titre_calendrier']; ?></p>
                    <p class="artiste_calendrier"><? echo $values['artiste_calendrier']; ?></p>
                    <a href="<? echo $values['link']; ?>" class="link_calendrier">EN SAVOIR +</a>
                </div>
                <div class="right_event">
                    <p class="day_calendrier"><?
                        if($translate_Day == '1'){
                            echo $translate_Day;
                            echo "<sup>er</sup>";
                        }else{
                            echo $translate_Day;
                        } ?>
                    </p>
                    <p class="month_calendrier"><? echo $translate_Month; ?></p>
                    <p class="lieu_calendrier"><? echo $values['ville_calendrier'];?></p>
                </div>
                <?
            echo '</li>';
        };
    echo '</ul>';
    wp_reset_postdata();
};


///////////////////////////////// Affichage des postes filtré par date

function mon_action_date()
{
    global $_POST;
    $date_event     = $_POST['date'];
    $table          = queryPosts();
    $clear_table    = array_filter_by_value($table,'date_calendrier', $date_event );
    $count          = count($clear_table);

    if($count > 3){
        $sliced = array_slice($clear_table, 0, 3);
    }elseif($count < 3){
        $array_merge_value  = removeElementWithValue($table, 'date_calendrier', $date_event);
        $clear_array_to_add = removeElementWithInferiorValue($array_merge_value,'date_calendrier',$delete_if_less);
        $merge              = array_merge($clear_table, $clear_array_to_add);
        $sliced             = array_slice($merge, 0, 3);
    }else{
        $sliced = $clear_table;
    };

    echo '<ul>';
        foreach($sliced as $table_un => $values){
            setlocale(LC_ALL, "fr_FR");
            $timestamp          = $values['date_calendrier'];
            $translate_Day      = strftime ( '%e' , strtotime($timestamp));
            $translate_Month    = strftime ( '%B' , strtotime($timestamp));

            if($values['thumbnail_calendrier'] == false){
                echo '<li>';
            }else{
                $bgImage = $values['thumbnail_calendrier'];
                echo '<li style="background-image:url('.$bgImage.'); ">';
            }
                ?>
                <div class="left_event">
                    <p class="cat_calendrier"><? echo $values['cat_calendrier']; ?></p>
                    <p class="titre_calendrier"><? echo $values['titre_calendrier']; ?></p>
                    <p class="artiste_calendrier"><? echo $values['artiste_calendrier']; ?></p>
                    <a href="<? echo $values['link']; ?>" class="link_calendrier">EN SAVOIR +</a>
                </div>
                <div class="right_event">
                    <p class="day_calendrier"><?
                        if($translate_Day == '1'){
                            echo $translate_Day;
                            echo "<sup>er</sup>";
                        }else{
                            echo $translate_Day;
                        } ?>
                    </p>
                    <p class="month_calendrier"><? echo $translate_Month; ?></p>
                    <p class="lieu_calendrier"><? echo $values['ville_calendrier'];?></p>
                </div>
                <?
            echo '</li>';
        };
    echo '</ul>';
    wp_reset_postdata();
};
?>