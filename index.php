<?php
session_start();
if(!empty($_SESSION['mensagem'])){
    echo $_SESSION['mensagem'];
    unset($_SESSION['mensagem']);
    session_destroy();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Driblando a Cárie</title>
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="material_icons/material_icons.css">
</head>
<body>
    <h1>Área de login</h1>
    <section>
        <form action="valida.php" method="get">
            <label for="logi">Login</label>
            <input type="text" name="login" id="logi">
            <label for="senha">Senha</label>
            <input type="password" name="pass" id="senha">
            <input type="submit" name="enter" value="enter">
        </form>
    </section>
    <script src="bootstrap/bootstrap_js_4.1.3.js"></script>
    <script src="bootstrap/jquery-3.3.1.slim.min.js"></script>
    <script src="bootstrap/popper.min.js"></script>
</body>
</html>