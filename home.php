<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title>
    <?php 
        require_once "services.php";
        if(array_key_exists('submit', $_POST)) {
            if($_POST['submit']=="Add to cart"){
                checkLogin();
            }else{
                echo ("please login");
            }
        }    
        
    ?>

</head>

<body>
    <?php 
    require_once "navbar.php";
    $result = getProducts($conn);
    // var_dump($result);
    $products = [];
    while($row = mysqli_fetch_assoc($result)) {
        if(array_key_exists($row["category"], $products)){
            $products[$row["category"]][$row["id"]] = $row;
        } else {
            $products[$row["category"]] = [$row["id"] => $row];
        }
    }
    foreach($products as $category => $categoryProducts) { ?>
    <div class='col-lg-12'>
        <div class='text-center'>
            <h3 class='text-danger'><?php echo $category ?> </h3>
        </div>
    </div>
    <div>
    <div class="row">
        <?php
        foreach ($categoryProducts as $id => $product) {
            $name = $product["name"];
            $desc = $product["description"];
            $image = $product["image"];
            $price = $product['price'];
        ?>
        <div class="card mb-3 col-lg-3 pl-0 pr-0">
            <div class="card-header">
                <?php echo $name ?> - <b>The Cafe</b>
            </div>
            <div class="card-body">
                <img src="./<?php echo $image; ?> " width="100%">
                <p class="card-text mt-3"><?php echo $desc ?></p>
                <form action="home.php" method="POST">
                    <input type="submit" value="Add to cart" name="submit">
                </form>
                <b class="float-left"> Rs. <?php echo $price ?> </b>
            </div>
        </div>
        <?php } ?>
    </div>
    <?php } ?>
</body>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"
    integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous">
</script>

</html>