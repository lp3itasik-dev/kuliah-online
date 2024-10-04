<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class adm extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->model('Models','m');
    }
	function cek_log(){
	    if($this->session->userdata("log")!="lgn-adm"){
	        redirect(base_url()."log");
	    }
	}
	/** --Cek Sidebar Active-- **/
	function sidebar()
	{
	    $this->cek_log();
		$data['dashboard'] = "";
		$data['kegiatan']  = "";
		$data['sertifikat']   = "";
		$data['kelas']   = "";
		$data['karyawan']   = "";
		$data['user']   = "";
		$this->session->set_userdata($data);
	}
	/** --Cek Sidebar Active-- **/
	public function index()
	{
		$this->sidebar();
		$data['dashboard']="active";
		$this->session->set_userdata($data);

		$this->load->view('adm/index',$data);
	}
	public function kegiatan()
	{
		$this->sidebar();
		$data['kegiatan']="active";
		$this->session->set_userdata($data);

        $select = $this->db->select('*');
        $select = $this->db->order_by('tanggal','DESC');
		$data['read'] = $this->m->Get_All('kegiatan',$select);

		$this->load->view('adm/kegiatan',$data);
	}
	public function kelas()
	{
		$this->sidebar();
		$data['kelas']="active";
		$this->session->set_userdata($data);

        $select = $this->db->select('*');
        $select = $this->db->order_by('nama','ASC');
		$data['read'] = $this->m->Get_All('kelas',$select);

		$this->load->view('adm/kelas',$data);
	}
	public function karyawan()
	{
		$this->sidebar();
		$data['karyawan']="active";
		$this->session->set_userdata($data);

        $select = $this->db->select('*');
        $select = $this->db->order_by('nama','ASC');
		$data['read'] = $this->m->Get_All('karyawan',$select);

		$this->load->view('adm/karyawan',$data);
	}
	public function user()
	{
		$this->sidebar();
		$data['user']="active";
		$this->session->set_userdata($data);

        $select = $this->db->select('*');
        $select = $this->db->order_by('nama','ASC');
		$data['read'] = $this->m->Get_All('user',$select);

		$this->load->view('adm/user',$data);
	}
	public function sertifikat()
	{
		$this->sidebar();
		$data['sertifikat']="active";
		$this->session->set_userdata($data);

        $select = $this->db->select('*');
        $select = $this->db->order_by('tanggal','DESC');
		$data['read'] = $this->m->Get_All('kegiatan',$select);

		$this->load->view('adm/sertifikat',$data);
	}
	public function cetak_sertifikat($id_kegiatan,$id_peserta){
	    $this->load->library('PdfGenerator');
	    
	    $select = $this->db->select('*');
        $select = $this->db->where('id',$id_kegiatan);
    	$read = $this->m->Get_All('kegiatan',$select);
        foreach ($read as $r) {
          $data['kegiatan'] = $r->kegiatan;
          $data['tanggal'] = $r->tanggal;
          $data['id'] = $r->id;
          $data['jenis'] = $r->jenis;
          $data['sertifikat'] = $r->sertifikat;
          $data['posisi'] = $r->posisi;
          $data['size'] = $r->size;
          $data['margintop'] = $r->margin_top;
          $data['marginleft'] = $r->margin_left;
          $data['marginright'] = $r->margin_right;
          $data['posisi2'] = $r->posisi2;
          $data['size2'] = $r->size2;
          $data['margintop2'] = $r->margin_top2;
          $data['marginleft2'] = $r->margin_left2;
          $data['marginright2'] = $r->margin_right2;
          $data['posisi3'] = $r->posisi3;
          $data['size3'] = $r->size3;
          $data['margintop3'] = $r->margin_top3;
          $data['marginleft3'] = $r->margin_left3;
          $data['marginright3'] = $r->margin_right3;
        }
		
		if($data['jenis']%2==0){
            $select = $this->db->join('peserta','peserta.id=presensi_peserta.id_peserta');
            $select = $this->db->where('presensi_peserta.id_kegiatan',$id_kegiatan);
            $select = $this->db->where('presensi_peserta.id_peserta',$id_peserta);
            $reads = $this->m->Get_All('presensi_peserta',$select);
        }else{
            $select = $this->db->where('id_presensi',$id_peserta);
            $reads = $this->m->Get_All('presensi',$select);
        }
        if($data['jenis']==3){
            $select = $this->db->join('karyawan','karyawan.id=presensi_peserta.id_peserta');
            $select = $this->db->where('presensi_peserta.id_kegiatan',$id_kegiatan);
            $select = $this->db->where('presensi_peserta.id_peserta',$id_peserta);
            $reads = $this->m->Get_All('presensi_peserta',$select);
        }
        
        $data['idkegiatan'] = $id_kegiatan;
        $data['idpeserta']  = $id_peserta;
        foreach ($reads as $rs){
            $data['nama'] = strtoupper($rs->nama);
            $data['nomorsertifikat']=$rs->nomor_sertifikat;
        }
        
		$this->load->library('Ciqrcode'); //pemanggilan library QR CODE
        
		$config['cacheable']	= true; //boolean, the default is true
		$config['cachedir']		= './template/'; //string, the default is application/cache/
		$config['errorlog']		= './template/'; //string, the default is application/logs/
		$config['imagedir']		= './template/global_assets/images/qrcode/'; //direktori penyimpanan qr code
		$config['quality']		= true; //boolean, the default is true
		$config['size']			= '1024'; //interger, the default is 1024
		$config['black']		= array(224,255,255); // array, default is array(255,255,255)
		$config['white']		= array(70,130,180); // array, default is array(0,0,0)
		$this->ciqrcode->initialize($config);

		$image_name=$id_kegiatan.'-'.$id_peserta.'.png'; //buat name dari qr code sesuai dengan nim

		$params['data'] = $data['nomorsertifikat']; //data yang akan di jadikan QR CODE
		$params['level'] = 'H'; //H=High
		$params['size'] = 10;
		$params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
		$this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
		
		
		$html = $this->load->view('adm/cetak_sertifikat', $data, true);
		$filename = $data['nama']." - SERTIFIKAT ".$data['kegiatan'];
		$this->pdfgenerator->generate($html, $filename, true, 'A4', 'landscape');
	}
	public function laporan($id)
	{
		$this->sidebar();
		$data['kegiatan']="active";
		$this->session->set_userdata($data);

        $select = $this->db->select('*');
        $select = $this->db->where('id',$id);
    	$read = $this->m->Get_All('kegiatan',$select);
        foreach ($read as $r) {
          $data['kegiatan'] = $r->kegiatan;
          $data['tanggal'] = $r->tanggal;
          $data['id'] = $r->id;
          $data['jenis'] = $r->jenis;
        }
    
        $select = $this->db->select('*');
        if($data['jenis']%2==0){
            $select = $this->db->join('peserta','peserta.id=presensi_peserta.id_peserta');
            $select = $this->db->where('presensi_peserta.id_kegiatan',$id);
            $select = $this->db->or_where('presensi_peserta.id_kegiatan is NULL');
            $select = $this->db->order_by('nama','asc');
            $data['read'] = $this->m->Get_All('presensi_peserta',$select);
        }else{
            $select = $this->db->where('id',$id);
            $select = $this->db->order_by('nama','asc');
            $data['read'] = $this->m->Get_All('presensi',$select);
        }
        if($data['jenis']==3){
            $select = $this->db->join('karyawan','karyawan.id=presensi_peserta.id_peserta');
            $select = $this->db->where('presensi_peserta.id_kegiatan',$id);
            $select = $this->db->order_by('nama','asc');
            $data['read'] = $this->m->Get_All('presensi_peserta',$select);
        }
		$this->load->view('adm/laporan',$data);
	}
	public function peserta($id)
	{
		$this->sidebar();
		$data['sertifikat']="active";
		$this->session->set_userdata($data);

        $select = $this->db->select('*');
        $select = $this->db->where('id',$id);
    		$read = $this->m->Get_All('kegiatan',$select);
        foreach ($read as $r) {
          $data['kegiatan'] = $r->kegiatan;
          $data['tanggal'] = $r->tanggal;
          $data['formatnomor'] = $r->format_nomor;
          $data['awalnomor'] = $r->awal_nomor;
          $data['id'] = $r->id;
          $data['jenis'] = $r->jenis;
          $data['sertifikat'] = $r->sertifikat;
          $data['posisi'] = $r->posisi;
          $data['size'] = $r->size;
          $data['margintop'] = $r->margin_top;
          $data['marginleft'] = $r->margin_left;
          $data['marginright'] = $r->margin_right;
          $data['posisi2'] = $r->posisi2;
          $data['size2'] = $r->size2;
          $data['margintop2'] = $r->margin_top2;
          $data['marginleft2'] = $r->margin_left2;
          $data['marginright2'] = $r->margin_right2;
          $data['posisi3'] = $r->posisi3;
          $data['size3'] = $r->size3;
          $data['margintop3'] = $r->margin_top3;
          $data['marginleft3'] = $r->margin_left3;
          $data['marginright3'] = $r->margin_right3;
        }
    
        
        if($data['jenis']%2==0){
            $select = $this->db->select('*,presensi_peserta.waktu as waktu, peserta.id as id_peserta');
            $select = $this->db->join('peserta','peserta.id=presensi_peserta.id_peserta','right');
            $select = $this->db->where('peserta.id_kegiatan',$id);
            $select = $this->db->order_by('nama','asc');
            $data['read'] = $this->m->Get_All('presensi_peserta',$select);
        }else{
            $select = $this->db->select('*');
            $select = $this->db->where('id',$id);
            $select = $this->db->order_by('nama','ASC');
            $data['read'] = $this->m->Get_All('presensi',$select);
        }
        if($data['jenis']==3){
            $select = $this->db->join('karyawan','karyawan.id=presensi_peserta.id_peserta','left');
            $select = $this->db->where('presensi_peserta.id_kegiatan',$id);
            $select = $this->db->or_where('presensi_peserta.id_kegiatan is NULL');
            $select = $this->db->order_by('nama','asc');
            $data['read'] = $this->m->Get_All('presensi_peserta',$select);
        }
		$this->load->view('adm/peserta',$data);
	}
    public function add_kegiatan(){
        $data=array(
            'kegiatan'          =>	$this->input->post('nama'),
            'tanggal'           =>	$this->input->post('tanggal'),
            'dari'              =>	$this->input->post('dari'),
            'sampai'            =>	$this->input->post('sampai'),
            'tanggal_daftar'    =>	$this->input->post('tanggal_daftar'),
            'jenis'             =>	$this->input->post('jenis'),
        );
        $this->m->Save($data, 'kegiatan');

        redirect(base_url().'adm/kegiatan');
    }
    function update_kegiatan($id)
	{
		$where=array(
			'id'		        =>	$id
		);
		$data=array(
          'kegiatan'            =>	$this->input->post('nama'),
          'tanggal'             =>	$this->input->post('tanggal'),
          'dari'                =>	$this->input->post('dari'),
          'sampai'              =>	$this->input->post('sampai'),
          'tanggal_daftar'      =>	$this->input->post('tanggal_daftar'),
          'jenis'               =>	$this->input->post('jenis'),
		);
		$this->m->Update($where, $data, 'kegiatan');

        redirect(base_url().'adm/kegiatan');
	}
    function update_sertifikat($id,$jenis)
	{
	    echo $jenis;
		$where=array(
			'id'		        =>	$id
		);
		$data=array(
          'format_nomor'        =>	$this->input->post('format_nomor'),
          'awal_nomor'          =>	$this->input->post('awal_nomor'),
          'size'                =>	$this->input->post('size'),
          'posisi'              =>	$this->input->post('posisi'),
          'margin_top'          =>	$this->input->post('margin-top'),
          'margin_left'         =>	$this->input->post('margin-left'),
          'margin_right'        =>	$this->input->post('margin-right'),
          'size2'                =>	$this->input->post('size2'),
          'posisi2'              =>	$this->input->post('posisi2'),
          'margin_top2'          =>	$this->input->post('margin-top2'),
          'margin_left2'         =>	$this->input->post('margin-left2'),
          'margin_right2'        =>	$this->input->post('margin-right2'),
          'size3'                =>	$this->input->post('size3'),
          'posisi3'              =>	$this->input->post('posisi3'),
          'margin_top3'          =>	$this->input->post('margin-top3'),
          'margin_left3'         =>	$this->input->post('margin-left3'),
          'margin_right3'        =>	$this->input->post('margin-right3'),
		);
		if(!empty($_FILES['image']['name']))
		{
			$path = 'template/global_assets/images/sertifikat/';
			$upload = $this->_do_upload($path);
			$read = $this->m->Get_Where($where, 'kegiatan');
			if(file_exists('template/global_assets/images/sertifikat/'.$read[0]->sertifikat) && ($read[0]->sertifikat != 'default.jpg'))
				unlink('template/global_assets/images/sertifikat/'.$read[0]->sertifikat);
			$data['sertifikat'] = $upload;
		}
		$this->m->Update($where, $data, 'kegiatan');
        
        if($jenis%2==0){
            $select = $this->db->join('peserta','peserta.id=presensi_peserta.id_peserta');
            $select = $this->db->where('presensi_peserta.id_kegiatan',$id);
            $select = $this->db->order_by('presensi_peserta.waktu','ASC');
            $reads  = $this->m->Get_All('presensi_peserta',$select);
        }else{
            $select = $this->db->where('id',$id);
            $select = $this->db->order_by('presensi.waktu','ASC');
            $reads  = $this->m->Get_All('presensi',$select);
        }
        if($jenis==3){
            $select = $this->db->join('karyawan','karyawan.id=presensi_peserta.id_peserta');
            $select = $this->db->where('presensi_peserta.id_kegiatan',$id);
            $select = $this->db->order_by('presensi_peserta.waktu','ASC');
            $select = $this->db->order_by('presensi_peserta.id_peserta','ASC');
            $reads  = $this->m->Get_All('presensi_peserta',$select);
        }
        $lennomor   = strlen($this->input->post('awal_nomor'));
        $nomor      = intval($this->input->post('awal_nomor'));
        foreach($reads as $rs){
            if($jenis%2==0 || $jenis==3){
                $where=array(
        			'id_kegiatan'	=>	$id,
        			'id_peserta'	=>	$rs->id_peserta,
        		);
            }else{
                $where=array(
        			'id_presensi'	=>	$rs->id_presensi,
        		);
            }
            $nol = "";
            for($i=strlen($nomor); $i<$lennomor; $i++){
                $nol = $nol."0";
            }
            $nomor2 = $nol.$nomor;
            $nomorsertifikat = str_replace('nomor',$nomor2,$this->input->post('format_nomor'));
            $nosertif=array(
              'nomor_sertifikat'    =>	$nomorsertifikat
    		);
    		if($jenis%2==0 || $jenis==3){
                $this->m->Update($where, $nosertif, 'presensi_peserta');
            }else{
                $this->m->Update($where, $nosertif, 'presensi');
            }
    		$nomor++;
        }
        
        redirect(base_url().'adm/peserta/'.$id);
	}
    function delete_kegiatan($id)
	{
		$where=array(
			'id'		=>	$id
		);
		$this->m->Delete($where, 'kegiatan');

        redirect(base_url().'adm/kegiatan');
	}
    public function add_kelas(){
        $data=array(
          'nama'                =>	$this->input->post('nama'),
          'jurusan'             =>	$this->input->post('jurusan'),
          'tahun_angkatan'      =>	$this->input->post('tahun_angkatan'),
        );
        $this->m->Save($data, 'kelas');

        redirect(base_url().'adm/kelas');
    }
    function update_kelas($id)
	{
		$where=array(
			'nama'		        =>	$id
		);
		$data=array(
          'nama'                =>	$this->input->post('nama'),
          'jurusan'             =>	$this->input->post('jurusan'),
          'tahun_angkatan'      =>	$this->input->post('tahun_angkatan'),
		);
		$this->m->Update($where, $data, 'kelas');

        redirect(base_url().'adm/kelas');
	}
    function delete_kelas($id)
	{
		$where=array(
			'nama'		=>	$id
		);
		$this->m->Delete($where, 'kelas');

        redirect(base_url().'adm/kelas');
	}
	public function add_karyawan(){
        $data=array(
          'nama'                =>	$this->input->post('nama'),
          'alamat'               =>	$this->input->post('alamat'),
          'no_tlp'              =>	$this->input->post('no_tlp'),
          'email'               =>	$this->input->post('email'),
          'divisi'              =>	$this->input->post('divisi'),
        );
        $this->m->Save($data, 'karyawan');

        redirect(base_url().'adm/karyawan');
    }
    function update_karyawan($id)
	{
		$where=array(
			'id'		        =>	$id
		);
		$data=array(
          'nama'                =>	$this->input->post('nama'),
          'alamat'               =>	$this->input->post('alamat'),
          'no_tlp'              =>	$this->input->post('no_tlp'),
          'email'               =>	$this->input->post('email'),
          'divisi'              =>	$this->input->post('divisi'),
		);
		$this->m->Update($where, $data, 'karyawan');

        redirect(base_url().'adm/karyawan');
	}
    function delete_karyawan($id)
	{
		$where=array(
			'id'		=>	$id
		);
		$this->m->Delete($where, 'karyawan');

        redirect(base_url().'adm/karyawan');
	}
    function delete_user($username)
	{
		$where=array(
			'username'		=>	$username
		);
		$this->m->Delete($where, 'user');

        redirect(base_url().'adm/user');
	}
	 public function add_user(){
        $data=array(
          'nama'                =>	$this->input->post('nama'),
          'username'            =>	$this->input->post('username'),
          'password'            =>	$this->input->post('password'),
          'status'              =>	$this->input->post('status'),
        );
        if(!empty($_FILES['image']['name']))
		{
			$path = 'template/global_assets/images/logo/';
			$upload = $this->_do_upload($path);
			$read = $this->m->Get_Where($where, 'kegiatan');
			if(file_exists('template/global_assets/images/logo/'.$read[0]->logo) && ($read[0]->logo != 'default.jpg'))
				unlink('template/global_assets/images/logo/'.$read[0]->logo);
			$data['logo'] = $upload;
		}
        $this->m->Save($data, 'user');

        redirect(base_url().'adm/user');
    }
    function update_user($username)
	{
		$where=array(
			'username'		        =>	$username
		);
		$data=array(
          'nama'                =>	$this->input->post('nama'),
          'username'            =>	$this->input->post('username'),
          'password'            =>	$this->input->post('password'),
          'status'              =>	$this->input->post('status'),
		);
        if(!empty($_FILES['image']['name']))
		{
			$path = 'template/global_assets/images/logo/';
			$upload = $this->_do_upload($path);
			$read = $this->m->Get_Where($where, 'kegiatan');
			if(file_exists('template/global_assets/images/logo/'.$read[0]->logo) && ($read[0]->logo != 'default.jpg'))
				unlink('template/global_assets/images/logo/'.$read[0]->logo);
			$data['logo'] = $upload;
		}
		$this->m->Update($where, $data, 'user');

        redirect(base_url().'adm/user');
	}
	private function _do_upload($path){	
		$config['upload_path']          = $path;
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 500000; //set max size allowed in Kilobyte
        $config['max_width']            = 500000; // set max width image allowed
        $config['max_height']           = 500000; // set max height allowed
        $config['file_name']            = round(microtime(true) * 1000); //just milisecond timestamp fot unique name
        $this->load->library('upload', $config);
        if(!$this->upload->do_upload('image')) //upload and validate
        {
            $data['inputerror'][] = 'image';
			$data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
			$data['status'] = FALSE;
			echo json_encode($data);
			exit();
		}
		return $this->upload->data('file_name');
	}
}
