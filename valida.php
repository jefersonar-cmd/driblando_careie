<?php
session_start();
include_once("conn.php");

if(isset($_GET['enter'])){
    if(!empty($_GET['login']) || !empty($_GET['pass'])){
        $login = $_GET['login'];
        $pass = hash('sha256', $_GET['pass']);

        $comand = "SELECT * FROM `usuarios` where login='$login' and pass='$pass'";
        $query = mysqli_query($conn, $comand);
        $result = mysqli_fetch_assoc($query);
        if($query){
            $_SESSION['acess'] = $result['acess'];
            $_SESSION['id'] = $result['id'];
            $_SESSION['login'] = $result['login'];
            header(('Location: logado/'));
            exit;
        }else{
            $_SESSION['mensagem'] = 'login: '.$login.' ou senha: '.$pass.' incorretos';
            header("Location: index.php");
            exit;
        }
    }else{
        $_SESSION['mensagem'] = "Algum campo vazio";
        header("Location: index.php");
        exit;
    }
}else{
    $_SESSION['mensagem'] = "Acione o botão";
    header("Location: index.php");
    exit;
}