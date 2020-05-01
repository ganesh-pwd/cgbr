<style>
#card-area {
	margin-bottom:20px;
}
.admin-from {
	width: 100%;
	float: left;
	padding: 10px 20px;
	margin-bottom:30px;
	margin-top: 7px;
}

.admin-from ul {
	padding:0;
}
.admin-from ul li {
	list-style-type:none;
}
.admin-from .form-group label:first-child {
	margin-right:20px;
}
.admin-from ul li {
	margin-bottom: 15px;
}



.accordion_container {
    width: 100%;
    border: 1px solid #ccc;
    float: left;
    box-shadow: 0 0 5px rgba(148, 148, 148, 0.125), 0 1px 3px rgba(82, 82, 82, 0.2);
    border-top: 4px solid #ccc;
	margin-bottom: 15px;
}

.accordion_head {
    background-color: white;
    color: black;
    cursor: pointer;
    font-family: arial;
    font-size: 14px;
    margin: 0 0 1px 0;
    padding: 10px 15px;
	font-weight: bold;
}

.accordion_body {
    background: white;
}

.accordion_body p {
  padding: 18px 5px;
  margin: 0px;
}

.plusminus {
  float: right;
}

</style>


<fieldset>
  <div class="form-group<?php echo (form_error('name')) ? ' has-error' : ''; ?>">
    <label for="name">Name *</label>
    <?php echo form_input('name', (isset($record))? set_value("name", $record->name) : set_value("name"), array('class' => 'form-control', 'placeholder' => 'Attribute Set name', 'id' => 'name')); ?> <?php echo form_error('name', '<span class="help-block">', '</span>') ?> </div>

  
  <div class="form-group<?php echo (form_error('description')) ? ' has-error' : ''; ?>">
    <label for="description">Name *</label>
    <?php echo form_textarea('description', (isset($record))? set_value("description", $record->description) : set_value("description"), array('class' => 'form-control', 'placeholder' => 'Attribute Set description', 'id' => 'description')); ?> <?php echo form_error('description', '<span class="help-block">', '</span>') ?> </div>


  <div class="form-group<?php echo (form_error('price')) ? ' has-error' : ''; ?>">
    <label for="price">Attribute Type</label>
    <?php
                        $select_attribute_type = array("text" => "Input" , "radio" => "Default Radio Box" , "checkbox" => "Default Check Box" , "select" => "Default Select Box" , "radio_images" => "Radio Box with Images" , "color_box" => "Color Box" , "text_range" => "Input with Range");
                        /*foreach ($categories as $category){
                            $select_categories[$category['id']] = $category['name'];
                        }*/ ?>
    <?php echo form_dropdown('parent_id',array(''=>'Chosoe One')+$select_attribute_type, (isset($record))? set_value("parent_id") : set_value("parent_id"), array('class' => 'form-control', 'placeholder' => '5000', 'id' => 'price')); ?> <?php echo form_error('price', '<span class="help-block">', '</span>') ?> </div>
  
  <!-- general form elements -->
  
  <div id="card-area"> </div>
  <!-- /.card -->


  <script type="text/javascript">
    
