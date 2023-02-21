<?php
defined('BASEPATH') or exit('No direct script access allowed');


class File_controller extends CI_Controller{

	public function __construct()
    {
            parent::__construct();


            $this->load->helper('url');          
            $this->load->model('Main_model');
            $this->load->model('New_model');
	        $this->load->helper('url_helper');
	        $this->load->helper('form');
	        $this->load->library('form_validation');
	        $this->load->library('session');
	        
	        
    }

     // all functions for pti bhasha


    public function pti_bhasha(){
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
            $timezone=date_default_timezone_set("Asia/Calcutta");
		    $date=date('d-m-y');
		    if(!file_exists('document_uploads/picked/'.$date.'/')){


	        	$d=mkdir('document_uploads/picked/'.$date.'/', 0777, true);
	        }
		    if(!file_exists('document_uploads/picked/'.$date.'/PTI_BHASHA')){
				$dt=mkdir('document_uploads/picked/'.$date.'/PTI_BHASHA', 0777, true);
					
			}
			if(!file_exists('document_uploads/'.$date.'/')){


	        	$dm=mkdir('document_uploads/'.$date.'/', 0777, true);
	        }
	        if(!file_exists('document_uploads/'.$date.'/PTI_BHASHA')){
				$dn=mkdir('document_uploads/'.$date.'/PTI_BHASHA', 0777, true);
					
			}
			
			$scan_result['result']=scandir('news_folder/pti_bhasha');
			// $scan_folder=scandir('document_uploads/PTI_BHASHA');

			
	    	foreach ($scan_result['result'] as $key) {
				$length=strlen($key);			
			    if(filesize("news_folder/pti_bhasha/".$key."")>0 && $length>5){
			    	
					$myfile = fopen("news_folder/pti_bhasha/".$key."", "r");
					$s=fread($myfile,filesize("news_folder/pti_bhasha/".$key.""));
					$text = iconv('UTF-16LE', 'UTF-8', $s);
					$file_cre_date=date ("d-m-y", filectime("news_folder/pti_bhasha/".$key.""));
					$file_cre_date_time=date ("d-m-y H:i:s", filectime("news_folder/pti_bhasha/".$key."")); 
					$file_mod_date=date ("d-m-y", filemtime("news_folder/pti_bhasha/".$key.""));
					 // echo '/'.$key.'='.$file_cre_date.'/';
					fclose($myfile);
					
				    $file_from="news_folder/pti_bhasha/".$key."";
				    $destination1="document_uploads/".$date."/PTI_BHASHA/".$key."";
				   
					if(!file_exists("document_uploads/".$date."/PTI_BHASHA/".$key."")){
						$c=copy($file_from,$destination1);
						
						
					}
										
					$data=array(
						"file_name"=>"$key",
						"text"=>"$text",
						"date"=>"$file_cre_date",
						"file_creation_date_time"=>"$file_cre_date_time"


					);
					if($date==$file_cre_date){
					   $this->Main_model->pti_bhasha_store($data);
					}	
					
				}

			}
		
	       
			$get_file['file_name']=$this->Main_model->get_pti_bhasha_file($arr_atart);
		    $get_file['file_number']=$this->Main_model->pti_bhasha_file_no();
		    $get_file['page_number']=$page_no;
		    $get_file['arr_atart']=$arr_atart;
		  
			

			$dash_active['pti_bhasha_act']=1;

    		
	        $this->load->view('header',$dash_active);
			$this->load->view('file/pti_bhasha',$get_file);
			$this->load->view('footer');
		}else{

            $this->session->set_flashdata('msg_error','Please Login Now');
			redirect('Welcome/index', 'refresh');

		}
	}
	public function pti_english(){
		header("Refresh: 30;");
		if($this->session->userdata('user_id')!=""){

			if(isset($_POST['pti_eng_page'])){
			    $page_no=$_POST['page_no'];
				$arr_atart=($page_no-1)*5;
			}
			else{
	            $page_no=1;
		    	$arr_atart=0;
		    	
		    }
             $timezone=date_default_timezone_set("Asia/Calcutta");
		    $date=date('d-m-y');
			if(!file_exists('document_uploads/'.$date.'/')){


	        	$d=mkdir('document_uploads/'.$date.'/', 0777, true);
	        }
	        if(!file_exists("document_uploads/".$date.'/PTI_ENG')){
				$ds=mkdir('document_uploads/'.$date.'/PTI_ENG', 0777, true);
					
			}
			if(!file_exists("document_uploads/picked/".$date.'/PTI_ENG')){
				$dt=mkdir('document_uploads/picked/'.$date.'/PTI_ENG', 0777, true);
					
			}


			$scan_result['result']=scandir('news_folder/pti_english');
			// $scan_folder=scandir('document_uploads/PTI_ENG');

			foreach ($scan_result['result'] as $key) {
				$length=strlen($key);
				if(filesize("news_folder/pti_english/".$key."")>0 && $length>5){

					$myfile = fopen("news_folder/pti_english/".$key."", "r");
					// $s=fread($myfile,filesize("C:\Wire_Agency\PTI_ENG/".$key.""));
					$text=fread($myfile,filesize("news_folder/pti_english/".$key.""));
					$file_cre_date=date ("d-m-y", filectime("news_folder/pti_english/".$key.""));
					$file_cre_date_time=date ("d-m-y H:i:s", filectime("news_folder/pti_english/".$key."")); 
					$file_mod_date=date ("d-m-y", filemtime("news_folder/pti_english/".$key.""));
					 // echo '/'.$key.'='.$file_cre_date.'/';
					// $text = iconv('UTF-16LE', 'UTF-8', $s);
					
					fclose($myfile);
					
			        $file_from="news_folder/pti_english/".$key."";
				    $destination1="document_uploads/".$date."/PTI_ENG/".$key."";
					if(!file_exists("document_uploads/".$date."/PTI_ENG/".$key."")){
						$c=copy($file_from,$destination1);
						
						
					}
					
					$data=array(
						"file_name"=>"$key",
						"text"=>"$text",
						"date"=>"$file_cre_date",
						"file_creation_date_time"=>"$file_cre_date_time"


					);
					if($date==$file_cre_date){
					   $this->Main_model->pti_english_store($data);
					}
				}
		
			}
			$get_file['file_name']=$this->Main_model->get_pti_english_file($arr_atart);
		    $get_file['file_number']=$this->Main_model->pti_english_file_no();
		    $get_file['page_number']=$page_no;
		     $get_file['arr_atart']=$arr_atart;
		      

			$dash_active['pti_eng_act']=1;

    		
	        $this->load->view('header',$dash_active);
			$this->load->view('file/pti_english',$get_file);
			$this->load->view('footer');
		}else{
			$this->session->set_flashdata('msg_error','Please Login Now');
			redirect('Welcome/index', 'refresh');

		}
		
		
	}
	public function uni_varta(){
		header("Refresh: 30;");
		if($this->session->userdata('user_id')!=""){

			if(isset($_POST['uni_varta_page'])){
			    $page_no=$_POST['page_no'];
				$arr_atart=($page_no-1)*5;
			}
			else{
	            $page_no=1;
		    	$arr_atart=0;
		    	
		    }


             $timezone=date_default_timezone_set("Asia/Calcutta");
		     $date=date('d-m-y');
			if(!file_exists('document_uploads/'.$date.'/')){


	        	$d=mkdir('document_uploads/'.$date.'/', 0777, true);
	        }
	        if(!file_exists("document_uploads/".$date.'/UNI_Varta')){
				$ds=mkdir('document_uploads/'.$date.'/UNI_Varta', 0777, true);
					
			}
			if(!file_exists("document_uploads/picked/".$date.'/UNI_Varta')){
				$dt=mkdir('document_uploads/picked/'.$date.'/UNI_Varta', 0777, true);
					
			}



			$scan_result['result']=scandir('news_folder/uni_varta');
			// $scan_folder=scandir('document_uploads/UNI_Varta');

			foreach ($scan_result['result'] as $key) {
				 $length=strlen($key);
				
				
			    if(filesize("news_folder/uni_varta/".$key."")>0 && $length>4){

					$myfile = fopen("news_folder/uni_varta/".$key."", "r");
					$s=fread($myfile,filesize("news_folder/uni_varta/".$key.""));
					$file_cre_date=date ("d-m-y", filectime("news_folder/uni_varta/".$key.""));
					$file_cre_date_time=date ("d-m-y H:i:s", filectime("news_folder/uni_varta/".$key."")); 
					$file_mod_date=date ("d-m-y", filemtime("news_folder/uni_varta/".$key.""));
					 // echo '/'.$key.'='.$file_cre_date.'/';
					$text = iconv('UTF-16LE', 'UTF-8', $s);
					
					fclose($myfile);
					
			        $file_from="news_folder/uni_varta/".$key."";
				    $destination1="document_uploads/".$date."/UNI_Varta/".$key."";
					if(!file_exists("document_uploads/".$date."/UNI_Varta/".$key."")){
						$c=copy($file_from,$destination1);
						
					}
					
					$data=array(
						"file_name"=>"$key",
						"text"=>"$text",
						"date"=>"$file_cre_date",
						"file_creation_date_time"=>"$file_cre_date_time"


					);
					if($date==$file_cre_date){
					    $this->Main_model->uni_varta_store($data);
					}
					
				
					
				}
				
			}
			
			$get_file['file_name']=$this->Main_model->get_uni_varta_file($arr_atart);
		    $get_file['file_number']=$this->Main_model->uni_varta_file_no();
		     $get_file['page_number']=$page_no;
		      $get_file['arr_atart']=$arr_atart;
		       

			$dash_active['uni_varta_act']=1;

    		
	        $this->load->view('header',$dash_active);
			$this->load->view('file/uni_varta',$get_file);
			$this->load->view('footer');
		}else{
			$this->session->set_flashdata('msg_error','Please Login Now');
			redirect('Welcome/index', 'refresh');



		}
		
		
	}
	public function pti_photos(){
		header("Refresh: 30;");
		if($this->session->userdata('user_id')!=""){

	    	if(isset($_POST['pti_photo_page'])){
			    $page_no=$_POST['page_no'];
				$arr_atart=($page_no-1)*5;
			}
			else{
	            $page_no=1;
		    	$arr_atart=0;
		    	
		    }
            $timezone=date_default_timezone_set("Asia/Calcutta");
		    $date=date('d-m-y');
			if(!file_exists('document_uploads/'.$date.'/')){


	        	$d=mkdir('document_uploads/'.$date.'/', 0777, true);
	        }
	        if(!file_exists("document_uploads/".$date.'/PTI_Photos')){
				$ds=mkdir('document_uploads/'.$date.'/PTI_Photos', 0777, true);
					
			}
			if(!file_exists("document_uploads/picked/".$date.'/PTI_Photos')){
				$dt=mkdir('document_uploads/picked/'.$date.'/PTI_Photos', 0777, true);
					
			}

			$scan['scan_result']=scandir('news_folder/pti_photos');
			// $scan_folder=scandir('document_uploads/PTI_Photos'); 

			foreach($scan['scan_result'] as $val){
				$length=strlen($val);
				if($length>3){ 
				    
		            $file_from="news_folder/pti_photos/".$val."";
				    $destination="document_uploads/".$date.'/PTI_Photos/'.$val."";
				    $file_cre_date=date ("d-m-y", filectime("news_folder/pti_photos/".$val.""));
					$file_cre_date_time=date ("d-m-y H:i:s", filectime("news_folder/pti_photos/".$val."")); 
					$file_mod_date=date ("d-m-y", filemtime("news_folder/pti_photos/".$val.""));
				    if(!file_exists("document_uploads/".$date."/PTI_Photos/".$val."")){
		                $a=copy($file_from, $destination);
		                
		            }
		           
			                
					$data=array(
						"file_name"=>"$val",
						"date"=>"$file_cre_date",
						"file_creation_date_time"=>"$file_cre_date_time"						
					);
					if($date==$file_cre_date){
				  	   $this->Main_model->pti_photos_store($data);
				  	}

				    
				    
				}
			    


			}
			$get_file['file_name']=$this->Main_model->get_pti_photos_file($arr_atart);
		    $get_file['file_number']=$this->Main_model->pti_photos_file_no();
		    $get_file['page_number']=$page_no;
		    $get_file['arr_atart']=$arr_atart;
			
			$dash_active['pti_photos_act']=1;

    		
	        $this->load->view('header',$dash_active);
			$this->load->view('file/pti_photos',$get_file);
			$this->load->view('footer');
		}else{
			$this->session->set_flashdata('msg_error','Please Login Now');
			redirect('Welcome/index', 'refresh');



		}
		
		
	}
	public function uni_photos(){  
		header("Refresh: 30;");
	    if($this->session->userdata('user_id')!=""){      
	        if(isset($_POST['uni_photo_page'])){
			    $page_no=$_POST['page_no'];
				$arr_atart=($page_no-1)*5;
			}
			else{
	            $page_no=1;
		    	$arr_atart=0;
		    	
		    }
            $timezone=date_default_timezone_set("Asia/Calcutta");
		    $date=date('d-m-y');
		    
			
			if(!file_exists('document_uploads/'.$date.'/')){


	        	$ds=mkdir('document_uploads/'.$date.'/', 0777, true);
	        }
	        if(!file_exists("document_uploads/".$date.'/UNI_Photos')){
				$d=mkdir('document_uploads/'.$date.'/UNI_Photos', 0777, true);
					
			}
			if(!file_exists("document_uploads/picked/".$date.'/UNI_Photos')){
				$dt=mkdir('document_uploads/picked/'.$date.'/UNI_Photos', 0777, true);
					
			}

			$scan['scan_result']=scandir('news_folder/uni_photos');
			// $scan_folder=scandir('document_uploads/UNI_Photos'); 
			
			foreach($scan['scan_result'] as $val){
				$length=strlen($val);
				if($length>3){
				    
					$file_from="news_folder/uni_photos/".$val."";
				    $destination="document_uploads/".$date.'/UNI_Photos/'.$val."";
				    $file_cre_date=date ("d-m-y", filectime("news_folder/uni_photos/".$val.""));
					$file_cre_date_time=date ("d-m-y H:i:s", filectime("news_folder/uni_photos/".$val."")); 
					$file_mod_date=date ("d-m-y", filemtime("news_folder/uni_photos/".$val.""));
				   
				    if(!file_exists("document_uploads/".$date.'/UNI_Photos/'.$val."")){
		                 $a=copy($file_from, $destination);
		                 
		            }

		                  
	                $data=array(
							"file_name"=>"$val",
							"date"=>"$file_cre_date",
						    "file_creation_date_time"=>"$file_cre_date_time"
							
					);
					if($date==$file_cre_date){
					   $this->Main_model->uni_photos_store($data);
					}
		                	             			    			    
				}
						    
			}
			$get_file['file_name']=$this->Main_model->get_uni_photos_file($arr_atart);
		    $get_file['file_number']=$this->Main_model->uni_photos_file_no();
		     $get_file['page_number']=$page_no;
		      $get_file['arr_atart']=$arr_atart;
			
			$dash_active['uni_photos_act']=1;

    		
	        $this->load->view('header',$dash_active);
			$this->load->view('file/uni_photos',$get_file);
			$this->load->view('footer');
		}else{
			$this->session->set_flashdata('msg_error','Please Login Now');
			redirect('Welcome/index', 'refresh');



		}
			
	}

	public function pick_bhasha_story(){
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
					

					$scan_result=scandir('document_uploads/picked/'.$date.'/PTI_BHASHA');
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
							if(!file_exists('document_uploads/picked/'.$date.'/PTI_BHASHA/'.$story_id.'[@]'.$key.'[@]'.$new_pick_by.'[@]'.$page_ed.'[@]'.$page_no.'/')){

				                $dd=mkdir('document_uploads/picked/'.$date.'/PTI_BHASHA/'.$story_id.'[@]'.$key.'[@]'.$new_pick_by.'[@]'.$page_ed.'[@]'.$page_no.'/', 0777, true);
							}
							
							
									    
									   
						    $file_from='document_uploads/'.$date.'/PTI_BHASHA/'.$key.'';					        
					        $destination2='document_uploads/picked/'.$date.'/PTI_BHASHA/'.$story_id.'[@]'.$key.'[@]'.$new_pick_by.'[@]'.$page_ed.'[@]'.$page_no.'/'.$key.'';
								        
					        if(!file_exists('document_uploads/picked/'.$date.'/PTI_BHASHA/'.$story_id.'[@]'.$key.'[@]'.$new_pick_by.'[@]'.$page_ed.'[@]'.$page_no.'/'.$key.'')){

						        
						         $a=copy($file_from,$destination2);
						         if($a==true){

						         	$data=array(
							         	"story_name"=>"$key",			         	
							         	"story_date"=>"$date",
							         	"pick_date"=>"$date",
							         	"pick_by"=>"$new_pick_by"
							         );
							         $data_res=$this->New_model->pick_bhasha_get_det($data);


							         $data2=array(
								         "story_id"=>"$data_res->id",				         
								         "story_date"=>"$data_res->date",
								         "story_name"=>"$key",			         					       
								         "pick_date"=>"$date",
								         "pick_by"=>"$new_pick_by",
								          "edition"=>"$page_ed",
								         "page"=>"$page_no"
								     );
							         $data_res2=$this->New_model->pick_bhasha_db_store($data2);
							         if($data_res2==true){
				                         $m=true;

							         }						
						         }
						         else{
						         	$m=false;
						         }
						     }else{
						     	$this->session->set_flashdata('msg_error','File Was Allready Picked By You For This Edition::'.$page_ed.'');
					            redirect('File_controller/pti_bhasha');


						     }
				               
				         
				    }
				    else{
				    	$this->session->set_flashdata('msg_error','File Was Allready Picked By Someone For This Edition::'.$page_ed.'');
					    redirect('File_controller/pti_bhasha');

				    }


				    if($m==true){
				    	$this->session->set_flashdata('msg','File Was  Picked Successfully,For This Edition');
					    redirect('File_controller/pti_bhasha');

					}
					else{
						$this->session->set_flashdata('msg_error','File Was Not Picked Successfully');
					    redirect('File_controller/pti_bhasha');

					}
							
							    


				}
				else{
					$this->session->set_flashdata('msg_error','Picked Not Done Correctly');
				    redirect('File_controller/pti_bhasha');

				}
				
				
			}
			else{
				$this->session->set_flashdata('msg_error','Select The Edition & Page Correctly');
			    redirect('File_controller/pti_bhasha');	
			}
		}else{

            $this->session->set_flashdata('msg_error','Please Login Now');
			redirect('Welcome/index', 'refresh');


		}
	}


	// all functions for pti english

	


	
	public function pick_english_story(){
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
		        	
					$scan_result=scandir('document_uploads/picked/'.$date.'/PTI_ENG');
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

						if(!file_exists('document_uploads/picked/'.$date.'/PTI_ENG/'.$story_id.'[@]'.$key.'[@]'.$new_pick_by.'[@]'.$page_ed.'[@]'.$page_no.'/')){

		                        $dd=mkdir('document_uploads/picked/'.$date.'/PTI_ENG/'.$story_id.'[@]'.$key.'[@]'.$new_pick_by.'[@]'.$page_ed.'[@]'.$page_no.'/', 0777, true);
						}
								   

					    $file_from="document_uploads/".$date.'/PTI_ENG/'.$key."";					      					        
				        $destination2='document_uploads/picked/'.$date.'/PTI_ENG/'.$story_id.'[@]'.$key.'[@]'.$new_pick_by.'[@]'.$page_ed.'[@]'.$page_no.'/'.$key.'';


				        if(!file_exists('document_uploads/picked/'.$date.'/PTI_ENG/'.$story_id.'[@]'.$key.'[@]'.$new_pick_by.'[@]'.$page_ed.'[@]'.$page_no.'/'.$key.'')){

					       
					        $a=copy($file_from,$destination2);
					        if($a==true){

					        	$data=array(
						         	"story_name"=>"$key",			         	
						         	"story_date"=>"$date",
						         	"pick_date"=>"$date",
						         	"pick_by"=>"$new_pick_by"
						         );
						         $data_res=$this->New_model->pick_english_get_det($data);


						         $data2=array(
							         "story_id"=>"$data_res->id",				         
							         "story_date"=>"$data_res->date",
							         "story_name"=>"$key",			         					       
							         "pick_date"=>"$date",
							         "pick_by"=>"$new_pick_by",
							          "edition"=>"$page_ed",
							         "page"=>"$page_no"
							     );
						         $data_res2=$this->New_model->pick_english_db_store($data2);
						         if($data_res2==true){
			                         $m=true;

						         }		

								$m=true;
					        }
					        else{
					         	$m=false;
					        }
					    }else{
						     	$this->session->set_flashdata('msg_error','File Was Allready Picked By You For This Edition::'.$page_ed.'');
					            redirect('File_controller/pti_bhasha');


						}
				    }
				    else{
				    	$this->session->set_flashdata('msg_error','File Was Allready Picked By Someone');
					    redirect('File_controller/pti_english');

				    }


				    if($m==true){
				    	$this->session->set_flashdata('msg','File Was  Picked Successfully');
					    redirect('File_controller/pti_english');

					}
					else{
						$this->session->set_flashdata('msg_error','File Was Not Picked Successfully');
					    redirect('File_controller/pti_english');

					}
							
							    


				}
				else{
					$this->session->set_flashdata('msg_error','Picked Not Done Correctly');
				    redirect('File_controller/pti_english');

				}
					
					
			}
			else{
				$this->session->set_flashdata('msg_error','Select The Edition & Page Correctly');
				redirect('File_controller/pti_english');
			}
		}else{

            $this->session->set_flashdata('msg_error','Please Login Now');
			redirect('Welcome/index', 'refresh');


		}
}




