<?php
session_start();
setlocale( LC_ALL, 'pt_BR', 'pt_BR.iso-8859-1', 'pt_BR.utf-8', 'portuguese' );
date_default_timezone_set( 'America/Sao_Paulo' );
require('fpdf/alphapdf.php');
// require('PHPMailer/class.phpmailer.php');
include 'conexao.php';

// --------- Variáveis do Formulário ----- //
$id_curso = $_GET['id_curso'];
$id_aluno = $_GET['id_aluno'];

$email    = $_GET['email'];
$nome     = $_GET['nome'];
$cpf      = $_GET['cpf'];

// --------- Variáveis que podem vir de um banco de dados por exemplo ----- //
$code = $conn->query("SELECT nome, link FROM cursos WHERE id_curso = '$id_curso'");
$row = $code->fetch(PDO::FETCH_ASSOC);

$curso    = $row['nome'];
$_SESSION['link']    = $row['link'];
require '../../videoList.php';

$header = utf8_decode("Certificamos que $nome, portador do cpf: $cpf, concluiu o programa de educação da Mult Soluções na qualidade de participante do curso de $curso, finalizado no periodo de " . date('m/Y'));    

$lista = '';


    for ($i=0; $i < 6; $i++) { 
        $lista .= utf8_decode('- ' . $videoList['videos'][$i]['title'] . "\n");
    }

//$lista .= utf8_decode('- Carga horária: 200h');
//$aviso = utf8_decode('AVISO: Para não exceder o limite delimitado do certificado colocamos somente os 10 primeiros tópicos do curso');

$pdf = new AlphaPDF();

// Orientação Landing Page ///
$pdf->AddPage('L');

$pdf->SetLineWidth(1.5);


// desenha a imagem do certificado
$pdf->Image('certificado.png',0,0,300);

// opacidade total
$pdf->SetAlpha(1);

// Mostrar o corpo
$pdf->SetFont('Arial', '', 16); // Tipo de fonte e tamanho
$pdf->SetXY(35,100); //Parte chata onde tem que ficar ajustando a posição X e Y
$pdf->MultiCell(230, 8, $header, 0, 'J'); // Tamanho width e height e posição

//Adicionando outra página
// Orientação Landing Page ///
$pdf->AddPage('L');

$pdf->SetLineWidth(1.5);


// desenha a imagem do certificado
$pdf->Image('certificado_verso.png',0,0,300);

// opacidade total
$pdf->SetAlpha(1);

//Mostrar nome do curso
$pdf->SetFont('Arial', '', 18); // Tipo de fonte e tamanho
$pdf->SetXY(20,23); //Parte chata onde tem que ficar ajustando a posição X e Y
$pdf->MultiCell(270, 8, strtoupper(utf8_decode($curso)), 0, 'L'); // Tamanho width e height e posição

// Mostrar o corpo
//Conteúdo
$pdf->SetFont('Arial', '', 11); // Tipo de fonte e tamanho
$pdf->SetXY(30,55); //Parte chata onde tem que ficar ajustando a posição X e Y
$pdf->MultiCell(165, 8, $lista, 0, 'L'); // Tamanho width e height e posição


$pdf->SetFont('Arial', '', 8); // Tipo de fonte e tamanho
$pdf->SetXY(20,180); //Parte chata onde tem que ficar ajustando a posição X e Y
$pdf->MultiCell(165, 8, $aviso, 0, 'L'); // Tamanho width e height e posição

$pdfdoc = $pdf->Output('', 'S');

$certificado = "../../storage/certificate/" . $curso . "aluno" . $id_aluno . ".pdf"; //atribui a variável $certificado com o caminho e o nome do arquivo que será salvo(vai salvar com o nome do curso ao final o id do aluno)
$arquivo = $curso . "aluno" . $id_aluno . ".pdf";
$pdf->Output($certificado,'F'); //Salva o certificado no servidor (verifique se a pasta "arquivos" tem a permissão necessária)
// Utilizando esse script provavelmente o certificado ficara salvo em www.seusite.com.br/gerar_certificado/arquivos/999.999.999-99.pdf (o 999 representa o CPF digitado pelo usuário)

//Armazenar o certificado no banco
$rs = $conn->prepare("INSERT INTO certificados (id_aluno, id_curso, arquivo) VALUES (:aluno, :curso, :arquivo)");
$rs->bindParam(':aluno', $id_aluno, PDO::PARAM_INT);
$rs->bindParam(':curso', $id_curso, PDO::PARAM_INT);
$rs->bindParam(':arquivo', $arquivo, PDO::PARAM_STR);

$rs->execute();

//$pdf->Output(); // Mostrar o certificado na tela do navegador
header('Location: finalizado.php?success');

?>
