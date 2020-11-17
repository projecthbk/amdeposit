<?php
	require_once('config.php');
	require_once('phpqrcode/qrlib.php');
	$id = bin2hex(openssl_random_pseudo_bytes(12));
	$code = hash('sha256',number_format($_POST['value'],2) . strftime('%Y-%m',strtotime($_POST['date'])) . $_POST['pin'] . $id . $secret);
	if (strlen($_POST['pin'])==4 && $_POST['value']>0 && $_POST['date']!='') {
		header('Content-Description: QR Code Image');
		header('Content-Type: image/png');
		header('Content-Disposition: attachment; filename="QRCode.png"');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		QRcode::png( 'AMDeposit:' . number_format($_POST['value'],2) . ':' . $code . ':' . $id);
	} else echo 'ERROR';
?>
