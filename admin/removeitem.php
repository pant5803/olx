<?php
include 'adminnavbar.php';
$itemid = $_GET['itemid'];
$lol = "select * from items where itemid=$itemid";
$slol = mysqli_query($con,$lol);
$rlol = mysqli_fetch_assoc($slol);
?>

<?php
if($rlol['itemstatus']=="available"){
$que = "update items set itemstatus='not available' where itemid=$itemid;";
$ru = mysqli_query($con,$que);
if($ru){
    ?>
    <script>
        alert("item has been removed");
        location.replace('products.php');
    </script>
    <?php
}else{
    ?>
    <script>
        alert("unable to remove item");
        location.replace('products.php');
    </script>
    <?php
}
}else{
    $que = "update items set itemstatus='available' where itemid=$itemid;";
$ru = mysqli_query($con,$que);
if($ru){
    ?>
    <script>
        alert("item will be available for sale");
        location.replace('products.php');
    </script>
    <?php
}else{
    ?>
    <script>
        alert("unable to make item, available for sale");
        location.replace('products.php');
    </script>
    <?php
}
}
?>