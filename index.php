<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Novatech | Genuine Tech</title>
    
    <script src="https://kit.fontawesome.com/c37001a085.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./CSS/style.css">
    <link rel="stylesheet" href="./CSS/shop.css">
    <link rel="shortcut icon" href="img/mylogo3.png">
    
</head>

<body onLoad="heroSlides()">

    <!-- js for banner slider -->
    <script>
		let slideIndex = 0;

		function heroSlides(){
			
			let i;
			let slides = document.getElementsByClassName("mySlides");

			for (i = 0; i < slides.length; i++){
				slides[i].style.display = "none";
			}

			slideIndex++;

			if (slideIndex > slides.length){
				slideIndex = 1
			}

			slides[slideIndex-1].style.display = "block";
			setTimeout(heroSlides, 3000); //Change image every 3 seconds
		}
	</script>
    <script src="./js/popup.js" defer></script>

    
    <section id="header">
        <a href="#"><img src="./img/sitelogo.png" class="logo"></a>

        <div>
            <ul id="navbar">
                <li><a class="active" href="index.php">Home</a></li>
                <li><a href="shop.php">Shop</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="contact.html">Contact</a></li>
                <li><a href="login.php"><i class="fa-solid fa-user"></i></a></li>
                <li><a href="cart.php"><i class="fa-solid fa-cart-shopping"></i></a></li>
            </ul>
        </div>
    </section>


    <div class="slideshow-container">
		
		<div class="mySlides fade">
			<section id="hero1" style="background-image: url('img/hero1.png');">
                <h4>Discover Best Technology</h4>
                <h2>Novatech</h2>
                <h1>Genuine Tech</h1>
                <a href="#product1">
                    <button>Shop Now &nbsp&nbsp<i class="fa-solid fa-bag-shopping"></i></button>
                </a>
            </section>
		</div>
		
		<div class="mySlides fade">
			<section id="hero2" style="background-image: url('img/hero4.png');">
                <h4>Discover Best Technology</h4>
                <h2>Novatech</h2>
                <h1>Genuine Tech</h1>
                <a href="#product1">
                    <button>Shop Now &nbsp&nbsp<i class="fa-solid fa-bag-shopping"></i></button>
                </a>
            </section>
		</div>
		
		<div class="mySlides fade">
			<section id="hero3" style="background-image: url('img/hero3.png');">
                <h4>Discover Best Technology</h4>
                <h2>Novatech</h2>
                <h1>Genuine Tech</h1>
                <a href="#product1">
                    <button>Shop Now &nbsp&nbsp<i class="fa-solid fa-bag-shopping"></i></button>
                </a>
            </section>
		</div>
        
	</div>

    
    <!-- logo display cards -->
    <section id="feature" class="section-p1">

        <div class="fe-box">
            <img src="img/features/google-sri-lanka-simplytek_1384x1080_crop_center (1).webp">
            <h6>Google</h6>
        </div>

        <div class="fe-box">
            <img src="img/features/apple-sri-lanka-simplytek_512x384_crop_center.webp">
            <h6>Apple</h6>
        </div>

        <div class="fe-box">
            <img src="img/features/showerme.webp">
            <h6>Xiaomi</h6>
        </div>

        <div class="fe-box">
            <img src="img/features/brand-samsung.webp">
            <h6>Samsung</h6>
        </div>

        <div class="fe-box">
            <img src="img/features/onepluslgog.webp">
            <h6>Oneplus</h6>
        </div>

    </section>
    

    <!-- featured products -->
    <?php
        $con = mysqli_connect("localhost", "root", "", "novatech_database", "3306");
        if (!$con) {
            die("Sorry, you can't connect to the database.");
        }
        $sql = "SELECT * FROM `product_tbl` LIMIT 8";
        $results = mysqli_query($con, $sql);

        if (mysqli_num_rows($results) > 0) {
    ?>

    <section id="product1" class="section-p1">
        <h2 class="heading1">Featured Products</h2>
        <p class="sub1">Discover the latest products from a wide range of brands</p>
        <div class="pro-container">

            <?php
                $index = 1;

                while ($row = mysqli_fetch_assoc($results)) {
                    
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
                    $index++;
                }
            ?>
        </div>
        <br>
        <a href="shop.php">
            <button class="shop-btn">Shop More &nbsp&nbsp<i class="fa-solid fa-bag-shopping"></i></button>
        </a>
        <br><br><br><br>

        <h2 class="heading1">Store Promotions</h2>
        <p class="sub1">Explore our latest store promotions and offers</p>

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
                <button class="normal" onclick="this.innerHTML = 'Item added'">Add to cart</button>

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


    <!-- store promotions -->
    <section id="sm-banner" class="section-p1">
        <div class="banner-box" style="background-image: url('img/banner/iPhone-15-General-Feature-Black.jpg');">
            <h4>iPhone deals</h4>
            <h2>Price drop 30%</h2>
            <span>Enjoy seasonal offers for Apple products</span>

            <a href="shop.php">
                <button class="white">Learn More</button>
            </a>
        </div>

        <div class="banner-box" style="background-image: url('img/banner/galaxy_s23_ultra_green_1685683384322.webp');">
            <h4>Samsung deals</h4>
            <h2>Price drop 30%</h2>
            <span>Enjoy seasonal offers for Samsung products</span>

            <a href="shop.php">
                <button class="white">Learn More</button>
            </a>
        </div>
    </section>


    <section id="banner3">
        <div class="banner-box1" style="background-image: url('img/banner/redmibanner.png');">
            <h2>REDMI SALE</h2>
            <h3>Black Friday 50% off</h3>
            <h4>Check out our shop</h4>
        </div>

        <div class="banner-box2" style="background-image: url('img/banner/onebanner.webp');">
            <h2>ONEPLUS SALE</h2>
            <h3>Black Friday 50% off</h3>
            <h4>Check out our shop</h4>
        </div>

        <div class="banner-box3" style="background-image: url('img/banner/pxbanner.webp');">
            <h2>PIXEL SALE</h2>
            <h3>Black Friday 50% off</h3>
            <h4>Check out our shop</h4>
        </div>
    </section>

    
    <br><br><br>
    <footer class="section-p1-home">

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