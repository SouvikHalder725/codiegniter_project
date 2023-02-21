 <div class="row my-1 d-flex">
            
            <div class="col-12 col-lg-12">
           
              <div class="card card-table">
                <div class="card-header col-md-12 d-flex">

                   <div class="title col-md-8">MY PICK NEWS FOLDER</div>
                   
                   <div class="tools dropdown col-md-4 d-flex">
               
                   
                     <a href="<?php echo base_url('Mywork_controller/my_pick_news_folder/'.$tw.''); ?>" class="btn btn-info col-md-2 mx-2"> <i class="fa-solid fa-rotate"></i></a>

                     <a href="<?php echo base_url(); ?>Mywork_controller/my_pick_all_folder" class="btn btn-warning col-md-2 mx-2"><i class="fa fa-arrow-left"></i></a>
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


                      
                      $list=scandir('document_uploads/'.$tw.'');

                      $i=-1;
                      foreach ($list as $value) { 
                        $length=strlen($value);

                          
                          if($length>5){
                            // $new_file_date=date('d-m-y',strtotime($value));
                          ?>
                          <tr>
                            <td>
                              <h4><?php echo $i ; ?></h4>
                            </td>
                            <td>
                              <a href="<?php echo base_url('Mywork_controller/'.$value.'_pick_news/'.$tw.''); ?>"><h3><i class="fa fa-folder"></i> <?php echo $value; ?></h3></a>
                            </td>
                            <td>
                              <!-- <a class="btn btn-primary" href="#"><i class="fa fa-edit"></i></a> -->
                              <a class="btn btn-info" href="<?php echo base_url('Mywork_controller/'.$value.'_pick_news/'.$tw.''); ?>"><i class="fa fa-file"></i></a>
                              <!-- <a class="btn btn-danger" href="#"><i class="fa fa-trash"></i></a> -->
                              
                            </td>
                            



                          </tr>
                       
                        <?php      }
                        $i++; 
                      }?>
                     
                    </tbody>
                  </table>
                </div>





              


              </div>
          
            </div>
           
          </div>







                                  
