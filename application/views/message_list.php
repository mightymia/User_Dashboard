<?php date_default_timezone_set('America/Los_angeles'); ?>
<!DOCTYPE html>
<html>
<head>
	<meta name='viewport' content='width=device-width, initial-scale=1.0'> 
	<meta charset='utf-8'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src='http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js'></script> 
	<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js'></script>
</head>
<body>
	<?php 
	foreach ($list as $message) { ?>
		 <h5><?= $message['first_name']." ".$message['last_name']. " ".date("F j, Y", strtotime($message['created_at']));?></h5>
		 <p><?= $message['message'];?></p>
		<?php $this->load->view('comment_list', array('list' => $comments[$message['message_id']])); ?>
 		
		<form action='/messages/insert_comment' method='post'>
			<div class="form-group">
				<input type='hidden' name='sender_id' value=<?= $this->session->userdata('user_id'); ?>>
				<input type='hidden' name='user_id' value=<?= $message['user_id']; ?>>
				<input type='hidden' name='message_id' value=<?= $message['message_id']; ?>>
			    <input type="textarea" class="form-control" name="comment" placeholder='write a comment'>
			</div>
			<input type="submit" class="btn btn-success" value='Post'>
		</form>
		<?php } ?>

</body>
</html>