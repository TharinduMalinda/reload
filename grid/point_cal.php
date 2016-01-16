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
</head>
<body>

hello
<?php
$var1=$_GET['x'];
$var2=$_GET['y'];
$main_y=null;
$main_x=null;
$mem_ship ="level 1";
echo ($log_time."<br>");

//normal function .. each time you click place of winning will change
if($mem_ship=="level 1"){
	$tx=time();
	if($package=="p1"){
		$arrayxy=fun_25($tx);
		$main_x = $arrayxy['x'];
		$main_y =$arrayxy['y'];
	}
	elseif ($package=="p2") {
		$arrayxy=fun_50($tx);
		$main_x = $arrayxy['x'];
		$main_y =$arrayxy['y'];
	}
	elseif ($package=="p3") {
		$arrayxy=fun_75($tx);
		$main_x = $arrayxy['x'];
		$main_y =$arrayxy['y'];
	}
	elseif ($package=="p4") {
		$arrayxy=fun_100($tx);
		$main_x = $arrayxy['x'];
		$main_y =$arrayxy['y'];
	}

	else{
		$main_x =abs(((($tx * 234)+5463)%29));
		$main_y =abs(((($ty * 157)+6574)%29));
		echo ($main_x."<br>");
	echo ($main_y."<br>");
	}

}

 // fix location .. you will get fix place of winning 
elseif ($mem_ship=="level 2") {
	$main_x=abs(((($log_time*120)+23)%29));
	$main_y=abs(((($log_time*121)+23)%29));
	echo ($main_x."<br>");
	echo ($main_y."<br>");
	
	 
}
function fun_25($t){
 	$main_x=abs(((($t*120)+23)%22));
	$main_y=abs(((($t*121)+23)%22));
	$array['x']=$main_x;
	$array['y']=$main_y;

	return $array;
 }
 function func_50($t){
 	$main_x=abs(((($t*120)+23)%15));
	$main_y=abs(((($t*121)+23)%15));
	$array['x']=$main_x;
	$array['y']=$main_y;

	return $array;
 }

 function fun_75($t){
 	$main_x=abs(((($t*120)+23)%8));
	$main_y=abs(((($t*121)+23)%8));
	$array['x']=$main_x;
	$array['y']=$main_y;

	return $array;
 }
 function fun_100($t){
 	$main_x=abs(((($t*120)+23)%2));
	$main_y=abs(((($t*121)+23)%2));
	$array['x']=$main_x;
	$array['y']=$main_y;

	return $array;
 }


?>
</body>
</html>
