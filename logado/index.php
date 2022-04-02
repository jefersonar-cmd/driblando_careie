<?php
session_start();
$login = $_SESSION['login'];
$id = $_SESSION['id'];
$acesso = $_SESSION['acess'];

echo "Usuário: ". $login . ', portador do id: '. $id . ', com nível de acesso: ';
switch ($acesso){
    case 0:
        echo "Administrador";
        break;
    case 1:
        echo "Doutor";
        break;
    case 2:
        echo "Atendente";
        break;
    case 3:
        echo "Paciente";
        break;
}
echo "<br>";
?>
<a href="exit.php">Sair</a>