<?php
    require_once "middleware.php";
    checkLogin();
    require_once 'database.php';
    require_once 'services.php';

    $conn = connectDB();
    $restaurant = getRestaurant($conn);
    $restaurantId = $restaurant["id"];
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <p class="h3 text-center"><?php echo $restaurant["name"] ?> </p>
            <div class="offset-lg-2 col-lg-8 border mt-2 mb-2">
                <h2 class="text-center mb-2">Add Product</h2>
                <form action="services.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="Product_name">Product Name</label>
                        <input type="text" class="form-control" name="name" id="Product_name"
                            placeholder="Enter Product Name">
                    </div>
                    <div class="form-group">
                        <label for="Product_price">Price</label>
                        <input type="text" class="form-control" name="price" id="Product_price"
                            placeholder="Enter Price">
                    </div>
                    <div class="form-group">
                        <label for="product_description">Product Description</label>
                        <textarea class="form-control" id="product_description" name="description" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="type">Select Type</label>
                        <select name="type" class="form-control" id="type">
                            <option value="vegetarian">Veg</option>
                            <option value="non_vegetarian">Non-veg</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="category">Select Category</label>
                        <select name="category" class="form-control" id="type">
                            <option value="snacks">Snacks</option>
                            <option value="main_course">Main Course</option>
                            <option value="breadOrRice">Breads/Rice</option>
                            <option value="dessert">Dessert</option>
                        </select>
                    </div>
                    <fieldset class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-2 pt-0">Status</legend>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="productstatus" value="true"
                                        id="gridRadios1" value="option1" checked>
                                    <label class="form-check-label" for="gridRadios1">
                                        Active
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="productstatus" value="false"
                                        id="gridRadios2" value="option2">
                                    <label class="form-check-label" for="gridRadios2">
                                        Inactive
                                    </label>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <div class="form-group">
                        <label for="Image">Image</label>
                        <input type="file" class="form-control" name="image">
                    </div>
                    <input type="hidden" name="restid" value=<?php echo $restaurantId;?> >
                    <input class="form-group btn btn-primary" type="submit" name="submit" value="Add Product">
                </form>
            </div>
        </div>
    </div>
    <div>
    </div>
</body>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"
    integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous">
</script>

</html>