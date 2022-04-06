<?php
switch ($acesso){
    case 1:
?>
        <header>
            <h1>Driblando a Cárie</h1>
            <ul>
                <li><a href="index.php?p=1">Home</a></li>
                <li><a href="index.php?p=2">Controle de Consultas</a></li>
                <li><a href="index.php?p=3">Controle de Perfis</a></li>
                <li><a href="index.php?p=4">Perfil</a></li>
                <li><a href="exit.php">Sair</a></li>
            </ul>
        </header>
<?php
        break;
    case 2:
?>
        <header>
            <h1>Driblando a Cárie</h1>
            <ul>
                <li><a href="index.php?p=1">Home</a></li>
                <li><a href="index.php?p=2">Consultas Marcadas</a></li>
                <li><a href="index.php?p=4">Perfil</a></li>
                <li><a href="exit.php">Sair</a></li>
            </ul>
        </header>
<?php
        break;
    case 3:
?>
        <header>
            <h1>Driblando a Cárie</h1>
            <ul>
                <li><a href="index.php?p=1">Home</a></li>
                <li><a href="index.php?p=2">Controle de Consultas</a></li>
                <li><a href="index.php?p=3">Controle de Perfis</a></li>
                <li><a href="index.php?p=4">Perfil</a></li>
                <li><a href="exit.php">Sair</a></li>
            </ul>
        </header>
<?php
        break;
    case 5:
?>
        <header>
            <h1>Driblando a Cárie</h1>
            <ul>
                <li><a href="index.php?p=1">Home</a></li>
                <li><a href="index.php?p=2">Consultas Agendadas</a></li><!--
                <li><a href="index.php?p=3">Suporte</a></li>-->
                <li><a href="index.php?p=4">Perfil</a></li>
                <li><a href="exit.php">Sair</a></li>
            </ul>
        </header>
<?php
    break;
}
?>