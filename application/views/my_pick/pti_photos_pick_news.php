 <div class="row my-1">
            
            <div class="col-12 col-lg-12">
              <div class="card card-table">
                <div class="card-header col-md-12 d-flex">

                  
                    <div class="title col-md-9">PTI PHOTOS</div>
                     <div class="tools dropdown col-md-3 d-flex">
                                              
                     <!-- <a href="<?php //echo base_url('Mywork_controller/my_pick_news_folder/'.$this_date.''); ?>" class="btn btn-warning col-md-2 mx-2"><i class="fa fa-arrow-left"></i></a> -->
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
                           
                  <table class="table table-striped table-hover">
                    <thead>
                     <tr>
                        <th>#</th>
                        <th></th>
                        <th width="40%">Details</th>                                              
                        <th>Informations</th>
                        <th>Actions</th>
                       
                      </tr>
                    </thead>
                    <tbody>

                      <?php 
                        $timezone=date_default_timezone_set("Asia/Calcutta");
                        $date_time = date('d-m-y H:i');
                        $day = date('l');                      
                        $date=date('d-m-y');
                          $time=date('H:i:s');

                        $pagination=ceil($file_number/5);

                      $i=1;
                       $pick_by=$this->session->userdata('user_name');
                       $pick_by_emp_id=$this->session->userdata('emp_id');
                       $new_pick_by=''.$pick_by.''.$pick_by_emp_id.'';
                      foreach ($file_name as $value) {
                          $list=scandir('document_uploads/picked/'.$value->date.'/PTI_Photos');


                            foreach ($list as $new_value) { 
                              $length=strlen($new_value);

                                
                              if($length>5){
                              $file_list=scandir('document_uploads/picked/'.$value->date.'/PTI_Photos/'.$new_value.'/');

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
                          
                       
                       
                                // $info = exif_read_data("C:\Wire_Agency\UNI_Photos/".$value."",0,true);                                                
                                  $size = getimagesize("document_uploads/".$value->date."/PTI_Photos/".$value->file_name."", $info);
                                 
                                  if(is_array($info)) 
                                  {
                                    if(isset($info['APP13'])){
                                        $iptc = iptcparse($info['APP13']);
                                      
                                          if(!isset($iptc['2#105'])){
                                             $title="Unknown";  
                                              $subject=$iptc['2#120'][0];   
                                             
                                          }
                                          elseif(!isset($iptc['2#120'])){
                                            $subject="Unknown";
                                             $title  =$iptc['2#105'][0];
                                          }
                                          elseif(!isset($iptc['2#105']) && !isset($iptc['2#120'])){
                                             $title="Unknown"; 
                                             $subject="Unknown";
                                          }
                                          else{
                                              $title  =$iptc['2#105'][0];
                                              $subject=$iptc['2#120'][0];
                                                                                         
                                          }   
                                      }
                                      else{
                                         $title  ="Unknown";
                                         $subject="Unknown";


                                      }  

                                    }         

                          ?>
                        
                      <tr>
                         <td>
                             <b>#</b>
                         </td>
                        <td>
                          <!-- <img src="<?php// echo base_url(); ?>asset/img/image_icon.png" width="100" height="100" alt="Avatar"> -->
                          <div class="text-left" style="font-size: 20px;font-weight:bold;"><?php echo $value->file_name; ?></div>
                                                   <div class="text-left" style="font-size: 14px;font-weight:bold;" style=""><?php echo $value->file_creation_date_time; ?></div>
                          <img id="copyimg_<?php echo $value->id; ?>"  src="<?php echo base_url(); ?>document_uploads/<?php echo $value->date; ?>/PTI_Photos/<?php echo $value->file_name; ?>" width="80" height="80" alt="Pti Photo">
                         <!--  -->
                        </td> 
                        <td width="40%">
                          <div class="px-2">
                          
                            <h5 id="picture_tittle<?php echo $value->id; ?>" oncopy="return false"><b><?php echo $title; ?></b></h5>
                            <h5 id="picture_subject" class="ellipsis" oncopy="return false"><b><?php echo $subject; ?></b></h5>                            
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
                        <div class="d-flex mx-1 text-center">                                                                               
                          <a class="btn btn-light mx-1" href="#" type="button" data-bs-toggle="modal" data-bs-target="#view_pti_photo_story_modal_<?php echo $value->id; ?>"><i class="fa fa-eye"></i></a>                                      
                          <a class="btn btn-success mx-1" href="#" type="button" data-bs-toggle="modal" data-bs-target="#realise_story_modal_<?php echo $value->id; ?>"><i class="fa fa-hand-pointer"></i></a>
                          <a href="<?php echo base_url('welcome/pti_download/'.$value->date.'/'.$value->file_name.''); ?>" class="btn btn-secondary mx-1" ><i class="fa fa-download"></i></a>

                          <a  id="copy"  class="btn btn-primary"><i class="fa fa-copy"></i></a>
                          <a href="#"  onclick="pti_translate('<?php echo $value->id; ?>');" id="pti_translate" type="button" data-bs-toggle="modal" data-bs-target="#hindi_tittle_modal_<?php echo $value->id; ?>" class="btn btn-primary mx-2"><i class="fa fa-language"></i></a>  
                                                                           
                        </div>
                                               
                        </td> 
                       
                                       
                       



                         <!-- Modal  for english tittle-->
                                  <div class="modal fade" id="view_pti_photo_story_modal_<?php echo $value->id;  ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-xl">
                                      <div class="modal-content" style="width:100%;">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel"><?php echo $value->file_name; ?></h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                          <div class="row col-md-12 mx-3 my-3 text-left">
                                           
                                            <img width="400" height="400" id="copyimg_two" src="<?php echo base_url(); ?>document_uploads/<?php echo $value->date; ?>/PTI_Photos/<?php echo $value->file_name; ?>">
                                          
                                            
                                              <div class="d-flex my-2">
                                                   <input style="font-size:20px;" type="text" class="form-control col-md-11" name="" id="eng_tittle_<?php echo $value->id; ?>" value="<?php echo $title; ?>">
                                                   <a onclick="english_tittle('<?php echo $value->id; ?>');" class="btn btn-primary mx-1 "><i class="fa fa-copy"></i></a>
                                                 </div>
                                                 <div class="d-flex my-2">
                                                   <textarea style="font-size:20px;" cols="10" rows="10" class="form-control col-md-11" name="" id="eng_subject_<?php echo $value->id; ?>"><?php echo $subject; ?></textarea> 
                                                    <a onclick="english_subject('<?php echo $value->id; ?>');" class="btn btn-primary mx-1" style="height: 50px;"><i class="fa fa-copy"></i></a>
                                                 </div> 
                                          </div>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                          <!-- <button type="button" class="btn btn-primary">Ok</button> -->
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <!-- modal -->




                                   <!-- Modal for hindi tittle-->
                                  <div class="modal fade" id="hindi_tittle_modal_<?php echo $value->id;  ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-xl">
                                      <div class="modal-content" style="width:100%;">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel"><?php echo $value->file_name; ?></h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                          <div class="row col-md-12 mx-3 my-1 text-left">
                                           
                                            <img width="350" height="350" id="copyimg_two" src="<?php echo base_url(); ?>document_uploads/<?php echo $value->date; ?>/PTI_Photos/<?php echo $value->file_name; ?>">
                                          
                                             <!-- <textarea class="form-control" cols="20" rows="40"><?php  echo $subject; ?></textarea> -->
                                              <div class="py-1 px-1">
                                                   <input style="font-size:20px;" type="text" class="form-control col-md-11" name="" value="<?php echo $title; ?>"> 
                                                 
                                                  <div class="d-flex my-1">
                                                    
                                                    <input style="font-size:20px;" type="text" class="form-control col-md-11" name="" id="hindi_tittle_<?php echo $value->id; ?>" value="<?php echo $title; ?>"> 

                                                    <a onclick="hindi_tittle('<?php echo $value->id; ?>');" class="btn btn-primary mx-1 "><i class="fa fa-copy"></i></a>
                                                  </div>


                                                   <textarea style="font-size:20px;" cols="10" rows="5" class="form-control col-md-11" name=""><?php echo $subject; ?></textarea> 
                                                  
                                                  <div class="d-flex my-1">
                                                     <textarea style="font-size:20px;" cols="10" rows="5" class="form-control col-md-11" name="" id="hindi_subject_<?php echo $value->id; ?>"><?php echo $subject; ?></textarea> 
                                                   
                                                    <a onclick="hindi_subject('<?php echo $value->id; ?>');" class="btn btn-primary mx-1" style="height: 50px;"><i class="fa fa-copy"></i></a>
                                                  </div>
                                                                        
                                              </div>
                                          </div>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                          <!-- <button type="button" class="btn btn-primary">Ok</button> -->
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <!-- modal -->



                                  <script type="text/javascript">


                                    function withJquery(id){
                                        const img = document.querySelector("#copyimg_"+id+"");
                                        const copyBtn = document.querySelector("#copy");
                                        const canvas = document.createElement("canvas");
                                        // canvas.width = img.width;
                                        // canvas.height = img.height;
                                              canvas.width = 4200;
                                              canvas.height = 2900;
                                        canvas.getContext("2d").drawImage(img, 0, 0,4800,3000);
                                        canvas.toBlob((blob) => {
                                          navigator.clipboard.write([
                                              new ClipboardItem({ "image/png": blob })
                                          ]);
                                        }, "image/png");
                                    };
                                     function hindi_tittle(id) {
                                      let copyText = document.querySelector("#hindi_tittle_"+id+"");
                                      copyText.select();
                                      document.execCommand("copy");
                                    } 
                                    function hindi_subject(id) {
                                      let copyText = document.querySelector("#hindi_subject_"+id+"");
                                      copyText.select();
                                      document.execCommand("copy");
                                    } 
                                     function english_tittle(id) {
                                      let copyText = document.querySelector("#eng_tittle_"+id+"");
                                      copyText.select();
                                      document.execCommand("copy");
                                    } 
                                    function english_subject(id) {
                                      let copyText = document.querySelector("#eng_subject_"+id+"");
                                      copyText.select();
                                      document.execCommand("copy");
                                    } 




                                  </script>




                                                <!-- Modal -->
                                              <div class="modal fade" id="realise_story_modal_<?php echo $value->id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-xl">
                                                  <div class="modal-content">
                                                     <form method="post" action="<?php echo base_url(); ?>Mywork_controller/pti_photos_realise_report">
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

                   
                   
                  <?php  }
                }
                }
                }
              }
            }
            $i++;
          }   ?>

                     
                    </tbody>
                  </table>
                </div>
            
              </div>
            </div>
          </div>
