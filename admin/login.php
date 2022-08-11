<form action="index.php?page=../admin/adminlogin" method="post">

    <p>Username: <input name="username" class="short" /></p>
    <p>Password: <input name="password" class="short" type="password"/></p>
    
    <?php 
    
        if(isset($_GET['error']))
        {

            ?>  
                <span class="error short"><?php echo $_GET['error']?> </span>
            <?php
        }
    
    ?>
        <p><input type="submit" name="login" class="short" value="Log In" /></p>
</form>