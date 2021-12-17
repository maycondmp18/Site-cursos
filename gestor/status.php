<?php
    require 'conexao.php';

    if(isset($_GET['status']) && $_GET['status'] == 'approved' && isset($_GET['id'])){

        $sql = $conn->query("UPDATE professor SET status = 0 WHERE id = '" . $_GET['id'] . "'");
        header('Location: admin.php');

    }elseif (isset($_GET['status']) && $_GET['status'] == 'reproved' &&  isset($_GET['id'])) {

        $sql = $conn->query("UPDATE professor SET status = 2 WHERE id = '" . $_GET['id'] . "'");
        header('Location: admin.php');
        
    }else{
        header('Location: admin.php');
    }

?>