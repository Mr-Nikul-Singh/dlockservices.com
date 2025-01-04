<?php
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
require_once APPPATH.'third_party/excel_sheet/vendor/autoload.php';

class Excel{

    public function download($stack = null){

        if(empty($stack['columns'])):

            die("No columns found.");

        elseif(empty($stack['rows'])):

            die("No rows found.");

        elseif(empty($stack['download'])): 

            die("set download option");

        endif;
 
        if(!empty($stack['columns'][0]['Field'])){
            $column_names = array_column($stack['columns'], 'Field');
        }else{
            $column_names = $stack['columns'];
        }
        // pre($column_names);

        // Create a new Spreadsheet object
        $spreadsheet = new Spreadsheet();
        
        // Set the column names
        foreach ($column_names as $key => $value) {
            $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow($key + 1, 1, $value);
        }
        
        // Set the data
        $i = 0;
        $p = 1;
        foreach ($stack['rows'] as $row => $record) {
            foreach ($column_names as $col) {
                $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow($p++, $row + 2, $record[$col]);
            }
            $p = 1;
        }
        
        $writer = new Xlsx($spreadsheet);

        if(!empty($stack['filename'])):
            $file_name = $stack['filename'];
        else:
            $file_name = date('d-m-y').'-'.uniqid();
        endif;

        if($stack['download'] == true):

            // Send appropriate headers
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="'. $file_name .'.xlsx"');
            header('Cache-Control: max-age=0');
    
            // Use PHP output buffering to capture the output and send it to the browser
            ob_end_clean();
            ob_start();
            $writer->save('php://output');
            ob_end_flush();
            exit;

        elseif($stack['download'] == false):

            $writer->save($file_name.'.xlsx');

        endif;

        // // Debugging statements
        // echo count($column_names); // Should output the number of columns
        // echo count($data[0]); // Should output the number of fields in the first row of data
        // die;
    }

	public function downloadExcel() {
		// Create a new Spreadsheet object
		$spreadsheet = new Spreadsheet();
	
		// Set the value of a cell
		$spreadsheet->getActiveSheet()->setCellValue('A1', 'Hello World!');
	
		// Create a new Xlsx object and write the spreadsheet to it
		$writer = new Xlsx($spreadsheet);
	
		// Set headers for download
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="hello-world.xlsx"');
		header('Cache-Control: max-age=0');
	
		// Output the file to the browser
		$writer->save('php://output');
		exit;
	}
}