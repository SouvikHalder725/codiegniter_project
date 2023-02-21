<div class="main-content container-fluid">

    <div class="row">

        <div class="col-12 col-lg-12">
          <div class="card card-table">

               <div class="card-header col-md-12 d-flex">
                 <div class="title col-md-6">All News Folder Path Setting</div>
                 <div class="tools dropdown col-md-6 d-flex">                                      
                    <a href="#" class="btn btn-warning col-md-3 mx-2"><i class="fa-solid fa-save"></i> Save Setting</a>
                                       
                    <a href="#" class="btn btn-info col-md-3 mx-2"><i class="fa-solid fa-rotate"></i> Refresh</a>                      
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

                          <tbody>
                            

                            <tr>
                              
                              <td class="d-flex col-md-12">
                                
                                <label class="form-label col-md-6 text-center"><h3>Pti Bhasha Folder Path:</h3></label>
                                <input type="text" name="" class="form-control col-md-6" value="<?php echo base_url(); ?>news_folder/pti_bhasha" disabled>
                              </td>
                              <td class="d-flex col-md-12">
                                
                                <label class="form-label col-md-6 text-center"><h3>Pti English Folder Path:</h3></label>
                                <input type="text" name="" class="form-control col-md-6" value="<?php echo base_url(); ?>news_folder/pti_english" disabled>
                              </td>
                              <td class="d-flex col-md-12">
                                
                                <label class="form-label col-md-6 text-center"><h3>Pti Photos Folder Path:</h3></label>
                                <input type="text" name="" class="form-control col-md-6" value="<?php echo base_url(); ?>news_folder/pti_photos" disabled>
                              </td>
                              <td class="d-flex col-md-12">
                                
                                <label class="form-label col-md-6 text-center"><h3>Uni Varta Folder Path:</h3></label>
                                <input type="text" name="" class="form-control col-md-6" value="<?php echo base_url(); ?>news_folder/uni_varta" disabled>
                              </td>
                              <td class="d-flex col-md-12">
                                
                                <label class="form-label col-md-6 text-center"><h3>Uni Photos Folder Path:</h3></label>
                                <input type="text" name="" class="form-control col-md-6" value="<?php echo base_url(); ?>news_folder/uni_photos" disabled>
                              </td>
                              <td class="d-flex col-md-12">
                                
                                <label class="form-label col-md-6 text-center"><h3>Other News Folder Path:</h3></label>
                                <input type="text" name="" class="form-control col-md-6" value="<?php echo base_url(); ?>news_folder/other_news" disabled>
                              </td>
                              <td class="d-flex col-md-12">
                                
                                <label class="form-label col-md-6 text-center"><h3>Other Photos Folder Path:</h3></label>
                                <input type="text" name="" class="form-control col-md-6" value="<?php echo base_url(); ?>news_folder/other_photos" disabled>
                              </td>

                            </tr>
                          </tbody>




                          
                        </table>








             
               </div>
          </div>
        </div>
    </div>          
</div>