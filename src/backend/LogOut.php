<?php
/*
 * unsetta le var di sessione e la sessione
 */
session_start();
session_unset();
session_destroy();
header("Location: " . $_SERVER['HTTP_REFERER']);
?>
