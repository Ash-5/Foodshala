<?php
    require_once "middleware.php";
    checkLogin();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <title>Document</title>
    <?php require_once "services.php" ?>
    <style>
        /*This is modifying the btn-primary colors but you could create your own .btn-something class as well*/
        .btn-primary {
            color: #fff;
            background-color: #0495c9;
            border-color: #357ebd;
            /*set the color you want here*/
        }

        .btn-primary:hover,
        .btn-primary:focus,
        .btn-primary:active,
        .btn-primary.active,
        .open>.dropdown-toggle.btn-primary {
            color: #fff;
            background-color: #00b3db;
            border-color: #285e8e;
            /*set the color you want here*/
        }
        .btn-circle {
            border-radius: 100% !important;
        }
    </style>
</head>

<body>
    <?php include "navbar.php" ?>
    <div class="text-center">
        <h2> Our Menu </h2>
        <hr>
    </div>
    <?php
    $result = getRestaurantProduct($conn);
    $products = [];
    while($row = mysqli_fetch_assoc($result)) {
        if(array_key_exists($row["category"], $products)){
            $products[$row["category"]][$row["id"]] = $row;
        } else {
            $products[$row["category"]] = [$row["id"] => $row];
        }
    }
    foreach($products as $category => $categoryProducts) { ?>
    <div class="col-lg-12">
        <div class="text-center">
            <h3 class="text-danger"> <?php echo $category ?> </h3>
        </div>
    </div>
    <div class="container">
        <div class="row text-center">
            <?php
            foreach ($categoryProducts as $food => $product) {
                $name = $product["name"];
                $desc = $product["description"];
                $image = $product["image"];
                $price = $product['price'];
            ?>
            <div class="col-sm-3">
                <div class="card">
                    <img src="./<?php echo $image; ?>" class="card-img-top" height="200" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $name ?> </h5>
                        <p class="card-text"><?php echo $desc ?></p>
                        <p class="text-right font-weight-bold"><?php $price ?> </p>
                    </div>
                </div>
            </div>
            <?php }
        } ?>
        </div>
    </div>
    <div class="position-fixed" style="right: 20px; bottom:20px;">
        <a href="addproduct.php" class="btn btn-primary btn-circle" style="margin:auto;"><i class="fas fa-plus"></i></a>
    </div>
</body>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"
    integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous">
</script>

</html>