<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://bootswatch.com/4/simplex/bootstrap.min.css">
    <link rel="stylesheet" href="../css/main.css">

    <title>E-Learning</title>
    
</head>
<body>
    <div class="navbar navbar-expand-lg fixed-top navbar-light bg-light">
      <div class="container">
        <a href="../" class="navbar-brand"><img src="../elear.png"> E-Learning Platform </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">      
          <ul class="nav navbar-nav ml-auto">
          <li class="nav-item">
              <a class="nav-link " href="../index.php" id="loginPage">Home</a>
          </li>
            <li class="nav-item">
              <a class="nav-link active" href="login.php" id="loginPage">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="register.php">Register</a>
            </li>
          </ul>
        </div>        
      </div>     
    </div>

    <div class="row" id="loginForm">
      <div class= "col-md-8">
        <div class="jumbotron">
          <legend id="logintext">Login Form</legend>

          <?php

              $url = explode("=",$_SERVER['REQUEST_URI']);

              if(isset($url[1])) {

                  if($url[1] == "error") {

                    echo "<div class='alert alert-dismissible alert-danger'>
                    <strong>Netacna sifra ili email!</strong>
                    </div>";
    
                  }
              }

          ?>

          <form action="../main/login.php" method="POST">
          
             <fieldset>
              
              <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="user_email">
                  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
              </div>
                  <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" name="user_password" placeholder="Password">
            </div>
            <div  style="text-align:center">
              <input type="submit" value="Login" name="login_submit" class="btn dugmic btn-lg">
            </div>
          </div>
        </div>
      </form>
    </div>
  </body>
</html>