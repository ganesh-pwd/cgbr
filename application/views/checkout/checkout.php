<div class="Cart-Part">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item"><a href="cart.html">shopping cart</a></li>
            <li class="breadcrumb-item active" aria-current="page">BIlling Address</li>
          </ol>
        </nav>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="last-list">
          <ul class="nav nav-pills">
            <li class="active"><a data-toggle="pill" href="#home" class="act">Address</a></li>
            <li><a href="#">Payment</a></li> 
          </ul>
        </div>
      </div>
      <div class="tab-content">
        <div id="home" class="tab-pane fade in active">
          <h2>Billing Address</h2>

          <?php
           echo form_open(base_url('index.php/cart/checkout')) ?>
          <div class="col-lg-8">


            <div class="CartBox">
              <div class="row">
                <div class="login-part-full-box">
                  <div class="col-md-6">
                    <div class="login-part-lft">
                      <div class="form-group has-feedback<?php echo (form_error('billing_first_name')) ? ' has-error' : ''; ?>">
                        <label for="usr">First Name *</label>
                        <input type="text" name="billing_first_name" class="form-control" placeholder="">
                        <?php echo form_error('billing_first_name', '<span class="help-block">', '</span>') ?>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="login-part-lft">
                      <div class="form-group has-feedback<?php echo (form_error('billing_last_name')) ? ' has-error' : ''; ?>">
                        <label for="usr">Last Nmae *</label>
                        <input type="text" name="billing_last_name" class="form-control" placeholder="">
                        <?php echo form_error('billing_last_name', '<span class="help-block">', '</span>') ?>

                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="login-part-lft">
                      <div class="form-group has-feedback<?php echo (form_error('billing_company')) ? ' has-error' : ''; ?>">
                        <label for="usr">Company Name *</label>
                        <input type="text" name="billing_company"  class="form-control" placeholder="">
                        <?php echo form_error('billing_company', '<span class="help-block">', '</span>') ?>

                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="login-part-lft">
                      <div class="form-group has-feedback<?php echo (form_error('billing_country')) ? ' has-error' : ''; ?>">
                        <label for="usr">Country *</label>
                        <input type="text" class="form-control" name="billing_country" placeholder="">
                        <?php echo form_error('billing_country', '<span class="help-block">', '</span>') ?>

                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="login-part-lft">
                      <div class="form-group has-feedback<?php echo (form_error('billing_street_addr_1')) ? ' has-error' : ''; ?>">
                        <label for="usr">Street Address *</label>
                        <input type="text" name="billing_street_addr_1"  class="form-control" placeholder="House number and street name" >
                        <input type="text" name="billing_street_addr_2"  class="form-control" placeholder="Apartment,suite,unit etc.(optional)" >
                        <?php echo form_error('billing_street_addr_1', '<span class="help-block">', '</span>') ?>

                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="login-part-lft">
                      <div class="form-group has-feedback<?php echo (form_error('billing_city')) ? ' has-error' : ''; ?>">
                        <label for="usr">Town/City *</label>
                        <input type="text" class="form-control" name="billing_city" placeholder="">
                        <?php echo form_error('billing_city', '<span class="help-block">', '</span>') ?>

                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="login-part-lft">
                      <div class="form-group has-feedback<?php echo (form_error('billing_state')) ? ' has-error' : ''; ?>">
                        <label for="usr">State *</label>
                         <input type="text" class="form-control" name="billing_state" placeholder="">
                        <?php echo form_error('billing_state', '<span class="help-block">', '</span>') ?>

                        <!-- <div class="select-style">
                          <select name="billing_address[state]"  >
                            <option value="SHORT">State</option>
                          </select>
                        </div> -->
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="login-part-lft">
                      <div class="form-group has-feedback<?php echo (form_error('billing_zip')) ? ' has-error' : ''; ?>">
                        <label for="usr">Zip *</label>
                        <input type="text" class="form-control" name="billing_zip"  placeholder="">
                        <?php echo form_error('billing_zip', '<span class="help-block">', '</span>') ?>

                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="login-part-lft">
                      <div class="form-group has-feedback<?php echo (form_error('billing_phone')) ? ' has-error' : ''; ?>">
                        <label for="usr">Phone *</label>
                        <input type="text" class="form-control" name="billing_phone"  placeholder="">
                        <?php echo form_error('billing_phone', '<span class="help-block">', '</span>') ?>

                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="login-part-lft">
                      <div class="form-group has-feedback<?php echo (form_error('billing_email')) ? ' has-error' : ''; ?>">
                        <label for="usr">Email Address *</label>
                        <input type="text" name="billing_email" class="form-control" placeholder="">
                        <?php echo form_error('billing_email', '<span class="help-block">', '</span>') ?>

                      </div>
                    </div>
                  </div>
                  
                  <div class="col-md-12">
                    <div class="onclickDiv">
                      <label class="total-new-chackbox" id="chack-click">
                        <input <?php if($diff_address == 1) { echo "checked"; } ?> type="checkbox" name="diff_address" value="1" onclick="myFunction()">
                        <span class="checkmark11"></span> <strong> Ship to a different address? </strong> </label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="click-open" id="myDIV"   style="<?php if($diff_address == 1) { echo "display:block"; } else { echo "display: none"; } ?>">
            
              <div class="login-part-full-box">
                <div class="col-md-6">
                  <div class="login-part-lft">
                    <div class="form-group has-feedback<?php echo (form_error('delivery_first_name')) ? ' has-error' : ''; ?>">
                      <label for="usr">First Name *</label>
                      <input type="text" name="delivery_first_name" class="form-control" placeholder="">
                        <?php echo form_error('delivery_first_name', '<span class="help-block">', '</span>') ?>

                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="login-part-lft">
                    <div class="form-group has-feedback<?php echo (form_error('delivery_last_name')) ? ' has-error' : ''; ?>">
                      <label for="usr">Last Nmae *</label>
                      <input type="text" name="delivery_last_name" class="form-control" placeholder="">
                        <?php echo form_error('delivery_last_name', '<span class="help-block">', '</span>') ?>

                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="login-part-lft">
                    <div class="form-group has-feedback<?php echo (form_error('delivery_company')) ? ' has-error' : ''; ?>">
                      <label for="usr">Company Name *</label>
                      <input type="text" name="delivery_company" class="form-control" placeholder="">
                        <?php echo form_error('delivery_company', '<span class="help-block">', '</span>') ?>

                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="login-part-lft">
                    <div class="form-group has-feedback<?php echo (form_error('delivery_country')) ? ' has-error' : ''; ?>">
                      <label for="usr">Country *</label>
                       <input type="text" class="form-control" name="delivery_country" placeholder="">
                        <?php echo form_error('delivery_country', '<span class="help-block">', '</span>') ?>

                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="login-part-lft">
                    <div class="form-group has-feedback<?php echo (form_error('delivery_street_addr_1')) ? ' has-error' : ''; ?>">
                      <label for="usr">Street Address *</label>
                      <input type="text" name="delivery_street_addr_1" class="form-control" placeholder="House number and street name" id="usr">
                      <input type="text" name="delivery_street_addr_2" class="form-control" placeholder="Apartment,suite,unit etc.(optional)">
                        <?php echo form_error('delivery_street_addr_1', '<span class="help-block">', '</span>') ?>

                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="login-part-lft">
                    <div class="form-group has-feedback<?php echo (form_error('delivery_city')) ? ' has-error' : ''; ?>">
                      <label for="usr">Town/City *</label>
                      <input type="text" name="delivery_city"  class="form-control" placeholder="" >
                        <?php echo form_error('delivery_city', '<span class="help-block">', '</span>') ?>

                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="login-part-lft">
                    <div class="form-group has-feedback<?php echo (form_error('delivery_state')) ? ' has-error' : ''; ?>">
                      <label for="usr">State *</label>
                      <input type="text" class="form-control" name="delivery_state" placeholder="" >
                        <?php echo form_error('delivery_state', '<span class="help-block">', '</span>') ?>

                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="login-part-lft">
                    <div class="form-group has-feedback<?php echo (form_error('delivery_zip')) ? ' has-error' : ''; ?>">
                      <label for="usr">Zip *</label>
                      <input type="text" class="form-control"  name="delivery_zip"  placeholder="">
                        <?php echo form_error('delivery_zip', '<span class="help-block">', '</span>') ?>

                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="login-part-lft">
                    <div class="form-group has-feedback<?php echo (form_error('delivery_phone')) ? ' has-error' : ''; ?>">
                      <label for="usr">Phone *</label>
                      <input type="text" class="form-control"  name="delivery_phone"  placeholder="" >
                        <?php echo form_error('delivery_phone', '<span class="help-block">', '</span>') ?>

                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="login-part-lft">
                    <div class="form-group has-feedback<?php echo (form_error('delivery_email')) ? ' has-error' : ''; ?>">
                      <label for="usr">Email Address *</label>
                      <input type="text" class="form-control"  name="delivery_email"  placeholder="" >
                        <?php echo form_error('delivery_email', '<span class="help-block">', '</span>') ?>

                    </div>
                  </div>
                </div>
                
              </div>
              
          </div>


          <div class="col-md-12"> 

            <button class="btn proceed_btn" style="width:34%;" >Submit</button>


          </div>
            
          </div>

          <?php echo form_close() ?>

          <div class="col-lg-4">
            <div class="CartBox">
              <table class="table">
                <tbody>
                  <tr>
                    <td>Subtotal:</td>
                    <td>€ <?php echo number_format($this->cart->total())." /-"; ?></td>
                  </tr>
                  <!-- <tr>
                    <td>Shipping:</td>
                    <td>€ 4.99</td>
                  </tr> -->
                  <tr>
                    <td>Total: <!-- <em style="margin:10px 0 0;">19.0% VAT included</em> <em>€ 15.17</em> --></td>
                    <td>€ <?php echo number_format($this->cart->total())." /-"; ?></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          
        </div>
        
        <!-- <div id="menu1" class="tab-pane fade">
          <h2>Payment</h2>
          <div class="col-lg-8">
            <div class="CartBox">
              <div class="row">
                <div class="login-part-full-box">
                  <div class="col-md-6">
                    <div class="login-part-lft">
                      <div class="form-group">
                        <label for="usr">Name on Card *</label>
                        <input type="text" class="form-control" placeholder="" id="usr">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="login-part-lft">
                      <div class="form-group">
                        <label for="usr">Card Number *</label>
                        <input type="text" class="form-control" placeholder="" id="usr">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="login-part-lft">
                      <div class="form-group">
                        <label for="usr">Expiry Date *</label>
                        <input type="text" class="form-control" placeholder="" id="usr">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="login-part-lft">
                      <div class="form-group">
                        <label for="usr">CVC *</label>
                        <input type="text" class="form-control" placeholder="" id="usr" style="width:150px;">
                      </div>
                    </div>
                  </div>
                  
                  <div class="col-md-12"> <div class="vpa"> <img src="images/vpa.jpg" alt="img"> </div> </div>
                  
                  <div class="col-md-12"> <a href="summary.html" class="btn proceed_btn">Place your order</a> </div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-lg-4">
            <div class="CartBox">
              <table class="table">
                <tbody>
                  <tr>
                    <td>Subtotal:</td>
                    <td>€ 19.00</td>
                  </tr>
                  <tr>
                    <td>Shipping:</td>
                    <td>€ 4.99</td>
                  </tr>
                  <tr>
                    <td>Total: <em style="margin:10px 0 0;">19.0% VAT included</em> <em>€ 15.17</em></td>
                    <td>€ 23.99</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          
          
        </div> -->
        
        
      </div>
    </div>
  </div>
