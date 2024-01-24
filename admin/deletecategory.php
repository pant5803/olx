<?php
include 'include/dbcon.php';
$catid = $_GET['catid'];
$query = "delete from categories where categoryid='$catid'";
$run = mysqli_query($con,$query);
if($run){
    ?>
    <script>
        alert("category deleted successfully");
        location.replace('categories.php');
    </script>
    <?php
}else{
    ?>
    <script>
        alert("unable to delete category");
        location.replace('categories.php');
    </script>
    <?php
}
?>