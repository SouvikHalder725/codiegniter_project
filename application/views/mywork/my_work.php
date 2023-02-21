 <div class="row my-1 d-flex">
            
            <div class="col-12 col-lg-12">
           
              <div class="card card-table">
                <div class="card-header col-md-12 d-flex">

                   <div class="title col-md-8">Pti Bhasha</div>
                   
                   <div class="tools dropdown col-md-4 d-flex">
               
                    <!-- <div class="btn btn-success col-md-3 mx-2"><a  href="#"><i class="fa fa-check text-light"></i></a></div> -->
                    <!-- <a href="<?php //echo base_url(); ?>File_controller/pti_bhasha_selected_file" class="btn btn-warning col-md-2 mx-2"><i class="fa fa-file"></i></a> -->

                    <div class="dropdown col-md-2 mx-3">
                      <a class="btn btn-primary" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-bars my-2 py-2 mx-3"></i>
                      </a>

                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                      </ul>
                    </div>

                     <!-- <div class="btn btn-secondary col-md-3 mx-2"><i class="fa fa-download"></i></div> -->
                     <a href="<?php echo base_url(); ?>Mywork_controller/my_work" class="btn btn-info col-md-2 mx-2"> <i class="fa-solid fa-rotate"></i></a>

                     <a href="<?php echo base_url(); ?>welcome/dashboard/1" class="btn btn-warning col-md-2 mx-2"><i class="fa fa-close"></i></a>
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
                        <th class="actions">Status</th>
                        <th>Informations</th>
                       <!--  <th>Pg/Ed</th> -->
                        <th class="actions">Actions</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php
                      $timezone=date_default_timezone_set("Asia/Calcutta");
                      $date_time = date('d-m-y H:i');
                      $day = date('l');
                        
                      $date=date('d-m-y');


                      $pagination=ceil($file_number/5);

                      
                      foreach ($file_name as $value) {
                        if($value->picked==1){ 
                          $bg='success';
                          $status='Picked';
                          $file_date=$value->date;
                         
                        }else{
                          $bg='danger';
                          $status='Not Picked';

                        }

                      ?>
                                     
                                            <tr>
                                              <td><b></b></td>
                                             
                                              <td>
                                                <div class="user-avatar d-flex">
                                                  <img src="<?php echo base_url(); ?>asset/img/hindi_file_icon.png" width="60" height="60" alt="Avatar">
                                                </div>
                                              </td>
                                              <td width="40%">
                                                <div class="px-2">
                                                  
                                                   <h5><?php echo $value->file_name; ?></h5>
                                                   <p class="ellipsis" oncopy="return false" id="text_para"><?php  echo $value->text; ?></p>
                                                </div>
                                           
                                              </td>                      
                                             
                                              <td>
                                                <span class="badge bg-<?php echo $bg; ?> mx-2">
                                                  <h5><b><?php echo $status; ?></b></h5> 
                                                </span>
                                              </td>
                                             
                                              <td>
                                                <?php if($value->picked==1){ ?>
                                               
                                                      <div class="form-row d-flex col-md-12">
                                                   
                                                        <span class="col-md-3 bg-success text-center text-light mx-1"><h6><b><?php echo $file_date;?></b></h6></span>
                                                        <span class="col-md-4 bg-success text-center text-light mx-1"><h6><b><?php echo $value->edition;?></b></h6></span>
                                                        <span class="col-md-4 bg-success text-center text-light mx-1"><h6><b><?php echo $value->page;?></b></h6></span>
                                                        
                                                      </div>
                                                <?php }else{ ?>
                                                  
                                                  
                                                      <div id="pick_form">
                                                            <form method="post" action="<?php echo base_url(); ?>File_controller/pick_bhasha_story">
                                                                <div class="form-row d-flex">
                                                              <input type="hidden" name="pick_file_name" id="pick_file_name" value="<?php echo $value->file_name; ?>">
                                                              <input type="hidden" name="pick_submit_val" id="pick_submit_val" value="1">
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

                                                    <?php } ?>
                                                     
                                                                                                                                                                                                   
                                              </td> 
                                              <td>
                                                <div class="d-flex mx-2 text-center">
                                                   <?php if($value->picked==1){ ?>
                                                           <a class="btn btn-success mx-2" href="<?php echo base_url('Del_controller/del_bhasha_folder/'.$value->file_name.''); ?>"><i class="fa-solid fa-check"></i></a>
                                                           <a class="btn btn-light mx-2" href="#" type="button" data-bs-toggle="modal" data-bs-target="#view_story_modal_<?php echo $value->id; ?>"><i class="fa fa-eye"></i></a>
                                                           
                                                   <?php }else{ ?>
                                                            <span class="btn btn-light mx-2"><i class="fa-sharp fa fa-eye-slash"></i></span>                                                
                                                    <?php } ?>
                                                   </div>
                                                                   
                                              </td>






                                               <!-- Modal -->
                                              <div class="modal fade" id="view_story_modal_<?php echo $value->id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-xl">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h5 class="modal-title" id="exampleModalLabel"><?php echo $value->file_name; ?></h5>
                                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                      <div class="row col-md-12 mx-3 my-3 text-left">
                                                        <textarea class="form-control" cols="20" rows="40"><?php  echo $value->text; ?></textarea>
                                                      </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                      <button type="button" class="btn btn-primary">Ok</button>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                              <!--  modal -->



                                        </tr>

   

                        <?php      } ?>
                     
                    </tbody>
                  </table>
                </div>





               <div class="col-md-12 my-1">

                <nav aria-label="Page navigation example text-center my-3">
                  <ul class="pagination">
                    <li class="page-item">
                      <a class="page-link" href="<?php echo base_url(); ?>Mywork_controller/my_work" aria-label="Previous">
                        <h5><b><span aria-hidden="true">&laquo;</span></b></h5>
                      </a>
                    </li>
                  <?php for ($i=$page_number; $i <=$page_number+4 ; $i++) { ?>

                      <li class="page-item">

                        <form method="post" action="<?php echo base_url(); ?>Mywork_controller/my_work">
                          <input type="hidden" name="page_no" value="<?php echo $i; ?>">
                          <button class="page-link" name="pti_bhasha_page" type="submit">
                            <h5><b><?php echo $i; ?></b></h5>
                          </button>
                          
                          
                        </form>
                        
                      </li>

                  <?php } ?>
                    <li class="page-item">
                      <a class="page-link" href="<?php echo base_url('Mywork_controller/my_work/'.$pagination.''); ?>" aria-label="Next">
                        <h5><b><span aria-hidden="true">&raquo;</span></b></h5>
                      </a>
                    </li>
                  </ul>
                </nav>
              </div>




              </div>
          
            </div>
           
          </div>







                                  
