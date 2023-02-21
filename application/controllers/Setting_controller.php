<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setting_controller extends CI_Controller{

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
    public function index($id){
        if($this->session->userdata('user_id')!=""){

            if($id!=""){

                 $result['user_data']=$this->User_model->user_data($id); 
                 if($result){

                     $dash_active['ulist_set']=1;

            
                     $this->load->view('header',$dash_active);
                     $this->load->view('setting/index',$result);
                     $this->load->view('footer');
                 }else{

                     $this->session->set_flashdata('msg','User Data Not Availabale');
                     redirect('Welcome/userlist');
                 }
            }
        }else{

            $this->session->set_flashdata('msg_error','Please Login Now');
            redirect('Welcome/index', 'refresh');
        }
       

        
    }
    public function profile_setting(){
         if($this->session->userdata('user_id')!=""){

            if(isset($_POST['profile_submit'])){

                $this->form_validation->set_rules('id', 'id', 'required',array('required'=>'Your Firstname Is Required'));
                $this->form_validation->set_rules('name', 'name', 'required',array('required'=>'Your Firstname Is Required'));          
                $this->form_validation->set_rules('emp_id', 'emp_id', 'required',array('required'=>'Your Employee id is Required'));           
                $this->form_validation->set_rules('user_id', 'user_id', 'required',array('required'=>'Your User id Is Required'));
              
                $this->form_validation->run();


                if ($this->form_validation->run()==false) {

                    $this->session->set_flashdata('msg_error','Please Enter Valid Data');
                    $this->session->set_flashdata('errors', validation_errors());
                    redirect('Setting_controller/index/'.$_POST['id'].'');
                }
                else{

                    
                    $posted_id=$_POST['id'];
                    $posted_name=$_POST['name'];                           
                    $posted_emp_id=$_POST['emp_id'];                    
                    $posted_user_id=$_POST['user_id'];
                   

                    $data=array(

                        "id"=>"$posted_id",
                        "user_name"=>"$posted_name",
                        "emp_id"=>"$posted_emp_id",
                        "user_id"=>"$posted_user_id"
                        
                    );

                    $result=$this->User_model->profile_update($data);
                    if($result){ 

                        $this->session->set_flashdata('msg','User Updated Succesfully');
                        redirect('Welcome/userlist');
                    }
                    else{
                        $this->session->set_flashdata('msg_error','Not Updated,Error Occurred!');
                         redirect('Setting_controller/index/'.$posted_id.'');

                    }
                        
                }
            }
        }else{

            $this->session->set_flashdata('msg_error','Please Login Now');
            redirect('Welcome/index', 'refresh');

        }

        
    }
    public function password_setting(){
         if($this->session->userdata('user_id')!=""){

            if(isset($_POST['password_submit'])){
                $this->form_validation->set_rules('password_one', 'password_one', 'required',array('required'=>'Your Password is Required'));
                $this->form_validation->set_rules('password_two', 'password_two', 'required',array('required'=>'Your Confirm Password is Required'));

                if ($this->form_validation->run()==false) {

                    $this->session->set_flashdata('msg_error','Please Enter Valid Data');
                    $this->session->set_flashdata('errors', validation_errors());
                    redirect('Setting_controller/index/'.$_POST['id'].'');
                }
                else{

                    
                        $posted_id=$_POST['id'];                    
                        $posted_password_one=$_POST['password_one'];
                        $posted_password_two=$_POST['password_two'];

                        if($posted_password_one==$posted_password_two){

                            $data=array(
                                "password"=>"$posted_password_one"
                            );

                            $result=$this->User_model->password_update($data,$posted_id);
                            if($result){ 

                                $this->session->set_flashdata('msg','Password Updated Succesfully,Login Again');
                                redirect('Welcome/logout');
                            }
                            else{
                                $this->session->set_flashdata('msg_error','Not Updated,Error Occurred!');
                                 redirect('Setting_controller/index/'.$posted_id.'');

                            }
                        }else{
                            $this->session->set_flashdata('msg_error','Password 1 & Password 2 Not Matched');
                            redirect('Setting_controller/index/'.$posted_id.'');



                        }
                }
              
            }
        }else{

            $this->session->set_flashdata('msg_error','Please Login Now');
            redirect('Welcome/index', 'refresh');

        }
    
    }
    public function documentation(){
      $dash_active['docs_act']=1;

            
        $this->load->view('header',$dash_active);
        $this->load->view('doc_page/docs_index');
        $this->load->view('footer');



    }
    public function docs_page(){
       $dash_active['docs_act']=1;

            
        $this->load->view('header',$dash_active);
        $this->load->view('doc_page/docs-page');
        $this->load->view('footer');



    }
     
   




}