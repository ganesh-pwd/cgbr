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

            <div class="col-lg-12 text-center"> 

              <?php echo $page->description; ?>

             </div>
            
            

          </div>

           


        </div>
      </div>
    </div>
  </div>
</div>



    


