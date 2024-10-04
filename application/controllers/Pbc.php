<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pbc extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Models','m');
    }
	/** --Presensi-- **/
	public function index()
	{
	    $hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
	    
        $select = $this->db->select('*');
        $select = $this->db->join('pengajar','pengajar.id=jadwal.id_pengajar');
        $select = $this->db->where('hari',$hari[date('w')]);
        $select = $this->db->group_by('pengajar.id');
        $select = $this->db->order_by('nama','ASC');
        $data['pengajar'] = $this->m->Get_All('jadwal',$select);
        
		$this->load->view('pbc/jadwal/index.php',$data);
	}
	public function all()
	{
	    $hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
	    
        $select = $this->db->select('*');
        $select = $this->db->join('pengajar','pengajar.id=jadwal.id_pengajar');
        $select = $this->db->group_by('pengajar.id');
        $select = $this->db->order_by('nama','ASC');
        $data['pengajar'] = $this->m->Get_All('jadwal',$select);
        
		$this->load->view('pbc/jadwal/all.php',$data);
	}
	public function hari($hari)
	{
        $select = $this->db->select('*');
        $select = $this->db->join('pengajar','pengajar.id=jadwal.id_pengajar');
        $select = $this->db->where('hari',$hari);
        $select = $this->db->group_by('pengajar.id');
        $select = $this->db->order_by('nama','ASC');
        $data['pengajar'] = $this->m->Get_All('jadwal',$select);
        
		$this->load->view('pbc/jadwal/all.php',$data);
	}
}
