<?php
/*
 * Questo script gestisce la disconnessione di un utente.
 * Unsetta le var di sessione e distrugge la sessione
 */
session_start();
session_unset();
session_destroy();
header("Location: " . $_SERVER['HTTP_REFERER']);
?>
