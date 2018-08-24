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
    <link rel="stylesheet" href="css/main.css">

    <title>E-Learning</title>
    
</head>

<body>
    <div class="navbar navbar-expand-lg fixed-top navbar-light bg-light">
      <div class="container">
        <a  href="index.php" class="navbar-brand ime"><img src="elear.png">  E-Learning  </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">      
          <ul class="nav navbar-nav ml-auto">
          <li class="nav-item">
              <a class="nav-link active" href="index.php" id="loginPage">Home</a>
            </li>
            <li class="nav-item">
              <?php if(isset($_SESSION['user_ime'])){
                echo "<a class='nav-link' href='views/".$_SESSION['uloga'].".php'>".$_SESSION['user_ime']."</a>";
              } else {
                echo " <a class='nav-link' href='views/login.php' id='loginPage'>Login</a>";
              } ?>
            </li>
            <li class="nav-item">
              <?php 
              if(!isset($_SESSION['user_ime'])){
               echo "<a class='nav-link' href='views/register.php'>Register</a>";
              }
              ?>
            </li>
          </ul>
        </div>        
      </div>     
    </div>



  <div style="margin-top:10%; margin-bottom:10%;" class="row">
    <div style="height:15%; margin-right:2%;"class="jumbotron col-md-3">
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
                <td><?php if(isset($_SESSION['user_bodovi'])) {
                                                        if($_SESSION['user_bodovi'] > 0) {
                                                          echo "<h5>".$_SESSION['user_bodovi'] ."</h5>";
                                                        } else {
                                                          echo "<a class='btn dugmic' href='views/student.php'>Radi test</a>";
                                                        }
                                                  } else {
                                                    echo "<a class='btn dugmic' href='views/student.php'>Radi test</a>";
                                                  }
                                                  ?> </td> 
              </tr>
            </tbody>
      </table>
      <hr class="custom-hr">
    </div>

    <div style="font-size:20px; overflow: auto;" class="jumbotron col-md-8">
    <h2 style="text-align:center;padding-top:0%;font-size:40px;">Mehanizmi odbrane i napada na Webu</h2>
    <hr class="custom-hr">
      <p>Danas je sve veći broj aplikacija dostupan preko otvorenih protokola Interneta. Ogroman broj organizacija raznih veličina svoje poslovne modele zasniva na elektronskom poslovanju. Na webu su hostovani kompletni sistemi poslovanja a i sve ostalo što je korisnicima potrebno u svakodnevnom poslovanju. Naši mobilni telefoni su skoro beskorisni bez Interneta, čak se i naši kućni uredjaji povezuju na Web i stvara se takozvana Mreža stvari, koja nam nudi mnoge pogodnosti ali i stvara nove rizike. </p>
      <p>U takvom vremenu, gde je sve dostupno preko Weba kako dobronamernim korisnicima tako i onima kojima je u interesu da nanesu štetu nekom sistemu, iz lične dobiti ili čak samo iz zabave, sigurnost se nameće kao imperativ. </p> 
      <p>Sigurnost u doba Interneta igra jednu od glavnih uloga, ako ne i glavnu, u projektovanju sistema.</p>
      
      <p>Aplikacioni sloj je najteži za odbranu. Ranjivosti koje se ovde susreću često se oslanjaju na kompleksne scenarije korisničkog ulaza(en.input), koji se teško mogu definisati sa potpisom za detekcije upada. Ovaj sloj je takodje najpristupačniji i najizloženiji spoljašnjem svetu. Da bi aplikacija funkcionisala u domenu Weba, mora biti dostupna preko porta 80 (Http) ili porta 443 (Https).</p>
      <p>U diagramu ispod,web aplikacija je potpuno izložena uprkos odbrambenim mehanizmima mreža kao što su Firewall-i i sistema za detekciju i prevenciju upada.</p>
      <img src="sec1.jpg" alt="">
      <br>
        <p>U 2014.godini SQL inekcije, kao vrsta napada, bile su odgovorne za 8.1% svih kradja podataka na Internetu. A to je tek treća najčešća vrsta napada. Napadači su često u stanju da manipulacijom korisničkog ulaza dobiju poverljive podatke, a da ih ne otkriju mrežni sistemi odbrane.</p>
      <p>Organizacija koja se bavi pisanjem standarda i edukacijom inžinjera o sigurnosti na Internetu, Open Web Application Security Project (OWASP), na svake tri godine objavljuje 10 najčešćih mehanizama napada na Internetu, te ćemo se u ovom predavanju baviti upravo trenutnom listom izdatom od strane ove institucije.
      </p>
