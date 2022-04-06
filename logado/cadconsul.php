<?php
include('../conn.php');
session_start();
if(isset($_GET['agendar'])){
    $medico = $_GET['select_medico'];
    $paciente = $_GET['select_paciente'];
    $data = $_GET['data'];
    $hora = $_GET['hora'];
    $obs = $_GET['obs'];
    $insert = mysqli_query($conn, "INSERT INTO `consultas`(`data_consu`, `hora`, `obs`, `fk_medico`, `fk_paciente`) VALUES ('$data','$hora','$obs','$medico','$paciente')");
    if($insert){
        $_SESSION['mensagem'] = "<script type='text/javascript'>window.alert('Agendamento feito com sucesso!')</script>";
        header('Location: index.php?p=2');
        exit;
    }else{
        $_SESSION['mensagem'] = "<script type='text/javascript'>window.alert('Agendamento feito com sucesso!')</script>";
        header('Location: index.php?p=2');
        exit;
    }
}
?>