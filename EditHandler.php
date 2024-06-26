<?php session_start();

	// edit handler for products
	if(isset($_POST["btnSubmit"])){
		$productName = $_POST["txtTitle"];
		$desc = $_POST["txtDescription"];
		$price = $_POST["price"];
        $stock = $_POST["stock"];
		
		if(isset($_POST["txtPublish"])){
			$status = 1;
		}
		else{
			$status = 0;
		}
		
		if(!file_exists($_FILES["imageFile"]["tmp_name"]) ||
		!is_uploaded_file($_FILES["imageFile"]["tmp_name"])){
			$image = $_SESSION["imagePath"];
		}
		else{
			$image = "uploads/" . basename($_FILES["imageFile"]["name"]);
			move_uploaded_file($_FILES["imageFile"]["tmp_name"], $image);
		}
		
		$con = mysqli_connect("localhost", "root", "", "novatech_database", "3306");
	
		if(!$con){
			die("Sorry, you can't connect to the database.");
		}
		
		$sql = "UPDATE `product_tbl` SET `productName` = '$productName', `description` = '$desc', `publish` = '$status', `price` = '$price', `stock` = '$stock', `imagePath` = '$image' WHERE `product_tbl`.`productID` = " . $_GET["id"];
		
		if(mysqli_query($con, $sql)){
			echo "<script>
				alert('Saved changes');
				window.location.href = 'admin.php#my-products';
				</script>";
		}
	}

	// edit handler for profile
	if(isset($_POST["btnSubmitProfile"])){
		$name = $_POST["txtName"];
		$email = $_POST["txtEmail"];
		$phone = $_POST["txtPhone"];
        $address = $_POST["txtAddress"];
        $password = $_POST["txtPassword"];

		$image = "uploads/" . basename($_FILES["imageFile"]["name"]);
		move_uploaded_file($_FILES["imageFile"]["tmp_name"], $image);
		
		$con = mysqli_connect("localhost", "root", "", "novatech_database", "3306");
	
		if(!$con){
			die("Sorry, you can't connect to the database.");
		}
		
		$sql = "UPDATE `user_tbl` SET `email` = '$email', `name` = '$name', `contactNumber` = '$phone', `address` = '$address', `password` = '$password', `imagePath` = '$image' WHERE `user_tbl`.`userID` = " . $_GET["id"];
		
		if(mysqli_query($con, $sql)){
			echo "<script>
				alert('Saved changes');
				window.location.href = 'profile.php';
				</script>";
		}
	}

?>





















