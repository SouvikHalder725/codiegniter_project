 <?php 
$length=strlen($file_name);  
                       
if($length>3){ 
  // $info = exif_read_data("C:\Wire_Agency\UNI_Photos/".$value."",0,true);                                                
    $size = getimagesize("C:\Wire_Agency\PTI_Photos/".$file_name."", $info);
   
    if(is_array($info)) 
    {
      if(isset($info['APP13'])){
          $iptc = iptcparse($info['APP13']);

          // echo "<pre>";
          // print_r($iptc);
          // echo "</pre>"; 


            if(!isset($iptc['2#105'])){
               $title="Unknown";  
                $subject=$iptc['2#120'][0];   
               
            }
            elseif(!isset($iptc['2#120'])){
              $subject="Unknown";
               $title  =$iptc['2#105'][0];
            }
            elseif(!isset($iptc['2#105']) && !isset($iptc['2#120'])){
               $title="Unknown"; 
               $subject="Unknown";
            }
            else{
               $title  =$iptc['2#105'][0];
                $subject=$iptc['2#120'][0];
                                                           
            }   
          }                                                             
       }
   }

?>
 <div class="row my-4">
            
    <div class="col-12 col-lg-12">
       <form method="post" action="<?php echo base_url(); ?>welcome/pick_pti_photos">
        <div class="card card-table">
            <div class="card-header col-md-12 d-flex">
              <div class="title col-md-8"><b><?php echo $file_name; ?></b></div>


              <div class="tools dropdown col-md-2 d-flex">
               
                <div class="btn btn-success col-md-3 mx-2"><button class="bg-success" type="submit" id="pick_submit" name="pick_submit"><i class="fa fa-check"></i></button></div>

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
                  <?php $ptioruni=1;?>
                 <a href="<?php echo base_url('Setting_controller/download/'.$file_name.'/'.$ptioruni.''); ?>" class="btn btn-secondary col-md-3 mx-2"><i class="fa fa-download"></i></a>
                  <a href="<?php echo base_url(); ?>welcome/pti_photos_file/<?php echo $file_name; ?>" class="btn btn-info col-md-3 mx-2"><i class="fa-solid fa-rotate"></i></a>

                 <a href="<?php echo base_url(); ?>welcome/pti_photos" class="btn btn-warning col-md-3 mx-2"><i class="fa fa-close"></i></a>
              </div>
            
            </div>
            <div class="card-body table-responsive" style="background-image:url('');background-size: cover;">
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


              
              <input type="hidden" name="pick_file_name" value="<?php echo $file_name; ?>">

	            <img src="<?php echo base_url(); ?>document_uploads/all_Photos/<?php echo $file_name; ?>" style="height: 100%; width: 100%;">

             
				
            </div>
             <div class="mx-3 my-3 py-3 px-3 text-left">
                 <h3><b><?php echo $title; ?></b></h3>
                 <h5><b><?php echo $subject; ?></b></h5>  
               
             </div>
        </div>
      </form>
    </div>
</div>
