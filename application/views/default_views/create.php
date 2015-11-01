<div class='col-sm-12'>
	<h2>Create</h2>
	<small> admin > create</small>

	<div class='col-sm-12' id='stage'>
	</div>
	<form id="data" method="post" enctype="multipart/form-data">
		<div class='form-group'>
			<label for='post_title'>Title:</label>
			<input type='text' class='form-control' name='post_title' id='post_title' placeholder='Type title here...'>
		</div>
		<div class='form-group'>
			<label for='post_image'>Select photo:</label>
			<input type='file' name='post_image' id='post_image'>
		</div>
		<div class='form-group'>
			<label for='post_content'>Content:</label>
			<textarea rows='10' class='form-control' name='post_content' name='area3' id='post_content' placeholder='Type content here...'></textarea>
		</div>
		<div class='form-group'>
			<label>Type:</label>
			<select class='form-control' name='post_type' id='post_type'>
				<option>Normal</option>
				<option>Sticky</option>
				<option>Featured</option>
			</select>
		</div>
		<div class='form-group'>
			<label for='post_labels'>Labels:</label>
			<input type='text' class='form-control' name='post_labels' id='post_labels' placeholder='Type label/ labels here, separate labels by comma...'>
		</div>
		<div class='form-group'>
			<button class='btn btn-success' type='button' id='create_post'>Submit</button>
		</div>
	</form>
</div>