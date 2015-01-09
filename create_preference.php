<?php
require_once "lib/mercadopago.php";
 
$mp = new MP('client_id', 'clien_secret');
 
$preference_data = array(
	"external_reference" => $_POST['external_reference'],
    "items" => array(
        array(
            "title" => $_POST['title'],
            "quantity" => 1,
            "currency_id" => "ARS",
            "unit_price" => floatval ($_POST['unit_price']),
		)
    )
);

$preference = $mp->create_preference($preference_data);

?>
 
<!doctype html>
<html>
    <head>
        <title>MercadoPago Checkout</title>
    </head>
    <body>
	<?php echo $preference["response"]["init_point"]; ?>
    </body>
</html>