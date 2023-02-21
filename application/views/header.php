
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>asset/img/sanmarglogo.png">
    <title>Get News App</title>
   
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/css/perfect-scrollbar.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/css/material-design-iconic-font.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/css/jquery-jvectormap-1.2.2.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/css/jqvmap.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/css/bootstrap-datetimepicker.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/css/app.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/css/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js">
  
   

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>chanakyaitalic/stylesheet.css" charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>chanakyauni/stylesheet.css" charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>chanakyaunibold/stylesheet.css" charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>chanakyaunibolditalic/stylesheet.css" charset="utf-8" />



    <style type="text/css">
      body,html { 
        font-family: "ChanakyaUniB"; /* Add double quotes around your custom font name */
        height: 100%; 
        min-height: 100%; 
        margin-top: 0px;
      }
      .ellipsis {
        text-overflow: ellipsis;
        /*white-space: nowrap;*/
        /*display:block;*/
        overflow: hidden;
        /*height: 5em;*/
        /*width: 40em;*/
        display: -webkit-box;
         -webkit-line-clamp: 4; /* number of lines to show */
                 line-clamp: 4; 
         -webkit-box-orient: vertical;
      }
      .ellipsis_two {
        text-overflow: ellipsis;
        /*white-space: nowrap;*/
        /*display:block;*/
        overflow: hidden;
        /*height: 5em;*/
        /*width: 40em;*/
        display: -webkit-box;
         -webkit-line-clamp: 6; /* number of lines to show */
                 line-clamp: 6; 
         -webkit-box-orient: vertical;
      }
      #my_pick_dropdown{
        height: auto;
        width: 160px;
        margin-left: 10px;
      }
      #my_pick_dropdown li{
        margin-top: 10px;
        margin-bottom: 10px;

      }
      #news_dropdown{
        height: 140px;
        width: 100%;
        margin-left: 10px;


      }
      #photos_dropdown{
        height: 140px;
        width: 100%;
        margin-left: 10px;


      }
      #dashboard_dropdown{

         height: 255px;
        width: 130px;
        margin-left: 20px;
      }
       #dashboard_dropdown li{
        margin-top: 7px;
        margin-bottom: 7px;

      }
      .list{
        margin-left: 20px;
      }
      
    </style>
