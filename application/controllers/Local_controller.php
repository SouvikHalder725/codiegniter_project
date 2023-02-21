<?php
defined('BASEPATH') or exit('No direct script access allowed');
   

class Local_controller extends CI_Controller{

	public function __construct()
    {
            parent::__construct();

            $this->load->helper('url');          
            $this->load->model('Local_model');
	        $this->load->helper('url_helper');
	        $this->load->helper('form');
	        $this->load->library('form_validation');
	        $this->load->library('session');
	        
	        
    }
    public function local_news_form(){
    	if($this->session->userdata('user_id')!=""){


	    	  $get_id=$this->Local_model->get_id_local_news_no();           
			  $get_id++;
			  $new_get_id['id']=$get_id;
			
			  // $id['reg_id']=str_pad($new_get_id,3,"0",STR_PAD_LEFT);


	    	$dash_active['local_story_act']=1;

		    $this->load->view('header',$dash_active);
	    	$this->load->view('local/local_news_form',$new_get_id);
	    	$this->load->view('footer');
    	}else{
			$this->session->set_flashdata('msg_error','Please Login Now');
			redirect('Welcome/index', 'refresh');


		}
    }
    public function local_photos_form(){
    	if($this->session->userdata('user_id')!=""){

	    	  $get_id=$this->Local_model->get_id_local_photos_no();           
			  $get_id++;
			  echo $new_get_id['id']=$get_id;
			 
			  // $id['reg_id']=str_pad($new_get_id,3,"0",STR_PAD_LEFT);


	    	$dash_active['local_photo_act']=1;

		    $this->load->view('header',$dash_active);
	    	$this->load->view('local/local_photos_form',$new_get_id);
	    	$this->load->view('footer');
	    }else{
			$this->session->set_flashdata('msg_error','Please Login Now');
			redirect('Welcome/index', 'refresh');


		}
    }
    public function add_local_photos(){
    	if($this->session->userdata('user_id')!=""){
    		 $timezone=date_default_timezone_set("Asia/Calcutta");
            $date=date('d-m-y');
            if($_POST['submit']){

		    	$story_id=$_POST['photos_id'];		    			    	
		    	$create_by=$_POST['create_by'];		    	
		    	$photos_file=$_FILES['photos_name'];
		    	$img_title=$_POST['img_title'];		    			    	
		    	$img_subject=$_POST['img_subject'];			
		    	


		    	$from_path=$photos_file['tmp_name'];
		    	$file_name=$photos_file['name'];
		    	
		    	
                $imageFileType = strtolower(pathinfo($file_name,PATHINFO_EXTENSION));



		    	if(!file_exists("document_uploads/".$date.'')){
					$dt=mkdir('document_uploads/'.$date.'', 0777, true);
						
				}


		    	if(!file_exists("document_uploads/".$date.'/LOCAL_PHOTOS')){
					$dt=mkdir('document_uploads/'.$date.'/LOCAL_PHOTOS', 0777, true);
						
				}





				
				

				if($imageFileType=="jpg" || $imageFileType=="jpeg" || $imageFileType=="png"){

           	   
				    $destination="document_uploads/".$date.'/LOCAL_PHOTOS/'.$file_name."";
				       
				    if(!file_exists("document_uploads/".$date."/LOCAL_PHOTOS/".$file_name."")){
		                $a=copy($from_path, $destination);

                        $data=array();
		                $data['title']=$img_title;
		                $data['subject']=$img_subject;


		                $this->set_image_properties("document_uploads/".$date.'/LOCAL_PHOTOS/'.$file_name."",$data);
		                $file_cre_date=date ("d-m-y", filectime("document_uploads/".$date."/LOCAL_PHOTOS/".$file_name.""));
					    $file_cre_date_time=date ("d-m-y H:i:s", filectime("document_uploads/".$date."/LOCAL_PHOTOS/".$file_name."")); 
					    $file_mod_date=date ("d-m-y", filemtime("document_uploads/".$date."/LOCAL_PHOTOS/".$file_name.""));



		               
		                $m=true;
		                
		            }else{

	                    $m=false;

		            }


	                if($m==true){


				    	$data=array(
			               "id"=>"$story_id",
			               "file_name"=>"$file_name",                  
			               "date"=>"$file_cre_date",
						   "file_creation_date_time"=>"$file_cre_date_time",
			               "created_by"=>"$create_by"              
			               

				    	);
				    	if($date==$file_cre_date){

				    	   $result=$this->Local_model->local_photos_ad($data);
				    	}
				    	if($result){

							$this->session->set_flashdata('msg','Local Photos Added Succesfully');
				    	    redirect('Local_controller/own_local_photos', 'refresh');

				        }
				        else{
				        	$this->session->set_flashdata('msg_error','The Photos is Allready Exists,Save in Difrent Name');
				    	    redirect('Local_controller/own_local_photos', 'refresh');


				        }
				    }else{
				    	$this->session->set_flashdata('msg_error','The Photos is Allready Exists,Save in Difrent Name');
				    	redirect('Local_controller/own_local_photos', 'refresh');



				    }
				}else{

                    $this->session->set_flashdata('msg_error',"File Not Uploaded, Only 'Jpg','jpeg','png' File Type Supported");
				    redirect('Local_controller/own_local_photos', 'refresh');

				}
			   
		    		

		    }
		
		}else{
			$this->session->set_flashdata('msg_error','Please Login Now');
			redirect('Welcome/index', 'refresh');


		}






    }

