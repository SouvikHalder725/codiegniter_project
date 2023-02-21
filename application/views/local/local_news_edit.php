 <div class="row my-1 d-flex">
            
            <div class="col-12 col-lg-12">
           
              <div class="card card-table">
                <div class="card-header col-md-12 d-flex">

                   <div class="title col-md-8">NEW STORY</div>
                   
                   <div class="tools dropdown col-md-4 d-flex">
               
                    
                     <a href="<?php echo base_url(); ?>Local_controller/local_news_form" class="btn btn-success mx-2 text-center"><i class="fa fa-refresh mx-2"></i><b>Refresh</b></a>
                      <a href="<?php echo base_url(); ?>Local_controller/own_local_story" class="btn btn-secondary mx-2 text-center"><i class="fa fa-arrow-left mx-2"></i><b>Back</b></a>
                      <!-- <a href="#" id="transelate" class="btn btn-primary mx-2 text-center"><i class="fa fa-language mx-2"></i><b>Translate</b></a> -->
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
                         

                           <div class="col-md-12 mx-1 my-3">
                             <form action="<?php echo base_url(); ?>Local_controller/update_local_story" method="post">
                              <input type="hidden" name="story_id" value="<?php echo $file_name->id; ?>">
                              <input type="hidden" name="create_by" value="<?php echo $file_name->created_by; ?>">
                               <div class="form-row">
                                 <!-- <label style="font-size:20px;" class="form-label">Enter File Name</label> -->
                                 <input type="hidden" name="story_head" style="font-size:20px;" class="form-control"  value="<?php echo $file_name->file_name; ?>">
                               </div>
                              
                               <div class="form-row">
                                 <label style="font-size:20px;" class="form-label">Enter The Story</label>
                                 <textarea name="story_body" id="story_body" style="font-size:20px;" class="form-control" cols="20" rows="20"><?php echo $file_name->text; ?></textarea>
                               </div>

                               <input class="btn btn-success my-2 py-2 px-2 col-md-2" type="submit" name="submit" value="Save">
                             </form>
                           </div>
                            
                           
                 
                </div>

                





              


              </div>
          
            </div>
           
          </div>







                                  
