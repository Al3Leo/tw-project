<!DOCTYPE html>
<?php session_start(); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>carrello v1.0</title>
    <style>
        #carrello{
            border: 1px solid black;
        }
        th{
            border: 1px solid #ff0000;
        }
        td{
            border: 1px solid #36d700;
        }

    </style>
</head>
<body>
    <div id="carrello">
        <table id="carrello_tbl">
            <tr>
               <th>Nome</th>
                <th>Quantità</th>
                <th>Prezzo</th>
            </tr>
            <?php
             if (isset($_COOKIE['cart'])) {
                 if (isset($_COOKIE['cart']))
                     $cart = json_decode($_COOKIE['cart'], true);
                 $tot = 0;
                 foreach ($cart as $key => $value) {
                     $tot+=$value['prezzo'];
                     echo "<tr>";

                     echo "<td>". $value['nome'] . "</td>";
                     echo "<td></td>";
                     echo "<td>" . $value['prezzo'] . " €</td>";
                     echo "<td><a href='removeCart2.php?nome=" . $value['nome'] . "'>&#x1F5D1</a></td>";  // cestino Unicode

                     echo "</tr>";
                 }
             }else $tot = 0;
             echo "
             <tr>
                <td>totale:</td>
                <td></td>
                <td>$tot €</td>
            </tr>
             ";
             ?>
        </table>
    </div>
    <?php include_once 'prodottopage.php'?>
</body>
</html>