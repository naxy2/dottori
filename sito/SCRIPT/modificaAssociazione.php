<?php
if (isset($_GET['paziente']) && isset($_GET['dottore'])){
    include("./connetti.php");
    //echo "UPDATE `associazione` SET `data`=NULL,`fkMedico`='{$_GET['dottore']}' WHERE fkPaziente='{$_GET['paziente']}'";
    mysqli_query($connessione, "UPDATE `associazione` SET `data`=NULL,`fkMedico`='{$_GET['dottore']}' WHERE fkPaziente='{$_GET['paziente']}'");
    header("location:../modificaAssociazione.php?paziente={$_GET['paziente']}");
}else{
    header("location:../modificaAssociazione.php");
}
?>