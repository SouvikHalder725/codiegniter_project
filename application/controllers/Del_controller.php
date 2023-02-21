<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Del_controller extends CI_Controller{

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


 //    // for realising any Pti bhasha story
 //    public function del_bhasha_folder($name){

 //    	$date=date('d-m-y');
 //    	$file_name=$name;

 //    	$data=array(
 //    		"file_name"=>"$file_name",
 //    		"date"=>"$date",
 //    		"picked"=>"0",
 //    		"edition"=>"",
 //    		"page"=>"",
 //    		"pick_by"=>"",
 //    		"pick_date"=>""
 //    	);
 //    	if($file_name!=""){
 //    		$result=$this->Main_model->del_pti_bhasha_pick($data);
 //    		if($result==true){

 //    			$m=unlink('document_uploads/PTI_BHASHA/picked/'.$date.'/'.$name.'');
 //    			if($m==true){
 //    				$this->session->set_flashdata('msg','File Was Reliesed Succesfully');
	// 			    redirect('File_controller/pti_bhasha');
 //    			}
 //    			else{
 //    				$this->session->set_flashdata('msg_error','File Was  Not Reliesed Succesfully');
	// 			    redirect('File_controller/pti_bhasha');
 //    			}
 //    		}

 //    	}

	// }

	// // for realising any pti english news story from my work list
	// public function del_pti_eng_folder($name){
 //        $date=date('d-m-y');
 //    	$file_name=$name;

 //    	$data=array(
 //    		"file_name"=>"$file_name",
 //    		"date"=>"$date",
 //    		"picked"=>"0",
 //    		"edition"=>"",
 //    		"page"=>"",
 //    		"pick_by"=>"",
 //    		"pick_date"=>""
 //    	);
 //    	if($file_name!=""){
 //    		$result=$this->Main_model->del_pti_english_pick($data);
 //    		if($result==true){

 //    			$m=unlink('document_uploads/PTI_ENG/picked/'.$date.'/'.$name.'');
 //    			if($m==true){
 //    				$this->session->set_flashdata('msg','File Was Reliesed Succesfully');
	// 			    redirect('File_controller/pti_english');
 //    			}
 //    			else{
 //    				$this->session->set_flashdata('msg_error','File Was  Not Reliesed Succesfully');
	// 			    redirect('File_controller/pti_english');
 //    			}
 //    		}

 //    	}

	// }

	// // for realising any uni varta news story from my work
	// public function del_uni_varta_folder($name){

       
        
 //       $date=date('d-m-y');
 //    	$file_name=$name;

 //    	$data=array(
 //    		"file_name"=>"$file_name",
 //    		"date"=>"$date",
 //    		"picked"=>"0",
 //    		"edition"=>"",
 //    		"page"=>"",
 //    		"pick_by"=>"",
 //    		"pick_date"=>""
 //    	);
 //    	if($file_name!=""){
 //    		$result=$this->Main_model->del_uni_varta_pick($data);
 //    		if($result==true){

 //    			$m=unlink('document_uploads/UNI_Varta/picked/'.$date.'/'.$name.'');
 //    			if($m==true){
 //    				$this->session->set_flashdata('msg','File Was Reliesed Succesfully');
	// 			    redirect('File_controller/uni_varta');
 //    			}
 //    			else{
 //    				$this->session->set_flashdata('msg_error','File Was  Not Reliesed Succesfully');
	// 			    redirect('File_controller/uni_varta');
 //    			}
 //    		}

 //    	}
 //    }

 // // for realising any pti photos from pick list
	// public function del_pti_photos_folder($name){

       
        
 //        $date=date('d-m-y');
 //    	$file_name=$name;

 //    	$data=array(
 //    		"file_name"=>"$file_name",
 //    		"date"=>"$date",
 //    		"picked"=>"0",
 //    		"edition"=>"",
 //    		"page"=>"",
 //    		"pick_by"=>"",
 //    		"pick_date"=>""
 //    	);
 //    	if($file_name!=""){
 //    		$result=$this->Main_model->del_pti_photos_pick($data);
 //    		if($result==true){

 //    			$m=unlink('document_uploads/PTI_Photos/picked/'.$date.'/'.$name.'');
 //    			if($m==true){
 //    				$this->session->set_flashdata('msg','File Was Reliesed Succesfully');
	// 			    redirect('File_controller/pti_photos');
 //    			}
 //    			else{
 //    				$this->session->set_flashdata('msg_error','File Was  Not Reliesed Succesfully');
	// 			    redirect('File_controller/pti_photos');
 //    			}
 //    		}

 //    	}



	// }
	// // for realising any uni photos from pick list

	// public function del_uni_photos_folder($name){

       
        
 //        $date=date('d-m-y');
 //    	$file_name=$name;

 //    	$data=array(
 //    		"file_name"=>"$file_name",
 //    		"date"=>"$date",
 //    		"picked"=>"0",
 //    		"edition"=>"",
 //    		"page"=>"",
 //    		"pick_by"=>"",
 //    		"pick_date"=>""
 //    	);
 //    	if($file_name!=""){
 //    		$result=$this->Main_model->del_uni_photos_pick($data);
 //    		if($result==true){

 //    			$m=unlink('document_uploads/UNI_Photos/picked/'.$date.'/'.$name.'');
 //    			if($m==true){
 //    				$this->session->set_flashdata('msg','File Was Reliesed Succesfully');
	// 			    redirect('File_controller/uni_photos');
 //    			}
 //    			else{
 //    				$this->session->set_flashdata('msg_error','File Was  Not Reliesed Succesfully');
	// 			    redirect('File_controller/uni_photos');
 //    			}
 //    		}

 //    	}

	// }

	// for delete date wise folder from old stories
	public function confirm_del_folder($folder_name){
        $dirname="document_uploads/".$folder_name."";
		if($folder_name!=""){
	        $file=scandir("document_uploads/".$folder_name."/");
	        foreach ($file as $value) {
	        	$length=strlen($value);	
	        	if($length>5){
	        		$file_one=scandir("document_uploads/".$folder_name."/".$value."");
	        		foreach($file_one as $file_a){
	        			$length_a=strlen($file_a);	
	        	        if($length_a>5){
                            if(file_exists('document_uploads/'.$folder_name.'/'.$value.'/'.$file_a.'')){

                                $FilePath='document_uploads/'.$folder_name.'/'.$value.'';
                                $file_nm='document_uploads/'.$folder_name.'/'.$value.'/'.$file_a.'';
                                chdir($FilePath); // Comment this out if you are on the same folder
                                chown($file_nm,465);
                                
                               
                              
	        	        	    $c=unlink('document_uploads/'.$folder_name.'/'.$value.'/'.$file_a.'');

                            }
	        	        }


	        		} 
	         	    $c=rmdir('document_uploads/'.$folder_name.'/'.$value.'');
	        	}
	        }


	        $m=rmdir($dirname);
            if($m==true){
    	        $this->session->set_flashdata('msg','Folder is Deleted Successfully');
    	        redirect("Mywork_controller/all_folder");
            }else{

                 $this->session->set_flashdata('msg_error','Folder is Not Deleted Successfully');
                redirect("Mywork_controller/all_folder");
            }

		}
	}
    // public function mypick_del_folder($folder_name){
        
    //     $dirname="document_uploads/picked/".$folder_name."";
    //     if($folder_name!=""){
    //         $file=scandir("document_uploads/picked/".$folder_name."/");
    //         foreach ($file as $value) {
    //             $length=strlen($value); 
    //             if($length>5){
    //                 $file_one=scandir("document_uploads/picked/".$folder_name."/".$value."");
    //                 foreach($file_one as $file_a){
    //                     $length_a=strlen($file_a);  
    //                     if($length_a>5){
    //                         $file_two=scandir("document_uploads/picked/".$folder_name."/".$value."/".$file_a."");
    //                         foreach($file_two as $file_b){
    //                             $length_b=strlen($file_b);  
    //                             if($length_b>5){
    //                                 if(file_exists('document_uploads/picked/'.$folder_name.'/'.$value.'/'.$file_a.'/'.$file_b.'')){
                                        
                                       

    //                                     $c=unlink('document_uploads/picked/'.$folder_name.'/'.$value.'/'.$file_a.'/'.$file_b.'');
    //                                 }
    //                             }


    //                         }
    //                         $c=rmdir('document_uploads/picked/'.$folder_name.'/'.$value.'/'.$file_a.'');
                            
    //                     }


    //                 }
    //                 $c=rmdir('document_uploads/picked/'.$folder_name.'/'.$value.'');
    //             }
    //         }
    //         $m=rmdir($dirname);
    //         $this->session->set_flashdata('msg','Folder is Deleted Successfully');
    //         redirect("Mywork_controller/my_pick_all_folder");

    //     }






    }

	





}
?>