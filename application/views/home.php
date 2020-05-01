


<!--testimonial start-->
<div class="banner"> 
   <?php $this->load->view('partials/flash'); ?>
  <!--Leftside start-->
  <div class="AfterBeforeImageDiv"> 
    <!--BeforeImage start-->
    <div class="BeforeImageSlider">
      <div id="BeforeImage" class="carousel slide HomeSlide" data-ride="carousel" data-interval="false">
        <div class="carousel-inner">
        <?php $loop = 0; foreach ($slider_categories as $category) : ?>
          <div class="item <?php if($loop == 0) { echo "active";} ?>" style="background:url(<?php echo  base_url('/images/categories/'.$category->cover_image);?>) no-repeat left top; background-size:cover;"></div>
        <?php $loop++; endforeach ?>
        </div>
      </div>
    </div>
    <!--BeforeImage end--> 
  </div>
  <!--Leftside end--> 
  
  <!--Rightside start-->
  <div class="PeopleSpeak">
    <div id="PeopleSays" class="carousel slide HomeSlide" data-ride="carousel" data-interval="false">
      <div class="carousel-inner">
        <?php $loop = 0; foreach ($slider_categories as $category) : ?>
        <div class="item <?php if($loop == 0) { echo "active";} ?>">
          <div class="InrMostTxtWpr">
            <h1><?php echo xss_clean($category->name); ?></h1>
            <?php echo substr(xss_clean($category->description),0,500); ?>
            <h3>from € <?php echo xss_clean($category->min_price); ?></h3>
            <a class="ToOfr" href="<?php echo base_url('shop/category/'.$category->slug);  ?>">To Offer</a> </div>
        </div>
        <?php $loop++; endforeach ?>
        <!-- <div class="item">
          <div class="InrMostTxtWpr">
            <h1>Blinds</h1>
            <p>You can choose between wood and aluminum for blinds. The classic privacy and light protection has a very different optical effect depending on the material, color and size of the slats.</p>
            <p>Let our tailor-made blinds for your home convince you.</p>
            <h3>from € 29.00</h3>
            <a class="ToOfr" href="#">To Offer</a> </div>
        </div>
        <div class="item">
          <div class="InrMostTxtWpr">
            <h1>Blinds</h1>
            <p>You can choose between wood and aluminum for blinds. The classic privacy and light protection has a very different optical effect depending on the material, color and size of the slats.</p>
            <p>Let our tailor-made blinds for your home convince you.</p>
            <h3>from € 29.00</h3>
            <a class="ToOfr" href="#">To Offer</a> </div>
        </div> -->
      </div>
      <a class="left carousel-control" href=".HomeSlide" role="button" data-slide="prev"><img src="<?php echo base_url('assets/html/images/prev-arrow2.png')?>" alt=""/></a> <a class="right carousel-control" href=".HomeSlide" role="button" data-slide="next"><img src="<?php echo base_url('assets/html/images/next-arrow2.png')?>" alt=""/></a> </div>
  </div>
  <!--Rightside end--> 
</div>
<!--testimonial end--> 


<!--WelcomeDiv start-->
<div class="WelcomeDiv">
  <div class="container">
    <div class="Wrapper">
    <?php echo $welcome_page->description; ?>
    </div>
  </div>
</div>
<!--WelcomeDiv end--> 


<!--Popular Category Start-->
<div class="PopularCat">
  <div class="container-fluid">
    <h1>Our Popular Categories</h1>
    <div id="PopularCatList" class="owl-carousel owl-theme PopularCatCarousel">

      <?php foreach ($categories as $category) : ?>
      <a href="<?php echo base_url('shop/'.$category->slug);  ?>"><div class="item" style="background:url(<?php echo  base_url('/images/categories/'.$category->cover_image);?>) no-repeat left top; background-size:cover;">
        <div class="textDiv">
          <h2><?php echo xss_clean($category->name); ?></h2>
          <!-- <p>From € 29.00</p> -->
        </div>
      </div></a>
      <?php endforeach ?>


    </div>
  </div>
