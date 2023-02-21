
 <div class="row my-1 d-flex">
            
            <div class="col-12 col-lg-12">
           
              <div class="card card-table">
                <div class="card-header col-md-12 d-flex">

                   <div class="title col-md-8">LOCAL NEWS</div>
                   
                   <div class="tools dropdown col-md-4 d-flex">
               
                    
                     <!-- <a href="<?php// echo base_url('Mywork_controller/LOCAL_STORY_dashboard_news/'.$this_date.''); ?>" class="btn btn-info col-md-2 mx-2"> <i class="fa-solid fa-rotate"></i></a> -->

                     <a href="<?php echo base_url('welcome/dashboard'); ?>" class="btn btn-warning col-md-2 mx-2"><i class="fa fa-arrow-left"></i></a>
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
                            
                           
                  <table class="table table-striped table-hover text-left">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th></th>
                        <th  width="40%">Details</th>                        
                       
                        <th>Informations</th>
                        <!-- <th>Status</th> -->
                       <!--  <th>Pg/Ed</th> -->
                        <!-- <th class="actions">Actions</th> -->
                      </tr>
                    </thead>
                    <tbody>

                      <?php
                      $timezone=date_default_timezone_set("Asia/Calcutta");
                      $date_time = date('d-m-y H:i');
                      $day = date('l');
                        
                      $date=date('d-m-y');


                      // $pagination=ceil($file_number/5);
                      // $r=$arr_atart+1;

                      $r=1;
                      foreach ($file_name as $value) {

                      ?>
                                     
                                            <tr>
                                              <td><b><?php echo $r; ?></b></td>
                                             
                                              <td>
                                                <div class="user-avatar d-flex">
                                                 
                                                  <img src="<?php echo base_url(); ?>asset/img/hindi_file_icon.png" width="60" height="60" alt="Avatar">
                                                   
                                                </div>
                                              </td>

                                               <!-- for disable the context menu or the right click -->

                                               <script type="text/javascript">
                          
                                                document.oncontextmenu=new Function("return false");
                                              </script>




                                              <td width="40%">
                                                <div class="px-2">
                                                  
                                                   <h6><?php echo $value->file_name; ?></h6>
                                                   <h4 class="ellipsis" oncopy="return false" id="text_para"><b><?php  echo $value->text; ?></b></h4>
                                                </div>
                                           
                                              </td>                      
                                                                                          
                                              <td>
                                              <?php  

                                                                                              
                                                    $file_list=scandir('document_uploads/picked/'.$date.'/LOCAL_STORY');

                                                      foreach ($file_list as $key_file) {
                                                      $length=strlen($key_file);

                                                      
                                                       if($length>5){
                                                        $all_val=explode('[@]', $key_file,5);

                                                        $scan_id=$all_val[0];
                                                        $scan_file_name=$all_val[1];
                                                        $scan_pick_by=$all_val[2];
                                                        $scan_edition=$all_val[3];
                                                        $scan_page_no=$all_val[4];
                                                      if($scan_file_name==$value->file_name){
                                                              
                                                             

                                                           ?>



                                                              <div class="form-row d-flex col-md-12">
                                                                
                                                                 <span class="col-md-2 mx-2 bg-success text-center text-light my-2"><h6><b><?php echo $value->date; ?></b></h6></span>

                                                                
                                                                <span class="col-md-2 mx-2 bg-success text-center text-light my-2"><h6><b><?php echo $scan_edition; ?></b></h6></span>
                                                               

                                                                 <span class="col-md-2 mx-2 bg-success text-center text-light my-2"><h6><b><?php echo $scan_page_no; ?></b></h6></span>
                                                                <span class="col-md-2 mx-2 bg-success text-center text-light my-2"><h6><b><?php  echo $scan_pick_by; ?></b></h6></span>
                                                                
                                                              </div> 
                                                         <?php
                                                        }
                                                                                                               
                                                      } 

                                                    }
                                                   ?>
                                                  

                                                 
                                                     

                                                       

                                                    
                                                     
                                                                                                                                                                                                   
                                              </td> 
                                              <td>
                                               
                                                                   
                                              </td> 
                                              





                                              


                                        </tr>

   

                        <?php  $r++;
                            } ?>
                     
                    </tbody>
                  </table>
                </div>





               




              </div>
          
            </div>
           
          </div>







                                  
