
<!--Above Footer Start-->
<div class="AboveFtr">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        <div class="IconTxtHldr"><img src="<?php echo base_url('assets/html/images/upperFtrIcon1.png')?>" alt=""/><span>Fast Delivery</span></div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        <div class="IconTxtHldr"><img src="<?php echo base_url('assets/html/images/upperFtrIcon2.png')?>" alt=""/><span>Individual Customization</span></div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        <div class="IconTxtHldr"><img src="<?php echo base_url('assets/html/images/upperFtrIcon3.png')?>" alt=""/><span>Experience Since 1878</span></div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        <div class="IconTxtHldr"><img src="<?php echo base_url('assets/html/images/upperFtrIcon4.png')?>" alt=""/><span>Specialist Quality at Fair Prices</span></div>
      </div>
    </div>
  </div>
</div>
<!--Above Footer End--> 

<!--Footer Start-->
<div class="footer"> 
  <!--upper-footer-->
  <div class="upper-footer">
    <div class="container">
      <div class="row">
        <div class="topUpper">
          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12"> <img class="FtrLogo" src="<?php echo base_url('assets/html/images/footer-logo.jpg')?>" alt=""/>
            <div class="clearfix"></div>
            <p>Monday - Thursday :<br>
              8:00 am - 12:00 pm<br>
              1:00 pm - 5:00 pm</p>
            <p>Friday : 8 am - 2 pm</p>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
            <h4>Popular Categories</h4>
            <ul class="FtrLnk">
              <?php foreach ($categories as $category) : ?>
              <li><a href="<?php echo base_url('shop/'.$category->slug);  ?>"><?php echo xss_clean($category->name); ?></a></li>
              <?php endforeach ?>
            </ul>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <h4>Customer Service</h4>
            <ul class="FtrLnk">
              <li><a href="<?php echo base_url('page/questions/'); ?>">Questions about ordering</a></li>
              <li><a href="<?php echo base_url('page/return/'); ?>">Return</a></li>
              <li><a href="<?php echo base_url('page/shipping/'); ?>">Shipping and delivery</a></li>
              <li><a href="<?php echo base_url('page/vouchers/'); ?>">Vouchers</a></li>
              <li><a href="<?php echo base_url('page/payments/'); ?>">Questions about payment</a></li>
            </ul>
          </div>
          <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
            <h4>Companies</h4>
            <ul class="FtrLnk">
              <li><a href="<?php echo base_url('page/about-us'); ?>">About us</a></li>
              <li><a href="<?php echo base_url('page/press/'); ?>">Press & news</a></li>
              <li><a href="<?php echo base_url('contact-us'); ?>">Contact Us</a></li>
            </ul>
          </div>
        </div>
      </div>
       <div class="row">
        <div class="btmUpper">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> <span>Subscribe to the Newsletter <!-- and save 5 € now --></span>
             <?php $attributes = array('class' => 'EmailSubscribe', 'id' => 'myform');
              echo form_open(base_url('newsletter')  , $attributes) ?>
              <input placeholder="Enter your email address" required type="text" name="email_id"> <button>SUBMIT</button>
             
            </form>
          </div>
        </div>
      </div> 
    </div>
  </div>
  <!--upper-footer--> 
  <!--middle-footer-->
  <div class="MiddleFtr">
    <div class="container">
      <ul class="brands">
        <li><img src="<?php echo base_url('assets/html/images/middleFtrIcon1.jpg')?>" alt=""/></li>
        <li><img src="<?php echo base_url('assets/html/images/middleFtrIcon2.jpg')?>" alt=""/></li>
        <li><img src="<?php echo base_url('assets/html/images/middleFtrIcon3.png')?>" alt=""/></li>
        <li><img src="<?php echo base_url('assets/html/images/middleFtrIcon4.png')?>" alt=""/></li>
        <li><img src="<?php echo base_url('assets/html/images/middleFtrIcon5.png')?>" alt=""/></li>
        <li><img src="<?php echo base_url('assets/html/images/middleFtrIcon6.png')?>" alt=""/></li>
      </ul>
    </div>
  </div>
  <!--middle-footer--> 
  <!--bottom-footer-->
  <div class="BtmFtr">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <p>&copy; Copyright 2019 Schoenberger Germany Enterprises GmbH & Co. KG</p>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <ul class="ftrNav">
            <li><a href="<?php echo base_url('page/terms/'); ?>">Terms and Conditions</a></li>
            <li><a href="<?php echo base_url('page/privacy/'); ?>">Privacy</a></li>
            <li><a href="<?php echo base_url('page/policy/'); ?>">Policy Imprint</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!--bottom-footer--> 
