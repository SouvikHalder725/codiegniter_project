 
      <div class="main-content container-fluid">


<!-- 
          <div class="row">
            <div class="col-12 col-lg-6 col-xl-3">
                        <div class="widget widget-tile  bg-primary">
                          <div class="chart sparkline" id="spark1"></div>
                          <div class="data-info">
                            <div class="desc">All Users</div>
                            <div class="value"><i class="fa fa-user"></i><span class="number" data-toggle="counter" data-end="113">0</span>
                            </div>
                          </div>
                        </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-3">
                        <div class="widget widget-tile  bg-info">
                          <div class="chart sparkline" id="spark2"></div>
                          <div class="data-info">
                            <div class="desc">Departments</div>
                            <div class="value"><span class="indicator indicator-positive mdi mdi-chevron-up"></span><span class="number" data-toggle="counter" data-end="80" data-suffix="%">0</span>
                            </div>
                          </div>
                        </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-3">
                        <div class="widget widget-tile  bg-success">
                          <div class="chart sparkline" id="spark3"></div>
                          <div class="data-info">
                            <div class="desc">Designations</div>
                            <div class="value"><span class="indicator indicator-positive mdi mdi-chevron-up"></span><span class="number" data-toggle="counter" data-end="532">0</span>
                            </div>
                          </div>
                        </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-3">
                        <div class="widget widget-tile  bg-warning">
                          <div class="chart sparkline" id="spark4"></div>
                          <div class="data-info">
                            <div class="desc">Downloads</div>
                            <div class="value"><span class="indicator indicator-negative mdi mdi-chevron-down"></span><span class="number" data-toggle="counter" data-end="113">0</span>
                            </div>
                          </div>
                        </div>
            </div>
          </div> -->




      




          <div class="row">

           <!--  <div class="col-12 col-lg-6">
              <div class="card card-table">
                <div class="card-header">
                  <div class="tools dropdown"> <span class="icon mdi mdi-download"></span><a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"><span class="icon mdi mdi-more-vert"></span></a>
                    <div class="dropdown-menu" role="menu"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a>
                      <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Separated link</a>
                    </div>
                  </div>
                  <div class="title">Purchases</div>
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-striped table-borderless">
                    <thead>
                      <tr>
                        <th style="width:40%;">Product</th>
                        <th class="number">Price</th>
                        <th style="width:20%;">Date</th>
                        <th style="width:20%;">State</th>
                        <th class="actions" style="width:5%;"></th>
                      </tr>
                    </thead>
                    <tbody class="no-border-x">
                      <tr>
                        <td>Sony Xperia M4</td>
                        <td class="number">$149</td>
                        <td>Aug 23, 2018</td>
                        <td class="text-success">Completed</td>
                        <td class="actions"><a class="icon" href="#"><i class="mdi mdi-plus-circle-o"></i></a></td>
                      </tr>
                      <tr>
                        <td>Apple iPhone 6</td>
                        <td class="number">$535</td>
                        <td>Aug 20, 2018</td>
                        <td class="text-success">Completed</td>
                        <td class="actions"><a class="icon" href="#"><i class="mdi mdi-plus-circle-o"></i></a></td>
                      </tr>
                      <tr>
                        <td>Samsung Galaxy S7</td>
                        <td class="number">$583</td>
                        <td>Aug 18, 2018</td>
                        <td class="text-warning">Pending</td>
                        <td class="actions"><a class="icon" href="#"><i class="mdi mdi-plus-circle-o"></i></a></td>
                      </tr>
                      <tr>
                        <td>HTC One M9</td>
                        <td class="number">$350</td>
                        <td>Aug 15, 2018</td>
                        <td class="text-warning">Pending</td>
                        <td class="actions"><a class="icon" href="#"><i class="mdi mdi-plus-circle-o"></i></a></td>
                      </tr>
                      <tr>
                        <td>Sony Xperia Z5</td>
                        <td class="number">$495</td>
                        <td>Aug 13, 2018</td>
                        <td class="text-danger">Cancelled</td>
                        <td class="actions"><a class="icon" href="#"><i class="mdi mdi-plus-circle-o"></i></a></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div> -->

            <div class="col-12 col-lg-12">
              <div class="card card-table">


               <div class="card-header col-md-12 d-flex">

                 <div class="title col-md-6">All Users List</div>
                 <div class="tools dropdown col-md-6 d-flex">
               
                   
                     <a href="<?php echo base_url(); ?>welcome/userlist" class="btn btn-info col-md-3 mx-2"><i class="fa-solid fa-rotate"></i> Refresh</a>
                  <?php if($this->session->userdata('emp_type')=="admin"){ ?>

                         <a href="<?php echo base_url(); ?>welcome/user_ad" class="btn btn-warning col-md-3 mx-2"><i class="fa fa-plus"></i>  New User</a>
                       <?php } ?>

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
                  <table class="table table-striped table-hover text-center">
                    <thead>
                      <tr>
                        <th colspan="1">#</th>
                        <th colspan="1"></th>
                        <th colspan="1">User</th>
                        <th colspan="1">Registration Id</th>
                        <!-- <th colspan="1">User Id</th> -->
                        
                        <!-- <th colspan="1">Password</th>  -->
                        <th colspan="1">Logged</th>                     
                        <th colspan="1" class="actions">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                       $r=$arr_start+1;
                     
                    
                  
                     foreach ($user_list as $value) { ?>

                     
                        
                     <tr>
                        <th colspan="1"><?php echo $r; ?></th>
                        <td class="user-avatar"> <img src="<?php echo base_url(); ?>asset/img/avatar4.png" alt="Avatar"></td>
                        <td><?php echo $value->user_name; ?></td>
                        <td><?php echo $value->emp_id; ?></td>
                        <!-- <td><?php echo $value->user_id; ?></td> -->
                       
                        <!-- <td><?php echo $value->password; ?></td> -->
                        <td>
                          <?php if($value->logged_in!=0){ ?>
                             <span class="badge bg-success py-2 px-1">Logged in</span>
                           <?php }else{ ?>
                            <span class="badge bg-danger py-2 px-1">Logged out</span>

                          <?php  } ?>
                        </td>
                        <td>
                          <?php if($this->session->userdata('emp_type')=="admin"){ ?>
                            <a class="btn btn-primary" href="<?php echo base_url('Setting_controller/index/'.$value->id.'');?>"><i class="fa fa-edit"></i></a>

                            <a class="btn btn-info" href="#"><i class="fa fa-file"></i></a>
                            <a class="btn btn-danger" href="#"><i class="fa fa-trash"></i></a>
                          <?php  } ?>
                        </td>
                      </tr>
                    <?php 
                    $r++;
                  } ?>


                      
                    </tbody>
                   
                  </table>
                   <h4 class="col-md-12 text-left mx-4 my-2"><b><?php echo $user_no_login; ?> 𝐔𝐒𝐄𝐑 𝐋𝐎𝐆𝐆𝐄𝐃 𝐈𝐍 𝐑𝐈𝐆𝐇𝐓 𝐍𝐎𝐖</b></h4>
                  <div class="row col-md-12 text-center my-2">
                    <?php  
                    $limit=4;
                    $total_pages = ceil($user_number / $limit);


                    
                    ?>
                   <nav aria-label="...">
                      <ul class="pagination">
                         
                         
                          <li class="page-item">
                            <a class="page-link" href="<?php echo base_url('Welcome/userlist'); ?>">Previous</a>
                          </li>
                          <?php for ($i=1; $i <=$total_pages; $i++) {  ?>

                            <li class="page-item">

                              <form method="post" action="<?php echo base_url(); ?>welcome/userlist">
                                  <input type="hidden" name="page" value="<?php echo $i; ?>">
                                  <button class="page-link <?php print ($i==$page_no) ? "active" : ""; ?>" name="page_submit" type="submit">
                                   <?php echo $i; ?>
                                  </button>
                                  
                                  
                                </form>
                              
                            </li>
                             
                       
                           <?php  } ?>
                           <li class="page-item">
                            <form method="post" action="<?php echo base_url(); ?>welcome/userlist">
                                  <input type="hidden" name="page" value="<?php echo $total_pages; ?>">
                                  <button class="page-link" name="page_submit" type="submit">
                                   <?php //echo $total_pages; ?>Next
                                  </button>
                                  
                                  
                            </form>
                            <!-- <a class="page-link" href="<?php// echo base_url('Welcome/dashboard/'.$total_pages.''); ?>">Next</a> -->
                          </li>

                         
                        
                      </ul>
                    </nav> 
                    
                  </div>
                </div>
              </div>
            </div>
          </div>



         <!--  <div class="row">

          

            <div class="col-12 col-lg-6">
              <div class="card card-table">


               <div class="card-header col-md-12 d-flex">

                 <div class="title col-md-6">All Department List</div>
                 <div class="tools dropdown col-md-6 d-flex">
               
                 

                    <div class="dropdown mx-2 col-md-3">
                      <a class="btn btn-primary col-md-12 mx-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-bars  my-2"></i>
                      </a>

                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                      </ul>
                    </div>

                    
                     <a href="<?php echo base_url(); ?>welcome/dashboard/1" class="btn btn-info mx-2 col-md-3"><i class="fa-solid fa-rotate"></i></a>

                     <a href="#" class="btn btn-warning mx-2 col-md-3" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-plus"></i></a>
                  </div>

                 
                </div>




                <div class="card-body table-responsive">
                             
                  <table class="table table-striped table-hover text-center">
                    <thead>
                      <tr>
                        <th colspan="1">#</th>
                        <th colspan="1">Department</th>
                        <th colspan="1">Created at</th>
                                         
                        <th colspan="1" class="actions"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 

                     //  $v=$start_index+1;
                       //foreach ($department_list as $value_dept) { ?>
                        
                      <tr>
                        <th colspan="1"><?php //echo $v; ?></th>
                        <td><?php// echo $value_dept->department_name; ?></td>
                        <td><?php// echo $value_dept->created_at; ?></td>
                       
                        <td>
                          <a class="btn btn-primary" href="#"><i class="fa fa-edit"></i></a>
                          <a class="btn btn-info" href="#"><i class="fa fa-file"></i></a>
                          <a class="btn btn-danger" href="#"><i class="fa fa-trash"></i></a>
                        </td>
                      </tr>
                    <?php
                   // $v++;
                    // }
                    
                     ?>
                      
                    </tbody>
                  </table>
                   <div class="row col-md-12 text-center my-2">
                    <?php  
                  //  $limit=5;
                  //  $dept_pages = ceil ($dept_length / $limit);

                    
                    ?>
                    <nav aria-label="...">
                      <ul class="pagination">
                         
                         
                          <li class="page-item">
                            <a class="page-link" href="<?php //echo base_url('Welcome/dashboard/1'); ?>">Previous</a>
                          </li>
                          <?php //for ($m=1; $m <=$dept_pages; $m++) {  ?>

                            <li class="page-item">
                               <a class="page-link <?php // print ($m==$active) ? "active" : " "; ?>" href="<?php// echo base_url('Welcome/dashboard/'.$m.''); ?>"><?php// echo $m; ?></a>
                            </li>
                       
                           <?php//  } ?>

                          <li class="page-item">
                            <a class="page-link" href="<?php// echo base_url('Welcome/dashboard/'.$dept_pages.''); ?>">Next</a>
                          </li>
                        
                      </ul>
                    </nav>
                    
                  </div>
                </div>
              </div>
            </div>
              <div class="col-12 col-lg-6">
              <div class="card card-table">


               <div class="card-header col-md-12 d-flex">

                 <div class="title col-md-6">All Designation List</div>
                 <div class="tools dropdown col-md-6 d-flex">
               
                  

                    <div class="dropdown  mx-2  col-md-3">
                      <a class="btn btn-primary col-md-12 mx-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-bars my-2"></i>
                      </a>

                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                      </ul>
                    </div>

                   
                     <a href="<?php// echo base_url(); ?>welcome/dashboard/1" class="btn btn-info  mx-2 col-md-3"><i class="fa-solid fa-rotate"></i></a>

                     <a href="#" class="btn btn-warning  mx-2 col-md-3" data-bs-toggle="modal" data-bs-target="#exampleModal_2"><i class="fa fa-plus"></i></a>
                  </div>

                 
                </div>




                <div class="card-body table-responsive">
                             
                  <table class="table table-striped table-hover text-center">
                    <thead>
                      <tr>
                        <th colspan="1">#</th>
                        <th colspan="1">Designation</th>
                        <th colspan="1">Created at</th>
                                           
                        <th colspan="1" class="actions"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php //$q=$start_index+1;
                      //foreach ($designation_list as $value_desig) { ?>
                        
                      <tr>
                          <th colspan="1"><?php// echo $q; ?></th>                   
                        <td><?php// echo $value_desig->designation; ?></td>
                        <td><?php// echo $value_desig->created_at; ?></td>
                        <td>
                          <a class="btn btn-primary" href="#"><i class="fa fa-edit"></i></a>
                          <a class="btn btn-info" href="#"><i class="fa fa-file"></i></a>
                          <a class="btn btn-danger" href="#"><i class="fa fa-trash"></i></a>
                        </td>
                      </tr>
                    <?php 
                   // $q++;
                 // } ?>
                      
                    </tbody>
                  </table>
                   <div class="row col-md-12 text-center my-2">
                    <?php  
                   // $limit=5;
                  //  $desig_pages = ceil ($desig_length / $limit);

                    
                    ?>
                    <nav aria-label="...">
                      <ul class="pagination">
                         
                         
                          <li class="page-item">
                           <a class="page-link" href="<?php// echo base_url('welcome/dashboard/1'); ?>">Previous</a>
                          </li>
                          <?php// for ($n=1; $n <=$desig_pages; $n++) {  ?>

                            <li class="page-item">
                               <a class="page-link <?php//  print ($n==$active) ? "active" : " "; ?>" href="<?php// echo base_url('Welcome/dashboard/'.$n.''); ?>"><?php //echo $n; ?></a>
                            </li>
                       
                           <?php//  } ?>

                          <li class="page-item">
                            <a class="page-link" href="<?php //echo base_url('Welcome/dashboard/'.$desig_pages.''); ?>">Next</a>
                          </li>
                        
                      </ul>
                    </nav>
                    
                  </div>
                </div>
              </div>
            </div>


          </div> -->



          
        </div>





             <!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Modal-1 -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="<?php// echo base_url(); ?>welcome/add_department" method="post">
    <div class="modal-content">
       
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Department</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div>
        
           <div class="form-row">
               <label class="form-label">Department</label>
               <input type="text" name="department" id="department" class="form-control">

             
           </div>
        
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" id="submit" name="submit" class="btn btn-primary" value="Save">
      </div>
   
    </div>
     </form>
  </div>
</div>



<!-- Modal-2 -->
<div class="modal fade" id="exampleModal_2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="<?php// echo base_url(); ?>welcome/add_designation" method="post">
    <div class="modal-content">
       
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Designation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <div>
        
           <div class="form-row">
               <label class="form-label">Designation</label>
               <input type="text" name="designation" id="designation" class="form-control">

             
           </div>
        
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" id="submit" name="submit" class="btn btn-primary" value="Save">
      </div>
      
    </div>
     </form>
  </div>
</div>


