<?php
  session_start();

  if(!isset($_SESSION['user_ime'])) {
    header("Location: login.php");
    exit();
  }

  include_once '../main/db.php';

  $sql = "SELECT * FROM pitanja";
  $result = mysqli_query($conn, $sql);

  $pitanja = array();

  $index = 0;
  while($row = mysqli_fetch_assoc($result)){
     $pitanja[$index] = $row;
     $index++;
}
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
        <a href="../" class="navbar-brand"><img src="../elear.png">  E-Learning  </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=" #navbarResponsive .navbar-collapse" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">      
          <ul class="nav navbar-nav ml-auto">
          <li class="nav-item">
              <a class="nav-link" href="../index.php" id="loginPage">Home</a>
            </li>
          <li class="nav-item">

            <?php
             echo "<a class='nav-link' href='".$_SESSION['uloga'].".php'>".$_SESSION['user_ime']."</a>";
            ?>

            </li>    
            <li class="nav-item">
            <form action="" method="POST">
              <input  type="submit" class="nav-link " style="background-color:transparent;border:0px;" name="logout"   value="Logout" />
            </form>
           </li>     
          </ul>
        </div>        
      </div>     
    </div>

  

  <div style="margin-top:10%; margin-bottom:10%;" class="row">
    <div style="height:15%; margin-right:2%;"class="jumbotron col-md-3">
      <hr class="custom-hr">
      <div>
        <?php  if(isset($_SESSION['user_ime'])) {
                    echo "<h5 style='text-align:center;'><img src='../user.png'  width='32px' height='32px'>  ".$_SESSION['user_ime']. " " . $_SESSION['user_prezime']. "</h4>";    
        }?></div>
      <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">Predavanje</th>
                <th scope="col">Bodovi</th>
              </tr>
            </thead>
            <tbody>
              <tr class="table-active">
                <th scope="row">Mehanizmi odbrane i napada na Webu</th>
                <td><?php echo "<h3> " .$_SESSION['user_bodovi']. "</h3>" ?></td> 
              </tr>
            </tbody>
      </table>
      <hr class="custom-hr">
    </div>

    <div style="font-size:20px; overflow: none;" class="jumbotron col-md-8">
    <h2 style="text-align:center;padding-top:0%;font-size:40px;">Test</h2>
    <hr class="custom-hr">  
    <form action="../main/test_result.php" method="POST">
    <label for="">1. Pitanje</label>
    <?php

    echo "<p>".$pitanja[0]['pitanje']."</p>";
    ?>
    <label class="form-check-label">
          <input type="radio" class="form-check-input" name="1pitanje" id="optionsRadios1" value="option1" >
          <?php echo $pitanja[0]['A']; ?>
        </label><br>
      <label class="form-check-label">
          <input type="radio" class="form-check-input" name="1pitanje" id="optionsRadios2" value="option2" >
          <?php echo $pitanja[0]['B']; ?>
        </label><br>
        <label class="form-check-label">
          <input type="radio" class="form-check-input" name="1pitanje" id="optionsRadios3" value="option3" >
          <?php echo $pitanja[0]['C']; ?>
        </label><br>
        <label class="form-check-label">
          <input type="radio" class="form-check-input" name="1pitanje" id="optionsRadios4" value="option4" >
          <?php echo $pitanja[0]['D']; ?>
        </label>
        <br>
        <p style="text-align:right;"for="">10 bodova</p>
        <hr class="custom-hr">
        <label for="">2. Pitanje</label>
        <?php
          echo "<p>".$pitanja[1]['pitanje']."</p>";
        ?>    
      <label class="form-check-label">
          <input class="form-check-input" type="checkbox" name="2pitanje" value="A" >
        <?php echo $pitanja[1]['A'];?>
        </label><br>
        <label class="form-check-label">
          <input class="form-check-input" type="checkbox" name="2pitanje" value="B" >
          <?php echo $pitanja[1]['B'];?>
        </label><br>
        <label class="form-check-label">
          <input class="form-check-input" type="checkbox" name="2pitanje" value="C" >
          <?php echo $pitanja[1]['C'];?>
        </label><br>
        <label class="form-check-label">
          <input class="form-check-input" type="checkbox" name="2pitanje" value="D" >
          <?php echo $pitanja[1]['D'];?>
        </label><br>
        <br>
        <p style="text-align:right;"for="">20 bodova</p>

    <hr class="custom-hr">
        <label for="">3. Pitanje</label>
        <?php
          echo "<p>".$pitanja[2]['pitanje']."</p>";
        ?>    
        <textarea class="form-control" id="exampleTextarea" rows="5" name="3" required></textarea>
        <br>
                <p style="text-align:right;"for="">30 bodova</p>
    <hr class="custom-hr">

<label for="">4. Pitanje</label>
      <?php
          echo "<p>".$pitanja[3]['pitanje']."</p>";
        ?>          <select class="form-control" id="exampleSelect1" name="4pitanje" required>
        <option value="ne">Izaberi</option>
        <option value="tacan">SQL inekcija</option>
        <option  value="ne">DoS</option>
        <option  value="ne">Active Directory</option>
        <option  value="ne">Cros-site scripting</option>
      </select>
      <br>
                <p style="text-align:right;"for="">20 bodova</p>
                <hr class="custom-hr">

                <label for="">5. Pitanje</label>
                <?php
          echo "<p>".$pitanja[4]['pitanje']."</p>";
        ?>        <input type="text" name="peto">
      <br>
                <p style="text-align:right;"for="">20 bodova</p>
                <hr class="custom-hr">

        <?php 
          if($_SESSION['user_bodovi'] == 0){
            echo "<input type='submit' value='Zavrsi' name='test' class='btn  btn-lg dugmic' >";
          }
        
        ?>

    </form>
       
    </div>
</div>
     
                            <?php 
                                if(isset($_POST['logout'])) {
                                    session_destroy();
                                    header("Location: ../index.php");
                                    exit();
                                }

                        
                            ?>
        </div>
      </div>  
    </div>

</body>
</html>