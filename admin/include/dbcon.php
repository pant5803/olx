<?php
$con_ser = "localhost";
$con_user="root";
$con_pass="";
$con_db="olxlist";
$con= mysqli_connect($con_ser,$con_user,$con_pass,$con_db);
if(!$con){
    ?>
    <script>alert("unable to connect to database")</script>
    <?php
}
?>