    // function for set image tittle and subject

     public function set_image_properties($path,$jsondata){

     	

    	$data="";
    	$iptc=array(
    		'2#105'=>$jsondata['title'],
    		'2#120'=>$jsondata['subject']
    	);

    	


    	foreach ($iptc as $tag => $string) {
    		$tag=substr($tag, 2);
    		$data.=$this->iptc_make_tag(2,$tag,$string);
    	}
    	$content=iptcembed($data, $path);

    	$fp=fopen($path,'wb');
    	fwrite($fp, $content);
    	fclose($fp);
    }

    public function iptc_make_tag($rec,$data,$value){
    	$length=strlen($value);
    	$retval=chr(0x1C).chr($rec).chr($data);

    	if($length<0x8000){
    		$retval.=chr($length>>8).chr($length & 0xFF);

    	}else{
    		$retval.=chr(0x80).
    		chr(0x04).
    		chr(($length>>24) & 0xFF).
    		chr(($length>>16) & 0xFF).
    		chr(($length>>8) & 0xFF).
    		chr($length & 0xFF);

    	}
    	return $retval.$value;
    }

    public function getImageProperty($filepath){
    	$size=getimagesize($filepath,$info);
    		$returnArray=null;
    		if(isset($info['APP13'])){
    			$iptc=iptcparse($info['APP13']);
    			$returnArray=json_decode($iptc["2#120"][0]);
    		}
    		return $returnArray;
    	


    }
    public function add_local_news(){
    	if($this->session->userdata('user_id')!=""){
    		$timezone=date_default_timezone_set("Asia/Calcutta");
	    	$date=date('d-m-y');
	    	$pick_by=$this->session->userdata('user_name');
		    $pick_by_emp_id=$this->session->userdata('emp_id');
		    $new_pick_by=''.$pick_by.''.$pick_by_emp_id.'';

	    	$this->form_validation->set_rules('story_head', 'story_head', 'required',array('required'=>'Your Story Heading Is Required'));
			$this->form_validation->set_rules('story_body', 'story_body', 'required',array('required'=>'Your story Cannot be Blank'));		
			
			
			$this->form_validation->run();


			if ($this->form_validation->run()==false) {
				$this->session->set_flashdata('msg_error','Please Enter Valid Data');

				$this->session->set_flashdata('errors', validation_errors());

				redirect('Local_controller/local_news_form');
			}
			else{
				if($_POST['submit']){

			    	$story_id=$_POST['story_id'];		    			    	
			    	$create_by=$_POST['create_by'];		    	
			    	$story_head=$_POST['story_head'];		    	
			    	$story_body=$_POST['story_body'];



			    	if(!file_exists("document_uploads/".$date.'')){
						$dt=mkdir('document_uploads/'.$date.'', 0777, true);
							
					}


			    	if(!file_exists("document_uploads/".$date.'/LOCAL_STORY')){
						$dt=mkdir('document_uploads/'.$date.'/LOCAL_STORY', 0777, true);
							
					}
					if(!file_exists("document_uploads/".$date.'/LOCAL_STORY/'.$story_head.'.txt')){

		           	   $myfile=fopen('document_uploads/'.$date.'/LOCAL_STORY/'.$story_head.'.txt', "wb") or redirect('Local_controller/local_news_form');
		           	   $file_cre_date=date ("d-m-y", filectime("document_uploads/".$date."/LOCAL_STORY/".$story_head.".txt"));
					   $file_cre_date_time=date ("d-m-y H:i:s", filectime("document_uploads/".$date."/LOCAL_STORY/".$story_head.".txt")); 
					   $file_mod_date=date ("d-m-y", filemtime("document_uploads/".$date."/LOCAL_STORY/".$story_head.".txt"));
		              
					   fwrite($myfile, $story_body);		
					   fclose($myfile);

					   $new_file_name=''.$story_head.'.txt';



				    	$data=array(
		                   "id"=>"$story_id",
		                   "file_name"=>"$new_file_name",
		                   "text"=>"$story_body",
		                   "date"=>"$file_cre_date",
						   "file_creation_date_time"=>"$file_cre_date_time",
		                   "created_by"=>"$new_pick_by"              
		                   

				    	);

				    	if($date==$file_cre_date){

				    	  $result=$this->Local_model->local_story_ad($data);
				    	}
				    	if($result){

							$this->session->set_flashdata('msg','Local Story Added Succesfully');
				    	    redirect('Local_controller/own_local_story', 'refresh');

				        }
				        else{
				        	$this->session->set_flashdata('msg_error','The File is Allready Exists,Save in Difrent Name');
				    	    redirect('Local_controller/own_local_story', 'refresh');


				        }
				    }else{

	                    $this->session->set_flashdata('msg_error','The File is Allready Exists,Save in Difrent Name');
				    	redirect('Local_controller/own_local_story', 'refresh');

				    }
				   
			    		

			    }
			}
		}else{
			$this->session->set_flashdata('msg_error','Please Login Now');
			redirect('Welcome/index', 'refresh');


		}







    }
    public function update_local_story(){
    	$date=date('d-m-y');
    	

    	$this->form_validation->set_rules('story_head', 'story_head', 'required',array('required'=>'Your Story Heading Is Required'));
		$this->form_validation->set_rules('story_body', 'story_body', 'required',array('required'=>'Your story Cannot be Blank'));		
		
		
		$this->form_validation->run();


		if ($this->form_validation->run()==false) {
			$this->session->set_flashdata('msg_error','Please Enter Valid Data');

			$this->session->set_flashdata('errors', validation_errors());

			redirect('Local_controller/local_news_form');
		}
		else{
			if($_POST['submit']){

		    $story_id=$_POST['story_id'];		    			    	
		    $create_by=$_POST['create_by'];		    	
		    $story_head=$_POST['story_head'];		    	
		    $story_body=$_POST['story_body'];
		    	



		    	if(!file_exists("document_uploads/".$date.'')){
					$dt=mkdir('document_uploads/'.$date.'', 0777, true);
						
				}


		    	if(!file_exists("document_uploads/".$date.'/LOCAL_STORY')){
					$dt=mkdir('document_uploads/'.$date.'/LOCAL_STORY', 0777, true);
						
				}

           	  $myfile=fopen('document_uploads/'.$date.'/LOCAL_STORY/'.$story_head.'', "w") or redirect('Local_controller/local_news_form');
              
			   fwrite($myfile, $story_body);		
			   fclose($myfile);

			  



		    	$data=array(
                   "id"=>"$story_id",
                   "file_name"=>"$story_head",
                   "text"=>"$story_body",
                   "date"=>"$date",
                   "created_by"=>"$create_by"              
                   

		    	);

		    	

		    	$result=$this->Local_model->local_story_update($data);
		    	if($result){

					$this->session->set_flashdata('msg','Local Story Updated Succesfully');
		    	    redirect('Local_controller/own_local_story', 'refresh');

		        }
		        else{
		        	$this->session->set_flashdata('msg_error','The Story Was Not Updated Successfully');
		    	    redirect('Local_controller/own_local_story', 'refresh');


		        }
			   
		    		

		    }
		}




    }