<br>
       <h3> Nesigurna preusmeravanja (en.Unvalidated Redirects and Forwards)</h3>
       <h4 style="font-weight:bold;">Napad</h4>
       <p>Ova kategorija ranjivosti se koristi u takozvanim "phishing" napadima u kojima se "žrtva" preusmerava do zlonamerne lokacije. Uglavnom se dešava nakon neke akcije korisnika, tako što se u Http odgovoru koji klijent dobija postavi odgovarajući "header" za preusmerenje na neku lokaciju.</p>
      <h4>Odbrana</h4>
      <p>Najbolja odbrana je da se u projektovanju aplikacije izbegava bilo kakvo preusmerenje koje se zasniva na korisničkim parametrima.</p>
      <p>Ako u nekom slučaju ipak moramo koristiti preusmeravanje, ne treba koristiti korisnički ulaz za odredjivanje preusmerenja. Takodje, neophodno je napisati funkciju koja proverava URL gde se preusmerava korisnik, i koja takodje proverava da li je neophodno preusmeravanje uopšte.</p>

      <h3>Ranjive komponente (en.Components With Known Vulnerabilities)</h3>
       <h4>Napad</h4>
       <p>Ova kategorija ranjivosti se zasniva na korišćenju nepouzdanih komponenti razvijenih od treće strane(en.third-party components). Postoji veliki broj komponenti koje su otvorenog koda(en.open source) a koje su razvile nepouzdana lica. Neke od takvih komponenti su upravo razvijene od strane zlonamernih lica, dok su neke komponente ranjive jer su lošeg kvaliteta i imaju manjkavosti u kodu.</p>
      <h4>Odbrana</h4>
      <p>Najbolja metoda odbrane je da ne koristimo takve komponente.</p>
      <p>Sa obzirom da skoro svi aplikacioni programeri u nekom trenutku koriste komponente treće strane iz mnogih razloga i to će se teško promeniti. Onda je na nama odgovornost da ispitamo kod svake komponente koju koristimmo u projektima, i da ukoliko nadjemo ranjivost, sami ispravimo to u kodu(en.patch).</p>
     


      <h3>Falsifikovanje zahteva izmedju sajtova (en.Cross-Site Request Forgery)</h3>
       <h4>Napad</h4>
       <p>Ova ranjivost omogućuje napadaču da korisnika navede da nesvesno izvrši neku akciju. Najčešće mete ovog napada su aplikacije socijalnih medija, e-bankarstva i e-prodaje. 
       Primer. U trenutku kad ste ulogovani na svoj nalog e-bankarstva, posetite neki sajt koji sadrži kod za ovu vrstu napada, u trenutku posete tom sajtu kod se izvršava i formira se zahtev koji se prosledjuje aplikaciji e-bankarstva za prenos novca sa vašeg računa. </p>
      <h4>Odbrana</h4>
      <p>Aplikacija mora biti osigurana tokenom koji se veže za sesiju korisnika, te da se svaki zahtev bez tokena odbacuje.</p>
      <p>Aplikacija ne sme da prihvata zahteve sa eksternih servera.</p>
     
      <h3>Nepostojanje funkcije provere prava pristupa(en.Missing Function Level Access Control)</h3>
       <h4>Napad</h4>
       <p>Ukoliko nismo obezbedili odredjene resurse sa funkcijom koja proverava prava pristupa, moze doci do toga da zlonamerni korisnim dobije pristup tim resursima, ili da dobije potpun pristup sistemu sa admin privilegijama. Što očigledno predstavlja upad na sistem i može imati posledice od kojih se teško oporaviti. </p>
      <h4>Odbrana</h4>
      <p>Svakom resursu odrediti pravo pristupa. Proveravati svaki zahtev za resursom. </p>
     

     <h3>Izloženost osetljivih podataka(en.Sensitive Data Exposure)</h3>
       <h4>Napad</h4>
       <p>Mehanizam ovog napada se zasniva na nekriptovanju podataka u slučaju transporta ili smeštanja nekriptovanih osetljivih podataka u bazi. Jedan od poznatijih metoda korišćenja ove mane kod projektovanja sistema predstavlja MITM napad(Man in the middle). 
       Gde napadač presreće podatke na nivou transporta. Može biti pasivni, ako samo čita podatke ali i aktivni ako menja podatke koji se šalju.</p>
      <h4>Odbrana</h4>
      <p>Kriptovanje podataka koji se šalju i čuvaju.</p>
      <p>Korišćenje sigurnih kanala za transport. Korišćenje sertifikata(SSL). </p>

       <h3>Loše konfiguracije(en.Security Misconfiguration)</h3>
       <h4>Napad</h4>
       <p>Ukoliko server nije konfigurisan na odgovarajući i siguran način, to može dovesti do ranjivosti istog. Jedan od najčešćih napada usled loše konfiguracije servera je takozvani "Active directory" napad.
       U slučaju ovog napada, napadač ima pristup našem fajl sistemu na serveru i to preko URL-a. Može se kretati po fajl sistemu servera, pristupati svim resursima i veoma lako čak i oboriti server.
       </p>
      <h4>Odbrana</h4>
      <p>Konfiguracija servera po standardima za sigurnost.</p>

        <h3>Cross-site scripting</h3>
       <h4>Napad</h4>
       <p>Vrsta napada kojom napadac ubacuje JavaScript kod u stranice nekog sajta. Ubacen kod moze imati razne namene. Jedan od osnovnih primera takvog napada je na primer skripta koja ce kupiti korisnicki ulaz na datoj stranici i slati na neki eksterni server, kojem napadac ima prstup.</p>
      <h4>Odbrana</h4>
      <p>Najosnovni metod odbrane je koriscenje HtttpOnly atributa kod kolacica, jer su oni jedan od najcescih metoda ubrizgavanja JavaScript koda.</p>
      <p>Takodje validacija na klijentskoj strani svakog korisnickog ulaza.</p>

      <h3>SQL inekcije (en.SQL injections)</h3>
       <h4>Napad</h4>
       <p>Mehanizam napada gde napadac, na mestima koja su predvidjena za korisnicki unos na osnovu kojeg se kreira neki upit koji se izvrsava na serveru baze podataka, ubrizgava SQL kod. Metod je dosta jednostavan a steta moze biti ogromna, jer napadac moze se reci da ima pristup nasoj bazi podataka i moze izvrsavati sql komande.</p>

      <h4>Odbrana</h4>
      <p>Najosnovni metod odbrane je stroga validacija, ne sme se dozvoliti unos bilo kakvih specijalnih karaktera</p>
      <p>Takodje dobar metod odbrane je i koriscenje ORM tehnologije, koje imaju ugradjene mehanizme za izbegavanje inekcija</p>
      <p>U svakom slucaju nikad ne treba uzimati korisnicki unos i direktno ga koristiti u upitu.</p>
                                                  
      <h3>DDoS (en. Distributed Denial of Service)</h3>
      <h4>Napad</h4>
      <p>DDoS napad je zasnovan na DoS napadu. DoS napad predstavlja slanje ogromnog broja zahteva serveru za nekim resursom, cime se usporava server jer pokusava da obradi svaki zahtev, u ekstremnim slucajevima dolazi do kraha zbog prevelikog broja zahteva. DDoS predstavalja pojacanu verziju DoS-a, jer se serveru ne salju zahtevi samo sa jedne IP adrese, vec se pravi takozvana mreza botova, tako da se upucuju zahtevi sa velikog broja racunara sa razlicitim IP adresama, sto otezava odbranu. Jer u DoS-u smo mogli jednostavno da blokiramo zahteve sa odredjene IP adrese.</p>
        <img src="ddos.png" alt="">
        <h4>Odbrana</h4>
        <p>Blackholing - Metod odbrane gde se saobracaj koji se smatra "neprijateljskim" salje u takozvane crne rupe (en.blackhole), crne rupe mogu biti nepostojeci serveri</p>
        <p>IPS (Intrusion Prevention Systems) - Pisanje pravila po kojima ce IPS da prepozna lose zahteve i ne prosledi ih do naseg servera</p>
        <p>Koriscenje proxy-a.</p> 
     
     <br>
  <a class='btn btn-lg dugmic' href='views/student.php'>Radi test</a>
  </div>




  </div>



   
  </body>
</html>