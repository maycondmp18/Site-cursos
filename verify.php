<?php
include 'conexao.php';
$curso = $_POST['id_curso'];
$aluno = $_POST['id_aluno'];

$sql = $conn->query("SELECT email_checking FROM alunos WHERE id = '$aluno'");
$ln = $sql->fetch(PDO::FETCH_ASSOC);

if($ln['email_checking'] > 0){
    echo "Você precisa verificar seu email antes de adquirir esse produto <br> Verifique a caixa de entrada do seu email, as vezes o email<br> pode ir ate para o spam
    então olhe por lá também. <br>
            <button>
                <a href='courses.php'>Voltar para a página principal</a>
            </button>
        ";
}else{
    if($aluno < 1){
        $_SESSION['error'] = "<p style='color: red;'>Você precisa estar logado para fazer a compra desse produto!</p>";
        header("location: login_regis.php");
    }else{
        header("location: pagseguro/index.php?curso=$curso&aluno=$aluno");
    } 
}