    public function own_local_story(){
    	header("Refresh: 30;");
		if($this->session->userdata('user_id')!=""){
			if(isset($_POST['pti_bhasha_page'])){
			    $page_no=$_POST['page_no'];
				$arr_atart=($page_no-1)*5;
			}
			else{

		    	$arr_atart=0;
		    	$page_no=1;
		    	
		    }

		    $pick_by=$this->session->userdata('user_name');
	        $pick_by_emp_id=$this->session->userdata('emp_id');
	        $new_pick_by=''.$pick_by.''.$pick_by_emp_id.'';


		    $get_file['file_name']=$this->Local_model->get_local_story_file($arr_atart,$new_pick_by);
		    $get_file['file_number']=$this->Local_model->local_story_file_no($new_pick_by);
		    $get_file['page_number']=$page_no;
		    $get_file['arr_atart']=$arr_atart;
		    


	    	$dash_active['local_story_act']=1;

	        $this->load->view('header',$dash_active);
	    	$this->load->view('local/own_local_story',$get_file);
	    	$this->load->view('footer');


	    }else{

            $this->session->set_flashdata('msg_error','Please Login Now');
			redirect('Welcome/index', 'refresh');

		}





    }
    public function local_news_edit($id){
    if($this->session->userdata('user_id')!=""){
    	$get_file['file_name']=$this->Local_model->get_local_story_for_edit($id);


        $dash_active['local_story_act']=1;

	    $this->load->view('header',$dash_active);
	    $this->load->view('local/local_news_edit',$get_file);
	    $this->load->view('footer');
    }else{
		$this->session->set_flashdata('msg_error','Please Login Now');
		redirect('Welcome/index', 'refresh');


	}





    }
    public function pick_local_story(){

    	if($this->session->userdata('user_id')!=""){
			if($_POST['page_no']!="" && $_POST['page_ed']!=""){
			   $date=date('d-m-y');						
	           $page_no=$_POST['page_no'];
	           $page_ed=$_POST['page_ed'];
	           $key=$_POST['pick_file_name'];
	           $story_id=$_POST['story_id'];
	           $pick_by=$this->session->userdata('user_name');
	           $pick_by_emp_id=$this->session->userdata('emp_id');
	           $new_pick_by=''.$pick_by.''.$pick_by_emp_id.'';

	          
	          

				
				if(isset($_POST['pick_submit_val']) && $_POST['pick_file_name']!=""){
					

					$scan_result=scandir('document_uploads/picked/'.$date.'/LOCAL_STORY');
					foreach ($scan_result as $scan_value) {
						$scan_length=strlen($scan_value);
						if($scan_length>5){

							$explode=explode('[@]',$scan_value,5);

	                        $scan_id=$explode[0];
	                        $scan_file_name=$explode[1];
	                        $scan_pick_by=$explode[2];
	                        $scan_edition=$explode[3];
	                        $scan_page_no=$explode[4];
	                        if($story_id==$scan_id && $key==$scan_file_name && $page_ed==$scan_edition){

	                        	echo $v=0;
	                        	
	                        }
	                       				
						}
						else{
							 $v=1;
						}
					}
					
					if($v!="0"){
							if(!file_exists('document_uploads/picked/'.$date.'/LOCAL_STORY/'.$story_id.'[@]'.$key.'[@]'.$new_pick_by.'[@]'.$page_ed.'[@]'.$page_no.'/')){

				                $dd=mkdir('document_uploads/picked/'.$date.'/LOCAL_STORY/'.$story_id.'[@]'.$key.'[@]'.$new_pick_by.'[@]'.$page_ed.'[@]'.$page_no.'/', 0777, true);
							}
							
							
									    
									   
						    $file_from='document_uploads/'.$date.'/LOCAL_STORY/'.$key.'';					        
					        $destination2='document_uploads/picked/'.$date.'/LOCAL_STORY/'.$story_id.'[@]'.$key.'[@]'.$new_pick_by.'[@]'.$page_ed.'[@]'.$page_no.'/'.$key.'';
								        
					        if(!file_exists('document_uploads/picked/'.$date.'/LOCAL_STORY/'.$story_id.'[@]'.$key.'[@]'.$new_pick_by.'[@]'.$page_ed.'[@]'.$page_no.'/'.$key.'')){

						        
						         $a=copy($file_from,$destination2);
						         if($a==true){

						         	$data=array(
							         	"story_name"=>"$key",			         	
							         	"story_date"=>"$date",
							         	"pick_date"=>"$date",
							         	"pick_by"=>"$new_pick_by"
							         );
							         $data_res=$this->Local_model->pick_local_story_get_det($data);


							         $data2=array(
								         "story_id"=>"$data_res->id",				         
								         "story_date"=>"$data_res->date",
								         "story_name"=>"$key",			         					       
								         "pick_date"=>"$date",
								         "pick_by"=>"$new_pick_by",
								          "edition"=>"$page_ed",
								         "page"=>"$page_no"
								     );
							         $data_res2=$this->Local_model->pick_local_story_db_store($data2);
							         if($data_res2==true){
				                         $m=true;

							         }						
						         }
						         else{
						         	$m=false;
						         }
						     }else{
						     	$this->session->set_flashdata('msg_error','File Was Allready Picked By You For This Edition::'.$page_ed.'');
					            redirect('Local_controller/own_local_story');


						     }
				               
				         
				    }
				    else{
				    	$this->session->set_flashdata('msg_error','File Was Allready Picked By Someone For This Edition::'.$page_ed.'');
					    redirect('Local_controller/own_local_story');

				    }


				    if($m==true){
				    	$this->session->set_flashdata('msg','File Was  Picked Successfully,For This Edition');
					    redirect('Local_controller/own_local_story');

					}
					else{
						$this->session->set_flashdata('msg_error','File Was Not Picked Successfully');
					    redirect('Local_controller/own_local_story');

					}
							
							    


				}
				else{
					$this->session->set_flashdata('msg_error','Picked Not Done Correctly');
				    redirect('Local_controller/own_local_story');

				}
				
				
			}
			else{
				$this->session->set_flashdata('msg_error','Select The Edition & Page Correctly');
			    redirect('Local_controller/own_local_story');	
			}
		}else{

            $this->session->set_flashdata('msg_error','Please Login Now');
			redirect('Welcome/index', 'refresh');


		}
	}



