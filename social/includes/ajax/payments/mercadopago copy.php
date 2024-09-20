<?php

/**
 * Integración básica de Checkout Pro de Mercado Pago
 * usando el SDK versión 3 para PHP y el SDK JS versión 2
 *
 * @author mroblesdev
 */


// fetch bootstrap
require('../../../bootstrap.php');
// Carga el autoload de Composer para gestionar dependencias
require_once '../../../vendor/autoload.php';

// Importa las clases necesarias del SDK de MercadoPago
//use MercadoPago\Client\Preference\PreferenceClient;
//use MercadoPago\MercadoPagoConfig;
//use MercadoPago\Exceptions\MPApiException;

// check AJAX Request
is_ajax();

// user access
user_access(true, true);

// check if Mercado Pago enabled
if (!$system['mercado_pago_enabled']) {
    modal("MESSAGE", __("Error"), __("This feature has been disabled by the admin"));
}


// get package
$package = $user->get_package($_POST['package_id']);


//$access_token = $system['mercado_pago_access_token'];

$access_token = 'APP_USR-6316364010735085-070322-fbcc7a21d0d10e6c4be909d4c9db54ef-322071874';

//var_dump($access_token);

// Agrega credenciales ACCESS_TOKEN
MercadoPago\SDK::setAccessToken($access_token);

$preference = new MercadoPago\Preference();

$item = new MercadoPago\Item();
$item->title = 'Plano 30';
$item->quantity = 1;
$item->unit_price = (double)14.90;
$preference->items = array($item);

$preference->back_urls = array(
    "success" => 'http://localhost/social/success';
    "failure" => 'http://localhost/social/failure';
    "pending" => 'http://localhost/social/pending';
);

$preference->notification_url = 'http://localhost/social/notificar.php';

$preference->external_reference = '5';

$preference->save();

$link = $preference->init_point;

echo $link;