<?php session_start();

    //unpublish all products btn
	if(isset($_POST["unpublishBtn"])){
		$con = mysqli_connect("localhost", "root", "", "novatech_database", "3306");
                
        if(!$con){
            die("Sorry, you can't connect to the database.");
        }

        $sql = "UPDATE product_tbl SET publish = 0";

        if(mysqli_query($con, $sql)){
            echo "<script>
                alert('Unpublished all products');
                window.location.href = 'admin.php#cart';
                </script>";
        }
	}

    // publish all products again
	if(isset($_POST["publishBtn"])){
		$con = mysqli_connect("localhost", "root", "", "novatech_database", "3306");
                
        if(!$con){
            die("Sorry, you can't connect to the database.");
        }

        $sql = "UPDATE product_tbl SET publish = 1";

        if(mysqli_query($con, $sql)){
            echo "<script>
                alert('Published all products');
                window.location.href = 'admin.php#cart';
                </script>";
        }
	}

?>