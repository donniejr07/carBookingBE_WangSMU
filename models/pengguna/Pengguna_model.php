<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

class Pengguna_model extends CI_Model {

	public function totalBaris(){
		return $this->db->select('id_pengguna')
						->from('pengguna')
						->get()->num_rows();
	}
	
	public function cari($key){
		return $this->db->select("id_pengguna, A.data_akses, nama_lengkap, uname, B.nama_dept, C.nama_detail, A.aktif, A.photo")
						 ->from("pengguna AS A")
						 ->join("departement AS B","B.kode_dept=LEFT(A.data_akses,3)")
						 ->join("parameter_detail AS C","C.no_urut=A.id_group")
						 ->like("nama_lengkap", $key)
						 ->order_by("nama_lengkap")->get()->result();
	}
	
	public function select_all_paging($limit=array()){
		$this->db->select("id_pengguna, A.data_akses, nama_lengkap, uname, B.nama_dept, C.nama_detail, A.aktif, A.photo")
						 ->from("pengguna AS A")
						 ->join("departement AS B","B.kode_dept=LEFT(A.data_akses,3)")
						 ->join("parameter_detail AS C","C.no_urut=A.id_group")
						 ->order_by("id_pengguna");
		
		if($limit!=NULL){
			$this->db->limit($limit['perpage'], $limit['offset']);
			return $this->db->get()->result();
		}
	}
	

	public function cek($id_pengguna, $pwd){
		$sql ="SELECT id_pengguna FROM pengguna WHERE id_pengguna=".$id_pengguna." AND pwd='".$pwd."'";
		return $this->db->query($sql)->row();
	}
	
	public function cekUname($uname){
		$sql ="SELECT id_pengguna FROM pengguna WHERE uname='".$uname."'";
		return $this->db->query($sql)->result_array();
	}
	
	public function grp($kode){
		return $this->db->select("no_urut, nama, nama_detail")
						->from("parameter_detail")
						->where("nama", "group_pengguna")->get()->result();						
	}
	
	public function getAksesData($id_pengguna){
		return $this->db->select("A.id_pengguna, B.nama_dept, A.data_akses, A.nama_lengkap,
								 A.photo, A.id_group, C.nama_detail,  A.ips, A.oss, A.browser, A.browserver, A.mobiles")
					->from("pengguna AS A")
					->join("departement AS B","B.kode_dept=LEFT(A.data_akses,3)")
					->join("parameter_detail AS C", "C.no_urut=A.id_group")
					->where("A.aktif", 1)
					->where("A.id_pengguna", $id_pengguna)->get()->row();
	}
	
	public function edit($id){
		$sql 	="SELECT A.id_pengguna, A.nama_lengkap, B.kode_dept, B.nama_dept, A.uname,
					A.id_group, A.aktif, A.photo, A.id_karyawan,  A.nomor_hp, A.data_akses, A.pin, E.nik, E.nama_emp
				  FROM pengguna AS A
				  LEFT JOIN departement AS B ON B.kode_dept=A.data_akses
				  LEFT JOIN emp E ON E.pin = A.pin
				  WHERE A.id_pengguna=".$id;
				  
		return $this->db->query($sql)->row();				  
	}
	
	public function simpan($data){
		$this->db->insert("pengguna", $data);
		return $this->db->affected_rows();
	}
	
	public function roles($data){
		$this->db->insert_batch("pengguna_roles_tbl", $data);
		return $this->db->affected_rows();
	}
	
	public function roles_delete($id){
		$this->db->where("id_group", $id)->delete("pengguna_roles_tbl");
		return $this->db->affected_rows();
	}
	
	public function update($id, $data){
		$this->db->where("id_pengguna", $id)->update("pengguna", $data);
		return $this->db->affected_rows();
	}
  
  
}