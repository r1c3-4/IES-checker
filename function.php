<?php
function curl($url, $var = null) {
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_TIMEOUT, 25);
    if ($var != null) {
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $var);
    }
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($curl);
    curl_close($curl);
    return $result;
}
function getMon($date, $type){
	$len = strlen($date);
	if ($type == 2){
		if ($len == 2){
			return $date;
		} else if ($len == 1){
			switch($date){
				case '1':  $date='01'; break;
				case '2':  $date='02'; break;
				case '3':  $date='03'; break;
				case '4':  $date='04'; break;
				case '5':  $date='05'; break;
				case '6':  $date='06'; break;
				case '7':  $date='07'; break;
				case '8':  $date='08'; break;
				case '9':  $date='09'; break;
			}
		}
		return $date;
	} else if ($type == 1){
		if ($len == 2){
			switch ($date){
				case '01':  $date='1'; break;
				case '02':  $date='2'; break;
				case '03':  $date='3'; break;
				case '04':  $date='4'; break;
				case '05':  $date='5'; break;
				case '06':  $date='6'; break;
				case '07':  $date='7'; break;
				case '08':  $date='8'; break;
				case '09':  $date='9'; break;
				case '10': $date='10'; break;
				case '11': $date='11'; break;
				case '12': $date='12'; break;
			}
			return $date;
		} else if ($len == 1) return $date;
	} else return false;
}

function getYear($date, $type){
	$len = strlen($date);
	if ($type == 4){
		if ($len == 4) return $date;
		else if ($len == 2) return "20".$date;
	} else if ($type == 2){
		if ($len == 2) return $date;
		else if ($len == 4) return substr($date,-2);
	} else return false;
}

function ambilAngkaBin($bin) {
	return substr($bin,0,6);
}
?>