	 public function pick_local_photos(){

    	if($this->session->userdata('user_id')!=""){
			if($_POST['page_no']!="" && $_POST['page_ed']!=""){
			   $date=date('d-m-y');						
	           $page_no=$_POST['page_no'];
	           $page_ed=$_POST['page_ed'];
	           $key=$_POST['pick_file_name'];
	           $story_id=$_POST['story_id'];
	           $pick_by=$this->session->userdata('user_name');
	           $pick_by_emp_id=$this->session->userdata('emp_id');
	           $new_pick_by=''.$pick_by.''.$pick_by_emp_id.'';

	          
	          

				
				if(isset($_POST['pick_submit_val']) && $_POST['pick_file_name']!=""){
					

					$scan_result=scandir('document_uploads/picked/'.$date.'/LOCAL_PHOTOS');
					foreach ($scan_result as $scan_value) {
						$scan_length=strlen($scan_value);
						if($scan_length>5){

							$explode=explode('[@]',$scan_value,5);

	                        $scan_id=$explode[0];
	                        $scan_file_name=$explode[1];
	                        $scan_pick_by=$explode[2];
	                        $scan_edition=$explode[3];
	                        $scan_page_no=$explode[4];
	                        if($story_id==$scan_id && $key==$scan_file_name && $page_ed==$scan_edition){

	                        	echo $v=0;
	                        	
	                        }
	                       				
						}
						else{
							 $v=1;
						}
					}
					
					if($v!="0"){
							if(!file_exists('document_uploads/picked/'.$date.'/LOCAL_PHOTOS/'.$story_id.'[@]'.$key.'[@]'.$new_pick_by.'[@]'.$page_ed.'[@]'.$page_no.'/')){

				                $dd=mkdir('document_uploads/picked/'.$date.'/LOCAL_PHOTOS/'.$story_id.'[@]'.$key.'[@]'.$new_pick_by.'[@]'.$page_ed.'[@]'.$page_no.'/', 0777, true);
							}
							
							
									    
									   
						    $file_from='document_uploads/'.$date.'/LOCAL_PHOTOS/'.$key.'';					        
					        $destination2='document_uploads/picked/'.$date.'/LOCAL_PHOTOS/'.$story_id.'[@]'.$key.'[@]'.$new_pick_by.'[@]'.$page_ed.'[@]'.$page_no.'/'.$key.'';
								        
					        if(!file_exists('document_uploads/picked/'.$date.'/LOCAL_PHOTOS/'.$story_id.'[@]'.$key.'[@]'.$new_pick_by.'[@]'.$page_ed.'[@]'.$page_no.'/'.$key.'')){

						        
						         $a=copy($file_from,$destination2);
						         if($a==true){

						         	$data=array(
							         	"story_name"=>"$key",			         	
							         	"story_date"=>"$date",
							         	"pick_date"=>"$date",
							         	"pick_by"=>"$new_pick_by"
							         );
							         $data_res=$this->Local_model->pick_local_photos_get_det($data);


							         $data2=array(
								         "story_id"=>"$data_res->id",				         
								         "story_date"=>"$data_res->date",
								         "story_name"=>"$key",			         					       
								         "pick_date"=>"$date",
								         "pick_by"=>"$new_pick_by",
								          "edition"=>"$page_ed",
								         "page"=>"$page_no"
								     );
							         $data_res2=$this->Local_model->pick_local_photos_db_store($data2);
							         if($data_res2==true){
				                         $m=true;

							         }						
						         }
						         else{
						         	$m=false;
						         }
						     }else{
						     	$this->session->set_flashdata('msg_error','File Was Allready Picked By You For This Edition::'.$page_ed.'');
					            redirect('Local_controller/own_local_photos');


						     }
				               
				         
				    }
				    else{
				    	$this->session->set_flashdata('msg_error','File Was Allready Picked By Someone For This Edition::'.$page_ed.'');
					    redirect('Local_controller/own_local_photos');

				    }


				    if($m==true){
				    	$this->session->set_flashdata('msg','File Was  Picked Successfully,For This Edition');
					    redirect('Local_controller/own_local_photos');

					}
					else{
						$this->session->set_flashdata('msg_error','File Was Not Picked Successfully');
					    redirect('Local_controller/own_local_photos');

					}
							
							    


				}
				else{
					$this->session->set_flashdata('msg_error','Picked Not Done Correctly');
				    redirect('Local_controller/own_local_photos');

				}
				
				
			}
			else{
				$this->session->set_flashdata('msg_error','Select The Edition & Page Correctly');
			    redirect('Local_controller/own_local_photos');	
			}
		}else{

            $this->session->set_flashdata('msg_error','Please Login Now');
			redirect('Welcome/index', 'refresh');


		}
	}

