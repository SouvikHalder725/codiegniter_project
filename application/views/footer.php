       </div>
     
    </div>
     
    </div>
    <script src="<?php echo base_url(); ?>asset/js/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>asset/js/perfect-scrollbar.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>asset/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>asset/js/app.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>asset/js/jquery.flot.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>asset/js/jquery.flot.pie.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>asset/js/jquery.flot.time.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>asset/js/jquery.flot.resize.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>asset/js/jquery.flot.orderBars.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>asset/js/curvedLines.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>asset/js/jquery.flot.tooltip.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>asset/js/jquery.sparkline.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>asset/js/countUp.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>asset/js/jquery-ui.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>asset/js/jquery.vmap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>asset/js/jquery.vmap.world.js" type="text/javascript"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script> -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>asset/js/jquery-3.6.1.min.js"></script>


    <script type="text/javascript">
      $(document).ready(function(){
      	//-initialize the javascript
      	App.init();
      	App.dashboard();
      
      });
    </script>
 <script type="text/javascript">
      $('#text_para').bind("paste",function(e) {
         e.preventDefault();
     });
 </script>
 <script type="text/javascript">
   
   function onmouse_enter(id){
      $('.hover'+id+'').toggle();
    
   }
   function onmouse_leave(id){
      $('.hover'+id+'').hide();
    
   }
    
 </script>

    <script type="text/javascript">
      
      $(document).ready(function(){
         $('#news_ul_list').show();
         $('#photos_ul_list').show();
        
          $('#dashboard_dropdown').hide();
          $('.hover_para').hide();
          $('#news_dropdown').hide();
          $('#photos_dropdown').hide();

          $('#user_id').click(function(){
            var emp_id=$('#emp_id').val();
            var name=$('#first_name').val();
            var new_name= name.replace(" ", "");
           

            

            var user_id=new_name+emp_id;
            var user_id_lower=user_id.toLowerCase();

             var user_password=new_name+'@'+emp_id;
             var user_password_lower=user_password.toLowerCase();
             
            $('#user_id').val(user_id_lower);
             $('#password').val(user_password_lower);
           
          });

          $('#news_list').click(function(){
           
            $('#news_ul_list').show();

          });
          $('#photos_list').click(function(){
           
            $('#photos_ul_list').show();

          });

          $('#my_pick_menu').click(function(){
           
            $('#my_pick_dropdown').toggle();

          });
          $('#dashboard_menu').click(function(){
           
            $('#dashboard_dropdown').toggle();

          });
          $('#news_menu').click(function(){
           
            $('#news_dropdown').toggle();

          });
          $('#photos_menu').click(function(){
           
            $('#photos_dropdown').toggle();

          });
         
          





          // //hindi first name translation
          $('#transelate').click(function(){
           

            var story_text=$('#story_body').val();
           
             
            $.ajax({
                      type: "POST",
                      url: "<?php echo base_url('Local_controller/transelate'); ?>",
                      data: {

                            story_text: story_text
                      },
                      
                      success: function(data){
                         $("#story_body").val(data);

                         console.log(data);
                     }
                 });

          });



         


          

         
    
           
      })
    </script>
    <script type="text/javascript">

      
        function confirm_del_folder(folder_name){
         
          
            const confirmSubmit = confirm('Are you sure you want to Delete this folder?');
              if (confirmSubmit) {
              
                 window.location.assign("<?php echo base_url(); ?>Del_controller/confirm_del_folder/"+folder_name+"")
              }
              else{
                return false;
              }
        }

        function confirm_del_pick_folder(folder_name){
         
          
            const confirmSubmit = confirm('Are you sure you want to Delete this folder?');
              if (confirmSubmit) {
              
                 window.location.assign("<?php echo base_url(); ?>Del_controller/mypick_del_folder/"+folder_name+"")
              }
              else{
                return false;
              }
        }
         function local_photo_translate(id){

            var tittle=$('#eng_tittle_'+id+'').val();
            var subject=$('#eng_subject_'+id+'').val();
          
             $.ajax({
                      type: "POST",
                      url: "<?php echo base_url('Local_controller/local_photo_tittle_transelate'); ?>",
                      data: {

                            tittle: tittle
                      },
                      
                      success: function(data){
                         $("#hindi_tittle_"+id+"").val(data);
                          
                        
                     }
            });


             $.ajax({
                      type: "POST",
                      url: "<?php echo base_url('Local_controller/local_photo_subject_transelate'); ?>",
                      data: {

                            subject: subject
                      },
                      
                      success: function(data){
                         $("#hindi_subject_"+id+"").text(data);
                        
                     }
            });


        }
        function pti_translate(id){

            var tittle=$('#eng_tittle_'+id+'').val();
            var subject=$('#eng_subject_'+id+'').val();
          
             $.ajax({
                      type: "POST",
                      url: "<?php echo base_url('Local_controller/pti_tittle_transelate'); ?>",
                      data: {

                            tittle: tittle
                      },
                      
                      success: function(data){
                         $("#hindi_tittle_"+id+"").val(data);
                          
                        
                     }
            });


             $.ajax({
                      type: "POST",
                      url: "<?php echo base_url('Local_controller/pti_subject_transelate'); ?>",
                      data: {

                            subject: subject
                      },
                      
                      success: function(data){
                         $("#hindi_subject_"+id+"").text(data);
                        
                     }
            });


        }
        function pti_eng_translate(id){

            var text=$('#copyText2_'+id+'').val();

          

             $.ajax({
                      type: "POST",
                      url: "<?php echo base_url('Local_controller/pti_eng_translate'); ?>",
                      data: {

                            text: text
                      },
                      
                      success: function(data){
                         $("#pti_eng_hindi_text_"+id+"").val(data);
                         
                        
                     }
            });


        }
        function other_news_translate(id){

            var text=$('#copyText2_'+id+'').val();

          

             $.ajax({
                      type: "POST",
                      url: "<?php echo base_url('Local_controller/other_news_translate'); ?>",
                      data: {

                            text: text
                      },
                      
                      success: function(data){
                         $("#other_news_hindi_text_"+id+"").val(data);
                         
                        
                     }
            });


        }
         function local_news_translate(id){

            var text=$('#local_eng_text_'+id+'').val();
             $.ajax({
                      type: "POST",
                      url: "<?php echo base_url('Local_controller/local_news_translate'); ?>",
                      data: {

                            text: text
                      },
                      
                      success: function(data){
                         $("#local_hindi_text_"+id+"").val(data);
                         
                        
                     }
            });


        }

        


        
    </script>
   
   
  </body>
</html>

