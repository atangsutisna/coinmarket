<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cmarket_model extends CI_Model {
    
    private $base_uri = "https://api.coinmarketcap.com/v1/ticker/";    
    
    public function __construct() 
    {
            parent::__construct();
    }
    
    public function find_all($currency = 'USD', $limit) 
    {
        $uri = $this->base_uri. '?convert='. $currency;
        
        if ($limit != null || $limit != NULL) {
            $uri .= '&limit='. $limit;
        }
        
        $content = file_get_contents($uri);
		return json_decode($content, true);
    }
    
    public function find_one($id, $currency) 
    {
        $currencies = $this->find_all($currency, 'all');
        foreach ($currencies as $currency) {
            if ($currency['id'] == $id) {
                return $currency;
            }
        }
        
        return null;
    }

}
