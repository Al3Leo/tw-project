<?php
/**
 * Questo script PHP utilizza la libreria Stripe per creare una sessione di checkout. 
 * Prende i dati del carrello dal parametro GET dell'URL, li elabora, e crea una sessione di pagamento con Stripe.
 * Se la sessione di checkout viene creata con successo, l'utente viene reindirizzato all'URL di Stripe per completare il pagamento.
 * In caso di errore, viene visualizzato un messaggio di errore.
 */


/**
 * Includere il file autoload.php generato da Composer.
 */
require __DIR__ . "/vendor/autoload.php";
/**
 * Ottenere l'host e l'URI corrente per costruire l'URL di conferma e di errore.
 */
$host = $_SERVER['HTTP_HOST'];
$uri = rtrim(dirname($_SERVER['REQUEST_URI']), '/\\');
$urlconfirm = "http://$host$uri/../../backend/ConfermaDinamica.php?confirmcheckout=true";
$urlerror = "http://$host$uri/../../pages/error/errorPagamento.php";
/**
 * Impostare la chiave segreta di Stripe.
 */
$stripe_secret_key = "sk_test_PRIVATE_KEY_DASHBOARD";//chiave da sostituire con la chiave segreta fornita da stripe
\Stripe\Stripe::setApiKey('');
/**
 *Gestione dati del carrello:
 *Se i dati del carrello sono presenti nell'URL ($_GET), vengono decodificati e convertiti in un array associativo. 
 *Ogni elemento del carrello viene trasformato in un formato richiesto da Stripe per creare una sessione di pagamento.
 */
if (isset($_GET['cart'])) {
    $cart = json_decode($_GET['cart'], true);

    $line_items = [];
    foreach ($cart as $item) {
        $line_items[] = [
            "quantity" => 1, 
            "price_data" => [
                "currency" => "usd",//valuta dollaro
                "unit_amount" => $item['prezzo'] * 100, // Converti in centesimi
                "product_data" => [
                    "name" => $item['nome']
                ]
            ]
        ];
    }

/*
 * Creazione della Sessione di Checkout: 
 * Utilizzando l'API di Stripe, viene creata una sessione di checkout con i dettagli del carrello. 
 * 1.In caso di successo, l'utente viene reindirizzato all'URL della sessione di checkout di Stripe. 
 * 2.In caso di errore, viene catturata e visualizzata l'eccezione.
 */
try {
    // sessione di checkout
    $checkout_session = \Stripe\Checkout\Session::create([
        "mode" => "payment",
        "success_url" => $urlconfirm,
        "cancel_url" => $urlerror,
        "line_items" => $line_items,
        "allow_promotion_codes" => true //per inserire il codice sconto
    
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