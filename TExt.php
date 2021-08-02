<html>
<head>
<title> Teste de validação de formulário em javascript </title>
<script language="javascript">
//Aqui todo o código javascript
//Função que verificará se nossos campos com preenchimento obrigatório estão mesmo preenchidos
//Caso não estejam, um alert será exibido
function verifica(){
if(document.form1.nome.value==""){
alert("Erro! O Campo \"Nome\" está em branco!");
document.form1.nome.focus();
return false;
}
if(document.form1.sobrenome.value==""){
alert("Erro! O Campo \"Sobrenome\" está em branco!");
document.form1.sobrenome.focus();
return false;
}
//Verificando se a combo do estado tem valor selecionado
if(document.form1.estado.value==""){
alert("Erro! Você precisa selecionar um estado!");
document.form1.estado.focus();
return false;
}
return true;
}
//Função check analiza a função verifica e envia o formulário ou para o processo
function check(){
if(verifica())
document.form1.submit();
}
//função teclaPress valida os campos caso o usuário
//Precione enter em um dos dois edits em vez de clicar no botão
function teclaPress(){
var tecla=event.keyCode;
if(tecla==13){
if(verifica())
return true;
else
return false
}
else
return tecla;
}
</script>
</head>
<body>
<form name="form1" action="arquivo.php">
Nome: <input type="text" name="nome" value="" onKeyPress="return teclaPress()"><br>
Sobrenome: <input type="text" name="sobrenome" value="" onKeyPress="return teclaPress();">
Estado: <select name="estado">
<option value="" selected> Selecione
<option value="SP"> São Paulo
<option name="RJ"> Rio de Janeiro
</select>
<input type="button" value="Enviar" OnClick="check();">
</form>
</body>
</html>