<?php 

require 'Classes/PHPExcel.php';
$excel = new PHPExcel();

$path = str_replace('\\', '/', __DIR__) . '/excel/';
if(!file_exists($path)) mkdir($path, 0777, true);


// 生成excel
// $objWriter = new PHPExcel_Writer_Excel2007($excel);
// $objWriter->save($path . "01.xlsx");

$objWriter = PHPExcel_IOFactory::createWriter($excel, "Excel2007");
$objWriter->save($path ."create_excel.xlsx");

$file = $path . 'create_excel.xlsx';

$objPHPexcel = PHPExcel_IOFactory::load($file);

$objWorksheet = $objPHPexcel->getActiveSheet(0);

$objWorksheet->getCell('A1')->setValue('John');
$objWorksheet->getCell('A2')->setValue('Smith');
$objWorksheet->getCell('A2')->getHyperlink()->setUrl('../Examples/images/paid.png');


$objDrawing = new PHPExcel_Worksheet_Drawing();
$objDrawing ->setName('Logo')
			->setDescription('Logo')
			->setPath('./Examples/images/officelogo.jpg')
			->setHeight(36)
			->setCoordinates('C1')
			->setWorksheet($objPHPexcel->getActiveSheet());

// $objDrawing->setDescription('Paid');
// $objDrawing->setPath('./Examples/images/paid.png');
// $objDrawing->setCoordinates('B15');
// $objDrawing->setOffsetX(110);
// $objDrawing->setRotation(25);
// $objDrawing->getShadow()->setVisible(true);
// $objDrawing->getShadow()->setDirection(45);


$objWriter = PHPExcel_IOFactory::createWriter($objPHPexcel, 'Excel5');
$objWriter->save($file);