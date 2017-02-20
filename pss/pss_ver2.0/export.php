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

//if($_SESSION["adminUser"]){
//    $sqlList = "SELECT r.prNumber AS prNumber, r.requestor AS Requestor, r.supplierName AS supplierName, "
//            . "r.currency AS Currency, r.total AS Total, r.prDate AS prDate, r.prStatus as prStatus, a.accountNumber AS accountNumber, category.name "
//            . "AS categoryName, costcode.code AS costCode, prStatus.statusName AS statusName from request as r "
//            . "INNER JOIN account as a on ( r.accountNumber = a.id ) "
//            . "INNER JOIN category ON ( category.id = r.categoryName ) "
//            . "INNER JOIN costcode ON ( costcode.id = r.costCode ) " 
//            . "INNER JOIN prStatus ON ( prStatus.id = r.prStatus )";
//}

$startDate = $_POST["startDate"];
$endDate = $_POST["endDate"];


//$sqlList = "SELECT r.prNumber AS prNumber, r.requestor AS Requestor, r.supplierName AS supplierName, r.shipTo AS shipTo, r.gridContents AS gridContents, "
//        . "r.currency AS Currency, r.total AS Total, r.prDate AS prDate, r.prStatus as prStatus, a.accountNumber AS accountNumber, category.name "
//        . "AS categoryName, costcode.code AS costCode, prstatus.statusName AS statusName from request as r "
//        . "LEFT JOIN account as a on ( r.accountNumber = a.id ) "
//        . "LEFT JOIN category ON ( category.id = r.categoryName ) "
//        . "LEFT JOIN costcode ON ( costcode.id = r.costCode ) " 
//        . "LEFT JOIN prstatus ON ( prstatus.id = r.prStatus ) "
//        . "WHERE `prDate` BETWEEN '$startDate' AND '$endDate'";

$sqlList = "SELECT r.*, a.accountNumber AS accountNumber, category.name "
        . "AS categoryName, costcode.code AS costCode, prstatus.statusName AS statusName from request as r "
        . "LEFT JOIN account as a on ( r.accountNumber = a.id ) "
        . "LEFT JOIN category ON ( category.id = r.categoryName ) "
        . "LEFT JOIN costcode ON ( costcode.id = r.costCode ) " 
        . "LEFT JOIN prstatus ON ( prstatus.id = r.prStatus ) "
        . "WHERE r.prDate BETWEEN '$startDate' AND '$endDate'";

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
            ->setCellValue('C1', 'SupplierContact')
            ->setCellValue('D1', 'SupplierPhone')
            ->setCellValue('E1', 'InvoiceTo')
            ->setCellValue('F1', 'ShipTo')
            ->setCellValue('G1', 'CreateDate')
            ->setCellValue('H1', 'Category')       
            ->setCellValue('I1', 'CostCode')
            ->setCellValue('J1', 'AccountName')
            ->setCellValue('K1', 'WithInBudget')
            ->setCellValue('L1', 'Recoverable')
            ->setCellValue('M1', 'ChargeBackCustomerName')
            ->setCellValue('N1', 'ChargeBackCustomerCode')
            ->setCellValue('O1', 'ChargeBackPONumber')
            ->setCellValue('P1', 'ChargeBackAmount')        
            ->setCellValue('Q1', 'ChargeBackCurrency')       
            ->setCellValue('R1', 'CapexNumber')
            ->setCellValue('S1', 'CapexBudgetNumber')
            ->setCellValue('T1', 'Purpose')
            ->setCellValue('U1', 'DeliveryDate')
            ->setCellValue('V1', 'Requestor')
            ->setCellValue('W1', 'Item')
            ->setCellValue('X1', 'Unit')
            ->setCellValue('AA1', 'ProjectCode')
            ->setCellValue('Z1', 'Quantity')
            ->setCellValue('Y1', 'UnitPrice')
            ->setCellValue('AB1', 'Subtotal')
            ->setCellValue('AC1', 'TotalWithoutTax')
            ->setCellValue('AD1', 'TaxRate')        
            ->setCellValue('AE1', 'Tax')
            ->setCellValue('AF1', 'Total');        
//
//
    $iSheetRow = 0;
    $iRow = 2;
    while($rowList = $stmtList->fetch(PDO::FETCH_ASSOC)){
        $gridContents = $rowList['gridContents'];                     
        if($gridContents != ""){   
            $arrayGridContents = unserialize($gridContents);            
            foreach($arrayGridContents as $gridRow){ //遍历表格内容数组 
                if(is_array($gridRow)){
                    if ($gridRow["0"] != ""){
                        $objPHPExcel->setActiveSheetIndex(0)
                                    ->setCellValue('A'.$iRow, $rowList['prNumber'])
                                    ->setCellValue('B'.$iRow, $rowList['supplierName'])
                                    ->setCellValue('C'.$iRow, $rowList['supplierContact'])
                                    ->setCellValue('D'.$iRow, $rowList['supplierPhone'])
                                    ->setCellValue('E'.$iRow, $rowList['invoiceTo'])
                                    ->setCellValue('F'.$iRow, $rowList['shipTo'])
                                    ->setCellValue('G'.$iRow, $rowList['prDate'])
                                    ->setCellValue('H'.$iRow, $rowList['categoryName']) 
                                    ->setCellValue('I'.$iRow, $rowList['costCode'])
                                    ->setCellValue('J'.$iRow, $rowList['accountNumber'])
                                    ->setCellValue('K'.$iRow, $rowList['withinBudget'])
                                    ->setCellValue('L'.$iRow, $rowList['recoverable'])
                                    ->setCellValue('M'.$iRow, $rowList['chargeBackCustomerName'])
                                    ->setCellValue('N'.$iRow, $rowList['chargeBackCustomerCode'])                                
                                    ->setCellValue('O'.$iRow, $rowList['chargeBackPONumber'])       
                                    ->setCellValue('P'.$iRow, $rowList['chargeBackAmount'])
                                    ->setCellValue('Q'.$iRow, $rowList['chargeBackCurrency'])
                                    ->setCellValue('R'.$iRow, $rowList['capexNumber'])
                                    ->setCellValue('S'.$iRow, $rowList['capexBudgetNumber'])
                                    ->setCellValue('T'.$iRow, $rowList['purpose'])
                                    ->setCellValue('U'.$iRow, $rowList['deliveryDate'])
                                    ->setCellValue('V'.$iRow, $rowList['requestor'])       
                                    ->setCellValue('W'.$iRow, $gridRow["0"])
                                    ->setCellValue('X'.$iRow, $gridRow["1"])
                                    ->setCellValue('Y'.$iRow, $gridRow["2"])
                                    ->setCellValue('Z'.$iRow, $gridRow["3"])
                                    ->setCellValue('AA'.$iRow, $gridRow["4"])
                                    ->setCellValue('AB'.$iRow, $gridRow["5"])
                                    ->setCellValue('AC'.$iRow, $rowList['totalWithoutTax'])
                                    ->setCellValue('AD'.$iRow, $rowList['taxRate'])
                                    ->setCellValue('AE'.$iRow, $rowList['tax'])
                                    ->setCellValue('AF'.$iRow, $rowList['total']);
                        $iRow = $iRow + 1;
                    }
                    
                }
            
            }
        } 
        $iSheetRow = $iSheetRow + $iRow; 
      }      


//// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('Report');
////
////
////// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);
////
////
////// Redirect output to a client’s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="prReport.xlsx"');
header('Cache-Control: max-age=0');
////// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');
////
////// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0
////
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
?>

