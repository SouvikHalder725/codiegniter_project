
<div class="row my-1">
            
            <div class="col-12 col-lg-12">
              <div class="card card-table">
                <div class="card-header col-md-12 d-flex">



                    <div class="title col-md-9">LOCAL PHOTOS</div>
                     <div class="tools dropdown col-md-3 d-flex">
                                              
                     <a href="<?php echo base_url('Mywork_controller/all_category_folder/'.$this_date.''); ?>" class="btn btn-warning col-md-2 mx-2"><i class="fa fa-arrow-left"></i></a>
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
                        
                      </tr>
                    </thead>
                    <tbody>

                      <?php 
                     
                       $timezone=date_default_timezone_set("Asia/Calcutta");
                        $date_time = date('d-m-y H:i');
                        $day = date('l');
                        
                        $date=date('d-m-y');
                        // $pagination=ceil($file_number/5);

                      $i=1;
                      foreach ($file_name as $value) {
                          
                        
                       
                       
                        
                          // $info = exif_read_data("C:\Wire_Agency\UNI_Photos/".$value."",0,true);                                                
                            $size = getimagesize("document_uploads/".$value->date."/LOCAL_PHOTOS/".$value->file_name."", $info);
                           
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
                             <b><?php echo $i; ?></b>
                         </td>
                        <td>
                          <!-- <img src="<?php //echo base_url(); ?>asset/img/image_icon.png" width="100" height="100" alt="Avatar"> -->
                          <div class="text-left" style="font-size: 20px;font-weight:bold;"><?php echo $value->file_name; ?></div>
                                                   <div class="text-left" style="font-size: 14px;font-weight:bold;" style=""><?php echo $value->file_creation_date_time; ?></div>
                          <img src="<?php echo base_url(); ?>document_uploads/<?php echo $value->date; ?>/LOCAL_PHOTOS/<?php echo $value->file_name; ?>" width="80" height="80" alt="Uni Photo">
                          
                        </td> 

                         <!-- for disable the context menu or the right click -->

                                               <script type="text/javascript">
                          
                                                document.oncontextmenu=new Function("return false");
                                              </script>



                                              
                         <td width="40%">
                          <div class="px-2">
                            <h5 oncopy="return false"><b><?php echo $title; ?></b></h5>
                            <h6 class="ellipsis" oncopy="return false"><b><?php echo $subject; ?></b></h6>                            
                          </div>
                          
                        </td> 
                        

                        <td>

                          <?php  


                                              $list=scandir('document_uploads/picked/'.$value->date.'/LOCAL_PHOTOS');

                    
                                                  foreach ($list as $new_value) { 
                                                    $length=strlen($new_value);

                                                      
                                                    if($length>5){
                                                    
                                                       
                                                            $all_val=explode('[@]', $new_value,5);

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
                          
                                    <div id="pick_form">
                                     <form method="post" action="<?php echo base_url(); ?>Archivepick_controller/archive_pick_local_photos_story">
                                                              <div class="form-row d-flex">
                                                              <input type="hidden" name="story_id" id="story_id" value="<?php echo $value->id; ?>">
                                                              <input type="hidden" name="pick_file_name" id="pick_file_name" value="<?php echo $value->file_name; ?>">
                                                              <input type="hidden" name="pick_submit_val" id="pick_submit_val" value="1">
                                                               <input type="hidden" name="archive_date" id="archive_date" value="<?php echo $value->date; ?>">
                                            <div class="my-2">
                                               <select class="form-select col-md-12" id="page_ed" name="page_ed">
                                                <option value="" selected>Select Edition</option>
                                                <option value="kol">Kol</option>
                                                <option value="kgp">Kgp</option>
                                                <option value="drg">Drg</option>
                                                <option value="asn">Asn</option>
                                                <option value="sil">Sil</option>
                                                <option value="adm">Adm</option>
                                                <option value="sb">SB</option>
                                                <option value="pat">Pat</option>
                                                <option value="rnc">Rnc</option>
                                                
                                               </select>
                                            
                                              
                                            </div>
                                            <div class="my-2">
                                              <select class="form-select col-md-12" id="page_no" name="page_no">
                                                <option value="" selected>Select Page</option>
                                                <option value="pg1">Page1</option>
                                                <option value="pg2">Page2</option>
                                                <option value="pg3">Page3</option>
                                                <option value="pg4">Page4</option>
                                                <option value="pg5">Page5</option>
                                                <option value="pg6">Page6</option>
                                                <option value="pg7">Page7</option>
                                                <option value="pg8">Page8</option>
                                                <option value="pg9">Page9</option>
                                                <option value="pg10">Page10</option>
                                                <option value="pg11">Page11</option>
                                                <option value="pg12">Page12</option>
                                                <option value="pg13">Page13</option>
                                                <option value="pg14">Page14</option>
                                                <option value="pg15">Page15</option>
                                                <option value="pg16">Page16</option>
                                                <option value="pg17">Page17</option>
                                                <option value="pg18">Page18</option>
                                                <option value="pg19">Page19</option>
                                                <option value="pg20">Page20</option>
                                                <option value="pg21">Page21</option>
                                                <option value="pg22">Page22</option>
                                                <option value="pg23">Page23</option>
                                                <option value="pg24">Page24</option>
                                               
                                                
                                              </select>
                                             
                                            </div>
                                            <div class="my-2 mx-1">

                                            <button type="submit" class=" btn btn-primary" id="submit"><i class="fa fa-hand-pointer"></i></button>
                                           
                                            
                                            </div>
                                          </div>
                                         
                                        </form>
                                    </div>
                             
                                                      
                        </td>
                         
                         
                                          
                       


                                  <!-- Modal -->
                                  <div class="modal fade" id="view_uni_photo_story_modal_<?php echo $value->id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-xl">
                                      <div class="modal-content" style="width:100%;">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel"><?php echo $value->file_name; ?></h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                          <div class="row col-md-12 mx-3 my-3 text-left">
                                           
                                            <img width="" height="" src="<?php echo base_url(); ?>document_uploads/LOCAL_PHOTOS/<?php echo $value->date; ?>/<?php echo $value->file_name; ?>">
                                             <!-- <textarea class="form-control" cols="20" rows="40"><?php  echo $subject; ?></textarea> -->
                                              <div class="py-2 px-2">
                                                <h3><b><?php echo $title; ?></b></h3>
                                                <h5><b><?php echo $subject; ?></b></h5>                            
                                              </div>
                                          </div>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                          <button type="button" class="btn btn-primary">Ok</button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <!-- modal -->



                      </tr>
                   <?php $i++;
                 } ?>
                     
                    </tbody>
                  </table>
                </div>

   
              </div>
            </div>
          </div>
