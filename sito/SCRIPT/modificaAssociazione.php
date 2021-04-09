<?php
if (isset($_POST['paziente']) && isset($_POST['dottore'])){
    include("./connetti.php");
    //echo "UPDATE `associazione` SET `data`=NULL,`fkMedico`='{$_GET['dottore']}' WHERE fkPaziente='{$_GET['paziente']}'";
    mysqli_query($connessione, "UPDATE `associazione` SET `data`=default,`fkMedico`='{$_POST['dottore']}' WHERE fkPaziente='{$_POST['paziente']}'");
    header("location:../modificaAssociazione.php?paziente={$_POST['paziente']}");
}else{
    header("location:../modificaAssociazione.php");
}
?>