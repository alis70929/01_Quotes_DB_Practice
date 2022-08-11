<?php

    if(isset($_SESSION['admin']))
    {
        echo "Session Valid";

        $all_authors_sql = "SELECT * FROM `author` ORDER BY `author`.`Last` ASC";
        $all_authors_query = mysqli_query($dbconnect,$all_authors_sql);
        $all_authors_rs = mysqli_fetch_assoc($all_authors_query);

        $first = "";
        $middle = "";
        $last = "";

        if($_SERVER['REQUEST_METHOD'] == "POST")
        {
            $author_id= mysqli_real_escape_string($dbconnect,$_POST['author']);
            $_SESSION['Add_Quote'] = $author_id;
            header("Location: index.php?page=../admin/add_entry");
        }
        
    }
    else{
        $login_error = "please login to acces this page";
        header("Location: index.php?page=../admin/login&error=$login_error&hash=$hash");
    }

?>

<h1>Add A Quote</h1>

<p>
    <i>
        To add a quote, first select the author then press the 'next' button. 
        To quicklyt find an author click in the box below and start typing their
        last name
    </i>
</p>

<form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]."?page=../admin/newquote");?>">

    <div>

        <b>Quote Author:</b> &nbsp;

        <select name='author'>
            <option value="" selected disabled>Select Author</option>

            <?php 
            
                do{
                    $author_full = $all_authors_rs['Last'].",
                    ".$all_authors_rs['First']." ".$all_authors_rs['Middle'];
                    ?>
                        <option value="<?php echo $all_authors_rs['Author_ID'] ?>"><?php echo $author_full?></option>
                    <?php
                }   
                while($all_authors_rs = mysqli_fetch_assoc($all_authors_query))
            ?>
        </select>

        <input class="short" type="submit" name="quote_author" value="Next..."/>

    </div>
</form>
&nbsp;