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

    <title>Admin - Novatech</title>
    
    <script src="https://kit.fontawesome.com/c37001a085.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./CSS/admin.css">
    
    <link rel="shortcut icon" href="img/mylogo3.png">
    
</head>

<body>

    <section id="menu">
        <div class="logo">
            <a href="index.php"><img src="./img/sitelogo.png" class="logo"></a>
        </div>

        <div class="items">
            <li><i class="fa-solid fa-screwdriver-wrench"></i><a href="#interface">Dashboard</a></li>
            <li><i class="fa-solid fa-bag-shopping"></i><a href="#cart">Products</a></li>
            <li><i class="fa-solid fa-pen-to-square"></i><a href="#my-products">My products</a></li>
            <li><i class="fa-solid fa-truck"></i><a href="#orders">Orders</a></li>
            <li><i class="fa-solid fa-users"></i><a href="#users">Users</a></li>
            <li><i class="fa-solid fa-gear"></i><a href="#">Settings</a></li>
            <li><i class="fa-solid fa-user"></i><a href="login.php">Admin login</a></li>
        </div>
        
    </section>

    <?php
        $con = mysqli_connect("localhost", "root", "", "novatech_database", "3306");
        if (!$con) {
            die("Sorry, you can't connect to the database.");
        }
        
        $product_sql = "SELECT * FROM `product_tbl`";
        $product_num = mysqli_query($con, $product_sql);
        $num_results = mysqli_num_rows($product_num);

        $user_sql = "SELECT * FROM `user_tbl`";
        $user_num = mysqli_query($con, $user_sql);
        $num_results2 = mysqli_num_rows($user_num);

        $order_sql = "SELECT * FROM `order_tbl`";
        $order_num = mysqli_query($con, $order_sql);
        $num_results3 = mysqli_num_rows($order_num);

        $order_sql = "SELECT * FROM `order_tbl` WHERE `status` = 'Delivered'";
        $order_num = mysqli_query($con, $order_sql);
        $num_results4 = mysqli_num_rows($order_num);

        $income_sql = "SELECT SUM(payment) AS income FROM `order_tbl`";
        $results = mysqli_query($con, $income_sql);
        $row = mysqli_fetch_assoc($results);
        $income = number_format($row['income']);

        $inventory_sql = "SELECT SUM(stock) AS stock FROM `product_tbl`";
        $results = mysqli_query($con, $inventory_sql);
        $row = mysqli_fetch_assoc($results);
        $stock = $row['stock'];

        $email = $_SESSION["email"];
        $sql = "SELECT * FROM `user_tbl` WHERE `email` = '$email'";
        $results = mysqli_query($con, $sql);
        $user = mysqli_fetch_assoc($results);
    ?>

    
    <section id="interface">
        <div class="navigation">
            <div class="n1">

                <?php
                    echo "<div class='counter' style='padding-top: 10px;'><a>" . $_SESSION['email'] . "</a></div>";
                ?>
                
                <div class="profile">
                    <h4><?php echo date('Y-m-d'); ?></h4>
                    <i class="fa-solid fa-gear"></i>
                    <a href="profile.php"><img src="<?php echo $user["imagePath"]; ?>" class="logo"></a>
                </div>
            </div>
        </div>

        <h3 class="i-name">
            Dashboard
            <a href="index.php">
                <button type="button" class="normal">View site</button>
            </a>
        </h3>


        <div class="values">

            <div class="val-box">
                <i class="fa-solid fa-shapes"></i>
                <div>
                    <span>Inventory</span>
                    <?php
                        echo "<h3>$stock</h3>";
                    ?>
                </div>
            </div>

            <div class="val-box">
                <i class="fa-solid fa-bag-shopping"></i>
                <div>
                    <span>Products</span>
                    <?php
                        echo "<h3>$num_results</h3>";
                    ?>
                </div>
            </div>

            <div class="val-box">
                <i class="fa-solid fa-truck"></i>
                <div>
                    <span>Total orders</span>
                    <?php
                        echo "<h3>$num_results3</h3>";
                    ?>
                    
                </div>
            </div>

            <div class="val-box">
                <i class="fa-solid fa-money-bill"></i>
                <div>
                    <span>Income</span>
                    <?php
                        echo "<h3>$income</h3>";
                    ?>
                </div>
            </div>
        </div>


        <br><br>
        <section id="feature" class="section-p1">

            <div class="fe-box">
                <img src="img/about/truck-solid (1).svg" style="width: 90px; height: 90px;">
                <h6>Orders completed: <?php echo $num_results4; ?></h6>
            </div>
    
            <div class="fe-box">
                <img src="img/about/headset-solid (2).svg" style="width: 90px; height: 90px;">
                <h6>Customer feedback: 35</h6>
            </div>
    
            <div class="fe-box">
                <img src="img/about/award-solid (1).svg" style="width: 90px; height: 90px;">
                <h6>Warranty up to 1 year</h6>
            </div>
    
            <div class="fe-box">
                <img src="img/about/screwdriver-wrench-solid (1).svg" style="width: 90px; height: 90px;">
                <h6>Product inventory: <?php echo $row['stock']; ?></h6>
            </div>
    
            <div class="fe-box">
                <img src="img/about/clock-solid (1).svg" style="width: 90px; height: 90px;">
                <h6>Site status: active</h6>
            </div>
    
        </section>

        <br><br><br>
        <hr>
        <br><br><br>

        <?php
            $con = mysqli_connect("localhost", "root", "", "novatech_database", "3306");
            if (!$con) {
                die("Sorry, you can't connect to the database.");
            }
            $sql = "SELECT * FROM `product_tbl`";
            $results = mysqli_query($con, $sql);
            $num_results = mysqli_num_rows($results);

            if (mysqli_num_rows($results) > 0) {
        ?>

        <section id="cart" class="section-p1">

            <form action="PublishHandler.php" method="post" style="position: absolute; right: 70px;">
                <button type="submit" class="normal" name="unpublishBtn">Unpublish all</button>&nbsp&nbsp
                <button type="submit" class="normal" name="publishBtn">Publish all</button>
            </form>

            <h2>Product settings</h2>
            <table width="100%">
                <thead>
                    <tr>
                        <td style="color: #ff0000;">PRODUCT</td>
                        <td style="color: #ff0000;">NAME</td>
                        <td style="color: #ff0000;">PRICE</td>
                        <td style="color: #ff0000;">STOCK</td>
                        <td style="padding-left: 60px; color: #ff0000;">PUBLISHED BY</td>
                        <td></td>
                    </tr>
                </thead>
    

                <?php
                    while ($row = mysqli_fetch_assoc($results)) {
                ?>
                <tbody>
                    <tr>
                        
                        <td><img src="<?php echo $row["imagePath"]; ?>"></td>
    
                        <td><?php echo $row["productName"]; ?></td>
                        <td>Rs. <?php echo number_format($row["price"]); ?></td>
                        <td><?php echo $row["stock"]; ?> items left</td>
                        <td style='padding-left: 40px; font-weight: 450;'><?php echo $row["email"]; ?></td>
                    </tr>
    
                </tbody>
                <?php
                    }
                ?>

            </table>
            <br>
            <?php
                echo "<div class='counter'><a>Number of products: $num_results</a></div>";
            ?>
            <a href="AddProduct.php">
                <center><button class="normal"><i class="fa-solid fa-plus"></i>&nbsp;&nbsp;Add product</button></center>
            </a>
    
        </section>

        <?php
            }
        ?>

        <br><br><br>
        <hr>
        <br><br><br>

        <?php
            $con = mysqli_connect("localhost", "root", "", "novatech_database", "3306");

            if (!$con) {
                die("Sorry, you can't connect to the database.");
            }
            $sql = "SELECT * FROM `product_tbl` WHERE `email` = '$email'";
            $results = mysqli_query($con, $sql);
            $num_results = mysqli_num_rows($results);

            if (mysqli_num_rows($results) > 0) {
        ?>

        <section id="cart" class="section-p1">

            <h2 id="my-products">My products</h2>
            <table width="100%">
                <thead>
                    <tr>
                        <td>PRODUCT</td>
                        <td>NAME</td>
                        <td>PRICE</td>
                        <td style='padding-right: 60px;'>STOCK</td>
                        <td>
                            <?php
                                echo "<div class='counter'><a>" . $_SESSION['email'] . "</a></div>";
                            ?>
                        </td>
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
                        <a href='EditProduct.php?id=<?php echo $row["productID"]; ?>'>
                            <button class="normal"><i class="fa-solid fa-pen-to-square"></i>&nbsp;&nbsp;Edit</button>
                        </a></td>

                        <td>
                            <form action='DeleteHandler.php?id=<?php echo $row["productID"]; ?>' method="post">
                                <button type="submit" class="normal" name="deleteProductBtn"><i class="fa-solid fa-trash"></i>&nbsp;&nbsp;Remove</button>
                            </form>
                        </td>
                        
                    </tr>
    
                </tbody>
                <?php
                    }
                ?>

            </table>
            <br>
            <?php
                echo "<div class='counter'><a>Number of products: $num_results</a></div>";
            ?>
            <a href="AddProduct.php">
                <center><button class="normal"><i class="fa-solid fa-plus"></i>&nbsp;&nbsp;Add product</button></center>
            </a>
    
        </section>

        <?php
            }
        ?>

        <br><br><br>
        <hr>
        <br><br>



        <?php
            $con = mysqli_connect("localhost", "root", "", "novatech_database", "3306");

            if (!$con) {
                die("Sorry, you can't connect to the database.");
            }
        
            $sql = "SELECT * FROM `order_tbl`";
            $results = mysqli_query($con, $sql);
            $num_results = mysqli_num_rows($results);

            if (mysqli_num_rows($results) > 0) {
        ?>

        <br><br>
        <section id="cart" class="section-p1">

            <h2 id="orders">Customer orders</h2>
            <table width="100%">
                <thead>
                    <tr>
                        <td style='font-weight: 600; color: #ff0000;'>ORDER ID</td>
                        <td style='color: #ff0000;'>PRODUCTS</td>
                        <td style='color: #ff0000;'>PAYMENT</td>
                        <td style='color: #ff0000; padding-right: 120px;'>DATE</td>
                        <td style='color: #ff0000; padding-right: 10px;'>EMAIL</td>
                        <td></td>
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
                        <td style='font-size: 10px; padding-right: 150px;'><?php echo $row["email"]; ?></td>
                        
                        <td style='padding: 20px 0px 20px 0px;'>
                            <a href='admin.php?id=<?php echo $row["orderID"]; ?>'>
                                <button class="normal"><?php echo $row["status"]; ?></button>
                            </a>
                        </td>
                    </tr>
                </tbody>
                <?php
                    }
                ?>

            </table>
            <br>
            <?php
                echo "<div class='counter'><a>Number of orders: $num_results</a></div>";
            ?>

        </section>
        <?php
            }
        ?>



        <?php
            
            if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                $con = mysqli_connect("localhost", "root", "", "novatech_database", "3306");
                
                if (!$con) {
                    die("Sorry, you can't connect to the database.");
                }
                
                $sql = "UPDATE `order_tbl` SET `status` = 'Delivered' WHERE `orderID` =" . $_GET["id"];

                if (mysqli_query($con, $sql)) {
                    echo "<script>
                        alert('Order status updated');
                        window.location.href = 'admin.php#orders';
                        </script>";
                }
            }
        ?>






        <br><br><br>
        <hr>
        <br><br>

        <?php
            $con = mysqli_connect("localhost", "root", "", "novatech_database", "3306");
            if (!$con) {
                die("Sorry, you can't connect to the database.");
            }
            $sql = "SELECT * FROM `user_tbl`";
            $results = mysqli_query($con, $sql);
            $num_results = mysqli_num_rows($results);

            $sql = "
                SELECT usr.*, COUNT(ord.orderID) as order_count
                FROM user_tbl usr
                LEFT JOIN order_tbl ord ON usr.email = ord.email
                GROUP BY usr.userID";

            $results = mysqli_query($con, $sql);

            if (mysqli_num_rows($results) > 0) {
        ?>

        <section id="cart" class="section-p1">

            <h2 id="users">Manage users</h2>
            <table width="100%">
                <thead>
                    <tr>
                        <td style='font-weight: 600; color: #ff0000;'>USERNAME</td>
                        <td style='color: #ff0000;'>EMAIL</td>
                        <td style='color: #ff0000;'>PHONE</td>
                        <td style='color: #ff0000;'>ORDERS</td>
                        <td></td>
                    </tr>
                </thead>

                <?php
                    while ($row = mysqli_fetch_assoc($results)) {
                ?>

                <tbody>
                    <td style='font-weight: 600;'><?php echo $row["name"]; ?></td>
                    <td style='font-weight: 600;'><?php echo $row["email"]; ?></td>
                    <td style='font-weight: 600;'><?php echo $row["contactNumber"]; ?></td>
                    <td style='font-weight: 600;'><?php echo $row["order_count"]; ?></td>
                    
                    <td style='padding: 20px 0px 20px 0px;'>
                        <form action='DeleteHandler.php?id=<?php echo $row["userID"]; ?>' method="post">
                            <button type="submit" class="normal" name="deleteUserBtn"><i class="fa-solid fa-trash"></i>&nbsp;&nbsp;Remove</button>
                        </form>
                    </td>
                </tbody>
                <?php
                    }
                ?>
            </table>
            <br>
            <?php
                echo "<div class='counter'><a>Number of users: $num_results</a></div>";
            ?>

        </section>
        <?php
            }
        ?>




        <br><br><br><br>
        <div class="copyright">
            <br>
            <p>Copyright © 2024 <a href="index.php">Novatech</a> - Developed by Ashfaaq Rifath</p>
        </div>
        <br><br>

    </section>



</body>
</html>