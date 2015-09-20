<html>
<head>
	<meta name='viewport' content='width=device-width, initial-scale=1.0'> 
	<meta charset='utf-8'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src='http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js'></script> 
	<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js'></script>
</head>
<body>
		<nav class='navbar navbar-default'>
		<a class="navbar-brand" href="/">Test App</a>
		<ul class="nav navbar-nav navbar-left">
	        <li><a href="/user_dashboard">Dashboard</a></li>
	        <li><a href="/user_profile/<?= $this->session->userdata['user_id']; ?>">Profile</a></li>
	    </ul>
		<ul class="nav navbar-nav navbar-right">
	        <li><a href="/logoff">Log Off</a></li>
	    </ul>
	</nav>
</body>
</html>