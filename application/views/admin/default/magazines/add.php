<div class="row">
	<div class="col-md-12">
		 <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">New Magazine</h3>
            </div><!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?php echo site_url('admin/magazines/add')?>" method="post" enctype="multipart/form-data">
                <div class="box-body">
                    <?php echo message_box(validation_errors(),'danger'); ?>
                    <div class="form-group">
                        <label for="magazine_name">Title</label>
                        <input type="text" name="title" class="form-control" id="magazine_name" placeholder="Title" value="<?php echo set_value('title');?>">
                    </div>
                    <div class="form-group">
                        <label for="magazine_body">Choose magazine file</label>
                        <input type="file" name="body" class="form-control" id="magazine_body"><?php echo set_value('body');?>
                    </div>
                    <div class="form-group">
                        <label for="magazine_status">Featured Image</label>
                        <input type="file" name="featured_image" class="form-control" id="magazine_status"><?php echo set_value('featured_image');?>
                    </div>
                    <div class="form-group">
                        <label for="post_name">Publish Date</label>
                        <input type="text" name="published_at" class="form-control datepicker" data-date-format="yyyy-mm-dd" id="publish_date" placeholder="Publish Date" value="<?php echo set_value('published_at');?>">
                    </div>
                    <?php if($this->ion_auth->is_admin()):?>
                    <div class="form-group">
                        <label for="post_status">Status</label>
                        <?php
                            echo form_dropdown('status',$post_status,set_value('status'),array('class' => 'form-control'));
                        ?>
                    </div>
                    <?php endif;?>
                </div><!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button> 
                    <button type="button" class="btn btn-default" onclick="javascript:history.back()">Back</button>
                </div>
            </form>
        </div><!-- /.box -->
	</div>
</div>

