<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>45 CodeIgniter Extension Install</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class='bg-info'>
	<div class='container-fluid' style='max-width:700px;'>
		<div class='row'>
			<div class='col-sm-12'>
				<h1>Install 45 CodeIgniter Extension</h1>
				<p>It seems like this is your first time opening this project. 
					Fill out the form bellow and click the install button to start 
					the installation process.
				</p>
				<p>
					This installation process would make this project have the basic CRUD
					functionalities. Helping you develop applications and websites faster.
				</p>
			</div>
		</div>
		
		<div class='row'>
			<div class='col-sm-8' id='form'>
				<div class="form-group">
					<label for="database_name">Database name</label>
					<input type="text" class="form-control" name="database_name" id="database_name" placeholder="Database name">
					<p>Please make sure that this database is already installed in the server.</p>
				</div>
				<div class="form-group">
					<label for="host_name">Host name</label>
					<input type="text" class="form-control" name='host_name' id="host_name" placeholder="Host name">
				</div>
				<div class="form-group">
					<label for="user_name">User name</label>
					<input type="text" class="form-control" name='user_name' id="user_name" placeholder="User name">
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" class="form-control" name='password' id="password" placeholder="Password">
				</div>
				<p>
					Also fill up the form below for the administrators account.
				</p>
				<div class='form-group'>
					<label for='admin_username'>Admin Username</label>
					<input type='text' class='form-control' id='admin_username' name='admin_username'/>
				</div>
				<div class='form-group'>
					<label for='admin_password'>Admin Password</label>
					<input type='password' class='form-control' id='admin_password' name='admin_password'/>
				</div>
				<div class='form-group'>
					<label for='admin_email'>Admin Email</label>
					<input type='email' class='form-control' id='admin_email' name='admin_email'/>
				</div>
				<div class='form-group'>
					<label for='admin_name'>Admin Codename</label>
					<input type='text' class='form-control' id='admin_name' name='admin_name'/>
				</div>
				<a type="button" href="#install_wrapper" class="btn btn-info" onclick="$(this).hide();$(this).next('div').show(500);">Submit</a>
				<div class="form-group div-install" id="install_wrapper" style='display:none;'>
					<a type="submit" id="install" class="btn btn-success" href="#stage">Install</a>
					<p>
						Please review the data you have entered, when ready click on the <strong>Install</strong> button.
					</p>
				</div>
			</div>
			<div class='col-sm-4 bg-warning'>
				<h3>Beta Version</h3>
				<p>This is the very first version of this CodeIgniter extension.</p>
				<p>After a successful installation, your application will now have the basic CRUD 
				functionalities.</p>
			</div>
			<div class='col-sm-12 jumbotron text-success' id='stage' style='display:none;'>
			</div>
		</div>
	</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	<script type='text/javascript'>
		$(document).ready(function(){
			$("#install").click(function(e){
				var host_name = document.getElementById("host_name").value;
				var user_name = document.getElementById("user_name").value;
				var database_name = document.getElementById("database_name").value;
				var password = document.getElementById("password").value;
				var admin_name = document.getElementById("admin_name").value;
				var admin_password = document.getElementById("admin_password").value;
				var admin_username = document.getElementById("admin_username").value;
				var admin_email = document.getElementById("admin_email").value;
				if(host_name === "" && user_name === "" && database_name === ""){
					return;
				}else{
					$("#send").prop('disabled', true);
					$("#user_send_message").prop('disabled', true);
					$.ajax({
						type: "post",
						url: "./install/start_install",
						data: "host_name="+host_name+"&user_name="+user_name+"&database_name="+database_name+"&password="+password+"&admin_name="+admin_name+"&admin_password="+admin_password+"&admin_username="+admin_username+"&admin_email="+admin_email,
						success: function(data){
								$('#stage').hide();
								var stage = document.getElementById('stage');
								stage.innerHTML = data;
								$('#stage').hide(function(){
									$('#stage').show('slow');
								});
						}
					});
				}
			});
		});
	</script>
  </body>
</html>