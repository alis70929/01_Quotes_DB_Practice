<?php 

    if(isset($_REQUEST['login']))
    {
        $username = $_REQUEST['username'];
        $options = ['cost' => 9];

        $login_sql = "SELECT * FROM `users` WHERE `username` = $username";
        $login_query = mysqli_query($dbconnect,$login_sql);
        $login_rs = mysqli_fetch_assoc($login_query);

        if(password_verify($_REQUEST['password'], $login_rs['password']))
        {
            echo "Password is valid";
            $_SESSION['admin'] = $loging_rs['username'];
        }
        else 
        {
            echo ' Invalid Password';
            unset($_SESSION);
            $login_error = "Incorrect username/password";
            echo
            //header("Location: index.php?page=../admin/login&error=$login_error");
        }
    }



?>