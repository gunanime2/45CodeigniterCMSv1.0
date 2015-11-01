<h1><?php echo $post['title']?></h1>
<p><i><?php echo $post['date'];?></i></p>
<div class='row'>
	<?php if($post['image_url']){?>
		<div class='col-sm-12 text-center'>
			<img class='img-responsive' src='<?php echo base_url().'images/uploads/'.$post['image_url'];?>'/>
		</div>
	<?php }?>
	<div class='col-sm-12 text-justify'>
		<?php echo $post['content'];?>
	</div>
</div>