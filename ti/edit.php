<?php
session_start();
include_once('../conn.php');
if(isset($_GET['envie'])){
    if(!empty($_GET['id_user']) && !empty($_GET['login']) && !empty($_GET['acesso'])){
        $id = $_GET['id_user'];
        $login = $_GET['login'];
        $acesso = $_GET['acesso'];

        if(!empty($_GET['email'])){
            $email = $_GET['email'];
            if(!empty($_GET['pass']) && !empty($_GET['repass'])){
                $pass = hash('sha256', $_GET['pass']);
                $repass = hash('sha256', $_GET['repass']);
                if($pass === $repass){
                    $query = mysqli_query($conn, "UPDATE users SET login='$login', pass='$pass', email='$email', fk_acess='$acesso' where id_users='$id'");
                    if($query){
                        $_SESSION['mensagem'] = "Alteração feita com sucesso!";
                        header(('Location: index.php?p=3'));
                        exit;
                    }else{
                        $_SESSION['mensagem'] = "Erro ao realizar alteração!";
                        header('Location: index.php?p=4');
                        exit;
                    }
                }else{
                    $_SESSION['mensagem'] = "Senhas se divergem!";
                    header('Location: index.php?p=4');
                    exit;
                }
            }else{
                $update = "UPDATE users SET login='$login', email='$email', fk_acess='$acesso' where id_users='$id'";
                $query = mysqli_query($conn, $update);
                if($query){
                    $_SESSION['mensagem'] = "Alteração feita com sucesso!";
                    header(('Location: index.php?p=3'));
                    exit;
                }else{
                    $_SESSION['mensagem'] = "Erro ao realizar alteração!";
                    header('Location: index.php?p=4');
                    exit;
                }
            }
        }else{
            $update = "UPDATE users SET login='$login', fk_acess='$acesso' where id_users='$id'";
            $query = mysqli_query($conn, $update);
            if($query){
                $_SESSION['mensagem'] = "Alteração feita com sucesso!";
                header(('Location: index.php?p=3'));
                exit;
            }else{
                $_SESSION['mensagem'] = "Erro ao realizar alteração! ". $update;
                header('Location: index.php?p=4');
                exit;
            }
        }
    }else{
        $_SESSION['mensagem'] = "Algum campo ficou vazio! ".$_GET['id_user']."-".$_GET['login']."-". $_GET['acesso'];
        header(('Location: index.php?p=4'));
        exit;
    }
}