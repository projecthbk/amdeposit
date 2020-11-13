<?php
	require_once('config.php');
	$qrcode=$_POST['code'];
	if (explode(':',$qrcode)[0]=='AMDeposit' && strlen($_POST['pin'])==4) {
		$codes = unserialize(file_get_contents($path . '/AMDused.txt'));
		$value = explode(':',$qrcode)[1];
		$code = explode(':',$qrcode)[2]; 
		if (!in_array($code,$codes) && $code==md5($value . strftime('%Y-%m',time()) . $_POST['pin'] . $secret)) {
			$codes[]=$code;
			file_put_contents($path . '/AMDused.txt',serialize($codes));
			echo 'PAY: ' . $value;
		} else echo 'FAILURE';
	} else echo 'ERROR';
?>
