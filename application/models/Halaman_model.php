<?php
class Halaman_model extends CI_Model {

	function is_UserExist($username){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('username', $username);
		return $query = $this->db->get()->num_rows();
	}

	function is_emailExist($email){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('email', $email);
		return $query = $this->db->get()->num_rows();
	}
	
	function get_userId($email){
		$this->db->select('*');
		$this->db->where('email', $email);
		$query = $this->db->get('user');
		return $query->result()[0]->id_user;
    }
    
    function get_users($username){
		if($this->Halaman_model->is_UserExist($username) == 0 ){
			return "not_registered";
		}else{
			$this->db->select('*');
			$this->db->from('user');
			$this->db->where("username", $username);
			$query = $this->db->get();
			if ($query->num_rows() > 0) {
				return $query->result();
			} else {
				return "failed";
			}
		}
	}

	public function tampil_gejala(){
		$this->db->select('*');
		$this->db->order_by('id_gejala', 'ASC');
		$query = $this->db->get('gejala');
		if($query->num_rows()>0)
		{
		  return $query->result();
		} else{
		  return $query->result();
		}
	}

	public function getJenisPerilaku($kdGejalaArr){
		$this->db->select('*');

		if(!empty($kdGejalaArr)){	
			foreach($kdGejalaArr as $key => $val){
				if($key == 0){
					$this->db->like('rules', $val);
				}else{
					$this->db->or_like('rules', $val);
				}
			}
		}else{
			$this->db->like('rules', 999999999);
		}
		
		$query = $this->db->get('jenis_perilaku');
		return $query;
	}

	function getTotalKecanduan(){
		$this->db->select('*');
		$this->db->where('hasil_screening', 1);
		$query = $this->db->get('konsultasi');
		return $query->num_rows();
	}
	
	function getTotalTidakKecanduan(){
		$this->db->select('*');
		$this->db->where('hasil_screening', 0);
		$query = $this->db->get('konsultasi');
		return $query->num_rows();
	}
	
	function getTotalResponse(){
		$this->db->select('*');
		$query = $this->db->get('konsultasi');
		return $query->num_rows();
	}
	
	function getJawabanData(){
		$this->db->select('*');
		$query = $this->db->get('konsultasi');
		return $query->result();
	}
	
	function getDemografi(){
		$this->db->select('id_user,tanggal_lahir,jenis_kelamin');
		$query = $this->db->get('user');
		return $query->result();
	}

	function getGamelist(){
		$this->db->select('id_user,hasil_screening,game_list');
		$this->db->where('hasil_screening', 1);
		$this->db->join('user', 'user.id_user = konsultasi.user_id', 'left');
		$query = $this->db->get('konsultasi');
		return $query->result();
	}
}
