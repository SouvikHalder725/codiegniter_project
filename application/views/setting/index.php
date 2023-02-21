
		<div class="container">
			<h1 class="mb-5 my-3">Account Settings</h1>
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
			<div class="bg-white shadow rounded-lg d-block d-sm-flex">
				<div class="profile-tab-nav border-right">
					<div class="p-4">
						<div class="img-circle text-center mb-3">
							<img src="<?php echo base_url(); ?>asset/img/avatar4.png" alt="Image" class="shadow">
						</div>
						<h4 class="text-center"><?php echo $user_data->user_name; ?></h4>
					</div>
					<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
						<a class="nav-link active" id="account-tab" data-toggle="pill" href="#account" role="tab" aria-controls="account" aria-selected="true">
							<i class="fa fa-home text-center mr-1"></i> 
							Account
						</a>
						<a class="nav-link" id="password-tab" data-toggle="pill" href="#password" role="tab" aria-controls="password" aria-selected="false">
							<i class="fa fa-key text-center mr-1"></i> 
							Password
						</a>
						<!-- <a class="nav-link" id="security-tab" data-toggle="pill" href="#security" role="tab" aria-controls="security" aria-selected="false">
							<i class="fa fa-user text-center mr-1"></i> 
							Security
						</a>
						<a class="nav-link" id="application-tab" data-toggle="pill" href="#application" role="tab" aria-controls="application" aria-selected="false">
							<i class="fa fa-tv text-center mr-1"></i> 
							Application
						</a>
						<a class="nav-link" id="notification-tab" data-toggle="pill" href="#notification" role="tab" aria-controls="notification" aria-selected="false">
							<i class="fa fa-bell text-center mr-1"></i> 
							Notification
						</a> -->
					</div>
				</div>
				<div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
					
					<div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
						<form method="post" action="<?php echo base_url(); ?>Setting_controller/profile_setting">
							<h3 class="mb-4">Account Settings</h3>

							
								<div class="row">
									<input type="hidden" name="id" id="id" value="<?php echo $user_data->id; ?>">
									<div class="col-md-6">
										<div class="form-group">
										  	<label>User Name</label>
										  	<input type="text" class="form-control" name="name" id="name" value="<?php echo $user_data->user_name; ?>">
										</div>
									</div>
									
									<div class="col-md-6">
										<div class="form-group">
										  	<label>Employee Id</label>
										  	<input type="text" class="form-control" name="emp_id" id="emp_id" value="<?php echo $user_data->emp_id; ?>" >
										</div>
									</div>
									
									<div class="col-md-6">
										<div class="form-group">
										  	<label>User id</label>
										  	<input type="text" class="form-control" name="user_id" id="user_id" value="<?php echo $user_data->user_id; ?>">
										</div>
									</div>
									
									
								</div>

							<div>
								<button class="btn btn-primary" type="submit" id="profile_submit" name="profile_submit">Update</button>
								<a href="<?php echo base_url(); ?>welcome/userlist" class="btn btn-light">Cancel</a>
							</div>
						</form>
					</div>
					
					<div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
					    <form method="post" action="<?php echo base_url(); ?>Setting_controller/password_setting">
							<h3 class="mb-4">Password Settings</h3>
							<input type="hidden" name="id" id="id" value="<?php echo $user_data->id; ?>">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
									  	<label>Old password</label>
									  	<input type="text" class="form-control" value="<?php echo $user_data->password; ?>">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
									  	<label>New password</label>
									  	<input type="password" name="password_one" id="password_one" class="form-control">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
									  	<label>Confirm new password</label>
									  	<input type="password" name="password_two" id="password_two" class="form-control">
									</div>
								</div>
							</div>
							<div>
								<button class="btn btn-primary" type="submit" name="password_submit" id="password_submit">Update</button>
								<a href="<?php echo base_url(); ?>welcome/userlist" class="btn btn-light">Cancel</a>
							</div>
					   </form>
					</div>
					<!-- <div class="tab-pane fade" id="security" role="tabpanel" aria-labelledby="security-tab">
						<h3 class="mb-4">Security Settings</h3>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Login</label>
								  	<input type="text" class="form-control">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Two-factor auth</label>
								  	<input type="text" class="form-control">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<div class="form-check">
										<input class="form-check-input" type="checkbox" value="" id="recovery">
										<label class="form-check-label" for="recovery">
										Recovery
										</label>
									</div>
								</div>
							</div>
						</div>
						<div>
							<button class="btn btn-primary">Update</button>
							<button class="btn btn-light">Cancel</button>
						</div>
					</div> -->
					<!-- <div class="tab-pane fade" id="application" role="tabpanel" aria-labelledby="application-tab">
						<h3 class="mb-4">Application Settings</h3>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<div class="form-check">
										<input class="form-check-input" type="checkbox" value="" id="app-check">
										<label class="form-check-label" for="app-check">
										App check
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="checkbox" value="" id="defaultCheck2" >
										<label class="form-check-label" for="defaultCheck2">
										Lorem ipsum dolor sit.
										</label>
									</div>
								</div>
							</div>
						</div>
						<div>
							<button class="btn btn-primary">Update</button>
							<button class="btn btn-light">Cancel</button>
						</div>
					</div> -->
					<!-- <div class="tab-pane fade" id="notification" role="tabpanel" aria-labelledby="notification-tab">
						<h3 class="mb-4">Notification Settings</h3>
						<div class="form-group">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="" id="notification1">
								<label class="form-check-label" for="notification1">
									Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum accusantium accusamus, neque cupiditate quis
								</label>
							</div>
						</div>
						<div class="form-group">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="" id="notification2" >
								<label class="form-check-label" for="notification2">
									hic nesciunt repellat perferendis voluptatum totam porro eligendi.
								</label>
							</div>
						</div>
						<div class="form-group">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="" id="notification3" >
								<label class="form-check-label" for="notification3">
									commodi fugiat molestiae tempora corporis. Sed dignissimos suscipit
								</label>
							</div>
						</div>
						<div>
							<button class="btn btn-primary">Update</button>
							<button class="btn btn-light">Cancel</button>
						</div>
					</div> -->
				</div>
			</div>
		</div>
	