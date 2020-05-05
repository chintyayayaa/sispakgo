<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Laporan extends CI_Controller {

    function __construct(){
		parent::__construct();
		$this->load->model('Halaman_model');
    }
    
    public function index()
	{
       
    }

    public function export(){
        $inputFileName = './tb_validasi.xlsx';

        $data = $this->Halaman_model->getJawabanData();

        /** Load $inputFileName to a Spreadsheet Object  **/
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);
        //change it
        $sheet = $spreadsheet->getActiveSheet();

        $index = 4;
        $no = 1;
        foreach($data as $val){
            $sheet->setCellValue('A'.$index, $no);
            $sheet->setCellValue('B'.$index, $val->user_id); 

            foreach(json_decode($val->jawaban) as $valin){
                if($valin->value == 1){
                    if($valin->kode_gejala == "G01"){
                        $sheet->setCellValue('C'.$index, $valin->value); 
                    }
                    if($valin->kode_gejala == "G02"){
                        $sheet->setCellValue('D'.$index, $valin->value); 
                    }
                    if($valin->kode_gejala == "G03"){
                        $sheet->setCellValue('E'.$index, $valin->value); 
                    }
                    if($valin->kode_gejala == "G04"){
                        $sheet->setCellValue('F'.$index, $valin->value); 
                    }
                    if($valin->kode_gejala == "G05"){
                        $sheet->setCellValue('G'.$index, $valin->value); 
                    }
                    if($valin->kode_gejala == "G06"){
                        $sheet->setCellValue('H'.$index, $valin->value); 
                    }
                    if($valin->kode_gejala == "G07"){
                        $sheet->setCellValue('I'.$index, $valin->value); 
                    }
                    if($valin->kode_gejala == "G08"){
                        $sheet->setCellValue('J'.$index, $valin->value); 
                    }
                    if($valin->kode_gejala == "G09"){
                        $sheet->setCellValue('K'.$index, $valin->value); 
                    }
                    if($valin->kode_gejala == "G10"){
                        $sheet->setCellValue('L'.$index, $valin->value); 
                    }
                    if($valin->kode_gejala == "G11"){
                        $sheet->setCellValue('M'.$index, $valin->value); 
                    }
                    if($valin->kode_gejala == "G12"){
                        $sheet->setCellValue('N'.$index, $valin->value); 
                    }
                }
            }

            $sheet->setCellValue('O'.$index, $val->hasil_screening); 
            $index++;
            $no++;
        }

        $writer = new Xlsx($spreadsheet);

        $filename = 'Data Hasil Screening'; // set filename for excel file to be exported
 
        header('Content-Type: application/vnd.ms-excel'); // generate excel file
        header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
        header('Cache-Control: max-age=0');
        
        $writer->save('php://output');	// download file
    }
    
    public function export2(){
        $inputFileName = './tb_demografi.xlsx';

        $data = $this->Halaman_model->getDemografi();

        /** Load $inputFileName to a Spreadsheet Object  **/
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);
        //change it
        $sheet = $spreadsheet->getActiveSheet();

        $index = 2;
        $no = 1;
        $now = new DateTime();

        $genderPCount = 0;
        $genderLCount = 0;

        $umurArray = array();
        
        foreach($data as $val){
            $date = new DateTime($val->tanggal_lahir);
            $interval = $now->diff($date);
            $umur = $interval->y;
            $gender = $val->jenis_kelamin == 0 ? "L" : "P";

            array_push($umurArray, $umur);

            if($gender == "L") $genderLCount++;
            if($gender == "P") $genderPCount++;

            $sheet->setCellValue('A'.$index, $no);
            $sheet->setCellValue('B'.$index, $val->id_user);
            $sheet->setCellValue('C'.$index, $umur);
            $sheet->setCellValue('D'.$index, $gender);

            $index++;
            $no++;
        }

        $minUmur = min($umurArray);
        $maxUmur = max($umurArray);

        $sheet->setCellValue('G10', $genderLCount);
        $sheet->setCellValue('G11', $genderPCount);
        $sheet->setCellValue('G12', $minUmur . " - " . $maxUmur);

        $writer = new Xlsx($spreadsheet);

        $filename = 'Data Hasil Demografi'; // set filename for excel file to be exported
 
        header('Content-Type: application/vnd.ms-excel'); // generate excel file
        header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
        header('Cache-Control: max-age=0');
        
        $writer->save('php://output');	// download file
    }

    public function export3(){
        $inputFileName = './tb_gamelist.xlsx';

        $data = $this->Halaman_model->getGamelist();

        /** Load $inputFileName to a Spreadsheet Object  **/
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);
        //change it
        $sheet = $spreadsheet->getActiveSheet();

        $index = 2;
        $no = 1;
       
        foreach($data as $val){

            $sheet->setCellValue('A'.$index, $no);
            $sheet->setCellValue('B'.$index, $val->id_user);
            $sheet->setCellValue('C'.$index, $val->game_list);

            $index++;
            $no++;
        }

        $writer = new Xlsx($spreadsheet);

        $filename = 'Data Hasil GameList'; // set filename for excel file to be exported
 
        header('Content-Type: application/vnd.ms-excel'); // generate excel file
        header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
        header('Cache-Control: max-age=0');
        
        $writer->save('php://output');	// download file
    }
}
