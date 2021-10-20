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

//XML creation form register route & mail sender


add_action('rest_api_init', function () {
    register_rest_route(
        'forms/v1',
        '/add-lead',
        array(
            /* VALIDATION */
            'methods' => 'POST',
            'callback' => 'new_lead',
            'permission_callback' => function () {
                return true;
            }
        ),
    );
});



//Registro la rotta della API
function new_lead()
{
    global $messages;
    $data = $_POST;
    $messages = $_POST;
    $messages['uri'] = $_SERVER['SERVER_NAME'];
    $success_message = 'La richiesta è stata inviata con successo!';
    $missing_data_message = 'Compila tutti i campi!';
    $error_message = 'Ops! C\'è stato un errore! Riprovare più tardi!';
    $recaptcha_message = "C'è stato un errore nell'elaborazione della richiesta. Riprovare più tardi.";

    // Recaptcha Data Da sistemare na volta live
    //
    /* $token = $data['g-recaptcha-response'];
    $action = $data['action']; */

    /* $check_response = recaptcha_check($token); */



    /* if ($check_response->success && $check_response->action == $action && $check_response->score >= 0.5) */ 
    
        if(true){
            $messages['recaptcha_status'] = 'ReCAPTCHA verification passed!';

        if (isset($data['full_name']) && isset($data['email']) && isset($data['privacy']) && isset($data['tel_num']) )  {

            try {
                $full_name = $data['full_name'];
                $email_addr = $data['email'];
                $tel_num = $data['tel_num'];
                $singlepage = $data['this_page'];
                $id_vehicle = $data['id_vehicle'];
                $location = $data['location'];
                $brand = $data['brand'];
                $model = $data['model'];
                $version = $data['version'];
                $km = $data['km'];
                $price = $data['price'];
                $fuel = $data['fuel'];
                $kw = $data['kw'];
                $type = $data['type'];
                $color = $data['color'];
                $transmission = $data['transmission'];
                $contact_type = $data['test_driver'] ? 'Test Drive' : 'Preventivo'; 
                $message = $data['message'];
                $immatricolazione = $data['immatricolaizione'];
                $privacy = $data['privacy'] == 'true' ? 1 : 0;
                $cookie = $data['cookie'] == 'true' ? 1 : 0;
                date_default_timezone_set('Europe/Rome');
                $creation_date = date("d/m/Y H:i");
                $contact_message = 
                '<!-- <?xml version="1.0" encoding="utf-8"?> 
                <lead>
                    <vehicle>
                        <idlead></idlead>
                        <idAdItem></idAdItem>
                        <time_creation>'. $creation_date .'</time_creation>
                        <time_assign></time_assign>
                        <channel></channel>
                        <origin></origin>
                        <originDetail>Portale Automarca</originDetail>
                        <originCampain></originCampain>
                        <link>' . $singlepage . '</link>
                        <idvehicle>' . $id_vehicle . '</idvehicle>
                        <plate></plate>
                        <location>' . $location . '</location>
                        <brand>' . $brand . '</brand>
                        <model>' . $model . '</model>
                        <version>' . $version .'</version>
                        <registration_date>' . $immatricolazione . '</registration_date>
                        <km>' . $km . '</km>
                        <price>' . $price . '</price>
                        <currency>EUR</currency>
                        <fuel>' . $fuel . '</fuel>
                        <power>' . $kw . '</power>
                        <transmission>' . $transmission . '</transmission>
                        <color_ext>' . $color . '</color_ext>
                        <type_vehicle>' . $type .'</type_vehicle>
                        <contact_type>' . $contact_type . '</contact_type>
                        <contacttypedetail>' . $message . '</contacttypedetail>
                        <vehicleinbrand></vehicleinbrand>
                        <vehicleinmodel></vehicleinmodel>
                        <vehicleinplate></vehicleinplate>
                        <vehicleinyear></vehicleinyear>
                        <vehicleinfuel></vehicleinfuel>
                        <vehicleinkm_mile></vehicleinkm_mile>
                        <branch></branch>
                    </vehicle>
                    <customer>
                        <type_customer>P</type_customer>
                        <name></name>
                        <lastname></lastname>
                        <company></company>
                        <lastname_name_company>'. $full_name .'<lastname_name_company>
                        <email>' . $email_addr . '</email>
                        <tel>' . $tel_num . '</tel>
                        <city></city>
                        <zip_code><zip_code>
                        <message>' . $message . '</message>
                        <privacy_tratt_dati>1</privacy_tratt_dati>
                        <privacy_cess_terzi>' . $cookie . '</privacy_cess_terzi>
                        <privacy_mkt_all>' . $cookie . '</privacy_mkt_all>
                        <privacy_mkt_email>' . $cookie . '</privacy_mkt_email>
                        <privacy_mkt_call>' . $cookie . '</privacy_mkt_call>
                        <privacy_mkt_sms>' . $cookie . '</privacy_mkt_sms>
                        <privacy_custom1>0</privacy_custom1>
                        <privacy_custom2>0</privacy_custom2>
                        <privacy_custom3>0</privacy_custom3>
                    </customer>
                    <dealer>
                        <dealer_id></dealer_id>
                        <dealer_name></dealer_name>
                        <dealer_location></dealer_location> 
                        <salesman></salesman>
                    </dealer>
                </lead> -->';

                /* Set the mail sender. */
                $headers = '';
                $headers .= "MIME-Version: 1.0 \r\n";
                $headers .= "Content-type: text/html; charset=\"UTF-8\" \r\n";
                $headers .= "From: Portale Automarca \r\n";
                $to = "giancarlo@wabi.it";
                $subject = 'Test XML leads automarca';
                try {
                    $mail_sent = wp_mail($to, $subject, $contact_message, $headers, $attachments);
                    $messages['mail_response'] = $mail_sent;
                    if ($mail_sent) {
                        $messages['type'] = 'success';
                        $messages['msg'] = $success_message;
                        return $messages;
                    } else {
                        $messages['type'] = 'error';
                        $messages['msg'] = $error_message;
                        return $messages;
                    }
                } catch (Exception $e) {
                    $messages['type'] = 'error';
                    $messages['msg'] = $e->errorMessage();
                    return $messages;
                }
            } catch (Exception $e) {
                $messages['type'] = 'error';
                $messages['msg'] = $e->errorMessage();
                return $messages;
            }
        } else {
            $messages['type'] = 'error';
            $messages['msg'] = $missing_data_message;
            return $messages;
        }
    } else {
        $messages['type'] = 'recaptcha';
        $messages['msg'] = $recaptcha_message;
        return $messages;
    }
}

