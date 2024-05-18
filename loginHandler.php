<?php
session_start();

	if(isset($_POST["btnSubmit"])){
		$email = $_POST["txtEmail"];
		$password = $_POST["txtPassword"];
		
		#localhost, root, pw, db name(that u created in phpMyadmin), port(check in wamp icon and mysql)
		$con = mysqli_connect("localhost", "root", "", "novatech_database", "3306");
			
		if(!$con){
			die("Sorry, you can't connect to the database.");
		}
		
		$sql = "SELECT * FROM `user_tbl` WHERE `email` = '$email' AND `password` = '$password'";
		
		$result = mysqli_query($con, $sql);
		
		if(mysqli_num_rows($result) > 0){
			
			$_SESSION["email"] = $email;
			header("Location:profile.html");
		}
		else{
			header("Location:login.html");
		}
	}

?>