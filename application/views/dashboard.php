<div class='row'>
	<div class='container-fluid'>
		<h2>Admin Dashboard</h2>
		<div class='col-sm-12 result-stage' id='result-stage'style='display:none;'></div>
		<div class='col-sm-12'>
			<a class='btn btn-info' href='<?php echo base_url();?>create'>Create New Post</a>
		</div>
		<div class='col-sm-12 table-responsive'>
			<table class='table'>
				<tr>
					<td><strong>Post Id</strong></td><td><strong>Date Posted</strong></td><td><strong>Post Title</strong></td><td><strong>Type</strong></td><td><strong>Labels</strong></td><td><strong>Actions</strong></td>
				</tr>
				<?php foreach($posts as $post):?>
				<tr class='table-row'>
					<?php
						echo "<td>".$post['id']."</td>";
						echo "<td>".$post['date']."</td>";
						echo "<td>".$post['title']."</td>";
						echo "<td>".$post['type']."</td>";
						echo "<td>".$post['labels']."</td>";
						echo "<td><span style='display:none;'><a class='btn btn-danger confirm_delete' data='".base_url()."delete/".$post['url']."'>Confirm Delete</a>";
						echo " <a class='btn btn-warning cancel_delete'>Cancel</a></span>";
						echo " <a class='btn btn-info' href='".base_url().$post['url']."'>View</a>";
						echo " <a class='btn btn-info' href='".base_url()."update/".$post['url']."'>Edit</a>";
						echo " <a class='btn btn-info show_delete'>Delete</a></td>";
					?>
				</tr>
				<?php endforeach ?>
			</table>
		</div>
	</div>
</div>