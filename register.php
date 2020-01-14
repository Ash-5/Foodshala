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
    <title>Document</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"
        integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous">
    </script>
</head>
<body>
<div class="container">
    <div class="row">
    <?php require_once "navbar.php" ?>
      <div class="col-lg-7 col-xl-9 mx-auto">
        <div class="card card-signin flex-row my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Register At Foodshala</h5>
            <form class="form-signin" action="services.php" method="POST">
              <div class="form-label-group">
                <input type="text" id="inputUserame" class="form-control" placeholder="Username" name="username" required autofocus>
                <label for="inputUserame">Username</label>
              </div>
              <hr>
              <div class="form-label-group">
                <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email" required>
                <label for="inputEmail">Email address</label>
              </div>
              
              <hr>

              <div class="form-label-group">
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
                <label for="inputPassword">Password</label>
              </div>
              <hr>
              <div class="form-label-group">
                <input type="password" id="inputConfirmPassword" class="form-control" placeholder="Re-Password" name="repassword" required>
                <label for="inputConfirmPassword">Confirm password</label>
              </div>
              <hr>
              <div class="form-group">
                <label for="category"></label>
                <select hidden name="role" class="form-control" id="type">
                  <option  value="user"> user</option>
                </select>
              </div>
              <hr>
              <div class="form-group">
                <label for="category">Select Category</label>
                  <select name="category" class="form-control" id="type">
                    <option value="veg">Vegeterian</option>
                    <option value="non-veg">Non-Vegeterian</option>
                  </select>
              </div>
              <hr>
              <div class="form-label-group">
                <input type="number" class="form-control"  name="number" placeholer="Mobile No." required>
                <label for="mobileNumber">Mobile number</label>
              </div>
              <hr>
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="submit" value="Add Yourself" >Register</button>
              <hr class="my-4">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>