<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cars extends CI_Controller {

	public $id_pengguna;

    public function __construct() {
        parent::__construct();
        $this->load->model('cars/car_model', 'CAR');
		$this->load->model("pengguna/pengguna_model", "USR");
		
		$this->id_pengguna				=$this->session->userdata("id_pengguna");
		
    }


	public function index() {
		$data["judul"]		="ERP - Data Mobil";
		$data["footer"] 	="2023 - ".date("Y")." &copy; PT. Wang Sarimulti Utama";
		$data["usr"]		=$this->USR->getAksesData($this->id_pengguna);
		$this->template->load("themes/qovex", "cars/index", $data);
	}

    // Tampilkan list semua mobil
	
    public function index_old() {
        $data['title'] = 'Daftar Mobil';
        $data['cars'] = $this->Car_model->get_all();
        
        $this->load->view('templates/header', $data);
        $this->load->view('cars/index', $data);
        $this->load->view('templates/footer');
    }
	
	
	
	public function defaultData( $offset = 0 ){		
		
		$perpage = 10;
		$config = [
			 'first_url'		=> base_url()."cars/defaultData/",
			 'base_url'         => site_url('cars/defaultData'),
			 'total_rows'       => $this->CAR->count_all(),
			 'per_page'         => $perpage,
			 'full_tag_open'    => '<ul class="pagination" style="justify-content:center;">',
			 'full_tag_close'   => '</ul>',
			 'first_tag_open'   => "<li class='page-item'>",
			 'first_tag_close'  => "</li>",
			 'prev_link'        => '&laquo Prev',
			 'prev_tag_open'    => '<li class="page-item">',
			 'prev_tag_close'   => '</li>',
			 'next_link'        => 'Next &raquo',
			 'next_tag_open'    => "<li class='page-item'>",
			 'next_tag_close'   => "</li>",
			 'last_tag_open'    => "<li class='page-item'>",
			 'last_tag_close'   => "</li>",
			 'cur_tag_open'     => "<li class='page-item active'><a style='cursor:pointer' class='page-link'>",
			 'cur_tag_close'    => "<span class='sr-only'>(current)</span></a></li>",
			 'num_tag_open'     => "<li class='page-item'>",
			 'num_tag_close'    => "</li>",
			 'uri_segment'		=> 3,
			 'suffix'			=> "/",
			 'attributes'		=> ['class'=>'page-link', 'style'=>'cursor:pointer;color:#007bff;']
		];
				  
		$this->pagination->initialize($config);
		$limit['perpage']  	= $perpage;
		$limit['offset']   	= $offset;
		 
		$data['data']  		= $this->CAR->select_all_paging($limit);
		$data['pagings']   	= $this->pagination->create_links();
		$data["cari"]		= 0;
		$data['page']      	= $offset;
		$this->load->view("cars/default", $data);
		
	}
	
	
	public function frmTambah(){
		$data["action"]		="add";
		$data["car"]		= NULL;
		$data["id_mobil"]	= 0;
		
		$this->load->view("cars/frmTambah", $data);
	}
	
	public function frmEdit(){
		
		$id_mobil			= $this->input->post("id", TRUE);
		
		$data["action"]		="edit";
		$data["car"]		= $this->CAR->get_by_id($id_mobil);
		$data["id_mobil"]	= $id_mobil;
		
		$this->load->view("cars/frmTambah", $data);
		
	}
	
	public function hapus(){
		$id			= $this->input->post("id", TRUE);
		$open 		= [];
		$error		= null;
		
		$car 		= $this->CAR->get_by_id($id);
		
		if(!$id){ $error="ID Mobil Kosong"; }
		elseif(!$car){ $error="Mobil Tidak Ditemukan"; }
		
		if($error){
			$open 		=["error"=>true, "msgErr"=>$error];
		} else {
			$open 		=["error"=>false, "msgErr"=>"PASS"];
			
			if(!$this->CAR->delete($id)){
				$open 		=["error"=>true, "msgErr"=>"Gagal menghapus Data Mobil"];
			}
			
		}
		
		echo json_encode($open);
		
	}
	
	public function simpan(){
		$id_mobil	= $this->input->post("id_mobil", TRUE);
		$name		= $this->input->post("name", TRUE);
		$plate		= $this->input->post("plate", TRUE);
		$capacity	= $this->input->post("capacity", TRUE);
		$status		= $this->input->post("status", TRUE);
		$action		= $this->input->post("action", TRUE);
		$open 		= [];
		$error		= null;
		$now 		= date("Y-m-d H:i:s");
		
		if(!$name){ $error="Nama Mobil Kosong"; }
		elseif(!$plate){ $error="Nomor Plat Kosong"; }
		elseif(!$capacity){ $error="Kapasitas Kosong"; }
		elseif(!$status){ $error="Pilih Status"; }
		
		if($error){
			$open 		=["error"=>true, "msgErr"=>$error];
		} else {
			$open 		=["error"=>false, "msgErr"=>"PASS"];
			
			$tambah 		=["name"=>$name, "plate"=>$plate, "capacity"=>$capacity, "status"=>$status, "created_at"=>$now, "updated_at"=>$now];
			$update 		=["name"=>$name, "plate"=>$plate, "capacity"=>$capacity, "status"=>$status, "updated_at"=>$now];
			
			if($action=="add"){
				$this->db->insert("cars", $tambah);
			} elseif($action=="edit"){
				$this->db->where("id", $id_mobil)->update("cars", $update);
			}
			
		}
		
		echo json_encode($open);
		
	}

    // Form tambah mobil baru
    public function add() {
        $data['title'] = 'Tambah Mobil';
        $data['action'] = 'add';
        $data['car'] = NULL;

        // Validasi form
        $this->form_validation->set_rules('name', 'Nama Mobil', 'required|trim|max_length[100]');
        $this->form_validation->set_rules('plate', 'Nomor Plat', 'required|trim|max_length[20]|callback_check_plate_unique');
        $this->form_validation->set_rules('capacity', 'Kapasitas', 'required|integer|greater_than[0]');
        $this->form_validation->set_rules('status', 'Status', 'required|in_list[available,maintenance,inactive]');

        if ($this->form_validation->run() === FALSE) {
            // Tampilin form
            $this->load->view('templates/header', $data);
            $this->load->view('cars/form', $data);
            $this->load->view('templates/footer');
        } else {
            // Proses simpan data
            $insert_data = array(
                'name' => $this->input->post('name', TRUE),
                'plate' => $this->input->post('plate', TRUE),
                'capacity' => $this->input->post('capacity', TRUE),
                'status' => $this->input->post('status', TRUE)
            );

            if ($this->Car_model->insert($insert_data)) {
                $this->session->set_flashdata('success', 'Mobil berhasil ditambahkan.');
                redirect('cars');
            } else {
                $this->session->set_flashdata('error', 'Gagal menambahkan mobil.');
                redirect('cars/add');
            }
        }
    }

    // Form edit mobil
    public function edit($id) {
        $data['title'] = 'Edit Mobil';
        $data['action'] = 'edit';
        $data['car'] = $this->Car_model->get_by_id($id);

        if (!$data['car']) {
            show_404();
        }

        // Validasi form
        $this->form_validation->set_rules('name', 'Nama Mobil', 'required|trim|max_length[100]');
        $this->form_validation->set_rules('plate', 'Nomor Plat', 'required|trim|max_length[20]|callback_check_plate_unique[' . $id . ']');
        $this->form_validation->set_rules('capacity', 'Kapasitas', 'required|integer|greater_than[0]');
        $this->form_validation->set_rules('status', 'Status', 'required|in_list[available,maintenance,inactive]');

        if ($this->form_validation->run() === FALSE) {
            // Tampilin form
            $this->load->view('templates/header', $data);
            $this->load->view('cars/form', $data);
            $this->load->view('templates/footer');
        } else {
            // Proses update
            $update_data = array(
                'name' => $this->input->post('name', TRUE),
                'plate' => $this->input->post('plate', TRUE),
                'capacity' => $this->input->post('capacity', TRUE),
                'status' => $this->input->post('status', TRUE)
            );

            if ($this->Car_model->update($id, $update_data)) {
                $this->session->set_flashdata('success', 'Mobil berhasil diupdate.');
                redirect('cars');
            } else {
                $this->session->set_flashdata('error', 'Gagal mengupdate mobil.');
                redirect('cars/edit/' . $id);
            }
        }
    }

    // Hapus mobil
    public function delete($id) {
        $car = $this->Car_model->get_by_id($id);
        
        if (!$car) {
            $this->session->set_flashdata('error', 'Mobil tidak ditemukan.');
            redirect('cars');
        }

        if ($this->Car_model->delete($id)) {
            $this->session->set_flashdata('success', 'Mobil berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus mobil.');
        }
        
        redirect('cars');
    }

    // Cek plat nomor udah ada atau belum
    public function check_plate_unique($plate, $id = NULL) {
        if ($this->Car_model->is_plate_exists($plate, $id)) {
            $this->form_validation->set_message('check_plate_unique', 'Nomor plat sudah terdaftar.');
            return FALSE;
        }
        return TRUE;
    }
}

