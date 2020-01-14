<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <?php require_once "services.php"; ?>
</head>

<body>
    <div class="container">
        <div class="row float-center">
            <div class="col-lg-12">
                <?php 
                $result = getAllRestaurant($conn);
                $restaurants = [];
                while($row = mysqli_fetch_assoc($result)) {
                    array_push($restaurants, $row);
                }
                var_dump($restaurants);
                foreach($restaurants as $index => $restaurant) { 
                ?>
                <div class='col-lg-12'>
                    <?php
                    $name = $restaurant["name"];
                    $desc = $restaurant["bio"];
                    $image = $restaurant["logo"];
                    ?>
                    <div class="card mb-3 col-lg-12 pl-0 pr-0">
                        <div class="card-header">
                            <?php echo $name ?>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-2">
                                <img src="./<?php echo $image ?> " height="300" width="200">
                            </div>
                            <div class="col-lg-10">
                                <p class="card-text"><?php echo $desc ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    }
                ?>
            </div>
            <a class="btn btn-primary" href="addrestaurant.php" role="button"> Add a restaurant
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