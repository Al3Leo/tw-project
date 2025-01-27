<?php
if (isset($_COOKIE['cart']))
    setcookie('cart', '', time() - 3600);
if (isset($_COOKIE['qty_total']))
    setcookie('qty_total', '', time() - 3600);
?>