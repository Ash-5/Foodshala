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
    <title>Document</title>
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
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center">
                    <h2> Our Menu </h2>
                    <hr>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="text-center">
                    <h3 class="text-danger"> Starters </h3>
                </div>
                <div class="container">
                    <div class="row text-center" class="d-flex flex-row">
                        <div class="card mr-5 mb-3" style="width: 21rem;">
                            <img src="https://i.ytimg.com/vi/HToinNNWISU/maxresdefault.jpg" class="card-img-top"
                                alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Honey Chilly Potato </h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the
                                    bulk of the card's content.</p>
                                <p class="text-right font-weight-bold">Rs. 100</p>
                            </div>
                        </div>
                        <div class="card mr-5 mb-3" style="width: 21rem;">
                            <img src="https://i.ytimg.com/vi/HToinNNWISU/maxresdefault.jpg" class="card-img-top"
                                alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Honey Chilly Potato </h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the
                                    bulk of the card's content.</p>
                                <p class="text-right font-weight-bold">Rs. 100</p>
                            </div>
                        </div>
                        <div class="card  mb-3" style="width: 21rem;">
                            <img src="https://i.ytimg.com/vi/HToinNNWISU/maxresdefault.jpg" class="card-img-top"
                                alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Honey Chilly Potato </h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the
                                    bulk of the card's content.</p>
                                <p class="text-right font-weight-bold">Rs. 100</p>
                            </div>
                        </div>
                        <div class="card mr-5 mb-3" style="width: 21rem;">
                            <img src="https://i.ytimg.com/vi/HToinNNWISU/maxresdefault.jpg" class="card-img-top"
                                alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Honey Chilly Potato </h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the
                                    bulk of the card's content.</p>
                                <p class="text-right font-weight-bold">Rs. 100</p>
                            </div>
                        </div>
                        <!-- <% data.forEach(function(camp){ %> -->
                        <!-- <div class="col-md-3 col-sm-6">
                             <div class="thumbnail">
                                    <div class="caption">
                                            <h4>Honey Chilly Potato</h4>
                                        </div>
                                 <div class="col-md-3">
                                    <img src= "<%= camp.image %>" >
                                 </div>
                                 
                                 <p>
                                     <!-- <a href="/campgrounds/<%= camp._id %>" class="btn btn-primary">More Information</a> -->
                        </p>
                    </div>
                </div>
                <!-- <% }); %> -->
            </div>
        </div>
        <div class="row">
            <div class="text-center">
                <a href="" class="btn btn-primary" style="margin:auto;">Add More</a>
            </div>
        </div>
    </div>
    </div>
    </div>
</body>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"
    integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous">
</script>

</html>