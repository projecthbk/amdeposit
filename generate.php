<?php
	require_once('config.php');
	require_once('phpqrcode/qrlib.php');
	$hash = base64_encode(openssl_random_pseudo_bytes(12));
	$code = base64_encode(hash('sha256',number_format($_POST['value'],2) . strftime('%Y-%m',strtotime($_POST['date'])) . $_POST['pin'] . $hash . $secret,true));
	if (strlen($_POST['pin'])==4 && $_POST['value']>0 && strftime('%Y-%m',strtotime($_POST['date']))>=strftime('%Y-%m',time())) {
		header('Content-Description: AMDeposit QR Code Image');
		header('Content-Type: image/png');
		header('Content-Disposition: attachment; filename="AMDeposit.png"');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		QRcode::png( 'AMDeposit:' . number_format($_POST['value'],2) . ':' . $code . ':' . $hash);
	} else echo 'ERROR';
?>
