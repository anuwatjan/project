<?php
include "src/BarcodeGenerator.php";
include "src/BarcodeGeneratorHTML.php";
function barcode($code){
	$generator = new Picqer\Barcode\BarcodeGeneratorHTML();
	$border = 2;//กำหนดความหน้าของเส้น Barcode
	$height = 40;//กำหนดความสูงของ Barcode
	return $generator->getBarcode($code , $generator::TYPE_CODE_128,$border,$height);
}
?>