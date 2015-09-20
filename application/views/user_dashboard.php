<?php date_default_timezone_set('America/Los_angeles'); ?>
<!DOCTYPE html>
<html>
<head>
	<meta name='viewport' content='width=device-width, initial-scale=1.0'> 
	<meta charset='utf-8'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src='http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js'></script> 
	<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js'></script>
	<title>Dashboard</title>
</head>
<body>
<div class='container'>

	<?php $this->load->view('/headers/user_header'); ?>

	<table class="table table-bordered">
		<th>ID</th>
		<th>Name</th>
		<th>email</th>
		<th>created_at</th>
		<th>user_level</th>
	<?php if ($this->session->userdata('userlevel') == 9){ ?>
		<th>actions</th>
		<?php } ?>
		<?php for ($i=0; $i < count($list); $i++) { ?>
		<tr>
			<td><?= $list[$i]['user_id']; ?></td>
			<td><a href="/user_profile/<?= $list[$i]['user_id']; ?>"><?= $list[$i]['first_name']. " " .$list[$i]['last_name']; ?></a>
				</td>
			<td><?= $list[$i]['email']; ?></td>
			<td><?= date("F j, Y", strtotime($list[$i]['created_at'])) ?></td>
			<td><?php if ($list[$i]['userlevel'] == 9)
					{
						echo "admin"; 
					}
					else 
					{
						echo "normal";
					} ?></td>
			<?php if ($this->session->userdata('userlevel') == 9){ ?>
			<td><a href="/edit_profile/<?= $list[$i]['user_id']; ?>">edit</a> | <a href="/remove_user/$list[$i]['user_id']">remove</a></td>
			<?php } ?>
		</tr>
		<?php } ?>
	</table>
	<a href="/add_new" class="btn btn-primary">Add New</a>
</div>
</body>
</html>