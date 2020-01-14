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
    <?php require_once "services.php"; ?>
</head>
<body>
    <!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-dark primary-color bg-dark">

<!-- Navbar brand -->
<a class="navbar-brand" href="#">Foodshala</a>
<!-- Collapse button -->
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
  aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="basicExampleNav">
<?php 
$result = navRoleNewUser($conn);
$result1 = navRoleOldUser($conn);
//var_dump($result1);
 //echo($result1["role"] == "Restaurent");
// die();


if($result === false){ 
   echo( '<ul class="navbar-nav mr-auto">
    <li class="nav-item active">
      <a class="nav-link" href="/home.php">Home
        <span class="sr-only">(current)</span>
      </a>
    </li>
    <li class="nav-item active">
      <a class="nav-link" href="/login.php">login
        <span class="sr-only">(current)</span>
      </a>
    </li>
    </ul>' );
}else{
    if($result1["role"] == "Admin"){
        echo'<ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="/foodshala/addrestaurant.php">Add restraunt
            <span class="sr-only">(current)</span>
          </a>
        </li>
        </ul>
        <ul class="ml-auto navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="#">'; echo $result1["name"].' </a>
        </li>
        <li class="nav-item">
        <form action="services.php" method="POST">
          <input type="submit" name="submit" value="Logout">
        </form>
        </li>
        </ul>';
    }elseif($result1["role"] == "Restaurent"){
        echo '<ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="./restaurant.php">Restaurant
            <span class="sr-only">(current)</span>
          </a>
        </li>
        </ul>
        <ul class="ml-auto navbar-nav">
        <li class = "nav-item ">
          <sup> Sined in as </sup>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">'; echo $result1["name"].' </a>
        </li> 
        <li class="nav-item ">
        <form action="services.php" method="POST">
          <input type="submit" name="submit" value="Logout">
        </form>
        </li>
      </ul>';

    }elseif($result1["role"] == "user"){
        echo('<ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href=",/home.php">Home
            <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <form action="services.php" method="POST">
            <input type="submit" name="submit" value="Logout">
          </form>
        </li>');
    }
}

?>
  
</nav>
<!--/.Navbar-->
</body>
</html>