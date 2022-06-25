<?php
include ("../jpgraph.php");
include ("../jpgraph_bar.php");
include ("../jpgraph_line.php");

// ติดต่อ ฐานข้อมูล เลือกข้อมูลขึ้นมาเพื่อแสดงกราฟ
$objConnect = mysqli_connect("localhost","root","" , "project");
$strSQL = "SELECT * FROM customer";
$objQuery = mysqli_query($objConnect , $strSQL);

// เตรียมข้อมุลที่จะแสดง เพื่อสร้างกราฟ
$datay=array();
while($objResult = mysqli_fetch_array($objQuery))
{
$datay[] = $objResult["Budget"]; 
}

// Create the graph. 
$graph = new Graph(350,300);    

$graph->SetScale("textlin");

$graph->SetMarginColor('navy:1.9');
$graph->SetBox();

$graph->title->Set('Bar Pattern');
$graph->title->SetFont(FF_ARIAL,FS_BOLD,20);

$graph->SetTitleBackground('lightblue:1.3',TITLEBKG_STYLE2,TITLEBKG_FRAME_BEVEL);
$graph->SetTitleBackgroundFillStyle(TITLEBKG_FILLSTYLE_HSTRIPED,'lightblue','blue');

// Create a bar pot
$bplot = new BarPlot($datay);
$bplot->SetFillColor('darkorange');
$bplot->SetWidth(0.6);

$bplot->SetPattern(PATTERN_CROSS1,'navy');
$graph->Add($bplot);
$graph->Stroke();
?>