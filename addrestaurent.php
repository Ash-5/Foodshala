<?php
    include "middleware.php";
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
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"
        integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous">
    </script>
    <title>Document</title>
</head>
<body>
    
<div class="container">
        <div class="row">
            <div class="offset-lg-2 col-lg-8 border mt-2 mb-2">
                <h2 class="text-center mb-2">Add Product</h2>
                <form action="services.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="Product_name">Restaurant Name</label>
                        <input type="text" class="form-control" name="name" id="Product_name"
                            placeholder="Enter Restaurant Name">
                    </div>
                    <div class="form-group">
                        <label for="Product_price">Email</label>
                        <input type="text" class="form-control" name="email" id="Product_price"
                            placeholder="Enter Email">
                    </div>
                    <div class="form-group">
                        <label for="product_description">BIO</label>
                        <textarea class="form-control" id="restaurant_description" name="bio" rows="3"></textarea>
                    </div>
                    <fieldset class="form-group">
                        <div class="row">
                            <legend class="col-form-label col-sm-2 pt-0">Status</legend>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="restaurentstatus" value="true" id="gridRadios1"
                                        value="option1" checked>
                                    <label class="form-check-label" for="gridRadios1">
                                        Active 
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="restaurentstatus" value="false" id="gridRadios2"
                                        value="option2">
                                    <label class="form-check-label" for="gridRadios2">
                                        Inactive
                                    </label>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <div class="form-label-group">
                        <input type="number" class="form-control"  name="mobile" placeholer="Mobile No." required>
                        <label for="mobileNumber">Mobile number</label>
                    </div>
                    <div class="form-group">
                        <label for="Image">Logo</label>
                        <input type="file" class="form-control" name="logo" >
                    </div>
                    <input type="hidden" name="restid" value="1">
                    <input class="form-group btn btn-primary" type="submit" name="submit" value="Add Restaurent">
                </form>
            </div>
        </div>
    </div>
    <div>
    </div>

</body>
</html>