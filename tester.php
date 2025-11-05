<?php
	session_start();
	require_once("linkClass.php");
	/*$obj = new processes();
	$time = $obj->getDatetimeNow();
	//echo $time;
	$length = "5";
	$rand = $obj->random_string($length);	
	echo $rand."_".$time;*/

	
	function getDatetimeNow() {
			$tz_object = new DateTimeZone('Africa/Lagos');
			//date_default_timezone_set('Brazil/East');

			$datetime = new DateTime();
			$datetime->setTimezone($tz_object);
			return $datetime->format('d/m/Y');
			//return $this->datetime->format('G:i:s');
		}

		
		echo getDatetimeNow();
?>
