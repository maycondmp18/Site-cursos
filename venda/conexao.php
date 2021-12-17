<?php

define('HOST', 'localhost');
        define('BANCO', 'multso47_multsolucoes');
        define('USER', 'multso47_multsolucoes-ce');
        define('PASS', 'Mult.45216300');

        try {
            $conn = new PDO("mysql:host=" . HOST . ";dbname=" . BANCO, USER,  PASS);
        } catch (PDOException $e) {
            echo "ERRO " . $e->getMessage();
        }

