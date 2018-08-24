<?php
  session_start();

  if(!isset($_SESSION['user_ime'])) {
    header("Location: login.php");
    exit();
  } else {
    if($_SESSION['uloga'] !== 'profesor') {
      header("Location: login.php");
      exit();
    }
  }

  include_once '../main/db.php';

  $sql = "SELECT * FROM user WHERE uloga='student'";
  $result = mysqli_query($conn, $sql);

  $studenti = array();

  $index = 0;
  while($row = mysqli_fetch_assoc($result)){
     $studenti[$index] = $row;
     $index++;
}

  include("../chart/lib/inc/chartphp_dist.php");
    $p = new chartphp();

    $niz = array();
    $polozili = 0;
    $pali = 0;
    foreach($studenti as $s){
      $niz[] = array("ime"=>$s['ime'], "prezime"=>$s['prezime'],"bodovi"=>$s['bodovi']);

      if($s['bodovi'] > 51){
        $polozili++;
      } else {
        $pali++;
      }
    }
    if(sizeof($niz) == 3)
        $p->data = array(array(array($studenti[0]['ime']." ".$studenti[0]['prezime'],$studenti[0]['bodovi']),array($studenti[1]['ime']." ".$studenti[1]['prezime'],$studenti[1]['bodovi']),array($studenti[2]['ime']." ".$studenti[2]['prezime'],$studenti[2]['bodovi'])));
    if(sizeof($niz) == 4)
        $p->data = array(array(array($studenti[0]['ime']." ".$studenti[0]['prezime'],$studenti[0]['bodovi']),array($studenti[1]['ime']." ".$studenti[1]['prezime'],$studenti[1]['bodovi']),array($studenti[2]['ime']." ".$studenti[2]['prezime'],$studenti[2]['bodovi']),array($studenti[3]['ime']." ".$studenti[3]['prezime'],$studenti[3]['bodovi'])));
    if(sizeof($niz) == 5)
        $p->data = array(array(array($studenti[0]['ime']." ".$studenti[0]['prezime'],$studenti[0]['bodovi']),array($studenti[1]['ime']." ".$studenti[1]['prezime'],$studenti[1]['bodovi']),array($studenti[2]['ime']." ".$studenti[2]['prezime'],$studenti[2]['bodovi']),array($studenti[3]['ime']." ".$studenti[3]['prezime'],$studenti[3]['bodovi']),array($studenti[4]['ime']." ".$studenti[4]['prezime'],$studenti[4]['bodovi'])));
    if(sizeof($niz) == 6)
        $p->data = array(array(array($studenti[0]['ime']." ".$studenti[0]['prezime'],$studenti[0]['bodovi']),array($studenti[1]['ime']." ".$studenti[1]['prezime'],$studenti[1]['bodovi']),array($studenti[2]['ime']." ".$studenti[2]['prezime'],$studenti[2]['bodovi']),array($studenti[3]['ime']." ".$studenti[3]['prezime'],$studenti[3]['bodovi']),array($studenti[4]['ime']." ".$studenti[4]['prezime'],$studenti[4]['bodovi']),array($studenti[5]['ime']." ".$studenti[5]['prezime'],$studenti[5]['bodovi'])));


    $p->chart_type = "line";
    $p->theme = "light";

    $p->xlabel = "Studenti";
    $p->ylabel = "Bodovi";
    $p->color = "#27556C";
  

// render chart and get html/js output
    $out = $p->render('c1');
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
    <link rel="stylesheet" href="../chart/lib/js/chartphp.css">
    <script src="../chart/lib/js/jquery.min.js"></script>
    <script src="../chart/lib/js/chartphp.js"></script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<?php
 echo "<script type='text/javascript'>
 google.charts.load('current', {'packages':['corechart']});
 google.charts.setOnLoadCallback(drawChart);

 function drawChart() {
   var data = google.visualization.arrayToDataTable([
     ['Year', 'Sales', 'Expenses'],
     ['2004',  1000,      400],
     ['2005',  1170,      460],
     ['2006',  660,       1120],
     ['2007',  1030,      540]
   ]);

   var options = {
     title: 'Company Performance',
     curveType: 'function',
     legend: { position: 'bottom' }
   };

   var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

   chart.draw(data, options);
 }
