<?php
session_start();

if((isset($_SESSION['FuncionarioLogado'])) || (isset($_SESSION['ClienteLogado']))){
    session_unset();
    session_destroy();
    header("Location:../index.php");
}