<!-- <i class="fa-regular fa-rectangle-ad"></i>
<i class="fa-solid fa-dharmachakra"></i>
fa-sun-o
<i class="fa-solid fa-gopuram"></i>
fa-building-o
<i class="fa-light fa-trophy-star"></i>
fa-asterisk
<i class="fa-sharp fa-solid fa-calendar-star"></i> -->
    
  </head>
  <body>
     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-left" viewBox="0 0 16 16">
      <path fill-rule="evenodd" d="M2 13.5a.5.5 0 0 0 .5.5h6a.5.5 0 0 0 0-1H3.707L13.854 2.854a.5.5 0 0 0-.708-.708L3 12.293V7.5a.5.5 0 0 0-1 0v6z"/>
    </svg>

    <div class="be-wrapper be-fixed-sidebar">
      <nav class="navbar navbar-expand fixed-top be-top-header">
        <div class="container-fluid">
          <div class="be-navbar-header"><a class="navbar-brand" style="background-image:url('<?php echo base_url(); ?>asset/img/sanmarglogo.png');background-size: 40%;" href="#"></a>
          </div>
          <div class="page-title d-flex">
            <span>News Management</span>
           </div>
          <div class="be-right-navbar">
            <ul class="nav navbar-nav float-right be-user-nav">
              <li class="nav-item dropdown my-2">

                <a class="nav-link dropdown-toggle " href="#"   data-bs-toggle="modal" data-bs-target="#profile_modal">

                  <img src="<?php echo base_url(); ?>asset/img/avatar.png" alt="Avatar"><i class="fa fa-caret-down mx-2"></i>
                </a>

              </li>
               <li class="nav-item dropdown">
                <a class="nav-link be-toggle-right-sidebar" href="#" role="button" aria-expanded="false">
                  <span class="text-center">
                    ||<span><?php echo $this->session->userdata('user_name');  ?></span>|
                    |<span><?php echo  $this->session->userdata('emp_id'); ?></span>||
                   
                  </span>
                </a>
              </li>
              <li class="nav-item my-3">
                 <a class="btn btn-danger" href="<?php echo base_url(); ?>welcome/logout"><i class="fa-sharp fa-solid fa-power-off"></i></a></li>
              </li>
            </ul>
            <ul class="nav navbar-nav float-right be-icons-nav">
                                  
           </ul>
          </div>
        </div>
      </nav>

  <div class="col-md-12 d-flex">
      <div class="be-left-sidebar col-md-2" style="margin-top:-10px; position: inherit;z-index: 0;height: 100%;">
        <div class="left-sidebar-wrapper" style="height: 780px;">
          <div class="left-sidebar-spacer" style="height: 780px;">
           <!--  <div class="left-sidebar-scroll">
              <div class="left-sidebar-content"> -->
                <ul class="sidebar-elements" style="margin-left:-30px;">

                  <!-- <li class="divider">Menu & Dashboard</li> -->
                
                  <li class="list-item <?php print (isset($dash_act)) ? "active" : ""; ?> mt-4" id="dashboard_menu">

                    <a style="font-size: 12px;" href="<?php echo base_url(); ?>welcome/dashboard"><i class="fa fa-home mx-2"></i><span>𝐃𝐀𝐒𝐇𝐁𝐎𝐀𝐑𝐃</span></a>
                  </li>
                   
                   <hr>
                  
                   <li class="list-item <?php print (isset($mypick_act)) ? "active" : ""; ?>" id="my_pick_menu">
                         <a style="font-size: 12px;" href="#"><i class="fa fa-pen-to-square mx-2"></i><span>𝐌𝐘 𝐏𝐈𝐂𝐊</span></a>
                   </li>
                   <?php $date_today=date('d-m-y');  ?>
                   <!-- <?php echo base_url(); ?>Mywork_controller/my_pick_all_folder -->
                    <ul style="list-style: none;" id="my_pick_dropdown" class="list">
                           <li class="list-item <?php print (isset($news)) ? "active" : "text-secondary"; ?>" id="news_menu">                       
                             <a style="font-size: 12px;" href="#" class="list-item d-flex  <?php print (isset($news)) ? "active" : "text-secondary"; ?>" style="text-decoration: none;  margin-left: 10px;">
                              <i class="fa fa-folder mx-2"></i><span><b>ALL NEWS</b></span></a>
                           </li>
                           <ul style="list-style: none;" id="news_dropdown" class="">
                                <li class="list-item <?php print (isset($bhasha_act)) ? "active" : "text-secondary"; ?>">                       
                                  <a style="font-size: 12px;" href="<?php echo base_url('Mywork_controller/PTI_BHASHA_pick_news/'.$date_today.''); ?>" class="list-item d-flex  <?php print (isset($bhasha_act)) ? "active" : "text-secondary"; ?>" style="text-decoration: none;  margin-left: 10px;"><i class="fa fa-folder mx-2"></i><span><b>PTI BHASHA</b></span></a>
                                </li>
                                 <li class="list-item <?php print (isset($english_act)) ? "active" : "text-secondary"; ?>">                       
                                  <a style="font-size: 12px;" href="<?php echo base_url('Mywork_controller/PTI_ENG_pick_news/'.$date_today.''); ?>" class="list-item d-flex <?php print (isset($english_act)) ? "active" : "text-secondary"; ?>" style="text-decoration: none;  margin-left: 10px;"><i class="fa fa-folder mx-2"></i><span><b>PTI ENGLISH</b></span></a>
                                </li>
                                 <li class="list-item <?php print (isset($varta_act)) ? "active" : "text-secondary"; ?>">                       
                                  <a style="font-size: 12px;" href="<?php echo base_url('Mywork_controller/UNI_Varta_pick_news/'.$date_today.''); ?>" class="list-item d-flex <?php print (isset($varta_act)) ? "active" : "text-secondary"; ?>" style="text-decoration: none;  margin-left: 10px;"><i class="fa fa-folder mx-2"></i><span><b>UNI VARTA</b></span></a>
                                </li>
                                 <li class="list-item <?php print (isset($oth_news_act)) ? "active" : "text-secondary"; ?>">                       
                                  <a style="font-size: 12px;" href="<?php echo base_url('Mywork_controller/OTHER_NEWS_pick_news/'.$date_today.''); ?>" class="list-item d-flex <?php print (isset($oth_news_act)) ? "active" : "text-secondary"; ?>" style="text-decoration: none;  margin-left: 10px;"><i class="fa fa-folder mx-2"></i><span><b>OTHER NEWS</b></span></a>
                                </li>
                                 <li class="list-item <?php print (isset($loc_news_act)) ? "active" : "text-secondary"; ?>">                       
                                  <a style="font-size: 12px;" href="<?php echo base_url('Mywork_controller/LOCAL_STORY_pick_news/'.$date_today.''); ?>" class="list-item d-flex <?php print (isset($loc_news_act)) ? "active" : "text-secondary"; ?>" style="text-decoration: none;  margin-left: 10px;"><i class="fa fa-folder mx-2"></i><span><b>LOCAL NEWS</b></span></a>
                                </li>
                           </ul>
                           <li class="list-item <?php print (isset($photos)) ? "active" : "text-secondary"; ?>" id="photos_menu">                       
                             <a style="font-size: 12px;" href="#" class="list-item d-flex  <?php print (isset($photos)) ? "active" : "text-secondary"; ?>" style="text-decoration: none;  margin-left: 10px;">
                              <i class="fa fa-folder mx-2"></i><span><b>ALL PHOTOS</b></span></a>
                           </li>
                             <ul style="list-style: none;" id="photos_dropdown" class="">
                                <li class="list-item <?php print (isset($pti_photo_act)) ? "active" : "text-secondary"; ?>">                       
                                  <a style="font-size: 12px;" href="<?php echo base_url('Mywork_controller/PTI_Photos_pick_news/'.$date_today.''); ?>" class="list-item d-flex <?php print (isset($pti_photo_act)) ? "active" : "text-secondary"; ?>" style="text-decoration: none;  margin-left: 10px;"><i class="fa fa-folder mx-2"></i><span><b>PTI PHOTOS</b></span></a>
                                </li>
                                 <li class="list-item <?php print (isset($uni_photo_act)) ? "active" : "text-secondary"; ?>">                       
                                  <a style="font-size: 12px;" href="<?php echo base_url('Mywork_controller/UNI_Photos_pick_news/'.$date_today.''); ?>" class="list-item d-flex <?php print (isset($uni_photo_act)) ? "active" : "text-secondary"; ?>" style="text-decoration: none;  margin-left: 10px;"><i class="fa fa-folder mx-2"></i><span><b>UNI PHOTOS</b></span></a>
                                </li>
                                 <li class="list-item <?php print (isset($loc_photo_act)) ? "active" : "text-secondary"; ?>">                       
                                  <a style="font-size: 12px;" href="<?php echo base_url('Mywork_controller/LOCAL_PHOTOS_pick_news/'.$date_today.''); ?>" class="list-item d-flex <?php print (isset($loc_photo_act)) ? "active" : "text-secondary"; ?>" style="text-decoration: none;  margin-left: 10px;"><i class="fa fa-folder mx-2"></i><span><b>LOCAL PHOTOS</b></span></a>
                                </li>
                                 <li class="list-item <?php print (isset($oth_photo_act)) ? "active" : "text-secondary"; ?>">                       
                                  <a style="font-size: 12px;" href="<?php echo base_url('Mywork_controller/OTHER_PHOTOS_pick_news/'.$date_today.''); ?>" class="list-item d-flex <?php print (isset($oth_photo_act)) ? "active" : "text-secondary"; ?>" style="text-decoration: none;  margin-left: 10px;"><i class="fa fa-folder mx-2"></i><span><b>OTHER PHOTOS</b></span></a>
                                </li>
                            </ul>



                    </ul>

                     
                   
                 <!--  <hr>

                  
                  
                <li class="divider">All News Category</li> -->
                <hr>
                  


                <li class="list-item <?php print (isset($pti_bhasha_act) || isset($pti_eng_act) || isset($uni_varta_act)) ? "active" : "text-secondary"; ?>" id="news_list"><a href="#" class="list-item d-flex <?php print (isset($pti_bhasha_act) || isset($pti_eng_act) || isset($uni_varta_act)) ? "active" : "text-secondary"; ?>" style="text-decoration: none; display: flex;"><i class="fa fa-file-lines mx-2"></i><h5><b>𝐓𝐎𝐃𝐀𝐘 𝐍𝐄𝐖𝐒</b></h5></a></li>
                   <!-- .menu-item -->
                 

                   <ul style="list-style: none;" id="news_ul_list" class="list">

                        <li class="list-item ">

                          <a style="font-size: 12px;" href="<?php echo base_url(); ?>File_controller/pti_bhasha" class="list-item d-flex <?php print (isset($pti_bhasha_act)) ? "active" : "text-secondary"; ?>" style="text-decoration: none;  margin-left: 10px;"><i class="fa fa-om mx-2"></i><span><b>𝐏𝐓𝐈 𝐁𝐇𝐀𝐒𝐇𝐀</b></span></a>
                        </li>
                        <li class="list-item ">

                          <a style="font-size: 12px;" href="<?php echo base_url(); ?>File_controller/pti_english" class="list-item d-flex <?php print (isset($pti_eng_act)) ? "active" : "text-secondary"; ?>" style="text-decoration: none;  margin-left: 10px;"><i class="fa fa-a mx-2"></i><span><b>𝐏𝐓𝐈 𝐄𝐍𝐆𝐋𝐈𝐒𝐇</b></span></a>
                        </li>
                        <li class="list-item ">

                          <a style="font-size: 12px;" href="<?php echo base_url(); ?>File_controller/uni_varta" class="list-item d-flex  <?php print (isset($uni_varta_act)) ? "active" : "text-secondary"; ?>" style="text-decoration: none;  margin-left: 10px;"><i class="fa fa-file-lines mx-2"></i><span><b>𝐔𝐍𝐈 𝐕𝐀𝐑𝐓𝐀</b></span></a>
                        </li>
                    
                   </ul>
                   <hr>

                <li class="list-item <?php print (isset($pti_photos_act) || isset($uni_photos_act)) ? "active" : "text-secondary"; ?>" id="photos_list">
                  <a href="#" class="list-item d-flex <?php print (isset($pti_photos_act) || isset($uni_photos_act)) ? "active" : "text-secondary"; ?>" style="text-decoration: none; display: flex;"><i class="fa-solid fa-image mx-2"></i><h5><b>𝐓𝐎𝐃𝐀𝐘 𝐏𝐇𝐎𝐓𝐎𝐒</b></h5></a>
                </li>
               
                 <ul style="list-style: none;" id="photos_ul_list" class="list">
                     <li class="list-item">

                        <a style="font-size: 12px;" href="<?php echo base_url(); ?>File_controller/pti_photos" class="list-item d-flex <?php print (isset($pti_photos_act)) ? "active" : "text-secondary"; ?>" style=" text-decoration: none; margin-left: 10px;"><i class="fa-solid fa-image mx-2"></i><span><b>𝐏𝐓𝐈 𝐏𝐇𝐎𝐓𝐎𝐒</b></span></a>

                      </li>
                     <li class="list-item">

                         <a style="font-size: 12px;" href="<?php echo base_url(); ?>File_controller/uni_photos" class="list-item d-flex <?php print (isset($uni_photos_act)) ? "active" : "text-secondary"; ?>" style="text-decoration: none; margin-left: 10px;"><i class="fa-solid fa-image mx-2"></i><span><b>𝐔𝐍𝐈 𝐏𝐇𝐎𝐓𝐎𝐒</b></span></a>
                      </li>
                      
                     
                </ul>
                <hr>

                <li class="list-item <?php print (isset($local_story_act)) ? "active" : ""; ?>">

                         <a style="font-size: 12px;" href="<?php echo base_url(); ?>Local_controller/own_local_story" class="list-item d-flex <?php print (isset($local_story_act)) ? "active" : ""; ?>"><i class="fa fa-file-lines mx-2"></i><h5><b>𝐋𝐎𝐂𝐀𝐋 𝐍𝐄𝐖𝐒</b></h5></a>
                </li>
                <hr>
                <li class="list-item <?php print (isset($local_photo_act)) ? "active" : ""; ?>">

                         <a style="font-size: 12px;" href="<?php echo base_url(); ?>Local_controller/own_local_photos" class="list-item d-flex <?php print (isset($local_photo_act)) ? "active" : ""; ?>"><i class="fa-solid fa-image mx-2"></i><h5><b>𝐋𝐎𝐂𝐀𝐋 𝐏𝐇𝐎𝐓𝐎𝐒</b></h5></a>
                </li>
                <hr>
                <li class="list-item <?php print (isset($bengali_story_act) || isset($bengali_photos_act)) ? "active" : "text-secondary"; ?>">

                         <a style="font-size: 12px;" href="#" class="list-item d-flex <?php print (isset($bengali_story_act) || isset($bengali_photos_act)) ? "active" : "text-secondary"; ?>"><i class="fa-solid fa-language mx-2"></i><h5><b>𝐎𝐓𝐇𝐄𝐑 𝐋𝐀𝐍𝐆𝐔𝐀𝐆𝐄</b></h5></a>
                </li>
                
               
                 <ul style="list-style: none;" id="" class="list">

                        <li class="list-item <?php print (isset($bengali_story_act)) ? "active" : "text-secondary"; ?>">

                          <a style="font-size: 12px;" href="<?php echo base_url(); ?>Bengali_controller/other_news" class="list-item d-flex <?php print (isset($bengali_story_act)) ? "active" : "text-secondary"; ?>" style="text-decoration: none;  margin-left: 10px;"><i class="fa fa-file mx-2"></i><span><b>𝐎𝐓𝐇𝐄𝐑 𝐍𝐄𝐖𝐒</b></span></a>
                        </li>
                        <li class="list-item <?php print (isset($bengali_photos_act)) ? "active" : "text-secondary"; ?>">

                          <a style="font-size: 12px;" href="<?php echo base_url(); ?>Bengali_controller/other_photos" class="list-item d-flex <?php print (isset($bengali_photos_act)) ? "active" : "text-secondary"; ?>" style="text-decoration: none;  margin-left: 10px;"><i class="fa fa-image mx-2"></i><span><b>𝐎𝐓𝐇𝐄𝐑 𝐏𝐇𝐎𝐓𝐎𝐒</b></span></a>
                        </li>
                       
                    
                   </ul>
                   <hr>

                  <li class="list-item <?php print (isset($archive_act)) ? "active" : ""; ?>">
                         <a style="font-size: 12px;" href="<?php echo base_url(); ?>Mywork_controller/all_folder"><i class="fa fa-file mx-2"></i><span>𝐀𝐑𝐂𝐇𝐈𝐕𝐄𝐒</span></a>
                  </li>
               

                 <hr>
                         
                
                  <li class="divider">Features & Settings</li> 
                  </li>
                  <li class="parent <?php print (isset($folder_set)) ? "active" : "text-secondary"; ?>"><a style="font-size: 12px;" href="<?php echo base_url(); ?>Folder_setting_controller/setting_bhasha_folder"><i class="fa fa-gear mx-2"></i><span>𝐒𝐄𝐓𝐓𝐈𝐍𝐆𝐒</span></a>
                    <ul class="sub-menu">
                      <li><a href="#">Path Settings</a>
                      </li>
                      <li><a href="#">Acount Settings</a>
                      </li>                                        
                      </li>
                      <li><a href="#">Font Settings</a>
                      </li>
                      
                    </ul>
                  </li> 
                   <li class="parent <?php print (isset($ulist_set)) ? "active" : "text-secondary"; ?>"><a style="font-size: 12px;" href="<?php echo base_url(); ?>welcome/userlist"><i class="fa fa-gear mx-2"></i><span>𝐔𝐒𝐄𝐑 𝐒𝐄𝐓𝐓𝐈𝐍𝐆𝐒</span></a></li>                 
                 
                 <!--  <li class="<?php// print (isset($docs_act)) ? "active" : "text-secondary"; ?>"><a style="font-size: 12px;" href="<?PHP// echo base_url(); ?>Setting_controller/documentation"><i class="fa fa-file mx-2"></i><span>𝐃𝐎𝐂𝐔𝐌𝐄𝐍𝐓𝐀𝐓𝐈𝐎𝐍</span></a>
                  </li> -->
                </ul>
             <!--  </div>
            </div> -->
          </div>
          <!-- <div class="progress-widget">
            <div class="progress-data d-flex"> -->

             <!-- <a href=""><i class="fa fa-bars"></i></a>  -->
              <!--<div class="dropdown">
                  <a class="" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-bars  my-2"></i> 
                  </a>

                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#profile_modal">Profile</a></li>
                   
                    <li><a class="dropdown-item" href="<?php echo base_url(); ?>welcome/logout">Logout</a></li>
                  </ul>
                </div>
                <div>
                  <h4 class="name"><b><?php echo $this->session->userdata('user_name');  ?></b></h4>
                </div>

                </div>
          
          </div> -->
        </div>
      </div>






      <div class=" col-md-10 container">


