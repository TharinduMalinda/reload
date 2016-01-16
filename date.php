<html>
    <head>
        <title>

        </title>
    </head>

    <body>

   
    <?php

        $host='localhost';
        $database='freereload';
        $user='root';
        $password='';

        
        $today = date("Y/m/d");

        $connection=mysqli_connect($host,$user,$password,$database);
        //$query="INSERT INTO points (lastpointdate) VALUES ('$today') WHERE userid='20150001'";
        //$query="UPDATE `points` SET `lastpointdate`='$today' WHERE userid='20150001'";
        $query="SELECT * from points WHERE userid='20150001'";
        $result=mysqli_query($connection,$query);
        $raw =mysqli_fetch_array($result);
        $lasdate=$raw['lastpointdate'];

        $dif =(strtotime($today)-strtotime($lasdate))/86400;

        $current_pointrate=$raw['pointrate'];
        $current_points=$raw['points'];
        
        // set new point rate
        if($dif>1){
            $new_point_rate = 0.5;
            $updated_points=$current_points+$new_point_rate;
        }
        
        elseif ($dif==1 and $current_pointrate < 1) {
            $new_point_rate=$current_pointrate+0.10;
            $updated_points=$current_points+$new_point_rate;
        }
        elseif($dif==0){
            $new_point_rate=$current_pointrate;
            $updated_points=$current_points;
        }


        // today earnings -> $new_point_rate
        if($dif!=0){
            if($updated_points>=20){
                echo"You can now convert your points in to reload. 1 point = Rs 1";
            }

            echo "You earned $new_point_rate points and you have total $updated_points points...";
             $connection=mysqli_connect($host,$user,$password,$database);
            //$query="INSERT INTO points (lastpointdate) VALUES ('$today') WHERE userid='20150001'";
            $query="UPDATE points SET lastpointdate='$today',pointrate ='$new_point_rate',points='$updated_points' WHERE userid='20150001'";
            $result=mysqli_query($connection,$query);

        }
        else{
            echo "You already collected your daily earnings. you have total $updated_points points... ";

            if($updated_points>=20){
                echo"You can now convert your points in to reload. 1 point = Rs 1";
            }
            
        }
       

       



    ?>
    </body>

</html>