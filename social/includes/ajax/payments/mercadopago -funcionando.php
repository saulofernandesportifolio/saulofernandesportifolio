<?php

// fetch bootstrap
require('../../../bootstrap.php');

// Desactiva la notificación de errores deprecados en PHP
error_reporting(~E_DEPRECATED);

// Carga el autoload de Composer para gestionar dependencias
//require_once '../../../vendor/autoload.php';

// check AJAX Request
is_ajax();

// user access
user_access(true, true);

// check if Mercado Pago enabled
if (!$system['mercado_pago_enabled']) {
    modal("MESSAGE", __("Error"), __("This feature has been disabled by the admin"));
}

// Importa as classes necessarias do SDK de MercadoPago
use MercadoPago\Client\Preference\PreferenceClient;
use MercadoPago\MercadoPagoConfig;

$access_token = $system['mercado_pago_access_token'];

// Agrega credenciais ACCESS_TOKEN
MercadoPagoConfig::setAccessToken($access_token);

// Cria una instancia cliente de preferencias de MercadoPago
$client = new PreferenceClient();


// Define as URLs de retorno para os diferentes estados de pago
$backUrls = [
    "success" => $system['system_url'].'/upgraded',
    "failure" => $system['system_url'].'/erred',
    "pending" => $system['system_url'].'/erred'
];


   if($_POST['handle'] == 'packages'){
  
      // valid inputs
      if (!isset($_POST['package_id']) || !is_numeric($_POST['package_id'])) {
        _error(400);
      }

      // get package
      $package = $user->get_package($_POST['package_id']);

      if (!$package) {
        _error(400);
      }

      $dpid = "DEP - ".$user->_data['user_id'];
      $title = $package['name'];
      $price = $package['price'];
      $clidp = "CDP - ".$user->_data['user_id'];

    }

    // Cria una preferencia de pago conm os detalles do producto e outras configuracoes
      $preference = $client->create([
        "items" => [
            [
                "id" => $dpid,
                "title" => $title,
                "quantity" => 1,
                "unit_price" =>(double)$price
            ]
        ],
    

    // Descripción que aparecerá  do estrato do comprador
    "statement_descriptor" => "MI TIENDA",

    // Referencia externa para identificar a transação no sistema do vendedor
    "external_reference" => $clidp,
   
    // URLs de retorno configuradas anteriormente
    "back_urls" => $backUrls,

    // Configura a redirecao automática en caso de que pago seja aprovado
    "auto_return" => "approved",
    
    // Modo binario de pago (true significa que só se aceita pagos completos e no se permite um estado pendente)
    "binary_mode" => true,
    
]);


$link = $preference->init_point;
// return & exit

return_json(array('callback' => 'window.location.href = "' . $link . '";'));

?>

