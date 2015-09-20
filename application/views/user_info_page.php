<?php date_default_timezone_set('America/Los_angeles'); ?>
<!DOCTYPE html>
<html>
<head>
	<meta name='viewport' content='width=device-width, initial-scale=1.0'> 
	<meta charset='utf-8'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src='http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js'></script> 
	<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js'></script>
	<title>User Information</title>
</head>
<body>
<div class='container'>
	<?php $this->load->view('/headers/user_header'); ?>

	<h3><?= $user['first_name']. " " .$user['last_name']; ?></h3>
	<?php if ($this->session->userdata('user_id') == $user['user_id']){ ?>
	<a href="/edit_profile/<?= $user['user_id']?>">edit</a>
	<?php 	} ?>
	<div class="well well-sm">
		<ul class="list-group">
			<li class="list-group-item">Registered on: <?= date("F j, Y", strtotime($user['created_at'])); ?></li>
		  	<li class="list-group-item">UserID: <?= $user['user_id']; ?></li>
		  	<li class="list-group-item">Email Address: <?= $user['email']; ?></li>
		  	<li class="list-group-item">Description: <?= $user['description']; ?></li>
		</ul>
	</div>
		<form action='/messages/insert_message' method='post'>
			<div class="form-group">
			    <label for="message">Leave a message for <?= $user['first_name'];?>:</label>
			    <input type='hidden' action='input' value='message'>
			    <input type='hidden' name='recipent_id' value=<?= $user['user_id']; ?>>
			    <input type='hidden' name='user_id' value="$this->session->userdata['user_id']">
			    <input type="textarea" class="form-control" name="message">
			</div>
			<input type='submit' class="btn btn-success" value='Post'>
		</form>
		<?php
			if ($this->session->flashdata('input error'))
			{ ?>
				<div class='alert alert-danger'role='alert'><?= $this->session->flashdata('input error'); ?></div>
			<?php } 
			
			$this->load->view('message_list', $list);
			?>

	</div>
</div>
</body>
</html>