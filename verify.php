<?php
	require_once('config.php');
	$qrcode=$_POST['code'];
	if (explode(':',$qrcode)[0]=='AMDeposit' && strlen($_POST['pin'])==4) {
		$codes = unserialize(file_get_contents($path . '/AMDeposit.db'));
		$value = explode(':',$qrcode)[1];
		$code = explode(':',$qrcode)[2];
		$hash =  explode(':',$qrcode)[3];
		if (!in_array($code . ':' . $hash,$codes) && $code==base64_encode(hash('sha256',$value . strftime('%Y-%m',time()) . $_POST['pin'] . $hash . $secret,true))) {
			$codes[]=$code . ':' . $hash;
			file_put_contents($path . '/AMDeposit.db',serialize($codes));
			echo 'PAY: ' . $value;
		} else echo 'FAILURE';
	} else echo 'ERROR';
?>
