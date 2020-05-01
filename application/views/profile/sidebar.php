
<div class="col-lg-3 col-sm-12 col-md-3 col-xs-12">
    <div class="account_sidebar">
     <ul>

      <li><a href="<?php echo base_url('index.php/profile/') ?>" class="s-text13<?php echo ($this->uri->segment(2) == "")? " act":"";  ?>" class="act"><img src="<?php echo base_url()?>/assets/html/images/ac1a.png" alt=""> Edit Profile</a></li>

      <li><a href="<?php echo base_url('index.php/profile/my-orders') ?>" class="s-text13<?php echo ($this->uri->segment(2) == "my-orders")? " act":"";  ?>"><img src="<?php echo base_url()?>/assets/html/images/ac2.png" alt=""> My Orders</a></li>

      <li><a href="<?php echo base_url('index.php/profile/my-wishlist') ?>" class="s-text13<?php echo ($this->uri->segment(2) == "my-wishlist")? " act":"";  ?>" ><img src="<?php echo base_url()?>/assets/html/images/ac3.png" alt=""> My Wishlist</a></li>

      <!-- <li><a href="my-address.html"><img src="images/ac3.png" alt=""> My Address Book</a></li>

      <li><a href="my-newsletter.html"><img src="images/ac4.png" alt=""> My Newsletter</a></li>

      <li><a href="saved-shopping-carts.html"><img src="images/ac5.png" alt=""> Saved shopping carts</a></li> -->

      <li><a href="<?php echo base_url('customer-logout')?>"><img src="<?php echo base_url()?>/assets/html/images/ac6.png" alt=""> Logout</a></li>

     </ul>
    
    </div>
    
    
    </div>
