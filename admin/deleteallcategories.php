<?php
include 'include/dbcon.php';
$query = "DELETE FROM categories;";
$run = mysqli_query($con,$query);
if($run){
    ?>
    <script>
        alert("deleted all the categories");
        location.replace('categories.php');
    </script>
    <?php
}else{
    ?>
    <script>
        alert("unable to delete categories");
        location.replace('categories.php');
    </script>
    <?php
}
?>