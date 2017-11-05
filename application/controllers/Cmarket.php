<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cmarket extends CI_Controller {
    
    private $default_limit = 100;
    private $default_currency = 'USD'; 
    
    private $currency_symbols = array(
                'USD' => '&#36;',
                'SGD' => 'S&#36;',
            );
            
    public function __construct() 
    {
        parent::__construct();
        $this->load->model('cmarket_model');
        $this->load->helper('form', 'currencyformat');
    }
    
    public function index()
	{
		$params = array(
		    'limit' => '100',
		    'currency_symbol' => $this->currency_symbols[$this->default_currency],
		    'currency' => $this->default_currency,
		    'content_view' => 'cmarket/index',
		    'cmarket_contents' => $this->cmarket_model->find_all($this->default_currency, $this->default_limit)
		 );
		
		$this->load->view('main_template', $params);
	}
	
	public function view() 
	{
	    $limit = $this->input->post('limit') != 'all' ? $this->input->post('limit') : NULL;
	    $currency = $this->input->post('currency');
		$params = array(
		    'limit' => $limit,
		    'currency_symbol' => $this->currency_symbols["SGD"],
		    'currency' => $currency,
		    'content_view' => 'cmarket/index',
		    'cmarket_contents' => $this->cmarket_model->find_all($currency, $limit)
		 );
		
		$this->load->view('main_template', $params);
	}
	
	public function show_view() 
	{
	    $params = array(
	        'content_view' => 'cmarket/show_view'
	    );
	    $this->load->view('main_template', $params);
	}
	
}