<?php
if (isset($_POST['username']) && isset($_POST['password'])){
    include('./connetti.php');
    $statement = $connessione -> prepare("SELECT * FROM credenziali WHERE username=? AND `password`=?");
    $statement -> bind_param("ss", $_POST['username'], $_POST['password']);
    $statement -> execute();
    $risultato = $statement -> get_result();

    session_start();
    if (mysqli_fetch_assoc($risultato)){
        $_SESSION['user'] = $_POST['username'];
    }else{
        $_SESSION['erroreCredenziali'] = true;
        echo("CULO");
    }
    header("location:../index.php");
}
?>