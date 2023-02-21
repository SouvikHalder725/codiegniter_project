<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Function_controller extends CI_Controller {

	public function __construct()
    {
            parent::__construct();


            $this->load->helper('url');          
            $this->load->model('Main_model');
	        $this->load->helper('url_helper');
	        $this->load->helper('form');
	        $this->load->library('form_validation');
	        $this->load->library('session');
	        
    }
    








}