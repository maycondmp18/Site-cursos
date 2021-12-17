<?php
    session_start();
    $user = $_GET['id'];
    $_SESSION['aluno'] = $user;
    header('location: aluno.php');