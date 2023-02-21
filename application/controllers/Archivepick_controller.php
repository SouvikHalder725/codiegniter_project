<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Archivepick_controller extends CI_Controller{

	public function __construct()
    {
            parent::__construct();


            $this->load->helper('url');          
            $this->load->model('Archivepick_model');
            $this->load->model('New_model');
            $this->load->model('Bengali_model');
            $this->load->model('Local_model');
	        $this->load->helper('url_helper');
	        $this->load->helper('form');
	        $this->load->library('form_validation');
	        $this->load->library('session');
	        
    }
	
	public function archive_pick_bhasha_story(){
		if($this->session->userdata('user_id')!=""){
			if($_POST['page_no']!="" && $_POST['page_ed']!=""){
				$date=date('d-m-y');						
	            $page_no=$_POST['page_no'];
	            $page_ed=$_POST['page_ed'];
	            $archive_date=$_POST['archive_date'];
	            $key=$_POST['pick_file_name'];
	            $story_id=$_POST['story_id'];
	            $pick_by=$this->session->userdata('user_name');
	            $pick_by_emp_id=$this->session->userdata('emp_id');
	            $new_pick_by=''.$pick_by.''.$pick_by_emp_id.'';
	          

				
				if(isset($_POST['pick_submit_val']) && $_POST['pick_file_name']!=""){

					if(!file_exists('document_uploads/'.$date.'/PTI_BHASHA/'.$key.'')){

						$file_from='document_uploads/'.$archive_date.'/PTI_BHASHA/'.$key.'';
						$destination1='document_uploads/'.$date.'/PTI_BHASHA/'.$key.'';					        					
			            $date_folder=copy($file_from,$destination1); 
			        }

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
							
							
									    
									   
						    $file_from='document_uploads/'.$archive_date.'/PTI_BHASHA/'.$key.'';					        
					        $destination2='document_uploads/picked/'.$date.'/PTI_BHASHA/'.$story_id.'[@]'.$key.'[@]'.$new_pick_by.'[@]'.$page_ed.'[@]'.$page_no.'/'.$key.'';
								        
					        if(!file_exists('document_uploads/picked/'.$date.'/PTI_BHASHA/'.$story_id.'[@]'.$key.'[@]'.$new_pick_by.'[@]'.$page_ed.'[@]'.$page_no.'/'.$key.'')){

						        
						         $a=copy($file_from,$destination2);
						         if($a==true){

						         	$data_srchive_store=$this->Archivepick_model->pick_bhasha_archive($story_id,$key,$archive_date);

						         	$data=array(
							         	"story_name"=>"$key",			         	
							         	"story_date"=>"$date",
							         	
							         );
							         $data_res=$this->Archivepick_model->pick_bhasha_get_det($data);

                         
							         $data2=array(
								         "story_id"=>"$data_res->id",				         
								         "story_date"=>"$date",
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


	// this is for pti english
	public function archive_pick_pti_eng_story(){
		if($this->session->userdata('user_id')!=""){
			if($_POST['page_no']!="" && $_POST['page_ed']!=""){
				$date=date('d-m-y');						
	            $page_no=$_POST['page_no'];
	            $page_ed=$_POST['page_ed'];
	            $archive_date=$_POST['archive_date'];
	            $key=$_POST['pick_file_name'];
	            $story_id=$_POST['story_id'];
	            $pick_by=$this->session->userdata('user_name');
	            $pick_by_emp_id=$this->session->userdata('emp_id');
	            $new_pick_by=''.$pick_by.''.$pick_by_emp_id.'';
	          

				
				if(isset($_POST['pick_submit_val']) && $_POST['pick_file_name']!=""){

					if(!file_exists('document_uploads/'.$date.'/PTI_ENG/'.$key.'')){

						$file_from='document_uploads/'.$archive_date.'/PTI_ENG/'.$key.'';
						$destination1='document_uploads/'.$date.'/PTI_ENG/'.$key.'';					        					
			            $date_folder=copy($file_from,$destination1); 
			        }

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
							
							
									    
									   
						    $file_from='document_uploads/'.$archive_date.'/PTI_ENG/'.$key.'';					        
					        $destination2='document_uploads/picked/'.$date.'/PTI_ENG/'.$story_id.'[@]'.$key.'[@]'.$new_pick_by.'[@]'.$page_ed.'[@]'.$page_no.'/'.$key.'';
								        
					        if(!file_exists('document_uploads/picked/'.$date.'/PTI_ENG/'.$story_id.'[@]'.$key.'[@]'.$new_pick_by.'[@]'.$page_ed.'[@]'.$page_no.'/'.$key.'')){

						        
						         $a=copy($file_from,$destination2);
						         if($a==true){

						         	$data_srchive_store=$this->Archivepick_model->pick_pti_eng_archive($story_id,$key,$archive_date);

						         	$data=array(
							         	"story_name"=>"$key",			         	
							         	"story_date"=>"$date",
							         	
							         );
							         $data_res=$this->Archivepick_model->pick_pti_eng_get_det($data);

                         
							         $data2=array(
								         "story_id"=>"$data_res->id",				         
								         "story_date"=>"$date",
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
						         }
						         else{
						         	$m=false;
						         }
						     }else{
						     	$this->session->set_flashdata('msg_error','File Was Allready Picked By You For This Edition::'.$page_ed.'');
					            redirect('File_controller/pti_english');


						     }
				               
				         
				    }
				    else{
				    	$this->session->set_flashdata('msg_error','File Was Allready Picked By Someone For This Edition::'.$page_ed.'');
					    redirect('File_controller/pti_english');

				    }


				    if($m==true){
				    	$this->session->set_flashdata('msg','File Was  Picked Successfully,For This Edition');
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


	// for uni varta
	public function archive_pick_uni_varta_story(){
		if($this->session->userdata('user_id')!=""){
			if($_POST['page_no']!="" && $_POST['page_ed']!=""){
				$date=date('d-m-y');						
	            $page_no=$_POST['page_no'];
	            $page_ed=$_POST['page_ed'];
	            $archive_date=$_POST['archive_date'];
	            $key=$_POST['pick_file_name'];
	            $story_id=$_POST['story_id'];
	            $pick_by=$this->session->userdata('user_name');
	            $pick_by_emp_id=$this->session->userdata('emp_id');
	            $new_pick_by=''.$pick_by.''.$pick_by_emp_id.'';
	          

				
				if(isset($_POST['pick_submit_val']) && $_POST['pick_file_name']!=""){

					if(!file_exists('document_uploads/'.$date.'/UNI_Varta/'.$key.'')){

						$file_from='document_uploads/'.$archive_date.'/UNI_Varta/'.$key.'';
						$destination1='document_uploads/'.$date.'/UNI_Varta/'.$key.'';					        					
			            $date_folder=copy($file_from,$destination1); 
			        }

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
							
							
									    
									   
						    $file_from='document_uploads/'.$archive_date.'/UNI_Varta/'.$key.'';					        
					        $destination2='document_uploads/picked/'.$date.'/UNI_Varta/'.$story_id.'[@]'.$key.'[@]'.$new_pick_by.'[@]'.$page_ed.'[@]'.$page_no.'/'.$key.'';
								        
					        if(!file_exists('document_uploads/picked/'.$date.'/UNI_Varta/'.$story_id.'[@]'.$key.'[@]'.$new_pick_by.'[@]'.$page_ed.'[@]'.$page_no.'/'.$key.'')){

						        
						         $a=copy($file_from,$destination2);
						         if($a==true){

						         	$data_srchive_store=$this->Archivepick_model->pick_uni_varta_archive($story_id,$key,$archive_date);

						         	$data=array(
							         	"story_name"=>"$key",			         	
							         	"story_date"=>"$date",
							         	
							         );
							         $data_res=$this->Archivepick_model->pick_uni_varta_get_det($data);

                         
							         $data2=array(
								         "story_id"=>"$data_res->id",				         
								         "story_date"=>"$date",
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
						         }
						         else{
						         	$m=false;
						         }
						     }else{
						     	$this->session->set_flashdata('msg_error','File Was Allready Picked By You For This Edition::'.$page_ed.'');
					            redirect('File_controller/uni_varta');


						     }
				               
				         
				    }
				    else{
				    	$this->session->set_flashdata('msg_error','File Was Allready Picked By Someone For This Edition::'.$page_ed.'');
					    redirect('File_controller/uni_varta');

				    }


				    if($m==true){
				    	$this->session->set_flashdata('msg','File Was  Picked Successfully,For This Edition');
					    redirect('File_controller/uni_varta');

					}
					else{
						$this->session->set_flashdata('msg_error','File Was Not Picked Successfully');
					    redirect('File_controller/uni_varta');

					}
							
							    


				}
				else{
					$this->session->set_flashdata('msg_error','Picked Not Done Correctly');
				    redirect('File_controller/uni_varta');

				}
				
				
			}
			else{
				$this->session->set_flashdata('msg_error','Select The Edition & Page Correctly');
			    redirect('File_controller/uni_varta');	
			}
		}else{

            $this->session->set_flashdata('msg_error','Please Login Now');
			redirect('Welcome/index', 'refresh');


		}
	}


	
	


	
	

	
	
	// this is for pti photos
	public function archive_pick_pti_photos_story(){
		if($this->session->userdata('user_id')!=""){
			if($_POST['page_no']!="" && $_POST['page_ed']!=""){
				$date=date('d-m-y');						
	            $page_no=$_POST['page_no'];
	            $page_ed=$_POST['page_ed'];
	            $archive_date=$_POST['archive_date'];
	            $key=$_POST['pick_file_name'];
	            $story_id=$_POST['story_id'];
	            $pick_by=$this->session->userdata('user_name');
	            $pick_by_emp_id=$this->session->userdata('emp_id');
	            $new_pick_by=''.$pick_by.''.$pick_by_emp_id.'';
	          

				
				if(isset($_POST['pick_submit_val']) && $_POST['pick_file_name']!=""){

					if(!file_exists('document_uploads/'.$date.'/PTI_Photos/'.$key.'')){

						$file_from='document_uploads/'.$archive_date.'/PTI_Photos/'.$key.'';
						$destination1='document_uploads/'.$date.'/PTI_Photos/'.$key.'';					        					
			            $date_folder=copy($file_from,$destination1); 
			        }

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
							
							
									    
									   
						    $file_from='document_uploads/'.$archive_date.'/PTI_Photos/'.$key.'';					        
					        $destination2='document_uploads/picked/'.$date.'/PTI_Photos/'.$story_id.'[@]'.$key.'[@]'.$new_pick_by.'[@]'.$page_ed.'[@]'.$page_no.'/'.$key.'';
								        
					        if(!file_exists('document_uploads/picked/'.$date.'/PTI_Photos/'.$story_id.'[@]'.$key.'[@]'.$new_pick_by.'[@]'.$page_ed.'[@]'.$page_no.'/'.$key.'')){

						        
						         $a=copy($file_from,$destination2);
						         if($a==true){

						         	$data_srchive_store=$this->Archivepick_model->pick_pti_photos_archive($story_id,$key,$archive_date);

						         	$data=array(
							         	"story_name"=>"$key",			         	
							         	"story_date"=>"$date",
							         	
							         );
							         $data_res=$this->Archivepick_model->pick_pti_photos_get_det($data);

                         
							         $data2=array(
								         "story_id"=>"$data_res->id",				         
								         "story_date"=>"$date",
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
						         }
						         else{
						         	$m=false;
						         }
						     }else{
						     	$this->session->set_flashdata('msg_error','File Was Allready Picked By You For This Edition::'.$page_ed.'');
					            redirect('File_controller/pti_photos');


						     }
				               
				         
				    }
				    else{
				    	$this->session->set_flashdata('msg_error','File Was Allready Picked By Someone For This Edition::'.$page_ed.'');
					    redirect('File_controller/pti_photos');

				    }


				    if($m==true){
				    	$this->session->set_flashdata('msg','File Was  Picked Successfully,For This Edition');
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
				
				
			}
			else{
				$this->session->set_flashdata('msg_error','Select The Edition & Page Correctly');
			    redirect('File_controller/pti_photos');	
			}
		}else{

            $this->session->set_flashdata('msg_error','Please Login Now');
			redirect('Welcome/index', 'refresh');


		}
	}

	// for uni photos
	public function archive_pick_uni_photos_story(){
		if($this->session->userdata('user_id')!=""){
			if($_POST['page_no']!="" && $_POST['page_ed']!=""){
				$date=date('d-m-y');						
	            $page_no=$_POST['page_no'];
	            $page_ed=$_POST['page_ed'];
	            $archive_date=$_POST['archive_date'];
	            $key=$_POST['pick_file_name'];
	            $story_id=$_POST['story_id'];
	            $pick_by=$this->session->userdata('user_name');
	            $pick_by_emp_id=$this->session->userdata('emp_id');
	            $new_pick_by=''.$pick_by.''.$pick_by_emp_id.'';
	          

				
				if(isset($_POST['pick_submit_val']) && $_POST['pick_file_name']!=""){

					if(!file_exists('document_uploads/'.$date.'/UNI_Photos/'.$key.'')){

						$file_from='document_uploads/'.$archive_date.'/UNI_Photos/'.$key.'';
						$destination1='document_uploads/'.$date.'/UNI_Photos/'.$key.'';					        					
			            $date_folder=copy($file_from,$destination1); 
			        }

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
							
							
									    
									   
						    $file_from='document_uploads/'.$archive_date.'/UNI_Photos/'.$key.'';					        
					        $destination2='document_uploads/picked/'.$date.'/UNI_Photos/'.$story_id.'[@]'.$key.'[@]'.$new_pick_by.'[@]'.$page_ed.'[@]'.$page_no.'/'.$key.'';
								        
					        if(!file_exists('document_uploads/picked/'.$date.'/UNI_Photos/'.$story_id.'[@]'.$key.'[@]'.$new_pick_by.'[@]'.$page_ed.'[@]'.$page_no.'/'.$key.'')){

						        
						         $a=copy($file_from,$destination2);
						         if($a==true){

						         	$data_srchive_store=$this->Archivepick_model->pick_uni_photos_archive($story_id,$key,$archive_date);

						         	$data=array(
							         	"story_name"=>"$key",			         	
							         	"story_date"=>"$date",
							         	
							         );
							         $data_res=$this->Archivepick_model->pick_uni_photos_get_det($data);

                         
							         $data2=array(
								         "story_id"=>"$data_res->id",				         
								         "story_date"=>"$date",
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
						         }
						         else{
						         	$m=false;
						         }
						     }else{
						     	$this->session->set_flashdata('msg_error','File Was Allready Picked By You For This Edition::'.$page_ed.'');
					            redirect('File_controller/uni_photos');


						     }
				               
				         
				    }
				    else{
				    	$this->session->set_flashdata('msg_error','File Was Allready Picked By Someone For This Edition::'.$page_ed.'');
					    redirect('File_controller/uni_photos');

				    }


				    if($m==true){
				    	$this->session->set_flashdata('msg','File Was  Picked Successfully,For This Edition');
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
				
				
			}
			else{
				$this->session->set_flashdata('msg_error','Select The Edition & Page Correctly');
			    redirect('File_controller/uni_photos');	
			}
		}else{

            $this->session->set_flashdata('msg_error','Please Login Now');
			redirect('Welcome/index', 'refresh');


		}
	}

	// for other photos
	public function archive_pick_other_photos_story(){
		if($this->session->userdata('user_id')!=""){
			if($_POST['page_no']!="" && $_POST['page_ed']!=""){
				$date=date('d-m-y');						
	            $page_no=$_POST['page_no'];
	            $page_ed=$_POST['page_ed'];
	            $archive_date=$_POST['archive_date'];
	            $key=$_POST['pick_file_name'];
	            $story_id=$_POST['story_id'];
	            $pick_by=$this->session->userdata('user_name');
	            $pick_by_emp_id=$this->session->userdata('emp_id');
	            $new_pick_by=''.$pick_by.''.$pick_by_emp_id.'';
	          

				
				if(isset($_POST['pick_submit_val']) && $_POST['pick_file_name']!=""){

					if(!file_exists('document_uploads/'.$date.'/OTHER_PHOTOS/'.$key.'')){

						$file_from='document_uploads/'.$archive_date.'/OTHER_PHOTOS/'.$key.'';
						$destination1='document_uploads/'.$date.'/OTHER_PHOTOS/'.$key.'';					        					
			            $date_folder=copy($file_from,$destination1); 
			        }

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
							
							
									    
									   
						    $file_from='document_uploads/'.$archive_date.'/OTHER_PHOTOS/'.$key.'';					        
					        $destination2='document_uploads/picked/'.$date.'/OTHER_PHOTOS/'.$story_id.'[@]'.$key.'[@]'.$new_pick_by.'[@]'.$page_ed.'[@]'.$page_no.'/'.$key.'';
								        
					        if(!file_exists('document_uploads/picked/'.$date.'/OTHER_PHOTOS/'.$story_id.'[@]'.$key.'[@]'.$new_pick_by.'[@]'.$page_ed.'[@]'.$page_no.'/'.$key.'')){

						        
						         $a=copy($file_from,$destination2);
						         if($a==true){

						         	$data_srchive_store=$this->Archivepick_model->pick_other_photos_archive($story_id,$key,$archive_date);

						         	$data=array(
							         	"story_name"=>"$key",			         	
							         	"story_date"=>"$date",
							         	
							         );
							         $data_res=$this->Archivepick_model->pick_other_photos_get_det($data);

                         
							         $data2=array(
								         "story_id"=>"$data_res->id",				         
								         "story_date"=>"$date",
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
				    	$this->session->set_flashdata('msg_error','File Was Allready Picked By Someone For This Edition::'.$page_ed.'');
					    redirect('Bengali_controller/other_photos');

				    }


				    if($m==true){
				    	$this->session->set_flashdata('msg','File Was  Picked Successfully,For This Edition');
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
				
				
			}
			else{
				$this->session->set_flashdata('msg_error','Select The Edition & Page Correctly');
			    redirect('Bengali_controller/other_photos');
			}
		}else{

            $this->session->set_flashdata('msg_error','Please Login Now');
			redirect('Welcome/index', 'refresh');


		}
	}


	// for other news
	
	public function archive_pick_other_news_story(){
		if($this->session->userdata('user_id')!=""){
			if($_POST['page_no']!="" && $_POST['page_ed']!=""){
				$date=date('d-m-y');						
	            $page_no=$_POST['page_no'];
	            $page_ed=$_POST['page_ed'];
	            $archive_date=$_POST['archive_date'];
	            $key=$_POST['pick_file_name'];
	            $story_id=$_POST['story_id'];
	            $pick_by=$this->session->userdata('user_name');
	            $pick_by_emp_id=$this->session->userdata('emp_id');
	            $new_pick_by=''.$pick_by.''.$pick_by_emp_id.'';
	          

				
				if(isset($_POST['pick_submit_val']) && $_POST['pick_file_name']!=""){

					if(!file_exists('document_uploads/'.$date.'/OTHER_NEWS/'.$key.'')){

						$file_from='document_uploads/'.$archive_date.'/OTHER_NEWS/'.$key.'';
						$destination1='document_uploads/'.$date.'/OTHER_NEWS/'.$key.'';					        					
			            $date_folder=copy($file_from,$destination1); 
			        }

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
							
							
									    
									   
						    $file_from='document_uploads/'.$archive_date.'/OTHER_NEWS/'.$key.'';					        
					        $destination2='document_uploads/picked/'.$date.'/OTHER_NEWS/'.$story_id.'[@]'.$key.'[@]'.$new_pick_by.'[@]'.$page_ed.'[@]'.$page_no.'/'.$key.'';
								        
					        if(!file_exists('document_uploads/picked/'.$date.'/OTHER_NEWS/'.$story_id.'[@]'.$key.'[@]'.$new_pick_by.'[@]'.$page_ed.'[@]'.$page_no.'/'.$key.'')){

						        
						         $a=copy($file_from,$destination2);
						         if($a==true){

						         	$data_srchive_store=$this->Archivepick_model->pick_other_news_archive($story_id,$key,$archive_date);

						         	$data=array(
							         	"story_name"=>"$key",			         	
							         	"story_date"=>"$date",
							         	
							         );
							         $data_res=$this->Archivepick_model->pick_other_news_get_det($data);

                         
							         $data2=array(
								         "story_id"=>"$data_res->id",				         
								         "story_date"=>"$date",
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



	// for LOCAL news
	
	public function archive_pick_local_news_story(){
		if($this->session->userdata('user_id')!=""){
			if($_POST['page_no']!="" && $_POST['page_ed']!=""){
				$date=date('d-m-y');						
	            $page_no=$_POST['page_no'];
	            $page_ed=$_POST['page_ed'];
	            $archive_date=$_POST['archive_date'];
	            $key=$_POST['pick_file_name'];
	            $story_id=$_POST['story_id'];
	            $pick_by=$this->session->userdata('user_name');
	            $pick_by_emp_id=$this->session->userdata('emp_id');
	            $new_pick_by=''.$pick_by.''.$pick_by_emp_id.'';
	          

				
				if(isset($_POST['pick_submit_val']) && $_POST['pick_file_name']!=""){

					if(!file_exists('document_uploads/'.$date.'/LOCAL_STORY/'.$key.'')){

						$file_from='document_uploads/'.$archive_date.'/LOCAL_STORY/'.$key.'';
						$destination1='document_uploads/'.$date.'/LOCAL_STORY/'.$key.'';					        					
			            $date_folder=copy($file_from,$destination1); 
			        }

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
							
							
									    
									   
						    $file_from='document_uploads/'.$archive_date.'/LOCAL_STORY/'.$key.'';					        
					        $destination2='document_uploads/picked/'.$date.'/LOCAL_STORY/'.$story_id.'[@]'.$key.'[@]'.$new_pick_by.'[@]'.$page_ed.'[@]'.$page_no.'/'.$key.'';
								        
					        if(!file_exists('document_uploads/picked/'.$date.'/LOCAL_STORY/'.$story_id.'[@]'.$key.'[@]'.$new_pick_by.'[@]'.$page_ed.'[@]'.$page_no.'/'.$key.'')){

						        
						         $a=copy($file_from,$destination2);
						         if($a==true){

						         	$data_srchive_store=$this->Archivepick_model->pick_local_news_archive($story_id,$key,$archive_date);

						         	$data=array(
							         	"story_name"=>"$key",			         	
							         	"story_date"=>"$date",
							         	
							         );
							         $data_res=$this->Archivepick_model->pick_local_news_get_det($data);

                         
							         $data2=array(
								         "story_id"=>"$data_res->id",				         
								         "story_date"=>"$date",
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
					             redirect('Local_controller/own_local_story', 'refresh');


						     }
				               
				         
				    }
				    else{
				    	$this->session->set_flashdata('msg_error','File Was Allready Picked By Someone For This Edition::'.$page_ed.'');
					     redirect('Local_controller/own_local_story', 'refresh');

				    }


				    if($m==true){
				    	$this->session->set_flashdata('msg','File Was  Picked Successfully,For This Edition');
					     redirect('Local_controller/own_local_story', 'refresh');

					}
					else{
						$this->session->set_flashdata('msg_error','File Was Not Picked Successfully');
					     redirect('Local_controller/own_local_story', 'refresh');

					}
							
							    


				}
				else{
					$this->session->set_flashdata('msg_error','Picked Not Done Correctly');
				     redirect('Local_controller/own_local_story', 'refresh');

				}
				
				
			}
			else{
				$this->session->set_flashdata('msg_error','Select The Edition & Page Correctly');
			     redirect('Local_controller/own_local_story', 'refresh');
			}
		}else{

            $this->session->set_flashdata('msg_error','Please Login Now');
			redirect('Welcome/index', 'refresh');


		}
	}


	// for local photos
	public function archive_pick_local_photos_story(){
		if($this->session->userdata('user_id')!=""){
			if($_POST['page_no']!="" && $_POST['page_ed']!=""){
				$date=date('d-m-y');						
	            $page_no=$_POST['page_no'];
	            $page_ed=$_POST['page_ed'];
	            $archive_date=$_POST['archive_date'];
	            $key=$_POST['pick_file_name'];
	            $story_id=$_POST['story_id'];
	            $pick_by=$this->session->userdata('user_name');
	            $pick_by_emp_id=$this->session->userdata('emp_id');
	            $new_pick_by=''.$pick_by.''.$pick_by_emp_id.'';
	          

				
				if(isset($_POST['pick_submit_val']) && $_POST['pick_file_name']!=""){

					if(!file_exists('document_uploads/'.$date.'/LOCAL_PHOTOS/'.$key.'')){

						$file_from='document_uploads/'.$archive_date.'/LOCAL_PHOTOS/'.$key.'';
						$destination1='document_uploads/'.$date.'/LOCAL_PHOTOS/'.$key.'';					        					
			            $date_folder=copy($file_from,$destination1); 
			        }

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
							
							
									    
									   
						    $file_from='document_uploads/'.$archive_date.'/LOCAL_PHOTOS/'.$key.'';					        
					        $destination2='document_uploads/picked/'.$date.'/LOCAL_PHOTOS/'.$story_id.'[@]'.$key.'[@]'.$new_pick_by.'[@]'.$page_ed.'[@]'.$page_no.'/'.$key.'';
								        
					        if(!file_exists('document_uploads/picked/'.$date.'/LOCAL_PHOTOS/'.$story_id.'[@]'.$key.'[@]'.$new_pick_by.'[@]'.$page_ed.'[@]'.$page_no.'/'.$key.'')){

						        
						         $a=copy($file_from,$destination2);
						         if($a==true){

						         	$data_srchive_store=$this->Archivepick_model->pick_local_photos_archive($story_id,$key,$archive_date);

						         	$data=array(
							         	"story_name"=>"$key",			         	
							         	"story_date"=>"$date",
							         	
							         );
							         $data_res=$this->Archivepick_model->pick_local_photos_get_det($data);

                         
							         $data2=array(
								         "story_id"=>"$data_res->id",				         
								         "story_date"=>"$date",
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


	
	
    



	
	
	
	
	

	











































}
?>