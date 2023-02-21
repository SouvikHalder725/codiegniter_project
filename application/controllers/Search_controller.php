<?php
defined('BASEPATH') or exit('No direct script access allowed');
   

class Search_controller extends CI_Controller{

	public function __construct()
    {
            parent::__construct();

            $this->load->helper('url');          
            $this->load->model('Local_model');
            $this->load->model('Search_model');
	        $this->load->helper('url_helper');
	        $this->load->helper('form');
	        $this->load->library('form_validation');
	        $this->load->library('session');
	        
    }
    public function pti_search(){
    	if($this->session->userdata('user_id')!=""){
    		if(isset($_POST['search_news_button'])){
    			$search_news_subject=$_POST['search_news_subject'];
    			if($search_news_subject!=""){
			
					$get_file['file_name']=$this->Search_model->get_pti_bhasha_search($search_news_subject);
					$get_file_no=$this->Search_model->pti_bhasha_file_no($search_news_subject);
				   
					$dash_active['pti_bhasha_act']=1;
					if($get_file_no>0){

		    		
				        $this->load->view('header',$dash_active);
						$this->load->view('search/pti_bhasha_search',$get_file);
						$this->load->view('footer');
					}
					else{
						$this->session->set_flashdata('msg_error','No Search Result Found');
				        redirect('File_controller/pti_bhasha', 'refresh');
					}
				}
				else{
					$this->session->set_flashdata('msg_error','Invalid Search');
			        redirect('File_controller/pti_bhasha', 'refresh');
				}
			}
		}else{

            $this->session->set_flashdata('msg_error','Please Login Now');
			redirect('Welcome/index', 'refresh');
		}
    }
    public function pti_english_search(){
    	if($this->session->userdata('user_id')!=""){
    		if(isset($_POST['search_news_button'])){
    			$search_news_subject=$_POST['search_news_subject'];
    			if($search_news_subject!=""){
			
					$get_file['file_name']=$this->Search_model->get_pti_english_search($search_news_subject);
					$get_file_no=$this->Search_model->pti_english_file_no($search_news_subject);
				   
					$dash_active['pti_eng_act']=1;
					if($get_file_no>0){

		    		
				        $this->load->view('header',$dash_active);
						$this->load->view('search/pti_english_search',$get_file);
						$this->load->view('footer');
					}
					else{
						$this->session->set_flashdata('msg_error','No Search Result Found');
				        redirect('File_controller/pti_english', 'refresh');
					}
				}
				else{
					$this->session->set_flashdata('msg_error','Invalid Search');
			        redirect('File_controller/pti_english', 'refresh');
				}
			}
		}else{

            $this->session->set_flashdata('msg_error','Please Login Now');
			redirect('Welcome/index', 'refresh');
		}
    }
    public function uni_varta_search(){
    	if($this->session->userdata('user_id')!=""){
    		if(isset($_POST['search_news_button'])){
    			$search_news_subject=$_POST['search_news_subject'];
    			if($search_news_subject!=""){
			
					$get_file['file_name']=$this->Search_model->get_uni_varta_search($search_news_subject);
					$get_file_no=$this->Search_model->uni_varta_file_no($search_news_subject);
				   
					$dash_active['uni_varta_act']=1;
					if($get_file_no>0){

		    		
				        $this->load->view('header',$dash_active);
						$this->load->view('search/uni_varta_search',$get_file);
						$this->load->view('footer');
					}
					else{
						$this->session->set_flashdata('msg_error','No Search Result Found');
				        redirect('File_controller/uni_varta', 'refresh');
					}
				}
				else{
					$this->session->set_flashdata('msg_error','Invalid Search');
			        redirect('File_controller/uni_varta', 'refresh');
				}
			}
		}else{

            $this->session->set_flashdata('msg_error','Please Login Now');
			redirect('Welcome/index', 'refresh');
		}
    }
    public function local_news_search(){
    	if($this->session->userdata('user_id')!=""){
    		if(isset($_POST['search_news_button'])){
    			$search_news_subject=$_POST['search_news_subject'];
    			if($search_news_subject!=""){
			
					$get_file['file_name']=$this->Search_model->get_local_news_search($search_news_subject);
					$get_file_no=$this->Search_model->local_news_file_no($search_news_subject);
				   
					$dash_active['local_story_act']=1;
					if($get_file_no>0){

		    		
				        $this->load->view('header',$dash_active);
						$this->load->view('search/local_news_search',$get_file);
						$this->load->view('footer');
					}
					else{
						$this->session->set_flashdata('msg_error','No Search Result Found');
				        redirect('Local_controller/own_local_story', 'refresh');
					}
				}
				else{
					$this->session->set_flashdata('msg_error','Invalid Search');
			        redirect('Local_controller/own_local_story', 'refresh');
				}
			}
		}else{

            $this->session->set_flashdata('msg_error','Please Login Now');
			redirect('Welcome/index', 'refresh');
		}
    }
    public function other_news_search(){
    	if($this->session->userdata('user_id')!=""){
    		if(isset($_POST['search_news_button'])){
    			$search_news_subject=$_POST['search_news_subject'];
    			if($search_news_subject!=""){
			
					$get_file['file_name']=$this->Search_model->get_other_news_search($search_news_subject);
					$get_file_no=$this->Search_model->other_news_file_no($search_news_subject);
				   
					$dash_active['bengali_story_act']=1;
					if($get_file_no>0){

		    		
				        $this->load->view('header',$dash_active);
						$this->load->view('search/other_news_search',$get_file);
						$this->load->view('footer');
					}
					else{
						$this->session->set_flashdata('msg_error','No Search Result Found');
				        redirect('Bengali_controller/other_news', 'refresh');
					}
				}
				else{
					$this->session->set_flashdata('msg_error','Invalid Search');
			        redirect('Bengali_controller/other_news', 'refresh');
				}
			}
		}else{

            $this->session->set_flashdata('msg_error','Please Login Now');
			redirect('Welcome/index', 'refresh');
		}
    }
    public function pti_photos_search(){
    	if($this->session->userdata('user_id')!=""){
    		if(isset($_POST['search_news_button'])){
    			$search_news_subject=$_POST['search_news_subject'];
    			if($search_news_subject!=""){
			
					$get_file['file_name']=$this->Search_model->get_pti_photos_search($search_news_subject);
					$get_file_no=$this->Search_model->pti_photos_file_no($search_news_subject);
				   
					$dash_active['pti_photos_act']=1;
					if($get_file_no>0){

		    		
				        $this->load->view('header',$dash_active);
						$this->load->view('search/pti_photos_search',$get_file);
						$this->load->view('footer');
					}
					else{
						$this->session->set_flashdata('msg_error','No Search Result Found');
				        redirect('File_controller/pti_photos', 'refresh');
					}
				}
				else{
					$this->session->set_flashdata('msg_error','Invalid Search');
			        redirect('File_controller/pti_photos', 'refresh');
				}
			}
		}else{

            $this->session->set_flashdata('msg_error','Please Login Now');
			redirect('Welcome/index', 'refresh');
		}
    }
     public function uni_photos_search(){
    	if($this->session->userdata('user_id')!=""){
    		if(isset($_POST['search_news_button'])){
    			$search_news_subject=$_POST['search_news_subject'];
    			if($search_news_subject!=""){
			
					$get_file['file_name']=$this->Search_model->get_uni_photos_search($search_news_subject);
					$get_file_no=$this->Search_model->uni_photos_file_no($search_news_subject);
				   
					$dash_active['uni_photos_act']=1;
					if($get_file_no>0){

		    		
				        $this->load->view('header',$dash_active);
						$this->load->view('search/uni_photos_search',$get_file);
						$this->load->view('footer');
					}
					else{
						$this->session->set_flashdata('msg_error','No Search Result Found');
				        redirect('File_controller/uni_photos', 'refresh');
					}
				}
				else{
					$this->session->set_flashdata('msg_error','Invalid Search');
			        redirect('File_controller/uni_photos', 'refresh');
				}
			}
		}else{

            $this->session->set_flashdata('msg_error','Please Login Now');
			redirect('Welcome/index', 'refresh');
		}
    }
     public function other_photos_search(){
    	if($this->session->userdata('user_id')!=""){
    		if(isset($_POST['search_news_button'])){
    			$search_news_subject=$_POST['search_news_subject'];
    			if($search_news_subject!=""){
			
					$get_file['file_name']=$this->Search_model->get_other_photos_search($search_news_subject);
					$get_file_no=$this->Search_model->other_photos_file_no($search_news_subject);
				   
					$dash_active['bengali_photos_act']=1;
					if($get_file_no>0){

		    		
				        $this->load->view('header',$dash_active);
						$this->load->view('search/other_photos_search',$get_file);
						$this->load->view('footer');
					}
					else{
						$this->session->set_flashdata('msg_error','No Search Result Found');
				        redirect('Bengali_controller/other_photos', 'refresh');
					}
				}
				else{
					$this->session->set_flashdata('msg_error','Invalid Search');
			        redirect('Bengali_controller/other_photos', 'refresh');
				}
			}
		}else{

            $this->session->set_flashdata('msg_error','Please Login Now');
			redirect('Welcome/index', 'refresh');
		}
    }
    public function local_photos_search(){
    	if($this->session->userdata('user_id')!=""){
    		if(isset($_POST['search_news_button'])){
    			$search_news_subject=$_POST['search_news_subject'];
    			if($search_news_subject!=""){
			
					$get_file['file_name']=$this->Search_model->get_local_photos_search($search_news_subject);
					$get_file_no=$this->Search_model->local_photos_file_no($search_news_subject);
				   
					$dash_active['local_photo_act']=1;
					if($get_file_no>0){

		    		
				        $this->load->view('header',$dash_active);
						$this->load->view('search/local_photos_search',$get_file);
						$this->load->view('footer');
					}
					else{
						$this->session->set_flashdata('msg_error','No Search Result Found');
				        redirect('Local_controller/own_local_photos', 'refresh');
					}
				}
				else{
					$this->session->set_flashdata('msg_error','Invalid Search');
			        redirect('Local_controller/own_local_photos', 'refresh');
				}
			}
		}else{

            $this->session->set_flashdata('msg_error','Please Login Now');
			redirect('Welcome/index', 'refresh');
		}
    }
    public function archive_search(){
    	if($this->session->userdata('user_id')!=""){
    		if(isset($_POST['search_news_button'])){
    			$search_news_subject=$_POST['search_news_subject'];
    			if($search_news_subject!=""){
    				$new_date=date('d-m-y',strtotime($search_news_subject));

			
					 $dash_active['archive_act']=1;
					 $dash_active['search_news_subject']=$new_date;

			        $this->load->view('header',$dash_active);
					$this->load->view('search/archives_search',$dash_active);
					$this->load->view('footer');
				}
				else{
					$this->session->set_flashdata('msg_error','Invalid Search');
			        redirect('Mywork_controller/all_folder', 'refresh');
				}
			}
		}else{

            $this->session->set_flashdata('msg_error','Please Login Now');
			redirect('Welcome/index', 'refresh');
		}
    }




}
?>