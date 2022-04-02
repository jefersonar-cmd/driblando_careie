<?php
$conn = mysqli_connect("localhost","root","","dentista");
if(!$conn){
    die('Não foi possivel conectar ao banco' . mysqli_error());
}