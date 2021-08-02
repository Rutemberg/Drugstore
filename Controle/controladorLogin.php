<?php
session_start();
require_once 'DAO/ClasseLoginDAO.php';

$email = $_POST["email"];
$senha = $_POST["senha"];

$loginDAO = new classeLoginDAO();
$usuario = $loginDAO->fazerLogin($email, $senha);

//if($usuario == NULL) {
//    header('Location:../index.php?PAGINA=principal&MSG=Email/Senha Incorretos');       
//}else{    
//    header('Location:../index.php?PAGINA=principal&MSG=Login com Sucesso'); 
//    
//}
if($usuario == NULL) {
    $_SESSION['mesagem'] += 1;
    header('Location:../index.php?MSG=Usuário/Senha Inválidos');       
}else{
    unset($_SESSION['mesagem']);
    header('Location:../index.php?LOGINSUCESSO=1');}