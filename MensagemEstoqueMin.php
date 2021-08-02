
<?php
require_once 'Controle/DAO/Conexao2.php';
$queryC = mysql_query("SELECT * from produto WHERE quantidade < 40 order by quantidade asc ");
$count = 0;
while ($resultadoC = mysql_fetch_assoc($queryC)) {
    $count++;
} if ($count == 1) {
    ?>
    <div id="mensagemestoqueproda" style="color: white;width: 200px;padding: 20px 30px;background: #333333;font-weight: bolder;font-size: 15px;box-shadow: 0 0 10px rgba(0,0,0, .2);border-radius: 3px">
            Existe <?php 
            echo $count?> produto com poucas unidades no estoque
     </div>
<?php
} if ($count > 1) {
    ?>
    <div id="mensagemestoqueproda" style="color: white;width: 200px;padding: 20px 30px;background: #333333;font-weight: bolder;font-size: 15px;box-shadow: 0 0 10px rgba(0,0,0, .2);border-radius: 3px">
            Existem <?php 
            echo $count?> produtos com poucas unidades no estoque
     </div>
<?php
} 