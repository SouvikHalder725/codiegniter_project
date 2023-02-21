 <div class="row my-1 d-flex">
            
            <div class="col-12 col-lg-12">
           
              <div class="card card-table">
                <div class="card-header col-md-12 d-flex">

                   <div class="title col-md-4">ALL OLD NEWS FOLDER</div>
                   
                   <div class="tools dropdown col-md-8 d-flex">
                     <form class="col-md-10" action="<?php echo base_url(); ?>Search_controller/archive_search" method="post">
                      <div class="col-md-12 d-flex">
                        <input type="date" name="search_news_subject" id="search_news_subject" placeholder="Search News" class="form-control mx-1 col-md-10" style="font-size: 20px;">
                        <button type="submit" name="search_news_button" id="search_news_button" value="search" class="btn btn-secondary mx-1 col-md-2"><i class="fa fa-search mx-1"></i></button>
                        
                      </div>
                     </form>
                                 
                     <a href="<?php echo base_url(); ?>Mywork_controller/all_folder" class="btn btn-info col-md-1 mx-2"> <i class="fa-solid fa-rotate"></i></a>

                     <a href="<?php echo base_url(); ?>welcome/dashboard/1" class="btn btn-warning col-md-1 mx-2"><i class="fa fa-close"></i></a>
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
                        <th>Folder Date</th>                        
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php
                      $timezone=date_default_timezone_set("Asia/Calcutta");
                      $date_time = date('d-m-y H:i');
                      $day = date('l');
                        
                      $date=date('d-m-y');


                      
                      $list=scandir('document_uploads');

                      $i=0;
                      foreach (array_reverse($list) as $value) { 
                        $length=strlen($value);
                        $month=date('m');

                        $new_date=date('m',strtotime($value));

                          
                          if($length>5 && $value!="picked" && $value!=$date && $month==$new_date){
                            // $new_file_date=date('d-m-y',strtotime($value));
                          ?>
                          <tr>
                            <td>
                              <h4><?php echo $i ; ?></h4>
                            </td>
                            <td>
                              <a href="<?php echo base_url('Mywork_controller/all_category_folder/'.$value.''); ?>"><h3><i class="fa fa-folder"></i> <?php echo $value; ?></h3></a>
                            </td>
                            <td>
                               <a class="btn btn-info" href="<?php echo base_url('Mywork_controller/all_category_folder/'.$value.''); ?>"><i class="fa fa-file"></i></a>
                              <?php if($this->session->userdata('emp_type')=="admin"){ ?>
                              <!-- <a class="btn btn-primary" href="#"><i class="fa fa-edit"></i></a> -->
                                
                               
                                  <!-- <a class="btn btn-danger" onclick="confirm_del_folder('<?php// echo $value; ?>');" ><i class="fa fa-trash"></i></a> -->
                              <?php } ?>
                              
                            </td>
                            



                          </tr>
                       
                        <?php }
                        $i++; 
                      }?>
                     
                    </tbody>
                  </table>
                </div>





              


              </div>
          
            </div>
           
          </div>







                                  
