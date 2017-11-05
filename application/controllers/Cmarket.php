<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cmarket extends CI_Controller {
    
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('cmarket_model');
    }
    
    public function index()
	{
		$params = array(
		    'content_view' => 'cmarket/index',
		    'cmarket_contents' => $this->cmarket_model->find_all('USD', 5)
		 );
		
		$this->load->view('main_template', $params);
	}
}