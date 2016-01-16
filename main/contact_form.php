<!DOCTYPE HTML>
<html>
<head>
<title>contact form</title>
</head>
<body>
<?php

      if (isset($_POST['submit'])){

            $con_name=$_POST['name'];
            $con_email=$_POST['email'];
            $con_msg=$_POST['msg'];

            if($con_name==null || $con_email==null || $con_msg==null){
                header('Location:index.html');

            }

            $host='localhost';
            $database='freereload';
            $user='root';
            $pw='';
            $connection=mysqli_connect($host,$user,$pw,$database);
            //$query="INSERT INTO user where (username,password,email,first_name,last_name,address,mobile_no,network,signup_date,) VALUES ('$username_entered','$password_entered','$email_entered','$fname_entered','$lname_entered',' $address_entered','$mobile_entered','$network_entered','$signup_date')";
            $query="INSERT INTO `message`(`name`, `email`, `msg`) VALUES ('$con_name','con_email','con_msg')";
            $result=mysqli_query($connection,$query);

            if(! $result){
            	echo "database fault";
            	mysqli_close($connection);

            }
            
            else{
            	mysqli_close($connection);
            	echo "Successfully inserted";
            }
           
        }
        

    ?>
   

</body>
</html>