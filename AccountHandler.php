<?php session_start();

	if(isset($_POST["btnSubmit"])){
		$email = $_POST["txtEmail"];
		$password = $_POST["txtPassword"];
		$admin1 = "admin@novatech.com";
		$admin2 = "ashfaaq.rifath2@gmail.com";
		
		#localhost, root, pw, db name(that u created in phpMyadmin), port(check in wamp icon and mysql)
		$con = mysqli_connect("localhost", "root", "", "novatech_database", "3306");
			
		if(!$con){
			die("Sorry, you can't connect to the database.");
		}
		
		$sql = "SELECT * FROM `user_tbl` WHERE `email` = '$email' AND `password` = '$password'";
		
		$result = mysqli_query($con, $sql);


		if(mysqli_num_rows($result) > 0){

			if($email===$admin1 || $email===$admin2){
				$_SESSION["email"] = $email;
				header("Location:admin.php");
			}
			else{
				$_SESSION["email"] = $email;
				header("Location:profile.php");
			}	
		}
		else{
			echo "<script>
                alert('Invalid login details');
                window.location.href = 'login.php';
                </script>";
		}
	}


	// register handler
	if(isset($_POST["btnRegister"])){
		
		$name = $_POST["txtName"];
		$email = $_POST["txtEmail"];
		$password = $_POST["txtPassword"];
		$contact = $_POST["txtContactNo"];
		$address = $_POST["txtAddress"];
		$imagePath = "img/mylogo3.png";
		
		#localhost, root, pw, db name(that u created in phpMyadmin), port(check in wamp icon and mysql)
		$con = mysqli_connect("localhost", "root", "", "novatech_database", "3306");
		
		if(!$con){
			die("Sorry, you can't connect to the database.");
		}
		
		$sql = "INSERT INTO `user_tbl` (`userID`, `email`, `name`, `contactNumber`, `address`, `password`, `imagePath`) VALUES (NULL, '$email', '$name', '$contact', '$address', '$password', '$imagePath')";
		
		mysqli_query($con, $sql);
		
		echo "<script>
			alert('Success. login to your account');
			window.location.href = 'login.php';
			</script>";
		
	}

?>