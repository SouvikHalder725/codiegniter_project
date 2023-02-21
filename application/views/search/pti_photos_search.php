 <div class="row my-1">
            
            <div class="col-12 col-lg-12">
              <div class="card card-table">
                <div class="card-header col-md-12 d-flex">

                  
                    <div class="title col-md-4">PTI PHOTOS</div>
                    


                   <div class="tools dropdown col-md-8 d-flex">
                    <form class="col-md-10" action="<?php echo base_url(); ?>Search_controller/pti_photos_search" method="post">
                      <div class="col-md-10 d-flex">
                        <input type="text" name="search_news_subject" id="search_news_subject" placeholder="Search News" class="form-control mx-1 col-md-10">
                        <button type="submit" name="search_news_button" id="search_news_button" value="search" class="btn btn-secondary mx-1 col-md-2"><i class="fa fa-search mx-1"></i></button>
                        
                      </div>
                    </form>
               
                    
                      <a href="<?php echo base_url(); ?>File_controller/pti_photos" class="btn btn-info col-md-1 mx-1"> <i class="fa-solid fa-rotate"></i></a>

                      <a href="<?php echo base_url(); ?>welcome/dashboard" class="btn btn-warning col-md-1 mx-1"><i class="fa fa-close"></i></a>
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

                       
                      
                      foreach ($file_name as $value) {
                          

                       // this is for getting image information hide inside the image coming from pti or uni   
                       
                       
                        // $info = exif_read_data("C:\Wire_Agency\UNI_Photos/".$value."",0,true);                                                
                          $size = getimagesize("document_uploads/".$value->date."/PTI_Photos/".$value->file_name."", $info);
                         
                          if(is_array($info)) 
                          {
                            if(isset($info['APP13'])){
                                $iptc = iptcparse($info['APP13']);
                              
                                  if(!isset($iptc['2#105']) && isset($iptc['2#120'])){
                                      $title="Unknown";  
                                      $subject=$iptc['2#120'][0];   
                                     
                                  }
                                  elseif(!isset($iptc['2#120']) && isset($iptc['2#105'])){
                                    $title  =$iptc['2#105'][0];
                                    $subject="Unknown";
                                    
                                  }
                                  elseif(!isset($iptc['2#105']) && !isset($iptc['2#120']) ){
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
                              $pti_date=$value->date;
                              $pti_file_name=$value->file_name;
                              $data_array_title=array(
                                                      "title"=>"$title",
                                                      "subject"=>"$subject"
                                                     
                                                    );

                              $data_title_saved=$this-> db ->set($data_array_title);
                              $data_title_saved=$this -> db -> where('date',$pti_date);
                              $data_title_saved=$this -> db -> where('file_name',$pti_file_name);  
                              $data_title_saved=$this-> db ->update('pti_photos');
                                    

                            }
                            


                          




                             ?>
                        
                        <tr>
                         
                            <td><b>#</b></td>
                        
                        <td>
                          <!-- <img src="<?php// echo base_url(); ?>asset/img/image_icon.png" width="100" height="100" alt="Avatar"> -->
                           <p style="font-size: 12px;"><?php echo $value->file_name; ?></p>
                          <img id="news_img"  src="<?php echo base_url(); ?>document_uploads/<?php echo $date; ?>/PTI_Photos/<?php echo $value->file_name; ?>" width="80" height="80" alt="Pti Photo">
                         
                        </td> 



                         <!-- for disable the context menu or the right click -->

                        <script type="text/javascript">
                          
                          document.oncontextmenu=new Function("return false");
                        </script>
                        


                        <td width="40%">
                          <div class="px-2">
                            <h5 oncopy="return false"><b><?php echo $title; ?></b></h5>
                            <h5 class="ellipsis" oncopy="return false"><b><?php echo $subject; ?></b></h5>                            
                          </div>
                          
                        </td>
                       
                        <td>
                           <?php  


                                  $list=scandir('document_uploads/picked/'.$date.'/PTI_Photos');

        
                                      foreach ($list as $new_value) { 
                                        $length=strlen($new_value);

                                          
                                        if($length>5){
                                        $file_list=scandir('document_uploads/picked/'.$date.'/PTI_Photos/'.$new_value.'/');

                                          foreach ($file_list as $key_file) {

                                             // for getting the image folder and break it in different parts to getiing image pick details

                                           if($key_file==$value->file_name){
                                                $all_val=explode('[@]', $new_value,5);

                                                  $scan_id=$all_val[0];
                                                  $scan_file_name=$all_val[1];
                                                  $scan_pick_by=$all_val[2];
                                                  $scan_edition=$all_val[3];
                                                  $scan_page_no=$all_val[4];

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
                                      } ?>
                                    <div id="pick_form">
                                      <form method="post" action="<?php echo base_url(); ?>File_controller/pick_pti_photos">
                                          <div class="form-row d-flex mx-4">
                                        <input type="hidden" name="pick_file_name" id="pick_file_name" value="<?php echo $value->file_name; ?>">
                                        <input type="hidden" name="pick_submit_val" id="pick_submit_val" value="<?php echo 1; ?>">
                                         <input type="hidden" name="story_id" value="<?php echo $value->id; ?>">
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

                        <td>
                          <div class="d-flex mx-2 text-center"> 
                            
                             


                               <?php 
                                  $pick_real_id=$value->id;
                                  $na=$value->file_name;

                                  $data_res= $this -> db -> where('story_id', $pick_real_id); 
                                  $data_res= $this-> db ->get('pti_photos_pick_realise');
                                  $detal=$data_res->result();
                                  $num_row=$data_res->num_rows();
                                      if($num_row>0){
                                   
                                    ?>
                                           <a href="#" class="btn btn-info mx-2" data-bs-toggle="modal" data-bs-target="#realise_info_modal_<?php echo $value->id; ?>"><i class="fa fa-circle-exclamation"></i></a>

                                              <!-- Modal -->
                                                <div class="modal fade" id="realise_info_modal_<?php echo $value->id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                  <div class="modal-dialog modal-xl">
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">All Pick & Realise Details</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                      </div>
                                                      <div class="modal-body">
                                                        <?php  foreach ($detal as $pick_val) { ?>
                                                        <div class="row col-md-12 mx-3 my-3 text-left">
                                                          <span><h6>Pick By :<?php echo $pick_val->pick_by; ?></h6></span>
                                                          <span><h6>Pick Date :<?php echo $pick_val->pick_date; ?></h6></span>
                                                          <span><h6>Story Name :<?php echo $pick_val->story_name; ?></h6></span>
                                                          <span><h6>Story Date :<?php echo $pick_val->story_date; ?></h6></span>
                                                           <span><h6>Story Edition :<?php echo $pick_val->edition; ?></h6></span>
                                                            <span><h6>Story Page :<?php echo $pick_val->page; ?></h6></span>
                                                             <span><h6>Story Realise Time :<?php echo $pick_val->realise_time; ?></h6></span>
                                                          <span><h6>Story Realise By :<?php echo $pick_val->realised_by; ?></h6></span>
                                                          <span><h6>Story Realise Date :<?php echo $pick_val->realise_date; ?></h6></span>
                                                          <span><h6>Story Want :<?php echo $pick_val->give_it_to; ?></h6></span>
                                                           <span><h6>Story Realise Reason :<?php echo $pick_val->realise_reason; ?></h6></span>

                                                        </div>
                                                        <hr>
                                                       <?php } ?>
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary">Ok</button>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                                <!--  modal---->
                                    <?php 
                                      
                                    
                                  } 
                                  ?>                               
                            
                          </div>
                                             
                        </td> 
                       
                                       
                       



                         <!-- Modal -->
                                  <div class="modal fade" id="view_pti_photo_story_modal_<?php echo $value->id;  ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-xl">
                                      <div class="modal-content" style="width:100%;">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel"><?php echo $value->file_name; ?></h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                          <div class="row col-md-12 mx-3 my-3 text-left">
                                           
                                            <img width="" height="" src="<?php echo base_url(); ?>document_uploads/picked/<?php echo $date; ?>/PTI_Photos/<?php echo $value->file_name; ?>">
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

                   
                   
                   <?php  
                 
                            } ?>

                     
                    </tbody>
                  </table>
                </div>

               



               

              </div>
            </div>
          </div>
