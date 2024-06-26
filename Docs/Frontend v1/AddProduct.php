<?php
session_start();
	if(!isset($_SESSION["email"])){
		header("Location:login.php");
	}
?>


<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Add Product</title>
  <link rel="stylesheet" href="CSS/formStyle.css" type="text/css">
  <link rel="stylesheet" href="CSS/style.css" type="text/css">

</head>

<body>

          
    <div class="form-style-5">
        <form action="AddProduct.php" method="post" enctype="multipart/form-data">
          <fieldset>
            <legend><span class="number">1</span> Product Info</legend>
            <p>
              <input type="text" name="txtTitle" placeholder="Product Name *" required>
              <textarea name="txtDescription" placeholder="Describe about the product"></textarea>
              <input type="file" name="imageFile" placeholder="Upload a Picture" required>
              Category

              <select name="lstCategory">
                <option value="glass">Glass</option>
                <option value="metal">Metal</option>
                <option value="cardboard">Cardboard </option>
                <option value="paper">Paper</option>
                <option value="plastic">Plastic</option>
                <option value="other">Other</option>
              </select>
            </p>
          </fieldset>

          <fieldset>
            <legend><span class="number">2</span> Contact Details</legend>
            <input type="text" name="txtContactNumber" placeholder="Your Contact Number" >
            <label for="txtPublish">Publish the Advertisement : 
              <input type="checkbox" name="txtPublish" >
            </label>
          </fieldset>
              
          <input type="submit" value="Add Post" name="btnSubmit"/>
        </form>
		
		
        <?php
          if(isset($_POST["btnSubmit"])){
            $productName = $_POST["txtTitle"];
            $desc = $_POST["txtDescription"];
            $contactNumber = $_POST["txtContactNumber"];
            $category = $_POST["lstCategory"];
            
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
            
            $sql = "INSERT INTO `product_tbl` (`advertisementID`, `productName`, `description`, `publish`, `category`, `imagePath`, `contactNumber`, `email`) VALUES (NULL, '$productName', '$desc', '$status', '$category', '$image', '$contactNumber', '" . $_SESSION["email"] . "')";
            
            if(mysqli_query($con, $sql)){
              echo "Advertisment uploaded successfully";
            }
            else{
              echo "Something went wrong";
            }
          }

        ?>
		
		
		
    </div>



</body>
</html>























