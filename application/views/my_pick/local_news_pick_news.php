 <div class="row my-1 d-flex">
            
            <div class="col-12 col-lg-12">
           
              <div class="card card-table">
                <div class="card-header col-md-12 d-flex">

                   <div class="title col-md-9">LOCAL STORY</div>
                    <div class="tools dropdown col-md-3 d-flex">
                                              
                     <!-- <a href="<?php// echo base_url('Mywork_controller/my_pick_news_folder/'.$this_date.''); ?>" class="btn btn-warning col-md-2 mx-2"><i class="fa fa-arrow-left"></i></a> -->
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
                        <th>Action</th>
                      
                       
                      </tr>
                    </thead>
                    <tbody>

                      <?php
                      $timezone=date_default_timezone_set("Asia/Calcutta");
                      $date_time = date('d-m-y H:i');
                      $day = date('l');
                        
                      $date=date('d-m-y');
                     
                      $time=date('H:i:s');
               


                      // $pagination=ceil($file_number/5);

                      $i=1;
                      $pick_by=$this->session->userdata('user_name');
                      $pick_by_emp_id=$this->session->userdata('emp_id');
                      $new_pick_by=''.$pick_by.''.$pick_by_emp_id.'';
                      
                      foreach ($file_name as $value) {
                      $list=scandir('document_uploads/picked/'.$value->date.'/LOCAL_STORY');

                    
                          foreach ($list as $new_value) { 
                           $length=strlen($new_value);

                              if($length>5){
                              
                               $file_list=scandir('document_uploads/picked/'.$value->date.'/LOCAL_STORY/'.$new_value.'/');

                                  foreach ($file_list as $key_file) {
                                     $file_length=strlen($key_file);
                                     if($file_length>5){
                                      if($key_file==$value->file_name){
                                         $explode_val=explode('[@]', $new_value,5);
                                             $scan_id=$explode_val[0];
                                              $scan_file_name=$explode_val[1];
                                              $scan_pick_by=$explode_val[2];
                                              $scan_edition=$explode_val[3];
                                              $scan_page_no=$explode_val[4];
                                              if($scan_pick_by==$new_pick_by){
                                     

                        
     

                             ?>
                                     
                                            <tr>
                                              <td><b>#</b></td>
                                             
                                              <td>
                                                <div class="user-avatar d-flex">
                                                  <img src="<?php echo base_url(); ?>asset/img/hindi_file_icon.png" width="60" height="60" alt="Avatar">
                                                </div>
                                              </td>
                                              <td width="40%">
                                                <div class="px-2">
                                                  
                                                   <div class="text-left" style="font-size: 20px;font-weight:bold;"><?php echo $value->file_name; ?></div>
                                                   <div class="text-left" style="font-size: 14px;font-weight:bold;" style=""><?php echo $value->file_creation_date_time; ?></div>
                                                   <h5 class="ellipsis" oncopy="return false" id="text_para"><b><?php  echo $value->text; ?></b></h5>
                                                </div>
                                           
                                              </td>                      
                                             
                                              
                                             
                                              <td>
                                               
                                                    <div class="form-row d-flex col-md-12">
                                                      <span class="col-md-2 bg-success text-center text-light mx-1 my-2"><h6><b><?php echo $value->date; ?></b></h6></span>
                                                      <span class="col-md-2 bg-success text-center text-light mx-1 my-2"><h6><b><?php echo $scan_edition; ?></b></h6></span> 
                                                      <span class="col-md-2 bg-success text-center text-light mx-1 my-2"><h6><b><?php echo $scan_page_no; ?></b></h6></span>
                                                      <span class="col-md-2 bg-success text-center text-light mx-1 my-2"><h6><b><?php echo $scan_pick_by; ?></b></h6></span> 
                                                    </div> 
                                                                                                                                                                                                                                                                                                          
                                               </td> 
                                                <td>
                                                <div class="d-flex mx-2 text-center"> 
                                                                                                      
                                                  <a class="btn btn-light mx-2" href="#" type="button" data-bs-toggle="modal" data-bs-target="#view_story_modal_<?php echo $value->id; ?>">
                                                      <i class="fa fa-eye"></i>
                                                  </a>          
                                                    <!--  <span class="btn btn-light mx-2"><i class="fa-sharp fa fa-eye-slash"></i></span>  -->
                                                  <a class="btn btn-success mx-2" href="#" type="button" data-bs-toggle="modal" data-bs-target="#realise_story_modal_<?php echo $value->id; ?>">
                                                      <i class="fa fa-hand-pointer"></i>
                                                  </a>
                                                   
                                                    <!-- copy text with javascript -->
                                                  <!-- <a  onclick="withJquery(<?php echo $value->id; ?>);" class="btn btn-primary"><i class="fa fa-copy"></i></a>   -->
                                                   <a href="#"  onclick="local_news_translate('<?php echo $value->id; ?>');" id="pti_translate" type="button" data-bs-toggle="modal" data-bs-target="#hindi_tittle_modal_<?php echo $value->id; ?>" class="btn btn-primary mx-2"><i class="fa fa-language"></i></a> 
                                                      
                                                                                             
                                                </div>
                                                                   
                                              </td> 
                                             


                                               



                                               <!-- Modal  for english-->
                                              <div class="modal fade" id="view_story_modal_<?php echo $value->id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-xl">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h5 class="modal-title" id="exampleModalLabel"><?php echo $value->file_name; ?></h5>
                                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                      <div class="row col-md-12 mx-3 my-3 text-left">

                                                        <textarea style="font-size:20px;" class="form-control" id="local_eng_text_<?php echo $value->id; ?>"  cols="20" rows="23"><?php  echo $value->text; ?></textarea>
                                                      </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                      <button onclick="english_copy(<?php echo $value->id; ?>);" type="button" class="btn btn-primary"><i class="fa fa-copy mx-1"></i>Copy</button>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                              <!--  modal---->



                                               <!-- Modal for hindi  -->
                                               <div class="modal fade" id="hindi_tittle_modal_<?php echo $value->id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-xl">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h5 class="modal-title" id="exampleModalLabel"><?php echo $value->file_name; ?></h5>
                                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                      <div class="row col-md-12 mx-3 my-3 text-left">
                                                           <textarea style="font-size:20px;" class="form-control"  cols="20" rows="8"><?php  echo $value->text; ?></textarea>
                                                         <hr>
                                                        <textarea style="font-size:20px;" class="form-control" id="local_hindi_text_<?php echo $value->id; ?>" cols="20" rows="15"><?php  echo $value->text; ?></textarea>
                                                      </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                      <button onclick="hindi_copy(<?php echo $value->id; ?>);" type="button" class="btn btn-primary"><i class="fa fa-copy mx-1"></i>Copy Hindi</button>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                              <!--  modal -->



                                               <script type="text/javascript">
                                                    
                                                      // function withJquery(text_id){

                                                      // // var text_id=document.getElementById("abc_<?php echo $value->id; ?>").innerHTML;
                                                      //  // alert(''+text_id+'');

                                                      //   console.time('time1');
                                                      //   var temp = $("<input>");
                                                      //   $("body").append(temp);
                                                      //  temp.val($('#copyText2_'+text_id+'').text()).select();
                                                      //   document.execCommand("copy");
                                                      //   temp.remove();
                                                      //     console.timeEnd('time1');
                                                      // }
                                                      function english_copy(id) {
                                                        let copyText = document.querySelector("#local_eng_text_"+id+"");
                                                        copyText.select();
                                                        document.execCommand("copy");
                                                      } 
                                                       
                                                      function hindi_copy(id) {
                                                        let copyText = document.querySelector("#local_hindi_text_"+id+"");
                                                        copyText.select();
                                                        document.execCommand("copy");
                                                      } 
                                                      


                                                </script>





                                                <!-- Modal -->
                                              <div class="modal fade" id="realise_story_modal_<?php echo $value->id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-xl">
                                                  <div class="modal-content">
                                                     <form method="post" action="<?php echo base_url(); ?>Local_controller/local_story_realise_report">
                                                    <div class="modal-header">
                                                      <h5 class="modal-title" id="exampleModalLabel">Reasons For Realise</h5>
                                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>

                                                  
                                                    <div class="modal-body">
                                                      <div class="row col-md-12 mx-3 my-3 text-left">
                                                        <input type="hidden" class="form-control" name="realised_by" value="<?php echo $new_pick_by; ?>">
                                                        <input type="hidden" class="form-control" name="realised_time" value="<?php echo $time; ?>">
                                                        <input type="hidden" class="form-control" name="file_id" value="<?php echo $value->id; ?>">
                                                        <input type="hidden" class="form-control" name="page_ed" value="<?php echo $scan_edition; ?>">
                                                        <input type="hidden" class="form-control" name="page_no" value="<?php echo $scan_page_no; ?>">
                                                         <input type="hidden" class="form-control" name="story_name" value="<?php echo $value->file_name; ?>">
                                                       
                                                      </div>
                                                      
                                                      <div class="row col-md-12 mx-3 my-3 text-left">
                                                        <label class="form-label">Who Want This Story?</label>
                                                        <input type="text" class="form-control" name="give_it_to">
                                                      </div>
                                                       <div class="row col-md-12 mx-3 my-3 text-left">
                                                        <label class="form-label">Reason For Realise?</label>
                                                        <textarea type="text" class="form-control" name="reason" cols="20" rows="10"></textarea>
                                                      </div>
                                                    </div>
                                                  


                                                    <div class="modal-footer">
                                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                      <input type="submit" name="realise_submit" class="btn btn-primary" value="Submit">
                                                      <!-- <button type="button" class="btn btn-primary">Submit</button> -->
                                                    </div>
                                                  </form>
                                                  </div>
                                                </div>
                                              </div>
                                              <!--  modal---->


                                        </tr>

   

                        <?php }
                             }
                             }
                               
                            } 
                          }
                        }
                       $i++;
                       
                      } ?>
                     
                    </tbody>
                  </table>
                </div>


              </div>
          
            </div>
           
          </div>







                                  
