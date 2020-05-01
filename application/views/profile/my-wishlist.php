<div class="Cart-Part">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">wishlist</li>
          </ol>
        </nav>
        <h2>Wishlist</h2>
      </div>
    </div>
    <div class="row">
      <?php $this->load->view('admin/partials/flash'); ?>
      <div class="col-lg-12">
      <div class="wishlistDiv">
       <ul>
       
        <?php foreach ($user_wishlist as $wishlist) : ?>
        <li>
          <div class="lft_img">
             <a href="<?php echo base_url('index.php/product/'.$wishlist->slug) ?>"><img src="<?php echo base_url('images/products/').thumbImage($wishlist->cover_image)?>" alt=""/></a>
          </div>
          <div class="wishlist_name">
            <a href="<?php echo base_url('index.php/product/'.$wishlist->slug) ?>"><h4><?php echo $wishlist->product_name;?></h4></a>
            <!-- <span class="clrSht"><img src="images/sht.png" alt=""></span> -->
        </div>
         <div class="wishlist_Del">
         <h5>from € <?php echo $wishlist->price;?></h5>
         <button data-wishlist-id="<?php echo $wishlist->wid; ?>" class="btn Del_btn removewishlist"></button>
         </div>
        </li>
        <?php endforeach; ?>



       </ul>
      
      </div>
        
      </div>
    </div>
  </div>
</div>