<?php
    include 'config.php';
    session_start();

    $admin_id = $_SESSION['admin_id'];

    if(!isset($admin_id)){
        header('location:login.php');
    }
    if (isset($_POST['add_product'])) {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $price = $_POST['price'];
        $image = $_FILES['image']['name'];
        $image_size = $_FILES['image']['size'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_folder = 'uploaded_img/'.$image;

        $select_product_name = mysqli_query($conn, "SELECT name FROM `products` WHERE name = 'name'") 
        or die ('query failed');

        if (mysqli_num_rows($select_product_name) > 0) {
            $message[] = 'product name already added';
        }else{
            $add_product_query = mysqli_query($conn, "INSERT INTO `products` (name, price, image) VALUES('$name', '$price', '$image')") 
            or die('query failed');

            if($add_product_query){
                if($image_size > 2000000){
                    $message[] = 'image size is too large';
                }else{
                    move_uploaded_file($image_tmp_name, $image_folder);
                    $message[] = 'products added successfully';
                }
            }else{
                $message[] = 'products could not be added!';
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>products</title>

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <!-- custom admin css file link -->
    <link rel="stylesheet" href="css/admin_style.css">

</head>
<body>
    
    <?php
        include 'admin_header.php';
    ?>

    <!-- product CRUD section starts -->
    <section class="add-products">
        <h1 class="title">shop products</h1>

        <form action="" method="post" enctype="multipart/form-data">
            <h3>add product</h3>
            <input type="text" name="name" class="box" placeholder="enter product name" required>
            <input type="number" min="0" name="price" class="box" placeholder="enter product price" required>
            <input type="file" name="image" accept="image/jpg, image/jpeg, image/png" class="box" required>
            <input type="submit" value="add product" name="add_product" class="btn">
        </form>
    </section>
    <!-- product CRUD section ends -->







<!-- custom admin js file link -->
    <script src="js/admin_script.js"></script>

</body>
</html>