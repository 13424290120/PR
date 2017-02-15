<?php
/** Include PHPExcel */
require_once dirname(__FILE__) . '/db.php';
require_once dirname(__FILE__) . '/PHPExcel/PHPExcel.php';

if(isset($_SESSION["username"]) && $_SESSION["username"]){
    $requestor=$_SESSION["username"];
}else{
    echo '<div class="error"> Sorry, please login first!<br><a href="index.php">Go Back</a></div>';  
    return false;    
}      

if($_SESSION["adminUser"]){
    $sqlList = "SELECT r.prNumber AS prNumber, r.requestor AS Requestor, r.supplierName AS supplierName, "
            . "r.currency AS Currency, r.total AS Total, r.prDate AS prDate, r.prStatus as prStatus, a.accountNumber AS accountNumber, category.name "
            . "AS categoryName, costcode.code AS costCode, prStatus.statusName AS statusName from request as r "
            . "INNER JOIN account as a on ( r.accountNumber = a.id ) "
            . "INNER JOIN category ON ( category.id = r.categoryName ) "
            . "INNER JOIN costcode ON ( costcode.id = r.costCode ) " 
            . "INNER JOIN prStatus ON ( prStatus.id = r.prStatus )";
}

$stmtList = $db->prepare($sqlList);
$stmtList->execute();


// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Set document properties
$objPHPExcel->getProperties()->setCreator("Jackson Li")
							 ->setLastModifiedBy("Jackson Li")
							 ->setTitle("PR Export Report")
							 ->setSubject("PR Export Report")
							 ->setDescription("PR Export Report.")
							 ->setKeywords("office 2007 openxml php")
							 ->setCategory("PR Export Report");


// Add some data
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'prNumber')
            ->setCellValue('B1', 'SupplierName')
            ->setCellValue('C1', 'RequestDate')
            ->setCellValue('D1', 'CategaryName')
            ->setCellValue('E1', 'CostCode')
            ->setCellValue('F1', 'AccountNumber')
            ->setCellValue('G1', 'Requester')
            ->setCellValue('H1', 'Currency')       
            ->setCellValue('I1', 'Total');


      $iRow = 2;
      
      while($rowList = $stmtList->fetch(PDO::FETCH_ASSOC)){
            $objPHPExcel->setActiveSheetIndex(0)
                        ->setCellValue('A'.$iRow, $rowList['prNumber'])
                        ->setCellValue('B'.$iRow, $rowList['supplierName'])
                        ->setCellValue('C'.$iRow, $rowList['prDate'])
                        ->setCellValue('D'.$iRow, $rowList['categoryName'])
                        ->setCellValue('E'.$iRow, $rowList['costCode'])
                        ->setCellValue('F'.$iRow, $rowList['accountNumber'])
                        ->setCellValue('G'.$iRow, $rowList['Requestor'])
                        ->setCellValue('H'.$iRow, $rowList['Currency'])       
                        ->setCellValue('I'.$iRow, $rowList['Total']);
            $iRow = $iRow + 1;
                        
      }           


// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('Report');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Redirect output to a client’s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="prReport.xlsx"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
?>

