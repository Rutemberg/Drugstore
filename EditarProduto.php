<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="js/jquery-2.2.2.min.js"></script>
        <script src="js/velocity.min.js"></script>
        <script src="js/velocity.ui.js"></script>
        <script type="text/javascript">
// Validação
            function ValidaFormulario() {
                // nome
                if (document.formProduto.nome.value == "") {
                    alert("Digite o nome do produto");
                    $('#nome').focus();
                    return false;
                }

                // descricao
                if (document.formProduto.descricao.value == "") {
                    alert("Digite a Descrição do produto");
                    $('#descricao').focus();
                    return false;
                }

//                valor
                if (document.formProduto.valor.value == "") {
                    alert("Digite o valor do produto");
                    $('#valor').focus();
                    return false;
                }

//                imagem
//                if (document.formProduto.imagem.value == "") {
//                    alert("Insira a url da imagem");
//                    $('#imagem').focus();
//                    return false;
//                }
                if (document.formProduto.categoria.value == "") {
                    alert("Selecione a categoria do produto");
                    $('#categoria').focus();
                    return false;
                }

                return true;
            }
        </script>
        <script type="text/javascript">
            $(document).ready(function () {
                function readURL(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();

                        reader.onload = function (e) {
                            $('#blah').attr('src', e.target.result);
                        }

                        reader.readAsDataURL(input.files[0]);
                    }
                }

                $("#alterarimagem").change(function () {
                    readURL(this);
                });

            });

        </script>
    </head>
    <body>
        <?php
        $cod = $_GET['codProduto'];
        require_once 'Controle/DAO/Conexao2.php';
        $query = mysql_query("SELECT * FROM produto WHERE codProduto = " . $cod);
        while ($resultado = mysql_fetch_assoc($query)) {
            ?>
            <?php
            $reslutcod = $resultado['codProduto'];
            $nome = $resultado['nome'];
            $descricao = $resultado['descricao'];
            $valor = $resultado['valor'];
            $imagem = $resultado['imagem'];
            $categoria = $resultado['categoria'];
            $estatusprod = $resultado['estatusprod'];
            $quantidade = $resultado['quantidade']
            ?>


            <div id="corpoform" style="height: 700px;position: relative">
                <p style="margin: 0;height: 50px;line-height: 50px;width: 90%;margin: 0 auto;font-size: 30px;text-transform: uppercase;color: #555;font-weight: bolder"><?php echo $nome ?></p>

                <div id="Menugerenciarfuncionario" >
                    <ul style="box-shadow: none">
                        <a href="Restrito.php?PAGINA=listarProduto">
                            <li style="opacity: .3">
                                <img style="width: 19%;height: auto;margin-top: 3px" src="Img/icon-estoque.png">
                                <p>Produtos</p>
                            </li>
                        </a>
                        <?php if ($estatusprod == "Ativo") { ?>
                            <li>
                                <img style="width: 15%;height: auto;margin-top: 3px" src="Img/Produto.png">
                                <p>Produto em estoque</p>
                            </li>
                            <a onclick="return confirm('Tem certeza de que deseja removê-lo do estoque?');" href="Restrito.php?PAGINA=removerProduto&&codProduto=<?php echo $reslutcod; ?>">
                                <li style="opacity: 0.3"> 
                                    <img style="width: 15%;height: auto;margin-top: 3px" src="Img/close.png">
                                    <p>Remover produto</p>
                                </li>
                            </a>
                        <?php } ?>
                        <?php if ($estatusprod != "Ativo") { ?>
                            <a href="Restrito.php?PAGINA=AdicionarnovamenteProduto&&codProduto=<?php echo $reslutcod; ?>">
                                <li style="opacity: 0.3">
                                    <img style="width: 15%;height: auto;margin-top: 3px" src="Img/Produto.png">
                                    <p>Mover para estoque</p>
                                </li>
                            </a>
                            <li> 
                                <img style="width: 15%;height: auto;margin-top: 3px" src="Img/close.png">                                <p>Produto removido<p>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
                <form id="form"
                      enctype="multipart/form-data"
                      name="formProduto"
                      method="POST"
                      action="Controle/controladorProduto.php?ACAO=alterar"
                      onSubmit="return ValidaFormulario()"> 

                    <div id="formedit" style="position: relative;height: 550px;">
                        <div style="float: left;height: 350px;position: relative;background: #f5f5f5">
                            <div style="float: left;text-align: center;width: 250px; height: 250px;overflow: hidden;margin-top: 50px;position: absolute;z-index: 4;background: transparent"><img id="blah" src="" alt="" style="height: auto;width:100%;margin: 0 auto"/></div>
                            <div style="float: left;text-align: center;width: 250px; height: 250px;overflow: hidden;margin-top: 50px;"><?php echo '<img src="Img/ImagensBanco/' . $imagem . '" style="width: 100%;height: auto;margin: 0px"/>' ?></div>

                            <label for="alterarimagem" class="labelinputfile" style="text-align: center;z-index: 4;position: absolute;bottom: 0;height: 30px;line-height: 30px;width: 248px;left: 0;padding: 0;background: white;border: 1px solid #d9d9d9;color: #555 !important">Trocar imagem</label>                  
                            <input type="file" id="alterarimagem" class="alterarimagem" name="alterarimagem" id="alterarimagem" style="
                                   position: absolute;                                  
                                   z-index: 3;
                                   margin: 0;
                                   bottom: 0;
                                   height: 30px;
                                   line-height: 30px;
                                   width: 240px;
                                   left: 0;
                                   "/>


                        </div>

                        <input class="codProduto" name="codProduto"
                               type="hidden"
                               value="<?php echo $reslutcod ?>">

                        <div class="infousuarios" style="margin-top: 30px;">
                            <label for="quantidade">Quantidade:</label>
                            <input class="quantidade" name="quantidade" id="quantidade"
                                   type="number"
                                   step="1"
                                   readonly="true"
                                   value="<?php echo $quantidade ?>">
                        </div>
                        <div class="infousuarios">
                            <label for="quantidade" style="width: 150px;">Atualizar Quantidade:</label>
                            <input class="atualizarquantidade" name="atualizarquantidade" id="atualizarquantidade"
                                   type="number"
                                   step="1"
                                   value="">
                        </div>
                        <div class="infousuarios">
                            <label for="nome">Nome:</label>
                            <input class="nome" name="nome" id="nome"
                                   type="text"
                                   value="<?php echo $nome ?>">
                        </div>
                        <div class="infousuarios" style="height: 150px">
                            <label for="email">Descrição:</label>
                            <textarea class="descricao" name="descricao" id="descricao"
                                      type="text" 
                                      style="color: #8e8e8e;font-weight: bolder;height: 100px;margin-top: 25px;width: 250px; resize: none;outline: none;    padding-left: 14px;border: none;font-family: 'News Gothic Oblique';font-size: 14px"><?php echo $descricao ?></textarea>
                        </div>
                        <div class="infousuarios">          
                            <label for="valor">Valor:</label>
                            <input class="valor" name="valor" id="valor"
                                   type="number"
                                   step="0.01"
                                   value="<?php echo $valor ?>"> 
                        </div>
                        <input class="imagem" name="imagem" id="imagem"
                               type="hidden"
                               value="<?php echo $imagem ?>">

                        <!--                        <label for="imagem">Alterar imagem:</label>    
                                                <label for="alterarimagem" class="labelinputfile" style=" width: 114px;line-height: 32px;text-align: center;z-index: 4;position: relative;">Escolher imagem</label>                  
                                                <input type="file" class="alterarimagem" name="alterarimagem" id="alterarimagem" style="
                                                       width: 250px;
                                                       height: 32px;
                                                       position: relative;
                                                       z-index: 3;
                                                       margin-top: -35px
                                                       "/>-->
                        <div class="infousuarios">
                            <label for="categoria">Categoria:</label>  <select id="categoria" name="categoria" >
                                <option value="<?php echo $categoria ?>" selected ><?php echo $categoria ?>
                                <option name="Medicamento"> Medicamento
                                <option name="Higiene"> Higiene
                                <option name="Estética"> Estética
                                <option name="Perfumaria"> Perfumaria
                                <option name="Maquiagem"> Maquiagem
                                <option name="Generico"> Generico
                                <option name="Acessorio"> Acessorio
                                <option name="Nutrição"> Nutrição
                                <option name="Dermo"> Dermo
                            </select>
                        </div>
                        <input class="submit" name="submit"
                               type="submit"
                               value="Atualizar" style="position: absolute;bottom: 0px; height: 50px;line-height: 50px;margin-right: -360px;right: 50%;width: 720px;padding: 0;font-size: 20px;font-weight: bolder;background: #333;color: white">
                               <?php if ($estatusprod == "Ativo") { ?>
                            <div style="position: absolute;top: 350px;width: 251px;height: 50px;line-height: 50px;font-size: 20px;background: #3ece6a;color: white">Em estoque</div>
                        <?php } ?>
                        <?php if ($estatusprod != "Ativo") { ?>
                            <div style="position: absolute;top: 350px;width: 251px;height: 50px;line-height: 50px;font-size: 20px;background: #ce3f3f;color: white">Removido</div>

                        <?php } ?>

                    </div>
                </form>
            </div>


        <?php } ?>

    </body>
</html>
