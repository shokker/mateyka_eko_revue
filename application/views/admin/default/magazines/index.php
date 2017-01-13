<div class="row">
	<div class="col-md-12">
		<div class="box">
            <div class="box-header">
                <h3 class="box-title">MAGAZINES</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
            	<?php echo $this->session->flashdata('message');?>
            	<p><a class="btn btn-default" href="<?php echo site_url('admin/magazines/add')?>">New magazine</a></p>
                <table class="table table-bordered">
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Published</th>
                        <th>Author</th>
                        <th>Status</th>
                        <th style="width: 100px">Action</th>
                    </tr>
                    <?php if(!empty($magazines)):?>
                    	<?php foreach($magazines as $magazine):?>
		                    <tr>
		                        <td><?php echo $magazine['id']?></td>
		                        <td><?php echo $magazine['title']?></td>
		                        <td><?php echo $magazine['slug']?></td>
                                <td><?php echo $magazine['published_at']?></td>
                                <td><?php echo $magazine['username']?></td>
<!--                                post status je pole definovane v MY_controllery je to len pole -->
		                        <td><?php echo $post_status[$magazine['status']]?></td>
		                        <td>
		                        	<a href="<?php echo site_url('admin/magazines/delete/'.$magazine['id'])?>" onclick="return confirm('Are you sure?')"><span class="badge bg-red">delete</span></a>
		                        </td>
		                    </tr>
                    	<?php endforeach;?>
                	<?php else:?>
                		<tr><td colspan="5">No record found</td></tr>
                	<?php endif;?>
                </table>
            </div><!-- /.box-body -->
            <div class="box-footer clearfix">
                <?php echo $pagination ?>
            </div>
        </div><!-- /.box -->
	</div>
</div>