<fieldset>
    <div class="form-group<?php echo (form_error('name')) ? ' has-error' : ''; ?>">
        <label for="name">Name *</label>
        <?php echo form_input('name', (isset($record))? set_value("name", $record->name) : set_value("name"), array('class' => 'form-control', 'placeholder' => 'Page name', 'id' => 'name')); ?>
        <?php echo form_error('name', '<span class="help-block">', '</span>') ?>
    </div>

    <div class="form-group<?php echo (form_error('cover_image')) ? ' has-error' : ''; ?>">
        <label for="cover_image">Cover Image *</label>
        <input type="file" name="cover_image" class="form-control" id="cover_image"/>
        <?php echo form_error('cover_image', '<span class="help-block">', '</span>') ?>
    </div>

   
     <div class="form-group<?php echo (form_error('description')) ? ' has-error' : ''; ?>">
        <label for="description">Description *</label>

        <?php echo form_textarea('description', (isset($record))? $record->description : set_value("description"), array('class' => 'form-control ckeditor', 'placeholder' => 'Description', 'id' => 'description')); ?>
        <?php echo form_error('description', '<span class="help-block">', '</span>') ?>

    </div>



</fieldset>