/*var counterText = 0;
var counterRadioButton = 0;
var counterCheckBox = 0;
var counterSelect = 0;*/


  </script>

  <?php

  /*if(isset($record)){

    $details = unserialize($record->details);

    foreach ($details as $key => $detail) {

      if($detail['field_type'] == 'text') { print_r($detail); ?>

        <script type="text/javascript">
          var newdiv = document.createElement('div');

        newdiv.innerHTML = "<input type='hidden' value='text' class='form-control' name='details[myInputButtons"+(counterText + 1)+"][field_type]'><div class='accordion_container'><div class='accordion_head'><span>"+ "<?php echo $detail['field_name'];  ?>" +"</span><span class='plusminus'>-</span></div><div class='accordion_body' style='display: block;'><div class='admin-from'><ul><li><label for='usr'>Field Name:</label><input value='<?php echo $detail['field_name'];  ?>' type='text' name='details[myInputButtons"+(counterText + 1)+"][field_name]' class='form-control field_name' ></li><li><li><label for='usr'>Instructions:</label><textarea name='details[myInputButtons"+(counterText + 1)+"][field_instruction]' type='text' class='form-control' rows='4' > <?php echo $detail['field_instruction'];  ?> </textarea></li><li><label for='usr'>Required?</label><label class='radio-inline'><input <?php if($detail['field_required_status'] == 'on') { echo 'checked'; }   ?> value='on' type='radio' name='details[myInputButtons"+(counterText + 1)+"][field_required_status]' >Yes</label><label class='radio-inline'><input <?php if($detail['field_required_status'] == 'off') { echo 'checked'; }   ?> value='off' type='radio' name='details[myInputButtons"+(counterText + 1)+"][field_required_status]'>No</label></li><li><label for='usr'> Default Value </label><input type='text' value='<?php echo $detail['field_default_value'];  ?>' class='form-control' name='details[myInputButtons"+(counterText + 1)+"][field_default_value]'></li><li><label for='usr'> Placeholder Text </label><input value='<?php echo $detail['field_placeholder'];  ?>'  type='text' class='form-control' name='details[myInputButtons"+(counterText + 1)+"][field_placeholder]'></li><li><label for='usr'> prepend </label><input value='<?php echo $detail['field_prepand'];  ?>' type='text' class='form-control' name='details[myInputButtons"+(counterText + 1)+"][field_prepand]'></li><li><label for='usr'> Append </label><input type='text' value='<?php echo $detail['field_append'];  ?>' class='form-control' name='details[myInputButtons"+(counterText + 1)+"][field_append]'></li></ul></div> <div class='borderdiv-part' style='display: block;'></div></div></div>";
            
          counterText++;  

        document.getElementById("card-area").appendChild(newdiv);

        </script>


  
      <?php  echo "text"; print_r($detail);

      } else if($detail['field_type'] == 'select') { echo "select"; print_r($detail); ?>

       <script type="text/javascript">
          var newdiv = document.createElement('div');

        newdiv.innerHTML = "<input type='hidden' value='text' class='form-control' name='details[myInputButtons"+(counterText + 1)+"][field_type]'><div class='accordion_container'><div class='accordion_head'><span>"+ "<?php echo $detail['field_name'];  ?>" +"</span><span class='plusminus'>-</span></div><div class='accordion_body' style='display: block;'><div class='admin-from'><ul><li><label for='usr'>Field Name:</label><input value='<?php echo $detail['field_name'];  ?>' type='text' name='details[myInputButtons"+(counterText + 1)+"][field_name]' class='form-control field_name' ></li><li><li><label for='usr'>Instructions:</label><textarea name='details[myInputButtons"+(counterText + 1)+"][field_instruction]' type='text' class='form-control' rows='4' > <?php echo $detail['field_instruction'];  ?> </textarea></li><li><label for='usr'>Required?</label><label class='radio-inline'><input <?php if($detail['field_required_status'] == 'on') { echo 'checked'; }   ?> value='on' type='radio' name='details[myInputButtons"+(counterText + 1)+"][field_required_status]' >Yes</label><label class='radio-inline'><input <?php if($detail['field_required_status'] == 'off') { echo 'checked'; }   ?> value='off' type='radio' name='details[myInputButtons"+(counterText + 1)+"][field_required_status]'>No</label></li><li><label for='usr'> Default Value </label><input type='text' value='<?php echo $detail['field_default_value'];  ?>' class='form-control' name='details[myInputButtons"+(counterText + 1)+"][field_default_value]'></li><li><label for='usr'> Placeholder Text </label><input value='<?php echo $detail['field_placeholder'];  ?>'  type='text' class='form-control' name='details[myInputButtons"+(counterText + 1)+"][field_placeholder]'></li><li><label for='usr'> prepend </label><input value='<?php echo $detail['field_prepand'];  ?>' type='text' class='form-control' name='details[myInputButtons"+(counterText + 1)+"][field_prepand]'></li><li><label for='usr'> Append </label><input type='text' value='<?php echo $detail['field_append'];  ?>' class='form-control' name='details[myInputButtons"+(counterText + 1)+"][field_append]'></li></ul></div> <div class='borderdiv-part' style='display: block;'></div></div></div>";


        document.getElementById("card-area").appendChild(newdiv);

        </script>

      <?php } else if($detail['field_type'] == 'radio') { echo "radio"; print_r($detail);

      }  else if($detail['field_type'] == 'checkbox') { echo "checkbox"; print_r($detail);

      }  




     
    }

  }*/

  ?>
  
  
</fieldset>


