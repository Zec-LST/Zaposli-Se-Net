<?php
    if (file_exists("./users.php")) {
        require_once("./users.php");
    }
    $users = $users_table->retrieveUsers();

    function sanitize($input) {
        $sanitizedInput = filter_var($input);
        $sanitizedInput = trim(htmlspecialchars($input));
        return $sanitizedInput;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if(isset($_POST['email']) && isset($_POST['password'])){

        $flag = true;
            while($user = $users->fetch()){
                if($user['user_email'] == sanitize($_POST['email']) && $user['user_password'] == md5(sanitize($_POST['password']))){
                    setcookie("employer",$user['user_id'], time() + 60 * 60 * 24,'/');
                    $flag = false;
                    header("Location: ../employer/dashboard.php");
                }
            }
            if($flag){
                setcookie("Error", true, time() + 60);
                header('Location: ../auth/login.php');
            }
        }
    }

?>
