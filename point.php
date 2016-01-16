<html>
<head>
    <title>Point</title>
</head>
<body>
<?php
 		$host='localhost';
        $database='freereload';
        $user='root';
        $password='';

$userid='20150001';
$pointrate=1;
	// calculate point rate;
    $connection=mysqli_connect($host,$user,$password,$database);
    $query_getpoint="SELECT points FROM points WHERE userid = '$userid'";
    $result=mysqli_query($connection,$query_getpoint);
    $currentpoints=0;
    while($row=mysqli_fetch_row($result)){
    	$currentpoints=$row[0];
    }
    $newpoints=$currentpoints+$pointrate;
    $date=date("Y/m/d");
    $query_updatepoints= "UPDATE points SET points='$newpoints', lastpointdate ='$date' WHERE userid='$userid'";
    mysqli_query($connection,$query_updatepoints);

</body>
</html>