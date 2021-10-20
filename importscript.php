<?php

require_once __DIR__ . "/vendor/autoload.php";
require_once(rtrim($_SERVER['DOCUMENT_ROOT'], '/') . '/automarca/wp-load.php');
require_once(rtrim($_SERVER['DOCUMENT_ROOT'], '/') . '/automarca/wp-admin/includes/post.php');
echo 'Ok';
if (!current_user_can('manage_options')) {
    return;
}
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES['csv']['name']);
move_uploaded_file($_FILES['csv']['tmp_name'], $target_file);
$my_big_array = [];
$separatore = '|';
if (($handlefile = fopen("{$target_file}", "r")) !== false) {
    while (($data  = fgetcsv($handlefile, 100000, $separatore))) {
        $my_big_array[] = $data;
    }
    fclose($handlefile);
};

// UNCOMMENT FOR DELETE OLD TOOL POSTS

$old_cars = get_posts(array(
    'post_type' => 'auto-in-vendita',
    'numberposts' => -1
));

foreach($old_cars as $old){
    wp_delete_post($old->ID , true);
}; 


$keyArray = array_slice($my_big_array, 0, 1);
$valueArray = array_slice($my_big_array, 1, count($my_big_array));
$new_id_arr = [];

foreach ($valueArray as $val) {
    $new_id_arr[] = $val[0];
}

foreach ($valueArray as $index => $value) {
    $post_type = 'auto-in-vendita';
    $id = post_exists($value[0] . ' ' . $value[3], '', '', $post_type);
    if ($id !== 0) {
        echo 'Item ' . $id . ' già esistente';
    } else {
        $args = array(
            'post_type' => $post_type,
            'post_status' => 'publish',
            'post_title' => $value[0] . ' ' . $value[3],
        );
        $id = wp_insert_post($args);
    
    //ID
    update_field('field_60ffc3467d1c1', $value[0], $id);
    // Marca
    update_field('field_60ffc3567d1c2', $value[1], $id);
    //Modello
    update_field('field_60ffc3607d1c3', $value[2], $id);
    // Descrizione
    update_field('field_60ffc36b7d1c4', $value[3], $id);

    switch ($value[6]) {
        case 'B':
            $alimentazione =  'benzina verde';
            break;
        case 'D':
            $alimentazione = 'diesel';
            break;
        case 'R':
            $alimentazione = 'ibrida';
            break;
        case 'M':
            $alimentazione = 'metano';
            break;

        }
            // Alimentazione
            update_field('field_60ffc3ac7d1c7', $alimentazione, $id);
            // Kw
            update_field('field_614c57eb09afa', $value[7], $id);
            // Km
            $km = intval($value[8]);
            update_field('field_60ffc3cd7d1c8', $value[8], $id);
            // Tipologia vendita
            if($km > 100){
                update_field('field_6151b58a76a39' , 'usata' , $id);
            } else if($km <= 100 && $km > 0){
                update_field('field_6151b58a76a39' , 'zero' , $id);
            } else{
                update_field('field_6151b58a76a39' , 'new' , $id);
            }
            // Data immatricolazione
            $date = $value[9];
            update_field('field_60ffc3e97d1c9', $date, $id);
            // Ex proprietari
            update_field('field_614c588dda08e', $value[10], $id);
            // Cilindrata
            update_field('field_60ffc42b7d1ca', $value[11], $id);
            // Posti 
            update_field('field_60ffc4507d1cc', $value[12], $id);
            // Omologazione
            update_field('field_614c59c5caa94', $value[13], $id);
            // Optionals 
            $optional = explode(',', $value[14]);
            $optionalArr = [];
            foreach ($optional as $index => $op) {
                $optionalArr[] = $op;
            }
            $optionals = '<li>' . implode('</li><li>', $optionalArr) . '</li>';
            update_field('field_60ffc4867d1d0', $optionals, $id);
            // Prezzo
            update_field('field_60ffc47b7d1cf', $value[16], $id);
            // Anno
            $year = substr(strval($value[9]), 6, 4);
            update_field('field_610298b45151f', $year, $id);
            // Colore
            update_field('field_60ffc3747d1c5', $value[4], $id);
            // Interni
            update_field('field_6151702bb5417', $value[5], $id);
            // Tipologia veicolo
            update_field('field_6151ba3ba3109' , 'privato' , $id);
            // search marca
            $s_marca = str_replace('-','_' ,str_replace(' ' , '_' , $value[1]));
            $s_modello = str_replace('-','_' ,str_replace(' ' , '_' , $value[2]));
            $s_alimentazione = str_replace('-','_' ,str_replace(' ' , '_' , $alimentazione));
            update_field('field_6151e1c1a16e5' , $s_marca , $id);
            update_field('field_6151e1daa16e6' , $s_modello , $id);
            update_field('field_6151e1eba16e7' , $s_alimentazione , $id);
    }
}
