<?php
session_start();
if (!isset($_SESSION['username'])){
    header("location:../index.php");
}
?>

<?php
if (isset($_POST['paziente']) && isset($_POST['dottore'])){
    include("./connetti.php");
    //echo "UPDATE `associazione` SET `data`=NULL,`fkMedico`='{$_GET['dottore']}' WHERE fkPaziente='{$_GET['paziente']}'";
    mysqli_query($connessione, "UPDATE `paziente` SET `dataAssociazione`=CURRENT_TIMESTAMP(),`fkMedico`='{$_POST['dottore']}' WHERE CF='{$_POST['paziente']}'");
    header("location:../modificaAssociazione.php?paziente={$_POST['paziente']}");
}else{
    header("location:../modificaAssociazione.php");
}
?>