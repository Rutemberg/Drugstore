<?php
// Verifica se foi feita alguma busca
// Caso contrario, redireciona o visitante pra home
if (($_GET['consulta']) == NULL) {
    header("Location:Restrito.php");
    exit;
}


require_once 'Controle/DAO/Conexao2.php';
// Salva o que foi buscado em uma variável
$busca = mysql_real_escape_string($_GET['consulta']);
// ============================================
// Monta outra consulta MySQL para a busca
$sql = "SELECT * FROM cliente WHERE (`ativo` = 1) AND ((`cpf` LIKE '%".$busca."%') OR (`nome` LIKE '%".$busca."%')) ORDER BY `idCliente` DESC";
// Executa a consulta
$query = mysql_query($sql);
// ============================================
// Começa a exibição dos resultados
echo "<ul>";
while ($resultado = mysql_fetch_assoc($query)) {
  $nome = $resultado['nome'];
  $cpf = $resultado['cpf'];
//  $link = '/noticia.php?id=' . $resultado['id'];
  
  echo "<li>";
      echo "{$nome}";
      echo "<p>{$cpf}</p>";
    echo "</a>";
  echo "</li>";
}
echo "</ul>";

$sqlF = "SELECT * FROM funcionario WHERE ((`cpf` LIKE '%".$busca."%') OR ('%".$busca."%')) ORDER BY `idFuncionario` DESC";
// Executa a consulta
$queryF = mysql_query($sqlF);
// ============================================
// Começa a exibição dos resultados
echo "<ul>";
while ($resultadoF = mysql_fetch_assoc($queryF)) {
  $nome = $resultadoF['nome'];
  $cpf = $resultadoF['cpf'];
//  $link = '/noticia.php?id=' . $resultado['id'];
  
  echo "<li>";
      echo "{$nome}";
      echo "<p>{$cpf}</p>";
    echo "</a>";
  echo "</li>";
}
echo "</ul>";