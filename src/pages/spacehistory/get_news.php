<?php
if (isset($_GET['dob'])) {
    $dob = $_GET['dob'];
    $date = date('Y-m-d', strtotime($dob));
    $url = "https://api.spaceflightnewsapi.net/v4/articles/?limit=4&ordering=published_at&published_at_gte=$date";

    // Inizializza una sessione cURL
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    if ($response !== false) {
        header('Content-Type: application/json');
        $articles = json_decode($response, true);
        $news = [];
        foreach ($articles['results'] as $article) {
            $news[] = [
                'title' => $article['title'],
                'published_at' => $article['published_at'],
                'summary' => $article['summary'],
                'image_url' => isset($article['image_url']) ? $article['image_url'] : '../../assets/images/space/terra.png',//DEVO METTERE IMMAGINE DEFAULT ANCORA
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
