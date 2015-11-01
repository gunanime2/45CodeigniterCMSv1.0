<div class='col-sm-12'>
	<h2>Update</h2>
	<small> admin > update</small>
<div class='row'>
	<div class='col-sm-12 bg-info' id='stage'>
	</div>
</div>
	<div class='form-group'>
		<label for='post_title'>Title:</label>
		<input value='<?php echo $post['title'];?>' type='text' class='form-control' name='post_title' id='post_title' >
		<input type='text' name='url' id='url' value='<?php echo $post['url'];?>' style='visibility:hidden;'/>
	</div>
	<?php if($post['image_url']){
	//if the post have an image show this section?>
		<div class='form-group'>
			<div class='row'>
				<div class='col-sm-12 bg-info' id='image_result_stage' style='display:none;'>
					
				</div>
				<div class='col-sm-12 img-wrapper'>
					<label for='post_image'>Image:</label>
					<br/>
					<img style="width:150px;" src='<?php echo base_url().'images/uploads/'.$post['image_url'];?>' id='image' name='<?php echo $post['image_url'];?>'/>
					<br/>
					<br/>
					<button class='btn' id='show_remove_image_btn'>Remove Image</button>
					<div id='remove_image_final_btn_wrapper' style='display:none;'>
						<p>
							Are you sure you want to remove this image?
						</p>
						<button class='btn' id='remove_image'>Yes</button>
						<button class='btn' id='remove_image_cancel'>Cancel</button>
					</div>
				</div>
			</div>
			<div class='row'>
				<div class='col-sm-12 img_upload_form' style='display:none;'>
					<form id="update_image" method="post" enctype="multipart/form-data">
						<label for='image_update'>Select Image:</label>
						<input type='text' name='url' id='url' value='<?php echo $post['url'];?>' style='visibility:hidden;'/>
						<input type='file' name='image_update' id='image_update'/>
						<br/>
						<button class='btn btn-info' id='upload_new_image' style='display:none;'>Upload</button>
					</form>
				</div>
			</div>
		</div>
	<?php }?>
	<div class='form-group'>
		<label for='post_content'>Content:</label>
		<textarea rows='10' class='form-control' name='post_content' id='post_content' ><?php echo $post['content'];?></textarea>
	</div>
	<div class='form-group'>
			<label>Type:</label>
			<select class='form-control' name='post_type' id='post_type'>
				<option value='Normal' <?php if($post['type'] == 'Normal'){echo "selected = 'selected'";}?>>Normal</option>
				<option value='Sticky' <?php if($post['type'] == 'Sticky'){echo "selected = 'selected'";}?>>Sticky</option>
				<option value='Featured' <?php if($post['type'] == 'Featured'){echo "selected = 'selected'";}?>>Featured</option>
			</select>
		</div>
	<div class='form-group'>
		<label for='post_labels'>Labels:</label>
		<input value='<?php echo $post['labels'];?>' type='text' class='form-control' name='post_labels' id='post_labels' >
	</div>
	<div class='form-group'>
		<button class='btn btn-success' type='button' id='show_update_post_buttons'>Update</button>
		<div id='hidden_update_buttons' style='display:none;'>
			<p>
				Please confirm if you really want to proceed with this update.
			</p>
			<button class='btn btn-success' type='button' id='update_post'>Confirm</button>
			<button class='btn btn-warning' type='button' id='update_post_cancel'>Cancel</button>
		</div>
	</div>
</div>