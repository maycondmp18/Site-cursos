<?php
    include 'configuracao.php';
    include 'conexao.php';
    $curso = $_GET['curso'];
    $aluno = $_GET['aluno'];

    if (empty($curso) || empty($aluno)) {
        header("location: ../courses.php");
    }

    $sql = $conn->query("SELECT * FROM cursos WHERE id_curso = '$curso'");
    $row = $sql->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>PagSeguro</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/personalizado.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="row">

                <h1 class="display-4">Finalizar a Compra</h1>

                <div class="col-md-4 order-md-2 mb-4">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col" style="text-align: center;">PRODUTO</th>
                                <th scope="col" style="text-align: center;">PREÇO (R$)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                
                                <th scope="row" style="text-align: center;">Certificado</th>
                                <input type="hidden" value="Certificado" id="produto">

                                <th scope="row" style="text-align: center;"><?php echo number_format(0, 2, '.', ''); ?></th>      
                                <input type="hidden" value="<?php echo 0 ?>" id="preco">

                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col-md-8 order-md-1">
                    <span class="endereco" data-endereco="<?php echo URL; ?>"></span>
                    <span id="msg"></span>
                    <form name="formPagamento" action="" id="formPagamento">

                        <span id="msg"></span>

                        <h4>Dados do Comprador</h4>
                        
                        <?php
                            $sql_code = $conn->query("SELECT * FROM alunos WHERE id = '$aluno'");
                            $ln = $sql_code->fetch(PDO::FETCH_ASSOC);
                        ?>
                        <div class="mb-3">
                            <label>Nome</label>
                            <input type="text" name="senderName" class="form-control" id="senderName" placeholder="Nome completo" value="<?php echo $ln['nome'] ?>" required>
                        </div>

                        <div class="mb-3">
                            <label>E-mail</label>
                            <input type="email" name="senderEmail" class="form-control" id="senderEmail" placeholder="E-mail do comprador" value="c47379838778066159517@sandbox.pagseguro.com.br" required>
                        </div>
  
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>CPF</label>
                                <input type="text" name="senderCPF" class="form-control" id="senderCPF" placeholder="CPF sem traço" required>
                            </div>
                            <div class="col-md-2 mb-3">
                                <label>DDD</label>
                                <input type="text" name="senderAreaCode" class="form-control" id="senderAreaCode" placeholder="DDD" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>Telefone</label>
                                <input type="text" name="senderPhone" class="form-control" id="senderPhone" placeholder="Somente número" required>
                            </div>
                        </div>

                        <h4 class="mb-3">Endereço de Entrega</h4>
                        <input type="hidden" name="shippingAddressRequired" id="shippingAddressRequired" value="true">

                        <div class="row">
                            <div class="col-md-9 mb-3">
                                <label>Logradouro</label>
                                <input type="text" name="shippingAddressStreet" class="form-control" id="shippingAddressStreet" placeholder="Av. Rua" required>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label>Número</label>
                                <input type="text" name="shippingAddressNumber" class="form-control" id="shippingAddressNumber" placeholder="Número" required>
                            </div>
                        </div>


                        <div class="mb-3">
                            <label>Complemento</label>
                            <input type="text" name="shippingAddressComplement" class="form-control" id="shippingAddressComplement" placeholder="Complemento"> 
                        </div>

                        <div class="form-row mb-3">
                            <div class="col-md-4">
                                <label>Bairro</label>
                                <input type="text" name="shippingAddressDistrict" class="form-control" id="shippingAddressDistrict" placeholder="Bairro" required>
                            </div>
                            <div class="col-md-4">
                                <label>Cidade</label>
                                <input type="text" name="shippingAddressCity" class="form-control" id="shippingAddressCity" placeholder="Cidade" required>
                            </div>
                            <div class="col-md-4">
                                <label>Estado</label>
                                <select name="shippingAddressState" class="custom-select d-block w-100" id="shippingAddressState" required>
                                    <option value="">Selecione</option>
                                    <option value="AC">AC</option>
                                    <option value="AL">AL</option>
                                    <option value="AP">AP</option>
                                    <option value="AM">AM</option>
                                    <option value="BA">BA</option>
                                    <option value="CE">CE</option>
                                    <option value="DF">DF</option>
                                    <option value="ES">ES</option>
                                    <option value="GO">GO</option>
                                    <option value="MA">MA</option>
                                    <option value="MT">MT</option>
                                    <option value="MS">MS</option>
                                    <option value="MG">MG</option>
                                    <option value="PA">PA</option>
                                    <option value="PB">PB</option>
                                    <option value="PR">PR</option>
                                    <option value="PE">PE</option>
                                    <option value="PI">PI</option>
                                    <option value="RJ">RJ</option>
                                    <option value="RN">RN</option>
                                    <option value="RS">RS</option>
                                    <option value="RO">RO</option>
                                    <option value="RR">RR</option>
                                    <option value="SC">SC</option>
                                    <option value="SP">SP</option>
                                    <option value="SE">SE</option>
                                    <option value="TO">TO</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label>CEP</label>
                            <input type="text" name="shippingAddressPostalCode" class="form-control" id="shippingAddressPostalCode" placeholder="CEP sem traço" required>          
                        </div>

                        <!-- Moeda utilizada para pagamento -->
                        <input type="hidden" name="shippingAddressCountry" id="shippingAddressCountry" value="BRL">
                        <!-- 1 - PAC / 2 - SEDEX / 3 - Sem frete -->
                        <input type="hidden" name="shippingType" value="3">
                        <!-- Valor do frete -->
                        <input type="hidden" name="shippingCost" value="0.00">

                        <h4 class="mb-3">Escolha a forma de pagamento</h4>

                        <div class="mb-3">
                            <div class="custom-control custom-radio">
                                <input type="radio" name="paymentMethod" class="custom-control-input" id="creditCard" value="creditCard" onclick="tipoPagamento('creditCard')">
                                <label class="custom-control-label" for="creditCard">Cartão de Crédito</label>
                            </div>

                            <div class="custom-control custom-radio">
                                <input type="radio" name="paymentMethod" class="custom-control-input" id="boleto" value="boleto" onclick="tipoPagamento('boleto')">
                                <label class="custom-control-label" for="boleto">Boleto</label>
                            </div>

                            <div class="custom-control custom-radio">
                                <input type="radio" name="paymentMethod" class="custom-control-input" id="eft" value="eft" onclick="tipoPagamento('eft')">
                                <label class="custom-control-label" for="eft">Débito Online</label>
                            </div>
                        </div>

                        <!-- Pagamento com Cartão de crédito -->
                        <input type="hidden" name="bandeiraCartao" id="bandeiraCartao">
                        <input type="hidden" name="valorParcelas" id="valorParcelas">
                        <input type="hidden" name="tokenCartao" id="tokenCartao">
                        <input type="hidden" name="hashCartao" id="hashCartao">

                        <div class="creditCard">
                            <h2>Dados do Cartão</h2>

                            <div class="mb-3 creditCard">
                                <label>Número do cartão</label>
                                <div class="input-group">
                                    <input type="text"  name="numCartao" class="form-control" id="numCartao">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bandeira-cartao creditCard">   </span>
                                    </div>
                                </div>
                                <small id="numCartao" class="form-text text-muted">
                                    Preencha para ver o parcelamento
                                </small>
                            </div>

                            <div class="mb-3 creditCard">
                                <label class="creditCard">Quantidades de Parcelas</label>
                                <select name="qntParcelas" id="qntParcelas" class="form-control select-qnt-parcelas creditCard">
    
                                </select>
                            </div>

                            <div class="mb-3 creditCard">
                                <label class="creditCard">Nome do titular</label>
                                <input type="text" name="creditCardHolderName" class="form-control" id="creditCardHolderName" placeholder="Nome igual ao escrito no cartão">
                                <small id="creditCardHolderName" class="form-text text-muted">
                                    Como está gravado no cartão
                                </small>
                            </div>

                            <div class="row creditCard">
                                <div class="col-md-6 mb-3 creditCard">
                                    <label class="creditCard">Mês de Validade</label>
                                    <input type="text" name="mesValidade" id="mesValidade" maxlength="2" class="form-control creditCard">
                                </div>
                                <div class="col-md-6 mb-3 creditCard">
                                    <label class="creditCard">Ano de Validade</label>
                                    <input type="text" name="anoValidade" id="anoValidade" maxlength="4" class="form-control creditCard">
                                </div>
                            </div>

                            <div class="mb-3 creditCard">                            
                                <label class="creditCard">CVV do cartão</label>
                                <input type="text" name="numCartao" class="form-control creditCard" id="cvvCartao" maxlength="3">
                                <small id="cvvCartao" class="form-text text-muted creditCard">
                                    Código de 3 digitos impresso no verso do cartão
                                </small>
                            </div>

                            <div class="row creditCard">
                                <div class="col-md-6 mb-3 creditCard">
                                    <label class="creditCard">CPF do dono do Cartão</label>
                                    <input type="text" name="creditCardHolderCPF" id="creditCardHolderCPF" placeholder="CPF sem traço" class="form-control creditCard">
                                </div>
                                <div class="col-md-6 mb-3 creditCard">
                                    <label class="creditCard">Data de Nascimento</label>
                                    <input type="text" name="creditCardHolderBirthDate" id="creditCardHolderBirthDate" placeholder="Data de Nascimento. Ex: 12/12/1912" class="form-control creditCard">
                                </div>
                            </div>

                            <h4 class="mb-3 creditCard">Endereço do titular do cartão</h4>
                            <div class="row creditCard">
                                <div class="col-md-9 mb-3 creditCard">
                                    <label class="creditCard">Logradouro</label>
                                    <input type="text" name="billingAddressStreet" id="billingAddressStreet" placeholder="Av. Rua" class="creditCard form-control">
                                </div>                            
                                <div class="col-md-3 mb-3 creditCard">
                                    <label class="creditCard">Número</label>
                                    <input type="text" name="billingAddressNumber" id="billingAddressNumber" placeholder="Número" class="creditCard form-control">
                                </div>
                            </div>

                            <div class="mb-3 creditCard">
                                <label class="creditCard">Complemento</label>
                                <input type="text" name="billingAddressComplement" id="billingAddressComplement" placeholder="Complemento" class="creditCard form-control">
                            </div>

                            <div class="row creditCard">
                                <div class="col-md-5 mb-3 creditCard">
                                    <label class="creditCard">Bairro</label>
                                    <input type="text" name="billingAddressDistrict" id="billingAddressDistrict" placeholder="Bairro" class="creditCard form-control">
                                </div>
                                <div class="col-md-5 mb-3 creditCard">
                                    <label class="creditCard">Cidade</label>
                                    <input type="text" name="billingAddressCity" id="billingAddressCity" placeholder="Cidade" class="creditCard form-control">
                                </div>
                                <div class="col-md-2 mb-3 creditCard">
                                    <label class="creditCard">Estado</label>
                                    <select name="billingAddressState" class="custom-select d-block w-100 creditCard" id="billingAddressState">
                                        <option value="">Selecione</option>
                                        <option value="AC">AC</option>
                                        <option value="AL">AL</option>
                                        <option value="AP">AP</option>
                                        <option value="AM">AM</option>
                                        <option value="BA">BA</option>
                                        <option value="CE">CE</option>
                                        <option value="DF">DF</option>
                                        <option value="ES">ES</option>
                                        <option value="GO">GO</option>
                                        <option value="MA">MA</option>
                                        <option value="MT">MT</option>
                                        <option value="MS">MS</option>
                                        <option value="MG">MG</option>
                                        <option value="PA">PA</option>
                                        <option value="PB">PB</option>
                                        <option value="PR">PR</option>
                                        <option value="PE">PE</option>
                                        <option value="PI">PI</option>
                                        <option value="RJ">RJ</option>
                                        <option value="RN">RN</option>
                                        <option value="RS">RS</option>
                                        <option value="RO">RO</option>
                                        <option value="RR">RR</option>
                                        <option value="SC">SC</option>
                                        <option value="SP">SP</option>
                                        <option value="SE">SE</option>
                                        <option value="TO">TO</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="creditCard">CEP</label>
                                <input type="text" name="billingAddressPostalCode" class="form-control creditCard" id="billingAddressPostalCode" placeholder="CEP sem traço">
                            </div>

                            <input type="hidden" name="billingAddressCountry" id="billingAddressCountry" value="BRL">
                            <input type="hidden" name="receiverEmail" id="receiverEmail" value="<?php echo EMAIL_LOJA; ?>">
                            <input type="hidden" name="currency" id="currency" value="<?php echo MOEDA_PAGAMENTO; ?>">
                            <input type="hidden" name="notificationURL" id="notificationURL" value="<?php echo URL_NOTIFICACAO; ?>">

                            <?php
                                //$curso = $_GET['id_curso'];
                                $sql = "SELECT id_curso, nome FROM cursos WHERE id_curso = '$curso'";
                                $resultado = $conn->prepare($sql);
                                $resultado->execute();

                                $row = $resultado->fetch(PDO::FETCH_ASSOC);
                                
                                $total_venda = number_format(0, 2, '.', '');
                             
                                $ref = $conn->query("SELECT id FROM DadosVendas ORDER BY id DESC LIMIT 1");
                                $ln = $ref->fetch(PDO::FETCH_ASSOC);
                                $pedido = $ln['id'] + 1;
                            ?>
                            
                            <input type="hidden" name="curso" id="curso" value="<?php echo $row['id_curso']; ?>">
                            <input type="hidden" name="aluno" id="aluno" value="<?php echo $aluno; ?>">
                            <input type="hidden" name="reference" id="reference" value="<?php echo $pedido; ?>">
                            <input type="hidden" name="amount" id="amount" value="<?php echo $total_venda; ?>">
                            <input type="hidden" name="noIntInstalQuantity" id="noIntInstalQuantity" value="2">
                            
                        </div>

                        <!-- Pagamento com Boleto -->

                        <!-- Pagamento com Débito Online -->
                        <div class="mb-3 bankName">
                            <label class="bankName">Banco</label>
                            <select name="bankName" id="bankName" class="form-control select-bank-name bankName">
                                
                            </select>
                        </div>

                        <input type="submit" class="btn btn-primary mb-3" name="btnComprar" id="btnComprar" onclick="cadPedido()" value="Comprar">
                    </form>
                </div>
            </div>
        </div> 
        

        <!--<div class="meio-pag"></div>-->

        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo SCRIPT_PAGSEGURO; ?>"></script>
        <script src="js/personalizado.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery-3.5.1.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script>
            function cadPedido(){

                produto = $('#produto').val();
                preco = $('#preco').val();
                aluno = $("#aluno").val();

                var pedido = {
                    'produto': produto,
                    'preco': preco
                }

                var dados = JSON.stringify(pedido);

                $.ajax({
                    url: 'salvarpedido.php',
                    type: 'POST',
                    data: {data: dados},
                    success: function(response){
                        console.log("Pedido realizado com sucesso, aguardando pagamento!" + JSON.stringify(response));
                    },
                    error: function(response) {
                        console.log("Erro");
                    }
                });
            
            }
        </script>
    </body>
</html>
