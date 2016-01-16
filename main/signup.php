
<html>
    <head>
        <title>

        </title>
    </head>

    <body>

    <?php

      if (isset($_POST['submit'])){

            $username_entered=$_POST['username'];
            $password_entered=$_POST['password'];
             $password_entered_confirm=$_POST['cpassword'];
            $email_entered=$_POST['email'];
            $fname_entered=$_POST['fname'];
            $lname_entered=$_POST['lname'];
            $address_entered=$_POST['address'];
            $network_entered=$_POST['network'];
            $mobile_entered=$_POST['mobile'];
            $signup_date = date("Y-m-d");
            echo $signup_date;

            if($username_entered==null || $password_entered==null || $email_entered==null || $mobile_entered==null || $address_entered==null){
                header('Location:signup.php');

            }

            else if ($password_entered_confirm != $password_entered) {

                header('Location:signup.php');
            }

            $host='localhost';
            $database='freereload';
            $user='root';
            $pw='';
            $connection=mysqli_connect($host,$user,$pw,$database);
            //$query="INSERT INTO user where (username,password,email,first_name,last_name,address,mobile_no,network,signup_date,) VALUES ('$username_entered','$password_entered','$email_entered','$fname_entered','$lname_entered',' $address_entered','$mobile_entered','$network_entered','$signup_date')";
            $query="INSERT INTO `user`(`userid`, `username`, `password`, `email`, `first_name`, `last_name`, `address`, `mobile_no`, `network`, `signup_date`, `total_reload`) VALUES ('d','d','d','d','s','f','d','s','e','d','w')";

            $result=mysqli_query($connection,$query);

            if(! $result){
            	echo "database fault";
            }
            
            else{
            	echo "Successfully registered";
            }
           mysqli_close($connection);

        }
        

    ?>
   


    </body>

</html>