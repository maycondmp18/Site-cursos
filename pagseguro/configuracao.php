<?php

//Necessário testar em dominio com SSL
define("URL", "https://multsolucoes.com/pagseguro/");
//define("URL", "http://maindirectory/Mult-Solucoes/pagseguro/");

//True quando estiver usando o sandbox
//False quando estiver em produção
$sandbox = true;

if ($sandbox) {
    //Credenciais do SandBox
    define("EMAIL_PAGSEGURO", "felipe.douglas.inf1@gmail.com");
    define("TOKEN_PAGSEGURO", "bb4bfbf4-19ea-4032-a445-69200b9e2efceffef8e5432ba0ecbd3825c41db83f2caa77-fe06-47ab-8e78-c336efa6357a");
    define("URL_PAGSEGURO", "https://ws.pagseguro.uol.com.br/v2/");
    define("SCRIPT_PAGSEGURO", "https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js");
    define("EMAIL_LOJA", "E-mail de suporte pós venda");
    define("MOEDA_PAGAMENTO", "BRL");
    define("URL_NOTIFICACAO", "https://sualoja.com.br/notifica.html");
} else {
    //Credenciais do PagSeguro
    define("EMAIL_PAGSEGURO", "matheusgestaopublica@outlook.com");
    define("TOKEN_PAGSEGURO", "7269a232-a852-498a-a9c4-270fe73a2a4694e81f0f4b6a8c39a780d435f50f89d96abd-3953-42b2-8ef6-007bfd58b1e5");
    define("URL_PAGSEGURO", "https://ws.pagseguro.uol.com.br/v2/");
    define("SCRIPT_PAGSEGURO", "https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js");
    define("EMAIL_LOJA", "matheusgestaopublica@outlook.com");
    define("MOEDA_PAGAMENTO", "BRL");
    define("URL_NOTIFICACAO", "https://multsolucoes.com/pagseguro/response.php");
}