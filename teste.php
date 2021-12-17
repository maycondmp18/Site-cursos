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

    $code = $conn->query("SELECT * FROM cursos WHERE id_curso = 5");
    $ln = $code->fetch(PDO::FETCH_ASSOC);

    $pedido = $_POST['data'];
    $dados = json_decode($pedido, true);
    
    $produto = $dados['produto'];
    $preco = $dados['preco'];

    $sql = $conn->query("INSERT INTO pedidos (produto, preco, status) VALUES ('$produto', '$preco', 1)");
    
?>
<form method="post">
    <input type="hidden" value="<?php echo $ln['nome']; ?>" id="produto">
    <input type="hidden" value="<?php echo $ln['preco']; ?>" id="preco">
    <input type="submit" name="btnComprar" id="btnComprar" value="Comprar" onClick="cadPedido()">
</form>

<script>
    function cadPedido(){

        produto = $('#produto').val();
        preco = $('#preco').val();

        var pedido = {
            'produto': produto,
            'preco': preco
        }

        var dados = JSON.stringify(pedido);
        console.log("Pedido realizado com sucesso, aguardando pagamento!");

        /*$.ajax({
            url: 'salvarpedido.php',
            type: 'POST',
            data: {data: dados},
            success: function(response){
                console.log("Pedido realizado com sucesso, aguardando pagamento!" + JSON.stringify(response));
            },
            error: function(response) {
                console.log("Erro");
            }
        });*/

    }
</script>