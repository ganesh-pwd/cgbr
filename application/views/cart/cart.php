<div class="Cart-Part">
  <div class="container">
  	<?php $this->load->view('partials/flash'); ?>
    <div class="row">
      <div class="col-lg-12">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">shopping cart</li>
          </ol>
        </nav>
        <h2>Shopping Cart</h2>
      </div>
      <div class="col-lg-12">
        <div class="CartBox">

          <?php $count = count($cart);

          if($count > 0){

          

           echo form_open('cart/update'); ?>

            <?php 
            	$i = 0;
                foreach ($cart as $item) : 
            ?>

          <div class="row">

            <div class="col-lg-2 text-center"> <a href="<?php echo base_url(); ?>/product/<?php echo $item['slug']; ?>"> <img src="<?php echo (isset($item['options']['product_image'])) ? base_url('images/products/') .thumbImage($item['options']['product_image']) : "";  ?>" alt="IMG-PRODUCT"> </a> </div>
            <div class="col-lg-7 col-sm-9">
              <h3><a href="<?php echo base_url(); ?>/product/<?php echo $item['slug']; ?>"><?php echo $item['name']; ?></a></h3>
              <h4>€ <?php echo $item['price']; ?></h4>
              <ul>
                 <?php  if($item['options']['attributes'] != '') { foreach ($item['options']['attributes'] as $key => $value) {
                  $label = str_replace('_', ' ', $key);
				          $label = strtoupper($label); ?>
                <li>
                  <label><?php echo  $label; ?>:</label>
                  <?php echo $value; ?></li>
                  <?php  } } ?>

              </ul>
            </div>
            <div class="col-lg-3 col-sm-3">
              <div class="sleDiv">
              	<input class="" type="hidden" name="<?php echo "cart[$i][rowid]" ?>" value="<?php echo $item['rowid']; ?>">
                <div class="sp-quantity">
                  <div class="sp-minus fff"> <a class="ddd" href="javascript:void(0)">-</a> </div>
                  <div class="sp-input">
                    <input type="number" class="quntity-input" name="<?php echo "cart[$i][qty]" ?>" value="<?php echo $item['qty']; ?>" />
                  </div>
                  <div class="sp-plus fff"> <a class="ddd" href="javascript:void(0)">+</a> </div>
                </div>
                <button type="button" class="btn btn-sm btn-default remove_item Del_btn" data-row-id="<?php echo $item['rowid'] ?>"></button>
              </div>
            </div>

          </div>

           <?php
            $i++;
            endforeach; 
           ?>

          <div class="col-lg-10 text-center">
           </div>

           <div class="col-lg-2 text-center">

           <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
						Update Cart
					</button>
            </div>


           <?php echo form_close() ?>




          <div class="row border_top">
            <div class="col-lg-4 col-xs-12 pull-right mobilePadding0">
              <table class="table">
                <tbody>
                  <tr>
                    <td>Subtotal:</td>
                    <td>€ <?php echo number_format($this->cart->total())." /-"; ?></td>
                  </tr>
                 <!--  <tr>
                    <td>Shipping:</td>
                    <td>€ 4.99</td>
                  </tr> -->
                  <tr>
                    <td>Total: <!-- <em style="margin:10px 0 0;">19.0% VAT included</em> <em>€ 15.17</em> --></td>
                    <td>€ <?php echo number_format($this->cart->total())." /-"; ?></td>
                  </tr>
                </tbody>
              </table>
              <a href="<?php echo base_url('cart/checkout') ?>" class="btn ToOfr">Checkout</a>

            </div>
          </div>


        <?php } else { ?>
  
         <div class="row"> <p>No Products in the Cart!</p> </div>

        <?php } ?>



        </div>
      </div>
    </div>
  </div>
</div>


<?php $form_fields = array('id' => 'remove_item_form'); echo form_open(base_url('cart/remove') , $form_fields) ?>
    
    <input type="hidden" name="product_id" id="input_product_id" value="">
    <?php echo form_close()?>

    
    
     <script type="text/javascript">
        $(document).ready(function () {
           $('.remove_item').click(function () {

               var remove_item = $(this).data("row-id");

               $("#input_product_id").val(remove_item);
               $("#remove_item_form").submit();
           });


          $('.quntity-input').keyup(function () { 
                  this.value = this.value.replace(/[^0-9\.]/g,'');
          });

        });
    </script>