// all functions for uni varta

	
	

	public function pick_varta_story(){
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
					
					

					$scan_result=scandir('document_uploads/picked/'.$date.'/UNI_Varta');
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
							if(!file_exists('document_uploads/picked/'.$date.'/UNI_Varta/'.$story_id.'[@]'.$key.'[@]'.$new_pick_by.'[@]'.$page_ed.'[@]'.$page_no.'/')){

			                        $dd=mkdir('document_uploads/picked/'.$date.'/UNI_Varta/'.$story_id.'[@]'.$key.'[@]'.$new_pick_by.'[@]'.$page_ed.'[@]'.$page_no.'/', 0777, true);
							}
									   

						    $file_from="document_uploads/".$date.'/UNI_Varta/'.$key."";					      					        
					        $destination2='document_uploads/picked/'.$date.'/UNI_Varta/'.$story_id.'[@]'.$key.'[@]'.$new_pick_by.'[@]'.$page_ed.'[@]'.$page_no.'/'.$key.'';


					        if(!file_exists('document_uploads/picked/'.$date.'/UNI_Varta/'.$story_id.'[@]'.$key.'[@]'.$new_pick_by.'[@]'.$page_ed.'[@]'.$page_no.'/'.$key.'')){
						       
					            $a=copy($file_from,$destination2);			        
						        if($a==true){
						            $data=array(
							         	"story_name"=>"$key",			         	
							         	"story_date"=>"$date",
							         	"pick_date"=>"$date",
							         	"pick_by"=>"$new_pick_by"
							         );
							         $data_res=$this->New_model->pick_uni_varta_get_det($data);


							         $data2=array(
								         "story_id"=>"$data_res->id",				         
								         "story_date"=>"$data_res->date",
								         "story_name"=>"$key",			         					       
								         "pick_date"=>"$date",
								         "pick_by"=>"$new_pick_by",
								          "edition"=>"$page_ed",
								         "page"=>"$page_no"
								     );
							         $data_res2=$this->New_model->pick_uni_varta_db_store($data2);
							         if($data_res2==true){
				                         $m=true;

							         }					       
									$m=true;
						        }
						        else{
						         	$m=false;
						        }
				        }else{
				     	     $this->session->set_flashdata('msg_error','File Was Allready Picked By You For This Edition::'.$page_ed.'');
			                  redirect('File_controller/pti_bhasha');
						}
				    }
				    else{
				    	$this->session->set_flashdata('msg_error','File Was Allready Picked By Someone');
					    redirect('File_controller/uni_varta');

				    }
				    if($m==true){
				    	$this->session->set_flashdata('msg','File Was  Picked Successfully');
					    redirect('File_controller/uni_varta');

					}
					else{
						$this->session->set_flashdata('msg_error','File Was Not Picked Successfully');
					    redirect('File_controller/uni_varta');

					}
								
								    


							
				}else{
					$this->session->set_flashdata('msg_error','Picked Not Done Correctly');
				    redirect('File_controller/uni_varta');

				}
						
						
			}else{
				$this->session->set_flashdata('msg_error','Select The Edition & Page Correctly');
				redirect('File_controller/uni_varta');
			}
		}else{

            $this->session->set_flashdata('msg_error','Please Login Now');
			redirect('Welcome/index', 'refresh');

		}
	}


	public function pick_pti_photos(){
		if($this->session->userdata('user_id')!=""){


			if($_POST['page_no']!="" && $_POST['page_ed']!=""){

				if(isset($_POST['story_date'])){
					$date=$_POST['story_date'];
				}
				else{
					$date=date('d-m-y');
				}
				
	            $page_no=$_POST['page_no'];
	            $page_ed=$_POST['page_ed'];
	            $key=$_POST['pick_file_name'];
	            $story_id=$_POST['story_id'];
	            $pick_by=$this->session->userdata('user_name');
	            $pick_by_emp_id=$this->session->userdata('emp_id');
	            $new_pick_by=''.$pick_by.''.$pick_by_emp_id.'';

				if(isset($_POST['pick_submit_val']) && $_POST['pick_file_name']!=""){

				   

					$scan_result=scandir('document_uploads/picked/'.$date.'/PTI_Photos');
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


							if(!file_exists('document_uploads/picked/'.$date.'/PTI_Photos/'.$story_id.'[@]'.$key.'[@]'.$new_pick_by.'[@]'.$page_ed.'[@]'.$page_no.'/')){

			                        $dd=mkdir('document_uploads/picked/'.$date.'/PTI_Photos/'.$story_id.'[@]'.$key.'[@]'.$new_pick_by.'[@]'.$page_ed.'[@]'.$page_no.'/', 0777, true);
							}
									   

						    $file_from="document_uploads/".$date.'/PTI_Photos/'.$key."";					      					        
					        $destination2='document_uploads/picked/'.$date.'/PTI_Photos/'.$story_id.'[@]'.$key.'[@]'.$new_pick_by.'[@]'.$page_ed.'[@]'.$page_no.'/'.$key.'';


					        if(!file_exists('document_uploads/picked/'.$date.'/PTI_Photos/'.$story_id.'[@]'.$key.'[@]'.$new_pick_by.'[@]'.$page_ed.'[@]'.$page_no.'/'.$key.'')){
						        $a=copy($file_from,$destination2);			       
						        if($a==true){
						        	$data=array(
							         	"story_name"=>"$key",			         	
							         	"story_date"=>"$date",
							         	"pick_date"=>"$date",
							         	"pick_by"=>"$new_pick_by"
							         );
							         $data_res=$this->New_model->pick_pti_photos_get_det($data);


							         $data2=array(
								         "story_id"=>"$data_res->id",				         
								         "story_date"=>"$data_res->date",
								         "story_name"=>"$key",			         					       
								         "pick_date"=>"$date",
								         "pick_by"=>"$new_pick_by",
								          "edition"=>"$page_ed",
								         "page"=>"$page_no"
								     );
							         $data_res2=$this->New_model->pick_pti_photos_db_store($data2);
							         if($data_res2==true){
				                         $m=true;

							         }		

									$m=true;
						        }
						        else{
						         	$m=false;
						        }
						    }else{
				     	       $this->session->set_flashdata('msg_error','File Was Allready Picked By You For This Edition::'.$page_ed.'');
			                    redirect('File_controller/pti_bhasha');
						    }
				    }
				    else{
				    	$this->session->set_flashdata('msg_error','File Was Allready Picked By Someone');
					    redirect('File_controller/pti_photos');

				    }
				    if($m==true){
				    	$this->session->set_flashdata('msg','File Was  Picked Successfully');
					    redirect('File_controller/pti_photos');

					}
					else{
						$this->session->set_flashdata('msg_error','File Was Not Picked Successfully');
					    redirect('File_controller/pti_photos');

					}
						
						    


				}
				else{
					$this->session->set_flashdata('msg_error','Picked Not Done Correctly');
				    redirect('File_controller/pti_photos');

				}
							
							

	         }else{
	         	$this->session->set_flashdata('msg_error','Select The Edition & Page Correctly');
	         	redirect('File_controller/pti_photos');
	         }
	     }else{

            $this->session->set_flashdata('msg_error','Please Login Now');
			redirect('Welcome/index', 'refresh');


	     }
	}
	

	// all functions for uni photos


	
	

	public function pic_uni_photos(){
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
							   
					

					$scan_result=scandir('document_uploads/picked/'.$date.'/UNI_Photos');
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


							if(!file_exists('document_uploads/picked/'.$date.'/UNI_Photos/'.$story_id.'[@]'.$key.'[@]'.$new_pick_by.'[@]'.$page_ed.'[@]'.$page_no.'/')){

			                        $dd=mkdir('document_uploads/picked/'.$date.'/UNI_Photos/'.$story_id.'[@]'.$key.'[@]'.$new_pick_by.'[@]'.$page_ed.'[@]'.$page_no.'/', 0777, true);
							}
									   

						    $file_from="document_uploads/".$date."/UNI_Photos/".$key."";					      					        
					        $destination2='document_uploads/picked/'.$date.'/UNI_Photos/'.$story_id.'[@]'.$key.'[@]'.$new_pick_by.'[@]'.$page_ed.'[@]'.$page_no.'/'.$key.'';


					        if(!file_exists('document_uploads/picked/'.$date.'/UNI_Photos/'.$story_id.'[@]'.$key.'[@]'.$new_pick_by.'[@]'.$page_ed.'[@]'.$page_no.'/'.$key.'')){

								$a=copy($file_from,$destination2);		        								
						        if($a==true){
						        	$data=array(
							         	"story_name"=>"$key",			         	
							         	"story_date"=>"$date",
							         	"pick_date"=>"$date",
							         	"pick_by"=>"$new_pick_by"
							         );
							         $data_res=$this->New_model->pick_uni_photos_get_det($data);


							         $data2=array(
								         "story_id"=>"$data_res->id",				         
								         "story_date"=>"$data_res->date",
								         "story_name"=>"$key",			         					       
								         "pick_date"=>"$date",
								         "pick_by"=>"$new_pick_by",
								         "edition"=>"$page_ed",
								         "page"=>"$page_no"
								     );
							         $data_res2=$this->New_model->pick_uni_photos_db_store($data2);
							         if($data_res2==true){
				                         $m=true;

							         }		

									$m=true;
						        }
						        else{
						         	$m=false;
						        }
						    }else{
				     	        $this->session->set_flashdata('msg_error','File Was Allready Picked By You For This Edition::'.$page_ed.'');
			                    redirect('File_controller/pti_bhasha');
						    }
				    }
				    else{
				    	$this->session->set_flashdata('msg_error','File Was Allready Picked By Someone');
					    redirect('File_controller/uni_photos');

				    }
				    if($m==true){
				    	$this->session->set_flashdata('msg','File Was  Picked Successfully');
					    redirect('File_controller/uni_photos');

					}
					else{
						$this->session->set_flashdata('msg_error','File Was Not Picked Successfully');
					    redirect('File_controller/uni_photos');

					}
							
				}
				else{
					$this->session->set_flashdata('msg_error','Picked Not Done Correctly');
				    redirect('File_controller/uni_photos');

				}
					
					

			}else{
				$this->session->set_flashdata('msg_error','Select The Edition & Page Correctly');

	            redirect('File_controller/uni_photos');


			}
		}else{

            $this->session->set_flashdata('msg_error','Please Login Now');
			redirect('Welcome/index', 'refresh');

		}
	}
	
	// this is for pti photos
	
    



	
	
	
	
	

	











































}
?>