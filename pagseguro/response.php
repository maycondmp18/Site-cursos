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
        
        include_once 'conexao.php';

        $sql = $conn->query("SELECT * FROM cadpedido WHERE id = '$reference'");
        $row = $sql->rowCount();
        if($row > 0){

            //Atualizar os status na tabela pedidos
            $rs = $conn->prepare("UPDATE cadpedido SET status = :status WHERE id = '$reference'");
            $rs->bindValue(':status', 0);
            $rs->execute();

            //Atualizar os statis na tabela vendas
            $code = $conn->prepare("UPDATE DadosVendas SET status = :status WHERE referencia = '$reference'");
            $code->bindValue(':status', $status);
            
            $code->execute();

            if($status == 3){
                $s = 0;
                $adquirido = $conn->prepare("UPDATE cursos_adquiridos SET status = :status WHERE referencia = '$reference'");
                $adquirido->bindValue(':status', $s);
                $adquirido->execute();
            }
        }
    }
    
?>