<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mywork_controller extends CI_Controller{

	public function __construct()
    {
            parent::__construct();


            $this->load->helper('url');          
            $this->load->model('New_model');
             $this->load->model('Bengali_model');
            $this->load->model('Local_model');
	        $this->load->helper('url_helper');
	        $this->load->helper('form');
	        $this->load->library('form_validation');
	        $this->load->library('session');
	        
    }



    // for all archives news folder list

    public function my_work(){
    	if($this->session->userdata('user_id')!=""){
    		

	    	if(isset($_POST['pti_bhasha_page'])){
			    $page_no=$_POST['page_no'];
				$arr_start=($page_no-1)*5;
			}
			else{

		    	$arr_start=0;
		    	$page_no=1;
		    	
		    }

		    $get_file['file_name']=$this->New_model->get_pti_bhasha_pick_file($arr_start);
		    $get_file['file_number']=$this->New_model->pti_bhasha_pick_file_no();
		    $get_file['page_number']=$page_no;

	    	$this->load->view('header');
			$this->load->view('mywork/my_work',$get_file);
			$this->load->view('footer');
		}else{
			$this->session->set_flashdata('msg_error','Please Login Now');
			redirect('Welcome/index', 'refresh');


		}

    }
    public function all_folder(){
    	 if($this->session->userdata('user_id')!=""){
    	 	 $dash_active['archive_act']=1;

	        $this->load->view('header',$dash_active);
			$this->load->view('mywork/all_folder');
			$this->load->view('footer');
		}else{
			$this->session->set_flashdata('msg_error','Please Login Now');
			redirect('Welcome/index', 'refresh');




		}

    }
 



    // all categor folder of date wise news in archives Page

    public function all_category_folder($value){
    	$s['tw']=$value;

    	if($this->session->userdata('user_id')!=""){
	       $dash_active['archive_act']=1;

	        $this->load->view('header',$dash_active);
			$this->load->view('mywork/all_category_folder',$s);
			$this->load->view('footer');
		}else{
			$this->session->set_flashdata('msg_error','Please Login Now');
			redirect('Welcome/index', 'refresh');



		}

    }
    public function PTI_BHASHA_archive_news($tw){
    	if($this->session->userdata('user_id')!=""){
	    	// $result=scandir('document_uploads/'.$tw.'/PTI_BHASHA');
	    	// foreach($result as  $value1){
	    		// if($value1==$value){

			$result['file_name']=$this->New_model->get_pti_bhasha_file_by_date($tw);
			$result['file_number']=$this->New_model->pti_bhasha_file_no($tw);
			$result['this_date']=$tw;
           
            $dash_active['archive_act']=1;

	        $this->load->view('header',$dash_active);
	        $this->load->view('mywork/pti_bhasha_by_date_folder',$result);
	        $this->load->view('footer');
	    		// }
	    	//}
	    }else{

           $this->session->set_flashdata('msg_error','Please Login Now');
			redirect('Welcome/index', 'refresh');

	    }
    }
    public function PTI_ENG_archive_news($tw){
    	if($this->session->userdata('user_id')!=""){
	    	

			$result['file_name']=$this->New_model->get_pti_english_file_by_date($tw);
			$result['file_number']=$this->New_model->pti_english_file_no($tw);
			$result['this_date']=$tw;
         
            $dash_active['archive_act']=1;

	        $this->load->view('header',$dash_active);
	        $this->load->view('mywork/pti_english_by_date_folder',$result);
	        $this->load->view('footer');
	    		
	    }else{

           $this->session->set_flashdata('msg_error','Please Login Now');
			redirect('Welcome/index', 'refresh');

	    }
    }
    public function UNI_Varta_archive_news($tw){
    	if($this->session->userdata('user_id')!=""){


			$result['file_name']=$this->New_model->get_uni_varta_file_by_date($tw);
			$result['file_number']=$this->New_model->uni_varta_file_no($tw);
			$result['this_date']=$tw;
         
             $dash_active['archive_act']=1;

	        $this->load->view('header',$dash_active);
	        $this->load->view('mywork/uni_varta_by_date_folder',$result);
	        $this->load->view('footer');
	    	
	    }else{

           $this->session->set_flashdata('msg_error','Please Login Now');
			redirect('Welcome/index', 'refresh');

	    }
    }
    public function  PTI_Photos_archive_news($tw){
    	if($this->session->userdata('user_id')!=""){
    		    	
			$result['file_name']=$this->New_model->get_pti_photos_file_by_date($tw);
			$result['file_number']=$this->New_model->pti_photos_file_no($tw);
			$result['this_date']=$tw;
         
            $dash_active['archive_act']=1;

	        $this->load->view('header',$dash_active);
	        $this->load->view('mywork/pti_photos_by_date_folder',$result);
	        $this->load->view('footer');
	    		
	    }else{

           $this->session->set_flashdata('msg_error','Please Login Now');
			redirect('Welcome/index', 'refresh');

	    }
    }
    public function UNI_Photos_archive_news($tw){
    	if($this->session->userdata('user_id')!=""){
    		    	
			$result['file_name']=$this->New_model->get_uni_photos_file_by_date($tw);
			$result['file_number']=$this->New_model->uni_photos_file_no($tw);
			$result['this_date']=$tw;
	     
	         $dash_active['archive_act']=1;

	        $this->load->view('header',$dash_active);
	        $this->load->view('mywork/uni_photos_by_date_folder',$result);
	        $this->load->view('footer');
	    		
	    }else{
           $this->session->set_flashdata('msg_error','Please Login Now');
			redirect('Welcome/index', 'refresh');


	    }
    }
   
    public function LOCAL_PHOTOS_archive_news($tw){
    	if($this->session->userdata('user_id')!=""){
    		    	
			$result['file_name']=$this->Local_model->get_local_photos_file_by_date($tw);
			// $result['file_number']=$this->New_model->uni_photos_file_no($tw);
			$result['this_date']=$tw;
	     
	         $dash_active['archive_act']=1;

	        $this->load->view('header',$dash_active);
	        $this->load->view('mywork/local_photos_by_date_folder',$result);
	        $this->load->view('footer');
	    		
	    }else{
           $this->session->set_flashdata('msg_error','Please Login Now');
			redirect('Welcome/index', 'refresh');


	    }
    }
    public function LOCAL_STORY_archive_news($tw){
    	if($this->session->userdata('user_id')!=""){
	    	

			$result['file_name']=$this->Local_model->get_local_story_file_by_date($tw);
			// $result['file_number']=$this->New_model->pti_bhasha_file_no($tw);
			$result['this_date']=$tw;
           
            $dash_active['archive_act']=1;

	        $this->load->view('header',$dash_active);
	        $this->load->view('mywork/local_story_by_date_folder',$result);
	        $this->load->view('footer');
	    		
	    }else{

           $this->session->set_flashdata('msg_error','Please Login Now');
			redirect('Welcome/index', 'refresh');

	    }
    }
    public function OTHER_NEWS_archive_news($tw){
    	if($this->session->userdata('user_id')!=""){


			$result['file_name']=$this->Bengali_model->get_other_news_file_by_date($tw);
			$result['file_number']=$this->Bengali_model->other_news_file_no($tw);
			$result['this_date']=$tw;
         
             $dash_active['archive_act']=1;

	        $this->load->view('header',$dash_active);
	        $this->load->view('mywork/other_news_by_date_folder',$result);
	        $this->load->view('footer');
	    	
	    }else{

           $this->session->set_flashdata('msg_error','Please Login Now');
			redirect('Welcome/index', 'refresh');

	    }
    }
    public function  OTHER_PHOTOS_archive_news($tw){
    	if($this->session->userdata('user_id')!=""){
    		    	
			$result['file_name']=$this->Bengali_model->get_other_photos_file_by_date($tw);
			$result['file_number']=$this->Bengali_model->other_photos_file_no($tw);
			$result['this_date']=$tw;
         
            $dash_active['archive_act']=1;

	        $this->load->view('header',$dash_active);
	        $this->load->view('mywork/other_photos_by_date_folder',$result);
	        $this->load->view('footer');
	    		
	    }else{

           $this->session->set_flashdata('msg_error','Please Login Now');
			redirect('Welcome/index', 'refresh');

	    }
    }



// All news category news folder on dashboard page for todays news

    public function PTI_BHASHA_dashboard_news($tw){
    	if($this->session->userdata('user_id')!=""){
	    	// $result=scandir('document_uploads/'.$tw.'/PTI_BHASHA');
	    	// foreach($result as  $value1){
	    		// if($value1==$value){

			$result['file_name']=$this->New_model->get_pti_bhasha_file_by_date($tw);
			$result['file_number']=$this->New_model->pti_bhasha_file_no($tw);
			$result['this_date']=$tw;

			$dash_active['dash_act']=1;
           
            $this->load->view('header',$dash_active);
	        $this->load->view('dashboard_news/pti_bhasha_dash',$result);
	        $this->load->view('footer');
	    		// }
	    	//}
	    }else{

           $this->session->set_flashdata('msg_error','Please Login Now');
			redirect('Welcome/index', 'refresh');

	    }
    }
    public function PTI_ENG_dashboard_news($tw){
    	if($this->session->userdata('user_id')!=""){
	    	

			$result['file_name']=$this->New_model->get_pti_english_file_by_date($tw);
			$result['file_number']=$this->New_model->pti_english_file_no($tw);
			$result['this_date']=$tw;
         
           $dash_active['dash_act']=1;
           
            $this->load->view('header',$dash_active);
	        $this->load->view('dashboard_news/pti_english',$result);
	        $this->load->view('footer');
	    		
	    }else{

           $this->session->set_flashdata('msg_error','Please Login Now');
			redirect('Welcome/index', 'refresh');

	    }
    }
    public function UNI_Varta_dashboard_news($tw){
    	if($this->session->userdata('user_id')!=""){


			$result['file_name']=$this->New_model->get_uni_varta_file_by_date($tw);
			$result['file_number']=$this->New_model->uni_varta_file_no($tw);
			$result['this_date']=$tw;
         
           $dash_active['dash_act']=1;
           
            $this->load->view('header',$dash_active);
	        $this->load->view('dashboard_news/uni_varta',$result);
	        $this->load->view('footer');
	    	
	    }else{

           $this->session->set_flashdata('msg_error','Please Login Now');
			redirect('Welcome/index', 'refresh');

	    }
    }
    public function  PTI_Photos_dashboard_news($tw){
    	if($this->session->userdata('user_id')!=""){
    		    	
			$result['file_name']=$this->New_model->get_pti_photos_file_by_date($tw);
			$result['file_number']=$this->New_model->pti_photos_file_no($tw);
			$result['this_date']=$tw;
         
           $dash_active['dash_act']=1;
           
            $this->load->view('header',$dash_active);
	        $this->load->view('dashboard_news/pti_photos',$result);
	        $this->load->view('footer');
	    		
	    }else{

           $this->session->set_flashdata('msg_error','Please Login Now');
			redirect('Welcome/index', 'refresh');

	    }
    }
    public function UNI_Photos_dashboard_news($tw){
    	if($this->session->userdata('user_id')!=""){
    		    	
			$result['file_name']=$this->New_model->get_uni_photos_file_by_date($tw);
			$result['file_number']=$this->New_model->uni_photos_file_no($tw);
			$result['this_date']=$tw;
	     
	       $dash_active['dash_act']=1;
           
            $this->load->view('header',$dash_active);
	        $this->load->view('dashboard_news/uni_photos',$result);
	        $this->load->view('footer');
	    		
	    }else{
           $this->session->set_flashdata('msg_error','Please Login Now');
			redirect('Welcome/index', 'refresh');


	    }
    }

     public function LOCAL_STORY_dashboard_news($tw){
    	if($this->session->userdata('user_id')!=""){
    		    		    	
			$result['file_name']=$this->Local_model->get_local_story_file_by_date($tw);
			// $result['file_number']=$this->New_model->uni_photos_file_no($tw);
			$result['this_date']=$tw;


			
	     
	       $dash_active['dash_act']=1;
           
            $this->load->view('header',$dash_active);
	        $this->load->view('local/local_news',$result);
	        $this->load->view('footer');
	    		
	    }else{
           $this->session->set_flashdata('msg_error','Please Login Now');
			redirect('Welcome/index', 'refresh');


	    }
    }


    public function LOCAL_PHOTOS_dashboard_news($tw){
    	if($this->session->userdata('user_id')!=""){
    		    	
			$result['file_name']=$this->Local_model->get_local_photos_file_by_date($tw);
			// $result['file_number']=$this->New_model->uni_photos_file_no($tw);
			$result['this_date']=$tw;
	     
	        $dash_active['dash_act']=1;
           
            $this->load->view('header',$dash_active);
	        $this->load->view('local/local_photos',$result);
	        $this->load->view('footer');
	    		
	    }else{
           $this->session->set_flashdata('msg_error','Please Login Now');
			redirect('Welcome/index', 'refresh');


	    }
    }

     public function OTHER_PHOTOS_dashboard_news($tw){
    	if($this->session->userdata('user_id')!=""){
    		    	
			$result['file_name']=$this->Bengali_model->get_other_photos_file_by_date($tw);
			$result['file_number']=$this->Bengali_model->other_photos_file_no($tw);
			$result['this_date']=$tw;
	     
	       $dash_active['dash_act']=1;
           
            $this->load->view('header',$dash_active);
	        $this->load->view('dashboard_news/other_photos',$result);
	        $this->load->view('footer');
	    		
	    }else{
           $this->session->set_flashdata('msg_error','Please Login Now');
			redirect('Welcome/index', 'refresh');


	    }
    }
    public function OTHER_NEWS_dashboard_news($tw){
    	if($this->session->userdata('user_id')!=""){


			$result['file_name']=$this->Bengali_model->get_other_news_file_by_date($tw);
			$result['file_number']=$this->Bengali_model->other_news_file_no($tw);
			$result['this_date']=$tw;
         
           $dash_active['dash_act']=1;
           
            $this->load->view('header',$dash_active);
	        $this->load->view('dashboard_news/other_news',$result);
	        $this->load->view('footer');
	    	
	    }else{

           $this->session->set_flashdata('msg_error','Please Login Now');
			redirect('Welcome/index', 'refresh');

	    }
    }

    



    // all date folder  of my pick or mywork  list

    public function my_pick_all_folder(){
    	if($this->session->userdata('user_id')!=""){
    		$dash_active['mypick_act']=1;

    		
	        $this->load->view('header',$dash_active);
			$this->load->view('my_pick/my_pick_all_folder');
			$this->load->view('footer');
		}else{
			$this->session->set_flashdata('msg_error','Please Login Now');
			redirect('Welcome/index', 'refresh');



		}

    }

    // all news category list of my pick folder 
    public function my_pick_news_folder($value){
    	$s['tw']=$value;

    	if($this->session->userdata('user_id')!=""){
	       $dash_active['mypick_act']=1;

    		
	        $this->load->view('header',$dash_active);
			$this->load->view('my_pick/my_pick_news_folder',$s);
			$this->load->view('footer');
		}else{
			$this->session->set_flashdata('msg_error','Please Login Now');
			redirect('Welcome/index', 'refresh');



		}
	}
	




	// all news category news folder in mypick or mywork  list

    public function PTI_BHASHA_pick_news($tw){
    	if($this->session->userdata('user_id')!=""){
	    	

			$result['file_name']=$this->New_model->get_pti_bhasha_file_by_date($tw);
			$result['file_number']=$this->New_model->pti_bhasha_file_no($tw);
			$result['this_date']=$tw;
	       
	       $dash_active['mypick_act']=1;
	       $dash_active['bhasha_act']=1;
	       $dash_active['news']=1;

    		
	        $this->load->view('header',$dash_active);
	        $this->load->view('my_pick/pti_bhasha_pick_news',$result);
	        $this->load->view('footer');
	    	
	    }else{

            $this->session->set_flashdata('msg_error','Please Login Now');
			redirect('Welcome/index', 'refresh');

	    }
    }

    public function PTI_ENG_pick_news($tw){
    	if($this->session->userdata('user_id')!=""){
	    	

			$result['file_name']=$this->New_model->get_pti_english_file_by_date($tw);
			$result['file_number']=$this->New_model->pti_english_file_no($tw);
			$result['this_date']=$tw;
         
            $dash_active['mypick_act']=1;
            $dash_active['english_act']=2;
               $dash_active['news']=1;

    		
	        $this->load->view('header',$dash_active);
	        $this->load->view('my_pick/pti_english_pick_news',$result);
	        $this->load->view('footer');
	    		
	    }else{

            $this->session->set_flashdata('msg_error','Please Login Now');
			redirect('Welcome/index', 'refresh');

	    }
    }
    public function UNI_Varta_pick_news($tw){
    	if($this->session->userdata('user_id')!=""){

	    	

			$result['file_name']=$this->New_model->get_uni_varta_file_by_date($tw);
			$result['file_number']=$this->New_model->uni_varta_file_no($tw);
			$result['this_date']=$tw;
         
           $dash_active['mypick_act']=1;
            $dash_active['varta_act']=3;
               $dash_active['news']=1;

    		
	        $this->load->view('header',$dash_active);
	        $this->load->view('my_pick/uni_varta_pick_news',$result);
	        $this->load->view('footer');
	    		
	    }else{

            $this->session->set_flashdata('msg_error','Please Login Now');
			redirect('Welcome/index', 'refresh');

	    }
    }
    public function  PTI_Photos_pick_news($tw){
    	if($this->session->userdata('user_id')!=""){
    	
	    	

			$result['file_name']=$this->New_model->get_pti_photos_file_by_date($tw);
			$result['file_number']=$this->New_model->pti_photos_file_no($tw);
			$result['this_date']=$tw;
         
           $dash_active['mypick_act']=1;
            $dash_active['pti_photo_act']=4;
               $dash_active['photos']=1;

    		
	        $this->load->view('header',$dash_active);
	        $this->load->view('my_pick/pti_photos_pick_news',$result);
	        $this->load->view('footer');
	    		
	    }else{

            $this->session->set_flashdata('msg_error','Please Login Now');
			redirect('Welcome/index', 'refresh');

	    }
    }
    public function UNI_Photos_pick_news($tw){
    	if($this->session->userdata('user_id')!=""){
    	


			$result['file_name']=$this->New_model->get_uni_photos_file_by_date($tw);
			$result['file_number']=$this->New_model->uni_photos_file_no($tw);
			$result['this_date']=$tw;
         
           $dash_active['mypick_act']=1;
           $dash_active['uni_photo_act']=5;
              $dash_active['photos']=1;
            

    		
	        $this->load->view('header',$dash_active);
	        $this->load->view('my_pick/uni_photos_pick_news',$result);
	        $this->load->view('footer');
	    		
	    }else{

            $this->session->set_flashdata('msg_error','Please Login Now');
			redirect('Welcome/index', 'refresh');	    	
	    }
    }
   
    public function LOCAL_STORY_pick_news($tw){
    	if($this->session->userdata('user_id')!=""){
	    	

			$result['file_name']=$this->Local_model->get_local_story_file_by_date($tw);
		    // $result['file_number']=$this->New_model->pti_bhasha_file_no($tw);
			$result['this_date']=$tw;
	       
	       $dash_active['mypick_act']=1;
	       $dash_active['loc_news_act']=6;
	          $dash_active['news']=1;

    		
	        $this->load->view('header',$dash_active);
	        $this->load->view('my_pick/local_news_pick_news',$result);
	        $this->load->view('footer');
	    	
	    }else{

            $this->session->set_flashdata('msg_error','Please Login Now');
			redirect('Welcome/index', 'refresh');

	    }
    }
    
    public function LOCAL_PHOTOS_pick_news($tw){
    	if($this->session->userdata('user_id')!=""){
    	


			$result['file_name']=$this->Local_model->get_local_photos_file_by_date($tw);
			// $result['file_number']=$this->New_model->uni_photos_file_no($tw);
			$result['this_date']=$tw;
         
           $dash_active['mypick_act']=1;
             $dash_active['loc_photo_act']=7;
                $dash_active['photos']=1;

    		
	        $this->load->view('header',$dash_active);
	        $this->load->view('my_pick/local_photos_pick_news',$result);
	        $this->load->view('footer');
	    		
	    }else{

            $this->session->set_flashdata('msg_error','Please Login Now');
			redirect('Welcome/index', 'refresh');	    	
	    }
    }


    public function OTHER_NEWS_pick_news($tw){
    	if($this->session->userdata('user_id')!=""){
	    	

			$result['file_name']=$this->Bengali_model->get_other_news_file_by_date($tw);
			$result['file_number']=$this->Bengali_model->other_news_file_no($tw);
			$result['this_date']=$tw;
         
            $dash_active['mypick_act']=1;
            $dash_active['oth_news_act']=8;
               $dash_active['news']=1;

    		
	        $this->load->view('header',$dash_active);
	        $this->load->view('my_pick/other_news_pick_news',$result);
	        $this->load->view('footer');
	    		
	    }else{

            $this->session->set_flashdata('msg_error','Please Login Now');
			redirect('Welcome/index', 'refresh');

	    }
    }
     public function OTHER_PHOTOS_pick_news($tw){
    	if($this->session->userdata('user_id')!=""){
    	


			$result['file_name']=$this->Bengali_model->get_other_photos_file_by_date($tw);
			$result['file_number']=$this->Bengali_model->other_photos_file_no($tw);
			$result['this_date']=$tw;
         
           $dash_active['mypick_act']=1;
             $dash_active['oth_photo_act']=9;
                $dash_active['photos']=1;

    		
	        $this->load->view('header',$dash_active);
	        $this->load->view('my_pick/other_photos_pick_news',$result);
	        $this->load->view('footer');
	    		
	    }else{

            $this->session->set_flashdata('msg_error','Please Login Now');
			redirect('Welcome/index', 'refresh');	    	
	    }
    }


    public function pick_photo_edit($new_value){
    	echo $new_value;
    	die();

    	$result['file_name']=$this->Local_model->get_text($tw);

    	$this->load->view('header');
	    $this->load->view('my_pick/pick_story_edit',$result);
	    $this->load->view('footer');

    }



    // all realising report function for realise a story

    public function pti_bhasha_realise_report(){
    	if($_POST['realise_submit']){
    		$date=date('d-m-y');
    		$give_it_to=$_POST['give_it_to'];
    		$reason=$_POST['reason'];
    		$realised_time=$_POST['realised_time'];
    		$realised_by=$_POST['realised_by'];
    		$file_id=$_POST['file_id'];
    		$page_ed=$_POST['page_ed'];
    		$page_no=$_POST['page_no'];
    		$story_name=$_POST['story_name'];
    		$pick_by=$this->session->userdata('user_name');
            $pick_by_emp_id=$this->session->userdata('emp_id');
            $new_pick_by=''.$pick_by.''.$pick_by_emp_id.'';
    		



    		if($give_it_to!="" && $reason!="" && $realised_by!="" && $realised_time!=""){
    			$data=array(
    				"realised"=>"yes",
    				"realise_time"=>"$realised_time",
    				"realised_by"=>"$realised_by",
    				"realise_reason"=>"$reason",
    				"realise_date"=>"$date",
    				"give_it_to"=>"$give_it_to"
    			
    			);
    			$cv=$this->New_model->pti_bhasha_realise_report($data,$realised_by,$file_id,$page_ed,$page_no);

    			$dir_name=''.$file_id.'[@]'.$story_name.'[@]'.$new_pick_by.'[@]'.$page_ed.'[@]'.$page_no.'';
    			$folder_name='document_uploads/picked/'.$date.'/PTI_BHASHA/'.$dir_name.'';

                if(file_exists('document_uploads/picked/'.$date.'/PTI_BHASHA/'.$dir_name.'')){

                	if(file_exists('document_uploads/picked/'.$date.'/PTI_BHASHA/'.$dir_name.'/'.$story_name.'')){

                		$m=unlink('document_uploads/picked/'.$date.'/PTI_BHASHA/'.$dir_name.'/'.$story_name.'');
                		$n=rmdir($folder_name);

		    			if($cv==true && $n==true){
		    				$this->session->set_flashdata('msg','File Was  Reliesed Successfully');
						    redirect('Mywork_controller/pti_bhasha_pick_news/'.$date.'');


		    			}
		    			else{
			    			$this->session->set_flashdata('msg_error','File Was Not Reliesed Successfully');
							redirect('Mywork_controller/pti_bhasha_pick_news/'.$date.'');
		    			}
		    		}
	    		}

    		}
    		else{
    			$this->session->set_flashdata('msg_error','Please Enter The All Details');
				redirect('Mywork_controller/pti_bhasha_pick_news/'.$date.'');

    		}

    	}

    }

    public function pti_english_realise_report(){
    	if($_POST['realise_submit']){
    		$date=date('d-m-y');
    		$give_it_to=$_POST['give_it_to'];
    		$reason=$_POST['reason'];
    		$realised_time=$_POST['realised_time'];
    		$realised_by=$_POST['realised_by'];
    		$file_id=$_POST['file_id'];
    		$page_ed=$_POST['page_ed'];
    		$page_no=$_POST['page_no'];
    		$story_name=$_POST['story_name'];
    		$pick_by=$this->session->userdata('user_name');
            $pick_by_emp_id=$this->session->userdata('emp_id');
            $new_pick_by=''.$pick_by.''.$pick_by_emp_id.'';
    		



    		if($give_it_to!="" && $reason!="" && $realised_by!="" && $realised_time!=""){
    			$data=array(
    				"realised"=>"yes",
    				"realise_time"=>"$realised_time",
    				"realised_by"=>"$realised_by",
    				"realise_reason"=>"$reason",
    				"realise_date"=>"$date",
    				"give_it_to"=>"$give_it_to"
    			
    			);
    			$cv=$this->New_model->pti_english_realise_report($data,$realised_by,$file_id,$page_ed,$page_no);

    			$dir_name=''.$file_id.'[@]'.$story_name.'[@]'.$new_pick_by.'[@]'.$page_ed.'[@]'.$page_no.'';
    			$folder_name='document_uploads/picked/'.$date.'/PTI_ENG/'.$dir_name.'';

                if(file_exists('document_uploads/picked/'.$date.'/PTI_ENG/'.$dir_name.'')){

                	if(file_exists('document_uploads/picked/'.$date.'/PTI_ENG/'.$dir_name.'/'.$story_name.'')){

                		$m=unlink('document_uploads/picked/'.$date.'/PTI_ENG/'.$dir_name.'/'.$story_name.'');
                		$n=rmdir($folder_name);
		    			if($cv==true){
		    				$this->session->set_flashdata('msg','File Was  Reliesed Successfully');
						    redirect('Mywork_controller/pti_english_pick_news/'.$date.'');


		    			}
		    			else{
		    			$this->session->set_flashdata('msg_error','File Was Not Reliesed Successfully');
						redirect('Mywork_controller/pti_english_pick_news/'.$date.'');
		    			}
		    		}
		    	}

    		}
    		else{
    			$this->session->set_flashdata('msg_error','Please Enter The All Details');
				redirect('Mywork_controller/pti_english_pick_news/'.$date.'');

    		}

    	}

    }

    public function pti_photos_realise_report(){
    	if($_POST['realise_submit']){
    		$date=date('d-m-y');
    		$give_it_to=$_POST['give_it_to'];
    		$reason=$_POST['reason'];
    		$realised_time=$_POST['realised_time'];
    		$realised_by=$_POST['realised_by'];
    		$file_id=$_POST['file_id'];
    		$page_ed=$_POST['page_ed'];
    		$page_no=$_POST['page_no'];
    		$story_name=$_POST['story_name'];
    		$pick_by=$this->session->userdata('user_name');
            $pick_by_emp_id=$this->session->userdata('emp_id');
            $new_pick_by=''.$pick_by.''.$pick_by_emp_id.'';
    		



    		if($give_it_to!="" && $reason!="" && $realised_by!="" && $realised_time!=""){
    			$data=array(
    				"realised"=>"yes",
    				"realise_time"=>"$realised_time",
    				"realised_by"=>"$realised_by",
    				"realise_reason"=>"$reason",
    				"realise_date"=>"$date",
    				"give_it_to"=>"$give_it_to"
    			
    			);
    			$cv=$this->New_model->pti_photos_realise_report($data,$realised_by,$file_id,$page_ed,$page_no);

    			$dir_name=''.$file_id.'[@]'.$story_name.'[@]'.$new_pick_by.'[@]'.$page_ed.'[@]'.$page_no.'';
    			$folder_name='document_uploads/picked/'.$date.'/PTI_Photos/'.$dir_name.'';

                if(file_exists('document_uploads/picked/'.$date.'/PTI_Photos/'.$dir_name.'')){

                	if(file_exists('document_uploads/picked/'.$date.'/PTI_Photos/'.$dir_name.'/'.$story_name.'')){

                		$m=unlink('document_uploads/picked/'.$date.'/PTI_Photos/'.$dir_name.'/'.$story_name.'');
                		$n=rmdir($folder_name);

		    			if($cv==true){
		    				$this->session->set_flashdata('msg','File Was  Reliesed Successfully');
						    redirect('Mywork_controller/pti_photos_pick_news/'.$date.'');


		    			}
		    			else{
		    			$this->session->set_flashdata('msg_error','File Was Not Reliesed Successfully');
						redirect('Mywork_controller/pti_photos_pick_news/'.$date.'');
		    			}
		    		}
		    	}

    		}
    		else{
    			$this->session->set_flashdata('msg_error','Please Enter The All Details');
				redirect('Mywork_controller/pti_photos_pick_news/'.$date.'');

    		}

    	}

    }

    public function uni_photos_realise_report(){
    	if($_POST['realise_submit']){
    		$date=date('d-m-y');
    		$give_it_to=$_POST['give_it_to'];
    		$reason=$_POST['reason'];
    		$realised_time=$_POST['realised_time'];
    		$realised_by=$_POST['realised_by'];
    		$file_id=$_POST['file_id'];
    		$page_ed=$_POST['page_ed'];
    		$page_no=$_POST['page_no'];
    		$story_name=$_POST['story_name'];
    		$pick_by=$this->session->userdata('user_name');
            $pick_by_emp_id=$this->session->userdata('emp_id');
            $new_pick_by=''.$pick_by.''.$pick_by_emp_id.'';
    		



    		if($give_it_to!="" && $reason!="" && $realised_by!="" && $realised_time!=""){
    			$data=array(
    				"realised"=>"yes",
    				"realise_time"=>"$realised_time",
    				"realised_by"=>"$realised_by",
    				"realise_reason"=>"$reason",
    				"realise_date"=>"$date",
    				"give_it_to"=>"$give_it_to"
    			
    			);
    			$cv=$this->New_model->uni_photos_realise_report($data,$realised_by,$file_id,$page_ed,$page_no);

    			$dir_name=''.$file_id.'[@]'.$story_name.'[@]'.$new_pick_by.'[@]'.$page_ed.'[@]'.$page_no.'';
    			$folder_name='document_uploads/picked/'.$date.'/UNI_Photos/'.$dir_name.'';

                if(file_exists('document_uploads/picked/'.$date.'/UNI_Photos/'.$dir_name.'')){

                	if(file_exists('document_uploads/picked/'.$date.'/UNI_Photos/'.$dir_name.'/'.$story_name.'')){

                		$m=unlink('document_uploads/picked/'.$date.'/UNI_Photos/'.$dir_name.'/'.$story_name.'');
                		$n=rmdir($folder_name);
		    			if($cv==true){
		    				$this->session->set_flashdata('msg','File Was  Reliesed Successfully');
						    redirect('Mywork_controller/uni_photos_pick_news/'.$date.'');


		    			}
		    			else{
		    			$this->session->set_flashdata('msg_error','File Was Not Reliesed Successfully');
						redirect('Mywork_controller/uni_photos_pick_news/'.$date.'');
		    			}
		    		}
		    	}

    		}
    		else{
    			$this->session->set_flashdata('msg_error','Please Enter The All Details');
				redirect('Mywork_controller/uni_photos_pick_news/'.$date.'');

    		}

    	}

    }

    public function uni_varta_realise_report(){
    	if($_POST['realise_submit']){
    		$date=date('d-m-y');
    		$give_it_to=$_POST['give_it_to'];
    		$reason=$_POST['reason'];
    		$realised_time=$_POST['realised_time'];
    		$realised_by=$_POST['realised_by'];
    		$file_id=$_POST['file_id'];
    		$page_ed=$_POST['page_ed'];
    		$page_no=$_POST['page_no'];
    		$story_name=$_POST['story_name'];
    		$pick_by=$this->session->userdata('user_name');
            $pick_by_emp_id=$this->session->userdata('emp_id');
            $new_pick_by=''.$pick_by.''.$pick_by_emp_id.'';
    		



    		if($give_it_to!="" && $reason!="" && $realised_by!="" && $realised_time!=""){
    			$data=array(
    				"realised"=>"yes",
    				"realise_time"=>"$realised_time",
    				"realised_by"=>"$realised_by",
    				"realise_reason"=>"$reason",
    				"realise_date"=>"$date",
    				"give_it_to"=>"$give_it_to"
    			
    			);
    			$cv=$this->New_model->uni_varta_realise_report($data,$realised_by,$file_id,$page_ed,$page_no);

    			$dir_name=''.$file_id.'[@]'.$story_name.'[@]'.$new_pick_by.'[@]'.$page_ed.'[@]'.$page_no.'';
    			$folder_name='document_uploads/picked/'.$date.'/UNI_Varta/'.$dir_name.'';

                if(file_exists('document_uploads/picked/'.$date.'/UNI_Varta/'.$dir_name.'')){

                	if(file_exists('document_uploads/picked/'.$date.'/UNI_Varta/'.$dir_name.'/'.$story_name.'')){

                		$m=unlink('document_uploads/picked/'.$date.'/UNI_Varta/'.$dir_name.'/'.$story_name.'');
                		$n=rmdir($folder_name);


		    			if($cv==true){
		    				$this->session->set_flashdata('msg','File Was  Reliesed Successfully');
						    redirect('Mywork_controller/uni_varta_pick_news/'.$date.'');


		    			}
		    			else{
		    			$this->session->set_flashdata('msg_error','File Was Not Reliesed Successfully');
						redirect('Mywork_controller/uni_varta_pick_news/'.$date.'');
		    			}
		    		}
		    	}

    		}
    		else{
    			$this->session->set_flashdata('msg_error','Please Enter The All Details');
				redirect('Mywork_controller/uni_varta_pick_news/'.$date.'');

    		}

    	}

    }
    

    





}
?>