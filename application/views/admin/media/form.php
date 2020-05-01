<fieldset>
    <div class="form-group<?php echo (form_error('title')) ? ' has-error' : ''; ?>">
        <label for="name">Title *</label>
        <?php echo form_input('title', (isset($record))? set_value("title", $record->title) : set_value("title"), array('class' => 'form-control', 'placeholder' => 'title', 'id' => 'title')); ?>
        <?php echo form_error('title', '<span class="help-block">', '</span>') ?>
    </div>

	<div class="form-group<?php echo (form_error('image')) ? ' has-error' : ''; ?>">
		<label for="image">Image *</label>
		<input type="file" name="image" class="form-control" id="image"/>
		<?php echo form_error('image', '<span class="help-block">', '</span>') ?>
	</div>
</fieldset>
