
<!DOCTYPE html>
<html lang="en">
<head>
<title>Login | Get News App</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="icon" type="image/png" href="<?php echo base_url(); ?>asset/login_asset/css/sanmarglogo.png" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/login_asset/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/login_asset/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/login_asset/css/icon-font.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/login_asset/css/animate.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/login_asset/css/hamburgers.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/login_asset/css/animsition.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/login_asset/css/select2.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/login_asset/css/daterangepicker.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/login_asset/css/util.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/login_asset/css/main.css">

<meta name="robots" content="noindex, follow">
<script nonce="5e2178a1-53b8-45dd-86a3-b4b2861d71b6">(function(w,d){!function(a,e,t,r){a.zarazData=a.zarazData||{};a.zarazData.executed=[];a.zaraz={deferred:[]};a.zaraz.q=[];a.zaraz._f=function(e){return function(){var t=Array.prototype.slice.call(arguments);a.zaraz.q.push({m:e,a:t})}};for(const e of["track","set","ecommerce","debug"])a.zaraz[e]=a.zaraz._f(e);a.zaraz.init=()=>{var t=e.getElementsByTagName(r)[0],z=e.createElement(r),n=e.getElementsByTagName("title")[0];n&&(a.zarazData.t=e.getElementsByTagName("title")[0].text);a.zarazData.x=Math.random();a.zarazData.w=a.screen.width;a.zarazData.h=a.screen.height;a.zarazData.j=a.innerHeight;a.zarazData.e=a.innerWidth;a.zarazData.l=a.location.href;a.zarazData.r=e.referrer;a.zarazData.k=a.screen.colorDepth;a.zarazData.n=e.characterSet;a.zarazData.o=(new Date).getTimezoneOffset();a.zarazData.q=[];for(;a.zaraz.q.length;){const e=a.zaraz.q.shift();a.zarazData.q.push(e)}z.defer=!0;for(const e of[localStorage,sessionStorage])Object.keys(e||{}).filter((a=>a.startsWith("_zaraz_"))).forEach((t=>{try{a.zarazData["z_"+t.slice(7)]=JSON.parse(e.getItem(t))}catch{a.zarazData["z_"+t.slice(7)]=e.getItem(t)}}));z.referrerPolicy="origin";z.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(a.zarazData)));t.parentNode.insertBefore(z,t)};["complete","interactive"].includes(e.readyState)?zaraz.init():a.addEventListener("DOMContentLoaded",zaraz.init)}(w,d,0,"script");})(window,document);</script></head>
<body>
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
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
            <div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
                <span class="login100-form-title-1">
                Sign In
                </span>
            </div>
            <form class="login100-form validate-form" action="<?php echo base_url(); ?>welcome/login" method="post">
                <div class="wrap-input100 validate-input m-b-10" data-validate="Username is required">
                  <span class="label-input100">Username</span>
                      <input class="input100" type="text" name="user_id" id="user_id" placeholder="Enter username">
                  <span class="focus-input100"></span>
                </div>
                 <div class="wrap-input100 validate-input m-b-18" data-validate="Password is required">
                      <span class="label-input100">Password</span>
                      <input class="input100" type="password" name="password" id="password" placeholder="Enter password">
                      <span class="focus-input100"></span>
                  </div>
                  <div class="flex-sb-m w-full p-b-30">

                      <div class="d-flex">
                         <a href="#" class="txt1 text-left">
                          Forgot Password?
                         </a>
                        
                          
                      </div>
                  </div>
                  <div class="container-login100-form-btn">
                         <input class="login100-form-btn" type="submit" value="Login" name="submit">

                  </div>

            </form>
            <div class="col-md-12 text-center my-3">
                 <span>New User <a href="#" class="txt1 text-center">
                  Register Now
                 </a></span>
            </div>

           
        </div>
    </div>
</div>

<script src="<?php echo base_url(); ?>asset/login_asset/js/jquery-3.2.1.min.js"></script>
<script src="<?php echo base_url(); ?>asset/login_asset/js/animsition.min.js"></script>
<script src="<?php echo base_url(); ?>asset/login_asset/js/popper.js"></script>
<script src="<?php echo base_url(); ?>asset/login_asset/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>asset/login_asset/js/select2.min.js"></script>
<script src="<?php echo base_url(); ?>asset/login_asset/js/moment.min.js"></script>
<script src="<?php echo base_url(); ?>asset/login_asset/js/daterangepicker.js"></script>
<script src="<?php echo base_url(); ?>asset/login_asset/js/countdowntime.js"></script>
<script src="<?php echo base_url(); ?>asset/login_asset/js/main.js"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');
  </script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/v652eace1692a40cfa3763df669d7439c1639079717194" integrity="sha512-Gi7xpJR8tSkrpF7aordPZQlW2DLtzUlZcumS8dMQjwDHEnw9I7ZLyiOj/6tZStRBGtGgN6ceN6cMH8z7etPGlw==" data-cf-beacon='{"rayId":"73eb9617992c33b4","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2022.8.0","si":100}' crossorigin="anonymous"></script>
</body>
</html>


