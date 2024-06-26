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

    <title>Cart - Novatech</title>
    
    <script src="https://kit.fontawesome.com/c37001a085.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./CSS/style.css">
    <link rel="stylesheet" href="./CSS/cart.css">
    <link rel="shortcut icon" href="img/mylogo3.png" type="image/x-icon">
</head>

<body>
    
    <section id="header">
        <a href="index.php"><img src="./img/sitelogo.png" class="logo"></a>

        <div>
            <ul id="navbar">
                <li><a href="index.php">Home</a></li>
                <li><a href="shop.php">Shop</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="contact.html">Contact</a></li>
                <li><a href="profile.php"><i class="fa-solid fa-user"></i></a></li>
                <li><a class="active" href="cart.php"><i class="fa-solid fa-cart-shopping"></i></a></li>
            </ul>
        </div>
    </section>


    <section id="page-header" class="about-header" style="background-image: url('img/banner/b1.png');">
        <h2>Shopping cart</h2>
        <p>Add, remove or increase product quantity</p>
    </section>

    
    
    <?php
        $con = mysqli_connect("localhost", "root", "", "novatech_database", "3306");

        if (!$con) {
            die("Sorry, you can't connect to the database.");
        }
        $sql = "SELECT * FROM `cart_tbl` WHERE `email` = '" . $_SESSION["email"] . "'";
        $results = mysqli_query($con, $sql);
        $num_results = mysqli_num_rows($results);

        if (mysqli_num_rows($results) > 0) {
    ?>

    <section id="cart" class="section-p1">

        <table width="100%">
            <thead>
                <tr>
                    <td>PRODUCT</td>
                    <td>NAME</td>
                    <td>PRICE</td>
                    <td style='padding-right: 100px;'>QUANTITY</td>
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
                    <td style='padding-right: 100px;'><input type="number" value="1"></td>

                    <td>
                        <form action='DeleteHandler.php?id=<?php echo $row["cartID"]; ?>' method="post">
                            <button type="submit" class="normal" name="cartDeleteBtn"><i class="fa-solid fa-trash"></i>&nbsp;&nbsp;Remove</button>
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

        $sql = "SELECT SUM(price) AS total_price FROM `cart_tbl` WHERE `email` = '" . $_SESSION["email"] . "'";
        $results = mysqli_query($con, $sql);

        $row = mysqli_fetch_assoc($results);
        $total_price = $row['total_price'];
    ?>

    <section id="cart-add" class="section-p1">

        <div id="address">
            <?php
                $con = mysqli_connect("localhost", "root", "", "novatech_database", "3306");
                if (!$con) {
                    die("Sorry, you can't connect to the database.");
                }

                $sql = "SELECT * FROM `user_tbl` WHERE email = '" . $_SESSION['email'] . "'";
                $results = mysqli_query($con, $sql);
                $user = mysqli_fetch_assoc($results);
            ?>
            <br>
            <h3>Shipping details</h3>
            <br>
            
            <p style="font-weight: 600; color:black;">Customer name:</p>
            <p><?php echo $user["name"]; ?></p><hr>

            <p style="font-weight: 600; color:black;">Email address:</p>
            <p><?php echo $user["email"]; ?></p><hr>
    
            <p style="font-weight: 600; color:black;">Phone:</p>
            <p><?php echo $user["contactNumber"]; ?></p><hr>

            <p style="font-weight: 600; color:black;">Address:</p>
            <p><?php echo $user["address"]; ?></p>

        </div>

        <div id="subtotal">
            <h3>Payment details</h3>
            <table>
                <tr>
                    <td>Cart Subtotal</td>
                    <td>Rs. <?php echo number_format($total_price); ?></td>
                </tr>
                <tr>
                    <td>Shipping</td>
                    <td>Free</td>
                </tr>
                <tr>
                    <td>Tax</td>
                    <td>Rs. 100</td>
                </tr>
                <tr>
                    <td><strong>Total</strong></td>
                    <td><strong>Rs. <?php echo number_format($total_price + 100); ?></strong></td>
                </tr>
            </table>

            <a href='OrderHandler.php?id=<?php echo $user["userID"]; ?>'>
                <button class="normal">Place order</button>
            </a>
        </div>
    </section>




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