</div>
<!--Footer End--> 

<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/libs/select2/select2.min.css') ?>">


<script src="<?php echo base_url('assets/html/js/jquery-1.11.1.min.js') ?>"></script> 
<script src="<?php echo base_url('assets/html/js/bootstrap.min.js') ?>"></script> 

<script type="text/javascript" src="<?php echo base_url('assets/libs/select2/select2.min.js') ?>"></script>




<script type="text/javascript">
        $(document).ready(function () {
           $('.remove_item').click(function () {

               var remove_item = $(this).data("row-id");

               $("#input_product_id").val(remove_item);
                $("#remove_item_form").submit();
           });
        });
    </script>


<script type="text/javascript">
if ($(window).width() >= 1200) {
    $(window).scroll(function() {
        if($(window).scrollTop() > 100) {
            $('.navbar').css("box-shadow","0 0 10px #666");
            $('.navbar-wrapper').css("padding","15px 0");
            $('.navbar-wrapper .container').css({"width":"100%"});
            $('.TopNav').css({"height":"0","padding":"0"});
            $('.TopNav p').css("font-size","0");
            $('.logo img').css("height","18px");
            $('.navbar-toggle').css("display","block");
            $('.menuPnl').css("display","none");
            $('.nav-ul').css("margin-top","0");
            $('.nav-ul li a').css("line-height","50px");
            $('.DrpMenu li a').css("line-height","23px");
            $('.banner').css("padding-top","50px");
            

        } else {
            $('.navbar').css("box-shadow","none");
            $('.navbar-wrapper').css("padding","40px 0 0 0");
            $('.navbar-wrapper .container').css({"width":"1170px"});
            $('.TopNav').css({"height":"35px","padding":"8px 0"});
            $('.TopNav p').css("font-size","14px");
            $('.logo img').css("height","35px");
            $('.navbar-toggle').css("display","none");
            $('.menuPnl').css("display","block");
            $('.nav-ul').css("margin-top","20px");
            $('.nav-ul li a').css("line-height","75px");
            $('.DrpMenu li a').css("line-height","23px");
            $('.banner').css("padding-top","205px");
            $('.flexnav.with-js').removeClass('flexnav-show');
            $('.menu-button.navbar-toggle').removeClass('active');
                    
        }
    });
    
} else {
    
    if ($(window).width() >= 992) {
    $(window).scroll(function() {
        if($(window).scrollTop() > 100) {
            $('.navbar').css("box-shadow","0 0 10px #666");
            $('.navbar-wrapper').css("padding","15px 0");
            $('.navbar-wrapper .container').css({"width":"100%"});
            $('.TopNav').css({"height":"0","padding":"0"});
            $('.TopNav p').css("font-size","0");
            $('.logo img').css("height","18px");
            $('.banner').css("padding-top","50px");
            

        } else {
            $('.navbar').css("box-shadow","none");
            $('.navbar-wrapper').css("padding","40px 0");
            $('.navbar-wrapper .container').css({"width":"970px"});
            $('.TopNav').css({"height":"35px","padding":"8px 0"});
            $('.TopNav p').css("font-size","14px");
            $('.logo img').css("height","35px");
            $('.banner').css("padding-top","150px");
            $('.flexnav.with-js').removeClass('flexnav-show');
            $('.menu-button.navbar-toggle').removeClass('active');
                    
        }
    });
    
} else {
    
    if ($(window).width() >= 768) {
    $(window).scroll(function() {
        if($(window).scrollTop() > 100) {
            $('.navbar').css("box-shadow","0 0 10px #666");
            $('.navbar-wrapper').css("padding","15px 0");
            $('.navbar-wrapper .container').css({"width":"100%"});
            $('.TopNav').css({"height":"0","padding":"0"});
            $('.TopNav p').css("font-size","0");
            $('.logo img').css("height","18px");
            $('.banner').css("padding-top","50px");
            

        } else {
            $('.navbar').css("box-shadow","none");
            $('.navbar-wrapper').css("padding","40px 0");
            $('.navbar-wrapper .container').css({"width":"750px"});
            $('.TopNav').css({"height":"35px","padding":"8px 0"});
            $('.TopNav p').css("font-size","14px");
            $('.logo img').css("height","35px");
            $('.banner').css("padding-top","150px");
            $('.flexnav.with-js').removeClass('flexnav-show');
            $('.menu-button.navbar-toggle').removeClass('active');
                    
        }
    });
    
} else {
    
    if ($(window).width() < 768) {
    $(window).scroll(function() {
        if($(window).scrollTop() > 100) {
            $('.navbar').css("box-shadow","0 0 10px #666");
            $('.navbar-wrapper').css("padding","8px 0");
            $('.navbar-wrapper .container').css({"width":"100%"});
            $('.TopNav').css({"height":"0","padding":"0"});
            $('.TopNav p').css("font-size","0");
            $('.logo img').css("height","18px");
            $('.banner').css("padding-top","87px");
            

        } else {
            $('.navbar').css("box-shadow","none");
            $('.navbar-wrapper').css("padding","20px 0");
            $('.navbar-wrapper .container').css({"width":"100%"});
            $('.TopNav').css({"height":"35px","padding":"8px 0"});
            $('.TopNav p').css("font-size","14px");
            $('.logo img').css("height","20px");
            $('.banner').css("padding-top","147px");
            //$('.flexnav.with-js').removeClass('flexnav-show');
            //$('.menu-button.navbar-toggle').removeClass('active');
            
                    
        }
    });
    
}
    
    }
    
    }
    
}


