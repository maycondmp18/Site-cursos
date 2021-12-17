<?php

    $check = false; //alterar para false quando estiver em produção
    if($check){
        define('HOST', 'localhost');
        define('BANCO', 'multsolucoes-ce');
        define('USER', 'root');
        define('PASS', '');

        try {
            $conn = new PDO("mysql:host=" . HOST . ";dbname=" . BANCO, USER,  PASS);
        } catch (PDOException $e) {
            echo "ERRO " . $e->getMessage();
        }
    }else{
        define('HOST', 'mysql.multsolucoes-ce.com.br');
        define('BANCO', 'multsolucoes-ce');
        define('USER', 'multsolucoes-ce');
        define('PASS', '172839465admin');

        try {
            $conn = new PDO("mysql:host=" . HOST . ";dbname=" . BANCO, USER,  PASS);
        } catch (PDOException $e) {
            echo "ERRO " . $e->getMessage();
        }
    }

?>