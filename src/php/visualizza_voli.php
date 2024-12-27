<?php
// Configurazione della connessione al database
$host = 'localhost';
$dbname = 'progetto-tw';
$user = 'postgres';
$password = 'gerri';
$port='5432';

$connection_string = "host=$host dbname=$dbname user=$user password=$password";

//per connettermi:
$db=pg_connect($connection_string) or die('impossibile connettersi al database:'.pg_last_error());


// Recupera i dati dal form inseriti nella pagina prenotazione.html
$tipovolo = $_POST['tipovolo'];
$destinazione = $_POST['destinazione'];
$partenza = $_POST['partenza'];
$data_partenza = $_POST['data-partenza'];
$data_ritorno = isset($_POST['data-ritorno']) ? $_POST['data-ritorno'] : null;

// Prepara la query per recuperare i voli
/*$sql = "SELECT * FROM public.voli";
$ret=pg_query($db, $sql);*/
// Prepara la query per recuperare i voli
$query = "SELECT * FROM voli WHERE \"Destinazione\" = $1 AND \"Partenza\" = $2 AND \"Data_partenza\" = $3";
$params = [$destinazione, $partenza, $data_partenza];

if ($tipovolo === 'andataritorno' && $data_ritorno) {
    $query .= " AND \"Ritorno\" = $4";
    $params[] = $data_ritorno;
}

$result = pg_query_params($db, $query, $params);

if (!$result) {
    die("Errore nella query: " . pg_last_error());
}

?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Voli Disponibili</title>
</head>
<body>
<h1>Voli Disponibili</h1>
    <div id="risultati">
        <?php if (pg_num_rows($result) > 0): ?>
            <?php while ($volo = pg_fetch_array($result, null, PGSQL_ASSOC)): ?>
                <div>
                    <h3>Volo per <?php echo htmlspecialchars($volo['Destinazione']); ?></h3>
                    <p>Partenza: <?php echo htmlspecialchars($volo['Partenza']); ?></p>
                    <p>Data: <?php echo htmlspecialchars($volo['Data_partenza']); ?></p>
                    <p>Posti disponibili: <?php echo htmlspecialchars($volo['Posti_disponibili']); ?></p>
                    <p>Costo: €<?php echo htmlspecialchars($volo['Costo']); ?></p>
                    <form method="post" action="acquista_biglietto.php">
                        <input type="hidden" name="Volo_id" value="<?php echo $volo['Volo_id']; ?>">
                        <input type="text" name="nome_acquirente" placeholder="Nome Acquirente" required>
                        <button type="submit">Acquista</button>
                    </form>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>Nessun volo trovato per i criteri selezionati.</p>
        <?php endif; ?>
    </div>
    <?php pg_free_result($result); ?>
    <?php pg_close($db); ?>
</body>
</html>
