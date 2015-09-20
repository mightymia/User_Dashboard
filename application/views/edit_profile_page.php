<!DOCTYPE html>
<html>
<head>
	<meta name='viewport' content='width=device-width, initial-scale=1.0'> 
	<meta charset='utf-8'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src='http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js'></script> 
	<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js'></script>
	<title>Edit Profile</title>
</head>
<body>
<div class='container'>
	
	<?php $this->load->view('/headers/user_header'); ?>

	<?php
			if ($this->session->userdata('errors'))
			{ ?>
				<div class='alert alert-danger'role='alert'><?= $this->session->userdata('errors'); ?></div>
				<?php $this->session->unset_userdata('errors');
			} ?>
	<div class="panel panel-default">
  		<div class="panel-heading">
    		<h3 class="panel-title">Edit Information</h3>
  		</div>
  		<div class="panel-body">
    		<form action='/main/update_profile_info' method='post'>
    			<input type= hidden name='update' value='info'>
    			<input type= hidden name='user_id' value= <?=$user["user_id"]; ?>>
				<div class="form-group">
			    	<label for="user_email">Email address:</label>
			    	<input type="text" class="form-control" name="user_email" value=<?= $user['email']; ?>>
			  	</div>
			  	<div class="form-group">
			    	<label for="first_name">First Name:</label>
			    	<input type="text" class="form-control" name="first_name" value=<?= $user['first_name']; ?>>
			  	</div>
			  	<div class="form-group">
				    <label for="last_name">Last Name:</label>
				    <input type="text" class="form-control" name="last_name" value=<?= $user['last_name']; ?>>
			  	</div>
			  	<?php if ($this->session->userdata('userlevel') == 9){ ?>
			  	<div class="form-group">
				    <label for="last_name">Userlevel:</label>
				    <input type="text" class="form-control" name="userlevel" value=<?= $user['userlevel']; ?>>
			  	</div>
			  	<?php } ?>
			  	<input type="submit" class="btn btn-success" value="Save">
			</form>
  		</div>
	</div>
	<div class="panel panel-default">
  		<div class="panel-heading">
    		<h3 class="panel-title">Change Password</h3>
  		</div>
  		<div class="panel-body">
  			<form action='/main/update_profile_password' method='post'>
  				<input type= hidden name='update' value='password'>
  				<input type= hidden name='user_id' value=<?=$user["user_id"]; ?>>
    			<div class="form-group">
		    		<label for="password">Password:</label>
		    		<input type="text" class="form-control" name="password">
		  		</div>
		  		<div class="form-group">
		    		<label for="confirm_password">Confirm Password:</label>
		    		<input type="text" class="form-control" name="confirm_password">
		  		</div>
		  		<input type="submit" class="btn btn-success" value="Update Password">
			</form>
  		</div>
	</div>
	<div class="panel panel-default">
  		<div class="panel-heading">
    		<h3 class="panel-title">Edit Description</h3>
  		</div>
  		<div class="panel-body">
    		<form action='/main/update_profile_description' method='post'>
    			<div class="form-group">
    				<input type= hidden name='update' value='description'>
    				<input type= hidden name='user_id' value= <?=$user["user_id"]; ?>>
			    	<input type="text" class="form-control" name="description" value="<?= $user['description']; ?>">
			  	</div>
			  	<input type="submit" class="btn btn-success" value="Save">
			</form>
  		</div>
	</div>
</div>
</body>
</html>