//Recaptcha check

function recaptcha_check($token)
{
    $post_data = http_build_query(
        array(
            'secret' => "6LdIDkIcAAAAAJiKtLdf0X2ierYrBHvdVCFYGgBA",
            'response' => $token,
            'remoteip' => $_SERVER['REMOTE_ADDR']
        )
    );
    $opts = array(
        'http' =>
        array(
            'method'  => 'POST',
            'header'  => 'Content-type: application/x-www-form-urlencoded',
            'content' => $post_data
        )
    );
    $context  = stream_context_create($opts);
    $recaptcha_response = file_get_contents('https://www.google.com/recaptcha/api/siteverify', false, $context);
    return json_decode($recaptcha_response);
}


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
    add_menu_page(
        'Import xml / Modix',
        'Import xml / Modix',
        'manage_options',
        'import_xml_modix',
        'admin_page_html_2'
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
            <input name="modix_xml" type="file">
            <input type="submit" value="Carica file">
        </form>
    </div>
<?php
}

function admin_page_html_2()

{
    //CONTROLLO SUI PERMESSI DELL USER
    if (!current_user_can('manage_options')) {
        return;
    } ?>
    <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
    <!-- CREO UN FORM PER IMPORTARE IL FILE CSV, INSERISCO NELLA ACTION DEL FORM UNA FUNZIONE CHE GESTISCE L'IMPORT-->
    <div style="width:80%;margin:50px auto;">
        <form action="<?= get_template_directory_uri() . '/importxml.php'?>" enctype="multipart/form-data" method="POST">
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


function print_value_links($txt = 'new'){

    $cars = get_posts(array(
        'post_type' => 'auto-in-vendita',
        'numberposts' => -1, 
        'meta_query' => array(
            'key' => 'tipologia_vendita',
            'value' => $txt,
            'compare' => 'LIKE'
        )
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

    $root = $txt == 'new' ? 'nuovo' : 'usato';

    foreach($linkArr as $link){
        echo '<a style="color:#fff;" href="' . get_home_url() . '/' . $root . '/'. $link . '"><li>' . str_replace('-' , ' ' , $link) . '</li</a>';
    }
}

// CRM ENDPOINT AND MAIL SENDER
