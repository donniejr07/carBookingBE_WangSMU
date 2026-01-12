<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Car_model extends CI_Model {

    private $table = 'cars';
	
	public function select_all_paging($limit=[] ){
		
		$offset		= (int)$limit["offset"];
		$perpage	= (int)$limit["perpage"];
		
		$sql ="SELECT 
					id,
					name,
					plate,
					capacity,
					status
				FROM cars
				ORDER BY name
				LIMIT ?, ?";
		
		return $this->db->query($sql, [$offset, $perpage])->result_array();
		
	}

    // Ambil semua data mobil
    public function get_all($conditions = array()) {
        if (!empty($conditions)) {
            $this->db->where($conditions);
        }
        $query = $this->db->get($this->table);
        return $query->result_array();
    }

    // Cari mobil berdasarkan ID
    public function get_by_id($id) {
        $query = $this->db->get_where($this->table, array('id' => $id));
        return $query->row_array();
    }

    // Ambil mobil yang statusnya available aja
    public function get_available() {
        $this->db->where('status', 'available');
        $query = $this->db->get($this->table);
        return $query->result_array();
    }

    // Tambah mobil baru
    public function insert($data) {
        $insert_data = array(
            'name' => $this->security->xss_clean($data['name']),
            'plate' => $this->security->xss_clean($data['plate']),
            'capacity' => (int)$data['capacity'],
            'status' => $this->security->xss_clean($data['status'])
        );

        if ($this->db->insert($this->table, $insert_data)) {
            return $this->db->insert_id();
        }
        return FALSE;
    }

    // Update data mobil
    public function update($id, $data) {
        $update_data = array(
            'name' => $this->security->xss_clean($data['name']),
            'plate' => $this->security->xss_clean($data['plate']),
            'capacity' => (int)$data['capacity'],
            'status' => $this->security->xss_clean($data['status'])
        );

        $this->db->where('id', $id);
        return $this->db->update($this->table, $update_data);
    }

    // Hapus mobil
    public function delete($id) {
        $this->db->where('id', $id);
        return $this->db->delete($this->table);
    }

    // Cek apakah plat nomor sudah ada (untuk validasi)
    public function is_plate_exists($plate, $exclude_id = NULL) {
        $this->db->where('plate', $plate);
        if ($exclude_id) {
            $this->db->where('id !=', $exclude_id);
        }
        $query = $this->db->get($this->table);
        return $query->num_rows() > 0;
    }

    // Hitung total mobil
    public function count_all() {
        return $this->db->count_all($this->table);
    }

    // Hitung mobil berdasarkan status
    public function count_by_status($status) {
        $this->db->where('status', $status);
        return $this->db->count_all_results($this->table);
    }
}

