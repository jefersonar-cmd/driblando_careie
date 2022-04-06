<div class="caixas">
    <?php
    $page = @$_GET['p'];
    if($page == 1){
        echo "<h1>Seja Bem-Vindo<h1>";
    }elseif($page == 2){
        include "consultas.php";
    }elseif($page == 3){
        include "dados.php";
    }elseif($page == 4){
        include "perfil.php";
    }else{
        echo "<h1>Seja Bem-Vindo</h1>";
    }
    ?>
</div>