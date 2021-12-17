<?php

    include 'configuracao.php';

    $notificationCode = $_POST['notificationCode'];
    
    $url = "https://ws.pagseguro.uol.com.br/v3/transactions/notifications/" . $notificationCode . "?email=" . EMAIL_PAGSEGURO . "&token=" . TOKEN_PAGSEGURO;
    //$url = "https://ws.sandbox.pagseguro.uol.com.br/v3/transactions/notifications/" . $notificationCode . "?email=" . EMAIL_PAGSEGURO . "&token=" . TOKEN_PAGSEGURO;

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true); //alterar para true
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $retorno = curl_exec($curl);
    curl_close($curl);
    
    $xml = simplexml_load_string($retorno);
    
    $reference = $xml->reference;
    $status = $xml->status;

    if($reference && $status){
        
        require 'conexao.php';

        $sql = $conn->query("SELECT * FROM dadosvendas WHERE id = '$reference'");
        $row = $sql->rowCount();
        if($row > 0){

            //Atualizar os statis na tabela vendas
            $code = $conn->query("UPDATE dadosvendas SET status = '$status' WHERE referencia = '$reference'");
            
            $confime = $conn->query("SELECT * FROM dadosvendas WHERE referencia = '$reference'");
            if($confime->rowCount() > 0){
                $ln = $confime->fetch(PDO::FETCH_ASSOC);
                
                if($ln['status'] == 3){
                    header('Location: ../certificate_generator/gerar_certificado/gerador.php?nome=' . $ln['nome'] . '&cpf=' . $ln['cpf']);
                }
            }

        }
    }
    
?>