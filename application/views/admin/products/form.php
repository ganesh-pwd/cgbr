<fieldset>
    <div class="form-group<?php echo (form_error('name')) ? ' has-error' : ''; ?>">
        <label for="name">Name *</label>
        <?php echo form_input('name', (isset($record))? set_value("name", $record->name) : set_value("name"), array('class' => 'form-control', 'placeholder' => 'Product name', 'id' => 'name')); ?>
        <?php echo form_error('name', '<span class="help-block">', '</span>') ?>
    </div>
    <div class="form-group<?php echo (form_error('category_id')) ? ' has-error' : ''; ?>">
        <label for="category_id">Category *</label>
        <?php 
        $select_categories[] = array();
        $count = 0;    
        foreach ($categoriesMenu as $category){
            $select_categories["parent".$count] = $category["name"];

            foreach ($category['child'] as $key => $value) {
                $select_categories[$value['id']] = $value['name'];
            }

        $count++; }  ?>
        <?php echo form_dropdown('category_id',array(''=>'Select')+$select_categories, (isset($record))? set_value("category_id", $record->category_id) : set_value("category_id"),  array('class' => 'form-control category_list', 'placeholder' => '5000', 'id' => 'category_id')); ?>
        <?php echo form_error('category_id', '<span class="help-block">', '</span>') ?>
    </div>
    <div class="form-group<?php echo (form_error('attribute_id')) ? ' has-error' : ''; ?>">
        <label for="attribute_id">Attribute Set *</label>
        <?php
        $select_attributes = array();
        foreach ($attributes as $attribute){
            $select_attributes[$attribute['id']] = $attribute['name'];
        } ?>
        <?php echo form_dropdown('attribute_id',array(''=>'Select')+$select_attributes, (isset($record))? set_value("attribute_id", $record->attribute_id) : set_value("attribute_id"), array('class' => 'form-control', 'placeholder' => '5000', 'id' => 'attribute_id')); ?>
        <?php echo form_error('attribute_id', '<span class="help-block">', '</span>') ?>
    </div>

    <div class="form-group" id="attribute_area">

        <?php if(isset($record)) { if($record->variations != '') { $variations = unserialize($record->variations); $loop = 1;

            

            foreach ($variations as $key => $value) { 
                   $main_array = $value;
                   unset($value['price']); unset($value['qty']);
                ?>


                <div class="col-lg-12">
                    <div class="col-sm-2">#<?php echo $loop; ?></div>
                    <div class="col-sm-4">
                        <?php foreach ($value as $key => $field) {   ?>
                        <label><?php echo $field; ?></label><input type="hidden" name="variations[variation<?php echo $loop; ?>][]" value="<?php echo $field; ?>">&nbsp;&nbsp;&nbsp;
                    <?php } ?>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" name="variations[variation<?php echo $loop; ?>][price]" value="<?php echo $main_array['price']; ?>" placeholder="Enter Price">
                        <input type="text" name="variations[variation<?php echo $loop; ?>][qty]" value="<?php echo $main_array['qty']; ?>" placeholder="Enter Quantity">
                    </div>
                    <hr>
                </div>

                
                
        <?php  $loop++;  }

         } } ?>

    </div>


  <!--   <div class="form-group<?php echo (form_error('description')) ? ' has-error' : ''; ?>">
        <label for="description">Description *</label>
        <?php echo form_textarea('description', (isset($record))? set_value("description", $record->description) : set_value("description"), array('class' => 'form-control', 'placeholder' => 'Description', 'id' => 'description')); ?>
        <?php echo form_error('description', '<span class="help-block">', '</span>') ?>

    </div> -->
    <div class="form-group<?php echo (form_error('price')) ? ' has-error' : ''; ?>">
        <label for="price">Price *</label>
        <?php echo form_input('price', (isset($record))? set_value("price", $record->price) : set_value("price"), array('class' => 'form-control', 'placeholder' => '5000', 'id' => 'price')); ?>
        <?php echo form_error('price', '<span class="help-block">', '</span>') ?>
    </div>

	<div class="form-group<?php echo (form_error('cover_image')) ? ' has-error' : ''; ?>">
		<label for="cover_image">Cover Image *</label>
		<input type="file" name="cover_image" class="form-control" id="cover_image"/>
		<?php echo form_error('cover_image', '<span class="help-block">', '</span>') ?>
	</div>

    <!-- <div class="form-group<?php echo (form_error('images[]')) ? ' has-error' : ''; ?>">
        <label for="images">images *</label>
        <input type="file" name="images[]" class="form-control" multiple="multiple"/>
        <?php echo form_error('images[]', '<span class="help-block">', '</span>') ?>
    </div> -->

    <div class="form-group<?php echo (form_error('status')) ? ' has-error' : ''; ?>">
        <label>Active * &nbsp  </label>

        <label class="radio-inline">
        <?php echo form_radio('status',1,(isset($record)) ?  $record->status :true ,array()); ?>Yes
        </label>

        

        <label class="radio-inline">
            <?php echo form_radio('active',0,(isset($record) && $record->status == 0) ?  true : false,array()); ?>No
        </label>
        <?php echo form_error('active', '<span class="help-block">', '</span>') ?>
    </div>
</fieldset>


<script type="text/javascript">
    $(document).ready(function(){
        var count = 0;
        $('.category_list > option').each(function(){
    //$(this).addClass($(this).html());
    if($(this).val() == 'parent'+count){
        this.disabled = true;

        count++;
    } else {
        $(this).addClass("child");
    }
    
});
     
        $(document).on('change', '#attribute_id',  function() {

            var val = $(this).val();
      
            if(val == '') {
                     alert('Please choose proper attributes!'); 
                     $("#attribute_area").empty();
                     return false;
            }  else {

                var fd = new FormData();
                fd.append('attribute_id', val);
                var request = $.ajax({
                  url: "<?php echo base_url('index.php/admin/attributes/fetch/'); ?>"+val,
                  type: "POST",
                  data: fd ,
                  contentType: false , 
                  processData: false,

                });

                request.done(function(msg) {

                   $("#attribute_area").empty();
                   $("#attribute_area").append(msg);
                 
                });

                request.fail(function(jqXHR, textStatus) {
                  alert( "Request failed: " + textStatus );
                });


            }
          
        });


            /*var val = $("#attribute_id").val();
      
            if(val == '') {
                     alert('Please choose proper attributes!'); 
                     return false;

            }  else {

                var fd = new FormData();
                fd.append('attribute_id', val);
                var request = $.ajax({
                  url: "<?php echo base_url('index.php/admin/attributes/fetch/'); ?>"+val,
                  type: "POST",
                  data: fd ,
                  contentType: false , 
                  processData: false,

                });

                request.done(function(msg) {

                   console.log(msg);

                   $("#attribute_area").append(msg);
                 
                 
                });

                request.fail(function(jqXHR, textStatus) {
                  alert( "Request failed: " + textStatus );
                });


            }*/


    });
</script>