</script> 

<!--script for carousel--> 
<script src="<?php echo base_url('assets/html/js/owl-carousel.js') ?>"></script> 
<script>
$('#PopularCatList').owlCarousel({
    autoplay:false,
    autoplayTimeout:5000,
    autoplayHoverPause:true,
    stagePadding: 405,
    loop:true,
    margin:30,
    nav:true,
    navText: [ '<img src="<?php echo base_url('assets/html/images/prev-arrow2.png') ?>" alt=""/>', '<img src="<?php echo base_url('assets/html/images/next-arrow2.png') ?>" alt=""/>' ],
    dots: false,
    responsive:{
        0:{
            items:1,
            stagePadding: 0,
        },
        768:{
            items:1,
            stagePadding: 175,
        },
        992:{
            items:1,
            stagePadding: 200,
        },
        1200:{
            items:1
        }
    }
});


$('#RecommendedPrdtsLists').owlCarousel({
    autoplay:false,
    autoplayHoverPause:false,
    autoplayTimeout:3000,
    loop:true,
    margin:30,
    nav:true,
    navText: [ '<img src="images/prev-arrow2.png" alt=""/>', '<img src="images/next-arrow2.png" alt=""/>' ],
    dots:false,
    responsive:{
        0:{
            items:1,
        },
        768:{
            items:2,
        },
        992:{
            items:3
        }
    }
});
</script> 
<!--script for carousel--> 

<!--script for mobile menu--> 
<script src="<?php echo base_url('assets/html/js/jquery.flexnav.js') ?>" type="text/javascript"></script> 
<script type="text/javascript">
jQuery(document).ready(function($) {
    // initialize FlexNav
    $(".flexnav").flexNav();
});

$('.Srchdiv').hide();
$("#SrchPrdt").click(function(){
    $('.Srchdiv').toggle();
});

