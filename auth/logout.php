<?php
    setcookie("employer", "", time() - 60, '/');

    header('Location: ../auth/login.php');
?>