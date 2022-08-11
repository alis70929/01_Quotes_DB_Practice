<?php

    if(isset($_SESSION['admin']))
    {
        echo "Session Valid";

       
        
    }
    else{
        $login_error = "please login to acces this page";
        header("Location: index.php?page=../admin/login&error=$login_error&hash=$hash");
    }

?>