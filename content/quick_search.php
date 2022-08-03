
<?php 
    $quick_find = mysqli_real_escape_string($dbconnect,$_POST['quick_search']);
   
    $sub_sql = "SELECT * FROM `subject` WHERE `Subject_ID` LIKE '%$subject_to_find%'";
    $sub_query = mysqli_query($dbconnect,$sub_sql);
    $sub_rs = mysqli_fetch_assoc($sub_query);

    $sub_count = mysqli_num_rows($sub_query);

    if ($subject_count > 0)
    {
        $subject_ID = $sub_rs['Subject_ID'];

    }
    else
    {
        $subject_ID = -1

    }
    $find_sql = "SELECT * FROM `quotes` 
    JOIN author ON (`author`.`Author_ID`= `quotes`.`Author_ID`)
    ORDER BY `quotes`.`ID` ASC";
    $find_query = mysqli_query($dbconnect, $find_sql);
    $find_rs = mysqli_fetch_assoc($find_query);
?>

<h2>All Results</h2>

<?php
    do {

        $quote = preg_replace('/[^A-Za-z0-9.,?\s\'\-]/', ' ',$find_rs['Quote'] );

        include("functions/get_author.php");
        ?>
        <div class="results">
            <p>
                <?php echo $quote;?> 
            </p>
            
            <p>
                <span class=author_tag>
                    <a href="index.php?page=author&authorID=<?php echo $find_rs['Author_ID']?>">
                        <?php echo $full_name;?>
                    </a>
                </span>
            </p>

            <p>
                <?php include("functions/show_subjects.php")?>
            </p>
        </div>

        <br />


        <?php

    }
    while($find_rs = mysqli_fetch_assoc($find_query))


?>