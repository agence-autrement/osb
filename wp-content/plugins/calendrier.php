<?php

/*
Plugin Name: calendrier
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


add_action( 'wp_ajax_mon_action', 'mon_action' );
add_action( 'wp_ajax_nopriv_mon_action', 'mon_action' );


/************************ AJAX ************************/


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
}


/*Affichage des postes filtré par ville*/

function mon_action() {

    global $_POST;

    $ville = $_POST['ville'];

    echo $ville;

    $args = array( 'post_type'      => 'events'

    );

    $the_query = new WP_Query($args);

    if ( $the_query->have_posts() ) {

        $table = array();
        while ($the_query->have_posts()) {
            $the_query->the_post();

            $post_id = get_the_ID();
            $date = get_post_meta($post_id, 'date');
            $artiste = get_post_meta($post_id, 'artiste');
            $lieu = get_post_meta($post_id, 'lieu');
            $prix = get_post_meta($post_id, 'prix');
            $cat = get_post_meta($post_id, 'cat');
            array_push($table, array($post_id, $date[0], $artiste[0], $lieu[0], $prix[0], $cat[0]));
        };

        var_dump($table);

        $test = array_filter_by_value($table,'3', $ville );
        //var_dump($test);

        echo '<ul>';
        foreach($test as $table_un => $values){
            echo '<li>';
            foreach($values as $value){ echo '<p>'.$value.'</p>'; };
            echo '</li>';
        };
        echo '</ul>';

    };

    die();
};


/*Scirpts enqueues*/

function add_js_scripts() {
    wp_enqueue_script( 'script', get_template_directory_uri().'/js/script.js', array('jquery'), '1.0', true );

    // pass Ajax Url to script.js
    wp_localize_script('script', 'ajaxurl', admin_url( 'admin-ajax.php' ) );
}
add_action('wp_enqueue_scripts', 'add_js_scripts');


?>