<script>
$(document).ready(function() {
  //toggle the component with class accordion_body
  $(document).on('click', '.accordion_head',  function() {
    if ($('.accordion_body').is(':visible')) {
      $(".accordion_body").slideUp(300);
      $(".plusminus").text('+');
    }
    if ($(this).next(".accordion_body").is(':visible')) {
      $(this).next(".accordion_body").slideUp(300);
      $(this).children(".plusminus").text('+');
    } else {
      $(this).next(".accordion_body").slideDown(300);
      $(this).children(".plusminus").text('-');
    }
  });



  $(document).on('keyup', '.field_name',  function() {

    var content = $(this).val();

    var data = $(this).closest(".accordion_container").find(".accordion_head span:first").text(content);
    

  });  






});
</script>


<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight){
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}
</script>


<script type="text/javascript">
    $(document).ready(function(){

        $("span.cloneCardArea").click(function(){
           
            $("div.card-area").append($(this).parent().parent().parent().clone());

        });


        $("#price").change(function(){
            var value = $(this).val();
            //alert(value);
            addAllInputs('card-area',value);
        });




    });




var counterText = 0;
var counterRadioButton = 0;
var counterCheckBox = 0;
var counterSelect = 0;
var counterTextRange = 0;
function addAllInputs(divName, inputType){
     var newdiv = document.createElement('div');
     switch(inputType) {
          case 'text':
               newdiv.innerHTML = "<input type='hidden' value='text' class='form-control' name='details[myInputButtons"+(counterText + 1)+"][field_type]'><div class='accordion_container'><div class='accordion_head'><span>"+ "Entry " +(counterText + 1) +"</span><span class='plusminus'>-</span></div><div class='accordion_body' style='display: block;'><div class='admin-from'><ul><li><label for='usr'>Field Name:</label><input type='text' name='details[myInputButtons"+(counterText + 1)+"][field_name]' class='form-control field_name' ></li><li><li><label for='usr'>Instructions:</label><textarea name='details[myInputButtons"+(counterText + 1)+"][field_instruction]' type='text' class='form-control' rows='4' > </textarea></li><li><label for='usr'>Required?</label><label class='radio-inline'><input type='radio' name='details[myInputButtons"+(counterText + 1)+"][field_required_status]' checked>Yes</label><label class='radio-inline'><input type='radio' name='details[myInputButtons"+(counterText + 1)+"][field_required_status]'>No</label></li><li><label for='usr'> Default Value </label><input type='text' class='form-control' name='details[myInputButtons"+(counterText + 1)+"][field_default_value]'></li><li><label for='usr'> Placeholder Text </label><input type='text' class='form-control' name='details[myInputButtons"+(counterText + 1)+"][field_placeholder]'></li></ul></div> <div class='borderdiv-part' style='display: block;'></div></div></div>";
               counterText++;
               break;
          case 'radio':
               newdiv.innerHTML = "<input type='hidden' value='radio' class='form-control' name='details[myRadioButtons"+(counterRadioButton + 1)+"][field_type]'><div class='accordion_container'> <div class='accordion_head'><span>"+ "Entry " +(counterRadioButton + 1) +"</span><span class='plusminus'>-</span></div> <div class='accordion_body' style='display: none;'> <div class='admin-from'> <ul> <li> <label for='usr'>Field Name:</label> <input type='text' class='form-control field_name' name='details[myRadioButtons"+(counterRadioButton + 1)+"][field_name]'> </li> <li> <label for='usr'>Instructions:</label> <textarea type='text' class='form-control' rows='4' name='details[myRadioButtons"+(counterRadioButton + 1)+"][field_instruction]'> </textarea> </li> <li> <label for='usr'>Required?</label> <label class='radio-inline'> <input type='radio' name='details[myRadioButtons"+(counterRadioButton + 1)+"][field_required_status]' checked> Yes</label> <label class='radio-inline'> <input type='radio' name='details[myRadioButtons"+(counterRadioButton + 1)+"][field_required_status]'> No</label> </li> <li> <label for='usr'>choices(key1:label1|key2:label2)</label> <textarea type='text' class='form-control' rows='4' name='details[myRadioButtons"+(counterRadioButton + 1)+"][field_choices]'> </textarea> </li> <li> <label for='usr'> Default Value </label> <textarea type='text' class='form-control' rows='4' name='details[myRadioButtons"+(counterRadioButton + 1)+"][field_default_value]'> </textarea> </li> </ul> </div> <div class='borderdiv-part' style='display: block;'> </div> </div></div>";
               counterRadioButton++;
               break;
          case 'checkbox':
               newdiv.innerHTML = "<input type='hidden' value='checkbox' class='form-control' name='details[myCheckBoxes"+(counterCheckBox + 1)+"][field_type]'><div class='accordion_container'> <div class='accordion_head'><span>"+ "Entry " +(counterCheckBox + 1) +"</span><span class='plusminus'>-</span></div> <div class='accordion_body' style='display: none;'> <div class='admin-from'> <ul> <li> <label for='usr'>Field Name:</label> <input type='text' class='form-control field_name' name='details[myCheckBoxes"+(counterCheckBox + 1)+"][field_name]'> </li> <li> <label for='usr'>Instructions:</label> <textarea type='text' class='form-control' rows='4' name='details[myCheckBoxes"+(counterCheckBox + 1)+"][field_instruction]'> </textarea> </li> <li> <label for='usr'>Required?</label> <label class='radio-inline'> <input type='radio' name='details[myCheckBoxes"+(counterCheckBox + 1)+"][field_required_status]' checked> Yes</label> <label class='radio-inline'> <input type='radio' name='details[myCheckBoxes"+(counterCheckBox + 1)+"][field_required_status]'> No</label> </li> <li> <label for='usr'>choices(key1:label1|key2:label2)</label> <textarea type='text' class='form-control' rows='4' name='details[myCheckBoxes"+(counterCheckBox + 1)+"][field_choices]'> </textarea> </li> <li> <label for='usr'> Default Value </label> <textarea type='text' class='form-control' rows='4' name='details[myCheckBoxes"+(counterCheckBox + 1)+"][field_default_value]'> </textarea> </li> </ul> </div> <div class='borderdiv-part' style='display: block;'> </div> </div></div>";
               counterCheckBox++;
               break;
          case 'select':
           newdiv.innerHTML = "<input type='hidden' value='select' class='form-control' name='details[mySelectAreas"+(counterSelect + 1)+"][field_type]'><div class='accordion_container'> <div class='accordion_head'><span>"+ "Entry " +(counterSelect + 1) +"</span><span class='plusminus'>-</span></div> <div class='accordion_body' style='display: none;'> <div class='admin-from'> <ul> <li> <label for='usr'>Field Name:</label> <input type='text' class='form-control field_name' name='details[mySelectAreas"+(counterSelect + 1)+"][field_name]'> </li> <li> <label for='usr'>Instructions:</label> <textarea type='text' class='form-control' rows='4' name='details[mySelectAreas"+(counterSelect + 1)+"][field_instruction]'> </textarea> </li> <li> <label for='usr'>Required?</label> <label class='radio-inline'> <input type='radio' name='details[mySelectAreas"+(counterSelect + 1)+"][field_required_status]' checked> Yes</label> <label class='radio-inline'> <input type='radio' name='details[mySelectAreas"+(counterSelect + 1)+"][field_required_status]'> No</label> </li> <li> <label for='usr'>choices(key1:label1|key2:label2)</label> <textarea type='text' class='form-control' rows='4' name='details[mySelectAreas"+(counterSelect + 1)+"][field_choices]'> </textarea> </li> <li> <label for='usr'> Default Value </label> <textarea type='text' class='form-control' rows='4' name='details[mySelectAreas"+(counterSelect + 1)+"][field_default_value]'> </textarea> </li> </ul> </div> <div class='borderdiv-part' style='display: block;'> </div> </div></div>";
               counterSelect++;
               break;
          case 'text_range':
               newdiv.innerHTML = "<input type='hidden' value='text_range' class='form-control' name='details[myInputRange"+(counterTextRange + 1)+"][field_type]'><div class='accordion_container'><div class='accordion_head'><span>"+ "Entry " +(counterTextRange + 1) +"</span><span class='plusminus'>-</span></div><div class='accordion_body' style='display: block;'><div class='admin-from'><ul><li><label for='usr'>Field Name:</label><input type='text' name='details[myInputRange"+(counterTextRange + 1)+"][field_name]' class='form-control field_name' ></li><li><li><label for='usr'>Instructions:</label><textarea name='details[myInputRange"+(counterTextRange + 1)+"][field_instruction]' type='text' class='form-control' rows='4' > </textarea></li><li><label for='usr'>Required?</label><label class='radio-inline'><input type='radio' name='details[myInputRange"+(counterTextRange + 1)+"][field_required_status]' checked>Yes</label><label class='radio-inline'><input type='radio' name='details[myInputRange"+(counterTextRange + 1)+"][field_required_status]'>No</label></li><li><label for='usr'> Default Value </label><input type='text' class='form-control' name='details[myInputRange"+(counterTextRange + 1)+"][field_default_value]'></li><li><label for='usr'> Placeholder Text </label><input type='text' class='form-control' name='details[myInputRange"+(counterTextRange + 1)+"][field_placeholder]'></li><li><label for='usr'> Minimum </label><input type='text' class='form-control' name='details[myInputRange"+(counterTextRange + 1)+"][field_minumum]'></li><li><label for='usr'> Maximum </label><input type='text' class='form-control' name='details[myInputRange"+(counterTextRange + 1)+"][field_maximum]'></li></ul></div> <div class='borderdiv-part' style='display: block;'></div></div></div>";
               counterTextRange++;
               break; 
          case 'radio_images':
               newdiv.innerHTML = "<input type='hidden' value='radio_images' class='form-control' name='details[myRadioImages"+(counterRadioButton + 1)+"][field_type]'><div class='accordion_container'> <div class='accordion_head'><span>"+ "Entry " +(counterRadioButton + 1) +"</span><span class='plusminus'>-</span></div> <div class='accordion_body' style='display: none;'> <div class='admin-from'> <ul> <li> <label for='usr'>Field Name:</label> <input type='text' class='form-control field_name' name='details[myRadioImages"+(counterRadioButton + 1)+"][field_name]'> </li> <li> <label for='usr'>Instructions:</label> <textarea type='text' class='form-control' rows='4' name='details[myRadioImages"+(counterRadioButton + 1)+"][field_instruction]'> </textarea> </li> <li> <label for='usr'>Required?</label> <label class='radio-inline'> <input type='radio' name='details[myRadioImages"+(counterRadioButton + 1)+"][field_required_status]' checked> Yes</label> <label class='radio-inline'> <input type='radio' name='details[myRadioImages"+(counterRadioButton + 1)+"][field_required_status]'> No</label> </li> <li> <label for='usr'>choices(key1:label1:image_path1|key2:label2:image_path2)</label> <textarea type='text' class='form-control' rows='4' name='details[myRadioImages"+(counterRadioButton + 1)+"][field_choices]'> </textarea> </li> <li> <label for='usr'> Default Value </label> <textarea type='text' class='form-control' rows='4' name='details[myRadioImages"+(counterRadioButton + 1)+"][field_default_value]'> </textarea> </li> </ul> </div> <div class='borderdiv-part' style='display: block;'> </div> </div></div>";
               counterRadioButton++;
               break; 
           case 'color_box':
               newdiv.innerHTML = "<input type='hidden' value='color_box' class='form-control' name='details[myColorBox"+(counterRadioButton + 1)+"][field_type]'><div class='accordion_container'> <div class='accordion_head'><span>"+ "Entry " +(counterRadioButton + 1) +"</span><span class='plusminus'>-</span></div> <div class='accordion_body' style='display: none;'> <div class='admin-from'> <ul> <li> <label for='usr'>Field Name:</label> <input type='text' class='form-control field_name' name='details[myColorBox"+(counterRadioButton + 1)+"][field_name]'> </li> <li> <label for='usr'>Instructions:</label> <textarea type='text' class='form-control' rows='4' name='details[myColorBox"+(counterRadioButton + 1)+"][field_instruction]'> </textarea> </li> <li> <label for='usr'>Required?</label> <label class='radio-inline'> <input type='radio' name='details[myColorBox"+(counterRadioButton + 1)+"][field_required_status]' checked> Yes</label> <label class='radio-inline'> <input type='radio' name='details[myRadioButtons"+(counterRadioButton + 1)+"][field_required_status]'> No</label> </li> <li> <label for='usr'>choices(key1:label1|key2:label2)</label> <textarea type='text' class='form-control' rows='4' name='details[myColorBox"+(counterRadioButton + 1)+"][field_choices]'> </textarea> </li> <li> <label for='usr'> Default Value </label> <textarea type='text' class='form-control' rows='4' name='details[myColorBox"+(counterRadioButton + 1)+"][field_default_value]'> </textarea> </li> </ul> </div> <div class='borderdiv-part' style='display: block;'> </div> </div></div>";
               counterRadioButton++;
               break;             
          }
     document.getElementById(divName).appendChild(newdiv);
}
    
</script> 
