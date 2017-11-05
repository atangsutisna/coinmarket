<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cmarket extends CI_Controller {
    
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('cmarket_model');
    }
    
    public function index($limit)
	{
	    $limit = isset($limit) ? $limit : null;
	    $currency = isset($currency) ? $currency : 'USD';
		$params = array(
		    'content_view' => 'cmarket/index',
		    'cmarket_contents' => $this->cmarket_model->find_all($currency, $limit)
		 );
		
		$this->load->view('main_template', $params);
	}
}