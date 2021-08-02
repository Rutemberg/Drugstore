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
                    $('#infoconta').velocity("transition.slideRightOut", 100);
                    $('#infoconta2').velocity("transition.slideRightOut", 100);
                    $('#InfoLogin').velocity("transition.slideLeftIn", 100).delay(200);
                    $('#nome').velocity({borderColor: "#cc0000"}, 300);
                    $('#nome').delay(3000).velocity({borderColor: "#d9d9d9"}, 300).focus();
                    return false;
                }

                // descricao
                if (document.formProduto.descricao.value == "") {
                    $('#infoconta').velocity("transition.slideRightOut", 100);
                    $('#infoconta2').velocity("transition.slideRightOut", 100);
                    $('#InfoLogin').velocity("transition.slideLeftIn", 100).delay(200);
                    $('#descricao').velocity({borderColor: "#cc0000"}, 300);
                    $('#descricao').delay(3000).velocity({borderColor: "#d9d9d9"}, 300).focus();
                    return false;
                }

//                valor
                if (document.formProduto.valor.value == "") {
                    $('#InfoLogin').velocity("transition.slideRightOut", 100);
                    $('#infoconta2').velocity("transition.slideRightOut", 100);
                    $('#infoconta').delay(100).velocity("transition.slideLeftIn", 100);
                    $('#valor').velocity({borderColor: "#cc0000"}, 300);
                    $('#valor').delay(3000).velocity({borderColor: "#d9d9d9"}, 300).focus();
                    return false;
                }
                if (document.formProduto.quantidade.value == "") {
                    $('#InfoLogin').velocity("transition.slideRightOut", 100);
                    $('#infoconta2').velocity("transition.slideRightOut", 100);
                    $('#infoconta').delay(100).velocity("transition.slideLeftIn", 100);
                    $('#valor').velocity({borderColor: "#cc0000"}, 300);
                    $('#valor').delay(3000).velocity({borderColor: "#d9d9d9"}, 300).focus();
                    return false;
                }

