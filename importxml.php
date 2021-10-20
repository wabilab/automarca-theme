<?php 
    require_once(rtrim($_SERVER['DOCUMENT_ROOT'], '/') . '/automarca/wp-load.php');
    require_once(rtrim($_SERVER['DOCUMENT_ROOT'], '/') . '/automarca/wp-admin/includes/post.php');
    
    $old_cars = get_posts(array(
        'post_type' => 'auto-in-vendita',
        'numberposts' => -1
    ));
    foreach($old_cars as $old){
        wp_delete_post($old->ID , true);
    };
    

    $xml = simplexml_load_file('modix/modix.xml');
        $i = 0;
    foreach($xml -> vehiclePool -> vehicles -> vehicle as $v ){
        //ID
        $post_id = $v -> attributes()['cipher'];
        $post_type = 'auto-in-vendita';
        $id = post_exists($post_id , '', '', $post_type);
        if($id != 0){
            echo 'Item' . $id . ' gia esistente';
        } else{
            $args = array(
                'post_type' => $post_type,
                'post_status' => 'publish',
                'post_title' => $v -> attributes()['cipher']
            );

            $id= wp_insert_post($args);
            //MARCA
            $brand = strval($v -> mainData -> manufacturer);
            update_field('field_60ffc3567d1c2', $brand, $id);
            //MODEL
            $model = strval( $v -> mainData -> model);
            update_field('field_60ffc3607d1c3', $model, $id);
            //Fuel
            $fuel = strval($v -> mainData -> fuel);
            update_field('field_60ffc3ac7d1c7', $fuel, $id);
            $s_marca = str_replace('-','_' ,str_replace(' ' , '_' , $brand));
            $s_modello = str_replace('-','_' ,str_replace(' ' , '_' , $model));
            $s_alimentazione = str_replace('-','_' ,str_replace(' ' , '_' , $fuel));
            update_field('field_6151e1c1a16e5' , $s_marca , $id);
            update_field('field_6151e1daa16e6' , $s_modello , $id);
            update_field('field_6151e1eba16e7' , $s_alimentazione , $id);
            //submodel
            $submodel = strval($v -> mainData -> submodel);
            update_field('field_60ffc36b7d1c4', $submodel, $id);
            //KM
            $km = strval($v -> mainData -> mileage);
            update_field('field_60ffc3cd7d1c8', $km, $id);
            //Cilindrata
            $cc = strval($v -> mainData ->  cylinderCapacity);
            update_field('field_60ffc42b7d1ca', $cc, $id);
            //KW
            $kw =  strval($v -> mainData -> enginePower);
            update_field('field_614c57eb09afa', $km, $id);
            
            // Transmission
            $transmission = strval($v -> mainData -> transmission);
            //Categoria 
            $cat = strval($v -> mainData -> category);
            // $body style
            $stile = strval($v -> mainData -> bodyStyle);
            //optionals
            $opts = $v -> options;
            foreach($opts -> option as $o){
            if($o -> attributes()['id'] == '498'){
                $list =  strval($o -> value);
                };
            }
            update_field('field_60ffc4867d1d0', $list, $id);
        
            //color
            $colore = strval($v -> colors -> bodyColors -> bodyColor -> name . ' ' . $v -> colors -> bodyColors -> bodyColor -> paint);
            // Data immatricolazione
            $immatricolazione = strval($v -> dates -> date[0]);
            update_field('field_60ffc3e97d1c9', $immatricolazione, $id);
            // Anno immatricolazione
            $anno_immatricolazione = substr($immatricolazione , 0 , 4);
            update_field('field_610298b45151f' , $anno_immatricolazione ,$id);
            //Price 
            $price = strval($v -> prices -> price -> grossPrice);
            update_field('field_60ffc47b7d1cf', $price, $id);
            
            $img_fields=['field_60ffc4f5f26c6' , 'field_60ffc525f26c8' , 'field_60ffc528f26c9' , 'field_60ffc52af26ca' , 'field_60ffc52bf26cb' , 'field_60ffc52cf26cc' , 'field_60ffc52ef26cd' , 'field_60ffc530f26ce' , 'field_60ffc531f26cf' , 'field_60ffc533f26d0'];
            $img_index = 0;
            //LINK IMG
            foreach($v -> media -> images -> image  as $img){
                $img_url =  $v -> media -> images -> attributes()['url'] . $img -> attributes()['name']; 
                update_field($img_fields[$img_index] , $img_url , $id);
                $img_index++;
            } 
            
        }  
        $i++;
        echo $i . ' ' . $id . '<br>';
    }
?>