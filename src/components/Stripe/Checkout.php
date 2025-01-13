<?php

require __DIR__ . "/vendor/autoload.php";
$host = $_SERVER['HTTP_HOST'];
$uri = rtrim(dirname($_SERVER['REQUEST_URI']), '/\\');
$urlconfirm = "http://$host$uri/../../backend/ConfermaDinamica.php?confirmcheckout=true";

$stripe_secret_key = "sk_test_51QgDccDj8L2aaNpFkDTpkoamjLejxEw7RAebnq1T6nwrEcJ3339RbYnQb0lqEPIvFUt7O3kyLg3AkjxEquc9tpWM004DUeg6sQ";
\Stripe\Stripe::setApiKey($stripe_secret_key);

// dati del carrello
if (isset($_GET['cart'])) {
    $cart = json_decode($_GET['cart'], true);

    $line_items = [];
    foreach ($cart as $item) {
        $line_items[] = [
            "quantity" => 1, // Puoi aggiornare questo per gestire quantità multiple
            "price_data" => [
                "currency" => "usd",//valuta dollaro
                "unit_amount" => $item['prezzo'] * 100, // Converti in centesimi
                "product_data" => [
                    "name" => $item['nome']
                ]
            ]
        ];
    }

// Verifica l'URL di successo
echo "URL di successo: " . $urlconfirm . "<br>";

try {
    // Crea la sessione di checkout
    $checkout_session = \Stripe\Checkout\Session::create([
        "mode" => "payment",
        "success_url" => $urlconfirm,
        "cancel_url" => "https://tuo-sito.com/cancel",
        "line_items" => $line_items
    ]);
    http_response_code(303);
    header("Location: " . $checkout_session->url);
} catch (\Stripe\Exception\ApiErrorException $e) {
    echo 'Errore API di Stripe: ',  $e->getMessage(), "\n";
} catch (Exception $e) {
    echo 'Eccezione generale: ',  $e->getMessage(), "\n";
}
}
?>