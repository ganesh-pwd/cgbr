<div class="product-DePart">
  <div class="container">
    <div class="row">
      <?php $this->load->view('partials/flash'); ?>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-5 pd_left pRgt ">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
            <li class="breadcrumb-item" ><a href="<?php echo base_url('shop/category/'.$parent_category[0]['slug']) ?>"><?php echo $parent_category[0]['name']; ?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo $product->name ?></li>
          </ol>
        </nav>
        <div id="sticky" class=" nav-stacked" data-spy="affix" data-offset-top="205">
          <div class="pro_img"> <img src="<?php echo  xss_clean(base_url('images/products/'.$product->cover_image)); ?>" alt=""> </div>
          <p class="text-center">Depending on the screen and screen settings, the colors shown may vary. 
            The illustration is only for illustration and is not binding.</p>
        </div>
      </div>
      <div class="col-lg-6 col-md-7 pLft">
        <div class="prodet_right">
          <h3><?php echo $product->name ?></h3>
          <!-- <h4>WHITE</h4> -->
          <div class="row">
            <div class="col-lg-6">
              <h5>from € <?php echo "<span id='price'>".number_format($product->price)."</span>"; ?> </h5>
              <!-- <em>19% VAT</em> <em>Shipping costs: 5.99 €</em> </div>
            <div class="col-lg-6 text-right"> <em>Delivery time:</em> <em>9 - 11 working days</em> </div> -->
          </div>
          <?php $variations = unserialize($product->variations); ?>
          <?php $form_fields = array('id' => 'myform'); echo form_open(base_url('index.php/add-to-cart') , $form_fields) ?>
          <input type="hidden" name="current_price" id="current_price" value="<?php echo number_format($product->price); ?>">
          <?php if(isset($attributes)) { 

				 	            $details = unserialize($attributes['details']);

				 	            $selected_varaiations = array();

								foreach ($details as $key => $fields) {


								 	    if($fields['field_type'] == 'text') {

								 	    	$name = str_replace(' ', '_', $fields['field_name']);
				                            $name = strtolower($name);
				                            $name = str_replace(array("\n","\r"), '', $name);

								 	    	echo "<div class='WidthHeight' style='margin:20px 0; width:100%;'>";
											echo "<label>".$fields['field_name']."</label>"; 
								 	    	echo "<input class='from-control' type='".$fields['field_type']."'  name='attribute[".$name."]' value='".$fields['field_default_value']."'  placeholder='".$fields['field_placeholder']."'  />";
								 	    	echo "</div>";


								 	    	/*foreach ($fields as $key => $field) {
								 	    	  echo $key." => ".$field; echo "<br/>";


								 	        }*/

								 	    }
										
										
										
										
										
								 	    if($fields['field_type'] == 'text_range') {

								 	    	$name = str_replace(' ', '_', $fields['field_name']);
				                            $name = strtolower($name);
				                            $name = str_replace(array("\n","\r"), '', $name);
											
											
											echo "<div class='WidthHeight'>";
								 	    	echo "<label>".$fields['field_name']."</label>"; 
								 	    	echo "<input class='from-control from-control99' data-min='".$fields['field_minumum']."' data-max='".$fields['field_maximum']."' type='text'  name='attribute[".$name."]'  value='".$fields['field_default_value']."'  placeholder='".$fields['field_placeholder']."'  />";
								 	    	echo "<span class='min'>min: ".$fields['field_minumum']." mm</span>  , <span class='max'>max: ".$fields['field_maximum']." mm</span>";
								 	    	echo "</div>";

								 	    }
										
										
										
										
										
								 	    if($fields['field_type'] == 'select') {

								 	    	$name = str_replace(' ', '_', $fields['field_name']);
				                            $name = strtolower($name);
				                            $name = str_replace(array("\n","\r"), '', $name);

								 	    	
											echo "<div class='sleDiv'>";
											echo "<label class='ModelType'>".$fields['field_name']."</label> <div class='select-style'><select class='from-control6' name=attribute[".$name."] >";
                                            $flag = 1 ;
				                            $field_options = explode("|" , $fields['field_choices']);
								 	    	foreach ($field_options as $key => $field) {
								 	    		$field_options = explode(":" , $field);
								 	    		if($flag == 1){ 
								 	    			$selected = "selected"; 
								 	    			$string = str_replace(' ', '', $field_options[1]);
                                                    $stringLower = strtolower($string);
								 	    			array_push($selected_varaiations , $stringLower);
								 	    		} else {
								 	    		 $selected = "";
								 	    		}
								 	    	    echo "<option ".$selected." value=".$field_options[0].">".$field_options[1]."</option>";
                                             
                                             $flag++;

								 	        }

								 	        echo "</select>";
											echo "</div>";

								 	        echo "</div>";

								 	    }


								 	    if($fields['field_type'] == 'radio') {

								 	    	
											echo "<div class='DefaultField'>";
											echo "<h2>".$fields['field_name']."</h2>";
                                            $flag = 1 ;
				                            $field_options = explode("|" , $fields['field_choices']);
				                            $name = str_replace(' ', '_', $fields['field_name']);
				                            $name = strtolower($name);
				                            $name = str_replace(array("\n","\r"), '', $name);
								 	    	foreach ($field_options as $key => $field) {
								 	    	$field_options = explode(":" , $field);
								 	    	if($flag == 1){ $selected = "checked"; $string = str_replace(' ', '', $field_options[1]);
                                                    $stringLower = strtolower($string);
								 	    			array_push($selected_varaiations , $stringLower); } else { $selected = ""; }
								 	    			$string = str_replace(array("\n","\r"), '', $field_options[0]);
											echo "<label class='DfltRdo radio inline'><input ".$selected." name='attribute[".$name."]' type='radio' value='".$string."' class='from-control' />";
											echo "<span>".$field_options[1]."</span></label>";
                                            $flag++;
								 	        }

								 	        echo "</div>";

								 	    }

								 	    if($fields['field_type'] == 'checkbox') {

								 	    	$name = str_replace(' ', '_', $fields['field_name']);
				                            $name = strtolower($name);
				                            $name = str_replace(array("\n","\r"), '', $name);
											
											echo "<div class='sleDiv' style='margin-bottom:20px;'>";
								 	    	echo "<h2>".$fields['field_name']."</h2>";
                                            $flag = 1 ;
				                            $field_options = explode("|" , $fields['field_choices']);
								 	    	foreach ($field_options as $key => $field) {
								 	    	 $field_options = explode(":" , $field);
								 	    	 if($flag == 1){ $selected = "checked"; $string = str_replace(' ', '', $field_options[1]);
                                                    $stringLower = strtolower($string);
								 	    			array_push($selected_varaiations , $stringLower); } else { $selected = ""; }
								 	    			$string = str_replace(array("\n","\r"), '', $field_options[0]);
								 	    	  echo "<label class='control control--checkbox'><input ".$selected." name='attribute[".$name."]' type='checkbox' value=".$string." class='from-control' />".$field_options[1]."<div class='control__indicator'></div></label>";
                                              $flag++;
								 	        }

								 	        echo "</div>";

								 	    }


								 	     if($fields['field_type'] == 'color_box') {

								 	     	$name = str_replace(' ', '_', $fields['field_name']);
				                            $name = strtolower($name);
				                            $name = str_replace(array("\n","\r"), '', $name);

								 	    	echo "<div class='sleDiv' style='margin-bottom:20px;'>";
											echo "<label class='colorDiv'>".$fields['field_name']."</label>";
                                            $flag = 1 ;
				                            $field_options = explode("|" , $fields['field_choices']);
								 	    	foreach ($field_options as $key => $field) {
								 	    	$field_options = explode(":" , $field);
								 	    	if($flag == 1){ $selected = "checked"; $string = str_replace(' ', '', $field_options[1]);
                                                    $stringLower = strtolower($string);
								 	    			array_push($selected_varaiations , $stringLower); } else { $selected = ""; }
								 	    			$string = str_replace(array("\n","\r"), '', $field_options[1]);	
											echo "<div class='ClrCode'><input ".$selected." name='attribute[".$name."]' type='radio' value='".$string."' class='from-control' />";
											echo "<label><span style='background:$field_options[1]'>".$field_options[1]."</label></span></div>";
                                            $flag++;
								 	        }

								 	        echo "</div>";

								 	    }


								 	    if($fields['field_type'] == 'radio_images') {

								 	    	$name = str_replace(' ', '_', $fields['field_name']);
				                            $name = strtolower($name);
				                            $name = str_replace(array("\n","\r"), '', $name);

								 	    	echo "<div class='sleDiv'>";
											echo "<label class='nwe-lb'>".$fields['field_name']."</label>";
                                            $flag = 1 ;
				                            $field_options = explode("|" , $fields['field_choices']);
								 	    	foreach ($field_options as $key => $field) {
								 	    	$field_options = explode(":" , $field);
								 	    	if($flag == 1){ $selected = "checked"; 
									 	    	$string = str_replace(' ', '', $field_options[1]);
	                                            $stringLower = strtolower($string);
									 	        array_push($selected_varaiations , $stringLower); 
								 	        } else { $selected = ""; }
								 	    	echo "<label class='rr'>";	
								 	    	$string = str_replace(array("\n","\r"), '', $field_options[0]);	
											echo "<input ".$selected." name='attribute[".$name."]' type='radio' value='".$string."' class='form-control2 form-control66' />";
											echo "<img src='".$field_options[3]."' />";
											echo "<p>".$field_options[1]."</p></label>";
                                            $flag++;
								 	        }

								 	        echo "</div>";

								 	    }

								 	    
								 	
								}


				}


		?>
          
          <!-- <h2>Please enter the dimensions of your roller blind</h2>
        <div class="row form-Pro">
          <div class="col-lg-6 ">
            <input type="text" alt="" class="form-control">
            <em>min: 400 mm, max: 1400 mm</em> </div>
          <div class="col-lg-6">
            <input type="text" alt="" class="form-control">
            <em>min: 1000 mm, max: 2300 mm</em> </div>
        </div>
        <h5>Attention:</h5>
        <p>For the correct measurement and the appropriate manufacture of your roller blind, please read the measurement instructions first!</p>
        <p><strong>Please note -</strong> Due to the production process, panels that are at least 1900mm wide or at least 1800mm high cannot be made from one panel. These are therefore connected with a cross seam.</p>
        <em>100 mm = 10 cm</em> <em>We manufacture with a tolerance of max. (+/-) 2 mm.</em>
        <div class="sleDiv">
          <h2>Select the version of the blind</h2>
          <label class="rr">
          <input type="radio" name="test" value="small" checked>
          <img src="<?php echo base_url('assets/html/images/img2.png')?>" alt="">
          <p> Basic roller blind  | 
            Clamp Mount</p>
          <span></span>
          </label>
          <label class="rr">
          <input type="radio" name="test" value="big">
          <img src="<?php echo base_url('assets/html/images/img3.png')?>" alt="">
          <p> Basic roller blind  | 
            Adhesive mounting</p>
          <span></span>
          </label>
          <label class="rr">
          <input type="radio" name="test" value="small">
          <img src="<?php echo base_url('assets/html/images/img4.png')?>" alt="">
          <p> Basic roller blind  | 
            Screw mounting </p>
          <span></span>
          </label>
        </div>
        <div class="sleDiv">
          <h2>Choose the light transmission</h2>
          <label class="rr">
          <input type="radio" name="light" value="small" checked>
          <img src="<?php echo base_url('assets/html/images/img5.png')?>" alt="">
          <p> Basic roller blind  | 
            Clamp Mount</p>
          <span></span>
          </label>
          <label class="rr">
          <input type="radio" name="light" value="big">
          <img src="<?php echo base_url('assets/html/images/img6.png')?>" alt="">
          <p> Basic roller blind  | 
            Adhesive mounting</p>
          <span></span>
          </label>
          <label class="rr">
          <input type="radio" name="light" value="small">
          <img src="<?php echo base_url('assets/html/images/img7.png')?>" alt="">
          <p> Basic roller blind  | 
            Screw mounting </p>
          <span></span>
          </label>
        </div>
        <div class="sleDiv">
          <h2>Should your roller blind be guided sideways?</h2>
          <label class="rr noneImg">
          <input type="radio" name="blind" value="small" checked>
          <p>Without side guide</p>
          <span></span>
          </label>
          <label class="rr noneImg">
          <input type="radio" name="blind" value="big">
          <p>With side guide</p>
          <span></span>
          </label>
        </div>
        <div class="sleDiv">
          <h2>Filter Color</h2>
          <div class="color-choose">
            <div>
              <input data-image="white" type="radio" id="grd" name="color" value="white" checked>
              <label for="grd"><span><img src="<?php echo base_url('assets/html/images/grd.png')?>" alt=""></span></label>
            </div>
            <div>
              <input data-image="white" type="radio" id="1" name="color" value="white" checked>
              <label for="1"><span><img src="<?php echo base_url('assets/html/images/1.png')?>" alt=""></span></label>
            </div>
            <div>
              <input data-image="white" type="radio" id="2" name="color" value="white" checked>
              <label for="2"><span><img src="<?php echo base_url('assets/html/images/2.png')?>" alt=""></span></label>
            </div>
          </div>
        </div>
        <div class="sleDiv mr"> <em>Without side guide</em>
          <div class="select-style">
            <select>
              <option value="SHORT">-- Choose --</option>
            </select>
          </div>
          <label class="rr code">
          <input type="radio" name="code" value="small" checked>
          <img src="<?php echo base_url('assets/html/images/clor1.png')?>" alt="">
          <p>C8302</p>
          <span></span>
          </label>
          <label class="rr code">
          <input type="radio" name="code" value="big">
          <img src="<?php echo base_url('assets/html/images/clor2.png')?>" alt="">
          <p>D8553</p>
          <span></span>
          </label>
          <label class="rr code">
          <input type="radio" name="code" value="big">
          <img src="<?php echo base_url('assets/html/images/clor3.png')?>" alt="">
          <p>D8502</p>
          <span></span>
          </label>
        </div> -->
          
          <div class="sleDiv">
            <h2>Quantity</h2>
            <div class="sp-quantity">
              <div class="sp-minus fff"> <a class="ddd" href="javascript:void(0)">-</a> </div>
              <div class="sp-input">
                <input type="text" name="qty" class="quntity-input" value="1" />
              </div>
              <div class="sp-plus fff"> <a class="ddd" href="javascript:void(0)">+</a> </div>
            </div>
            <button class="btn Cart_btn" data-toggle="modal" data-target="#myModal">Add to Cart</button>
          </div>
          <input type="hidden" name="id" value="<?php echo $product->id ?>">
          <?php echo form_close(); ?> </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
		$(document).ready(function(){

             $('.quntity-input').keyup(function () { 
                  this.value = this.value.replace(/[^0-9\.]/g,'');
              });



			        /*************************** Default Product price **************/

			                var fd = new FormData();
			                fd.append('variations', '<?php echo json_encode($variations); ?>');
			                fd.append('matchedVariations', '<?php  echo json_encode($selected_varaiations); ?>');
			                fd.append('base_price', '<?php  echo number_format($product->price); ?>');
			                var request = $.ajax({
			                  url: "<?php echo base_url('index.php/product/fetchVariation/'); ?>",
			                  type: "POST",
			                  data: fd ,
			                  contentType: false , 
			                  processData: false,

			                });

			                request.done(function(msg) {
			                   var obj = JSON.parse(msg);

			                   console.log(obj['current_price']);
			                   var price = obj['current_price'];
			                   $("#price").html(price);
			                   $("#current_price").val(price);
			                   console.log(obj['curent_qty']);
			                 
			                });

			                request.fail(function(jqXHR, textStatus) {
			                  alert( "Request failed: " + textStatus );
			                });


			        /*************************** Default Product price **************/







					$(document).on('change', 'input[type=radio]',  function() {

						var selectedVariations = [];

						var val = $(this).val();


			            $('#myform input:checked, #myform select option:selected').each(
						    function(index){  
						        var input = $(this);
						        //alert('Type: ' + input.attr('type') + 'Name: ' + input.attr('name') + 'Value: ' + input.val());
						        var myText = $(input).val().toLowerCase();
      							var newMyText = myText.replace(/ /g,'');
						        selectedVariations.push(newMyText);
						    }
						);
                     
                        console.log(selectedVariations);
                    
			            //return false;
			      
			            if(val == '') {
			                     alert('Please choose proper attributes!'); 
			                     return false;
			            }  else {

			                var fd = new FormData();
			                fd.append('variations', '<?php echo json_encode($variations); ?>');
			                fd.append('matchedVariations', JSON.stringify(selectedVariations));
			                fd.append('base_price', '<?php  echo number_format($product->price); ?>');
			                var request = $.ajax({
			                  url: "<?php echo base_url('index.php/product/fetchVariation/'); ?>",
			                  type: "POST",
			                  data: fd ,
			                  contentType: false , 
			                  processData: false,

			                });

			                request.done(function(msg) {
			                   var obj = JSON.parse(msg);

			                   console.log(obj['current_price']);
			                   var price = obj['current_price'];
			                   $("#price").html(price);
                         $("#current_price").val(price);
			                   console.log(obj['curent_qty']);
			                 
			                });

			                request.fail(function(jqXHR, textStatus) {
			                  alert( "Request failed: " + textStatus );
			                });

			            }
			        

			        });




			        $(document).on('change', 'input[type=checkbox]',  function() {

			        	$('input[type=checkbox]').not(this).prop('checked', false);  

						var selectedVariations = [];

						var val = $(this).val();


			            $('#myform input:checked, #myform select option:selected').each(
						    function(index){  
						        var input = $(this);
						        //alert('Type: ' + input.attr('type') + 'Name: ' + input.attr('name') + 'Value: ' + input.val());
						        var myText = $(input).val().toLowerCase();
      							var newMyText = myText.replace(/ /g,'');
						        selectedVariations.push(newMyText);
						    }
						);
                     
                        console.log(selectedVariations);
                    
			            //return false;
			      
			            if(val == '') {
			                     alert('Please choose proper attributes!'); 
			                     return false;
			            }  else {

			                var fd = new FormData();
			                fd.append('variations', '<?php echo json_encode($variations); ?>');
			                fd.append('matchedVariations', JSON.stringify(selectedVariations));
			                fd.append('base_price', '<?php  echo number_format($product->price); ?>');
			                var request = $.ajax({
			                  url: "<?php echo base_url('index.php/product/fetchVariation/'); ?>",
			                  type: "POST",
			                  data: fd ,
			                  contentType: false , 
			                  processData: false,

			                });

			                request.done(function(msg) {
			                   var obj = JSON.parse(msg);

			                   console.log(obj['current_price']);
			                   var price = obj['current_price'];
			                   $("#price").html(price);
                         $("#current_price").val(price);
			                   console.log(obj['curent_qty']);
			                 
			                });

			                request.fail(function(jqXHR, textStatus) {
			                  alert( "Request failed: " + textStatus );
			                });

			            }
			        

			        });




			        $(document).on('change', 'select',  function() {

						var selectedVariations = [];

						var val = $(this).val();


			            $('#myform input:checked, #myform select option:selected').each(
						    function(index){  
						        var input = $(this);
						        //alert('Type: ' + input.attr('type') + 'Name: ' + input.attr('name') + 'Value: ' + input.val());
						        var myText = $(input).val().toLowerCase();
      							var newMyText = myText.replace(/ /g,'');
						        selectedVariations.push(newMyText);
						    }
						);
                     
                        console.log(selectedVariations);
                    
			            //return false;
			      
			            if(val == '') {
			                     alert('Please choose proper attributes!'); 
			                     return false;
			            }  else {

			                var fd = new FormData();
			                fd.append('variations', '<?php echo json_encode($variations); ?>');
			                fd.append('matchedVariations', JSON.stringify(selectedVariations));
			                fd.append('base_price', '<?php  echo number_format($product->price); ?>');
			                var request = $.ajax({
			                  url: "<?php echo base_url('index.php/product/fetchVariation/'); ?>",
			                  type: "POST",
			                  data: fd ,
			                  contentType: false , 
			                  processData: false,

			                });

			                request.done(function(msg) {
			                   var obj = JSON.parse(msg);

			                   console.log(obj['current_price']);
			                   var price = obj['current_price'];
			                   $("#price").html(price);
                         $("#current_price").val(price);
			                   console.log(obj['curent_qty']);
			                 
			                });

			                request.fail(function(jqXHR, textStatus) {
			                  alert( "Request failed: " + textStatus );
			                });

			            }
			        

			        });


			        $(document).on('keyup', 'input[type=text]',  function() {

			        	var value = $(this).val();

    
			        	var min = $(this).data("min");
			        	var max = $(this).data("max");

                $(this).removeClass('error');
                $(this).parent().removeClass('error');

			        	if(value < min || value > max){
                           // alert("Min:"+min+","+"Max:"+max);
                           $(this).addClass('error');
                          $(this).parent().addClass('error');
			        	}

			        	

			        }); 	

		});
	</script> 
