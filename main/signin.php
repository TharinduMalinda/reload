<?php
    error_reporting(E_ALL ^ E_NOTICE);
    session_start();

    $username_db=$_SESSION['username'];
    $userid_db=$_SESSION['userid'];
    $email_db=$_SESSION['email'];
    $log_time=$_SESSION['log_time'];
?>

<html>
    <head>
        <title>

        </title>
    </head>

    <body>

    <?php

       if (isset($_POST['submit'])){

            $email_entered=$_POST['email'];
            $password_entered=$_POST['password'];


           
            $password_db=null;
            $username_db=null;
            $email_db=null;
            $userid_db=null;
            $log_time=time();

            $host='localhost';
            $database='freereload';
            $user='root';
            $pw='';
            $connection=mysqli_connect($host,$user,$pw,$database);
            $query="SELECT * FROM user where email = '$email_entered' ";
            if($email_entered==null || $password_entered==null){
                mysqli_close($connection);
                header('Location:signin.html');

            }

            $result=mysqli_query($connection,$query);

            if(! $result){
                echo "database fault";
            }
            
            else{
                echo nl2br("connect to the databse \n");
                $raw =mysqli_fetch_array($result);
                $password_db=$raw['password'];
                $username_db=$raw['username'];
                $email_db=$raw['email'];
                $userid_db=$raw['userid'];

                echo $email_entered;
                echo $password_entered;
                echo $email_db;
                echo $password_db;



                if ($password_entered==$password_db) {

                    echo nl2br("username and password matched \n");
                    $_SESSION['username']=$username_db;
                    $_SESSION['userid']=$userid_db;
                    $_SESSION['email']=$email_db;
                    $_SESSION['log_time']=$log_time;

                    header('Location:home.php');

                }

                else{
                    echo nl2br("wrong uername or password \n");
                    echo nl2br("check your uername and password again..\n");
            
                }
            }
           mysqli_close($connection);

        }
        

    ?>
   
   


    </body>

</html>