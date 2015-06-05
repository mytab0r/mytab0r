<?php session_start();

if(extension_loaded('sockets')) echo "WebSockets OK";
  else echo "WebSockets UNAVAILABLE";
  
if(isset($_POST['my_x']) and $_POST['my_x']  <= 7 and $_POST['my_x'] !=0) {
	if(isset($_POST['my_y']) and $_POST['my_y']  <= 7 and $_POST['my_y'] !=0) {
		$_SESSION['my_x'] = $_POST['my_x'];
		$_SESSION['my_y'] = $_POST['my_y'];
	}
}

if(isset($_GET['x'])){
	$next_x = $_GET['x'];
	$next_y = $_GET['y'];
}

function  my_pos($x, $y){
	if($_SESSION['my_x'] == $x and $_SESSION['my_y'] == $y ) {
		return 'mypos';
	}
}

function next_pos($x, $y, $next_x, $next_y) {
	if(!empty($next_x) and !empty($next_y)){
		if($next_x == $x and $next_y == $y){
			return 'nextpos';
		}
	}
}


function vertex($x, $y) {
	if($x != 7 and $y != 7) {
		return '<span class="vertex"></span> ';
	}
}





if (!empty($next_x) and !empty($next_y) and !empty($_SESSION['my_x']) and !empty($_SESSION['my_y'])){
	
 	if($next_x <= $_SESSION['my_x']){
		$data_X = $_SESSION['my_x'] - $next_x;}
	else{$data_X = $next_x - $_SESSION['my_x'];}
	
	 if($next_y <= $_SESSION['my_y']){
		$data_Y = $_SESSION['my_y'] - $next_x;}
	else{$data_Y = $next_y - $_SESSION['my_y'];}
	
	$data_next = $data_X + $data_Y;
	
}







$count = 0;
$x = 1;
$y = 1;
?>


<form action="" method="post" class="form">
<input name="my_x" type="text" placeholder="x" value="<?  echo $_SESSION['my_x'];  ?>"/>
<input name="my_y" type="text" placeholder="y" value="<?  echo $_SESSION['my_y'];  ?>" />
<input name=""  type="submit" value="set my pos" />
</form>


<div class="map"><?

while($count < 49) {
	
	echo '<a href="index.php?x='.$x.'&y='.$y.'" class="block '.my_pos($x, $y).' '.next_pos($x, $y, $next_x, $next_y).'">'.$x.' . '.$y.' '.vertex($x, $y).'</a>'."\r\n";
	
	if ($y == 7) {
		$y = 1;
		$x++;
		
	}
	else{
		$y++;
	}
	
	
	
	
	
	
	
	$count++;
	
}


if($data_X >= $data_Y){
	$ver = $data_X;}
else($ver = $data_Y);


echo '1: '.$ver."\r\n";
echo '2: '.$data_next;



?>
</div>

<style>

.form{
	width: 420px;
	margin: 10 auto;
}


.map{
	width: 588px;
	height: 588px;
	margin: 0 auto;
	border-top: 1px solid #000000;
	border-left: 1px solid #000000;
}

.block{
	display:block;
	width: 84px;
	height: 84px;
	border-bottom: 1px solid #000000;
	border-right: 1px solid #000000;
	float: left;
	text-align: center;
	box-sizing:border-box;
	position: relative;
}

.block:hover{
	background:#E8F34C;
}
	

.mypos{
	background: #4CC9CA;
}
.nextpos{
	background:#AF37CF;
}

.vertex{
	display:block;
	border: 2px #FF0015 solid;
	border-radius: 50px;
	width: 3px;
	height: 3px;
	position: absolute;
	z-index: 10;
	top: 80px;
	left: 80px;
	
}

</style>