</div>


<script>
function myFunction() {
  var x = document.getElementById("myDIV");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script> 




<!-- Cart -->
  <section style="display: none;" class="cart bgwhite p-t-70 p-b-100">
    <div class="container">
            <?php $this->load->view('partials/flash'); ?>
      <!-- Cart item -->
            <?php echo form_open('cart/update'); ?>
      <div class="container-table-cart pos-relative">
        <div class="wrap-table-shopping-cart bgwhite">
          <table class="table-shopping-cart">
            <tr class="table-head">
              <th class="column-1"></th>
              <th class="column-2"></th>
              <th class="column-3">Price</th>
              <th class="column-4">Quantity</th>
              <th class="column-5">Total</th>
            </tr>
                        <?php
                        $i = 0;
                        foreach ($cart as $item) : ?>

            <tr class="table-row">
              <td class="column-1">
                <div class="cart-img-product b-rad-4 o-f-hidden">
                  <img src="<?php echo (isset($item['options']['product_image'])) ? base_url('images/products/') .$item['options']['product_image']: "";  ?>" alt="IMG-PRODUCT">
                </div>
              </td>
              <td class="column-2"><?php echo $item['name']; ?>
                <?php  echo "<br/>"; if($item['options']['attributes'] != ''){
                foreach ($item['options']['attributes'] as $key => $value) {

                  $label = str_replace('_', ' ', $key);
                  $label = strtoupper($label);

                  echo "<label>".$label."</label>";
                  echo " <span>".$value."</span></br>";
                } }

                ?>
              </td>
              <td class="column-3">€ <?php echo $item['price']; ?></td>
              <td class="column-4">
                                   <?php echo $item['qty'] ?>

              </td>
              <td class="column-5">€ <?php echo $item['subtotal']; ?></td>
            </tr>
                        <?php
                            $i++;
                        endforeach; ?>
          </table>
        </div>
      </div>
            <?php echo form_close() ?>

      <!-- Total -->
      <div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
        <h5 class="m-text20 p-b-24">
          Order
        </h5>
                <?php echo validation_errors(); ?>

        <!--  -->
        <div class="flex-w flex-sb-m p-b-12">
          <span class="s-text18 w-size19 w-full-sm">
            Subtotal:
          </span>

          <span class="m-text21 w-size20 w-full-sm">
            € <?php echo number_format($this->cart->total())." /-"; ?>
          </span>
        </div>
        <!--  -->
                <?php echo form_open(base_url('index.php/place-order')) ?>
        <div class="flex-w flex-sb-m p-t-26 p-b-30">
          <span class="m-text22 w-size19 w-full-sm">
            Total:
          </span>

          <span class="m-text21 w-size20 w-full-sm">
            € <?php echo number_format($this->cart->total())." /-"; ?>
          </span>
        </div>

                <div class="flex-w flex-sb-m p-t-26 p-b-30">
          <span class="m-text22 w-size19 w-full-sm">
            Delivery Address:
          </span>

                    <span class="m-text21 w-size20 w-full-sm effect1 w-size9">
                         <?php echo form_input('delivery_address',set_value('delivery_address'),array("required"=>"required")) ?>
                        <span class="effect1-line"></span>
          </span>
                </div>

                <div class="flex-w flex-sb-m p-t-26 p-b-30">
          <span class="m-text22 w-size19 w-full-sm">
            Pincode :
          </span>

                    <span class="m-text21 w-size20 w-full-sm effect1 w-size9">
                         <?php echo form_input('pincode',set_value('pincode'),array("class"=>"s-text7 w-full","required"=>"required")) ?>
                        <span class="effect1-line"></span>
          </span>
                </div>

        <div class="size15 trans-0-4">
          <!-- Button -->
          <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
            Place Order
          </button>
        </div>
                <?php echo form_close() ?>
            </div>
      </div>

  </section>
