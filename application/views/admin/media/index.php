<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Home Page Media
            <small>List</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Media</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-xs-12">
                <div class="box">
                        <div class="box-body">
							<div class="box-header with-border">
								<div class="box-title">
									<a href="<?php echo base_url('index.php/admin/media/create') ?>" class="btn btn-success">
										Add new</a>
								</div>
							</div>
                            <?php $this->load->view('admin/partials/flash') ?>
                            <table class="table table-bordered">
                                <tbody>
                                <tr>
                                    <th>ID</th>
                                    <th>title</th>
                                    <th>Preview</th>
                                    <th>Path</th>
									<th>Action</th>
                                </tr>
                                <?php foreach ($media as $slider_image) : ?>
                                <tr>
                                    <td><?php echo $slider_image->id;?></td>
                                    <td><?php echo $slider_image->title;?></td>
                                    

									<td>
										<img src="<?php echo base_url('images/media/'.$slider_image->path) ?>" height="150">
									</td>
                                    <td>
                                        <span id="copyContent<?php echo $slider_image->id;?>"><?php echo base_url('images/media/'.$slider_image->path); ?></span> <button  onclick="copyToClipboard('#copyContent<?php echo $slider_image->id;?>' , this)" >Copy</button>
                                    </td>
                                    <td>
                                        <button data-toggle="modal" data-target = "#delete-modal<?php echo $slider_image->id ;?>" class="btn btn-danger btn-sm delete_record"><span class="glyphicon glyphicon-trash"></span></button>
                                    </td>
                                </tr>
                                    <!--                                Delete Modal-->
                                    <div class="modal modal-warning fade" id="delete-modal<?php echo $slider_image->id ;?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title">Delete</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure you want to delete?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                                                    <?php echo form_open(base_url('index.php/'.uri_string().'/delete/'.$slider_image->id)) ?>
                                                    <button type="submit" class="btn btn-outline">Yes</button>
                                                    <?php echo form_close() ?>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                </div>

            </div>
        </div>
    </section>
</div>


<script>
function copyToClipboard(element , me) {
 var $temp = $("<input>");
 $("body").append($temp);
 $temp.val($(element).html()).select();
 document.execCommand("copy");
 $temp.remove();
alert("Copied the Url: " + $(element).html());



}

</script>


