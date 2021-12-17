<?php
    include 'conexao.php';
    $tipo = 1;
    $cod_trans = 'SNNA7SFJNISOHS';
    $status = 1;
    $sql = $conn->prepare("INSERT INTO teste (tipo_pg, cod_trans, status) VALUES (:tipo_pg, :cod_trans, :status)");
    $sql->bindParam(':tipo_pg', $tipo);
    $sql->bindParam(':cod_trans', $cod_trans);
    $sql->bindParam(':status', $status);
    $sql->execute();
?>