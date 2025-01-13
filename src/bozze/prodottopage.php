<html>
<?php session_start()
/*
 * iniziate sempre la sessione
 * fate un form di tipo post e come valore nascosto mettete l'idevento del database
 * come action mettete cartAdd.php
 * */
?>
<br>
<h1>
    viaggio orbitale
</h1>
<form method="POST" action="addCart2.php">
    <input type="hidden" name="id" value="1" />
    <input type="submit" value="add"/>
</form>
<h1>
    viaggio marziano
</h1>
<form method="POST" action="cartAdd2.php">
    <input type="hidden" name="id" value="2" />
    <input type="submit" value="add"/>
</form>
</html>