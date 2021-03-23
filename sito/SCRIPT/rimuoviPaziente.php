<?php
if (isset($_POST['paziente'])){
    $paziente = $_POST['paziente'];
    include("./connetti.php");
    mysqli_query($connessione, "DELETE FROM paziente WHERE CF='$paziente'");
}
header("location:../rimuoviPaziente.php");
?>