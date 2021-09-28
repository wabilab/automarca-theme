<?php

/** 
 * For more info: https://developer.wordpress.org/themes/basics/theme-functions/
 *
 */

// Theme support options
require_once(get_template_directory() . '/functions/theme-support.php');

// WP Head and other cleanup functions
require_once(get_template_directory() . '/functions/cleanup.php');

// Register scripts and stylesheets
require_once(get_template_directory() . '/functions/enqueue-scripts.php');

add_action('init', function () {

    add_rewrite_rule(
        '^nuovo/([\w]*)([\-]{0,1}[\w]*)([\-]{0,1}[\w]*)',
        'index.php?pagename=nuovo&param1=$matches[1]&param2=$matches[2]&param3=$matches[3]',
        'top'
    );

    add_rewrite_rule(
        '^usato/([\w]*)([\-]{0,1}[\w]*)([\-]{0,1}[\w]*)',
        'index.php?pagename=usato&param1=$matches[1]&param2=$matches[2]&param3=$matches[3]',
        'top'
    );

    add_rewrite_rule(
        '^km0/([\w]*)([\-]{0,1}[\w]*)([\-]{0,1}[\w]*)',
        'index.php?pagename=km0&param1=$matches[1]&param2=$matches[2]&param3=$matches[3]',
        'top'
    );
});

add_filter('query_vars', function ($vars) {
    $vars[] = 'pagename';
    $vars[] = 'param1';
    $vars[] = 'param2';
    $vars[] = 'param3';
    $vars[] = 'paged';
    return $vars;
});

add_action('rest_api_init', function () {
    register_rest_route('v2/', '/get_search_results_count', array(
        'methods' => 'GET',
        'callback' => 'get_search_results_count',
    ));
});


function get_search_results_count(WP_REST_Request $request)
{
    $query_arr = array(
        'relation' => 'AND'
    );
    foreach ($request['filters'] as $key => $value) {
        if ($value != '' && $value != 'all') :

            if ($key == 'maxPrice') {
                $meta_query = array(
                    'key' => 'prezzo',
                    'value' => $value,
                    'compare' => '<',
                    'type' => 'NUMERIC'
                );
            } else if($key == 'tipologia'){
                $meta_query = array(
                    'key' => 'tipologia_vendita',
                    'value' => $value,
                    'compare' => 'LIKE'
                );
            } else if($key == 'tipologia_veicolo'){
                $meta_query = array(
                    'key' => 'tipologia',
                    'value' => $value,
                    'compare' => 'LIKE'
                );
            } else if ($key == 'km') {
                $meta_query = array(
                    'key' => $key,
                    'value' => $value,
                    'compare' => '<',
                    'type' => 'NUMERIC'
                );
            } else if ($key == 'anno') {
                $meta_query = array(
                    'key' => 'anno_immatricolazione',
                    'value' => $value,
                    'compare' => '>=',
                    'type' => 'NUMERIC'
                );
            } else if ($key == 'novice') {
                if ($value == 'true') {
                    $meta_query = array(
                        'key' => 'cv',
                        'value' => 95,
                        'compare' => '<',
                        'type' => 'NUMERIC'
                    );
                }
            } else {
                $meta_query = array(
                    'key' => $key,
                    'value' => str_replace('_', ' ', $value),
                    'compare' => 'LIKE'
                );
            }
            $query_arr[] = $meta_query;
        endif;
    }

    $args = array(
        'post_type' => $request['post_type'],
        'posts_per_page' => -1,
        'meta_query' => $query_arr
    );

    $query = new WP_Query($args);

    $count = count($query->posts);

    return json_encode($count);
    /* return json_encode($count); */
}


add_action('admin_menu', 'add_admin_page');

function add_admin_page()
{
    add_menu_page(
        'Export / Import CSV', //TITOLO
        'Export / Import CSV', //TITOLO NEL MENU
        'manage_options', //CAPACITÀ
        'Export / Import CSV plugin', //SLUG
        'admin_page_html' //QUESTO CALL BACK STAMPA L HTML NELLA NUOVA TAB.
    );
}

function admin_page_html()
{
    //CONTROLLO SUI PERMESSI DELL USER
    if (!current_user_can('manage_options')) {
        return;
    } ?>
    <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
    <!-- CREO UN FORM PER IMPORTARE IL FILE CSV, INSERISCO NELLA ACTION DEL FORM UNA FUNZIONE CHE GESTISCE L'IMPORT-->
    <div style="width:80%;margin:50px auto;">
        <form action="<?= get_template_directory_uri() . '/importscript.php'?>" enctype="multipart/form-data" method="POST">
            <input name="csv" type="file">
            <input type="submit" value="Carica file">
        </form>
    </div>
<?php
}

add_action( 'before_delete_post', function( $id ) {
    $attachments = get_attached_media( '', $id );
    foreach ($attachments as $attachment) {
    wp_delete_attachment( $attachment->ID, 'true' );
    }
});


function print_value_links(){
    $cars = get_posts(array(
        'post_type' => 'auto-in-vendita',
        'numberposts' => -1,  
    ));
    $arr = array();
    foreach($cars as $c){
        $marca = get_field('field_60ffc3567d1c2' , $c -> ID);
        $model = get_field('field_60ffc3607d1c3' , $c -> ID);
        $fuel = get_field('field_60ffc3ac7d1c7' , $c -> ID);
        
        $arr[] = strtolower($marca) . '-' . explode(' ' , strtolower($model))[0] . '-' . explode(' ' , strtolower($fuel))[0];
    }

    $counted = array_count_values($arr);
    $linkArr = array();
    foreach($counted as $k => $v){
        if($v > 5){
            $linkArr[] = $k;
        };
    }
    foreach($linkArr as $link){
        echo '<a style="color:red;" href="' . get_home_url() . '/nuovo/'. $link . '"><li>' . str_replace('-' , ' ' , $link) . '</li</a>';
    }
}