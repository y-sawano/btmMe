<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends MY_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		//load mapper
		$this->load->model('m_area_mapper');
		//create insert data
		$data = array(
					'area_name' => '北海道'
				);
		//insert
		if (!$this->m_area_mapper->ins($data)) {
			throw new Exception();
		}
		//select
		$hoge = $this->m_area_mapper->findQuery('select * from m_area');
		echo '<pre>';
		echo var_dump($hoge);
		echo '</pre>';
		exit;
// 		$this->load->view('index', $data);
	}
}