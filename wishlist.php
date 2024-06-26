<?php session_start();

    $id = $_GET["id"];

    $con = mysqli_connect("localhost", "root", "", "novatech_database", "3306");

    if (!$con) {
        die("Sorry, you can't connect to the database.");
    }

    $sql = "SELECT * FROM `product_tbl` WHERE `productID`=$id";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);

    // Check if the query returned a result
    if ($row) {
        $productName = $row["productName"];
        $price = $row["price"];
        $stock = $row["stock"];
        $imagePath = $row["imagePath"];

        // Ensure the session email is set before using it
        if (isset($_SESSION["email"])) {
            $email = $_SESSION["email"];

            $sql = "INSERT INTO `wishlist_tbl` (`itemID`, `productName`, `price`, `stock`, `imagePath`, `email`) VALUES (NULL, '$productName', '$price', '$stock', '$imagePath', '$email')";

            if (mysqli_query($con, $sql)) {
                echo "<script>
                    alert('Product added to wishlist');
                    window.location.href = 'shop.php';
                    </script>";

            } else {
                echo "<script>
                    alert('Something went wrong');
                    window.location.href = 'shop.php';
                    </script>";
            }
        } 
        else {
            header('Location:login.php');
        }
    }


?>
