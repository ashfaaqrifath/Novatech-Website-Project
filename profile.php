<?php
session_start();
	if(!isset($_SESSION["email"])){
		header("Location:login.php");
	}
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Profile - Novatech</title>
    
    <script src="https://kit.fontawesome.com/c37001a085.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./CSS/style.css">
    <link rel="stylesheet" href="./CSS/profile.css">
    <link rel="shortcut icon" href="img/mylogo3.png" type="image/x-icon">
</head>

<body>

    <script src="js/popup.js" defer></script>
    
    <section id="header">
        <a href="index.php"><img src="./img/sitelogo.png" class="logo"></a>

        <div>
            <ul id="navbar">
                <li><a href="index.php">Home</a></li>
                <li><a href="shop.php">Shop</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="contact.html">Contact</a></li>
                <li><a class="active" href="profile.php"><i class="fa-solid fa-user"></i></a></li>
                <li><a href="cart.php"><i class="fa-solid fa-cart-shopping"></i></a></li>
            </ul>
        </div>
    </section>


    <section id="page-header" style="background-image: url('img/banner/b1.png');">
        <h2>User profile</h2>
        <p>Manage your wishlist, orders and user account</p>
    </section>



    <div class="container">

        <?php
            $con = mysqli_connect("localhost", "root", "", "novatech_database", "3306");
            if (!$con) {
                die("Sorry, you can't connect to the database.");
            }

            $email = $_SESSION["email"];
            $sql = "SELECT * FROM `user_tbl` WHERE `email` = '$email'";
            $results = mysqli_query($con, $sql);
            $user = mysqli_fetch_assoc($results);
        ?>

        <div class="profile-info">

            <div class="user-avatar">
                <center><img src="<?php echo $user["imagePath"]; ?>"></center>
            </div>

            <div class="user-data">
                <br>
                <p>Welcome to your profile</p>
                <h1><?php echo $user["name"]; ?></h1>
                <br>

                <div class="pro-container">
                    
                    <a href='EditProfile.php?id=<?php echo $user["userID"]; ?>'>
                        <button class="normal">Edit profile</button>
                    </a>
            
                    <a href="logout.php">
                        <button class="normal">Log out</button>
                    </a>
                </div>

            </div>
        </div>

        <div class="info-section">
            <h2>Account details</h2>
            <ul>
                <li>
                    <span>Username:</span>
                    <p><?php echo $user["name"]; ?></p>
                </li>
                <li>
                    <span>Email:</span>
                    <p><?php echo $user["email"]; ?></p>
                </li>
                <li>
                    <span>Phone:</span>
                    <p><?php echo $user["contactNumber"]; ?></p>
                </li>
                <li>
                    <span>Shipping address:</span>
                    <p><?php echo $user["address"]; ?></p>
                </li>
            </ul>
        </div>

    </div>



    <?php
        $con = mysqli_connect("localhost", "root", "", "novatech_database", "3306");

        if (!$con) {
            die("Sorry, you can't connect to the database.");
        }
        $email = $_SESSION["email"];
        $sql = "SELECT * FROM `wishlist_tbl` WHERE `email` = '$email'";
        $results = mysqli_query($con, $sql);

        if (mysqli_num_rows($results) > 0) {
    ?>

    <section id="cart" class="section-p1">

        <h2 id="my-products">Wishlist</h2>
        <table width="100%">
            <thead>
                <tr>
                    <td style='font-weight: 600; color: #ff0000;'>PRODUCT</td>
                    <td style='color: #ff0000;'>NAME</td>
                    <td style='color: #ff0000;'>PRICE</td>
                    <td style='padding-right: 100px; color: #ff0000;'>STOCK</td>
                    <td></td>
                </tr>
            </thead>

            <?php
                while ($row = mysqli_fetch_assoc($results)) {
            ?>
            <tbody>
            
                <tr>
                    
                    <td><img src="<?php echo $row["imagePath"] ?>"></td>

                    <td><?php echo $row["productName"]; ?></td>
                    <td>Rs. <?php echo number_format($row["price"]); ?></td>
                    <td style='padding-right: 100px;'><?php echo $row["stock"]; ?> items left</td>

                    <td>
                        <form action='DeleteHandler.php?id=<?php echo $row["itemID"]; ?>' method="post">
                            <button type="submit" class="normal" name="wishlistBtn"><i class="fa-solid fa-trash"></i>&nbsp;&nbsp;Remove</button>
                        </form>
                    </td>


                </tr>

            </tbody>
            <?php
                }
            ?>

        </table>

    </section>
    <?php
        }
    ?>

    
    
    <?php
        $con = mysqli_connect("localhost", "root", "", "novatech_database", "3306");

        if (!$con) {
            die("Sorry, you can't connect to the database.");
        }
        $email = $_SESSION["email"];
        $sql = "SELECT * FROM `order_tbl` WHERE `email` = '$email'";
        $results = mysqli_query($con, $sql);

        if (mysqli_num_rows($results) > 0) {
    ?>

    <br><br>
    <section id="cart" class="section-p1">

        <h2 id="my-orders">Order history</h2>
        <table width="100%">
            <thead>
                <tr>
                    <td style='font-weight: 600; color: #ff0000;'>ORDER ID</td>
                    <td style='color: #ff0000;'>PRODUCTS</td>
                    <td style='color: #ff0000;'>PAYMENT</td>
                    <td style='color: #ff0000; padding-right: 120px;'>DATE</td>
                    <td style='color: #ff0000; padding-right: 10px;'>ADDRESS</td>
                    <td style='color: #ff0000;'>STATUS</td>
                </tr>
            </thead>

            <?php
                while ($row = mysqli_fetch_assoc($results)) {
            ?>

            <tbody>
                <tr>
                    <td style='font-weight: 600;'>#<?php echo $row["orderID"]; ?></td>
                    <td style='padding: 15px 0px 15px;'><?php echo $row["productNames"]; ?></td>
                    <td>Rs. <?php echo number_format($row["payment"]); ?></td>
                    <td style='padding-right: 150px;'><?php echo $row["orderDate"]; ?></td>
                    <td style='font-size: 10px; padding-right: 150px;'><?php echo $row["address"]; ?></td>
                    <td style='font-weight: 600;'><?php echo $row["status"]; ?></td>
                </tr>
            </tbody>
            <?php
                }
            ?>

        </table>

    </section>
    <?php
        }
    ?>




    <br><br><br>
    <footer class="section-p1">

        <div class="col">
            <img class="logo-footer" src="img/sitelogo.png">
            <h4>Contact</h4>
            <p><strong>Address : &nbsp </strong>BOC merchant tower, 28 St Michaels Rd, Colombo</p>
            <p><strong>Phone : &nbsp </strong>+94 74 104 0292</p>
            <p><strong>Email : &nbsp </strong>ashfaaq.rifath2@gmail.com</p>
            
            <div class="follow">
                <h4>Follow us</h4>
                <div class="icon">
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-pinterest"></i>
                    <a href="https://github.com/ashfaaqrifath/Novatech-Website-Project" target="_blank">
                        <i class="fab fa-github"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="col">
            <h4>Quick Links</h4>
            <a href="shop.php">Shop</a>
            <a href="about.html">About us</a>
            <a href="contact.html">Contact us</a>
            <a href="about.html">Privacy Policy</a>
            <a href="about.html">Terms & Conditions</a>
            
        </div>

        <div class="col">
            <h4>My Account</h4>
            <a href="login.php">Sign in</a>
            <a href="cart.php">View cart</a>
            <a href="profile.php">My wishlist</a>
            <a href="profile.php">Order history</a>
        </div>

        <div class="col install">
            <h4>Payment Methods</h4>
            <p>Cash on delivery</p>
            <p>Secure payment gateway</p>
            <img src="img/pay.png">
        </div>

        <div class="copyright">
            <p>Copyright © 2024 Novatech - Developed by <a href="admin.php">Ashfaaq Rifath</a></p>
        </div>

    </footer>





</body>
</html>