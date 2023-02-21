 <div class="row my-1 d-flex">
            
            <div class="col-12 col-lg-12">
           
              <div class="card card-table">
                <div class="card-header col-md-12 d-flex">

                   <div class="title col-md-8">NEW PHOTOS</div>
                   
                   <div class="tools dropdown col-md-4 d-flex">
               
                   

                     <a href="<?php echo base_url(); ?>Local_controller/local_photos_form" class="btn btn-success mx-2 text-center"><i class="fa fa-refresh mx-2"></i><b>Refresh</b></a>
                      <a href="<?php echo base_url(); ?>Local_controller/own_local_photos" class="btn btn-secondary mx-2 text-center"><i class="fa fa-arrow-left mx-2"></i><b>Back</b></a>
                  </div>



                  
                </div>
                <div class="card-body table-responsive">

                           <?php 
                               if ($this->session->flashdata('msg') != ''): 
                                    echo 
                                    '<div class="text-center text-light bg-success col-md-12 py-3">'.$this->session->flashdata('msg').'</div>'; 
                                endif;
                             ?>
                             <?php 
                               if ($this->session->flashdata('msg_error') != ''): 
                                    echo 
                                    '<div class="text-center text-light bg-danger col-md-12 py-3">'.$this->session->flashdata('msg_error').'</div>'; 
                                endif;
                             ?>

                               <?php 
                             $pick_by=$this->session->userdata('user_name');
                             $pick_by_emp_id=$this->session->userdata('emp_id');
                             $new_pick_by=''.$pick_by.''.$pick_by_emp_id.'';
                             ?>

                           <div class="col-md-12 mx-1 my-3">
                             <form method="post" action="<?php echo base_url(); ?>Local_controller/add_local_photos" enctype="multipart/form-data">
                               
                              
                               <div class="form-row d-flex">
                                  <input type="hidden" name="photos_id" value="<?php echo $id; ?>">
                                  <input type="hidden" name="create_by" value="<?php echo $new_pick_by; ?>">
                                  <label style="font-size:20px;" class="form-label">upload The photos(<span class="text-danger mx-1">*</span>jpg Only)</label>
                                  <input style="font-size:20px;" type="file" name="photos_name" class="form-control my-2">
                                   <label style="font-size:20px;" class="form-label">Enter The Title</label>
                                  <input type="text" name="img_title" class="form-control my-2" style="font-size: 20px;">
                                   <label style="font-size:20px;" class="form-label">Enter The Subject</label>
                                  <input type="text" name="img_subject" class="form-control my-2" style="font-size: 20px;">
                                  <input type="submit" name="submit" value="Upload" class="btn btn-success my-2">
                               </div>
                             </form>
                           </div>
                            
                           
                 
                </div>

                





              


              </div>
          
            </div>
           
          </div>







                                  
