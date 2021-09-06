<?php
require_once($_SERVER['DOCUMENT_ROOT'] .'/automarca/wp-load.php'); 
require_once($_SERVER['DOCUMENT_ROOT'] . '/automarca/wp-admin/includes/post.php');

/*
*Template Name:script
*/

require_once __DIR__ . "/vendor/autoload.php";
use PhpOffice\PhpSpreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xls;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

$args = array(
    "post_type" => 'auto-in-vendita',
    "numberposts" => -1
);

$query = get_posts($args);

/* foreach($query as $post){
    wp_delete_post($post -> ID , true);
};  */

$spreadsheet = PhpOffice\PhpSpreadsheet\IOFactory::load(__DIR__ . '/test.xls');
$spreadsheet -> setActiveSheetIndex(0);

$worksheet = $spreadsheet->getActiveSheet();


$rows = [];
foreach ($worksheet->getRowIterator() AS $row) {
    $cellIterator = $row->getCellIterator();
    $cellIterator->setIterateOnlyExistingCells(true); 
    foreach ($cellIterator as $cell) {
        $cells[] = $cell->getValue();
    }
    $rows[] = $cells;
    $cells = [];
}

$data = array_slice($rows,1 , count($rows));

/* echo '<pre>';print_r($data);exit; */


foreach($data as $cell){
    $post_type = 'auto-in-vendita'; 
    $id = post_exists($cell[1] , '' , '' , $post_type);
    if($id == 0){
        $args=array(
            'post_type' => $post_type,
            'post_status' => 'publish',
            'post_title' => $cell[1]
        );
        $id = wp_insert_post($args);
    };
    update_field('marca' , $cell[2] , $id);
    update_field('codice' ,$cell[1] ,$id);
    $model = str_replace('ª' , '' ,  $cell[3]);
    update_field('modello' ,$model , $id);
    update_field('descrizione' , $cell[4], $id);
    update_field('colore' , $cell[5] , $id);
    /* $vendibile = strtolower($cell[6]) == 'si' ?  true : false; */
    update_field('vendibilita' ,strtolower($cell[6]) ,$id);
    update_field('alimentazione' , $cell[7] , $id);
    update_field('km' , $cell[8] , $id);
    $date = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($cell[9]);
    update_field('data_immatricolazione' , $date , $id);
    update_field('cilindrata' , $cell[10] , $id);
    update_field('cv' , $cell[11] , $id);
    update_field('numero_posti' , $cell[12] , $id);
    update_field('numero_porte' , $cell[13] , $id);
    update_field('cambio' , $cell[14] , $id);
    update_field('prezzo' , $cell[15] , $id);
    $optional = explode(',' ,$cell[16]);
    $optionalArr = [];
    foreach($optional as $index => $op){
        $v = explode(' - ' , $op);
        $optionalArr[]= $v[1];
    }
    $optionals = '<li>' . implode('</li><li>' , $optionalArr) . '</li>';
    update_field('lista_optionals' , $optionals , $id );
    $anno = intval(substr($annoexp[count($annoexp)] , 0 , 4));
    update_field('anno_immatricolazione' , intval($date->format('Y')) ,$id);
}