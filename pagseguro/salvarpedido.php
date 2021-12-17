<?php
    
    define('HOST', 'localhost');
        define('BANCO', 'multsolucoes-ce');
        define('USER', 'root');
        define('PASS', '');

        try {
            $conn = new PDO("mysql:host=" . HOST . ";dbname=" . BANCO, USER,  PASS);
        } catch (PDOException $e) {
            echo "ERRO " . $e->getMessage();
        }

    $status = 1;
    $pedido = $_POST['data'];
    $dados = json_decode($pedido, true);
    
    $ref = $dados['id'];
    $produto = $dados['produto'];
    $preco = $dados['preco'];

    $sql = $conn->prepare("INSERT INTO cadpedido (id, status) VALUES (':id', ':status')");
    $sql->bindValue(':id', $ref);
    $sql->bindValue(':status', $status);

    $sql->execute();
  
?>