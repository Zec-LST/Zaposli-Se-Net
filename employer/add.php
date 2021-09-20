<?php
    if(!isset($_COOKIE['employer'])){
        header("Location: ./auth/login.php");
    }
?>