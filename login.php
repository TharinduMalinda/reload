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

        <form action='login.php' method='POST'>
        <label>username</label>
        <input type='text' name='username'><br>
        <label>password</label>
        <input type='password' name='password'><br>
        <input type="submit" name="submit" value="submit">

    </form>


    <?php

       if (isset($_POST['submit'])){

            $username_entered=$_POST['username'];
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
            $query="SELECT * FROM user where username = '$username_entered' ";
            if($username_entered==null || $password_entered==null){
                mysqli_close($connection);
                header('Location:login.php');

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