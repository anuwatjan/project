<html>

<head>
	<meta charset="utf-8">
	<title>แจ้งเตือนสินค้าหมดอายุ</title>
</head>

<body>
	<?php
	// กรณีต้องการตรวจสอบการแจ้ง error ให้เปิด 3 บรรทัดล่างนี้ให้ทำงาน กรณีไม่ ให้ comment ปิดไป
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	// กรณีมีการเชื่อมต่อกับฐานข้อมูล
	include "connect.php";

	//$accToken = "HFZc6mnW721qEtl8GUeEZ5zS0jWfaA6pyepJGQ9fTKJ";
	date_default_timezone_set("Asia/Bangkok");
	$Date = date('Y-m-d');
	$Time = date('H:i:s');

	$sql = "SELECT * FROM product";
	$rsuser = mysqli_query($connection, $sql);

	$sqltem = "SELECT * FROM po where po_product_end ='" . $Date . "' ";

	if ($rstem = mysqli_query($connection, $sqltem)) {
		while ($rowtem = mysqli_fetch_row($rstem)) {
			$productend = $rowtem[1];
			if ($productend <= 0) {
				if ($rsuser = mysqli_query($connection, $sql)) {
					while ($rouser = mysqli_fetch_row($rsuser)) {
						$accToken = $rouser[2];
						$notifyURL = "https://notify-api.line.me/api/notify";
						$headers = array(
							'Content-Type: application/x-www-form-urlencoded',
							'Authorization: Bearer ' . $accToken );
						$mesg = "  " . $productend . " สินค้าหมดอายุ";
						$data = array(
							'message' => "$mesg",
						);
						$ch = curl_init();
						curl_setopt($ch, CURLOPT_URL, $notifyURL);
						curl_setopt($ch, CURLOPT_POST, 1);
						curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
						curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
						curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
						curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
						curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
						$result = curl_exec($ch);
						curl_close($ch);
						var_dump($result);

						// การเช็คสถานะการทำงาน
						$result = json_decode($result, TRUE);
						if (!is_null($result) && array_key_exists('status', $result)) {
							echo $result['status'];

							if ($result['status'] == 200) {
								echo "Notify Send Success";
							}
						}
					}
				}
			} else {
			}
		}
	}
	mysqli_close($connection);
	?>
</body>

</html>
