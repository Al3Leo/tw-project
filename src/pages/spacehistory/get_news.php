<?php
/** Recupero delle notizie di voli spaziali in base alla data
 * Questo file PHP utilizza un'API per recuperare notizie sui voli spaziali a partire da una data specificata.
 */
?>
<?php
if (isset($_GET['dob'])) {
    $dob = $_GET['dob'];
    $date = date('Y-m-d', strtotime($dob));/*Converto la data in formato 'Y-m-d' */
    $url = "https://api.spaceflightnewsapi.net/v4/articles/?limit=4&ordering=published_at&published_at_gte=$date";

    // Inizializza una sessione cURL
    $ch = curl_init();/*Inizializzo una nuova sessione cURL */
    curl_setopt($ch, CURLOPT_URL, $url);/*Imposto l'URL per la sessione cURL */
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);/*opzione per restituire il risultato come stringa */
    $response = curl_exec($ch);/*richiesta cURL e ottiene la risposta */
    curl_close($ch);/*chiudo la sessione cURL */

    if ($response !== false) {
        header('Content-Type: application/json');
        $articles = json_decode($response, true);
        $news = [];
        foreach ($articles['results'] as $article) {
            $news[] = [
                'title' => $article['title'],
                'published_at' => $article['published_at'],
                'summary' => $article['summary'],
                'image_url' => isset($article['image_url']) ? $article['image_url'] : '../../assets/images/starship.JPG',
                'url' => $article['url']
            ];
        }
        echo json_encode($news);
    } else {
        echo json_encode(['error' => 'Errore nella richiesta HTTP']);
    }
} else {
    echo json_encode(['error' => 'Data di nascita non valida']);
}
?>
