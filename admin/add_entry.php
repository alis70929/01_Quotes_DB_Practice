<?php

    if(isset($_SESSION['admin']))
    {
        echo "Session Valid";
        $author_ID = $_SESSION['Add_Quote'];
        echo "Author_ID: ".$author_ID; 

        $all_tags_sql = "SELECT * FROM `subject` ORDER BY `subject`.`Subject` ASC";
        $all_subjects = autocomplete_list($dbconnect,$all_tags_sql,"Subject");

        $quote= "Please Type the quote here";
        $notes = "";
        $tag_1 = "";
        $tag_2 = "";
        $tag_3 = "";

        $tag_1_ID = $tag_2_ID = $tag_3_ID = 0;

        $has_errors = "no";
        
        $quote_error = $tag_1_error = "no-error";
        $quote_field = "form-ok";
        $tag_1_field = "tag-ok";

        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $quote = mysqli_real_escape_string($dbconnect, $_POST['quote']);

            if($quote == "Please Type the quote here" ){
                $has_errors = "yes";
                $quote_error = "error-text";
                $quote_field = "form-error";

            }

            if($tag_1 == ""){
                $has_errors = "yes";
                $tag_1_error = "error-text";
                $tag_1_field = "tag-error";
            }
        }

    }
    else{
        $login_error = "please login to acces this page";
        header("Location: index.php?page=../admin/login&error=$login_error&hash=$hash");
    }

?>

<h1>Add A Quote...</h1>

<form autocomplete="off" method="post" action = "<?php echo
htmlspecialchars($_SERVER["PHP_SELF"]."?page=../admin/add_entry");?>"
enctype="multipart/form-data">

    <div class="<?php echo $quote_error; ?>">
        This field can't be black
    </div>

    <textarea class="add-field <?php echo $quote_field?>" name="quote" rows="6" ><?php echo $quote?></textarea>
    <br /> <br />


    <input class="add-field <?php echo $notes; ?>" type="text"
    name="notes" value="<?php echo $notes; ?>" placeholder="Notes (Optional)...">

    <br /><br />

    <div class="<?php echo $tag_1_error?>">
        Please Enter at least one subject tag
    </div>

    <div class="autocomplete">
        <input class="<?php echo $tag_1_field ?>" id="subject1" type="text"
        name="Subject_1" placeholder="Subject 1(Start Typing)...">

    </div>
    <p>
        <input type="submit" value = "Submit"/>
    </p>

</form>

<script>
<?php include("autocomplete.php")?>

var all_tags = <?php print("$all_subjects"); ?>;
autocomplete(document.getElementById("subject1"), all_tags);

</script>