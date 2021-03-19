<?php
$dbHost = '127.0.0.1';
$dbName = 'dbdottori';
$dbUser = 'root';
$connessione = mysqli_connect($dbHost, $dbUser);

if (!$connessione){
  die("Connessione fallita");
}
mysqli_select_db($connessione, $dbName)
  or die("Impossibile selezionare il database");
?>
