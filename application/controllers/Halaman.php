<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Halaman extends CI_Controller {

    function __construct(){
		parent::__construct();
		$this->load->model('Halaman_model');
    }
    
    public function Screeningn()
	{
        $email= $this->db->select("email")->get("user")->result();
        $daftarEmail=array();
        foreach ($email as $e) {
            $daftarEmail[]=$e->email;
        }
        $data = array(
            'title' 	=> 'Sistem Pakar Screening Kecandunan Game Online',
            'isi' 		=> 'pages/ScreeningN',
            'nav' 		=> 'nav.php',
            'context'   => 'screening',
            'email'     => $daftarEmail,
            'pertanyaan'=> $this->Halaman_model->tampil_gejala()       
        );
        $this->load->view('layout/wrapper',$data);
    }

   
    function add_jawaban(){
        $jawaban = $this->input->post('jawaban');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $tanggalLahir = $this->input->post('tanggalLahir');
        $jenisKelamin = $this->input->post('jenisKelamin');
        $gameList = $this->input->post('gameList');
        $noHandphone = $this->input->post('noHandphone');
        $kdGejalaArr = array();

        foreach($jawaban as $key => $val){
            $kode_gejala = $val["kode_gejala"];
            $val = $val["value"];

            if($val == 1){
                array_push($kdGejalaArr, $kode_gejala);
            }
        }

        $jnsPrilaku = $this->Halaman_model->getJenisPerilaku($kdGejalaArr)->result();
        
        if(count($jnsPrilaku) >= 4){
            $kecanduan = true;
        }else{
            $kecanduan = false;
        }

        $email_check = $this->Halaman_model->is_emailExist($email);
        if($email_check == 0){ //check username yang diinput sudah terdaftar atau belum
            $data_user = array(
                'nama' => $nama,
                'email' => $email,
                'tanggal_lahir' => $tanggalLahir,
                'jenis_kelamin' => $jenisKelamin,
                'game_list' => $gameList,
                'no_handphone' => $noHandphone
            );
    
            $this->db->insert('user', $data_user);
            $user_id = $this->db->insert_id();

        }else{
            $user_id =  $this->Halaman_model->get_userId($email);
        }

        $data_konsul = array(
            'jawaban'               => json_encode($jawaban),
            'hasil_screening'       	=> (int) $kecanduan,
            'user_id'               => $user_id
        );
        $this->db->insert('konsultasi', $data_konsul);

        echo json_encode(
            array(
                'status' => 'ok', 
                'kecanduan' => $kecanduan, 
                'data' => $jnsPrilaku,
                'kecanduanC' => $this->Halaman_model->getTotalKecanduan() ,
                'tKecanduanC' => $this->Halaman_model->getTotalTidakKecanduan() ,
                'responseC' => $this->Halaman_model->getTotalResponse()
            )
        );
    }
}
