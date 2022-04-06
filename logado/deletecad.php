<?php
include("../conn.php");
session_start();
$id = @$_GET['id'];
$q_user_delete = mysqli_query($conn, "DELETE FROM users where fk_dados='$id'");
if($q_user_delete){
    $q_dados_delete = mysqli_query($conn, "DELETE FROM dados where id_dados='$id'");
    if($q_dados_delete){
        $_SESSION['cad_report'] = "Cadastro deletado com sucesso";
        header('Location: index.php?p=3');
        exit;
    }else{
        $_SESSION['cad_report'] = "Erro ao deletar dados";
        header('Location: index.php?p=3');
        exit;
    }
}else{
    $_SESSION['cad_report'] = "Erro ao deletar usuário";
    header('Location: index.php?p=3');
    exit;
}
?>