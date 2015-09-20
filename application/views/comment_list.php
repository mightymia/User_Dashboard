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
		foreach ($list as $comment) { ?>
			<div class='well well-sm'>
			<h5><?= $comment['first_name']." ".$comment['last_name']. " ".date("F j, Y", strtotime($comment['created_at']));?></h5>
			<p><?= $comment['comment'];?></p>
			</div>
	<?php } ?>
</body>
</html>