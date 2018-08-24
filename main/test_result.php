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
             echo "<a class='nav-link' href='../views/".$_SESSION['uloga'].".php'>".$_SESSION['user_ime']."</a>";
            ?>

            </li>    
          
          </ul>
        </div>        
      </div>     
    </div>

    <div style="margin-top:10%;" class="container jumbotron">
<?php
    if(isset($_POST['test'])) {

      $bodovi  = 0;

      $status = array("Netacno", "Netacno",0, "Netacno", "Netacno");

      if($_POST['1pitanje'] == "option1"){
        $bodovi +=10;
        $status[0] = "Tacno";
      }
      if($_POST['2pitanje'] == "B"){
        $bodovi +=20;
        $status[1] = "Tacno";

      }
      $trece = random_int(0, 30);
      $bodovi = $bodovi + $trece;

      $status[2] = $trece;

      if($_POST['4pitanje'] == "tacan"){
        $bodovi +=20;
        $status[3] = "Tacno";

      }
      if($_POST['peto'] =="DoS" || $_POST['peto'] =="dos" || $_POST['peto'] =="DOS"){
        $bodovi +=20;
        $status[4] = "Tacno";
      }

      if($bodovi > 51){
        echo "<h2>Polozili ste test! Osvojili ste ".$bodovi." boda. </h2>";
      } else {
        echo "<h2>Niste polozili  test! Osvojili ste ".$bodovi." boda. </h2>";
      }
     
      
      include_once 'db.php';

      $_SESSION['user_bodovi'] = $bodovi;

      $sql = "UPDATE user SET bodovi =".$bodovi." WHERE ime='".$_SESSION['user_ime']."'";
      //echo $sql;
      $result = mysqli_query($conn, $sql);
     
      $sql2 = "INSERT into odgovori(prvo,drugo,trece,cetvrto,peto,id_studenta) VALUES ('".$status[0]."','". $status[1]."',
       ".$status[2].",'".$status[3]."','".$status[4]."',".$_SESSION['id'].")";

        mysqli_query($conn,$sql2);
      } 

?>

 <table class='table table-hover'>
                <thead>
                  <tr>
                      <th scope='col'>Pitanja</th>
                      <th scope='col'>Odgovori</th>
                  </tr>
                </thead>
                <tbody>
<?php
            for($i = 0; $i<5;$i++){

                echo  "<tr class='table-danger info'>
                        <th>".($i + 1).".</th>
                        <th>".$status[$i]."</th>
                       </tr>";
              }
?>
    </tbody>
  </table>
  <hr class="custom-hr">

<a class="btn btn-lg dugmic" href="../">Nazad na predavanje</a>
    </div>