<?php

//Necessário testar em dominio com SSL
define("URL", "https://multsolucoes.com/venda/");

$sandbox = false;
if ($sandbox) {
    //Credenciais do SandBox
    define("EMAIL_PAGSEGURO", "felipe.douglas.inf1@gmail.com");
    define("TOKEN_PAGSEGURO", "36E9F3DC4C4D499BA416442BE3F74524");
    define("URL_PAGSEGURO", "https://ws.sandbox.pagseguro.uol.com.br/v2/");
    define("SCRIPT_PAGSEGURO", "https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js");
    define("EMAIL_LOJA", "felipe.douglas.inf1@gmail.com");
    define("MOEDA_PAGAMENTO", "BRL");
    define("URL_NOTIFICACAO", "https://multsolucoes.com/venda/response.php");
} else {
    //Credenciais do PagSeguro
    define("EMAIL_PAGSEGURO", "matheusgestaopublica@outlook.com");
    define("TOKEN_PAGSEGURO", "7269a232-a852-498a-a9c4-270fe73a2a4694e81f0f4b6a8c39a780d435f50f89d96abd-3953-42b2-8ef6-007bfd58b1e5");
    define("URL_PAGSEGURO", "https://ws.pagseguro.uol.com.br/v2/");
    define("SCRIPT_PAGSEGURO", "https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js");
    define("EMAIL_LOJA", "matheusgestaopublica@outlook.com");
    define("MOEDA_PAGAMENTO", "BRL");
    define("URL_NOTIFICACAO", "https://multsolucoes.com/venda/response.php");
}