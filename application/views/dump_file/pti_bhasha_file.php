 <div class="row my-4">
            
    <div class="col-12 col-lg-12">
      <form method="post" action="<?php echo base_url(); ?>welcome/pick_bhasha_story">
        <div class="card card-table">
           <div class="card-header col-md-12 d-flex">
              <div class="title col-md-8"><b><?php echo $file_name; ?></b></div>


              <div class="tools dropdown col-md-2 d-flex">
               
                <div class="btn btn-success col-md-3 mx-2"><button class="bg-success" type="submit" id="pick_submit" name="pick_submit"><i class="fa fa-check"></i></button></div>

                <div class="dropdown col-md-3 mx-2 ">
                  <a class="btn btn-primary" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-bars px-2"></i>
                  </a>

                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                  </ul>
                </div>

                 <div class="btn btn-secondary col-md-3 mx-2"><i class="fa fa-download"></i></div>
                <a href="<?php echo base_url(); ?>welcome/pti_bhasha_file/<?php echo $file_name; ?>" class="btn btn-info col-md-3 mx-2"> <i class="fa-solid fa-rotate"></i></a>

                 <a href="<?php echo base_url(); ?>welcome/pti_bhasha" class="btn btn-warning col-md-3 mx-2"><i class="fa fa-close"></i></a>
              </div>
            
            </div>

          
              
            <div class="card-body table-responsive">

	           <!-- <form action="<?php //echo base_url('welcome/pti_bhasha_file_update'); ?>" method="post"> -->
	           	<input type="hidden" name="pick_file_name" value="<?php echo $file_name; ?>">
				
					<textarea rows="40"  class="form-control" name="text" style="overflow:auto;"><?PHP  echo $text2;  ?></textarea>  

				<!-- 	<input type="submit" name="submit" value="Post" class="my-1 btn btn-success"> 
			   </form> -->
				
            </div>
       
        </div>
      </form>
    </div>
</div>


