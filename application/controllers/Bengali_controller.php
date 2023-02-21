<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Bengali_controller extends CI_Controller{

	public function __construct()
    {
            parent::__construct();


            $this->load->helper('url');          
            $this->load->model('Bengali_model');
            $this->load->model('New_model');
	        $this->load->helper('url_helper');
	        $this->load->helper('form');
	        $this->load->library('form_validation');
	        $this->load->library('session');
	        
	        
    }

     // all functions for pti bhasha


    public function other_news(){
    	header("Refresh: 30;");
    	 if($this->session->userdata('user_id')!=""){
			if(isset($_POST['pti_bengali_page'])){
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
		    if(!file_exists('document_uploads/picked/'.$date.'/OTHER_NEWS')){
				$dt=mkdir('document_uploads/picked/'.$date.'/OTHER_NEWS', 0777, true);
					
			}
			if(!file_exists('document_uploads/'.$date.'/')){


	        	$dm=mkdir('document_uploads/'.$date.'/', 0777, true);
	        }
	        if(!file_exists('document_uploads/'.$date.'/OTHER_NEWS')){
				$dn=mkdir('document_uploads/'.$date.'/OTHER_NEWS', 0777, true);
					
			}
			
			$scan_result['result']=scandir('news_folder/other_news');
			// $scan_folder=scandir('document_uploads/PTI_BHASHA');
			
	    	foreach ($scan_result['result'] as $key) {
				$length=strlen($key);			
			    if(filesize("news_folder/other_news/".$key."")>0 && $length>5){
			    	
					$myfile = fopen("news_folder/other_news/".$key."", "r");
					$text=fread($myfile,filesize("news_folder/other_news/".$key.""));
					$file_cre_date=date ("d-m-y", filectime("news_folder/other_news/".$key.""));
					$file_cre_date_time=date ("d-m-y H:i:s", filectime("news_folder/other_news/".$key."")); 
					$file_mod_date=date ("d-m-y", filemtime("news_folder/other_news/".$key.""));
					// $text = iconv('UTF-16LE', 'UTF-8', $s);
					fclose($myfile);
					
				    $file_from="news_folder/other_news/".$key."";
				    $destination1="document_uploads/".$date."/OTHER_NEWS/".$key."";
				   
					if(!file_exists("document_uploads/".$date."/OTHER_NEWS/".$key."")){
						$c=copy($file_from,$destination1);
						
						
					}
										
					$data=array(
						"file_name"=>"$key",
						"text"=>"$text",
						"date"=>"$file_cre_date",
						"file_creation_date_time"=>"$file_cre_date_time"


					);
					if($date==$file_cre_date){
					   $this->Bengali_model->other_news_store($data);
					   }	
					
				}
			}
	       
			$get_file['file_name']=$this->Bengali_model->get_other_news_file($arr_atart);
		    $get_file['file_number']=$this->Bengali_model->other_news_file_no();
		    $get_file['page_number']=$page_no;
		    $get_file['arr_atart']=$arr_atart;
			

			$dash_active['bengali_story_act']=1;

    		
	        $this->load->view('header',$dash_active);
			$this->load->view('other/other_news',$get_file);
			$this->load->view('footer');
		}else{

            $this->session->set_flashdata('msg_error','Please Login Now');
			redirect('Welcome/index', 'refresh');

		}
	}
	
	
			
	
	

	public function pick_other_news(){
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
					

					$scan_result=scandir('document_uploads/picked/'.$date.'/OTHER_NEWS');
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
							if(!file_exists('document_uploads/picked/'.$date.'/OTHER_NEWS/'.$story_id.'[@]'.$key.'[@]'.$new_pick_by.'[@]'.$page_ed.'[@]'.$page_no.'/')){

				                $dd=mkdir('document_uploads/picked/'.$date.'/OTHER_NEWS/'.$story_id.'[@]'.$key.'[@]'.$new_pick_by.'[@]'.$page_ed.'[@]'.$page_no.'/', 0777, true);
							}
							
							
									    
									   
						    $file_from='document_uploads/'.$date.'/OTHER_NEWS/'.$key.'';					        
					        $destination2='document_uploads/picked/'.$date.'/OTHER_NEWS/'.$story_id.'[@]'.$key.'[@]'.$new_pick_by.'[@]'.$page_ed.'[@]'.$page_no.'/'.$key.'';
								        
					        if(!file_exists('document_uploads/picked/'.$date.'/OTHER_NEWS/'.$story_id.'[@]'.$key.'[@]'.$new_pick_by.'[@]'.$page_ed.'[@]'.$page_no.'/'.$key.'')){

						        
						         $a=copy($file_from,$destination2);
						        
						         if($a==true){

						         	$data=array(
							         	"story_name"=>"$key",			         	
							         	"story_date"=>"$date",
							         	"pick_date"=>"$date",
							         	"pick_by"=>"$new_pick_by"
							         );
							         $data_res=$this->Bengali_model->pick_other_news_get_det($data);


							         $data2=array(
								         "story_id"=>"$data_res->id",				         
								         "story_date"=>"$data_res->date",
								         "story_name"=>"$key",			         					       
								         "pick_date"=>"$date",
								         "pick_by"=>"$new_pick_by",
								          "edition"=>"$page_ed",
								         "page"=>"$page_no"
								     );
							         $data_res2=$this->Bengali_model->pick_other_news_db_store($data2);
							         if($data_res2==true){
				                         $m=true;

							         }						
						         }
						         else{
						         	$m=false;
						         }
						     }else{
						     	$this->session->set_flashdata('msg_error','File Was Allready Picked By You For This Edition::'.$page_ed.'');
					            redirect('Bengali_controller/other_news');


						     }
				               
				         
				    }
				    else{
				    	$this->session->set_flashdata('msg_error','File Was Allready Picked By Someone For This Edition::'.$page_ed.'');
					    redirect('Bengali_controller/other_news');

				    }


				    if($m==true){
				    	$this->session->set_flashdata('msg','File Was  Picked Successfully,For This Edition');
					    redirect('Bengali_controller/other_news');

					}
					else{
						$this->session->set_flashdata('msg_error','File Was Not Picked Successfully');
					    redirect('Bengali_controller/other_news');

					}
							
							    


				}
				else{
					$this->session->set_flashdata('msg_error','Picked Not Done Correctly');
				    redirect('Bengali_controller/other_news');

				}
				
				
			}
			else{
				$this->session->set_flashdata('msg_error','Select The Edition & Page Correctly');
			    redirect('Bengali_controller/other_news');	
			}
		}else{

            $this->session->set_flashdata('msg_error','Please Login Now');
			redirect('Welcome/index', 'refresh');


		}
	}


	public function other_photos(){
		header("Refresh: 30;");
		if($this->session->userdata('user_id')!=""){

	    	if(isset($_POST['bengali_photo_page'])){
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
	        if(!file_exists("document_uploads/".$date.'/OTHER_PHOTOS')){
				$ds=mkdir('document_uploads/'.$date.'/OTHER_PHOTOS', 0777, true);
					
			}
			if(!file_exists("document_uploads/picked/".$date.'/OTHER_PHOTOS')){
				$dt=mkdir('document_uploads/picked/'.$date.'/OTHER_PHOTOS', 0777, true);
					
			}

			$scan['scan_result']=scandir('news_folder/other_photos');
			// $scan_folder=scandir('document_uploads/PTI_Photos'); 

			foreach($scan['scan_result'] as $val){
				$length=strlen($val);
				if($length>3){ 
				    
		            $file_from="news_folder/other_photos/".$val."";
				    $destination="document_uploads/".$date.'/OTHER_PHOTOS/'.$val."";
				    $file_cre_date=date ("d-m-y", filectime("news_folder/other_photos/".$val.""));
					$file_cre_date_time=date ("d-m-y H:i:s", filectime("news_folder/other_photos/".$val."")); 
					$file_mod_date=date ("d-m-y", filemtime("news_folder/other_photos/".$val.""));
				    if(!file_exists("document_uploads/".$date."/OTHER_PHOTOS/".$val."")){
		                $a=copy($file_from, $destination);
		                
		            }
		           
			                
					$data=array(
						"file_name"=>"$val",
						"date"=>"$file_cre_date",
						"file_creation_date_time"=>"$file_cre_date_time"							
					);
					if($date==$file_cre_date){
					    $this->Bengali_model->other_photos_store($data);
					}

				    
				    
				}
			    


			}
			$get_file['file_name']=$this->Bengali_model->get_other_photos_file($arr_atart);
		    $get_file['file_number']=$this->Bengali_model->other_photos_file_no();
		    $get_file['page_number']=$page_no;
		    $get_file['arr_atart']=$arr_atart;
			
			$dash_active['bengali_photos_act']=1;

    		
	        $this->load->view('header',$dash_active);
			$this->load->view('other/other_photos',$get_file);
			$this->load->view('footer');
		}else{
			$this->session->set_flashdata('msg_error','Please Login Now');
			redirect('Welcome/index', 'refresh');



		}
		
		
	}
	public function pick_other_photos(){
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

				   

					$scan_result=scandir('document_uploads/picked/'.$date.'/OTHER_PHOTOS');
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


							if(!file_exists('document_uploads/picked/'.$date.'/OTHER_PHOTOS/'.$story_id.'[@]'.$key.'[@]'.$new_pick_by.'[@]'.$page_ed.'[@]'.$page_no.'/')){

			                        $dd=mkdir('document_uploads/picked/'.$date.'/OTHER_PHOTOS/'.$story_id.'[@]'.$key.'[@]'.$new_pick_by.'[@]'.$page_ed.'[@]'.$page_no.'/', 0777, true);
							}
									   

						    $file_from="document_uploads/".$date.'/OTHER_PHOTOS/'.$key."";					      					        
					        $destination2='document_uploads/picked/'.$date.'/OTHER_PHOTOS/'.$story_id.'[@]'.$key.'[@]'.$new_pick_by.'[@]'.$page_ed.'[@]'.$page_no.'/'.$key.'';


					        if(!file_exists('document_uploads/picked/'.$date.'/OTHER_PHOTOS/'.$story_id.'[@]'.$key.'[@]'.$new_pick_by.'[@]'.$page_ed.'[@]'.$page_no.'/'.$key.'')){
						        $a=copy($file_from,$destination2);			       
						        if($a==true){
						        	$data=array(
							         	"story_name"=>"$key",			         	
							         	"story_date"=>"$date",
							         	"pick_date"=>"$date",
							         	"pick_by"=>"$new_pick_by"
							         );
							         $data_res=$this->Bengali_model->pick_other_photos_get_det($data);


							         $data2=array(
								         "story_id"=>"$data_res->id",				         
								         "story_date"=>"$data_res->date",
								         "story_name"=>"$key",			         					       
								         "pick_date"=>"$date",
								         "pick_by"=>"$new_pick_by",
								          "edition"=>"$page_ed",
								         "page"=>"$page_no"
								     );
							         $data_res2=$this->Bengali_model->pick_other_photos_db_store($data2);
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
			                    redirect('Bengali_controller/other_photos');
						    }
				    }
				    else{
				    	$this->session->set_flashdata('msg_error','File Was Allready Picked By Someone');
					    redirect('Bengali_controller/other_photos');

				    }
				    if($m==true){
				    	$this->session->set_flashdata('msg','File Was  Picked Successfully');
					    redirect('Bengali_controller/other_photos');

					}
					else{
						$this->session->set_flashdata('msg_error','File Was Not Picked Successfully');
					    redirect('Bengali_controller/other_photos');

					}
						
						    


				}
				else{
					$this->session->set_flashdata('msg_error','Picked Not Done Correctly');
				    redirect('Bengali_controller/other_photos');

				}
							
							

	         }else{
	         	$this->session->set_flashdata('msg_error','Select The Edition & Page Correctly');
	         	redirect('Bengali_controller/other_photos');
	         }
	     }else{

            $this->session->set_flashdata('msg_error','Please Login Now');
			redirect('Welcome/index', 'refresh');


	     }
	}



	

	
	
}
?>