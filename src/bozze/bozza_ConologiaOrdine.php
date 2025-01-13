<html>
<head>
    <title></title>
    <meta charset="UTF-8">
    <style>
        table,td,th{
            border: 1px solid black;
        }
        table{
            margin: 3%;
            background-color: rgba(255, 255, 255, 0.7);
        }
        body{
            margin: 0;
            padding: 0;
            background-image: url("st_space.jpg");
            background-size: cover;
            background-repeat: no-repeat;
        }
    </style>
    <base href="../">
</head>
<body>
<? require_once '../components/header/header.php' ?>
    <table>
        <tr>
            <th>Descrizione</th>
            <th>Località</th>
            <th>Data di Partenza</th>
            <th>Prezzo</th>
            <th>Ticket</th>
        </tr>

        <tr>
            <td>Viaggio su marte</td>
            <td>Kennedy Space Center-Florida, USA</td>
            <td>20-05-2020</td>
            <td>799.99€</td>
            <td><a href="bozza_ticket.php" target="_blank">show ticket</a></td>
        </tr>
    </table>
<? require_once '../components/footer/footer.html' ?>
</body>
</html>