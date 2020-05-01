<!DOCTYPE html>
<html lang="en">
<head>
    <title>JalousieScout</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="JalousieScout">
    <meta name="author" content="JalousieScout">


    <link href="<?php echo base_url('assets/html/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/html/css/font-awesome.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets/html/css/flexnav.css') ?>" media="screen, projection" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets/html/css/owl.carousel.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/html/css/owl.theme.css') ?>" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/html/css/style.css') ?>">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/html/css/responsive.css') ?>">



    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="<?php echo base_url('images/icons/favicon.png') ?>"/>
    <!--===============================================================================================-->
    <!-- <link rel="stylesheet" href="<?php //echo base_url('assets/libs/bootstrap/dist/css/bootstrap.min.css') ?>"> -->
    <!--===============================================================================================-->
    <!-- <link rel="stylesheet" href="<?php //echo base_url('assets/libs/font-awesome/css/font-awesome.min.css') ?>"> -->
    <!--===============================================================================================-->
    <!-- <link rel="stylesheet" type="text/css" href="<?php //cho base_url('assets/fonts/themify/themify-icons.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php //echo base_url('assets/fonts/elegant-font/html-css/style.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php //echo base_url('assets/libs/animsition/css/animsition.min.css')?>">
    <link rel="stylesheet" type="text/css" href="<?php //echo base_url()?>assets/libs/slick/slick.css"> -->

    <!--===============================================================================================-->
    <!-- <link rel="stylesheet" type="text/css" href="<?php //echo base_url('assets/libs/select2/select2.min.css') ?>"> -->
    <!--===============================================================================================-->
   <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/util.min.css') ?>">
     <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/main.css') ?>">  
    <!-- jQuery 3 -->
    <script src="<?php echo base_url('assets/libs/jquery/dist/jquery.min.js') ?>"></script>
   <!--  
    <script src="<?php //echo base_url('assets/libs/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
    <script type="text/javascript" src="<?php //echo base_url('assets/libs/select2/select2.min.js') ?>"></script> -->

    <!--===============================================================================================-->
</head>
<body>

<!-- header start -->
<div class="navbar navbar-fixed-top">
  <div class="TopNav">
    <div class="container">
      <p><?php echo strip_tags($page5->name); ?> : <?php echo strip_tags($page5->description); ?></p>
    </div>
  </div>
  <div class="navbar-wrapper">
    <div class="container">
      <div class="navbar-header">
        <div class="logo">
            <a href="<?php echo base_url() ?>" class="logo">
                <img src="<?php echo base_url('assets/html/images/logo.jpg')?>" alt="CI_Shop">
            </a>
        </div>
      </div>
     <!--  <button class="menu-button navbar-toggle btn" data-target="" data-toggle="" type="button"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button> -->
      <ul class="CartNdFav">
      
        <li> <a id="SrchPrdt" href="javascript:void(0);"><img src="<?php echo base_url('assets/html/images/searchIcon.png')?>" alt=""/></a>
          <div class="Srchdiv">
            <?php echo form_open('search',array('method'=>'GET','id'=>'filters_form4'))?>
              <input name="search_str" type="text" placeholder="Enter Here" value="<?php echo $this->input->get('search_str'); ?>">
              <input type="submit" value="">
            <?php echo  form_close() ?>
          </div>
        </li>
        <?php if($this->session->userdata('logged_in')) :?>
        <li><a href="<?php echo base_url('profile') ?>"><img src="<?php echo base_url('assets/html/images/user.png')?>" alt=""/></a></li>
        <?php else: ?>
        <li><a href="<?php echo base_url('customer-login') ?>"><img src="<?php echo base_url('assets/html/images/user.png')?>" alt=""/></a></li>
        <?php endif; ?>
       <!--  <li><a href="#"><img src="<?php //echo base_url('assets/html/images/favouriteIcon.png')?>" alt=""/><span>10</span></a></li> -->
        <li><a href="<?php echo base_url('cart') ?>"><img src="<?php echo base_url('assets/html/images/basketIcon.png')?>" alt=""/><span><?php echo $this->cart->total_items() ?></span></a></li>
        <li>€ <?php echo number_format($this->cart->total()); ?></li>
      </ul>
      <div class="collapse navbar-collapse menuPnl">
        <ul class="nav nav-ul">
          <?php foreach ($categoriesMenu as $category) : ?>
          <li class="dropdown"><a href="<?php echo base_url('shop/'.$category['slug']);  ?>"><?php echo xss_clean($category['name']); ?></a>
            <div class="dropdown-menu">
              <div class="container">
                <div class="LrgeMenuWraper">
                  <div class="menuHldr">
                    <h3><?php echo xss_clean($category['name']); ?></h3>
                    <ul class="DrpMenu">
                      <?php foreach ($category['child'] as $child) : ?>
                      <li><a href="<?php echo base_url('shop/category/'.$child['slug']) ?>"><?php echo xss_clean($child['name']); ?></a></li>
                      <?php endforeach  ?>
                    </ul>
                  </div>
                  <div class="ImgHldr"> <img src="<?php echo  base_url('/images/categories/'.$category['cover_image']);?>" alt="<?php echo xss_clean($category['name']); ?>"/> </div>
                </div>
              </div>
            </div>
          </li>
          <?php endforeach ?>
         
          <!-- <li><a href="#">Awning</a></li>
          

          <li><a class="menu-button" href="javascript:void(0);">More</a></li> -->
        </ul>
      </div>
    </div>
  </div>
