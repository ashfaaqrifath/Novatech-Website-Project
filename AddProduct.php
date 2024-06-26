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

    <title>Add product - Novatech</title>
    
    <script src="https://kit.fontawesome.com/c37001a085.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./CSS/style.css">
    <link rel="stylesheet" href="./CSS/forms.css">
    <link rel="shortcut icon" href="img/mylogo3.png" type="image/x-icon">
</head>

<body style="background-image: url('img/login1.png');">

    <section id="product1" class="section-p1">

        <a href="admin.php#cart">
            <button type="button" class="normal" style="position: absolute; top: 20px; left: 20px;"><i class="fa-solid fa-arrow-left"></i>&nbsp&nbspBack</button>
        </a>

        <div class="wrapper">

            <div class="update-profile">
                <form action="AddProduct.php" method="post" enctype="multipart/form-data">
                    <h1><i class="fa-solid fa-shapes"></i>&nbsp;&nbsp;Add new product</h1>
                    <br>
                    <div class="flex">
                
                        <div class="inputBox">

                            <input type="text" name="txtTitle" placeholder="Product name *" class="box" required>
                            <input type="number" name="price" placeholder="Product price *" class="box" required>
                            <input type="number" name="stock" placeholder="Available stock *" class="box" required>
            
                        </div>

                        <div class="inputBox">

                            <input type="file" name="imageFile" placeholder="Upload an image" class="box" required>
                            <textarea name="txtDescription" placeholder="Product description" class="box" rows="3"></textarea>
            
                        </div>

                    </div>

                    <div class="publish-pro">
                        <label for="txtPublish">Publish to website: 
                            <input type="checkbox" name="txtPublish">
                        </label>
                    </div>

                    <button type="submit" name="btnSubmit" class="normal">Add product</button>
                </form>

                <?php
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
                        
                        $image = "uploads/" . basename($_FILES["imageFile"]["name"]);
                        move_uploaded_file($_FILES["imageFile"]["tmp_name"], $image);
                        
                        $con = mysqli_connect("localhost", "root", "", "novatech_database", "3306");
                    
                        if(!$con){
                            die("Sorry, you can't connect to the database.");
                        }
                        
                        $sql = "INSERT INTO `product_tbl` (`productID`, `productName`, `description`, `publish`, `price`, `stock`, `imagePath`, `email`) VALUES (NULL, '$productName', '$desc', '$status', '$price', '$stock', '$image', '" . $_SESSION["email"] . "')";
                        
                        if(mysqli_query($con, $sql)){
                            echo "<script>
                                alert('Product added successfully');
                                window.location.href = 'admin.php';
                                </script>";
                        }
                        else{
                            echo "<script>
                                alert('Something went wrong');
                                window.location.href = 'admin.php';
                                </script>";
                        }
                    }

                ?>
            </div>
        </div>

    </section>

</body>
</html>