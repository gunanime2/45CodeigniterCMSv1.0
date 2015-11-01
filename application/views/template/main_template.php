<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php 
	
	if(!empty($title)){
		echo $title;
	}elseif(!empty($post['title'])){
		echo $post['title'];
	}
	?> 
	| 45 CMS CodeIgniter Extension
	</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet">
	
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	<!--My CSS-->
	<link href="<?php echo base_url();?>css/style.css" rel="stylesheet">
  </head>
  <body style='background-color:lightblue;'>
    <div class='container-fluid' style='max-width:900px;'>
		<header>
			<nav class='navbar navbar-inverse'>
				<div class='container-fluid'>
					<div class='navbar-header'>
						<button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#myNavbar'>
							<span class='icon-bar'></span>
							<span class='icon-bar'></span>
							<span class='icon-bar'></span>
						</button>
						<a class='navbar-brand' href='<?php echo base_url(); ?>'>45 CMS</a>
					</div>
					<div class='collapse navbar-collapse' id='myNavbar'>
						<ul class='nav navbar-nav'>
							<li><a href='<?php echo base_url(); ?>'>Home</a></li>
							<li><a href='<?php echo base_url(); ?>download_0'>Download</a></li>
							<li><a href='<?php echo base_url(); ?>about_1'>About</a></li>
							<?php if($this->session->userdata('user_validated')){?>
							<li><a href='<?php echo base_url().'dashboard';?>'>Dashboard</a></li>
							<li><a href='<?php echo base_url().'logout';?>'>Log Out</a></li>
							<?php }?>
						</ul>
					</div>
				</div>
			</nav>
		</header>
		
		<article>
			<?php 
			if(!empty($featured)){ ?>
			<!--carousel-->
				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
				  <!-- Indicators -->
				  <ol class="carousel-indicators">
					<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
					<li data-target="#carousel-example-generic" data-slide-to="1"></li>
					<li data-target="#carousel-example-generic" data-slide-to="2"></li>
				  </ol>
					<div class="carousel-inner" role="listbox">
						<?php	
							$active = 1;
							foreach($featured as $post):?>
						<!-- Wrapper for slides -->
						<div class="<?php if($active>0){echo 'item active'; $active--;}else{echo 'item';}?>">
							<img class='img-responsive' src="<?php echo base_url().'images/uploads/'.$post['image_url'];?>" alt="..." style='width:100%; height: 400px; max-height: 400px;'>
							<div class="carousel-caption">
								<h3><?php echo $post['title'];?></h3>
								<p><?php echo word_limiter(strip_tags($post['content']), 20);?></p>
								<i><a href='<?php echo base_url().$post['url'];?>'>Read more...</a></i>
							</div>
						</div>
						<?php endforeach ?>
					</div>
				  <!-- Controls -->
				  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				  </a>
				  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				  </a>
				</div>
			<!---->
			<?php }?>
			<?php //if there are sticky posts show the sticky post panel
			if(!empty($sticky)){?>
			<br/>
			<div class='row'>
				<?php foreach($sticky as $post):?>
					<div class='col-sm-3'>
						<div class='panel panel-info'>
							<div class='panel-heading'>
								<b><?php echo $post['title'];?></b>
							</div>
							<div class='panel-content'>
								<?php echo word_limiter(strip_tags($post['content']), 20);?>
							</div>
							<div class='panel-footer'>
								<a class='btn btn-info' href='<?php echo base_url().$post['url'];?>'>Read</a>
							</div>
						</div>
					</div>
				<?php endforeach?>
			</div>
			<?php }?>
			<?php echo $body;?>
			<?php if(!empty($side_bar)){echo $side_bar;}?>
		</article>
		
		<footer>
			<div class='row'>
				<div class='col-sm-12 text-center'>
					<small>iLisondra 2015</small>
				</div>
			</div>
		</footer>
	</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>js/script.js"></script>
	<!--wysywig-->
	<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
	<script>tinymce.init({selector: "textarea",
    theme: "modern",
    plugins: [
        "advlist autolink lists link print hr anchor",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
    toolbar2: "print preview media | forecolor backcolor emoticons",
    image_advtab: true,
    templates: [
        {title: 'Test template 1', content: 'Test 1'},
        {title: 'Test template 2', content: 'Test 2'}
    ]});</script>
  </body>
</html>