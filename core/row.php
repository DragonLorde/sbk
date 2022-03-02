<?php 
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
header('Access-Control-Allow-Headers: X-Requested-With,Origin,Content-Type,Cookie,Accept');
header('Content-type: application/json'); 
require('core.php');


$res =  file_get_contents("php://input");
$arr = json_decode($res , true);


if(isset($arr['email']) && isset($arr['name']) && isset($arr['phone'])) {
	$email = $arr['email'];
	$name = $arr['name'];
	$phone = $arr['phone'];
	$text = $arr['text'];
	$res = $mysqli->query("SELECT `email`, `name`, `phone`, `text` FROM `users` WHERE `name` = '$name' Or `phone` = '$phone' AND `email` = '$email' ");
		if($res->num_rows > 0) {
			echo json_encode($a = array('code'=>102));
			//header('Location: http://med-mask-medfarmtorg/');
		} else {
			$res = $mysqli->query("INSERT INTO `users`(`email`, `name`, `phone`, `text`) VALUES ('$email' , '$name' , '$phone' , '$text')");
			mail("smilegoldsgames@gmail.com", "ЗАКАЗ", "Имя - $name , @Email - $email , Телефон - $phone , $text");
			echo json_encode($a = array('code'=>105));
			//header('Location: http://med-mask-medfarmtorg/');
			 	 }
	} else {
		echo $arr['email'];
		//header('Location: http://med-mask-medfarmtorg/');
		//echo json_encode($a = array('code'=>102));
	}
//102 такой пользователь уже есть
//105 успешная отправка		 



?>