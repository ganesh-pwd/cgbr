<div class="Cart-Part">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Forget Password</li>
          </ol>
        </nav>
        <h2>Forget Password</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="CartBox">
          <div class="row">
            <div class="col-lg-12">
              <div class="login-part-full-box">
                <div class="col-md-12 col-xs-12 clearfix">
                  <div class="login-part-lft">
                    <h3>I am already a customer</h3>
                     <?php $this->load->view('admin/partials/flash'); ?>
                  </div>
                </div>

                <?php echo form_open(base_url('forget-password')) ?>

                <div class="col-md-6 col-xs-12">
                  <div class="login-part-lft">
                    <div class="form-group has-feedback<?php echo (form_error('email')) ? ' has-error' : ''; ?>">
                      <label for="usr">E-mail address *</label>
                      <input type="email" class="form-control" name="email" value="<?php echo set_value('email') ?>" placeholder="email@jalousiescout.com" >
                      <?php echo form_error('email', '<span class="help-block">', '</span>') ?>
                    </div>
                  </div>
                </div>

                <!-- <div class="col-md-6 col-xs-12">
                  <div class="login-part-lft">
                    <div class="form-group has-feedback<?php echo (form_error('password')) ? ' has-error' : ''; ?>">
                      <label for="usr">Password *</label>
                      <input type="password" name="password" class="form-control" placeholder="*****************" >
                      <?php echo form_error('password', '<span class="help-block">', '</span>') ?>
                    </div>
                  </div>
                </div> -->

               <!--  <div class="col-md-12 col-xs-12"> <a href="<?php echo base_url('index.php/forget-password') ?>" class="ForgotBtn mT0">Forgot Password?</a> -->

                </div>

              <div class="col-md-12 col-xs-12 ">
                <button class="btn save_btn">submit</button>
              </div>

                <?php echo form_close(); ?>


              </div>
            </div>
            
            <div class="col-lg-5">
            
            <!-- <div class="login-part-full-box">
                <div class="col-md-12 col-xs-12 clearfix">
                  <div class="login-part-lft loginNew">
                    <h3>I am a new customer</h3>
                    
                    <h4>Your advantages if you register in the Venetian blind shop:</h4>
                    <ul>
                     <li>Lightning-fast shopping thanks to saved user data and settings</li>
                     <li>Manage multiple delivery addresses</li>
                     <li>Desired items in the shopping cart are retained</li>
                    </ul>
                    
                  </div>
                </div>
                
                
                <div class="col-md-12 col-xs-12">  <a href="<?php echo base_url('register') ?>" class="Reg_btn">Register</a> </div>
              </div> -->
            
            
            </div>
            
            
            
            
            
          </div>
        </div>
      </div>
    </div>
  </div>
</div>




