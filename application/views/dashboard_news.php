 <div class="row my-1 d-flex">
            
            <div class="col-12 col-lg-12">
           
              <div class="card card-table">
                <div class="card-header col-md-12 d-flex">

                   <div class="title col-md-8">TODAYS NEWS DASHBOARD</div>
                   
                   <div class="tools dropdown col-md-4 d-flex">
               
                     <a href="<?php echo base_url(); ?>welcome/dashboard" class="btn btn-info col-md-2 mx-2"> <i class="fa-solid fa-rotate"></i></a>

                     
                  </div>



                  
                </div>
                <div class="card-body table-responsive" style="padding-bottom: 10px;">

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




                  <hr>          
                 <!-- for row one           -->
                  <div class="col-md-12 d-flex">
                    <div class="col-md-3">
                    <div class="col-md-12 text-center  my-1" style="font-size:20px;color:gray;">
                      <b>PTI PHOTOS</b>
                    </div>
                      <div id="carouselExampleDark" class="carousel carousel-dark slide">
                                  <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                  </div>
                                  <div class="carousel-inner">


                                     <?php                                    
                                        $limit=1;
                                        $arr_start=0;
                                        $date=date('d-m-y');                                       
                                        $data= $this-> db ->order_by("id", "DESC");
                                        $data= $this-> db ->limit($limit, $arr_start);
                                        $data= $this -> db -> where('date', $date); 
                                        $data= $this-> db ->get('pti_photos');
                                        $final_data=$data->result();

                                         $num_row=$data->num_rows();
                                         if($num_row>0){
                                            foreach ($final_data as $val) { 
                                            ?>

                                              <div class="carousel-item active" data-bs-interval="20">
                                                <img src="<?php echo base_url(); ?>document_uploads/<?php echo $date; ?>/PTI_Photos/<?php echo $val->file_name; ?>" class="d-block w-100" height="200" alt="...">
                                               <!--  <div class="carousel-caption d-none d-md-block">
                                                  <h5>First slide label</h5>
                                                  <p>Some representative placeholder content for the first slide.</p>
                                                </div> -->
                                              </div>
                                              <?php }
                                            } 
                                            ?>




                                             <?php                                    
                                        $limit=1;
                                        $arr_start=1;
                                        $date=date('d-m-y');                                       
                                        $data= $this-> db ->order_by("id", "DESC");
                                        $data= $this-> db ->limit($limit, $arr_start);
                                        $data= $this -> db -> where('date', $date); 
                                        $data= $this-> db ->get('pti_photos');
                                        $final_data=$data->result();

                                         $num_row=$data->num_rows();
                                         if($num_row>0){
                                            foreach ($final_data as $val) { 
                                            ?>

                                             <div class="carousel-item" data-bs-interval="20">
                                                <img src="<?php echo base_url(); ?>document_uploads/<?php echo $date; ?>/PTI_Photos/<?php echo $val->file_name; ?>" height="200" class="d-block w-100" alt="...">
                                               <!--  <div class="carousel-caption d-none d-md-block">
                                                  <h5>Second slide label</h5>
                                                  <p>Some representative placeholder content for the second slide.</p>
                                                </div> -->
                                              </div>

                                               <?php }
                                            } 
                                            ?>





                                               <?php                                    
                                        $limit=1;
                                        $arr_start=2;
                                        $date=date('d-m-y');                                       
                                        $data= $this-> db ->order_by("id", "DESC");
                                        $data= $this-> db ->limit($limit, $arr_start);
                                        $data= $this -> db -> where('date', $date); 
                                        $data= $this-> db ->get('pti_photos');
                                        $final_data=$data->result();

                                         $num_row=$data->num_rows();
                                         if($num_row>0){
                                            foreach ($final_data as $val) { 
                                            ?>


                                              <div class="carousel-item" data-bs-interval="20">
                                                <img src="<?php echo base_url(); ?>document_uploads/<?php echo $date; ?>/PTI_Photos/<?php echo $val->file_name; ?>" height="200" class="d-block w-100" alt="...">
                                                <!-- <div class="carousel-caption d-none d-md-block">
                                                  <h5>Third slide label</h5>
                                                  <p>Some representative placeholder content for the third slide.</p>
                                                </div> -->
                                              </div>

                                               <?php }
                                            } 
                                            ?>


                      


                                  </div>
                                  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                  </button>
                                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                  </button>
                                </div>
                    </div>
                    <div class="col-md-3">
                    <div class="col-md-12 text-center my-1" style="font-size:20px;color:gray;">
                      <b>UNI PHOTOS</b>
                    </div>
                      <div id="carouselExampleDark2" class="carousel carousel-dark slide">
                                <div class="carousel-indicators">
                                  <button type="button" data-bs-target="#carouselExampleDark2" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 4"></button>
                                  <button type="button" data-bs-target="#carouselExampleDark2" data-bs-slide-to="1" aria-label="Slide 5"></button>
                                  <button type="button" data-bs-target="#carouselExampleDark2" data-bs-slide-to="2" aria-label="Slide 6"></button>
                                </div>
                                <div class="carousel-inner">


                                     <?php                                    
                                        $limit=1;
                                        $arr_start=0;
                                        $date=date('d-m-y');                                       
                                        $data= $this-> db ->order_by("id", "DESC");
                                        $data= $this-> db ->limit($limit, $arr_start);
                                        $data= $this -> db -> where('date', $date); 
                                        $data= $this-> db ->get('uni_photos');
                                        $final_data=$data->result();

                                         $num_row=$data->num_rows();
                                         if($num_row>0){
                                            foreach ($final_data as $val) { 
                                            ?>

                                              <div class="carousel-item active" data-bs-interval="20">
                                                <img src="<?php echo base_url(); ?>document_uploads/<?php echo $date; ?>/UNI_Photos/<?php echo $val->file_name; ?>" class="d-block w-100" height="200" alt="...">
                                               <!--  <div class="carousel-caption d-none d-md-block">
                                                  <h5>First slide label</h5>
                                                  <p>Some representative placeholder content for the first slide.</p>
                                                </div> -->
                                              </div>
                                              <?php }
                                            } 
                                            ?>




                                             <?php                                    
                                        $limit=1;
                                        $arr_start=1;
                                        $date=date('d-m-y');                                       
                                        $data= $this-> db ->order_by("id", "DESC");
                                        $data= $this-> db ->limit($limit, $arr_start);
                                        $data= $this -> db -> where('date', $date); 
                                        $data= $this-> db ->get('uni_photos');
                                        $final_data=$data->result();

                                         $num_row=$data->num_rows();
                                         if($num_row>0){
                                            foreach ($final_data as $val) { 
                                            ?>

                                             <div class="carousel-item" data-bs-interval="20">
                                                <img src="<?php echo base_url(); ?>document_uploads/<?php echo $date; ?>/UNI_Photos/<?php echo $val->file_name; ?>" height="200" class="d-block w-100" alt="...">
                                               <!--  <div class="carousel-caption d-none d-md-block">
                                                  <h5>Second slide label</h5>
                                                  <p>Some representative placeholder content for the second slide.</p>
                                                </div> -->
                                              </div>

                                               <?php }
                                            } 
                                            ?>





                                               <?php                                    
                                        $limit=1;
                                        $arr_start=2;
                                        $date=date('d-m-y');                                       
                                        $data= $this-> db ->order_by("id", "DESC");
                                        $data= $this-> db ->limit($limit, $arr_start);
                                        $data= $this -> db -> where('date', $date); 
                                        $data= $this-> db ->get('uni_photos');
                                        $final_data=$data->result();

                                         $num_row=$data->num_rows();
                                         if($num_row>0){
                                            foreach ($final_data as $val) { 
                                            ?>


                                              <div class="carousel-item" data-bs-interval="20">
                                                <img src="<?php echo base_url(); ?>document_uploads/<?php echo $date; ?>/UNI_Photos/<?php echo $val->file_name; ?>" height="200" class="d-block w-100" alt="...">
                                               <!--  <div class="carousel-caption d-none d-md-block">
                                                  <h5>Third slide label</h5>
                                                  <p>Some representative placeholder content for the third slide.</p>
                                                </div> -->
                                              </div>

                                               <?php }
                                            } 
                                            ?>





                                  



                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark2" data-bs-slide="prev">
                                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                  <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark2" data-bs-slide="next">
                                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                  <span class="visually-hidden">Next</span>
                                </button>
                              </div>
                      
                    </div>
                     <div class="col-md-3">
                    <div class="col-md-12 text-center  my-1" style="font-size:20px;color:gray;">
                      <b>LOCAL PHOTOS</b>
                    </div>
                      <div id="carouselExampleDark7" class="carousel carousel-dark slide">
                                  <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselExampleDark7" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselExampleDark7" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselExampleDark7" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                  </div>
                                  <div class="carousel-inner">


                                     <?php                                    
                                        $limit=1;
                                        $arr_start=0;
                                        $date=date('d-m-y');                                       
                                        $data= $this-> db ->order_by("id", "DESC");
                                        $data= $this-> db ->limit($limit, $arr_start);
                                        $data= $this -> db -> where('date', $date); 
                                        $data= $this-> db ->get('local_photos');
                                        $final_data=$data->result();

                                         $num_row=$data->num_rows();
                                         if($num_row>0){
                                            foreach ($final_data as $val) { 
                                            ?>

                                              <div class="carousel-item active" data-bs-interval="20">
                                                <img src="<?php echo base_url(); ?>document_uploads/<?php echo $date; ?>/LOCAL_PHOTOS/<?php echo $val->file_name; ?>" class="d-block w-100" height="200" alt="...">
                                               <!--  <div class="carousel-caption d-none d-md-block">
                                                  <h5>First slide label</h5>
                                                  <p>Some representative placeholder content for the first slide.</p>
                                                </div> -->
                                              </div>
                                              <?php }
                                            } 
                                            ?>




                                             <?php                                    
                                        $limit=1;
                                        $arr_start=1;
                                        $date=date('d-m-y');                                       
                                        $data= $this-> db ->order_by("id", "DESC");
                                        $data= $this-> db ->limit($limit, $arr_start);
                                        $data= $this -> db -> where('date', $date); 
                                        $data= $this-> db ->get('local_photos');
                                        $final_data=$data->result();

                                         $num_row=$data->num_rows();
                                         if($num_row>0){
                                            foreach ($final_data as $val) { 
                                            ?>

                                             <div class="carousel-item" data-bs-interval="20">
                                                <img src="<?php echo base_url(); ?>document_uploads/<?php echo $date; ?>/LOCAL_PHOTOS/<?php echo $val->file_name; ?>" height="200" class="d-block w-100" alt="...">
                                               <!--  <div class="carousel-caption d-none d-md-block">
                                                  <h5>Second slide label</h5>
                                                  <p>Some representative placeholder content for the second slide.</p>
                                                </div> -->
                                              </div>

                                               <?php }
                                            } 
                                            ?>





                                               <?php                                    
                                        $limit=1;
                                        $arr_start=2;
                                        $date=date('d-m-y');                                       
                                        $data= $this-> db ->order_by("id", "DESC");
                                        $data= $this-> db ->limit($limit, $arr_start);
                                        $data= $this -> db -> where('date', $date); 
                                        $data= $this-> db ->get('local_photos');
                                        $final_data=$data->result();

                                         $num_row=$data->num_rows();
                                         if($num_row>0){
                                            foreach ($final_data as $val) { 
                                            ?>


                                              <div class="carousel-item" data-bs-interval="20">
                                                <img src="<?php echo base_url(); ?>document_uploads/<?php echo $date; ?>/LOCAL_PHOTOS/<?php echo $val->file_name; ?>" height="200" class="d-block w-100" alt="...">
                                                <!-- <div class="carousel-caption d-none d-md-block">
                                                  <h5>Third slide label</h5>
                                                  <p>Some representative placeholder content for the third slide.</p>
                                                </div> -->
                                              </div>

                                               <?php }
                                            } 
                                            ?>


                      


                                  </div>
                                  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark7" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                  </button>
                                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark7" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                  </button>
                                </div>
                    </div>
                    <div class="col-md-3">
                    <div class="col-md-12 text-center  my-1" style="font-size:20px;color:gray;">
                      <b>OTHER PHOTOS</b>
                    </div>
                      <div id="carouselExampleDark8" class="carousel carousel-dark slide">
                                <div class="carousel-indicators">
                                  <button type="button" data-bs-target="#carouselExampleDark8" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 4"></button>
                                  <button type="button" data-bs-target="#carouselExampleDark8" data-bs-slide-to="1" aria-label="Slide 5"></button>
                                  <button type="button" data-bs-target="#carouselExampleDark8" data-bs-slide-to="2" aria-label="Slide 6"></button>
                                </div>
                                <div class="carousel-inner">


                                     <?php                                    
                                        $limit=1;
                                        $arr_start=0;
                                        $date=date('d-m-y');                                       
                                        $data= $this-> db ->order_by("id", "DESC");
                                        $data= $this-> db ->limit($limit, $arr_start);
                                        $data= $this -> db -> where('date', $date); 
                                        $data= $this-> db ->get('bengali_photos');
                                        $final_data=$data->result();

                                         $num_row=$data->num_rows();
                                         if($num_row>0){
                                            foreach ($final_data as $val) { 
                                            ?>

                                              <div class="carousel-item active" data-bs-interval="20">
                                                <img src="<?php echo base_url(); ?>document_uploads/<?php echo $date; ?>/OTHER_PHOTOS/<?php echo $val->file_name; ?>" class="d-block w-100" height="200" alt="...">
                                               <!--  <div class="carousel-caption d-none d-md-block">
                                                  <h5>First slide label</h5>
                                                  <p>Some representative placeholder content for the first slide.</p>
                                                </div> -->
                                              </div>
                                              <?php }
                                            } 
                                            ?>




                                             <?php                                    
                                        $limit=1;
                                        $arr_start=1;
                                        $date=date('d-m-y');                                       
                                        $data= $this-> db ->order_by("id", "DESC");
                                        $data= $this-> db ->limit($limit, $arr_start);
                                        $data= $this -> db -> where('date', $date); 
                                        $data= $this-> db ->get('bengali_photos');
                                        $final_data=$data->result();

                                         $num_row=$data->num_rows();
                                         if($num_row>0){
                                            foreach ($final_data as $val) { 
                                            ?>

                                             <div class="carousel-item" data-bs-interval="20">
                                                <img src="<?php echo base_url(); ?>document_uploads/<?php echo $date; ?>/OTHER_PHOTOS/<?php echo $val->file_name; ?>" height="200" class="d-block w-100" alt="...">
                                               <!--  <div class="carousel-caption d-none d-md-block">
                                                  <h5>Second slide label</h5>
                                                  <p>Some representative placeholder content for the second slide.</p>
                                                </div> -->
                                              </div>

                                               <?php }
                                            } 
                                            ?>





                                               <?php                                    
                                        $limit=1;
                                        $arr_start=2;
                                        $date=date('d-m-y');                                       
                                        $data= $this-> db ->order_by("id", "DESC");
                                        $data= $this-> db ->limit($limit, $arr_start);
                                        $data= $this -> db -> where('date', $date); 
                                        $data= $this-> db ->get('bengali_photos');
                                        $final_data=$data->result();

                                         $num_row=$data->num_rows();
                                         if($num_row>0){
                                            foreach ($final_data as $val) { 
                                            ?>


                                              <div class="carousel-item" data-bs-interval="20">
                                                <img src="<?php echo base_url(); ?>document_uploads/<?php echo $date; ?>/OTHER_PHOTOS/<?php echo $val->file_name; ?>" height="200" class="d-block w-100" alt="...">
                                               <!--  <div class="carousel-caption d-none d-md-block">
                                                  <h5>Third slide label</h5>
                                                  <p>Some representative placeholder content for the third slide.</p>
                                                </div> -->
                                              </div>

                                               <?php }
                                            } 
                                            ?>





                                  



                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark8" data-bs-slide="prev">
                                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                  <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark8" data-bs-slide="next">
                                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                  <span class="visually-hidden">Next</span>
                                </button>
                              </div>
                      
                    </div>
                    

                  </div>
                  <!-- for row two -->
                  <hr>

                  <div class="col-md-12 d-flex">
                    <div class="col-md-6">
                    <div class="col-md-12 text-center  my-1" style="font-size:20px;color:gray;">
                      <b>PTI BHASHA</b>
                    </div>
                      <div id="carouselExampleDark3" class="carousel carousel-dark slide">
                                  <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselExampleDark3" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselExampleDark3" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselExampleDark3" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                  </div>
                                  <div class="carousel-inner">


                                     <?php                                    
                                        $limit=1;
                                        $arr_start=0;
                                        $date=date('d-m-y');                                       
                                        $data= $this-> db ->order_by("id", "DESC");
                                        $data= $this-> db ->limit($limit, $arr_start);
                                        $data= $this -> db -> where('date', $date); 
                                        $data= $this-> db ->get('pti_bhasha');
                                        $final_data=$data->result();

                                         $num_row=$data->num_rows();
                                         if($num_row>0){
                                            foreach ($final_data as $val) { 
                                            ?>

                                              <div class="carousel-item active" data-bs-interval="20">
                                                 <div class="col-md-12 text-center" id="text_para" style="height: 120px; border: 2px solid dark;">
                                                  <h4 class="ellipsis_two" style="font-size: 20px;font-weight: bold;color: grey;padding-left: 50px;padding-right: 50px;"><b><?php echo $val->text; ?></b></h4>
                                                </div>
                                                <!-- <div class="carousel-caption d-none d-md-block">
                                                  <h5>First slide label</h5>
                                                  <p>Some representative placeholder content for the first slide.</p>
                                                </div> -->
                                              </div>
                                              <?php }
                                            } 
                                            ?>




                                             <?php                                    
                                        $limit=1;
                                        $arr_start=1;
                                        $date=date('d-m-y');                                       
                                        $data= $this-> db ->order_by("id", "DESC");
                                        $data= $this-> db ->limit($limit, $arr_start);
                                        $data= $this -> db -> where('date', $date); 
                                        $data= $this-> db ->get('pti_bhasha');
                                        $final_data=$data->result();

                                         $num_row=$data->num_rows();
                                         if($num_row>0){
                                            foreach ($final_data as $val) { 
                                            ?>

                                             <div class="carousel-item" data-bs-interval="20">
                                                <div class="col-md-12 text-center" id="text_para" style="height: 120px; border: 2px solid dark;">
                                                  <h4 class="ellipsis_two" style="font-size: 20px;font-weight: bold;color: grey;padding-left: 50px;padding-right: 50px;"><b><?php echo $val->text; ?></b></h4>
                                                </div>
                                               <!--  <div class="carousel-caption d-none d-md-block">
                                                  <h5>Second slide label</h5>
                                                  <p>Some representative placeholder content for the second slide.</p>
                                                </div> -->
                                              </div>

                                               <?php }
                                            } 
                                            ?>





                                               <?php                                    
                                        $limit=1;
                                        $arr_start=2;
                                        $date=date('d-m-y');                                       
                                        $data= $this-> db ->order_by("id", "DESC");
                                        $data= $this-> db ->limit($limit, $arr_start);
                                        $data= $this -> db -> where('date', $date); 
                                        $data= $this-> db ->get('pti_bhasha');
                                        $final_data=$data->result();

                                         $num_row=$data->num_rows();
                                         if($num_row>0){
                                            foreach ($final_data as $val) { 
                                            ?>


                                              <div class="carousel-item" data-bs-interval="20">
                                                <div class="col-md-12 text-center" id="text_para" style="height: 120px; border: 2px solid dark;">
                                                  <h4 class="ellipsis_two" style="font-size: 20px;font-weight: bold;color: grey;padding-left: 50px;padding-right: 50px;"><b><?php echo $val->text; ?></b></h4>
                                                </div>
                                                <!-- <div class="carousel-caption d-none d-md-block">
                                                  <h5>Third slide label</h5>
                                                  <p>Some representative placeholder content for the third slide.</p>
                                                </div> -->
                                              </div>

                                               <?php }
                                            } 
                                            ?>


                      


                                  </div>
                                  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark3" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                  </button>
                                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark3" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                  </button>
                                </div>
                    </div>
                    
                    <div class="col-md-6">
                    <div class="col-md-12 text-center  my-1" style="font-size:20px;color:gray;">
                      <b>PTI ENGLISH</b>
                    </div>
                      <div id="carouselExampleDark4" class="carousel carousel-dark slide">
                                <div class="carousel-indicators">
                                  <button type="button" data-bs-target="#carouselExampleDark4" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 4"></button>
                                  <button type="button" data-bs-target="#carouselExampleDark4" data-bs-slide-to="1" aria-label="Slide 5"></button>
                                  <button type="button" data-bs-target="#carouselExampleDark4" data-bs-slide-to="2" aria-label="Slide 6"></button>
                                </div>
                                <div class="carousel-inner">


                                     <?php                                    
                                        $limit=1;
                                        $arr_start=0;
                                        $date=date('d-m-y');                                       
                                        $data= $this-> db ->order_by("id", "DESC");
                                        $data= $this-> db ->limit($limit, $arr_start);
                                        $data= $this -> db -> where('date', $date); 
                                        $data= $this-> db ->get('pti_english');
                                        $final_data=$data->result();

                                         $num_row=$data->num_rows();
                                         if($num_row>0){
                                            foreach ($final_data as $val) { 
                                            ?>

                                              <div class="carousel-item active" data-bs-interval="20">
                                                <div class="col-md-12 text-center" id="text_para" style="height: 120px; border: 2px solid dark;">
                                                  <h4 class="ellipsis_two" style="font-size: 20px;font-weight: bold;color: grey;padding-left: 50px;padding-right: 50px;"><b><?php echo $val->text; ?></b></h4>
                                                </div>
                                                <!-- <div class="carousel-caption d-none d-md-block">
                                                  <h5>First slide label</h5>
                                                  <p>Some representative placeholder content for the first slide.</p>
                                                </div> -->
                                              </div>
                                              <?php }
                                            } 
                                            ?>




                                             <?php                                    
                                        $limit=1;
                                        $arr_start=1;
                                        $date=date('d-m-y');                                       
                                        $data= $this-> db ->order_by("id", "DESC");
                                        $data= $this-> db ->limit($limit, $arr_start);
                                        $data= $this -> db -> where('date', $date); 
                                        $data= $this-> db ->get('pti_english');
                                        $final_data=$data->result();

                                         $num_row=$data->num_rows();
                                         if($num_row>0){
                                            foreach ($final_data as $val) { 
                                            ?>

                                             <div class="carousel-item" data-bs-interval="20">
                                               <div class="col-md-12 text-center" id="text_para" style="height: 120px; border: 2px solid dark;">
                                                  <h4 class="ellipsis_two" style="font-size: 20px;font-weight: bold;color: grey;padding-left: 50px;padding-right: 50px;"><b><?php echo $val->text; ?></b></h4>
                                                </div>
                                                <!-- <div class="carousel-caption d-none d-md-block">
                                                  <h5>Second slide label</h5>
                                                  <p>Some representative placeholder content for the second slide.</p>
                                                </div> -->
                                              </div>

                                               <?php }
                                            } 
                                            ?>





                                               <?php                                    
                                        $limit=1;
                                        $arr_start=2;
                                        $date=date('d-m-y');                                       
                                        $data= $this-> db ->order_by("id", "DESC");
                                        $data= $this-> db ->limit($limit, $arr_start);
                                        $data= $this -> db -> where('date', $date); 
                                        $data= $this-> db ->get('pti_english');
                                        $final_data=$data->result();

                                         $num_row=$data->num_rows();
                                         if($num_row>0){
                                            foreach ($final_data as $val) { 
                                            ?>


                                              <div class="carousel-item" data-bs-interval="20">
                                              <div class="col-md-12 text-center" id="text_para" style="height: 120px; border: 2px solid dark;">
                                                  <h4 class="ellipsis_two" style="font-size: 20px;font-weight: bold;color: grey;padding-left: 50px50px;padding-right: 50px50px;"><b><?php echo $val->text; ?></b></h4>
                                                </div>
                                               
                                               <!--  <div class="carousel-caption d-none d-md-block">
                                                  <h5>Third slide label</h5>
                                                  <p>Some representative placeholder content for the third slide.</p>
                                                </div> -->
                                              </div>

                                               <?php }
                                            } 
                                            ?>





                                  



                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark4" data-bs-slide="prev">
                                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                  <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark4" data-bs-slide="next">
                                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                  <span class="visually-hidden">Next</span>
                                </button>
                              </div>
                      
                    </div>
                   

                  </div>
                  <hr>

                  <!-- for row three -->


                  <div class="col-md-12 d-flex">
                     <div class="col-md-6">
                    <div class="col-md-12 text-center  my-1" style="font-size:20px;color:gray;">
                      <b>UNI VARTA</b>
                    </div>
                      <div id="carouselExampleDark5" class="carousel carousel-dark slide">
                                  <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselExampleDark5" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselExampleDark5" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselExampleDark5" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                  </div>
                                  <div class="carousel-inner">


                                     <?php                                    
                                        $limit=1;
                                        $arr_start=0;
                                        $date=date('d-m-y');                                       
                                        $data= $this-> db ->order_by("id", "DESC");
                                        $data= $this-> db ->limit($limit, $arr_start);
                                        $data= $this -> db -> where('date', $date); 
                                        $data= $this-> db ->get('uni_varta');
                                        $final_data=$data->result();

                                         $num_row=$data->num_rows();
                                         if($num_row>0){
                                            foreach ($final_data as $val) { 
                                            ?>

                                              <div class="carousel-item active" data-bs-interval="20">
                                                 <div class="col-md-12 text-center" id="text_para" style="height: 120px; border: 2px solid dark;">
                                                  <h4 class="ellipsis_two" style="font-size: 20px;font-weight: bold;color: grey;padding-left: 50px;padding-right: 50px;"><b><?php echo $val->text; ?></b></h4>
                                                </div>
                                                <!-- <div class="carousel-caption d-none d-md-block">
                                                  <h5>First slide label</h5>
                                                  <p>Some representative placeholder content for the first slide.</p>
                                                </div> -->
                                              </div>
                                              <?php }
                                            } 
                                            ?>




                                             <?php                                    
                                        $limit=1;
                                        $arr_start=1;
                                        $date=date('d-m-y');                                       
                                        $data= $this-> db ->order_by("id", "DESC");
                                        $data= $this-> db ->limit($limit, $arr_start);
                                        $data= $this -> db -> where('date', $date); 
                                        $data= $this-> db ->get('uni_varta');
                                        $final_data=$data->result();

                                         $num_row=$data->num_rows();
                                         if($num_row>0){
                                            foreach ($final_data as $val) { 
                                            ?>

                                             <div class="carousel-item" data-bs-interval="20">
                                                <div class="col-md-12 text-center" id="text_para" style="height: 120px; border: 2px solid dark;">
                                                  <h4 class="ellipsis_two" style="font-size: 20px;font-weight: bold;color: grey;padding-left: 50px;padding-right: 50px;"><b><?php echo $val->text; ?></b></h4>
                                                </div>
                                               <!--  <div class="carousel-caption d-none d-md-block">
                                                  <h5>Second slide label</h5>
                                                  <p>Some representative placeholder content for the second slide.</p>
                                                </div> -->
                                              </div>

                                               <?php }
                                            } 
                                            ?>





                                               <?php                                    
                                        $limit=1;
                                        $arr_start=2;
                                        $date=date('d-m-y');                                       
                                        $data= $this-> db ->order_by("id", "DESC");
                                        $data= $this-> db ->limit($limit, $arr_start);
                                        $data= $this -> db -> where('date', $date); 
                                        $data= $this-> db ->get('uni_varta');
                                        $final_data=$data->result();

                                         $num_row=$data->num_rows();
                                         if($num_row>0){
                                            foreach ($final_data as $val) { 
                                            ?>


                                              <div class="carousel-item" data-bs-interval="20">
                                                <div class="col-md-12 text-center" id="text_para" style="height: 120px; border: 2px solid dark;">
                                                  <h4 class="ellipsis_two" style="font-size: 20px;font-weight: bold;color: grey;padding-left: 50px;padding-right: 50px;"><b><?php echo $val->text; ?></b></h4>
                                                </div>
                                                <!-- <div class="carousel-caption d-none d-md-block">
                                                  <h5>Third slide label</h5>
                                                  <p>Some representative placeholder content for the third slide.</p>
                                                </div> -->
                                              </div>

                                               <?php }
                                            } 
                                            ?>


                      


                                  </div>
                                  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark5" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                  </button>
                                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark5" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                  </button>
                                </div>
                    </div>
                    
                    
                    <div class="col-md-6">
                    <div class="col-md-12 text-center  my-1" style="font-size:20px;color:gray;">
                      <b>OTHER NEWS</b>
                    </div>
                      <div id="carouselExampleDark9" class="carousel carousel-dark slide">
                                <div class="carousel-indicators">
                                  <button type="button" data-bs-target="#carouselExampleDark9" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 4"></button>
                                  <button type="button" data-bs-target="#carouselExampleDark9" data-bs-slide-to="1" aria-label="Slide 5"></button>
                                  <button type="button" data-bs-target="#carouselExampleDark9" data-bs-slide-to="2" aria-label="Slide 6"></button>
                                </div>
                                <div class="carousel-inner">


                                     <?php                                    
                                        $limit=1;
                                        $arr_start=0;
                                        $date=date('d-m-y');                                       
                                        $data= $this-> db ->order_by("id", "DESC");
                                        $data= $this-> db ->limit($limit, $arr_start);
                                        $data= $this -> db -> where('date', $date); 
                                        $data= $this-> db ->get('bengali_story');
                                        $final_data=$data->result();

                                         $num_row=$data->num_rows();
                                         if($num_row>0){
                                            foreach ($final_data as $val) { 
                                            ?>

                                              <div class="carousel-item active" data-bs-interval="20">
                                                <div class="col-md-12 text-center" id="text_para" style="height: 120px; border: 2px solid dark;">
                                                  <h4 class="ellipsis_two" style="font-size: 20px;font-weight: bold;color: grey;padding-left: 50px;padding-right: 50px;"><b><?php echo $val->text; ?></b></h4>
                                                </div>
                                                <!-- <div class="carousel-caption d-none d-md-block">
                                                  <h5>First slide label</h5>
                                                  <p>Some representative placeholder content for the first slide.</p>
                                                </div> -->
                                              </div>
                                              <?php }
                                            } 
                                            ?>




                                             <?php                                    
                                        $limit=1;
                                        $arr_start=1;
                                        $date=date('d-m-y');                                       
                                        $data= $this-> db ->order_by("id", "DESC");
                                        $data= $this-> db ->limit($limit, $arr_start);
                                        $data= $this -> db -> where('date', $date); 
                                        $data= $this-> db ->get('bengali_story');
                                        $final_data=$data->result();

                                         $num_row=$data->num_rows();
                                         if($num_row>0){
                                            foreach ($final_data as $val) { 
                                            ?>

                                             <div class="carousel-item" data-bs-interval="20">
                                               <div class="col-md-12 text-center" id="text_para" style="height: 120px; border: 2px solid dark;">
                                                  <h4 class="ellipsis_two" style="font-size: 20px;font-weight: bold;color: grey;padding-left: 50px;padding-right: 50px;"><b><?php echo $val->text; ?></b></h4>
                                                </div>
                                                <!-- <div class="carousel-caption d-none d-md-block">
                                                  <h5>Second slide label</h5>
                                                  <p>Some representative placeholder content for the second slide.</p>
                                                </div> -->
                                              </div>

                                               <?php }
                                            } 
                                            ?>





                                               <?php                                    
                                        $limit=1;
                                        $arr_start=2;
                                        $date=date('d-m-y');                                       
                                        $data= $this-> db ->order_by("id", "DESC");
                                        $data= $this-> db ->limit($limit, $arr_start);
                                        $data= $this -> db -> where('date', $date); 
                                        $data= $this-> db ->get('bengali_story');
                                        $final_data=$data->result();

                                         $num_row=$data->num_rows();
                                         if($num_row>0){
                                            foreach ($final_data as $val) { 
                                            ?>


                                              <div class="carousel-item" data-bs-interval="20">
                                              <div class="col-md-12 text-center" id="text_para" style="height: 120px; border: 2px solid dark;">
                                                  <h4 class="ellipsis_two" style="font-size: 20px;font-weight: bold;color: grey;padding-left: 50px;padding-right: 50px;"><b><?php echo $val->text; ?></b></h4>
                                                </div>
                                               
                                               <!--  <div class="carousel-caption d-none d-md-block">
                                                  <h5>Third slide label</h5>
                                                  <p>Some representative placeholder content for the third slide.</p>
                                                </div> -->
                                              </div>

                                               <?php }
                                            } 
                                            ?>





                                  



                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark9" data-bs-slide="prev">
                                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                  <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark9" data-bs-slide="next">
                                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                  <span class="visually-hidden">Next</span>
                                </button>
                              </div>
                      
                    </div>


                   
                    

                  </div>
                  <hr>

                  <!-- for row 3 -->
                  <div class="col-md-12 d-flex">
                    <div class="col-md-12">
                    <div class="col-md-12 text-center  my-1" style="font-size:20px;color:gray;">
                      <b>LOCAL NEWS</b>
                    </div>
                      <div id="carouselExampleDark10" class="carousel carousel-dark slide">
                                  <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselExampleDark10" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselExampleDark10" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselExampleDark10" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                  </div>
                                  <div class="carousel-inner">


                                     <?php                                    
                                        $limit=1;
                                        $arr_start=0;
                                        $date=date('d-m-y');                                       
                                        $data= $this-> db ->order_by("id", "DESC");
                                        $data= $this-> db ->limit($limit, $arr_start);
                                        $data= $this -> db -> where('date', $date); 
                                        $data= $this-> db ->get('local_story');
                                        $final_data=$data->result();

                                         $num_row=$data->num_rows();
                                         if($num_row>0){
                                            foreach ($final_data as $val) { 
                                            ?>

                                              <div class="carousel-item active" data-bs-interval="20">
                                                 <div class="col-md-12 text-center" id="text_para" style="height: 120px; border: 2px solid dark;">
                                                  <h4 class="ellipsis_two" style="font-size: 20px;font-weight: bold;color: grey;padding-left: 100px;padding-right: 100px;"><b><?php echo $val->text; ?></b></h4>
                                                </div>
                                                <!-- <div class="carousel-caption d-none d-md-block">
                                                  <h5>First slide label</h5>
                                                  <p>Some representative placeholder content for the first slide.</p>
                                                </div> -->
                                              </div>
                                              <?php }
                                            } 
                                            ?>




                                             <?php                                    
                                        $limit=1;
                                        $arr_start=1;
                                        $date=date('d-m-y');                                       
                                        $data= $this-> db ->order_by("id", "DESC");
                                        $data= $this-> db ->limit($limit, $arr_start);
                                        $data= $this -> db -> where('date', $date); 
                                        $data= $this-> db ->get('local_story');
                                        $final_data=$data->result();

                                         $num_row=$data->num_rows();
                                         if($num_row>0){
                                            foreach ($final_data as $val) { 
                                            ?>

                                             <div class="carousel-item" data-bs-interval="20">
                                                <div class="col-md-12 text-center" id="text_para" style="height: 120px; border: 2px solid dark;">
                                                  <h4 class="ellipsis_two" style="font-size: 20px;font-weight: bold;color: grey;padding-left: 100px;padding-right: 100px;"><b><?php echo $val->text; ?></b></h4>
                                                </div>
                                               <!--  <div class="carousel-caption d-none d-md-block">
                                                  <h5>Second slide label</h5>
                                                  <p>Some representative placeholder content for the second slide.</p>
                                                </div> -->
                                              </div>

                                               <?php }
                                            } 
                                            ?>





                                               <?php                                    
                                        $limit=1;
                                        $arr_start=2;
                                        $date=date('d-m-y');                                       
                                        $data= $this-> db ->order_by("id", "DESC");
                                        $data= $this-> db ->limit($limit, $arr_start);
                                        $data= $this -> db -> where('date', $date); 
                                        $data= $this-> db ->get('local_story');
                                        $final_data=$data->result();

                                         $num_row=$data->num_rows();
                                         if($num_row>0){
                                            foreach ($final_data as $val) { 
                                            ?>


                                              <div class="carousel-item" data-bs-interval="20">
                                                <div class="col-md-12 text-center" id="text_para" style="height: 120px; border: 2px solid dark;">
                                                  <h4 class="ellipsis_two" style="font-size: 20px;font-weight: bold;color: grey;padding-left: 100px;padding-right: 100px;"><b><?php echo $val->text; ?></b></h4>
                                                </div>
                                                <!-- <div class="carousel-caption d-none d-md-block">
                                                  <h5>Third slide label</h5>
                                                  <p>Some representative placeholder content for the third slide.</p>
                                                </div> -->
                                              </div>

                                               <?php }
                                            } 
                                            ?>


                      


                                  </div>
                                  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark10" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                  </button>
                                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark10" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                  </button>
                                </div>
                    </div>
                    
                  </div>


                </div>

               





              


              </div>
          
            </div>
           
          </div>







                                  
