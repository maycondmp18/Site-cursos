<?php
session_start();
include './configuracao.php';
include './conexao.php';

$Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$DadosArray["email"] = EMAIL_PAGSEGURO;
$DadosArray["token"] = TOKEN_PAGSEGURO;

if ($Dados['paymentMethod'] == "creditCard") {
    $DadosArray['creditCardToken'] = $Dados['tokenCartao'];
    $DadosArray['installmentQuantity'] = $Dados['qntParcelas'];
    $DadosArray['installmentValue'] = $Dados['valorParcelas'];
    $DadosArray['noInterestInstallmentQuantity'] = $Dados['noIntInstalQuantity'];
    $DadosArray['creditCardHolderName'] = $Dados['creditCardHolderName'];
    $DadosArray['creditCardHolderCPF'] = $Dados['creditCardHolderCPF'];
    $DadosArray['creditCardHolderBirthDate'] = $Dados['creditCardHolderBirthDate'];
    $DadosArray['creditCardHolderAreaCode'] = $Dados['senderAreaCode'];
    $DadosArray['creditCardHolderPhone'] = $Dados['senderPhone'];
    $DadosArray['billingAddressStreet'] = $Dados['billingAddressStreet'];
    $DadosArray['billingAddressNumber'] = $Dados['billingAddressNumber'];
    $DadosArray['billingAddressComplement'] = $Dados['billingAddressComplement'];
    $DadosArray['billingAddressDistrict'] = $Dados['billingAddressDistrict'];
    $DadosArray['billingAddressPostalCode'] = $Dados['billingAddressPostalCode'];
    $DadosArray['billingAddressCity'] = $Dados['billingAddressCity'];
    $DadosArray['billingAddressState'] = $Dados['billingAddressState'];
    $DadosArray['billingAddressCountry'] = $Dados['billingAddressCountry'];
} elseif ($Dados['paymentMethod'] == "boleto") {
    
} elseif ($Dados['paymentMethod'] == "eft") {
    $DadosArray['bankName'] = $Dados['bankName'];
}

$DadosArray['paymentMode'] = 'default';
$DadosArray['paymentMethod'] = $Dados['paymentMethod'];


$DadosArray['receiverEmail'] = EMAIL_LOJA;
$DadosArray['currency'] = $Dados['currency'];
$DadosArray['extraAmount'] = $Dados['extraAmount'];

$DadosArray["itemId1"] = 1;
$DadosArray["itemDescription1"] = "Certificado";
$total_venda = number_format($Dados['amount'], 2, '.', '');
$DadosArray["itemAmount1"] = $total_venda;
$DadosArray["itemQuantity1"] = 1;


$DadosArray['notificationURL'] = URL_NOTIFICACAO;
$DadosArray['reference'] = $Dados['reference'];
$DadosArray['senderName'] = $Dados['senderName'];
$DadosArray['senderCPF'] = $Dados['senderCPF'];
$DadosArray['senderAreaCode'] = $Dados['senderAreaCode'];
$DadosArray['senderPhone'] = $Dados['senderPhone'];
$DadosArray['senderEmail'] = $Dados['senderEmail'];
$DadosArray['senderHash'] = $Dados['hashCartao'];
$DadosArray['shippingAddressRequired'] = $Dados['shippingAddressRequired'];
$DadosArray['shippingAddressStreet'] = $Dados['shippingAddressStreet'];
$DadosArray['shippingAddressNumber'] = $Dados['shippingAddressNumber'];
$DadosArray['shippingAddressComplement'] = $Dados['shippingAddressComplement'];
$DadosArray['shippingAddressDistrict'] = $Dados['shippingAddressDistrict'];
$DadosArray['shippingAddressPostalCode'] = $Dados['shippingAddressPostalCode'];
$DadosArray['shippingAddressCity'] = $Dados['shippingAddressCity'];
$DadosArray['shippingAddressState'] = $Dados['shippingAddressState'];
$DadosArray['shippingAddressCountry'] = $Dados['shippingAddressCountry'];
$DadosArray['shippingType'] = $Dados['shippingType'];
$DadosArray['shippingCost'] = $Dados['shippingCost'];

$buildQuery = http_build_query($DadosArray);
$url = URL_PAGSEGURO . "transactions";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_HTTPHEADER, Array("Content-Type: application/x-www-form-urlencoded; charset=UTF-8"));
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $buildQuery);
$retorno = curl_exec($curl);
curl_close($curl);
$xml = simplexml_load_string($retorno);


//Dados de Pagamento
$tipo = $xml->paymentMethod->type;
$cod = $xml->code;
$status = $xml->status;
$ref = $xml->reference;
$link = isset($xml->paymentLink) ? $xml->paymentLink : '';



//Dados de Entrega 
$dest = $xml->sender->name;
$cpf = $xml->sender->documents->document->value;
$end = $xml->shipping->address->street;
$num = $xml->shipping->address->number;
$comp = $xml->shipping->address->complement;
$bairro = $xml->shipping->address->district;
$cid = $xml->shipping->address->city;
$estado = $xml->shipping->address->state;
$cep = $xml->shipping->address->postalCode;


$sql = $conn->query("INSERT INTO dadosvendas (nome, cpf, tipo_pg, cod_trans, status, referencia, link_pagamento, criacao) VALUES ('$dest', '$cpf','$tipo', '$cod', '$status', '$ref', '$link', NOW())");
$code = $conn->query("INSERT INTO dadosentrega (destinatario, endereco, numero, complemeto, bairro, cidade, estado, cep, referencia) VALUES ('$dest', '$end', '$num', '$comp', '$bairro', '$cid', '$estado', '$cep', '$ref')");

//SESSIONS PARA GERAÇÃO DO CERTIFICADO
$_SESSION['Idcurso'] = $Dados['curso'];
$_SESSION['Idaluno'] = $Dados['aluno'];
$_SESSION['emailAluno'] = $Dados['senderEmail'];
$_SESSION['cpfAluno'] = $Dados['senderCPF'];
$_SESSION['nomeAluno'] = $Dados['senderName'];

$retorna = ['erro' => true, 'dados' => $xml, 'DadosArray' => $DadosArray];
header('Content-Type: application/json');
echo json_encode($retorna);
