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
    <div class="navbar navbar-expand-lg navbar-collapse fixed-top navbar-light bg-light">
      <div class="container">
        <a href="../" class="navbar-brand"><img src="../elear.png"> E-Learning Platform </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=" #navbarResponsive .navbar-collapse" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">      
          <ul class="nav navbar-nav ml-auto">
          <li class="nav-item">
              <a class="nav-link " href="../" id="loginPage">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="login.php" id="loginPage">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="#">Register</a>
            </li>
          </ul>
        </div>        
      </div>     
    </div>

    <div class="row" id="loginForm">
      <div class= "col-md-8">

        <div class="jumbotron">
           <legend id="logintext">Register Form</legend>

           <?php

             $url = explode('=', $_SERVER['REQUEST_URI']);
             
             if (isset($url[1])) {
             
                if ($url[1] == "empty") {

                    echo "<div class='alert alert-dismissible alert-warning'>
                    <strong>Molim vas ispunite sva polja!</strong>
                    </div>";

                }  elseif ($url[1] == "invalid") {

                        echo "<div class='alert alert-dismissible alert-danger'>
                        <strong>Molim vas, unesite ispravne vrednosti za ime i prezime!</strong>
                        </div>";

                    } else {

                        echo "<div class='alert alert-dismissible alert-success'>
                        <strong>Uspesno ste kreirali nalog!</strong>
                        </div>";

                     }

              }

          ?>

           <form action="../main/register_user.php" method="POST">
          
             <fieldset>
              
              <div class="form-group">
                  <label for="exampleInputEmail1"> First Name</label>
                  <input type="text" class="form-control" name="user_ime" pattern=".{3,}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter first name" required>
              </div>
              <div class="form-group">
                  <label for="Ime">Last Name</label>
                  <input type="text" class="form-control" name="user_prezime" pattern=".{3,}"  id="Ime" aria-describedby="emailHelp" placeholder="Enter last name" required>
              </div>
              <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" pattern=".{3,}"  name="user_email" aria-describedby="emailHelp" placeholder="Enter email" required>
                  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
              </div>
              <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" name="user_pass" pattern=".{3,}"  id="exampleInputPassword1" placeholder="Password" required>
              </div>
             
              <div  style="text-align:center">
                  <input type="submit" value="Register" name="register_submit" class="btn  btn-lg dugmic" >
              </div>
        </div>
      </div>
    </form>
  </div>

</body>
</html>