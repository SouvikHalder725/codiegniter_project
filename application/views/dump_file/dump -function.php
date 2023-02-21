// public function bulk_select_bhasha(){

	// 	if(isset($_POST['bulk_select_submit']) && $this->input->post('checked_input_value[]')!=""){

	// 		 $data= array(
		        
	// 	        'file' => implode(",",$this->input->post('checked_input_value[]')) // Store foods with comma separate 
	// 	    );
			
		    
 //            $result=array();
	// 		foreach ($data as $value) {
	// 		 	 $result['all_file']=explode(",",$value);

	// 		}

	// 		foreach ($result['all_file'] as $key) {
	// 			$file_from="C:\Wire_Agency\PTI_BHASHA/".$key."";
	// 	        $destination="document_uploads/PTI_BHASHA/".$key."";
	// 	        if(!file_exists("document_uploads/PTI_BHASHA/".$key."")){

	// 		        copy($file_from,$destination);
	// 		    }
	// 		    $m=true;
			
	// 		}
	// 		if($m==true){
	// 			redirect('welcome/pti_bhasha_selected_file','refresh');

	// 		}
	// 		else{

				
	// 		}
			

	// 	}
	// 	else{

	// 		$this->session->set_flashdata('msg_error','you have to select atleast one file for adding in selected list or click file icon for going selected list');
	// 		redirect('welcome/pti_bhasha');
	// 	}
	// }


	// public function pti_bhasha_file_update(){
	// 	if(isset($_POST['submit'])){
	// 		$file_name=$_POST['file_name'];

 //            $myfile = fopen("C:\Wire_Agency\PTI_BHASHA/".$file_name."", "w") or redirect('welcome/pti_bhasha_selected_file_error');
 //            $input_text=$_POST['text'];
	// 		       fwrite($myfile, $input_text);		
	// 		       fclose($myfile);
 //            redirect('welcome/pti_bhasha_file/'.$file_name.'');
	// 	}
	// }

	public function pti_bhasha_file($file){


        $myfile = fopen("C:\Wire_Agency\PTI_BHASHA/".$file."", "r") or redirect('welcome/pti_bhasha_selected_file_error');
        if(filesize("C:\Wire_Agency\PTI_BHASHA/".$file."")>0){
			$s=fread($myfile,filesize("C:\Wire_Agency\PTI_BHASHA/".$file.""));
			$text = iconv('UTF-16LE', 'UTF-8', $s);
			
			fclose($myfile);
			$data['text2']=$text;
			$data['file_name']=$file;

			
				$this->load->view('header');
			    $this->load->view('pti_bhasha_file',$data);
			    $this->load->view('footer');
		}else{
			redirect('welcome/pti_bhasha_selected_file_error');
		}
		

			    

	}
	public function pti_bhasha_selected_file(){
		$date=date('dmy');
		$scan['scan_result']=scandir('document_uploads/PTI_BHASHA/'.$date.'');
		foreach ($scan['scan_result'] as $key) {
			$length=strlen($key);			
		    if(filesize("document_uploads/PTI_BHASHA/".$date."/".$key."")>0 && $length>5){
		    	
				$myfile = fopen("document_uploads/PTI_BHASHA/".$date."/".$key."", "r");
				$s=fread($myfile,filesize("document_uploads/PTI_BHASHA/".$date."/".$key.""));
				$text = iconv('UTF-16LE', 'UTF-8', $s);
				fclose($myfile);
				
				$scan['array'][]=array(
					'scan_result'=>$key,
					'text2'=>$text
				);	
			}
		}
		if($scan['array']!=""){

				$this->load->view('header');
				$this->load->view('pti_bhasha_selected_file',$scan);
				$this->load->view('footer');
		}else{
			$this->session->set_flashdata('msg_error','No File in Picked List');
		    redirect('welcome/pti_bhasha');

        }
        
		




	}
	public function pti_english_file($file){


        $myfile = fopen("C:\Wire_Agency\PTI_ENG/".$file."", "r")  or redirect('welcome/pti_english_selected_file_error');
		$text=fread($myfile,filesize("C:\Wire_Agency\PTI_ENG/".$file.""));
		// $text = iconv('UTF-16LE', 'UTF-8', $s);
		
		fclose($myfile);
		$data['text2']=$text;
		$data['file_name']=$file;

		
		$this->load->view('header');
	    $this->load->view('pti_english_file',$data);
	    $this->load->view('footer');
	}


	public function pti_english_selected_file(){
		$date=date('dmy');
		$scan['scan_result']=scandir('document_uploads/PTI_ENG/'.$date.'');
		foreach ($scan['scan_result'] as $key) {
			$length=strlen($key);			
		    if(filesize("document_uploads/PTI_ENG/".$date."/".$key."")>0 && $length>5){
		    	
				$myfile = fopen("document_uploads/PTI_ENG/".$date."/".$key."", "r");
				$text=fread($myfile,filesize("document_uploads/PTI_ENG/".$date."/".$key.""));
			
				fclose($myfile);
				
				$scan['array'][]=array(
					'scan_result'=>$key,
					'text2'=>$text
				);	
			}
		}
		if($scan['array']!=""){

				$this->load->view('header');
				$this->load->view('pti_english_selected_file',$scan);
				$this->load->view('footer');
		}else{
			$this->session->set_flashdata('msg_error','No File in Picked List');
		    redirect('welcome/pti_english');

        }

	}

	public function uni_photos_selected_file(){
		$date=date('dmy');

        $scan['scan_result']=scandir('document_uploads/UNI_Photos/'.$date.'');
        if($scan['scan_result']!=""){

			$this->load->view('header');
			$this->load->view('uni_photos_selected_file',$scan);
			$this->load->view('footer');
		}else{
			$this->session->set_flashdata('msg_error','No File in Picked List');
		    redirect('welcome/uni_photos');
		}


	}

	public function uni_photos_file($file){


		$this->load->helper('download');

        $myfile = fopen("C:\Wire_Agency\UNI_Photos/".$file."", "r") or $myfile=die("Unable to open file!");
		$text=fread($myfile,filesize("C:\Wire_Agency\UNI_Photos/".$file.""));
		
		
		$info = exif_read_data("C:\Wire_Agency\UNI_Photos/".$file."",0,true);

		
		
		if($info!=false){
			$file_from="C:\Wire_Agency\UNI_Photos/".$file."";
			$destination="document_uploads/all_Photos/".$file."";
			fclose($myfile);
			$data['text2']=$text;
			$data['file_name']=$file;
			$data['info']=$info;
			



			if(!file_exists("document_uploads/all_Photos/".$file."")){
				 $m=copy($file_from, $destination);
				 if($m==true){
				 	$this->load->view('header');
		            $this->load->view('uni_photos_file',$data);
		            $this->load->view('footer');
				 }else{
				 	redirect('welcome/uni_photos','refresh');
				 }
				 
			}
			else{

	           $this->load->view('header');
		       $this->load->view('uni_photos_file',$data);
		       $this->load->view('footer');
			}
	    }else{
			$this->session->set_flashdata('msg_error', 'Unable to open file! This is is not Image');
			redirect('welcome/uni_photos');
		}


	}

	public function pti_photos_file($file){
        $this->load->helper('download');

        $myfile = fopen("C:\Wire_Agency\PTI_Photos/".$file."", "r") or  $myfile=false;
		$text=fread($myfile,filesize("C:\Wire_Agency\PTI_Photos/".$file.""));
		
		// $image = glob("C:\Wire_Agency\PTI_Photos/".$file."");
		
		$info = exif_read_data("C:\Wire_Agency\PTI_Photos/".$file."",0,true);
	

			

        if($info!=false){

        	$file_from="C:\Wire_Agency\PTI_Photos/".$file."";
			$destination="document_uploads/all_Photos/".$file."";
			fclose($myfile);
			$data['text2']=$text;
			$data['file_name']=$file;
			$data['info']=$info;

			if(!file_exists("document_uploads/all_Photos/".$file."")){
				 $m=copy($file_from, $destination);
				 if($m==true){
				 	$this->load->view('header');
		            $this->load->view('pti_photos_file',$data);
		            $this->load->view('footer');
				 }else{
				 	redirect('welcome/pti_photos','refresh');
				 }
				 
			}
			else{

	           $this->load->view('header');
		       $this->load->view('pti_photos_file',$data);
		       $this->load->view('footer');
			}
		}else{
			$this->session->set_flashdata('msg_error', 'Unable to open file! This is is not Image');
			redirect('welcome/pti_photos');
		}
		
		
		    
	}

	public function pti_photos_selected_file(){
		$date=date('dmy');

        $scan['scan_result']=scandir('document_uploads/PTI_Photos/'.$date.'');
        if($scan['scan_result']!=""){

			$this->load->view('header');
			$this->load->view('pti_photos_selected_file',$scan);
			$this->load->view('footer');
		}
		else{
			$this->session->set_flashdata('msg_error','No File in Picked List');
		    redirect('welcome/pti_photos');

		}


	}
	public function uni_varta_selected_file(){
		$date=date('dmy');
		$scan['scan_result']=scandir("document_uploads/UNI_Varta/".$date."");
		foreach ($scan['scan_result'] as $key) {
			$length=strlen($key);			
		    if(filesize("document_uploads/UNI_Varta/".$date."/".$key."")>0 && $length>5){
		    	
				$myfile = fopen("document_uploads/UNI_Varta/".$date."/".$key."", "r");
				$s=fread($myfile,filesize("document_uploads/UNI_Varta/".$date."/".$key.""));
				$text = iconv('UTF-16LE', 'UTF-8', $s);
				fclose($myfile);
				
				$scan['array'][]=array(
					'scan_result'=>$key,
					'text2'=>$text
				);	
			}
		}
		if($scan['array']!=""){

			$this->load->view('header');
			$this->load->view('uni_varta_selected_file',$scan);
			$this->load->view('footer');
		}
		else{
			$this->session->set_flashdata('msg_error', 'No File in Picked List');
			redirect('welcome/uni_varta');
		}
		
	}
	public function uni_varta_file($file){


         $myfile = fopen("C:\Wire_Agency\UNI_Varta/".$file."", "r") or redirect('welcome/uni_varta_selected_file_error');
         if(filesize("C:\Wire_Agency\UNI_Varta/".$file."")>0){
				$s=fread($myfile,filesize("C:\Wire_Agency\UNI_Varta/".$file.""));
				$text = iconv('UTF-16LE', 'UTF-8', $s);
				fclose($myfile);
				$data['text2']=$text;
				$data['file_name']=$file;


				$this->load->view('header');
				$this->load->view('uni_varta_file',$data);
				$this->load->view('footer');   
		}else{
			redirect('welcome/uni_varta_selected_file_error');

		} 

	}

	public function pti_bhasha_selected_file_error(){

            $this->session->set_flashdata('msg_error', 'Unable to open file!');
			redirect('welcome/pti_bhasha_selected_file');



	}
	public function pti_english_selected_file_error(){

				
			
			    $this->session->set_flashdata('msg_error', 'Unable to open file!');
			 	redirect('welcome/pti_english');

			
		}
		
	public function uni_varta_selected_file_error(){

	            $this->session->set_flashdata('msg_error', 'Unable to open file!');
				redirect('welcome/uni_varta_selected_file');



		}


		// $('#first_name').click(function(){
           



         //      $.ajax({
         //        type: "POST",         
         //        url: "<?php echo base_url(); ?>welcome/get_department",              
         //        dataType: 'json',
               
         //        success: function(data)               
         //       {   

         //          // alert(data.length);
         //             $('#department').html('');  
         //            var options = '';  
         //            options += '<option value="">Select Department</option>';  
         //            for (var i = 0; i < data.length; i++) {  
         //                options += '<option value="' + data[i]['department_name'] + '">' + data[i]['department_name'] + '</option>';  
         //            } 
         //            options += '<option value="Others">Others</option>';
         //            $('#department').append(options);  
                                 
         //         }
              
         //     });


         // });
         //  $('#first_name').click(function(){


         //      // alert("this is company");
         //      $.ajax({
         //        type: "POST",         
         //        url: "<?php echo base_url(); ?>welcome/get_designation",
         //        // async: true,
         //        dataType: 'json',
               
         //       success: function(data)               
         //       {   

         //          // alert(data.length);
         //             $('#designation').html('');  
         //            var options = '';  
         //            options += '<option value="">Select Designation</option>';  
         //            for (var i = 0; i < data.length; i++) {  
         //                options += '<option value="' + data[i]['designation'] + '">' + data[i]['designation'] + '</option>';  
         //            } 
         //            options += '<option value="Others">Others</option>';
         //            $('#designation').append(options);  
                                 

                
         //         }
              
         //       });


         //    });




         <!--  <td>
                                                <span class="badge bg-<?php// echo $bg; ?>">
                                                  <h5><b><?php// echo $status; ?></b></h5> 
                                                </span>
                                              </td> -->
                                             <!--  <td>
                                                <div class="d-flex mx-2 text-center"> -->
                                                  
                                                  
                                                           <!-- <a class="btn btn-success mx-2" href="<?php// echo base_url('Del_controller/del_bhasha_folder/'.$value->file_name.''); ?>"><i class="fa-solid fa-check"></i></a> -->
                                                          <!--  <a class="btn btn-light mx-2" href="#" type="button" data-bs-toggle="modal" data-bs-target="#view_story_modal_<?php echo $value->id; ?>"><i class="fa fa-eye"></i></a>
                                                           
                                               
                                                            <span class="btn btn-light mx-2"><i class="fa-sharp fa fa-eye-slash"></i></span> 
                                                                                        
                                                  
                                                   </div>
                                                                   
                                              </td> -->
