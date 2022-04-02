<?php
session_start();
include_once('../conn.php');
$login = $_SESSION['login'];
$id = $_SESSION['id'];
$acesso = $_SESSION['acess'];
$query = mysqli_query($conn, "SELECT * FROM acesso where id_acess='$acesso'");
$dados = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Driblado a Cárie - <?echo $dados['nome_acesso'];?></title>
    <link rel="stylesheet" href="includes/style.css">
</head>
<body>
    <div class="container">
        <?
            include('components/nav.php');
        ?>
    </div>
    <script src="includes/script.js"></script>
</body>
</html>