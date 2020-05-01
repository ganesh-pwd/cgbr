
<div class="Cart-Part">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-xs-12">
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

    <?php $details = unserialize($user->details); $name =  explode(" ",$user->name); ?>
      
      <div class="col-lg-9 col-sm-12 col-md-9 col-xs-12">
      
      
      <div class="CartBox">
          <div class="row">
            
            <div class="login-part-full-box">
           
            <?php $this->load->view('admin/partials/flash'); ?>

            <?php echo form_open_multipart(base_url('index.php/profile/')) ?>


              <div class="col-md-12 col-xs-12 clearfix">
                <div class="login-part-lft">
                
                            <h4>My Details</h4>
                            <h3>Personal Information</h3>
                
                  <div class="form-group">
                    <label for="usr">Salutation</label>
                    <div class="select-style">
                      <select name="salutation">
                        <option value="">Select</option>
                        <option <?php  if($details['salutation'] == 'Mr'){ echo "selected";} ?> value="Mr">Mr</option>
                        <option <?php if($details['salutation'] == 'Mrs'){ echo "selected";} ?> value="Mrs">Mrs</option>
                        <option <?php if($details['salutation'] == 'Miss'){ echo "selected";} ?> value="Miss">Miss</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-xs-12">
                <div class="login-part-lft">
                  <div class="form-group">
                    <label for="usr">First Name *</label>
                    <input type="text" name="first_name"  class="form-control" placeholder="Chanchal" value="<?php if(isset($name[0])){ echo $name[0]; }  ?>" >
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-xs-12">
                <div class="login-part-lft">
                  <div class="form-group">
                    <label for="usr">Surname *</label>
                    <input type="text"  name="surname"  class="form-control" placeholder="Roy" value="<?php if(isset($name[1])){ echo $name[1]; } ?>" >
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-xs-12">
                <div class="login-part-lft">
                  <div class="form-group">
                    <label for="usr">Phone *</label>
                    <input type="text" name="phone"  class="form-control" placeholder="<?php echo $details['phone']; ?>" value="<?php echo $details['phone']; ?>" >
                  </div>
                </div>
              </div>
              
             <!--  <div class="col-md-12 col-xs-12">
                <button class="btn save_btn">save</button>
              </div> -->
              
               <!-- <div class="col-md-12 col-xs-12">
              <h3>E-mail Address</h3> 
              
               </div>
               
               <div class="col-md-6 col-xs-12">
                <div class="login-part-lft">
                  <div class="form-group">
                    <label for="usr">E-mail Address *</label>
                    <input type="text" class="form-control" value="<?php echo $user->email; ?>" value="<?php echo $user->email; ?>" >
                  </div>
                </div>
              </div>
              
              <div class="col-md-12 col-xs-12 ">
                <button class="btn save_btn">save</button>
              </div> -->

              <div class="col-md-12 col-xs-12">
              <h3>Your Address</h3> 
              
               </div>


               <div class="col-md-6 col-xs-12">
                <div class="login-part-lft">
                  <div class="form-group has-feedback<?php echo (form_error('country')) ? ' has-error' : ''; ?>">
                    <label for="usr">Country *</label>
                    <input type="text" class="form-control" name="country" value="<?php echo $details['country']; ?>" placeholder="" >
                    <?php echo form_error('country', '<span class="help-block">', '</span>') ?>
                  </div>
                </div>
              </div>
              
              
              <div class="col-md-6 col-xs-12">
                <div class="login-part-lft">
                  <div class="form-group has-feedback<?php echo (form_error('city')) ? ' has-error' : ''; ?>">
                    <label for="usr">City *</label>
                    <input type="text" class="form-control" name="city" value="<?php echo $details['city']; ?>" placeholder="" >
                    <?php echo form_error('city', '<span class="help-block">', '</span>') ?>
                  </div>
                </div>
              </div>
              
              <div class="col-md-6 col-xs-12">
                <div class="login-part-lft">
                  <div class="form-group has-feedback<?php echo (form_error('postcode')) ? ' has-error' : ''; ?>">
                    <label for="usr">Postcode *</label>
                    <input type="text" class="form-control" name="postcode" value="<?php echo $details['postcode']; ?>" placeholder="" >
                    <?php echo form_error('postcode', '<span class="help-block">', '</span>') ?>
                  </div>
                </div>
              </div>
              
              <div class="col-md-6 col-xs-12">
                <div class="login-part-lft">
                  <div class="form-group has-feedback<?php echo (form_error('house_no')) ? ' has-error' : ''; ?>">
                    <label for="usr">House No *</label>
                    <input type="text" class="form-control" name="house_no" value="<?php echo $details['house_no']; ?>" placeholder="" >
                    <?php echo form_error('house_no', '<span class="help-block">', '</span>') ?>
                  </div>
                </div>
              </div>
              
              <div class="col-md-12 col-xs-12">
                <div class="login-part-lft">
                  <div class="form-group has-feedback<?php echo (form_error('road')) ? ' has-error' : ''; ?>">
                    <label for="usr">Road *</label>
                    <input type="text" class="form-control" placeholder="" name="road" value="<?php echo $details['road']; ?>" >
                    <?php echo form_error('road', '<span class="help-block">', '</span>') ?>
                  </div>
                </div>
              </div>


               <div class="col-md-12 col-xs-12">
                <button class="btn save_btn">save</button>
              </div> 


              <?php echo form_close() ?>

              <?php echo form_open_multipart(base_url('index.php/profile/update-password')) ?>
              
              
              <div class="col-md-12 col-xs-12">
               <h3>Password</h3> 
              
              </div>

               
               <!-- 
                        <div class="col-md-12 col-xs-12 cp">
                <div class="login-part-lft">
                  <div class="form-group">
                    <label for="usr">Current Password *</label>
                    <input type="text" class="form-control" placeholder="*****************" >
                  </div>
                </div>
              </div> -->
              
              <div class="col-md-6 col-xs-12">
                <div class="login-part-lft">
                  <div class="form-group has-feedback<?php echo (form_error('password')) ? ' has-error' : ''; ?>">
                    <label for="usr">New Password *</label>
                    <input type="password" name="password" class="form-control" placeholder="*****************" >
                    <?php echo form_error('password', '<span class="help-block">', '</span>') ?>
                    <button><i class="fa fa-eye"></i></button>
                  </div>
                  <em>Make sure your password is 8 characters long and
                        contains letters and numbers.</em>
                </div>
              </div>
              
              <div class="col-md-6  col-xs-12">
                <div class="login-part-lft">
                   <div class="form-group has-feedback<?php echo (form_error('confirm_password')) ? ' has-error' : ''; ?>">
                    <label for="usr">Confirm Password *</label>
                    <input type="password"  name="confirm_password" class="form-control" placeholder="*****************" >
                    <?php echo form_error('confirm_password', '<span class="help-block">', '</span>') ?>
                      <button><i class="fa fa-eye"></i></button>
                  </div>
                </div>
              </div>
              
              
              <div class="col-md-12 col-xs-12">
                <button class="btn save_btn">save</button>
              </div> 
              
              
               <?php echo form_close() ?>
              
              
              
            </div>
           
          </div>
        </div>
      
      </div>
      
      
      
      
    </div>
  </div>
</div>










