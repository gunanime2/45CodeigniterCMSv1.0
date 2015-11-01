<?php if($install_result){ ?>
	<h2 class='text-success'>Congratulations Installation Successful!</h2>
	<p>
		You can now add these settings.
		<br/>
		<ul>
			<li>Set $route['default_controller'] = 'main_controller'</li>
		</ul>
	</p>
	<p>In the routes.php point the default_controller value from 'install_controller' to 'public_controller' or anywhere you want. 
		By doing so, you won't be redirected to this install form anymore.
	</p>
	<p>
		Click on this button to Login.
		<br/>
		<a class='btn btn-info form-control' href='<?php echo base_url();?>login'>Login</a>
	</p>
<?php	}else{ ?>
	<h2 class='text-danger'>Installation Failed!</h2>
	<p>Please review the form and click the install button again.</p>
<?php	} ?>