</div>
<!--Popular Category End--> 


<!--SamplePrdt Start-->
<div class="SamplePrdt">
  <div class="container">
    <div class="Wrapper">


      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="imgHldr"><img src="<?php echo  base_url('/images/categories/'.$page1->cover_image);?>" alt=""/></div>
        <div class="txtHldr">
          <h2><?php echo $page1->name; ?></h2>
          <p><?php echo substr(strip_tags($page1->description), 0 ,125);
          //echo $page1->description;  ?></p>
          <a href="<?php echo base_url('page/underneath'); ?>" class="lrnMore">Learn More</a> </div>
      </div>


      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="imgHldr"><img src="<?php echo  base_url('/images/categories/'.$page2->cover_image);?>" alt=""/></div>
        <div class="txtHldr">
          <h2><?php echo $page2->name; ?></h2>
          <p><?php echo substr(strip_tags($page2->description), 0 ,125);
          //echo $page1->description;  ?></p>
          <a href="<?php echo base_url('page/favorite-slats'); ?>" class="lrnMore">Learn More</a> </div>
      </div>


      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="imgHldr"><img src="<?php echo  base_url('/images/categories/'.$page3->cover_image);?>" alt=""/></div>
        <div class="txtHldr">
         <h2><?php echo $page3->name; ?></h2>
          <p><?php echo substr(strip_tags($page3->description), 0 ,125);
          //echo $page1->description;  ?></p>
          <a href="<?php echo base_url('page/decide'); ?>" class="lrnMore">Learn More</a> </div>
      </div>


      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="imgHldr"><img src="<?php echo  base_url('/images/categories/'.$page4->cover_image);?>" alt=""/></div>
        <div class="txtHldr">
          <h2><?php echo $page4->name; ?></h2>
          <p><?php echo substr(strip_tags($page4->description), 0 ,125);
          //echo $page1->description;  ?></p>
          <a href="<?php echo base_url('page/upgrade'); ?>" class="lrnMore">Learn More</a> </div>
      </div>


    </div>
  </div>
</div>
<!--SamplePrdt End--> 

<!--RecommendedPrdts start-->
<div class="RecommendedPrdts">
  <div class="container">
    <h1>Our Recommendations Products</h1>
    <div id="RecommendedPrdtsLists" class="owl-carousel owl-theme PrdtCarousel">
        
        <?php foreach ($products as $key => $product) { ?>
      <div class="item">
        <div class="ImgHldrWrapper">
          <div class="imgDiv">
            <a href="<?php echo base_url("index.php/product/$product->slug"); ?>">
              <img src="<?php echo  xss_clean(base_url('images/products/'.$product->cover_image)); ?>" alt="" />
            </a>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="textDiv">
          <p><a href="<?php echo base_url("index.php/product/$product->slug"); ?>"><?php echo $product->name ?></a></p>
          <h3>From € <?php echo number_format($product->price); ?></h3>
        </div>
      </div>
      <?php  } ?>
     
      
    </div>
  </div>
</div>
<!--RecommendedPrdts end--> 








<section class="slide1">
		<div class="wrap-slick1">
			<div class="slick1">

				<?php foreach ($slider_images as $slider_image) { ?>
				<div class="item-slick1 item1-slick1" style="background-image: url(<?php echo base_url('images/slider/'.$slider_image->path) ?>);">
					<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="fadeInDown">
							<?php echo xss_clean($slider_image->sub_title) ?>
						</span>

						<h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="fadeInUp">
							<?php echo xss_clean($slider_image->title) ?>
						</h2>

						<div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="zoomIn">
							<!-- Button -->
							<a href="product.html" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
								Shop Now
							</a>
						</div>
					</div>
				</div>

				<?php } ?>

			</div>
		</div>
	</section>

