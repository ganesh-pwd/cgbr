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
            <li ><a  href="<?php echo base_url('index.php/cart/checkout'); ?>" class="act">Address</a></li>
            <li class="active"><a data-toggle="pill" href="#menu1">Payment</a></li> 
          </ul>
        </div>
      </div>
      <div class="tab-content">
       
        
        <div id="menu1" class="tab-pane fade in active">
          <h2>Payment</h2>

           <form role="form" action="<?php echo base_url('index.php/stripePost') ?>" method="post" class="require-validation"
                                                     data-cc-on-file="false"
                                                    data-stripe-publishable-key="<?php echo $this->config->item('stripe_key') ?>"
                                                    id="payment-form">

           <input type="text" name="" value="<?php echo $order_id; ?>">                                         
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
                  <div class="col-md-4">
                    <div class="login-part-lft">
                      <div class="form-group">
                        <label for="usr">Expiry Month *</label>
                        <input type="text" class="form-control" placeholder="" id="usr" style="width:150px;">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="login-part-lft">
                      <div class="form-group">
                        <label for="usr">Expiry Year *</label>
                        <input type="text" class="form-control" placeholder="" id="usr" style="width:150px;">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="login-part-lft">
                      <div class="form-group">
                        <label for="usr">CVC *</label>
                        <input type="text" class="form-control" placeholder="" id="usr" style="width:150px;">
                      </div>
                    </div>
                  </div>
                  
                  <div class="col-md-12"> <div class="vpa"> <img src="images/vpa.jpg" alt="img"> </div> </div>
                  
                  <div class="col-md-12"> <button type="submit" class="btn proceed_btn">Place your order</button> </div>
                </div>
              </div>
            </div>
          </div>

        </form>
          
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
          
          
        </div> 
        
        
      </div>
    </div>
  </div>
</div>


  <?php if($this->session->flashdata('success')){ ?>
                    <div class="alert alert-success text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <p><?php echo $this->session->flashdata('success'); ?></p>
                        </div>
                    <?php } ?>
     
                    <form role="form" action="<?php echo base_url('index.php/stripePost') ?>" method="post" class="require-validation"
                                                     data-cc-on-file="false"
                                                    data-stripe-publishable-key="<?php echo $this->config->item('stripe_key') ?>"
                                                    id="payment-form">
     
                        <div class='form-row row'>
                            <div class='col-xs-12 form-group required'>
                                <label class='control-label'>Name on Card</label> <input
                                    class='form-control' size='4' type='text'>
                            </div>
                        </div>
     
                        <div class='form-row row'>
                            <div class='col-xs-12 form-group card required'>
                                <label class='control-label'>Card Number</label> <input
                                    autocomplete='off' class='form-control card-number' size='20'
                                    type='text'>
                            </div>
                        </div>
      
                        <div class='form-row row'>
                            <div class='col-xs-12 col-md-4 form-group cvc required'>
                                <label class='control-label'>CVC</label> <input autocomplete='off'
                                    class='form-control card-cvc' placeholder='ex. 311' size='4'
                                    type='text'>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Month</label> <input
                                    class='form-control card-expiry-month' placeholder='MM' size='2'
                                    type='text'>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Year</label> <input
                                    class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                    type='text'>
                            </div>
                        </div>
      
                        <div class='form-row row'>
                            <div class='col-md-12 error form-group hide'>
                                <div class='alert-danger alert'>Please correct the errors and try
                                    again.</div>
                            </div>
                        </div>
      
                        <div class="row">
                            <div class="col-xs-12">
                                <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now ($100)</button>
                            </div>
                        </div>
                             
                    </form>


     
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
     
<script type="text/javascript">
$(function() {
    var $form         = $(".require-validation");
  $('form.require-validation').bind('submit', function(e) { alert('ganesh');
    var $form         = $(".require-validation"),
        inputSelector = ['input[type=email]', 'input[type=password]',
                         'input[type=text]', 'input[type=file]',
                         'textarea'].join(', '),
        $inputs       = $form.find('.required').find(inputSelector),
        $errorMessage = $form.find('div.error'),
        valid         = true;
        $errorMessage.addClass('hide');
 
        $('.has-error').removeClass('has-error');
    $inputs.each(function(i, el) {
      var $input = $(el);
      if ($input.val() === '') {
        $input.parent().addClass('has-error');
        $errorMessage.removeClass('hide');
        e.preventDefault();
      }
    });
     
    if (!$form.data('cc-on-file')) {
      e.preventDefault();
      Stripe.setPublishableKey($form.data('stripe-publishable-key'));
      Stripe.createToken({
        number: $('.card-number').val(),
        cvc: $('.card-cvc').val(),
        exp_month: $('.card-expiry-month').val(),
        exp_year: $('.card-expiry-year').val()
      }, stripeResponseHandler);
    }
    
  });
      
  function stripeResponseHandler(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            var token = response['id'];
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }
     
});
</script>
