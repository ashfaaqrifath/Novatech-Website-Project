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

    <title>Edit product - Novatech</title>
    
    <script src="https://kit.fontawesome.com/c37001a085.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./CSS/style.css">
    <link rel="stylesheet" href="./CSS/forms.css">
    <link rel="shortcut icon" href="img/mylogo3.png" type="image/x-icon">
</head>

<body style="background-image: url('img/login1.png');">

    <?php
        
        $id = $_GET["id"];
        
        $con = mysqli_connect("localhost", "root", "", "novatech_database", "3306");

        if (!$con) {
            die("Sorry, you can't connect into the database.");
        }
        
        $sql = "SELECT * FROM `product_tbl` WHERE `productID`=". $id;
        
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
        
    ?>



    <section id="product1" class="section-p1">

        <a href="admin.php#my-products">
            <button type="button" class="normal" style="position: absolute; top: 20px; left: 20px;"><i class="fa-solid fa-arrow-left"></i>&nbsp&nbspBack</button>
        </a>

        <div class="wrapper">

            <div class="update-profile">
                <form method="post" action="EditHandler.php?id=<?php echo $id; ?>" enctype="multipart/form-data">
                    <h1>Edit product</h1>
                    <!-- <h1><i class="fa-solid fa-pen-to-square"></i>&nbsp;&nbsp;Edit product</h1> -->
                    <img src="<?php echo $row["imagePath"]; ?>" width = 20%>
                    <br>
                    <div class="flex">
                
                        <div class="inputBox">

                            <input type="text" name="txtTitle" placeholder="Product name *" value="<?php echo $row["productName"]; ?>" class="box" required>
                            <input type="number" name="price" placeholder="Product price *" value="<?php echo $row["price"]; ?>" class="box" required>
                            <input type="number" name="stock" placeholder="Available stock *" value="<?php echo $row["stock"]; ?>" class="box" required>
            
                        </div>

                        <div class="inputBox">

                            <input type="file" name="imageFile" placeholder="Upload an image" value="<?php echo $row["imagePath"];?>" class="box" required>
                            <?php $_SESSION["imagePath"] = $row["imagePath"]; ?>
                            <textarea name="txtDescription" placeholder="Product description" class="box" rows="3"><?php echo $row["description"];?></textarea>
            
                        </div>

                    </div>

                    <div class="publish-pro">
                        <label for="txtPublish">Publish to website: 
                            <input type="checkbox" name="txtPublish" <?php if($row["publish"] ==1){echo "checked";} ?>>
                        </label>
                    </div>

                    <button type="submit" name="btnSubmit" class="normal">Save changes</button>
                </form>

            </div>
        </div>

    </section>

</body>
</html>