<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('moneyformat'))
{
    function convert_to_currency_symbol($currency)
    {
        $symbols = array(
                'USD' => '&#36;',
                'AUD' => '&#36;',
                'IDR' => 'Rp',
            );
        
        return $symbols[$currency];
    }   
}