$(".nav-ul li a.menu-button").click(function(){
    $(window).scrollTop(120);
    //$('#MenuActiveBtn').css('transform','translateX(0)');
});

$("#MenuActiveBtn").click(function(){
    $('.flexnav.with-js').removeClass('flexnav-show');
    $('.menu-button.navbar-toggle').removeClass('active');
    
});


$(".ddd").on("click", function () {

    var $button = $(this);
    var oldValue = $button.closest('.sp-quantity').find("input.quntity-input").val();

    if ($button.text() == "+") {
        var newVal = parseFloat(oldValue) + 1;
    } else {
        // Don't allow decrementing below zero
        if (oldValue > 0) {
            var newVal = parseFloat(oldValue) - 1;
        } else {
            newVal = 0;
        }
    }

    $button.closest('.sp-quantity').find("input.quntity-input").val(newVal);

});





</script> 



<!--===============================================================================================-->

<!--===============================================================================================-->
<script type="text/javascript" src="<?php echo base_url('assets/libs/animsition/js/animsition.min.js') ?>"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="<?php echo base_url('assets/libs/bootstrap/js/popper.min.js') ?>"></script>



<!--===============================================================================================-->


<!--===============================================================================================-->
<script type="text/javascript" src="<?php echo base_url('assets/libs/slick/slick.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/slick-custom.min.js')?>"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="<?php echo base_url('assets/libs/countdowntime/countdowntime.js') ?>"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="<?php echo base_url('assets/libs/lightbox2/js/lightbox.min.js') ?>"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="<?php echo base_url('assets/libs/sweetalert/sweetalert.min.js') ?>"></script>
<script type="text/javascript">
    $('.block2-btn-addcart').each(function(){
        var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
        $(this).on('click', function(){
            swal(nameProduct, "is added to cart !", "success");
        });
    });

    $('.addwishlist').each(function(){
        var thises = $(this).find('i');
        var nameProduct = $(this).parent().find('h3').text();



            /****** Check Whether Product Added to wishlist ***********/  
            var product_id = $(this).data("product-id");
            var Formdata = {
                product_id : product_id,
            };

            $.ajax({
                url : "<?php echo base_url('index.php/check-to-wishlist'); ?>",
                type : 'post',
                data : Formdata,
                success : function (result) {
                    if(result.status == 1){
                        var classes = thises.removeClass('fa-heart-o');
                        var classes = thises.addClass('fa-heart');
                    }
                },
                error : function (error) {
                    console.log(error);
                   //swal("", error.responseText, "error");
                }
            });
            /****** Check Whether Product Added to wishlist ***********/  
        

        $(this).on('click', function(){
            var product_id = $(this).data("product-id");
            var Formdata = {
                product_id : product_id,
            };

            $.ajax({
                url : "<?php echo base_url('index.php/add-to-wishlist'); ?>",
                type : 'post',
                data : Formdata,
                success : function (result) {
                    if(result.status == 1){
                        swal(nameProduct, "Added to wishlist", "success");
                        var classes = thises.removeClass('fa-heart-o');
                        var classes = thises.addClass('fa-heart');
                    }
                },
                error : function (error) {
                    console.log(error);
                    swal("", error.responseText, "error");
                }
            });
        });
    });


   $('.removewishlist').each(function(){
       
        $(this).on('click', function(){
            var wishlist_id = $(this).data("wishlist-id");
            var Formdata = {
                wishlist_id : wishlist_id,
            };

            $.ajax({
                url : "<?php echo base_url('index.php/delete-to-wishlist'); ?>",
                type : 'post',
                data : Formdata,
                success : function (result) {
                    
                        location.reload();
                    
                },
                error : function (error) {
                    console.log(error);
                    
                }
            });

        });

    });





</script>
<script type="text/javascript">
    $(".selection-1").select2({
        minimumResultsForSearch: 20,
        dropdownParent: $('#dropDownSelect1')
    });
</script>
<script src="<?php echo base_url('assets/js/main.min.js') ?>"></script>
</body>
</html>