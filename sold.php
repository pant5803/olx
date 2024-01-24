<?php
include 'admin/include/dbcon.php';
session_start();
if (!isset($_SESSION['username'])) {
?>
  <script>
    location.replace('index.php')
  </script>
<?php
}
?>

<?php
$itemid = $_GET['itemid'];

$query = "UPDATE items SET itemstatus = 'not available' WHERE itemid = $itemid;";
$run = mysqli_query($con, $query);
if ($run) {
?>
  <script>
    alert("item removed");
    location.replace('myproducts.php');
  </script>
<?php
} else {
?>
  <script>
    alert("unable to remove item at the moment");
    location.replace('myproducts.php');
  </script>
<?php
}

?>