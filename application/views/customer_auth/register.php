
<div class="Cart-Part">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Register</li>
          </ol>
        </nav>
        <h2>Register</h2>
      </div>
    </div>
    <div class="row">

      <?php $this->load->view('admin/partials/flash'); ?>
      <div class="col-lg-8">
        <div class="CartBox">
          <div class="row">
            <div class="login-part-full-box">

              <?php echo form_open(base_url('register')) ?>
           
            
              <div class="col-md-12 col-xs-12 clearfix">
                <div class="login-part-lft">
                <h3>Your personal information</h3>
                  <div class="form-group has-feedback<?php echo (form_error('salutation')) ? ' has-error' : ''; ?>">
                    <label for="usr">Salutation *</label>
                    <div class="select-style">
                      <select name="salutation">
                        <option value="">Select</option>
                        <option value="Mr">Mr</option>
                        <option value="Mrs">Mrs</option>
                        <option value="Miss">Miss</option>
                      </select>
                    </div>
                    <?php echo form_error('salutation', '<span class="help-block">', '</span>') ?>
                  </div>
                </div>
              </div>


              <div class="col-md-6 col-xs-12">
                <div class="login-part-lft">
                  <div class="form-group has-feedback<?php echo (form_error('first_name')) ? ' has-error' : ''; ?>">
                    <label for="usr">First Name *</label>
                    <input type="text" name="first_name" value="<?php echo set_value('first_name') ?>" class="form-control" placeholder="Enter Your First Name" >
                    <?php echo form_error('first_name', '<span class="help-block">', '</span>') ?>
                  </div>
                </div>
              </div>

              <div class="col-md-6 col-xs-12">
                <div class="login-part-lft">
                  <div class="form-group has-feedback<?php echo (form_error('surname')) ? ' has-error' : ''; ?>">
                    <label for="usr">Surname *</label>
                    <input type="text" name="surname" value="<?php echo set_value('surname') ?>" class="form-control" placeholder="Enter Your Surname" >
                    <?php echo form_error('surname', '<span class="help-block">', '</span>') ?>
                  </div>
                </div>
              </div>
              

              <div class="col-md-12 col-xs-12">
                <div class="login-part-lft">
                  <div class="form-group has-feedback<?php echo (form_error('email')) ? ' has-error' : ''; ?>">
                    <label for="usr">Email Address *</label>
                    <input type="email" class="form-control" name="email" value="<?php echo set_value('email') ?>" placeholder="email@jalousiescout.com" >
                    <?php echo form_error('email', '<span class="help-block">', '</span>') ?>
                  </div>
                </div>
              </div>
              
              <div class="col-md-12 col-xs-12">
                <div class="login-part-lft">
                  <div class="form-group has-feedback<?php echo (form_error('confirm_email')) ? ' has-error' : ''; ?>">
                    <label for="usr">Confirm Email Address *</label>
                    <input type="email" class="form-control" name="confirm_email" value="<?php echo set_value('confirm_email') ?>" placeholder="email@jalousiescout.com" >
                    <?php echo form_error('confirm_email', '<span class="help-block">', '</span>') ?>
                  </div>
                </div>
              </div>
              
              <div class="col-md-12 col-xs-12">
                <div class="login-part-lft">
                  <div class="form-group has-feedback<?php echo (form_error('phone')) ? ' has-error' : ''; ?>">
                    <label for="usr">Phone Number *</label>
                    <input type="text" class="form-control" name="phone" value="<?php echo set_value('phone') ?>" placeholder="" >
                    <?php echo form_error('phone', '<span class="help-block">', '</span>') ?>
                  </div>
                </div>
              </div>
              

              
               <div class="col-md-12 col-xs-12">
              <h3>Your Address</h3> 
              
               </div>
               
               <div class="col-md-6 col-xs-12">
                <div class="login-part-lft">
                  <div class="form-group has-feedback<?php echo (form_error('country')) ? ' has-error' : ''; ?>">
                    <label for="usr">Country *</label>
                    <input type="text" class="form-control" name="country" value="<?php echo set_value('country') ?>" placeholder="" >
                    <?php echo form_error('country', '<span class="help-block">', '</span>') ?>
                  </div>
                </div>
              </div>
              
              
              <div class="col-md-6 col-xs-12">
                <div class="login-part-lft">
                  <div class="form-group has-feedback<?php echo (form_error('city')) ? ' has-error' : ''; ?>">
                    <label for="usr">City *</label>
                    <input type="text" class="form-control" name="city" value="<?php echo set_value('city') ?>" placeholder="" >
                    <?php echo form_error('city', '<span class="help-block">', '</span>') ?>
                  </div>
                </div>
              </div>
              
              <div class="col-md-6 col-xs-12">
                <div class="login-part-lft">
                  <div class="form-group has-feedback<?php echo (form_error('postcode')) ? ' has-error' : ''; ?>">
                    <label for="usr">Postcode *</label>
                    <input type="text" class="form-control" name="postcode" value="<?php echo set_value('postcode') ?>" placeholder="" >
                    <?php echo form_error('postcode', '<span class="help-block">', '</span>') ?>
                  </div>
                </div>
              </div>
              
              <div class="col-md-6 col-xs-12">
                <div class="login-part-lft">
                  <div class="form-group has-feedback<?php echo (form_error('house_no')) ? ' has-error' : ''; ?>">
                    <label for="usr">House No *</label>
                    <input type="text" class="form-control" name="house_no" value="<?php echo set_value('house_no') ?>" placeholder="" >
                    <?php echo form_error('house_no', '<span class="help-block">', '</span>') ?>
                  </div>
                </div>
              </div>
              
              <div class="col-md-12 col-xs-12">
                <div class="login-part-lft">
                  <div class="form-group has-feedback<?php echo (form_error('road')) ? ' has-error' : ''; ?>">
                    <label for="usr">Road *</label>
                    <input type="text" class="form-control" placeholder="" name="road" value="<?php echo set_value('road') ?>" >
                    <?php echo form_error('road', '<span class="help-block">', '</span>') ?>
                  </div>
                </div>
              </div>
              
              
              
              <div class="col-md-12">
                <label class="total-new-chackbox">
                  <input type="checkbox" checked="checked">
                  <span class="checkmark11"></span> The delivery address differs from the billing address .</label>
                
              </div>
              
              <div class="col-md-12 col-xs-12">
              <h3>Your Password</h3> 
              
               </div>
               
               
                        
              
              <div class="col-md-6 col-xs-12">
                <div class="login-part-lft">
                  <div class="form-group has-feedback<?php echo (form_error('password')) ? ' has-error' : ''; ?>">
                    <label for="usr">Password *</label>
                    <input type="password" name="password" class="form-control" placeholder="*****************" >
                    <?php echo form_error('password', '<span class="help-block">', '</span>') ?>
                  </div>
                 
                </div>
              </div>
              
              <div class="col-md-6  col-xs-12">
                <div class="login-part-lft">
                  <div class="form-group has-feedback<?php echo (form_error('confirm_password')) ? ' has-error' : ''; ?>">
                    <label for="usr">Confirm Password *</label>
                    <input type="password" name="confirm_password" class="form-control" placeholder="*****************" >
                    <?php echo form_error('confirm_password', '<span class="help-block">', '</span>') ?>
                  </div>
                </div>
              </div>
              
              
              <div class="col-md-12">
                <label class="total-new-chackbox">
                  <input type="checkbox" checked="checked">
                  <span class="checkmark11"></span> Yes, I would like to be informed about news and offers at Jalousiescout by email. </label>
                
              </div>
              
              
              
              
              
               <div class="col-md-12 col-xs-12">
               <p>You can object to the receipt of our newsletter at any time by e-mail to service@jalousiescout.de or after receipt of a newsletter using the unsubscribe link contained in each mailing, without incurring any costs other than the transmission costs according to the basic tariffs. You can find further information on this as well as in general on the use of your personal data in the context of newsletter marketing in our data protection regulations.<br><br>
               
               <a href="#"><strong style="color:#b3678a; text-decoration:underline;">Note</strong></a></p>
               
                              <p> products you have ordered and related accessories. You can object to the use of your data at any time by email to service@jalousiescout.de or after receiving an email using the unsubscribe link included in every mailing, without incurring any costs other than the transmission costs 
                according to the basic tariffs. You can find more information on this in our data protection 
                regulations.</p>



 
                <button class="Reg_btn">Register</button>
              

              </div>
              
              
              
              <?php echo form_close(); ?>
              
              
            </div>
          </div>
        </div>
      </div>


      <div class="col-lg-4">
        <div class="CartBox regSid">
          <div class="row">
            <div class="login-part-full-box">
           
            
              <div class="col-md-12 col-xs-12 clearfix">
                <div class="login-part-lft">
                
                            <h4 class="lii">Login</h4>

                </div>
              </div>

              <?php echo form_open(base_url('customer-login')) ?>



              <div class="col-md-12 col-xs-12">
                <div class="login-part-lft">
                  <div class="form-group has-feedback<?php echo (form_error('email')) ? ' has-error' : ''; ?>">
                    <label for="usr">E-mail address *</label>
                    <input type="email" class="form-control" name="email" value="<?php echo set_value('email') ?>" placeholder="email@jalousiescout.com" >
                      <?php echo form_error('email', '<span class="help-block">', '</span>') ?>
                  </div>
                </div>
              </div>

              <div class="col-md-12 col-xs-12">
                <div class="login-part-lft">
                  <div class="form-group has-feedback<?php echo (form_error('password')) ? ' has-error' : ''; ?>">
                    <label for="usr">Password *</label>
                    <input type="password" name="password" class="form-control" placeholder="*****************" >
                      <?php echo form_error('password', '<span class="help-block">', '</span>') ?>
                  </div>
                </div>
              </div>

              <div class="col-md-12 col-xs-12">

               
               <a href="#" class="ForgotBtn">Forgot Password?</a>
               


              <button class="btn save_btn Reg_btn2">login</button>
            
              </div>
              
     
              <?php echo form_close(); ?>
              
              
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>












