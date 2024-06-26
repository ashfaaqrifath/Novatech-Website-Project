<?php
session_start();
if (!isset($_SESSION["email"])) {
    header("Location:login.php");
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop - Novatech</title>
    <script src="https://kit.fontawesome.com/c37001a085.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./CSS/style.css">
    <link rel="stylesheet" href="./CSS/shop.css">
    <link rel="shortcut icon" href="img/mylogo3.png">
</head>
<body>

    <!-- js for products details popup and search bar -->
    <script src="js/popup.js" defer></script>
    <script src="js/search.js"></script>

    <section id="header">
        <a href="index.php"><img src="./img/sitelogo.png" class="logo"></a>
        <div>
            <ul id="navbar">
                <li><a href="index.php">Home</a></li>
                <li><a class="active" href="shop.php">Shop</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="contact.html">Contact</a></li>
                <li><a href="login.php"><i class="fa-solid fa-user"></i></a></li>
                <li><a href="cart.php"><i class="fa-solid fa-cart-shopping"></i></a></li>
            </ul>
        </div>
    </section>

    <section id="page-header" style="background-image: url('img/banner/b1.png');">
        <h2>Browse our products</h2>
        <p>Wide range of products that suit your needs</p>
    </section>

    <section id="search-filter">
        <div class="search-engine">
            <div id="search-container">
                <center><input type="search" id="search-input" placeholder="Search for products..."/>
                <button id="search">Search</button></center>
            </div>
            <center><div id="buttons">
                <button id="category" class="button-value">All</button>
                <button id="category" class="button-value">Phones</button>
                <button id="category" class="button-value">Headphone</button>
                <button id="category" class="button-value">Earbuds</button>
                <button id="category" class="button-value">Speakers</button>
            </div></center>
        </div>
    </section>

    <?php
        $con = mysqli_connect("localhost", "root", "", "novatech_database", "3306");
        if (!$con) {
            die("Sorry, you can't connect to the database.");
        }
        $sql = "SELECT * FROM `product_tbl`";
        $results = mysqli_query($con, $sql);

        if (mysqli_num_rows($results) > 0) {
    ?>

    <section id="product1" class="section-p1">
        <div class="pro-container">

            <?php
                $index = 1;
                while ($row = mysqli_fetch_assoc($results)) {

                    if($row["publish"] == 1){
                        $firstWord = explode(" ", $row["productName"]);
                        $brand = $firstWord[0];
            ?>
            <div class="pro" data-name="p-<?php echo $index; ?>">
                <img src="<?php echo $row["imagePath"]; ?>">
                <div class="des">
                    <span><?php echo $brand; ?></span>
                    <h5><?php echo $row["productName"]; ?></h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <span>4.6</span>
                    </div>
                    <h4>Rs. <?php echo number_format($row["price"]); ?></h4>
                </div>
                <h6 class="cart">Details</h6>
            </div>
                <?php
                    }
                ?>
                
            <?php
                    $index++;
                }
            ?>
        </div>

        <!-- product details popup -->
        <div class="products-preview">
            <?php

                mysqli_data_seek($results, 0);
                $index = 1;
                while ($row = mysqli_fetch_assoc($results)) {
            ?>
            <div class="preview" data-target="p-<?php echo $index; ?>">
                <i class="fas fa-times"></i>
                <img src="<?php echo $row["imagePath"]; ?>">

                <a href='CartHandler.php?id=<?php echo $row["productID"]; ?>'>
                    <button class="normal">Add to cart</button>
                </a>

                <a href='wishlist.php?id=<?php echo $row["productID"]; ?>'>
                    <button class="wishlist-btn"><i class="fa-solid fa-heart"></i></button>
                </a>



                <div class="single-pro-details">
                    <h2><?php echo $row["productName"]; ?></h2>
                    <h4>Rs. <?php echo number_format($row["price"]); ?></h4>
                    <i class="fa-solid fa-award"></i>
                    <h6 id="warranty">1 Year Warranty</h6>

                    <input type="number" value="1">
                    <select>
                        <option>Select variant</option>
                        <option>6GB RAM 128GB ROM</option>
                        <option>8GB RAM 256GB ROM</option>
                    </select>

                    <h6>Stock: <span><?php echo $row["stock"]; ?> items left</span></h6>

                    <h4 id="details">Product details</h4>
                    <a href="https://www.google.com/search?q=<?php echo $row['productName']; ?>" target="_blank">Specifications</a>

                    <p><?php echo $row["description"]; ?></p>
                </div>
            </div>
            <?php
                    $index++;
                }
            ?>
        </div>
    </section>
    <?php
        }
    ?>

    <section id="pagination" class="section-p1">
        <a href="#">1</a>
        <a href="shop.php">2</a>
        <a href="shop.php"><i class="fa-solid fa-arrow-right"></i></a>
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
            <a href="#">Shop</a>
            <a href="#">About us</a>
            <a href="#">Contact us</a>
            <a href="#">Privacy Policy</a>
            <a href="about.html">Terms & Conditions</a>
            
        </div>

        <div class="col">
            <h4>My Account</h4>
            <a href="login.php">Sign in</a>
            <a href="cart.php">View cart</a>
            <a href="profile.php">My wishlist</a>
            <a href="logiprofile.php">Order history</a>
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
