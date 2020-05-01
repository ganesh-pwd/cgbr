<div class="Cart-Part">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">My Account</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
          </ol>
        </nav>
        <h2>My Account</h2>
      </div>
    </div>
    <div class="row">
     <?php $this->load->view("profile/sidebar"); ?>
      <div class="col-lg-9 col-sm-12 col-md-9 col-xs-12">
        <div class="orderBox">
          <div class="row">
            <div class="login-part-full-box">
              <div class="col-md-12">
                <div class="login-part-lft">
                  <h4>My Order History</h4>
                </div>
                <div class="orderList myOrd">
                  <ul class="orderListUl">

                    <?php foreach ($order_products as $order_product) :?>
                    <li>
                      <div class="row">
                      <div class="col-lg-2 col-xs-12"> <img src="<?php echo base_url('images/products/').thumbImage($order_product->product_img)?>"> </div>
                        <div class="col-lg-8 col-xs-12 p0">
                          <h5><?php echo $order_product->product_name;?></h5>
                          <h4>€ <?php echo $order_product->total;?> <a href="#" class="detailsHo">details</a></h4>
                          <div class="orDe"> <span>
                            <label>Subtotal:</label>
                            € 19.00</span> <span>
                            <label>Subtotal:</label>
                            € 19.00</span> <span class="green">
                            <label>Total:</label>
                            € 23.99</span> <span>
                            <p>19.0% VAT included
                              € 15.17</p>
                            </span> </div>


                         
                          <ul>
                            <?php  
                              if($order_product->attributes != ''){ 
                              $attributes = unserialize($order_product->attributes);
                              if(count($attributes) > 0){ 
                              foreach ($attributes as $key => $value) {
                                $label = str_replace('_', ' ', $key);
                                $label = strtoupper($label);
                            ?>        
                            <li>
                              <label><?php echo $label; ?>:</label>
                              <?php echo $value; ?></li>
                            <?php } } } ?>  
                            
                          </ul>


                        </div>
                        <div class="col-lg-3 col-xs-12">
                          <?php if($order_product->status == 1){
                           echo '<h3 class="Delivered"><i class="fa fa-check-circle"></i> Delivered</h3>';
                          } else { ?>
                          <h3 class="yellow"><i class="fa fa-check-circle"></i> Refund Completed</h3>
                          <h3 class="cancelled"><i class="fa fa-times-circle-o"></i> Cancelled</h3>
                          <h3 class="processing">Processing .. </h3>
                        <?php } ?>
                        </div>
                      </div>
                    </li>
                    <?php endforeach; ?>
                    
                    
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>