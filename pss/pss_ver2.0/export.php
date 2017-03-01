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

$startDate = $_POST["startDate"];
$endDate = $_POST["endDate"];

$sqlList = "SELECT r.*, a.accountNumber AS accountNumber, category.name "
        . "AS categoryName, costcode.code AS costCode, invoice.name as invoiceTo from request as r "
        . "LEFT JOIN account as a on ( r.accountNumber = a.id ) "
        . "LEFT JOIN category ON ( category.id = r.categoryName ) "
        . "LEFT JOIN costcode ON ( costcode.id = r.costCode ) " 
        . "LEFT JOIN invoice ON ( invoice.id = r.invoiceTo ) "
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
            ->setCellValue('K1', 'ProjectName')
            ->setCellValue('L1', 'WithInBudget')
            ->setCellValue('M1', 'Recoverable')
            ->setCellValue('N1', 'ChargeBackCustomerName')
            ->setCellValue('O1', 'ChargeBackCustomerCode')
            ->setCellValue('P1', 'ChargeBackPONumber')
            ->setCellValue('Q1', 'ChargeBackAmount')        
            ->setCellValue('R1', 'ChargeBackCurrency')       
            ->setCellValue('S1', 'CapexNumber')
            ->setCellValue('T1', 'CapexBudgetNumber')
            ->setCellValue('U1', 'Purpose')
            ->setCellValue('V1', 'DeliveryDate')
            ->setCellValue('W1', 'Requestor')
            ->setCellValue('X1', 'Item')
            ->setCellValue('Y1', 'Unit')
            ->setCellValue('Z1', 'ProjectCode')            
            ->setCellValue('AA1', 'UnitPrice')
            ->setCellValue('AB1', 'Quantity')            
            ->setCellValue('AC1', 'Subtotal')
            ->setCellValue('AD1', 'Currency')
            ->setCellValue('AE1', 'TotalWithoutVAT')
            ->setCellValue('AF1', 'VAT Rate')        
            ->setCellValue('AG1', 'VAT')
            ->setCellValue('AH1', 'TotalWithVAT');        
//
//
    $iSheetRow = 0;
    $iRow = 2; //start with row 2 in excel sheet
    while($rowList = $stmtList->fetch(PDO::FETCH_ASSOC)){
        $gridContents = $rowList['gridContents']; 
        if($gridContents != ""){
            $arrayGridContents = unserialize($gridContents); //convert serialized data to array            
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
                                    ->setCellValue('J'.$iRow, "'".$rowList['accountNumber'])
                                    ->setCellValue('K'.$iRow, $rowList['projectName'])
                                    ->setCellValue('L'.$iRow, $rowList['withinBudget'])
                                    ->setCellValue('M'.$iRow, $rowList['recoverable'])
                                    ->setCellValue('N'.$iRow, $rowList['chargeBackCustomerName'])
                                    ->setCellValue('O'.$iRow, $rowList['chargeBackCustomerCode'])                                
                                    ->setCellValue('P'.$iRow, $rowList['chargeBackPONumber'])       
                                    ->setCellValue('Q'.$iRow, $rowList['chargeBackAmount'])
                                    ->setCellValue('R'.$iRow, $rowList['chargeBackCurrency'])
                                    ->setCellValue('S'.$iRow, $rowList['capexNumber'])
                                    ->setCellValue('T'.$iRow, $rowList['capexBudgetNumber'])
                                    ->setCellValue('U'.$iRow, $rowList['purpose'])
                                    ->setCellValue('V'.$iRow, $rowList['deliveryDate'])
                                    ->setCellValue('W'.$iRow, $rowList['requestor'])       
                                    ->setCellValue('X'.$iRow, $gridRow["0"])
                                    ->setCellValue('Y'.$iRow, $gridRow["1"])
                                    ->setCellValue('Z'.$iRow, $gridRow["2"])
                                    ->setCellValue('AA'.$iRow, $gridRow["3"])
                                    ->setCellValue('AB'.$iRow, $gridRow["4"])
                                    ->setCellValue('AC'.$iRow, $gridRow["5"])
                                    ->setCellValue('AD'.$iRow, $rowList['currency'])
                                    ->setCellValue('AE'.$iRow, $rowList['totalWithoutTax'])
                                    ->setCellValue('AF'.$iRow, $rowList['taxRate'])
                                    ->setCellValue('AG'.$iRow, $rowList['tax'])
                                    ->setCellValue('AH'.$iRow, $rowList['total']);
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
//
//// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);
//
//
//// Redirect output to a client’s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="prReport.xlsx"');
header('Cache-Control: max-age=0');
//// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');
//
//// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0
//
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
?>