<!-- be-content -->






<!-- Button trigger modal -->
<!-- <button >
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="profile_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row col-md-12">
           <div class="text-center">
              <img src="<?php echo base_url(); ?>asset/img/avatar.png" width="100" height="150" style="border-radius: 40px; border: 2px solid black;">
           </div>
        </div>
        <div class="col-md-12">
          <div class="col-md-12">
           
            <h3 class="text-center"><?php echo $this->session->userdata('user_name');  ?></h3>
            
          

            
          </div>
          <hr>
          <div class="col-md-12 d-flex">
            <div class="col-md-6">
              <div class="form-row d-flex my-2">
                <h6>Employee Id:&nbsp;</h4>
                <h6><b><?php echo  $this->session->userdata('emp_id'); ?></b></h6>
              </div>
              
            </div>
             <div class="col-md-6">
              <div class="form-row d-flex my-2">
                <h6>User Id:&nbsp;</h4>
                <h6><b><?php echo $this->session->userdata('user_id'); ?></b></h6>
              </div>
              
            </div>
          </div>
         
          <div class="col-md-12 d-flex my-2">
            
             <div class="col-md-12 text-center">
              <div class="form-row d-flex text-center">
                <h6>Password:&nbsp;</h4>
                <h6><b><?php echo $this->session->userdata('password'); ?></b></h6>
              </div>
              
            </div>
          </div>


          





        </div>
        
      </div>
      <div class="modal-footer">
        <a class="btn btn-danger" href="<?php echo base_url(); ?>welcome/logout"><i class="fa fa-right-from-bracket mx-1"></i>Logout</a></li>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <!-- <a href="#" class="btn btn-primary text-light">ok</a> -->
      </div>
    </div>
  </div>
</div>