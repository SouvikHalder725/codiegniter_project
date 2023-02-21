<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Folder_setting_controller extends CI_Controller{

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
    public function setting_bhasha_folder(){

          $dash_active['folder_set']=1;

            
          $this->load->view('header',$dash_active);
          $this->load->view('setting/folder_setting');
          $this->load->view('footer');


    }





}