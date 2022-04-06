<?php
include("../conn.php");
session_start();
$id = @$_GET['id'];
$q_user_delete = mysqli_query($conn, "DELETE FROM consultas where id_consu='$id'");
if($q_user_delete){
    $_SESSION['cad_report'] = "Consulta deletado com sucesso";
    header('Location: index.php?p=2');
    exit;
}else{
    $_SESSION['cad_report'] = "Erro ao deletar consulta";
    header('Location: index.php?p=2');
    exit;
}
?>