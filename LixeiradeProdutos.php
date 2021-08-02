<html>
    <head>
        <meta charset=UTF-8">
        <title></title>
        <script src="script.js"></script>
        <script>
            function pesquisa(valor)
            {
                //FUNÇÃO QUE MONTA A URL E CHAMA A FUNÇÃO AJAX
                url = "Busca_nomeProdutodalixeira.php?valor=" + valor;
                ajax(url);
            }
        </script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#backformentrarmensage').velocity('transition.fadeIn', 300);
                $('#msglogin').delay(200).velocity('transition.shrinkIn', 300);
                $('#backformentrarmensage').click(function () {
                    $('#backformentrarmensage').velocity('transition.fadeOut', 300);
                    $('#msglogin').velocity('transition.shrinkOut', 300);

                });
            });
        </script>
    </head>

    <?php
    if (isset($_GET['ACAO'])) {
        $acao = $_GET['ACAO'];

        switch ($acao) {
            case 'listar':
                require_once 'Modelos/ClasseProduto.php';
                require_once 'Controle/DAO/ClasseProdutoDAO.php';

                $produtoDAO = new ClasseProdutoDAO();
                $produtos = array();
                $produtos = $produtoDAO->listarProduto();
                ?>
                <div id="Menugerenciarfuncionario">
                    <ul>
                        <a href="Restrito.php?PAGINA=cadastrarProduto">
                            <li style="opacity: 0.3">
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
                            <li> 
                                <img style="width: 15%;height: auto;margin-top: 3px" src="Img/close.png">
                                <p>Produtos removidos<p>
                            </li>
                        </a>
                    </ul>
                </div>
                <input type="text" name="nome" onKeyPress="pesquisa(this.value)" class="pesquisar" >

                <div class="listar" id="pagina">
                    <ul class="listarestiloprod">
                        <?php if (!empty($produtos) != null) { ?>
                            <?php if (!empty($_GET["valor"]) == null) { ?>
                                <?php foreach ($produtos as $produto) { ?>
                                    <?php if ($produto->estatusprod == "Removido") { ?>
                                        <a href="Restrito.php?PAGINA=alterarProduto&&codProduto=<?php echo $produto->codProduto; ?>">
                                            <li style="opacity: 0.4">
                                                <div style="float: left;text-align: center;width: 30%;height: 70%;overflow: hidden;margin-left: 10px;margin-top: 35px;"><?php echo '<img src="Img/ImagensBanco/' . $produto->imagem . '" style="width: 100%;height: auto;margin: 0px;margin-top:10%"/>' ?></div>
                                                <p class="nomelistar" style="margin-top: 30px;color: #555;font-size: 17px;overflow: hidden;height: 20px;text-align: right;font-weight: bolder"><?php echo $produto->nome; ?></p>
                                                <p style="margin-top: 10px;font-size: 15px;width: 60%;height: 100px;overflow: hidden"> <?php echo $produto->descricao; ?></p>
                                                <p style="margin-top: 5px;font-size: 13px;width: 60%;height: 30px;overflow: hidden">Quantidade em estoque: <?php echo $produto->quantidade; ?></p>
                                                <p style="font-size: 25px;color: #f94c3b;margin-top: 10px;text-align: right ">Preço: R$<?php echo $produto->valor = number_format($produto->valor, 2, ",","."); ?></p>
                                                <p style="color: #8e8e8e; position: absolute;top: 5px;left: 0;width: 27%;background:#212121;color: white;height: 25px;line-height: 25px;text-align: center"><?php echo $produto->categoria; ?></p>
                                                <?php if (isset($_SESSION['FuncionarioLogado']) && ($_SESSION['PerfilFuncionarioLogado'] < 3)) { ?>
                                                    <a class="excluirpermanente" onclick="return confirm('Tem certeza de que deseja exclui-lo permanentemente?');" href="Restrito.php?PAGINA=ExcluirProduto&&codProduto=<?php echo $produto->codProduto; ?>"></a>
                                                <?php } ?>
                                                <a class="alterar" style="color: white" href="Restrito.php?PAGINA=AdicionarnovamenteProduto&&codProduto=<?php echo $produto->codProduto; ?>">Mover para o estoque</a>
                                            </li>
                                        </a>

                                    <?php } ?>
                                <?php } ?>
                            <?php } ?>

                        <?php } ?>
                    </ul>
                </div>
                <?php
                if (isset($_SESSION['MENSAGEMDESATIVO'])) {
                    if (($_SESSION['MENSAGEMDESATIVO']) == 1) {
                        ?>
                        <div id="backformentrarmensage">
                        </div>
                        <div id="msglogin" style="display: none;width: 500px;height: 100px;line-height: 100px;position: absolute;top: 50%;left: 50%;margin-top: -50px;margin-left: -250px;z-index: 15;background: white;border-radius: 3px;box-shadow: 0 0px 10px rgba(0, 0, 0, 0.2)">
                            <p style="margin:0;padding: 0;font-size: 18px;color: #333;">Produto removido com sucesso!</p>
                        </div>

                        <?php $_SESSION['MENSAGEMDESATIVO'] += 1; ?> 
                        <?php
                    }
                }
                if (isset($_SESSION['MENSAGEMDESATIVO'])) {
                    if ($_SESSION['MENSAGEMDESATIVO'] == 2) {
                        unset($_SESSION['MENSAGEMDESATIVO']);
                    }
                }
                ?> 
                <?php
                if (isset($_SESSION['MENSAGEMEXCLUIDO'])) {
                    if (($_SESSION['MENSAGEMEXCLUIDO']) == 1) {
                        ?>
                        <div id="backformentrarmensage">
                        </div>
                        <div id="msglogin" style="display: none;width: 500px;height: 100px;line-height: 100px;position: absolute;top: 50%;left: 50%;margin-top: -50px;margin-left: -250px;z-index: 15;background: white;border-radius: 3px;box-shadow: 0 0px 10px rgba(0, 0, 0, 0.2)">
                            <p style="margin:0;padding: 0;font-size: 18px;color: #333;">Produto excluído com sucesso!</p>
                        </div>

                        <?php $_SESSION['MENSAGEMEXCLUIDO'] += 1; ?> 
                        <?php
                    }
                }
                if (isset($_SESSION['MENSAGEMEXCLUIDO'])) {
                    if ($_SESSION['MENSAGEMEXCLUIDO'] == 2) {
                        unset($_SESSION['MENSAGEMEXCLUIDO']);
                    }
                }
                ?> 
            <?php
//            session_start();
//            $_SESSION['clientes'] = serialize($clientes);
//            header('Location:Visao/listarCliente.php');
//
//                break;
//            case 'cadastrar':
//                require_once '../Modelos/ClasseProduto.php';
//                require_once '../Modelos/CLasseHistoricoFuncionarioProduto.php';
//                require_once 'DAO/ClasseProdutoDAO.php';
//
//                session_start();
//
//                $codproduto = $_POST['codProduto'];
//                $nome = $_POST['nome'];
//                $descricao = $_POST['descricao'];
//                $valor = $_POST['valor'];
//                $categoria = $_POST['categoria'];
//
//                $imagem = $_FILES["imagem"];
//                preg_match("/.(gif|bmp|png|jpg|jpeg){1}$/i", $imagem["name"], $ext);
//                $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
//                $caminho_imagem = "../Img/ImagensBanco/" . $nome_imagem;
//                move_uploaded_file($imagem["tmp_name"], $caminho_imagem);
//
//                $idFuncionario = $_SESSION['idFuncionarioLogado'];
//                $dataacao = date("y/m/d");
//                date_default_timezone_set("America/Sao_Paulo");
//                $horaacao = date("h:i:sa");
//                $acao = "Cadastrou";
//
//
//                $novoProduto = new ClasseProduto();
//                $novoProduto->setNome($nome);
//                $novoProduto->setCodProduto($codproduto);
//                $novoProduto->setDescricao($descricao);
//                $novoProduto->setValor($valor);
//                $novoProduto->setImagem($nome_imagem);
//                $novoProduto->setCategoria($categoria);
//
//                $novoHistoricoproduto = new CLasseHistoricoFuncionarioProduto();
//                $novoHistoricoproduto->setIdFuncionario($idFuncionario);
//                $novoHistoricoproduto->setDataAcao($dataacao);
//                $novoHistoricoproduto->setHoraacao($horaacao);
//                $novoHistoricoproduto->setAcao($acao);
//
//                $produtoDAO = new ClasseProdutoDAO();
//                $cadastrarProduto = $produtoDAO->cadastrarProduto($novoProduto, $novoHistoricoproduto);
//
//                if ($cadastrarProduto == FALSE) {
//                    echo "<script>alert('Cadastrado sem Sucesso');
//                        window.location.href='../Restrito.php?PAGINA=cadastrarProduto';
//                        </script>";
//                } else {
//                    echo "<script>alert('Cadastrado com Sucesso');
//                        window.location.href='../Restrito.php?PAGINA=listarProduto';
//                        </script>";
//                }
//                break;
//
//            case 'remover':
//                require_once './Modelos/ClasseProduto.php';
//                require_once './Modelos/CLasseHistoricoFuncionarioProduto.php';
//                require_once 'DAO/ClasseProdutoDAO.php';
//
//                if (isset($_GET['codProduto'])) {
//                    $codProduto = $_GET['codProduto'];
//                }
//
//                $idFuncionario = $_SESSION['idFuncionarioLogado'];
//                $dataacao = date("y/m/d");
//                date_default_timezone_set("America/Sao_Paulo");
//                $horaacao = date("h:i:sa");
//                $acao = "Removeu";
//
//                $novoHistoricoproduto = new CLasseHistoricoFuncionarioProduto();
//                $novoHistoricoproduto->setIdFuncionario($idFuncionario);
//                $novoHistoricoproduto->setDataAcao($dataacao);
//                $novoHistoricoproduto->setHoraacao($horaacao);
//                $novoHistoricoproduto->setAcao($acao);
//
//                $produtoDAO = new ClasseProdutoDAO();
//                $deletar = $produtoDAO->removerProduto($codProduto, $novoHistoricoproduto);
//
//                if ($deletar) {
//                    echo "<script>
//                        window.location.href='Restrito.php?PAGINA=listarProduto';
//                        </script>";
////                    echo "<script>alert('Excluído com Sucesso');
////                        window.location.href='Restrito.php?PAGINA=listarProduto';
////                        </script>";
//                }
//                break;
//
//            case 'adicionar':
//                require_once './Modelos/ClasseProduto.php';
//                require_once './Modelos/CLasseHistoricoFuncionarioProduto.php';
//                require_once 'DAO/ClasseProdutoDAO.php';
//
//                if (isset($_GET['codProduto'])) {
//                    $codProduto = $_GET['codProduto'];
//                }
//
//                $idFuncionario = $_SESSION['idFuncionarioLogado'];
//                $dataacao = date("y/m/d");
//                date_default_timezone_set("America/Sao_Paulo");
//                $horaacao = date("h:i:sa");
//                $acao = "Adicionou novamente";
//
//                $novoHistoricoproduto = new CLasseHistoricoFuncionarioProduto();
//                $novoHistoricoproduto->setIdFuncionario($idFuncionario);
//                $novoHistoricoproduto->setDataAcao($dataacao);
//                $novoHistoricoproduto->setHoraacao($horaacao);
//                $novoHistoricoproduto->setAcao($acao);
//
//                $produtoDAO = new ClasseProdutoDAO();
//                $deletar = $produtoDAO->adicionarProdutonovamente($codProduto, $novoHistoricoproduto);
//
//                if ($deletar) {
//                    echo "<script>
//                        window.location.href='Restrito.php?PAGINA=listarProduto';
//                        </script>";
////                    echo "<script>alert('Excluído com Sucesso');
////                        window.location.href='Restrito.php?PAGINA=listarProduto';
////                        </script>";
//                }
//                break;
//
//
//            case 'alterar':
//                require_once '../Modelos/ClasseProduto.php';
//                require_once '../Modelos/CLasseHistoricoFuncionarioProduto.php';
//                require_once 'DAO/ClasseProdutoDAO.php';
//                session_start();
//                $alterarfoto = $_FILES["alterarimagem"];
//
//                if (!empty($alterarfoto["name"])) {
//
//                    $codProduto = $_POST['codProduto'];
//                    $nome = $_POST['nome'];
//                    $descricao = $_POST['descricao'];
//                    $valor = $_POST['valor'];
//                    preg_match("/.(gif|bmp|png|jpg|jpeg){1}$/i", $alterarfoto["name"], $ext);
//                    $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
//                    $caminho_imagem = "../Img/ImagensBanco/" . $nome_imagem;
//                    move_uploaded_file($alterarfoto["tmp_name"], $caminho_imagem);
//                    $categoria = $_POST['categoria'];
//
//                    $idFuncionario = $_SESSION['idFuncionarioLogado'];
//                    $dataacao = date("y/m/d");
//                    date_default_timezone_set("America/Sao_Paulo");
//                    $horaacao = date("h:i:sa");
//                    $acao = "Alterou";
//
//                    $novoProduto = new ClasseProduto();
//                    $novoProduto->setCodProduto($codProduto);
//                    $novoProduto->setNome($nome);
//                    $novoProduto->setDescricao($descricao);
//                    $novoProduto->setValor($valor);
//                    $novoProduto->setImagem($nome_imagem);
//                    $novoProduto->setCategoria($categoria);
//
//                    $novoHistoricoproduto = new CLasseHistoricoFuncionarioProduto();
//                    $novoHistoricoproduto->setIdFuncionario($idFuncionario);
//                    $novoHistoricoproduto->setDataAcao($dataacao);
//                    $novoHistoricoproduto->setHoraacao($horaacao);
//                    $novoHistoricoproduto->setAcao($acao);
//                } else {
//                    $codProduto = $_POST['codProduto'];
//                    $nome = $_POST['nome'];
//                    $descricao = $_POST['descricao'];
//                    $valor = $_POST['valor'];
//                    $imagem = $_POST['imagem'];
//                    $categoria = $_POST['categoria'];
//
//                    $idFuncionario = $_SESSION['idFuncionarioLogado'];
//                    $dataacao = date("y/m/d");
//                    date_default_timezone_set("America/Sao_Paulo");
//                    $horaacao = date("h:i:sa");
//                    $acao = "Alterou";
//
//                    $novoProduto = new ClasseProduto();
//                    $novoProduto->setCodProduto($codProduto);
//                    $novoProduto->setNome($nome);
//                    $novoProduto->setDescricao($descricao);
//                    $novoProduto->setValor($valor);
//                    $novoProduto->setImagem($imagem);
//                    $novoProduto->setCategoria($categoria);
//
//                    $novoHistoricoproduto = new CLasseHistoricoFuncionarioProduto();
//                    $novoHistoricoproduto->setIdFuncionario($idFuncionario);
//                    $novoHistoricoproduto->setDataAcao($dataacao);
//                    $novoHistoricoproduto->setHoraacao($horaacao);
//                    $novoHistoricoproduto->setAcao($acao);
//                }
//
//                $produtoDAO = new ClasseProdutoDAO();
//                $alterarProduto = $produtoDAO->alterarProduto($novoProduto, $novoHistoricoproduto);
//
//                if ($alterarProduto == FALSE) {
//                    header('Location:../Restrito.php?&MSG=Cadastro Não Realizado');
//                } else {
//                    echo "<script>alert('Alteração realizada com Sucesso');
//                        window.location.href='../Restrito.php?PAGINA=listarProduto';
//                        </script>";
//                }
//                break;

            default:
                break;
        }
    }
    ?>

</html> 

