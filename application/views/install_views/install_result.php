<?php if($install_result){ ?>
	<h2 class='text-success'>Congratulations Installation Successful!</h2>
	<p>
		You can now add these settings to your config/database.php file.
		<br/>
		<ul>
			<li>Hostname: <?php echo $host_name;?></li>
			<li>Username: <?php echo $user_name;?></li>
			<li>Password: <?php echo $password;?></li>
			<li>Database: <?php echo $database_name;?></li>
		</ul>
		<br/>
		After applying these settings to you database.php file, you can now check out 
		your project.
	</p>
<?php	}else{ ?>
	<h2 class='text-danger'>Installation Failed!</h2>
	<p>Please review the form and click the install button again.</p>
<?php	} ?>