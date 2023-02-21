<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
    {
            parent::__construct();


            $this->load->helper('url');          
            $this->load->model('Main_model');
            $this->load->model('User_model');
	        $this->load->helper('url_helper');
	        $this->load->helper('form');
	        $this->load->library('form_validation');
	        $this->load->library('session');
	        
    }
    public function index(){

    	$this->load->view('login');
    }

    public function login(){



		$this->form_validation->set_rules('user_id', 'user_id', 'required',array('required'=>'Your User Id is Required'));
		$this->form_validation->set_rules('password', 'password', 'required',array('required'=>'Your Password Is Required'));
		$this->form_validation->run();



		if($this->form_validation->run()==false) {

			$this->session->set_flashdata('errors', validation_errors());
			$this->session->set_flashdata('msg_error','Please Enter Valid Data');

			
			$this->load->view('login');
			
			
		}
		else{

		    if($_POST['submit']){

		        $posted_user_id=$_POST['user_id'];
		    	$posted_password=$_POST['password'];


		    	$data=array(
		    		"user_id"=>"$posted_user_id",
		    		"password"=>"$posted_password"

		    	);


		    	$result=$this->User_model->user_login($data);

		    	if($result!=""){
		    		$this->User_model->login_update($data);
		    		
		            $this->session->set_userdata('id',$result->id);	
		            $this->session->set_userdata('user_name',$result->user_name);			       
					$this->session->set_userdata('user_id',$result->user_id);
					$this->session->set_userdata('emp_id',$result->emp_id);			       
					$this->session->set_userdata('emp_type',$result->emp_type);	
					$this->session->set_userdata('password',$result->password);
					
					
				

					$this->session->set_flashdata('msg','You Login Succesfully');
				    redirect('Welcome/dashboard');		    						  						   							
				}
				else{
					$this->session->set_flashdata('msg_error','Login Unsuccesfull');
				    redirect('Welcome/index');
				}
												
				
				                				               			
            }

		}



	}
	public function logout(){
	      $user_id=$this->session->userdata('user_id'); 
	      $password=$this->session->userdata('password'); 
		  $logout_up=$this->User_model->logout_update($user_id,$password);
		

		   $this->session->sess_destroy();

	       $this->load->view('login');




	}
	public function dashboard(){
		header("Refresh: 10;");
        $dash_active['dash_act']=1;

	    // $s['tw']=$value;
	    if($this->session->userdata('user_id')!=""){
		    $date['tw']=date('d-m-y');

		    if(!file_exists('document_uploads/'.$date['tw'].'/')){


	        	$dm=mkdir('document_uploads/'.$date['tw'].'/', 0777, true);
	        }
	        if(!file_exists('document_uploads/'.$date['tw'].'/PTI_BHASHA')){
				$dn=mkdir('document_uploads/'.$date['tw'].'/PTI_BHASHA', 0777, true);
					
			}
			if(!file_exists("document_uploads/".$date['tw'].'/PTI_ENG')){
				$do=mkdir('document_uploads/'.$date['tw'].'/PTI_ENG', 0777, true);
					
			}
			if(!file_exists("document_uploads/".$date['tw'].'/UNI_Varta')){
				$dp=mkdir('document_uploads/'.$date['tw'].'/UNI_Varta', 0777, true);
					
			}
			if(!file_exists("document_uploads/".$date['tw'].'/PTI_Photos')){
				$dq=mkdir('document_uploads/'.$date['tw'].'/PTI_Photos', 0777, true);
					
			}
			if(!file_exists("document_uploads/".$date['tw'].'/UNI_Photos')){
				$dr=mkdir('document_uploads/'.$date['tw'].'/UNI_Photos', 0777, true);
					
			}
			if(!file_exists("document_uploads/".$date['tw'].'/LOCAL_STORY')){
				$ds=mkdir('document_uploads/'.$date['tw'].'/LOCAL_STORY', 0777, true);
					
			}
			if(!file_exists("document_uploads/".$date['tw'].'/LOCAL_PHOTOS')){
				$dt=mkdir('document_uploads/'.$date['tw'].'/LOCAL_PHOTOS', 0777, true);
					
			}
			if(!file_exists("document_uploads/".$date['tw'].'/OTHER_NEWS')){
				$dt=mkdir('document_uploads/'.$date['tw'].'/OTHER_NEWS', 0777, true);
					
			}
			if(!file_exists("document_uploads/".$date['tw'].'/OTHER_PHOTOS')){
				$dt=mkdir('document_uploads/'.$date['tw'].'/OTHER_PHOTOS', 0777, true);
					
			}

			// for create picked folder


			if(!file_exists('document_uploads/picked/'.$date['tw'].'/')){


	        	$dm=mkdir('document_uploads/picked/'.$date['tw'].'/', 0777, true);
	        }
	        if(!file_exists('document_uploads/picked/'.$date['tw'].'/PTI_BHASHA')){
				$dn=mkdir('document_uploads/picked/'.$date['tw'].'/PTI_BHASHA', 0777, true);
					
			}
			if(!file_exists("document_uploads/picked/".$date['tw'].'/PTI_ENG')){
				$do=mkdir('document_uploads/picked/'.$date['tw'].'/PTI_ENG', 0777, true);
					
			}
			if(!file_exists("document_uploads/picked/".$date['tw'].'/UNI_Varta')){
				$dp=mkdir('document_uploads/picked/'.$date['tw'].'/UNI_Varta', 0777, true);
					
			}
			if(!file_exists("document_uploads/picked/".$date['tw'].'/PTI_Photos')){
				$dq=mkdir('document_uploads/picked/'.$date['tw'].'/PTI_Photos', 0777, true);
					
			}
			if(!file_exists("document_uploads/picked/".$date['tw'].'/UNI_Photos')){
				$dr=mkdir('document_uploads/picked/'.$date['tw'].'/UNI_Photos', 0777, true);
					
			}
			if(!file_exists("document_uploads/picked/".$date['tw'].'/LOCAL_STORY')){
				$ds=mkdir('document_uploads/picked/'.$date['tw'].'/LOCAL_STORY', 0777, true);
					
			}
			if(!file_exists("document_uploads/picked/".$date['tw'].'/LOCAL_PHOTOS')){
				$dt=mkdir('document_uploads/picked/'.$date['tw'].'/LOCAL_PHOTOS', 0777, true);
					
			}
			if(!file_exists("document_uploads/picked/".$date['tw'].'/OTHER_NEWS')){
				$dt=mkdir('document_uploads/picked/'.$date['tw'].'/OTHER_NEWS', 0777, true);
					
			}
			if(!file_exists("document_uploads/picked/".$date['tw'].'/OTHER_PHOTOS')){
				$dt=mkdir('document_uploads/picked/'.$date['tw'].'/OTHER_PHOTOS', 0777, true);
					
			}

		    


		   
    	
	        $this->load->view('header',$dash_active);
			$this->load->view('dashboard_news',$date);
			$this->load->view('footer');
		}else{
			$this->session->set_flashdata('msg_error','Please Login Now');
			redirect('Welcome/index', 'refresh');



		}



	}

	
	public function userlist()
	{		
		 if($this->session->userdata('user_id')!=""){
			if(isset($_POST['page_submit'])){
			    $page_no=$_POST['page'];
				$arr_start=($page_no-1)*4;
			}
			else{
				$page_no=1;
		    	$arr_start=0;
		    	
		    	
		    }

		   $result['user_list']=$this->User_model->user_list($arr_start); 
		   $result['user_number']=$this->User_model->user_number();
		   $result['user_no_login']=$this->User_model->user_no_login();
		   $result['arr_start']=$arr_start; 
		   $result['page_no']=$page_no;      

			$dash_active['ulist_set']=1;

            
            $this->load->view('header',$dash_active);
			$this->load->view('dashboard_page',$result);
			$this->load->view('footer');
		}else{
			$this->session->set_flashdata('msg_error','Please Login Now');
			redirect('Welcome/index', 'refresh');
		}
	}
	

   
 
	public function main()
	{
		$this->load->view('header');
		$this->load->view('dashboard_page');
		$this->load->view('footer');
	}

	public function user_ad(){
		if($this->session->userdata('user_id')!=""){

              $get_id=$this->User_model->get_id_no();           
			  $get_id++;
			  $new_get_id=$get_id;
			  $id['reg_id']=str_pad($new_get_id,3,"0",STR_PAD_LEFT);
			


	       $dash_active['ulist_set']=1;

            
            $this->load->view('header',$dash_active);
			$this->load->view('user_ad_form',$id);
			$this->load->view('footer');
		}else{
			$this->session->set_flashdata('msg_error','Please Login Now');
			redirect('Welcome/index', 'refresh');

		}
	}
	public function list_view(){

		$list['user_list']=$this->Main_model->list_view();
		
        $dash_active['ulist_set']=1;

            
        $this->load->view('header',$dash_active);
	    $this->load->view('dashboard_page',$list);
	    $this->load->view('footer');

		
	}
	public function add_user_operation(){

		$this->form_validation->set_rules('first_name', 'first_name', 'required',array('required'=>'Your Firstname Is Required'));
		$this->form_validation->set_rules('emp_id', 'emp_id', 'required',array('required'=>'Your Employee id is Required'));		
		$this->form_validation->set_rules('user_id', 'user_id', 'required',array('required'=>'Your User id Is Required'));
		$this->form_validation->set_rules('password', 'password', 'required',array('required'=>'Your Password is Required'));
		
		$this->form_validation->run();


		if ($this->form_validation->run()==false) {
			$this->session->set_flashdata('msg_error','Please Enter Valid Data');

			$this->session->set_flashdata('errors', validation_errors());

			redirect('Welcome/user_ad', 'refresh');
		}
		else{

		    if($_POST['submit']){

		    	$first_name=$_POST['first_name'];		    			    	
		    	$emp_id=$_POST['emp_id'];		    	
		    	$user_id=$_POST['user_id'];		    	
		    	$user_password=$_POST['password'];



		    	$data=array(
                   "user_name"=>"$first_name",
                   "emp_id"=>"$emp_id",
                   "user_id"=>"$user_id",                
                   "password"=>"$user_password"

		    	);

		    	$result=$this->User_model->user_ad($data);
		    	if($result){

					$this->session->set_flashdata('msg','New User Added Succesfully');
		    	    redirect('Welcome/dashboard', 'refresh');

		        }
		        else{
		        	$this->session->set_flashdata('msg_error','User Name Allready Exist,Change Diffrent');
		    	    redirect('Welcome/user_ad', 'refresh');


		        }
			   
		    		

		    }

		}


	}
	public function pti_download($date,$file_name){
           $this->load->helper('download');
       
 
            if(file_exists('document_uploads/'.$date.'/PTI_Photos/'.$file_name.'')){

                $path=base_url().'document_uploads/'.$date.'/PTI_Photos/'.$file_name.'';
                // $data = file_get_contents($path);
                force_download('document_uploads/'.$date.'/PTI_Photos/'.$file_name.'',null);
            }else{
                $this->session->set_flashdata('msg_error','File Can not Download,Try again.');
                redirect('Mywork_controller/my_pick_all_folder');

               

            }
    }

    public function uni_download($date,$file_name){

            $this->load->helper('download');
      
            if(file_exists('document_uploads/'.$date.'/UNI_Photos/'.$file_name.'')){

                $path=base_url().'document_uploads/'.$date.'/UNI_Photos/'.$file_name.'';
                // $data = file_get_contents($path);
                force_download('document_uploads/'.$date.'/UNI_Photos/'.$file_name.'',null);
            }else{
                $this->session->set_flashdata('msg_error','File Can not Download,Try again.');
                redirect('Mywork_controller/my_pick_all_folder');

               

            }
            
    }
    public function local_photo_download($date,$file_name){

            $this->load->helper('download');
      
            if(file_exists('document_uploads/'.$date.'/LOCAL_PHOTOS/'.$file_name.'')){

                $path=base_url().'document_uploads/'.$date.'/LOCAL_PHOTOS/'.$file_name.'';
                // $data = file_get_contents($path);
                force_download('document_uploads/'.$date.'/LOCAL_PHOTOS/'.$file_name.'',null);
            }else{
                $this->session->set_flashdata('msg_error','File Can not Download,Try again.');
                redirect('Mywork_controller/my_pick_all_folder');

               

            }
            
    }



	
	
	
}
