<?php session_start();

    //delete product btn
	if(isset($_POST["deleteProductBtn"])){

		$id = $_GET["id"];

		$con = mysqli_connect("localhost", "root", "", "novatech_database", "3306");
                
        if(!$con){
            die("Sorry, you can't connect to the database.");
        }

        $sql = "DELETE FROM `product_tbl` WHERE `productID` =" . $_GET["id"];

        if(mysqli_query($con, $sql)){
            echo "<script>
				alert('Deleted product');
				window.location.href = 'admin.php#my-products';
				</script>";
        }
	}


	
    //delete user btn
	if(isset($_POST["deleteUserBtn"])){

		$id = $_GET["id"];

		$con = mysqli_connect("localhost", "root", "", "novatech_database", "3306");
                
        if(!$con){
            die("Sorry, you can't connect to the database.");
        }

        $sql = "DELETE FROM `user_tbl` WHERE `userID` =" . $_GET["id"];

        if(mysqli_query($con, $sql)){
            echo "<script>
                alert('Deleted user');
                window.location.href = 'admin.php#users';
                </script>";
        }
	}



    //delete from wishlist btn
    if(isset($_POST["wishlistBtn"])){

		$id = $_GET["id"];

		$con = mysqli_connect("localhost", "root", "", "novatech_database", "3306");
                
        if(!$con){
            die("Sorry, you can't connect to the database.");
        }

        $sql = "DELETE FROM `wishlist_tbl` WHERE `itemID` =" . $_GET["id"];

        if(mysqli_query($con, $sql)){
            echo "<script>
                alert('Removed from wishlist');
                window.location.href = 'profile.php#my-products';
                </script>";
        }
	}



    //delete from cart btn
    if(isset($_POST["cartDeleteBtn"])){

		$id = $_GET["id"];

		$con = mysqli_connect("localhost", "root", "", "novatech_database", "3306");
                
        if(!$con){
            die("Sorry, you can't connect to the database.");
        }

        $sql = "DELETE FROM `cart_tbl` WHERE `cartID` =" . $_GET["id"];

        if(mysqli_query($con, $sql)){
            echo "<script>
                alert('Removed from cart');
                window.location.href = 'cart.php';
                </script>";
        }
	}



?>