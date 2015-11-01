<h2>Registration Form</h2>
<div class='row'>
	<div class='col-sm-12' id='result-stage' style='display:none;'>
	</div>
</div>
<div class='row'>
	<div class='col-sm-4'>
		<form id="data" method="post" enctype="multipart/form-data">
			<input id='post_url' value='process_register' hidden/>
			<div class='form-group'>
				<label for='name'>Name</label>
				<input class='form-control' type='text' name='name' required/>		
			</div>
			<div class='form-group'>
				<label for='email'>Email</label>
				<input class='form-control' type='email' name='email' required/>
			</div>
			<div class='form-group'>
				<label for='username'>Username</label>
				<input class='form-control' type='text' name='username' id='username' required/>
			</div>
			<div class='form-group'>
				<label for='password'>Password</label>
				<input class='form-control' type='password' name='password' id='username' required/>
			</div>
			<div class='form-group'>
				<button class='btn btn-info' type='button' name='submit' id='submit-form'>Register</button>
			</div>
		</form>
	</div>
</div>