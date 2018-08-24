<?php

session_start();

if (isset($_POST['login_submit'])){

    include_once 'db.php';

    $email = mysqli_real_escape_string($conn, $_POST['user_email']);
    $pwd = mysqli_real_escape_string($conn, $_POST['user_password']);

    if (empty($email) || empty($pwd)) {

        header("Location: ../index.php?login=error");
        exit();

    } else {

        $sql = "SELECT * FROM user WHERE email='$email'";
        $rezulat = mysqli_query($conn, $sql);
        $provera = mysqli_num_rows($rezulat);

        if ($provera < 1) {

            header("Location: ../index.php?login=error");
            exit();

        } else {

            if ($row = mysqli_fetch_assoc($rezulat)) {
                $hash_provera = password_verify($pwd, $row['password']);

                if($hash_provera == false) {

                    header("Location: ../index.php?login=error");
                    exit();

                } elseif ($hash_provera == true) {
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['user_ime'] = $row['ime'];
                    $_SESSION['user_prezime'] = $row['prezime'];
                    $_SESSION['user_email'] = $row['email'];
                    $_SESSION['user_bodovi'] = $row['bodovi'];
                    $_SESSION['uloga'] = $row['uloga'];

                    if($_SESSION['uloga'] == 'student') {
                        header("Location: ../views/student.php");
                        exit();
                    }
                    if($_SESSION['uloga'] == 'profesor') {
                        header("Location: ../views/profesor.php");
                        exit();
                    }
                    if($_SESSION['uloga'] == 'dekan') {
                        header("Location: ../views/dekan.php");
                        exit();
                    }
                    

                }   
            }
        }      
    }
    
} else {
    header("Location: ../index.php");
    exit();
}