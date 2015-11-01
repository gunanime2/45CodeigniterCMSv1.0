<div class='col-sm-12'>
	<?php foreach ($posts as $post):?>
	<div class='row'>
		<div class='col-sm-12'>
			<h3><a href='<?php echo base_url().$post['url'];?>'><?php echo $post['title'];?></a></h3>
		</div>
		<?php if($post['image_url']){?>
		<div class='col-sm-4'>
				<img src='<?php echo base_url().'images/uploads/'.$post['image_url'];?>' style='width:100%;'/>
		</div>
		<div class='col-sm-8 text-justify'>
			<?php echo word_limiter(strip_tags($post['content'], 200));?>
		<br/>
		<a href='<?php echo base_url().$post['url'];?>'>Read more...</a>
		</div>
		<?php }else{?>
		
		<div class='col-sm-12 text-justify'>
			<?php echo word_limiter(strip_tags($post['content'], 200));?>
		<br/>
		<a href='<?php echo base_url().$post['url'];?>'>Read more...</a>
		</div>
		<?php }?>
	</div>
	<?php endforeach?>
</div>