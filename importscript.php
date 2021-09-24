<?php

require_once __DIR__ . "/vendor/autoload.php";
/* require PhpOffice\PhpSpreadsheet;
require PhpOffice\PhpSpreadsheet\Reader\Xls;
require PhpOffice\PhpSpreadsheet\Spreadsheet; */
require_once(rtrim($_SERVER['DOCUMENT_ROOT'], '/') . '/automarca/wp-load.php');
require_once(rtrim($_SERVER['DOCUMENT_ROOT'], '/') . '/automarca/wp-admin/includes/post.php');
echo "<h1>YO</h1>";
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

$keyArray = array_slice($my_big_array, 0, 1);
$valueArray = array_slice($my_big_array, 1, count($my_big_array));
$new_id_arr = [];

foreach($valueArray as $val){
    $new_id_arr[] = $val[0];
}
$args = array(
    'post_type' => 'auto-in-vendita',
    'numberposts' => -1,
    'post_status' => 'any'
);
$oldAuto = get_posts($args);
foreach($oldAuto as $auto){
    if(!in_array($auto -> post_title , $new_id_arr)){
        wp_delete_post($auto -> ID , true);
    }
}
foreach ($valueArray as $index => $value) {
    $post_type = 'auto-in-vendita';
    $id = post_exists($value[0], '', '', $post_type);
    if ($id == 0) {
        $args = array(
            'post_type' => $post_type,
            'post_status' => 'publish',
            'post_title' => $value[0],
        );
        $id = wp_insert_post($args);
    }
    //ID
    update_field('field_60ffc3467d1c1', $value[0], $id);
    // Marca
    update_field('field_60ffc3567d1c2', $value[1], $id);
    //Modello
    update_field('field_60ffc3607d1c3', $value[2], $id);
    // Descrizione
    update_field('field_60ffc36b7d1c4', $value[3] , $id);
    
    switch ($value[6]) {
        case 'B':
            $alimentazione =  'benzina verde';
            break;
        case 'D':
            $alimentazione = 'diesel';
            break;
        case 'R' :
            $alimentazione = 'ibrida';
            break;
        case 'M':
            $alimentazione = 'metano';
            break;
    }
    // Alimentazione
    update_field('field_60ffc3ac7d1c7', $alimentazione , $id);
    // Kw
    update_field('field_614c57eb09afa' , $value[7] , $id);
    // Km
    update_field('field_60ffc3cd7d1c8' , $value[8] , $id);
    // Data immatricolazione
    $date = $value[9];
    update_field('field_60ffc3e97d1c9' , $date , $id);
    // Ex proprietari
    update_field('field_614c588dda08e' , $value[10] , $id);
    // Cilindrata
    update_field('field_60ffc42b7d1ca' , $value[11] , $id);
    // Posti 
    update_field('field_60ffc4507d1cc' , $value[12] , $id);
    // Omologazione
    update_field('field_614c59c5caa94' , $value[13] , $id);
    // Optionals 
    $optional = explode(',' ,$value[14]);
    $optionalArr = [];
    foreach($optional as $index => $op){
        $optionalArr[]= $op;
    }
    $optionals = '<li>' . implode('</li><li>' , $optionalArr) . '</li>';
    update_field('field_60ffc4867d1d0' , $optionals , $id);
    // Prezzo
    update_field('field_60ffc47b7d1cf' , $value[16] , $id);
    $year = substr(  strval($value[9]) , 6 ,4);
    update_field('field_610298b45151f' , $year ,$id);
}

?>