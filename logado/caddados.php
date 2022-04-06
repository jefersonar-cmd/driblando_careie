<?php
require('../conn.php');
session_start();
if(isset($_GET['cadastrar'])){
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
    $senha = hash('sha256', $_GET['senha']);
    $repass = hash('sha256', $_GET['repsenha']);
    $acesso = $_GET['acesso'];
    if($senha == $repass){
        if(!empty($_GET['compl'])){
            if(!empty($_GET['email'])){
                $complemento = $_GET['compl'];
                $email = $_GET['email'];
                $insert = mysqli_query($conn, "INSERT INTO dados (nome, cpf, rg, telefone,endereco, numero, complemento, bairro, cidade, estado) VALUES ('$nome', '".$cpf."', '".$rg."','".$telefone."', '$endereco', '$numero', '$complemento', '$bairro', '$cidade','$estado')");
                if($insert){
                    $verifica = mysqli_query($conn, "SELECT * FROM dados WHERE nome='$nome'");
                    $v_result = mysqli_fetch_assoc($verifica);
                    $id_dados = $v_result['id_dados'];
                    $new_insert = mysqli_query($conn, "INSERT INTO users (login, pass, email,fk_acess, fk_dados) VALUES ('$login', '$senha', '$email', '$acesso','$id_dados')");
                    if($new_insert){
                        $_SESSION['cad_report'] = "Usuário cadastrado com sucesso";
                        header('Location: index.php?p=3');
                        exit;
                    }else{
                        $_SESSION['cad_report'] = "Não deu para cadastrar";
                        header('Location: index.php?p=3');
                        exit;
                    }
                }else{
                    $_SESSION['cad_report'] = "Erro ao cadastrar dados";
                    header('Location: index.php?p=3');
                    exit;
                }
            }else{
                $insert = mysqli_query($conn, "INSERT INTO dados (nome, cpf, rg, telefone,endereco, numero, bairro, cidade, estado) VALUES ('$nome', '".$cpf."', '".$rg."','".$telefone."', '$endereco', '$numero', '$bairro', '$cidade', '$estado')");
                if($insert){
                    $verifica = mysqli_query($conn, "SELECT * FROM dados WHERE nome='$nome'");
                    $v_result = mysqli_fetch_assoc($verifica);
                    $id_dados = $v_result['id_dados'];
                    $new_insert = mysqli_query($conn, "INSERT INTO users (login, pass, fk_acess,fk_dados) VALUES ('$login', '$senha', '$acesso', '$id_dados')");
                    if($new_insert){
                        $_SESSION['cad_report'] = "Usuário cadastrado com sucesso";
                        header('Location: index.php?p=3');
                        exit;
                    }else{
                        $_SESSION['cad_report'] = "Não deu para cadastrar";
                        header('Location: index.php?p=3');
                        exit;
                    }
                }else{
                    $_SESSION['cad_report'] = "Erro ao cadastrar dados";
                    header('Location: index.php?p=3');
                    exit;
                }
            }
        }else{
            if(!empty($_GET['email'])){
                $email = $_GET['email'];
                $insert = mysqli_query($conn, "INSERT INTO dados (nome, cpf, rg, telefone,endereco, numero, bairro, cidade, estado) VALUES ('$nome', '".$cpf."', '".$rg."','".$telefone."', '$endereco', '$numero', '$bairro', '$cidade', '$estado')");
                if($insert){
                    $verifica = mysqli_query($conn, "SELECT * FROM dados WHERE nome='$nome'");
                    $v_result = mysqli_fetch_assoc($verifica);
                    $id_dados = $v_result['id_dados'];
                    $new_insert = mysqli_query($conn, "INSERT INTO users (login, pass, email,fk_acess, fk_dados) VALUES ('$login', '$senha', '$email', '$acesso','$id_dados')");
                    if($new_insert){
                        $_SESSION['cad_report'] = "Usuário cadastrado com sucesso";
                        header('Location: index.php?p=3');
                        exit;
                    }else{
                        $_SESSION['cad_report'] = "Não deu para cadastrar";
                        header('Location: index.php?p=3');
                        exit;
                    }
                }else{
                    $_SESSION['cad_report'] = "Erro ao cadastrar dados";
                    header('Location: index.php?p=3');
                    exit;
                }
            }else{
                $insert = mysqli_query($conn, "INSERT INTO `dados`( `nome`, `cpf`, `rg`, `telefone`, `endereco`, `numero`, `bairro`, `cidade`, `estado`) VALUES ('$nome','".$_GET['cpf']."','".$_GET['rg']."','".$_GET['tel']."','$endereco','$numero','$bairro','$cidade','$estado')");
                if($insert){
                    $verifica = mysqli_query($conn, "SELECT * FROM dados WHERE nome='$nome'");
                    $v_result = mysqli_fetch_assoc($verifica);
                    $id_dados = $v_result['id_dados'];
                    $new_insert = mysqli_query($conn, "INSERT INTO users (login, pass, fk_acess,fk_dados) VALUES ('$login', '$senha', '$acesso', '$id_dados')");
                    if($new_insert){
                        $_SESSION['cad_report'] = "Usuário cadastrado com sucesso";
                        header('Location: index.php?p=3');
                        exit;
                    }else{
                        $_SESSION['cad_report'] = "Não deu para cadastrar";
                        header('Location: index.php?p=3');
                        exit;
                    }
                }else{
                    $_SESSION['cad_report'] = "Erro ao cadastrar dados";
                    header('Location: index.php?p=3');
                    exit;
                }
            }
        }
    }else{
        $_SESSION['cad_report'] = "Senhas incompatíveis";
        header('Location: index.php?p3');
        exit;
    }
}