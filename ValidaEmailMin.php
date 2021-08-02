<?php
#Verifica se tem um email para pesquisa
if(isset($_POST['email'])){ 

    #Recebe o Email Postado
    $emailPostado = $_POST['email'];

    #Conecta banco de dados 
    require_once 'Controle/DAO/Conexao3.php';
    $sql = mysqli_query($con, "SELECT * FROM cliente WHERE email = '$emailPostado'") or print mysql_error();
    $sql2 = mysqli_query($con, "SELECT * FROM funcionario WHERE email = '$emailPostado'") or print mysql_error();

    #Se o retorno for maior do que zero, diz que já existe um.
    if(mysqli_num_rows($sql)>0 || mysqli_num_rows($sql2)>0) 
        echo json_encode(array('email' => 'Email já cadastrado')); 
    else 
        echo json_encode(array('email' => 'Email:' )); 
}
?>