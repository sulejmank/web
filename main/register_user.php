<?php

if (isset($_POST['register_submit'])) {

    include_once 'db.php';

  //  $first_name = mysqli_real_escape_string($conn, $_POST['user_ime']);
   // $last_name = mysqli_real_escape_string($conn, $_POST['user_prezime']);
    //$email = mysqli_real_escape_string($conn, $_POST['user_email']);
    //$pwd = mysqli_real_escape_string($conn, $_POST['user_pass']);

    $first_name =  $_POST['user_ime'];
    $last_name = $_POST['user_prezime'];
    $email =  $_POST['user_email'];
    $pwd =  $_POST['user_pass'];

    if (empty($first_name) || empty($last_name)
          || empty($email) || empty($pwd)) {
            header("Location: ../views/register.php?signup=empty");
            exit();

          } else {

              if (!preg_match("/^[a-zA-Z]*$/", $first_name) || 
                  !preg_match("/^[a-zA-Z]*$/", $last_name)) {

                    header("Location: ../views/register.php?signup=invalid");
                    exit();

                  } else {

                        if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
                            
                            header("Location: ../views/register.php?signup=invalidemail");
                            exit();   

                        } else {

                            $sql = "SELECT * FROM student WHERE email='$email'";
                            $rezultat = mysqli_query($conn,$sql);
                            $provera = mysqli_num_rows($rezultat);

                            if($provera > 0){

                                header("Location: ../views/register.php?signup=emailtaken");
                                exit();  

                            } else {

                                $hash_pwd = password_hash($pwd, PASSWORD_DEFAULT);
                                $sql = "INSERT INTO user (ime, prezime, email, password) VALUES ('$first_name', '$last_name', '$email', '$hash_pwd');";
                                mysqli_query($conn,$sql);

                                header("Location: register.php?signup=success");
                                header("Location: login.php");
                                exit();  

                            }                       
                        }
                    }
                }
            }   else  {

                 header("Location: login.php");
                 exit();    
        }