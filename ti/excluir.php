<?php
session_start();
include_once('../conn.php');
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$query = mysqli_query($conn, "DELETE FROM users where id_users='$id'");
if($query){
    $_SESSION['Mensagem'] = "Usuário excluído com sucesso";
    header('Location: index.php?p=3');
    exit;
}else{
    $_SESSION['mensagem'] = "Não foi possível realizar a exclusão.<br><hr><br>Por favor, tente mais tarde";
    header('Location: index.php?p=3');
    exit;
}