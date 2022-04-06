<?php
include_once("../conn.php");
session_start();

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TI</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../material_icons/material_icons.css">
</head>
<body>
    <div class="container">
        <?php
            if(!isset($_SESSION['mensagem'])){

            }else{
                echo $_SESSION['mensagem'];
                unset($_SESSION['mensagem']);
            }
        ?>
        <header>
            <h1>Cadastro Geral</h1>
            <ul>
                <li><a href="index.php?p=1">Home</a></li>
                <li><a href="index.php?p=2">Cadastro</a></li>
                <li><a href="index.php?p=3">Lista de Usuários</a></li>
                <li><a href="index.php?p=4">Editar</a></li>
                <li><a href="sair.php" id="sair">Sair</a></li>
            </ul>
        </header>
        <div class="caixas">
            <?php
            $pag = @$_GET['p'];
            switch ($pag) {
                case '1':
                    echo "<h1>Seja bem vindo! <br>Carinha do TI!</h1>";
                    break;
                case '2':
                    include('components/areacad.php');
                    break;
                case '3':
                    include('components/listcad.php');
                    break;
                case '4':
                    include('components/edicad.php');
                    break;
                default:
                    echo "<h1>Seja bem vindo!<BR> carinha do TI!</h1>";
                    break;
            }
            ?>
        </div>
        <?php
        include('components/footer.php')
        ?>
    </div>
    <!--<script src="script.js"></script>
    <script src="../js/jquery-3.6.0.js"></script>-->
</body>
</html>