<?php

require('top.inc.php');

if(isset($_GET['id'])){
    $id=mysqli_real_escape_string($con,$_GET['id']);
    if($_SESSION['ROLE']==2 && $_SESSION['USER_ID']!=$id){
        die('Access denied');
    }
   $res=mysqli_query($con,"select * from employee where id='$id'");
    $data=mysqli_num_rows($res);

}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<br />
<div class="container" style="width:1000px;">
    <h3 align="">Profile</h3><br />
    <div class="table-responsive">
        <table class="table table-striped">
            <tr>
                <th>Employee ID</th>
                <th>Employee Name</th>
                <th>Email</th>
                <th>Mobile No.</th>
                <th>Department</th>
                <th>DOB</th>
            </tr>
            <?php
            while($row = mysqli_fetch_array($res))
            {
                ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row["name"];?></td>
                    <td><?php echo $row["email"]; ?></td>
                    <td><?php echo $row["mobile"]; ?></td>
                    <td><?php echo $row["department_id"];?></td>
                    <td><?php echo $row["birthday"]; ?></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
</div>
<br />
</body>
</html>
<?php
require('footer.inc.php');
?>