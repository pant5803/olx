<?php
include 'admin/include/dbcon.php';
session_start();
$query = "select * from site";
$selected = mysqli_query($con, $query);
$res = mysqli_fetch_assoc($selected);

?>
<html>
<style>
    .navbar-custom {
        min-height: 80px;
    }

    /* Align logo and site name */
    .navbar-brand img {
        max-height: 50px;
        margin-right: 10px;
    }

    /* Style search bar */
    .search-box {
        max-width: 300px;
    }

    .container-fluid {
        background-color: rgb(8, 8, 35);
    }

    .navbar-brand {
        color: yellow;
        font-weight: 800;
    }

    .navbar-brand:hover {
        color: yellow;
    }

    .linki:hover {
        font-size: larger;
    }

    .card {
        border: 1px solid #ddd;
        border-radius: 8px;
    }

    .card-img-top {
        height: 200px;
        object-fit: cover;
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
    }

    .card-title {
        font-size: 1.25rem;
        font-weight: bold;
    }

    .card-text {
        margin-bottom: 0.5rem;
    }

    .btn-group {
        margin-top: 1rem;
    }

    .nav-item {
        margin-left: 15px;
    }
</style>

<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-custom navo">
    <div class="container-fluid">
        <!-- Site Logo -->
        <a class="navbar-brand" href="index.php">
            <img src="<?php echo "admin/" . $res['logo']; ?>" alt="Logo">
        </a>


        <!-- Search Box -->
        <form class="d-flex" action="index.php" method="post">
            <input class="form-control me-2 search-box" type="search" placeholder="Search for products" aria-label="Search" name="searcheditem">
            <input class="btn btn-outline-success" type="submit" value="Search" name="search">
        </form>

        <!-- Login/Signup/ SELL ITEM Options -->
        <?php
        if (isset($_SESSION['username'])) {
            // display sell button
        ?>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link linki" style="color:yellow;" href="index.php">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link linki" style="color:yellow;" href="about.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link linki" style="color:yellow;" href="contactus.php">ContactUs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link linki" style="color:yellow;" href="social.php">Social</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link linki" style="color:yellow;" href="myprofile.php">MyProfile</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link linki" style="color:yellow;" href="sellitem.php">SELL ITEM</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link linki" style="color:yellow;" href="userlogout.php">Logout</a>
                </li>
            </ul>
        <?php
        } else {
        ?>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link linki" style="color:yellow;" href="index.php">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link linki" style="color:yellow;" href="about.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link linki" style="color:yellow;" href="contactus.php">ContactUs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link linki" style="color:yellow;" href="social.php">Social</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link linki" style="color:yellow;" href="admin/index.php">AdminLogin</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link linki" style="color:yellow;" href="userlogin.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link linki" style="color:yellow;" href="usersignup.php">Sign Up</a>
                </li>

            </ul>
        <?php
        }
        ?>
    </div>
</nav>

</html>