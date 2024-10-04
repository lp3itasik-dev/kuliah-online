<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Models','m');
    }
	
	/**Function For Page**/
	
	public function index()
	{
		$data['title']='Example Simple CRUD CodeIgniter';
		$this->load->view('index',$data);
	}
	public function Login()
	{
		$data['title']='Page Login';
		$this->load->view('login',$data);
	}
	public function Crud1()
	{
		$select = $this->db->select('*,DATE_FORMAT(datetime,"%D %M %Y %H:%i:%s") as datetime, DAYNAME(datetime) as day');
		$data['read']=$this->m->Get_All('table1',$select);
		
		$data['title']='Page CRUD 1';
		$this->load->view('crud1',$data);
	}
	public function Crud2()
	{
		$select = $this->db->select('*,DATE_FORMAT(datetime,"%D %M %Y %H:%i:%s") as datetime, DAYNAME(datetime) as day');
		$data['read1']=$this->m->Get_All('table1',$select);
		
		$select = $this->db->join('table3','table3.id2=table2.id');
		$select = $this->db->select('*,DATE_FORMAT(datetime,"%Y-%m-%d") as date,DATE_FORMAT(datetime,"%H:%i") as time,DATE_FORMAT(datetime,"%D %M %Y %H:%i:%s") as datetime, DAYNAME(datetime) as day');
		$select = $this->db->select('table2.text as text, table2.number as number, table2.image as image');//use it if you have ambiguous field
		$select = $this->db->group_by('table2.id');
		$data['read2']=$this->m->Get_All('table2',$select);
		
		$data['title']='Page CRUD 2';
		$this->load->view('crud2',$data);
	}
	
	/**End Function For Page**/
	
	/**Function For Create Update And Delete**/
	
	function Create1()
	{
		$data=array(
			'text'		=>	$this->input->post('text'),
			'password'	=>	md5($this->input->post('text')),
			'number'	=>	$this->input->post('number'),
			'datetime'	=>	date('Y-m-d H:i:s'),
		);
		if(!empty($_FILES['image']['name']))
		{
			$path = 'assets/img/';
			$upload = $this->_do_upload($path);
			$data['image'] = $upload;
		}else{
			$data['image'] = "default.jpg";
		}
		
		$this->m->Save($data, 'table1');
		
		redirect('Crud/Crud1');
	}
	function Create2()
	{
		/**Insert To tbl_table2**/
		$data=array(
			'text'		=>	$this->input->post('text'),
			'number'	=>	$this->input->post('number'),
			'datetime'	=>	$this->input->post('date')." ".$this->input->post('time'),
		);
		if(!empty($_FILES['image']['name']))
		{
			$path = 'assets/img/';
			$upload = $this->_do_upload($path);
			$data['image'] = $upload;
		}else{
			$data['image'] = "default.jpg";
		}
		
		$this->m->Save($data, 'table2');
		/**End Insert To tbl_table2**/
		
		/**Looping Insert To tbl_table3**/
		$select = $this->db->select('max(id) as id');
		$read = $this->m->Get_All('table2', $select);
		$id = 0;
		foreach($read as $r){
			$id = $r->id;
		}
		foreach ($this->cart->contents() as $items) {
			$data=array(
				'id1'		=>	$items['id'],
				'id2'		=>	$id,
				'text'		=>	$items['text'],
				'number'	=>	$items['price'],
				'image'		=>	$items['image'],
				'qty'		=>	$items['qty'],
			);
			$this->m->Save($data, 'table3');
		}
		$this->cart->destroy();
		/**End Looping Insert To tbl_table3**/
		
		echo json_encode(array("status" => TRUE));
	}
	function Update1()
	{
		$table = 'table1';
		$where=array(
			'id'		=>	$this->input->post('id')
		);
		$data=array(
			'text'		=>	$this->input->post('text'),
			'password'	=>	md5($this->input->post('text')),
			'number'	=>	$this->input->post('number'),
			'datetime'	=>	date('Y-m-d H:i:s'),
		);
		if(!empty($_FILES['image']['name']))
		{
			$path = 'assets/img/';
			$upload = $this->_do_upload($path);
			$read = $this->m->Get_Where($where, $table);
			if(file_exists('assets/img/'.$read->image) && ($read->image != 'default.jpg'))
				unlink('assets/img/'.$read->image);
			$data['image'] = $upload;
		}
		
		$this->m->Update($where, $data, $table);
		
		redirect('Crud/Crud1');
	}
	function Update2()
	{
		$table = 'table2';
		$where=array(
			'id'		=>	$this->input->post('id')
		);
		$data=array(
			'text'		=>	$this->input->post('text'),
			'number'	=>	$this->input->post('number'),
			'datetime'	=>	date('Y-m-d H:i:s'),
		);
		if(!empty($_FILES['image']['name']))
		{
			$path = 'assets/img/';
			$upload = $this->_do_upload($path);
			$read = $this->m->Get_Where($where, $table);
			if(file_exists('assets/img/'.$read->image) && ($read->image != 'default.jpg'))
				unlink('assets/img/'.$read->image);
			$data['image'] = $upload;
		}
		
		$this->m->Update($where, $data, $table);
		
		redirect('Crud/Crud2');
	}
	function Update3()
	{
		$table = 'table3';
		$where=array(
			'id2'		=>	$this->input->post('id')
		);
		$read = $this->m->Get_Where($where, $table);
		
		foreach($read as $r){
			$where=array(
				'id1'		=>	$r->id1,
				'id2'		=>	$r->id2,
			);
			$data=array(
				'text'		=>	$this->input->post($r->id1),
			);
			
			$this->m->Update($where, $data, $table);
		}
		redirect('Crud/Crud2');
	}
	function Delete1()
	{
		$table = 'table1';
		$where=array(
			'id'		=>	$this->input->post('id')
		);
		$read = $this->m->Get_Where($where, $table);
		if(file_exists('assets/img/'.$read->gambar) && ($read->gambar != 'default.jpg'))
			unlink('assets/img/'.$read->gambar);
		
		$this->m->Delete($where, $table);
		
		redirect('Crud/Crud1');
	}
	function Delete2()
	{
		$table = 'table2';
		$where=array(
			'id'		=>	$this->input->post('id')
		);
		$read = $this->m->Get_Where($where, $table);
		if(file_exists('assets/img/'.$read->gambar) && ($read->gambar != 'default.jpg'))
			unlink('assets/img/'.$read->gambar);
		
		$this->m->Delete($where, $table);
		
		redirect('Crud/Crud2');
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
	
	function AddToCart(){
		$data = array(
			'id'	=> $this->input->post('id'), 
			'name'	=> $this->input->post('id'), 
			'text'	=> $this->input->post('text'), 
			'qty' => $this->input->post('qty'), 
			'price' => $this->input->post('number'), 
			'image' => $this->input->post('image'), 
		);
		$this->cart->insert($data);
	}
	function ShowCart(){ 
		$output = '';
		$no = 1;
		$save = "save-off";
		foreach ($this->cart->contents() as $items) {
			$save = "save";
			$output .='
					<tr>
						<td>'.$no++.'</td>
						<td>'.$items['text'].'</td>
						<td>$<input type="hidden" id="number'.$items['id'].'" value="'.$items['price'].'">'.number_format($items['price']).'</td>
						<td style="width:150px"><span id="qty_'.$items['id'].'" style="height:50px;padding-top:6px">'.$items['qty'].'</span> <a id="edit_'.$items['id'].'" name="'.$items['rowid'].'" class="fa fa-pencil text-success edit-cart" data-id="'.$items['id'].'"></a></td>
						<td><img width="50px" src="'.base_url().'assets/img/'.$items['image'].'"></td>
						<td>$<span id="subtotal'.$items['id'].'">'.number_format($items['subtotal']).'</span></td>';//subtotal is fuction from cart -> sum array price
				$output .='
						<td><center><button type="button" id="'.$items['rowid'].'" class="btn btn-sm btn-danger cancel-cart" data-id="'.$items['id'].'"><i class="fa fa-times"></i> Cancel</button></center></td>
					</tr>
					';
		}
		$output .= '
				<tr>
					<th colspan="5">Total</th>
					<th>$'.number_format($this->cart->total()).'</td>
					<td></td>
				</tr>
				<tr>
					<td colspan="6"></th>
					<td><button type="button" class="btn btn-success" id="'.$save.'"><i class="fa fa-check"></i> Check Out</button></td>
				</tr>
		';	
		
		echo $output;
	}
	function DeleteCart(){ //fungsi untuk menghapus item cart
		$data = array(
			'rowid' => $this->input->post('row_id'), 
			'qty' => 0, 
		);
		$this->cart->update($data);
	}
	function UpdateCart(){ //fungsi untuk menghapus item cart
		$data = array(
			'rowid' => $this->input->post('row_id'), 
			'qty' => $this->input->post('qty'), 
		);
		$this->cart->update($data);
	}
	function ShowDetail(){
		$where=array(
			'id2'		=>	$this->input->post('id')
		);
		$read = $this->m->Get_Where($where, 'table3');
		$output = '';
		$total = 0;
		$no = 1;
		foreach ($read as $r) {
			$total = $total + $r->number*$r->qty;
			$output .='
					<tr>
						<td>'.$no++.'</td>
						<td><input type="text" name="'.$r->id1.'" class="form-control" style="width:70px" value="'.$r->text.'"></td>
						<td>$'.number_format($r->number).'</td>
						<td style="width:150px">'.$r->qty.'</td>
						<td><img width="50px" src="'.base_url().'assets/img/'.$r->image.'"></td>
						<td>$'.number_format($r->number*$r->qty).'</td>';//subtotal is fuction from cart -> sum array price
				$output .='
					</tr>
					';
		}
		$output .= '
				<tr>
					<th colspan="5">Total</th>
					<th>$'.number_format($total).'</td>
				</tr>
		';	
		echo $output;
	}
	/**End Function For Create Update And Delete**/
}