//                imagem
                if (document.formProduto.imagem.value == "") {
                    $('#InfoLogin').velocity("transition.slideLeftOut", 100);
                    $('#infoconta').velocity("transition.slideLeftOut", 100);
                    $('#infoconta2').delay(100).velocity("transition.slideRightIn", 100);
                    $('#imagem').velocity({borderColor: "#cc0000"}, 300);
                    $('#imagem').delay(3000).velocity({borderColor: "#d9d9d9"}, 300).focus();
                    return false;
                }
                if (document.formProduto.categoria.value == "") {
                    $('#InfoLogin').velocity("transition.slideLeftOut", 100);
                    $('#infoconta').velocity("transition.slideLeftOut", 100);
                    $('#infoconta2').delay(100).velocity("transition.slideRightIn", 100);
                    $('#categoria').velocity({borderColor: "#cc0000"}, 300);
                    $('#categoria').delay(3000).velocity({borderColor: "#d9d9d9"}, 300).focus();
                    return false;
                }

                return true;
            }
        </script>
        <script type="text/javascript">
            $(document).ready(function () {
                $(".botaoproximo").click(function () {
                    $('#InfoLogin').velocity("transition.slideLeftOut", 100);
                    $('#infoconta').delay(200).velocity("transition.slideRightIn", 100);

                });
                $(".botaoanterior").click(function () {
                    $('#infoconta').velocity("transition.slideRightOut", 100);
                    $('#InfoLogin').delay(200).velocity("transition.slideLeftIn", 100);

                });
                $(".botaoproximo2").click(function () {
                    $('#infoconta').velocity("transition.slideLeftOut", 100);
                    $('#infoconta2').delay(200).velocity("transition.slideRightIn", 100);

                });
                $(".botaoanterior2").click(function () {
                    $('#infoconta2').velocity("transition.slideRightOut", 100);
                    $('#infoconta').delay(200).velocity("transition.slideLeftIn", 100);

                });
            });
        </script>
        <!--        Imagem preview-->
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

                $("#imagem").change(function () {
                    readURL(this);
                });

            });

        </script>

    </head>
    <body>

        <div id="Menugerenciarfuncionario">
            <ul>
                <a href="Restrito.php?PAGINA=cadastrarProduto">
                    <li>
                        <img style="width: 15%;height: auto;margin-top: 3px" src="Img/AddProduct.png">
                        <p>Novo Produto<p>
                    </li>
                </a>
                <a href="Restrito.php?PAGINA=listarProduto">
                    <li style="opacity: 0.3">
                        <img style="width: 15%;height: auto;margin-top: 3px" src="Img/Produto.png">
                        <p>Produtos<p>
                    </li>
                </a>
                <a href="Restrito.php?PAGINA=lixeira">
                    <li style="opacity: 0.3"> 
                                <img style="width: 15%;height: auto;margin-top: 3px" src="Img/close.png">                        <p>Produtos removidos<p>
                    </li>
                </a>
            </ul>
        </div>
        <div id="corpoform" style="width: 600px;height:450px;overflow: hidden;background: none">

            <form id="form"
                  enctype="multipart/form-data"
                  name="formProduto"
                  method="POST"
                  action="Controle/controladorProduto.php?ACAO=cadastrar"
                  onSubmit="return ValidaFormulario()">
                <div id="InfoLogin" style="margin-top: 60px">               
                    <input class="codProduto" name="codProduto"
                           type="hidden"
                           value="">
                    <p class="topformulario"></p>
                    <label for="nome">Nome:</label>
                    <input class="nome" name="nome" id="nome"
                           type="text"
                           value="">

                    <label for="email">Descrição:</label><br>
                    <textarea class="descricao" name="descricao" style="height: 90px;width: 250px"
                              type="text" id="descricao"
                              value="" style="width: 300px;height: 70px;"></textarea>
                    <input type="button" class="botaoproximo" value="Próximo">
                </div>

                <div id="infoconta" style="height: 300px;width: 325px;margin-top: 60px">
                    <p class="topformulario" style="font-size: 20px;">Preço Produto</p>
                    <label for="valor">Valor:</label>
                    <input class="valor" name="valor" id="valor"
                           type="number"
                           step="0.01"
                           value="">
                    <label for="quantidade">Quantidade:</label>
                    <input class="quantidade" name="quantidade" id="quantidade"
                           type="number"
                           step="1"
                           value="">
                    <input type="button" class="botaoanterior" value="Anterior">
                    <input type="button" class="botaoproximo2" value="Proximo">
                </div>
                <div id="infoconta2" style="height: 420px">
                    <div class="imagemprodutoview" style="width: 250px;height: 150px;border: 1px solid #d9d9d9;margin: 0 auto;margin-top: 10px;overflow: hidden"><img id="blah" src="" alt="" style="height: 100%;width: auto"/></div>
                    <label for="valor" style="margin-top: 10px;">Selecione uma imagem:</label>
                    <label for="imagem" class="labelinputfile" style=" width: 250px;line-height: 32px;text-align: center;z-index: 4;position: relative;">Escolher imagem</label>                  
                    <input type="file" name="imagem" id="imagem" style="
                           width: 247px;
                           height: 32px;
                           position: relative;
                           z-index: 3;
                           margin-top: -35px
                           "
                           />

                    <label for="categoria">Categoria:</label> <select name="categoria" id="categoria" style="
                                                                      float: left;
                                                                      width: 250px;
                                                                      border: 1px solid #d9d9d9;
                                                                      height: 32px;
                                                                      margin-left: 40px; 
                                                                      background-color: #f6f6f6;
                                                                      border-radius: 2px;
                                                                      font-family: 'News Gothic Oblique';
                                                                      ">
                        <option value="" selected> Selecione
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
                    <input type="button" class="botaoanterior2" value="Anterior">
                    <input class="submit" name="submit"
                           type="submit"
                           value="Cadastrar">
                </div>
            </form>

        </div>
    </body>
</html>
