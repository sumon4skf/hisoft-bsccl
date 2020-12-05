<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use PHPExcel;
use PHPExcel_IOFactory;
use PHPExcel_Cell;
use PHPExcel_Shared_Date;

class ExcelHandlerComponent extends Component
{
    var $controller;

//    function startup(Controller $controller)
//    {
//        $this->controller = $controller;
//
//    }

   function read_excel( $excelFilePath, $activesheet = 0 )
    {

        //Here we set the include path and load the librarires
//        require_once(WWW_ROOT. 'libraries' . DS . 'excel' .  DS . 'PHPExcel.php');
//        require_once(WWW_ROOT. 'libraries' . DS . 'excel' .  DS . 'PHPExcel' . DS. 'IOFactory.php');


       require_once(ROOT. DS .'vendor'.DS.'PHPExcel/PHPExcel.php');
       require_once(ROOT . DS . 'vendor' . DS.'PHPExcel/PHPExcel/IOFactory.php');


        //Check file extention 2003 or 2007
        $fileExtention = strtolower(substr(strrchr($excelFilePath, '.'), 1));
        if($fileExtention == "xlsx"){
            $objReader = PHPExcel_IOFactory::createReader('Excel2007');
        }
        else{
            $objReader = PHPExcel_IOFactory::createReader('Excel5');
        }

        $objReader->setReadDataOnly(true);

//       $excelDateValue = 40482.0;
//       $dateObj = PHPExcel_Shared_Date::ExcelToPHPObject($excelDateValue);
//
//       echo $dateObj->format('Y-m-d'); die;


        $objPHPExcel = $objReader->load($excelFilePath);
        $objPHPExcel->setActiveSheetIndex($activesheet); //we are selecting a worksheet;
        $objWorksheet = $objPHPExcel->getActiveSheet();


        $highestRow = $objWorksheet->getHighestRow();
        $highestColumn = $objWorksheet->getHighestColumn();

        $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);

        $dataArray = Array();

        for ($row = 1; $row <= $highestRow; ++$row) {
            $first_field = $objWorksheet->getCellByColumnAndRow(0, $row)->getCalculatedValue();
            if(!empty($first_field)) {

                for ($col = 0; $col < $highestColumnIndex; ++$col) {
                    $dataArray[$row][$col] = $objWorksheet->getCellByColumnAndRow($col, $row)->getCalculatedValue();
                }
            }
        }

        return $dataArray;
    }

    function write_excel($excelDataArray, $excelFilePath, $activesheet = 0)
    {
        //Here we set the include path and load the librarires
        require_once(ROOT. DS .'vendor'.DS.'PHPExcel/PHPExcel.php');
        require_once(ROOT . DS . 'vendor' . DS.'PHPExcel/PHPExcel/IOFactory.php');

        $objWriter = new PHPExcel();
        $objWriter->setActiveSheetIndex($activesheet);

        for ($i = 1; $i <= count($excelDataArray); $i++) {
            for ($j = 0; $j < count($excelDataArray[$i]); $j++) {
                $objWriter->getActiveSheet()->setCellValueByColumnAndRow($j, $i, $excelDataArray[$i][$j]);
            }
        }

        //Check file extention 2003 or 2007
        $fileExtention = strtolower(substr(strrchr($excelFilePath, '.'), 1));
        if ($fileExtention == "xlsx") {
            $excelWriter = PHPExcel_IOFactory::createWriter($objWriter, 'Excel2007');
        }
        else {
            $excelWriter = PHPExcel_IOFactory::createWriter($objWriter, 'Excel5');
        }

        $excelWriter->save($excelFilePath);

        return true;
    }


}

