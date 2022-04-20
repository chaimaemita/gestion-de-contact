<?php
require_once 'connect.php';

$login = new Login();

if (isset($_POST["log"])) {
    $psw= hash('sha256', $_POST["psw"]);
    $email=$_POST["email"];

    $result = $login->login($_POST["email"], $psw);
    if (isset($_POST["remb"])) {
        setcookie('email',$email,time()+60);
        setcookie('psw',$_POST["psw"],time()+60);
    }

    if ($result == 1) {
        session_start();
        $_SESSION["login"] = true;
        $_SESSION["id"] = $login->idUser();
        $_SESSION["name"] = $login->name();
        header("Location: profile.php");
        
    }elseif ($result == 10) {
        echo "<script> alert('WRONG PASSWORD')  </script>";
    }elseif ($result = 100) {
        echo "<script> alert('USER NOT REGISTRED')  </script>";
    }
}
    

?>