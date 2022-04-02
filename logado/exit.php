<?php
session_start();
if(!isset($_SESSION['id'])){
    header('Location: ../');
    exit;
}
unset($_SESSION['id']);
unset($_SESSION['acess']);
unset($_SESSION['login']);
session_destroy();
header('Location: ../');
exit;