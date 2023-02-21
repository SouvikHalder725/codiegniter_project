 <div class="row my-4">
            
            <div class="col-12 col-lg-12">
              <div class="card card-table">
                <div class="card-header col-md-12 d-flex">

                 <div class="title col-md-8">Uni Varta Selected File</div>
                 <div class="tools dropdown col-md-2 d-flex">
               
                    <!-- <div class="btn btn-success col-md-3 mx-2">
                      <a  href="#"><i class="fa fa-check text-light"></i></a>
                    </div> -->
                    <a href="<?php echo base_url(); ?>welcome/uni_varta_selected_file" class="btn btn-warning col-md-3 mx-2"><i class="fa fa-file"></i></a>

                    <div class="dropdown col-md-3 mx-2 ">
                      <a class="btn btn-primary" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-bars px-2 my-2"></i>
                      </a>

                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                      </ul>
                    </div>

                     <div class="btn btn-secondary col-md-3 mx-2"><i class="fa fa-download"></i></div>
                     <a href="<?php echo base_url(); ?>welcome/uni_varta_selected_file" class="btn btn-info col-md-3 mx-2"><i class="fa-solid fa-rotate"></i></a>

                     <a href="<?php echo base_url(); ?>welcome/uni_varta" class="btn btn-warning col-md-3 mx-2"><i class="fa fa-close"></i></a>
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
                        <th>Stories</th>                        
                        <th class="actions"></th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php foreach ($array as $value) { 

                         $head=$value['scan_result'];
                         $length=strlen($head); 

                       
                         if($length>3){ ?>
                      <tr>
                        <td class="user-avatar d-flex">
                          <div>
                              <img src="<?php echo base_url(); ?>asset/img/hindi_file_icon.png" width="100" height="100" alt="Avatar">
                              </div>
                              <div>
                                
                                <h5><?php echo $value['scan_result']; ?></h5>
                                <p><?php  echo $value['text2']; ?></p>
                              </div>
                         
                          </td>  
                             
                        <td class="actions"><a class="btn btn-success" href="<?php echo base_url('welcome/uni_varta_file/'.$value['scan_result'].''); ?>">Enter</a></td>
                      </tr>

                    <?php }
                    } ?>
                     
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