</script>";

   
?>
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
              echo '<a style="cursor:pointer;"class="nav-link active">'.$_SESSION['user_ime']. '</a>';
            ?>

            </li>    
            <li class="nav-item">
            <form action="profesor.php" method="POST">
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
                <th scope="col">Predavanja</th>
              </tr>
            </thead>
            <tbody>
              <tr class="table-active">
                <th scope="row">Mehanizmi odbrane i napada na Webu</th>
              </tr>
            </tbody>
      </table>
      <hr class="custom-hr">

       <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">Studenti</th>
                <th scope="col">Bodovi</th>

              </tr>
            </thead>
            <tbody>
            <?php

            foreach($studenti as $student){
              echo  "<tr class='table-danger'>
                        <th>".$student['ime']." ".$student['prezime']."</th>
                        <th>".$student['bodovi']."</th>
                      </tr>";
            }
            ?>
            </tbody>
      </table>
      <hr class="custom-hr">

    </div>

    <div style="font-size:20px; overflow: none;background-color:white;" class="jumbotron col-md-8" >
        
        <div id='curve_chart'>
       
        </div>
        <div style="background-color:white;z-index:1000;color:white;">
          <p>e</p>
          <hr class="custom-hr">
        </div>
        <div class="row">
          <div id="piechart_3d" class=" col-md-6" style="background-color:white; height:400px;" ></div>
          <div id="piechart_3d2" class=" col-md-6" style="background-color:white;height:400px;" ></div>
        </div>

          <hr class="custom-hr">
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">Student</th>
                <th scope="col">Pitanja</th>
                <th scope="col">Odgovori</th>
                <th scope="col">Vrednost pitanja</th>
              </tr>
            </thead>
            <tbody>
            <?php
        $sql3 = "SELECT * from odgovori INNER JOIN user ON odgovori.id_studenta = user.id";
        $res = mysqli_query($conn, $sql3);

        $redovi = array();

          $index = 0;
          while($row = mysqli_fetch_assoc($res)){
            $redovi[$index] = $row;
            $index++;
        }
        $prvo = 0;
        $drugo = 0;
        $peto = 0;
        $cetvrto = 0;
        foreach($redovi as $r){ 
          if($r['prvo'] == 'Tacno'){
            $prvo++;
          }
          if($r['drugo'] == 'Tacno'){
            $drugo++;
          }
          if($r['cetvrto'] == 'Tacno'){
            $cetvrto++;
          }
          if($r['peto'] == 'Tacno'){
            $peto++;
          }

          

          echo "<tr class='table-light'>
                <th rowspan='5' style='text-align:center;padding-top:15%;'>".$r['ime']." ".$r['prezime']."</th>
                <td>1.Pitanje</td>
                <td>".$r['prvo']."</td>
                <td>10 bodova</td>
                </tr>
                <tr>
                <td>2.Pitanje</td>
                <td>".$r['drugo']."</td>
                <td>20 bodova</td>
                </tr>
                <tr>
                <td>3.Pitanje</td>
                <td>".$r['trece']." bodova </td>
                <td>30 bodova</td>
                </tr>
                <tr>
                <td>4.Pitanje</td>
                <td>".$r['cetvrto']."</td>
                <td>20 bodova</td>
                </tr>
                <tr>
                <td>5.Pitanje</td>
                <td>".$r['peto']."</td>
                <td>20 bodova</td>
                </tr>
              </tr>";
        }
    // //    echo "<script type='text/javascript'>
    //               google.charts.load('current', {packages:['corechart']});
    //               google.charts.setOnLoadCallback(drawChart1);
    //                 function drawChart1() {
    //                   var data1 = google.visualization.arrayToDataTable([
    //                     ['Test', 'Procenat polozenih'],
    //                     ['1.Pitanje',   ".$prvo."],
    //                     ['2.Pitanje',    ".$drugo."],
    //                     ['4.Pitanje',    ".$cetvrto."],
    //                     ['5.Pitanje',    ".$peto."],             
    //                   ]);
              
    //                   var options1 = {
    //                     title: 'Procenat tacnih odgovora po pitanju',
    //                     is3D: true
    //                   };
              
    //                   var chart1 = new google.visualization.PieChart(document.getElementById('piechart_3d2'));
    //                   chart1.draw(data1, options1);
    //                 }
    //       </script>";


    echo "<script type='text/javascript'>
      google.charts.load('current', {packages:['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Test', 'Procenat polozenih'],
          ['Polozili',   ".$polozili."],
          ['Pali',    ".$pali."]
        ]);
        

        var options = {
          title: 'Prolaznost na testu',
          is3D: true
        };
        var data1 = google.visualization.arrayToDataTable([
                              ['Test', 'Procenat polozenih'],
                              ['1.Pitanje',   ".$prvo."],
                              ['2.Pitanje',    ".$drugo."],
                              ['4.Pitanje',    ".$cetvrto."],
                              ['5.Pitanje',    ".$peto."],             
                            ]);
                    
                            var options1 = {
                              title: 'Procenat tacnih odgovora po pitanju',
                              is3D: true,
                              slices: {  2: {offset: 0.2},
                                        3: {offset: 0.3},
                                        4: {offset: 0.4},
                                        5: {offset: 0.5},
                              }
                            };
       

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        var chart2 = new google.visualization.PieChart(document.getElementById('piechart_3d2'));
        chart.draw(data, options);
        chart2.draw(data1, options1);
      }
    </script>";
       ?>
        </tbody>
      </table>
      <hr class="custom-hr">
        </div>
          
      
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