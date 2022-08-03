<h2>Random Results</h2>
<?php 

    $find_sql = "SELECT * FROM `quotes` 
    JOIN author ON (`author`.`Author_ID`= `quotes`.`Author_ID`)
    ORDER BY RAND() LIMIT 10";
    $find_query = mysqli_query($dbconnect, $find_sql);
    $find_rs = mysqli_fetch_assoc($find_query);

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