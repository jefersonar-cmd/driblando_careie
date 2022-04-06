<?php
session_start();
include_once('../conn.php');
if(!empty($_SESSION['id'])){
    $login = $_SESSION['login'];
    $acesso = $_SESSION['acess'];
}else{
    $_SESSION['mensagem'] = "Usuário não logado, acesso negado a página";
    header('Location: ../');
    exit;
}

$query = mysqli_query($conn, "SELECT * FROM acesso where id_acess='$acesso'");
$dados = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Driblado a Cárie - <?php echo $dados['nome_acesso'];?></title>
    <link rel="stylesheet" href="includes/style.css">
    <link rel="stylesheet" href="../material_icons/material_icons.css">
</head>
<body>
    <div class="container">
        <?php
            include('components/nav.php');
            include('components/body.php');
            include('components/footer.php')
        ?>
    </div>
    <script src="includes/script.js"></script>
</body>
</html>