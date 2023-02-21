<div class="row my-4">
            
            <div class="col-12 col-lg-12">
              <div class="card card-table">
                <div class="card-header col-md-12 d-flex">
                    <div class="title col-md-8">Pti Photos Selected List</div>


                    <div class="tools dropdown col-md-2 d-flex">
               
                       <!-- <div class="btn btn-success col-md-3 mx-2"><i class="fa fa-check"></i></div> -->
                       <a href="<?php echo base_url(); ?>welcome/pti_photos_selected_file" class="btn btn-warning col-md-3 mx-2"><i class="fa fa-file"></i></a>

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

                     
                       <a href="<?php echo base_url(); ?>welcome/pti_photos_selected_file" class="btn btn-info col-md-3 mx-2"> <i class="fa-solid fa-rotate"></i></a>

                       <a href="<?php echo base_url(); ?>welcome/pti_photos" class="btn btn-warning col-md-3 mx-2"><i class="fa fa-close"></i></a>
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

                      <?php foreach ($scan_result as $value) {  
                        $length=strlen($value);  
                       
                        if($length>3){ ?>
                        
                      <tr>
                        <td class="">
                          <img src="<?php echo base_url(); ?>document_uploads/all_scan_pti_Photos/<?php echo $value; ?>" width="150" height="150" alt="Avatar">
                          <?php echo $value; ?>
                        </td>                      
                        <td class="actions"><a class="btn btn-success" href="<?php echo base_url('welcome/pti_photos_file/'.$value.''); ?>">Enter</a></td>
                      </tr>

                    <?php }
                    } ?>
                     
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
