<h2>All Results</h2>
<?php 

    $find_sql = "SELECT * FROM `quotes` 
    JOIN author ON (`author`.`Author_ID`= `quotes`.`Author_ID`)
    ORDER BY `quotes`.`ID` ASC";
    $find_query = mysqli_query($dbconnect, $find_sql);
    $find_rs = mysqli_fetch_assoc($find_query);

    do {

        $quote = preg_replace('/[^A-Za-z0-9.,?\s\'\-]/', ' ',$find_rs['Quote'] );

        $first = $find_rs['First'];
        $middle = $find_rs['Middle'];
        $last = $find_rs['Last'];

        $full_name = $first." ".$middle." ".$last;
        ?>
        <div class="results">

            <?php echo $quote;?>
            <?php echo $full_name;?>
        </div>


        <?php

    }
    while($find_rs = mysqli_fetch_assoc($find_query))


?>