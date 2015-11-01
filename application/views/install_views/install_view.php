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
				<button type="button" class="btn btn-info" onclick="$(this).hide();$(this).next('div').show(500);">Submit</button>
				<div class="form-group div-install" style='display:none;'>
					<button type="submit" id="install" class="btn btn-success" >Install</button>
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
				var password = document.getElementById("password").value
				if(host_name === "" && user_name === "" && database_name === ""){
					return;
				}else{
					$("#install").prop('disabled', true);
					$.ajax({
						type: "post",
						url: "./install/start_install",
						data: "host_name="+host_name+"&user_name="+user_name+"&database_name="+database_name+"&password="+password,
						success: function(data){
								$('#stage').hide();
								var stage = document.getElementById('stage');
								stage.innerHTML = data;
								$('#stage').show(500);
								$("#install").prop('disabled', false);
						}
					});
				}
			});
		});
	</script>
  </body>
</html>