<?php
require_once 'init.php';
 
if (!isLoggedIn()){
    header('Location: login_regis.php');
}