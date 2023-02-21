      <div class="main-content container-fluid">



          <div class="row">

           

            <div class="col-12 col-lg-12">
              <div class="card card-table">


               <div class="card-header col-md-12 d-flex">

                 <div class="title col-md-6">Add New User</div>
                 <div class="tools dropdown col-md-6 d-flex">
               
                   
                    <a href="<?php echo base_url(); ?>welcome/userlist" class="btn btn-warning col-md-3 mx-2"><i class="fa-solid fa-list"></i> User List</a>

                   
                     <a href="<?php echo base_url(); ?>welcome/user_ad" class="btn btn-info col-md-3 mx-2"><i class="fa-solid fa-rotate"></i> Refresh</a>

                    
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
                  
                   <form method="post" action="<?Php echo base_url(); ?>welcome/add_user_operation">
                    <tbody>
                      <tr>
                        <td><label class="form-label"><b>Name:</b></label></td>
                        <td><input type="text" name="first_name" id="first_name" class="form-control" placeholder="Enter Your First Name">
                         <span class="text-danger"><?php echo form_error("first_name"); ?></span></td>
                          <td><label class="form-label"><b>Employee Id:</b></label></td>
                        <td><span class="form-control"><?php echo $reg_id; ?></span>
                          <input type="hidden" name="emp_id" id="emp_id" class="form-control" value="<?php echo $reg_id; ?>">
                        <span class="text-danger"><?php echo form_error("emp_id"); ?></span></td>                                               
                      </tr>
                      
                      
                      <tr>
                        <td><label class="form-label"><b>User Id:</b></label></td>
                        <td><input type="text" name="user_id" id="user_id" class="form-control" placeholder="User Id Automaticalliy Generated After Enter Your Name" >
                        <span class="text-danger"><?php echo form_error("user_id"); ?></span></td>

                        
                        <td><label class="form-label"><b>Password:</b></label></td>
                        <td><input type="text" name="password" id="password" class="form-control" placeholder="Password Automaticalliy Generated After Enter Your Name">
                        <span class="text-danger"><?php echo form_error("password"); ?></span></td>
                        
                      </tr>
                     
                     
                       
                      
                      <tr> 
                        
                          <td colspan="4"><input type="submit" name="submit" id="submit" class="form-control btn btn-success" value="Submit"></td>
                      </tr>

                      
                      
                    
                    </tbody>
                  </form>
                  </table>
                </div>
              </div>
            </div>
          </div>



          
        </div>








   
