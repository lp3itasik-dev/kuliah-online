<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class log extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Models','m');
    }

	public function index()
	{
		$this->Login();
	}

	/** --Login-- **/
	public function login()
	{
		$this->load->view('log/login');
	}
	public function cek_login()
	{
		$username	= $this->input->post('username');
		$password	= $this->input->post('password');
		$select = $this->db->select('*');
		$select = $this->db->where('username',$username);
		$select = $this->db->where('password',$password);
		$read = $this->m->Get_All('user',$select);
		if(count($read)>0){
		    foreach($read as $r){}
			$data	= array(
				'username'	=>	$r->username,
				'nama'		=>	$r->nama,
				'logo'		=>	$r->logo,
			);
			if($r->status=="adm"){
			    $data['log']	=	'lgn-adm';
			    $this->session->set_userdata($data);
			    redirect(base_url()."adm");
			}else{
			    $data['log']	=	'lgn-ukm';
			    $this->session->set_userdata($data);
			    redirect(base_url()."ukm");
			}
		}
		redirect(base_url()."log?msg=gagal");
	}
	/** --Login-- **/

	/** --Logout-- **/
	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url()."log?msg=logout");
	}
	/** --Logout-- **/

}
