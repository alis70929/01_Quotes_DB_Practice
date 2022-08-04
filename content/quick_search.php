
<?php 
    $quick_find = mysqli_real_escape_string($dbconnect,$_POST['quick_search']);
   
    $sub_sql = "SELECT * FROM `subject` WHERE `Subject` LIKE '%$quick_find%'";
    $sub_query = mysqli_query($dbconnect,$sub_sql);
    $sub_rs = mysqli_fetch_assoc($sub_query);

    $sub_count = mysqli_num_rows($sub_query);

    if ($sub_count > 0)
    {
        $subject_ID = $sub_rs['Subject_ID'];

    }
    else
    {
        $subject_ID = -1;

    }
    $find_sql = "SELECT * FROM `quotes` 
    JOIN author ON (`author`.`Author_ID`= `quotes`.`Author_ID`)
    WHERE `author`.`First` LIKE '%$quick_find%' OR
    `author`.`Middle` LIKE '%$quick_find%' OR
    `author`.`Last` LIKE '%$quick_find%' OR
    `quotes`.`Quote` LIKE '%$quick_find%' OR
    `Subject1_ID` LIKE '$subject_ID' OR
    `Subject2_ID` LIKE '$subject_ID' OR
    `Subject3_ID` LIKE '$subject_ID'
    ORDER BY `quotes`.`ID` ASC";
    $find_query = mysqli_query($dbconnect, $find_sql);
    $find_rs = mysqli_fetch_assoc($find_query);
    $count = mysqli_num_rows($find_query)
?>

<h2>Quick Search - <?php echo $quick_find ?></h2>

<?php
    if($count > 0){
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
        while($find_rs = mysqli_fetch_assoc($find_query));
    }
    else
    {
        ?>
        <h2>Oops!</h2>
            <div class="error">

                Sorry - There are no quotes that match the search term <i><b><?php echo $quick_find?></b></i>

            </div>

            <p>&nbsp;</p>
                
        <?php
    }


?>