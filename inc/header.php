<?php 
 include 'lib/session.php';
     Session::init();
 ?>
<?php

include_once 'lib/database.php';
include_once 'helper/format.php';

	spl_autoload_register(function($class){
		include_once "classes/".$class.".php";
	});
           $db = new Database();
			$fm = new Format();
                  $bs= new  bacsi();
                  $gk= new goikham();
                  $ctgk = new chitietgk();
			
?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Phòng khám nhi khoa Nancy</title>

  
  <!-- mobile responsive meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  
  <!-- Slick Carousel -->
  <link rel="stylesheet" href="plugins/slick/slick.css">
  <link rel="stylesheet" href="plugins/slick/slick-theme.css">
  <!-- FancyBox -->
  <link rel="stylesheet" href="plugins/fancybox/jquery.fancybox.min.css">
  
  <!-- Stylesheets -->
  <link href="css/style.css" rel="stylesheet">
  
  <!--Favicon-->
  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
  <link rel="icon" href="images/favicon.ico" type="image/x-icon">

</head>


<body>
  <div class="page-wrapper">
    <!-- Preloader -->
    <!-- <div class="preloader"></div> -->
    <!-- Preloader -->

  

<!--header top-->
<div class="header-top">
      <div class="container clearfix">
            <div class="top-left">
                <div class="logo">
                    <figure>
                          <a href="index.php">
                            <h1>  <span>PHÒNG KHÁM NHI NANCY </span></h1>
                                <!-- <img src="images\img\logo_nancy.png" alt="" width="200"> -->
                          </a>
                    </figure>
              </div>

                  <!-- <h6>Opening Hours :Tuesday to Sunday - 8am to 10pm</h6> -->
            </div>
            <div class="top-right">
                <h4>Opening Hours :Tuesday to Sunday - 8am to 10pm</h4>
                  <!-- <ul class="social-links">
                        <li>
                              <a href="#">
                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                              </a>
                        </li>
                        <li>
                              <a href="#">
                                    <i class="fa fa-twitter" aria-hidden="true"></i>
                              </a>
                        </li>
                        <li>
                              <a href="#">
                                    <i class="fa fa-google-plus" aria-hidden="true"></i>
                              </a>
                        </li>
                        <li>
                              <a href="#">
                                    <i class="fa fa-instagram" aria-hidden="true"></i>
                              </a>
                        </li>
                        <li>
                              <a href="#">
                                    <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                              </a>
                        </li>
                  </ul> -->
            </div>
      </div>
</div>
<!--header top-->

<!--Header Upper-->
<section class="header-uper">
      <div class="container clearfix">
            <!-- <div class="logo">
                  <figure>
                        <a href="index.html">
                          <h1>  <span>PHÒNG KHÁM NHI NANCY </span></h1>
                              !-- <img src="images\img\logo_nancy.png" alt="" width="200"> --
                        </a>
                  </figure>
            </div> -->
            <div class="right-side">
                  <ul class="contact-info">
                        <li class="item">
                              <div class="icon-box">
                                    <i class="fa fa-map-marker"></i>
                              </div>
                              <strong>Address</strong>
                              <br>
                              <span>615A Trần Hưng Đạo, Q. 5, TP. Hồ Chí Minh</span>
                        </li>

                        <li class="item">
                              <div class="icon-box">
                                    <i class="fa fa-envelope-o"></i>
                              </div>
                              <strong>Email</strong>
                              <br>
                              <a href="#">
                                    <span>nhikhoanancy@yahoo.com</span>
                              </a>
                        </li>
                        <li class="item">
                              <div class="icon-box">
                                    <i class="fa fa-phone"></i>
                              </div>
                              <strong>Call Now</strong>
                              <br>
                              <span>(028) 3838 2155</span>
                        </li>
                  </ul>
                  <!-- <div class="link-btn">
                        <a href="#" class="btn-style-one">Appoinment</a>
                  </div> -->
            </div>
      </div>
</section>
<!--Header Upper-->