</div>
<!-- header end --> 

<!--mobile menu-->
<nav class="MainMenuStructure"> 
  <!--<a id="MenuActiveBtn" href="javascript:void(0);"><img src="images/crossIcon.jpg" alt=""/></a>-->
  <ul data-breakpoint="992" class="flexnav">
    <li><a id="MenuActiveBtn" href="javascript:void(0);"><img src="<?php echo base_url('assets/html/images/crossIcon.jpg')?>" alt=""/></a></li>
    <li><a href="#">Pleated</a>
      <ul>
        <li><a href="#">Custom-made pleated blinds</a></li>
        <li><a href="#">Standard size pleated blinds</a></li>
        <li><a href="#">Pleated blinds without drilling</a></li>
        <li><a href="#">Verdunkelungsplissees</a></li>
        <li><a href="#">Pleated blinds</a></li>
        <li><a href="#">Custom made pleated</a></li>
        <li><a href="#">Doppelplissees</a></li>
        <li><a href="#">Pleated accessories & spare parts</a></li>
      </ul>
    </li>
    <li><a href="#">Rolls</a>
      <ul>
        <li><a href="#">Standard size blinds</a></li>
        <li><a href="#">Made-to-measure roller blinds</a></li>
        <li><a href="#">Blinds without drilling</a></li>
        <li><a href="#">Blackout blinds</a></li>
        <li><a href="#">Roman blinds</a></li>
        <li><a href="#">Double blind</a></li>
        <li><a href="#">Blinds for roof windows</a></li>
        <li><a href="#">Bamboo blinds</a></li>
        <li><a href="#">External roller blinds vertical awnings</a></li>
        <li><a href="#">Roller blind accessories & spare parts</a></li>
      </ul>
    </li>
    <li><a href="#">Blinds</a></li>
    <li><a href="#">Curtains & Drapes</a></li>
    <li><a href="#">Insect Repellent</a></li>
    <li><a href="#">Awnings</a></li>
    <li><a href="#">Privacy</a></li>
    <li><a href="#">Parasols</a></li>
    <li><a href="#">Awning</a></li>
    <li><a href="#">Pavilions & Tents</a></li>
    <li><a href="#">Covers</a></li>
    <li><a href="#">Grills</a></li>
    <li><a href="#">Shutters</a></li>
    <li><a href="#">Rolladenmotor</a></li>
    <li><a href="#">Gurtwickler</a></li>
    <li><a href="#">Timers</a></li>
    <li><a href="#">Electronics & radio</a></li>
    <li><a href="#">Garage</a></li>
    <li><a href="#">Brands</a></li>
    <li><a href="#">Deals %</a></li>
  </ul>
</nav>
<!--mobile menu--> 

<!--banner start--> 
<!--banner end-->    






