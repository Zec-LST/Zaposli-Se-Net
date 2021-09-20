<?php
    if(!isset($_COOKIE['employer'])){
        header("Location: ./auth/login.php");
    }
    if (file_exists("../database/ads.php")) {
        require_once("../database/ads.php");
    }
    $ads = $ads_table->retrieveAds();
    $id = $_COOKIE['employer'];
    $ads_table->deleteAd(1);
?>