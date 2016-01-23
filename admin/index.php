<html>
<head>
<meta charset="UTF-8"></meta>
<title>Computer Science Engineering</title>
<link rel="shortcut icon" href="../images/icon.png"></link>
<link rel="stylesheet" href="css/admin.css">
<script type="text/javascript" src="js/jquery_min.js"></script>
<script type="text/javascript" src="js/admin.js"></script>
<script type="text/javascript" src="js/jquery_cookie.js"></script>
</head>
<body>
<div id="site_body">
	<div id="online_users" style="overflow-y:scroll;border:1px solid silver;border-right:none;height: 75%;background:rgb(235,235,235);padding:10px;position:fixed;top:10%;right:0%;float:right;"></div>
	<input type="hidden" value="" id="tempstore">
	<div id="black" class="restricted"></div>
	<div id="signin-ui" class="restricted">
		<table summary="" id="sigin-wrapper" cellpadding="5">
			<tr><td class="td">Username</td><td><input type="text" id="uname" maxlength="7" class="txtfld"></td></tr>
			<tr><td class="td">Password</td><td><input type="password" id="pwd" class="txtfld"></td></tr>
		</table>
		<div id="buttons-div">
			<div id="signin-hint">Invalid Credentials</div><div onclick="sendcredentials()" id="login">LOGIN</div>		
		</div>	
	</div>
	<div id="nav-bar">
		<div id="admin-logo">CSE Admin Panel</div>
		<div id="nav-menu">
			<div class="nav-opts" id="admin-home" onclick="loadpage('home')">Home</div>
			<div class="nav-opts" id="admin-resource" onclick="loadpage('resource')">Resources</div>
			<div class="nav-opts" id="admin-notify" onclick="loadpage('notify')">Notifications</div>
			<!--<div class="nav-opts" id="admin-support" onclick="loadpage('support')">Support</div>-->
			<!--<div class="nav-opts"><input type="text" id="search"></div>-->
			<div class="nav-opts" id="Auth_user"></div>
			<div class="nav-opts" id="getin" onclick="showsignin()">SignIn</div>
			<div class="nav-opts" id="getout" onclick="signout()">Signout</div>
		</div>
	</div>
	<div id="body_wrapper">
		<div id="page_loader"></div>
		<div id="site_footer">
			<div>Copyrights &copy; <span id="dept-footer-logo" onclick="loadpage('home')">Computer Science</span> 2012-13, IIIT-N.</div>
		</div>
	</div>
</div>
</body>
</html>
