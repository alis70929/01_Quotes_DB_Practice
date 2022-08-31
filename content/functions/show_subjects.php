<?php
$sub1_id = $find_rs['Subject1_ID'];
$sub2_id = $find_rs['Subject2_ID'];
$sub3_id = $find_rs['Subject3_ID'];

$all_subjects = array($sub1_id,$sub2_id,$sub3_id);
foreach($all_subjects as $subject)
{
    $sub_sql = "SELECT * FROM `subject` WHERE `Subject_ID` = $subject";
    $sub_query = mysqli_query($dbconnect, $sub_sql);
    $sub_rs = mysqli_fetch_assoc($sub_query);
    if($subject != 0)
    {
    
   
    ?>

    <span class="tag">
        <a href="index.php?page=subject&subjectID=<?php echo $sub_rs['Subject_ID'] ?>">
            <?php echo $sub_rs['Subject']?>
        </a>
    </span> &nbsp;

    <?php
    }// if subject end
    unset($subject);

    
} // for each end

if (isset($_SESSION['admin'])){
    ?>
        <div class="edit-tools">
            <a href="index.php?page=../admin/editquote&ID=<?php echo $find_rs['ID']; ?>"
            title="Edit quote"><i class="fa fa-edit fa-2x"></i></a>

            &nbsp; &nbsp;

            <a href="index.php?page=../admin/deletequote_confirm&ID=<?php echo $find_rs['ID']?>"
            title="Delete Quote"><i class="fa fa-trash fa-2x"></i></a>
        </div>
    
    
    
    
    <?php
}


?>