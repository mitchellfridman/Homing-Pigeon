<?php 
require './vendor/autoload.php';
require_once 'includes/functions.inc.php';
header('Content-Type', 'application/json');

// \Stripe\Stripe::setApiKey("sk_test_51LHDBnAiKphMTOH0aCsekJKXb0rPrhatFz4vMhk6GEkISmE70XYS61FhV1pWBUlEwRIUb4V0zaGzahpiSsNi5tGl00SovKBKcB");
// $session = Stripe\Checkout\Session::create([]);

$stripe = new Stripe\StripeClient("sk_test_51LHDBnAiKphMTOH0aCsekJKXb0rPrhatFz4vMhk6GEkISmE70XYS61FhV1pWBUlEwRIUb4V0zaGzahpiSsNi5tGl00SovKBKcB");
$session = $stripe->checkout->sessions->create([
    "success_url" => "successful-purchase.php",
    "cancel_url" => "cancel.php", // make this page
    "payment_method_types" => ['card'],
    "mode" => 'payment',
    "line_items" => [
        [
          "price_data" => [
            "currency" => "cad",
            "product_data" => [
                "name" => "Poutine",
                "description" => "Poutine postcard"
            ],
            "unit_amount" => 999 //unit price is in smallest unit of currency, so Canadian cents
          ],
          "quantity" => 1
        ]
    ]
        ]);

echo json_encode($session);

?>