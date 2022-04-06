<?php
require('../conn.php');
session_start();
if(isset($_GET['editar'])){
    $id = $_GET['id'];
    $nome = $_GET['nome'];
    $cpf = $_GET['cpf'];
    $rg = $_GET['rg'];
    $telefone = $_GET['tel'];
    $endereco = $_GET['endereco'];
    $numero = $_GET['numero'];
    $bairro = $_GET['bairro'];
    $cidade = $_GET['cidade'];
    $estado = $_GET['estado'];
    $login = $_GET['login'];
    $acesso = $_GET['acesso'];
    if(!empty($_GET['senha']) and !empty($_GET['repsenha'])){
        $senha = hash('sha256', $_GET['senha']);
        $repass = hash('sha256', $_GET['repsenha']);
        $complemento = $_GET['compl'];
        $email = $_GET['email'];
        $update_dados = mysqli_query($conn, "UPDATE `dados` SET `nome`='$nome',`cpf`='$cpf',`rg`='$rg',`telefone`='$telefone',`endereco`='$endereco',`numero`='$numero',`complemento`='$complemento',`bairro`='$bairro',`cidade`='$cidade',`estado`='$estado' WHERE `id_dados`='$id'");
        if($update_dados){
            $update_users = mysqli_query($conn, "UPDATE `users` SET `login`='$login',`pass`='$senha',`email`='$email',`fk_acess`='$acesso' WHERE `fk_dados`='$id'");
            if($update_users){
                $_SESSION['cad_report'] = "Cadastro do Usuário atualizado";
                header('Location: index.php?p=3');
                exit;
            }else{
                $_SESSION['cad_report'] = "Erro ao atualizar dados do login";
                header('Location: index.php?p=3');
                exit;
            }
        }else{
            $_SESSION['cad_report'] = "Erro ao atualizar parte de dados do usuário";
            header('Location: index.php?p=3');
            exit;
        }
    }else{
        $complemento = $_GET['compl'];
        $email = $_GET['email'];
        $update_dados = mysqli_query($conn, "UPDATE `dados` SET `nome`='$nome',`cpf`='$cpf',`rg`='$rg',`telefone`='$telefone',`endereco`='$endereco',`numero`='$numero',`complemento`='$complemento',`bairro`='$bairro',`cidade`='$cidade',`estado`='$estado' WHERE `id_dados`='$id'");
        if($update_dados){
            $update_users = mysqli_query($conn, "UPDATE `users` SET `login`='$login',`email`='$email',`fk_acess`='$acesso' WHERE `fk_dados`='$id'");
            if($update_users){
                $_SESSION['cad_report'] = "Cadastro do Usuário atualizado";
                header('Location: index.php?p=3');
                exit;
            }else{
                $_SESSION['cad_report'] = "Erro ao atualizar dados do login";
                header('Location: index.php?p=3');
                exit;
            }
        }else{
            $_SESSION['cad_report'] = "Erro ao atualizar parte de dados do usuário";
            header('Location: index.php?p=3');
            exit;
        }
    }
}elseif(isset($_GET['cadastrar'])){
    $id = $_GET['id'];
    $nome = $_GET['nome'];
    $cpf = $_GET['cpf'];
    $rg = $_GET['rg'];
    $telefone = $_GET['tel'];
    $endereco = $_GET['endereco'];
    $complemento = $_GET['compl'];
    $numero = $_GET['numero'];
    $bairro = $_GET['bairro'];
    $cidade = $_GET['cidade'];
    $estado = $_GET['estado'];
    $insert = mysqli_query($conn, "INSERT INTO dados (nome, cpf, rg, telefone,endereco, numero, complemento, bairro, cidade, estado) VALUES ('$nome', '".$cpf."', '".$rg."','".$telefone."', '$endereco', '$numero', '$complemento', '$bairro', '$cidade','$estado')");
    if($insert){
        $verifica = mysqli_query($conn, "SELECT * FROM dados WHERE nome='$nome'");
        $v_result = mysqli_fetch_assoc($verifica);
        $id_dados = $v_result['id_dados'];
        $update_users = mysqli_query($conn, "UPDATE `users` SET `email`='$email',`fk_dados`='$id_dados' WHERE `id_users`='$id'");
        if($update_users){
            $_SESSION['mensagem'] = "<script src='javascript.js'>window.alert('Cadastro atualizado')</script>";
            header('Location: index.php?p=4');
            exit;
        }else{
            $_SESSION['mensagem'] = "<script src='javascript.js'>window.alert('Erro ao atualizar o email')</script>";
            header('Location: index.php?p=4');
            exit;
        }
    }else{
        $_SESSION['mensagem'] = "<script src='javascript.js'>window.alert('Erro ao inserir dados')</script>";
        header('Location: index.php?p=4');
        exit;
    }
}