<?php

    if(isset($_SESSION['admin']))
    {
        echo "Session Valid";
        $deletequote_sql = "DELETE FROM `quotes` WHERE `ID`=".$_REQUEST['ID'];
        $deletequote_query = mysqli_query($dbconnect,$deletequote_sql);
        ?>
            <h2>Delete Quote Success</h2>

            <p>The quote has been deleted</p>

        <?php 
       
        
    }
    else{
        $login_error = "please login to acces this page";
        header("Location: index.php?page=../admin/login&error=$login_error&hash=$hash");
    }

?>