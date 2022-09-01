<?php

    if(isset($_SESSION['admin']))
    {
        echo "Session Valid";
        $quote_ID= $_REQUEST['ID'];

        $deletequote_sql = "SELECT * FROM `quotes` 
        WHERE `ID` = $quote_ID ORDER BY `ID` DESC";
        $deletequote_query = mysqli_query($dbconnect,$deletequote_sql);
        $deletequote_rs = mysqli_fetch_assoc($deletequote_query);
        ?> 
            <h2>Delete Quote</h2>
            <p> Do you really want to delete this following quote</p>
            <i><?php echo $deletequote_rs['Quote']?></i>
            &nbsp;
            <a href="index.php?page=../admin/deletequote&ID=<?php echo $_REQUEST['ID']?>">
            Yes Delete it</a>
            <a href=
            <?php echo htmlspecialchars($_SERVER['HTTP_REFERER'])?>>No take me back</a>
        
        
        
        <?php
       
        
    }
    else{
        $login_error = "please login to acces this page";
        header("Location: index.php?page=../admin/login&error=$login_error&hash=$hash");
    }

?>