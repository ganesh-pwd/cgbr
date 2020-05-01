<div class="Cart-Part">
  <div class="container">
  	<?php $this->load->view('partials/flash'); ?>
    <div class="row">
      <div class="col-lg-12">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo $page->name; ?></li>
          </ol>
        </nav>
        <h2><?php echo $page->name; ?></h2>
      </div>
      <div class="col-lg-12">
        <div class="CartBox">

          

          <div class="row">

            <div class="col-lg-6 text-center"> 

              <?php echo $page->description; ?>

             </div>

              <div class="col-lg-6 text-center"> 

              <?php echo form_open(base_url('index.php/contact-us')) ?>
					<h4 class="m-text26 p-b-36 p-t-15">
						Send us your message
					</h4>

				<?php echo validation_errors('<div class="error" style="color: red; margin-bottom: 5px;">', '</div>'); ?>

					<div class="bo4 of-hidden size15 m-b-20">
						<?php echo form_input('name', set_value("name"), array('class' => 'sizefull s-text7 p-l-22 p-r-22', 'placeholder' => 'Name', 'id' => 'name')); ?>
					</div>

					<div class="bo4 of-hidden size15 m-b-20">
						<?php echo form_input('phone', set_value("phone"), array('class' => 'sizefull s-text7 p-l-22 p-r-22', 'placeholder' => 'Phone Number', 'id' => 'phone')); ?>
					</div>

					<div class="bo4 of-hidden size15 m-b-20">
						<?php echo form_input('email', set_value("email"), array('class' => 'sizefull s-text7 p-l-22 p-r-22', 'placeholder' => 'Email', 'id' => 'email')); ?>
					</div>
					<?php echo form_textarea('message', set_value("message"), array('class' => 'dis-block s-text7 size20 bo4 p-l-22 p-r-22 p-t-13 m-b-20', 'placeholder' => 'message', 'id' => 'message')); ?>

					<div class="w-size25">
						<!-- Button -->
						<button class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4">
							Send
						</button>
					</div>
<!--				</form>-->
				<?php echo  form_close() ?>

             </div>
            
            

          </div>

           


        </div>
      </div>
    </div>
  </div>
</div>



    





