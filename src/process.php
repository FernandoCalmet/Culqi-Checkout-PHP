<?php

require "request/library/Request.php";
require "culqi/lib/culqi.php";

Requests::register_autoloader();

$SECRET_KEY = "My_Secret_Key";

$culqi = new Culqi\Culqi(array('api_key' => $SECRET_KEY));

$culqi->Charges->create(
    array(
        "amount" => $_POST['precio'],
        "capture" => true,
        "currency_code" => "PEN",
        "description" => $_POST['producto'],
        "email" => $_POST['email'],
        "installments" => 0,
        "source_id" => $_POST['token']
    )    
);

echo 'Successful!';

exit;