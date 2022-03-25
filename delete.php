<?php
include "db.inc.php";
if($_SESSION['ROLE']!=1){
    header('location:add_employee.php?id='.$_SESSION['USER_ID']);
    die();
}
if(isset($_GET['type']) && $_GET['type']=='delete' && isset($_GET['id'])){
    $id=mysqli_real_escape_string($con,$_GET['id']);
    mysqli_query($con,"delete from leave_type where id='$id'");
}
$res=mysqli_query($con,"select * from leave_type order by id desc");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FORM</title>
</head>
<body>
<h6>Are you sure you want to delete this record?</h6>



    <div>
        <?php

        while($row=mysqli_fetch_assoc($res)){?>


                <?php echo $row['id']?>


            <?php

        } ?>
        <a href="index.php?id=<?php echo $row['id']?>&type=delete">YES</a>
        <a href="leave_type.php">NO </a>
    </div>

</body>
</html>