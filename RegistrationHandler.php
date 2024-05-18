<?php

if(isset($_POST["btnRegister"])){
	
	$name = $_POST["txtName"];
	$email = $_POST["txtEmail"];
	$password = $_POST["txtPassword"];
	$contact = $_POST["txtContactNo"];
	
	#localhost, root, pw, db name(that u created in phpMyadmin), port(check in wamp icon and mysql)
	$con = mysqli_connect("localhost", "root", "", "novatech_database", "3306");
	
	if(!$con){
		die("Sorry, you can't connect to the database.");
	}
	
	$sql = "INSERT INTO `user_tbl` (`email`, `name`, `contactNumber`, `password`) VALUES ('$email', '$name', '$contact', '$password')";
	
	mysqli_query($con, $sql);
	
	header("Location:login.html");
	
}


?>