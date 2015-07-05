<?php
require './lib/PHPExcel.php';
$excel = new PHPExcel();

for($j=0;$j<10;$j++){
	for($i=0;$i<10;$i++){
		$d[$i] = 'nanme_data_'.$i;
	}
	$data[] = $d;
}

// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Set document properties
$objPHPExcel->getProperties()
			->setCreator("Maarten Balliauw")
			->setLastModifiedBy("Maarten Balliauw")
			->setTitle("Office 2007 XLSX Test Document")
			->setSubject("Office 2007 XLSX Test Document")
			->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
			->setKeywords("office 2007 openxml php")
			->setCategory("Test result file");


// Add some data
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', (string)'111111111111111111111111111111')
            ->setCellValue('B2', 'world!')
            ->setCellValue('C1', 'Hello')
            ->setCellValue('D2', 'world!');

// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('Simples');

// Set active sheet index to the first sheet, 
// so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);

// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="01simple.xls"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');

// echo ini_get('memory_limit');
// ini_set('memory_limit', '1280M');
// echo ini_get('memory_limit');
// print_r($data);