<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cmarket extends CI_Controller {
    
    public function index()
	{
	    $content = file_get_contents('https://api.coinmarketcap.com/v1/ticker/?limit=10');
		$result = json_decode($content, true);
		$params = array(
		    'content_view' => 'cmarket/index',
		    'cmarket_contents' => $result
		 );
		
		$this->load->view('main_template', $params);
	}
}