<?php
    include 'config.php';
    session_start();

    $admin_id = $_SESSION['admin_id'];

    if(!isset($admin_id)){
        header('location:login.php');
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
            <input type="number" name="price" class="box" placeholder="enter product price" required>
            <input type="file" accept="image/jpg, image/jpeg, image/png" class="box" required>
            <input type="submit" value="add product" name="add_product" class="btn">
        </form>
    </section>
    <!-- product CRUD section ends -->







<!-- custom admin js file link -->
    <script src="js/admin_script.js"></script>

</body>
</html>