	public function own_local_photos(){
		header("Refresh: 30;");
		if($this->session->userdata('user_id')!=""){
			if(isset($_POST['photo_page'])){
			    $page_no=$_POST['page_no'];
				$arr_atart=($page_no-1)*5;
			}
			else{

		    	$arr_atart=0;
		    	$page_no=1;
		    	
		    }

		    $pick_by=$this->session->userdata('user_name');
	        $pick_by_emp_id=$this->session->userdata('emp_id');
	        $new_pick_by=''.$pick_by.''.$pick_by_emp_id.'';

		    $get_file['file_name']=$this->Local_model->get_local_photos_file($arr_atart,$new_pick_by);
		    $get_file['file_number']=$this->Local_model->local_photos_file_no($new_pick_by);
		    $get_file['page_number']=$page_no;
		    $get_file['arr_atart']=$arr_atart;





	    	$dash_active['local_photo_act']=1;

	        $this->load->view('header',$dash_active);
	    	$this->load->view('local/own_local_photos',$get_file);
	    	$this->load->view('footer');


	    }else{

            $this->session->set_flashdata('msg_error','Please Login Now');
			redirect('Welcome/index', 'refresh');

		}

	}

	 public function local_story_realise_report(){
	 	if($this->session->userdata('user_id')!=""){
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
	    			$cv=$this->Local_model->local_story_realise_report($data,$realised_by,$file_id,$page_ed,$page_no);

	    			$dir_name=''.$file_id.'[@]'.$story_name.'[@]'.$new_pick_by.'[@]'.$page_ed.'[@]'.$page_no.'';
	    			$folder_name='document_uploads/picked/'.$date.'/LOCAL_STORY/'.$dir_name.'';

	                if(file_exists('document_uploads/picked/'.$date.'/LOCAL_STORY/'.$dir_name.'')){

	                	if(file_exists('document_uploads/picked/'.$date.'/LOCAL_STORY/'.$dir_name.'/'.$story_name.'')){

	                		$m=unlink('document_uploads/picked/'.$date.'/LOCAL_STORY/'.$dir_name.'/'.$story_name.'');
	                		$n=rmdir($folder_name);

			    			if($cv==true && $n==true){
			    				$this->session->set_flashdata('msg','File Was  Reliesed Successfully');
							    redirect('Mywork_controller/LOCAL_STORY_pick_news/'.$date.'');


			    			}
			    			else{
				    			$this->session->set_flashdata('msg_error','File Was Not Reliesed Successfully');
								redirect('Mywork_controller/LOCAL_STORY_pick_news/'.$date.'');
			    			}
			    		}
		    		}

	    		}
	    		else{
	    			$this->session->set_flashdata('msg_error','Please Enter The All Details');
					redirect('Mywork_controller/LOCAL_STORY_pick_news/'.$date.'');

	    		}

	    	}
	    }else{

            $this->session->set_flashdata('msg_error','Please Login Now');
			redirect('Welcome/index', 'refresh');

		}

    }

    public function local_photos_realise_report(){
    	if($this->session->userdata('user_id')!=""){
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
	    			$cv=$this->Local_model->local_photos_realise_report($data,$realised_by,$file_id,$page_ed,$page_no);

	    			$dir_name=''.$file_id.'[@]'.$story_name.'[@]'.$new_pick_by.'[@]'.$page_ed.'[@]'.$page_no.'';
	    			$folder_name='document_uploads/picked/'.$date.'/LOCAL_PHOTOS/'.$dir_name.'';

	                if(file_exists('document_uploads/picked/'.$date.'/LOCAL_PHOTOS/'.$dir_name.'')){

	                	if(file_exists('document_uploads/picked/'.$date.'/LOCAL_PHOTOS/'.$dir_name.'/'.$story_name.'')){

	                		$m=unlink('document_uploads/picked/'.$date.'/LOCAL_PHOTOS/'.$dir_name.'/'.$story_name.'');
	                		$n=rmdir($folder_name);

			    			if($cv==true){
			    				$this->session->set_flashdata('msg','File Was  Reliesed Successfully');
							    redirect('Mywork_controller/LOCAL_PHOTOS_pick_news/'.$date.'');


			    			}
			    			else{
			    			$this->session->set_flashdata('msg_error','File Was Not Reliesed Successfully');
							redirect('Mywork_controller/LOCAL_PHOTOS_pick_news/'.$date.'');
			    			}
			    		}
			    	}

	    		}
	    		else{
	    			$this->session->set_flashdata('msg_error','Please Enter The All Details');
					redirect('Mywork_controller/LOCAL_PHOTOS_pick_news/'.$date.'');

	    		}

	    	}
	    }else{

            $this->session->set_flashdata('msg_error','Please Login Now');
			redirect('Welcome/index', 'refresh');

		}

    }
    public function transelate(){

        $apiKey = 'AIzaSyCsEPj0nUNncs3X9l7N1CbU8WNCVGuPcb8';
        $story_text=$_POST['story_text'];
	    $url = 'https://www.googleapis.com/language/translate/v2?key=' . $apiKey . '&q=' . rawurlencode($story_text) . '&source=en&target=hi';

	    $handle = curl_init($url);
	    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
	    $response = curl_exec($handle);                 
	    $responseDecoded = json_decode($response, true);
	    curl_close($handle);

	    //echo 'Source: ' . $text . '<br>';
	    //echo 'Translation: ' . $responseDecoded['data']['translations'][0]['translatedText'];
	    if(isset($responseDecoded['data']['translations'][0]['translatedText']))
	    {
	    	echo $responseDecoded['data']['translations'][0]['translatedText'];
	    }
	    else
	    {
	    	echo $_POST['story_text'];
	    }
		
    }

    public function pti_tittle_transelate(){

        $apiKey = 'AIzaSyCsEPj0nUNncs3X9l7N1CbU8WNCVGuPcb8';
        $tittle=$_POST['tittle'];
	    $url = 'https://www.googleapis.com/language/translate/v2?key=' . $apiKey . '&q=' . rawurlencode($tittle) . '&source=en&target=hi';

	    $handle = curl_init($url);
	    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
	    $response = curl_exec($handle);                 
	    $responseDecoded = json_decode($response, true);
	    curl_close($handle);

	    //echo 'Source: ' . $text . '<br>';
	    //echo 'Translation: ' . $responseDecoded['data']['translations'][0]['translatedText'];
	    if(isset($responseDecoded['data']['translations'][0]['translatedText']))
	    {
	    	echo $responseDecoded['data']['translations'][0]['translatedText'];
	    }
	    else
	    {
	    	echo $_POST['tittle'];
	    }
		
    }


    public function pti_subject_transelate(){

        $apiKey = 'AIzaSyCsEPj0nUNncs3X9l7N1CbU8WNCVGuPcb8';
        $subject=$_POST['subject'];
	    $url = 'https://www.googleapis.com/language/translate/v2?key=' . $apiKey . '&q=' . rawurlencode($subject) . '&source=en&target=hi';

	    $handle = curl_init($url);
	    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
	    $response = curl_exec($handle);                 
	    $responseDecoded = json_decode($response, true);
	    curl_close($handle);

	    //echo 'Source: ' . $text . '<br>';
	    //echo 'Translation: ' . $responseDecoded['data']['translations'][0]['translatedText'];
	    if(isset($responseDecoded['data']['translations'][0]['translatedText']))
	    {
	    	echo $responseDecoded['data']['translations'][0]['translatedText'];
	    }
	    else
	    {
	    	echo $_POST['subject'];
	    }
		
    }
    public function pti_eng_translate(){

        $apiKey = 'AIzaSyCsEPj0nUNncs3X9l7N1CbU8WNCVGuPcb8';
        $text=$_POST['text'];
	    $url = 'https://www.googleapis.com/language/translate/v2?key=' . $apiKey . '&q=' . rawurlencode($text) . '&source=en&target=hi';

	    $handle = curl_init($url);
	    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
	    $response = curl_exec($handle);                 
	    $responseDecoded = json_decode($response, true);
	    curl_close($handle);

	    //echo 'Source: ' . $text . '<br>';
	    //echo 'Translation: ' . $responseDecoded['data']['translations'][0]['translatedText'];
	    if(isset($responseDecoded['data']['translations'][0]['translatedText']))
	    {
	    	echo $responseDecoded['data']['translations'][0]['translatedText'];
	    }
	    else
	    {
	    	echo $_POST['text'];
	    }
		
    }



    // for other news
     public function other_news_translate(){

        $apiKey = 'AIzaSyCsEPj0nUNncs3X9l7N1CbU8WNCVGuPcb8';
        $text=$_POST['text'];
	    $url = 'https://www.googleapis.com/language/translate/v2?key=' . $apiKey . '&q=' . rawurlencode($text) . '&source=bn&target=hi';

	    $handle = curl_init($url);
	    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
	    $response = curl_exec($handle);                 
	    $responseDecoded = json_decode($response, true);
	    curl_close($handle);

	    //echo 'Source: ' . $text . '<br>';
	    //echo 'Translation: ' . $responseDecoded['data']['translations'][0]['translatedText'];
	    if(isset($responseDecoded['data']['translations'][0]['translatedText']))
	    {
	    	echo $responseDecoded['data']['translations'][0]['translatedText'];
	    }
	    else
	    {
	    	echo $_POST['text'];
	    }
		
    }
    public function local_news_translate(){

        $apiKey = 'AIzaSyCsEPj0nUNncs3X9l7N1CbU8WNCVGuPcb8';
        $text=$_POST['text'];
	    $url = 'https://www.googleapis.com/language/translate/v2?key=' . $apiKey . '&q=' . rawurlencode($text) . '&source=bn&target=hi';

	    $handle = curl_init($url);
	    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
	    $response = curl_exec($handle);                 
	    $responseDecoded = json_decode($response, true);
	    curl_close($handle);

	    //echo 'Source: ' . $text . '<br>';
	    //echo 'Translation: ' . $responseDecoded['data']['translations'][0]['translatedText'];
	    if(isset($responseDecoded['data']['translations'][0]['translatedText']))
	    {
	    	echo $responseDecoded['data']['translations'][0]['translatedText'];
	    }
	    else
	    {
	    	echo $_POST['text'];
	    }
		
    }
    public function local_photo_tittle_transelate(){

        $apiKey = 'AIzaSyCsEPj0nUNncs3X9l7N1CbU8WNCVGuPcb8';
        $tittle=$_POST['tittle'];
	    $url = 'https://www.googleapis.com/language/translate/v2?key=' . $apiKey . '&q=' . rawurlencode($tittle) . '&source=bn&target=hi';

	    $handle = curl_init($url);
	    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
	    $response = curl_exec($handle);                 
	    $responseDecoded = json_decode($response, true);
	    curl_close($handle);

	    //echo 'Source: ' . $text . '<br>';
	    //echo 'Translation: ' . $responseDecoded['data']['translations'][0]['translatedText'];
	    if(isset($responseDecoded['data']['translations'][0]['translatedText']))
	    {
	    	echo $responseDecoded['data']['translations'][0]['translatedText'];
	    }
	    else
	    {
	    	echo $_POST['tittle'];
	    }
		
    }


    public function local_photo_subject_transelate(){

        $apiKey = 'AIzaSyCsEPj0nUNncs3X9l7N1CbU8WNCVGuPcb8';
        $subject=$_POST['subject'];
	    $url = 'https://www.googleapis.com/language/translate/v2?key=' . $apiKey . '&q=' . rawurlencode($subject) . '&source=bn&target=hi';

	    $handle = curl_init($url);
	    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
	    $response = curl_exec($handle);                 
	    $responseDecoded = json_decode($response, true);
	    curl_close($handle);

	    //echo 'Source: ' . $text . '<br>';
	    //echo 'Translation: ' . $responseDecoded['data']['translations'][0]['translatedText'];
	    if(isset($responseDecoded['data']['translations'][0]['translatedText']))
	    {
	    	echo $responseDecoded['data']['translations'][0]['translatedText'];
	    }
	    else
	    {
	    	echo $_POST['subject'];
	    }
		
    }




   



    
    

    





}
?>