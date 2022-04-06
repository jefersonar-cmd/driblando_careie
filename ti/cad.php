<?php
include_once('../conn.php');
session_start();
try {
    if(!empty($_GET['login']) && !empty($_GET['pass']) && !empty($_GET['acesso']))
    {
        $login = $_GET['login'];
        $pass = hash('sha256', $_GET['pass']);
        $acesso = $_GET['acesso'];
        if(!empty($_GET['email'])){
            $email = $_GET['email'];
            $cadastro = "INSERT INTO users (login, pass, email, fk_acess) VALUES ('$login', '$pass', '$email', '$acesso')";
            $query = mysqli_query($conn, $cadastro);
            if($conn->affected_rows > 0){
                $_SESSION['mensagem'] = "Cadastro realizado com sucesso";
                header('Location: index.php?p=3');
                exit;
            }
        }else{
            $cadastro = "INSERT INTO users (login, pass, fk_acess) VALUES ('$login', '$pass', '$acesso')";
            $query = mysqli_query($conn, $cadastro);
            if($conn->affected_rows > 0){
                $_SESSION['mensagem'] = "Cadastro realizado com sucesso<br>Usuário '$login' se encontra na lista de users";
                header('Location: index.php?p=3');
                exit;
            }
        }
    }else{
        $_SESSION['mensagem'] = "algum campo ficou vazio";
        header('Location: index.php?p=2');
        exit;
    }
} catch (Exeption $e) {
    echo $e -> getMessage ();
}