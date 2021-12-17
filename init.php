<?php
 
$check = false; //alterar para false quando estiver em produção
if($check){
    // constantes com as credenciais de acesso ao banco MySQL
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'multsolucoes-ce');
    
    // habilita todas as exibições de erros
    ini_set('display_errors', true);
    error_reporting(E_ALL);
    
    // inclui o arquivo de funçõees
    require_once 'functions.php';
}else{
    // constantes com as credenciais de acesso ao banco MySQL
    define('DB_HOST', 'localhost');
    define('DB_USER', 'multso47_multsolucoes-ce');
    define('DB_PASS', 'Mult.45216300');
    define('DB_NAME', 'multso47_multsolucoes');
    
    // habilita todas as exibições de erros
    ini_set('display_errors', true);
    error_reporting(E_ALL);
    
    // inclui o arquivo de funçõees
    require_once 'functions.php';     
} 
