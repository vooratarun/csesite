<html>
<head>
<meta charset="UTF-8">
<title>Computer Science Engineering</title>
<link rel="shortcut icon" href="images/cs.png">
<link rel="stylesheet" type="text/css" href="css/default.css">
<link rel="stylesheet" type="text/css" href="css/support.css">
<link rel="stylesheet" type="text/css" href="css/profiles.css">
<link rel="stylesheet" type="text/css" href="css/resources.css">
<link rel="stylesheet" type="text/css" href="css/forums.css">
<link rel="stylesheet" type="text/css" href="css/faculty.css">
<link rel="stylesheet" type="text/css" href="css/notifications.css">
<script type="text/javascript" src="scripts/jquery_min.js"></script>
<script type="text/javascript" src="scripts/jquery_cookie.js"></script>
<script type="text/javascript" src="scripts/forums.js"></script>
<script type="text/javascript" src="scripts/default.js"></script>
<script type="text/javascript" src="scripts/support.js"></script>
<script type="text/javascript" src="scripts/resources.js"></script>
</head>
<body>
<div id="online_friends"></div>
<div id="signin" onclick="showsignin()">Sign In</div>
<div id="top-user-area">
	<div id="signinuser" onclick="loadpage('profiles')"></div>
	<div id="notifications" title="Today Notifications" onclick="shownotmenu()"></div>
	<div id="profile_icon" onclick="showusermenu()">
		<img src="images/profile_default.png" alt="" style="vertical-align: middle;" /><b id="dropdown"></b>
	</div>
</div>
<div id="dropdownarea" class="ddmenu"></div>
<div id="downarea" class="ddmenu">	
	<table id="datable">
		<tr>
			<td rowspan="3" id="profile_img"></td>
			<td id="viewprofile" class="down-items" onclick="loadpage('profiles')">View Profile</td>
		</tr>
		<tr>
			<td id="settings" class="down-items" onclick="changepaswd()">Settings</td>
		</tr>
		<tr>
			<td id="signout" class="down-items" onclick="signout()">Sign Out</td>
		</tr>
	</table>
</div>
<div id="dropdownarea2" class="not-menu"></div>
<div id="downarea2" class="not-menu">	
	<table id="datable2">
		<tr>
			<td id="vallnotification" onclick="loadpage('viewallnotes')">View all notifications</td>
		</tr>
		<tr>
			<td id="current_notifications"></td>
		</tr>
	</table>
</div>
<div id="start-new-bg" class="chpswd"></div>
<div class="chpswd">
	<div id="buttons-div" style="text-align:center;font-weight:bold;color:#2147be;"><div onclick="hidechpwd()" style="float:right;text-align:right;cursor:pointer;margin-top:-1%;">&times;</div>Change Password</div>
	
	<table id="sign-wrapper">
		<tr>
			<td style="text-align: right">Current Password</td><td><input type="password" id="oldpwd" class="input" /></td>
		</tr>
		<tr>
			<td style="text-align: right">New Password</td><td><input type="password" id="newpwd" class="input" /></td>
		</tr>
		<tr>
			<td style="text-align: right">Re-type Password</td><td><input type="password" id="rnewpwd" class="input" /></td>
		</tr>
	</table>
	<div id="buttons-div">
		<div id="button" onclick="clearallf()">CLEAR FIELDS</div><div id="button" onclick="changepassword()">CHANGE PASSWORD</div>
	</div>
</div>






<div id="popup_bg_wrapper" class="restricted"></div>
<table id="signin_ui" class="restricted">
	<tr>
		<td id="pane-1">
			<div id="image-wrapper">
				<img src="images/pri.png">
			</div>
			<div id="desc-wrapper">
				<div id="wrapper-title">Your account, our priority</div>
				<div id="wrapper-desc">Adding security information helps to protect your account</div>
			</div>
		</td>
		<td id="pane-2"></td>
		<td id="pane-3">
			<table>
				<tr>
					<td id="signin-title-wrapper">Sign in</td>
				</tr>
				<tr>
					<td id="signin-form-wrapper">
						<div class="form-error" id="invalid-error">You're trying to sign in with invalid username or password</div>
						<div class="form-error" id="username-error">Please enter the username for your CSE account</div>
						<div id="form-input"><input type="text" id="username" placeholder="Username" onkeyup="hideerrors('username',this.value)" /></div>
						<div class="form-error" id="password-error">Please enter the password for your CSE account</div>
						<div id="form-input"><input type="password" id="password" placeholder="Password" onkeyup="hideerrors('password',this.value)" /></div>
						<div id="login-button" onclick="sendcredentials()">Sign in</div>
						<div id="access-link"><span id="access-account" class="links" onclick="loadreset()">Can't access your account?</span></div>
						<div id="access-link"><span id="singleuse-code" class="links">Sign in with a single-use code</span></div>
					</td>
				</tr>
				<tr>
					<td id="signup-text-wrapper">
						<div id="signup-text">Don't have a CSE account? <span id="signup-link" class="links">Sign up now</span></div>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
<table id="recovery_ui" class="restricted">
	<tr id="recovery_titlebar">
		<td id="recovery_title">Recover your CSE Account</td>
		<td style="text-align: center"><span id="recovery_signin" onclick="loadsignin()">Sign in</span></td>
	</tr>
	<tr>
		<td id="recovery_body" colspan="2">
			<div id="forget_title" class="resetopt">Get help with a forgotten password and other problems signing in</div>
			<div id="pro_list" class="resetopt">
				<div style="margin-bottom: 0.8em;">What problem are you having signing in?</div>
				<div id="prolinks">
					<div id="forgot_passwd" class="prolistimg" onclick="chgimg('forgot_passwd')">
						<img src='images/radio.png' />
					</div>
					<span id="problem" onclick="chgimg('forgot_passwd')">I forgot my password</span>
					<div id="forgot_passwd_opt" class="reset-options">
						<ol>
							<li>Try to remember your account password and <span id="access-link" onclick="loadsignin()">sign in</span>.</li>
							<li><span id="access-link" onclick="resetpasswd()">Reset your password</span></li>
						</ol>
					</div>
				</div>
				<div id="prolinks">
					<div id="cant_access" class="prolistimg"  onclick="chgimg('cant_access')">
						<img src='images/radio.png' />
					</div>
					<span id="problem" onclick="chgimg('cant_access')">I know my password and CSE account, but can't sign in</span>
					<div id="cant_access_opt" class="reset-options">
						<ol>
							<li>Be sure that Caps Lock isn't on (passwords are case sensitive)</li>
							<li>If you still can't sign in, <span id="access-link" onclick="resetpasswd()">reset your password</span>.</li>
						</ol>
					</div>
				</div>
				<div id="prolinks">
					<div id="account_hacked" class="prolistimg" onclick="chgimg('account_hacked')">
						<img src='images/radio.png' />
					</div>
					<span id="problem" onclick="chgimg('account_hacked')">I think someone else is using my CSE account</span>
					<div id="account_hacked_opt" class="reset-options">
						<ol>
							<li><span id="access-link" onclick="resetpasswd()">Reset your password</span></li>
							<li>You can get back your account by filling out a <span id="access-link">questionnaire</span>. We'll get back to you within 24 hours (typically a lot sooner).</li>
							<li>Follow these steps to keep your password secure:
								<ul>
									<li>Make sure you create a strong password.</li>
									<li>Make sure you keep your password a secret.</li>
									<li>Turn on Windows Update.</li>
									<li>Use an antivirus program and make sure it's up to date.</li>
								</ul>
							</li>
							<li>If you can't use any of these options, <span id="access-link">create an account</span>.</li>
						</ol>
					</div>
				</div>
			</div>
			<div id="forget_title" class="resetpasswd-step1" style="display: none">Reset your account password</div>
			<div id="pro_list" class="resetpasswd-step1" style="display: none">
				<div style="margin-bottom: 0.8em;">To reset your password, enter your CSE account username and characters in picture below.</div>
				<div id="prolinks">
					<input type="text" id="reset-username" placeholder="Username">
					<p><span id="next-button">Next</span><span id="sp-button"></span><span id="cancel-button">Cancel</span></p>
				</div>
			</div>
			<div id="forget_title" class="resetpasswd-step2" style="display: none">Reset your account password</div>
			<div id="pro_list" class="resetpasswd-step2" style="display: none">
				<div style="margin-bottom: 0.8em;">Select an option for resetting your password.</div>
				<div id="prolinks">
					<div id="forgot_passwd" class="prolistimg" onclick="chgimg('forgot_passwd')">
						<img src='images/radio.png' />
					</div>
					<span id="problem" onclick="chgimg('forgot_passwd')">Email me a reset link</span>
					<div id="forgot_passwd_opt" class="reset-options">
						<ol>
							<li>Try to remember your account password.</li>
							<li><span id="access-link">Reset your password</span></li>
						</ol>
					</div>
				</div>
				<div id="prolinks">
					<div id="cant_access" class="prolistimg"  onclick="chgimg('cant_access')">
						<img src='images/radio.png' />
					</div>
					<span id="problem" onclick="chgimg('cant_access')">Answer to my security question</span>
					<div id="cant_access_opt" class="reset-options">
						<ol>
							<li>Be sure that Caps Lock isn't on (passwords are case sensitive)</li>
							<li>If you still can't sign in, <span id="access-link">reset your password</span>.</li>
						</ol>
					</div>
				</div>
			</div>
		</td>
	</tr>
</table>










<div id="website_layout">
	<div id="site_header">
		<input type="hidden" value="" id="tempstore" />
		<div id="title"><span id="title-text">Computer Science</span></div>
		<div id="main_links">
			<div id="links" onclick="loadpage('home')">Home</div>
			<div id="links" onclick="loadpage('resources')">Resources</div>
			<div id="links" onclick="loadpage('profiles')">Profiles</div>
			<div id="links" onclick="loadpage('forums')">Discussions</div>
			<div id="links" onclick="loadpage('careers')">Miscellaneous</div>
			<div id="links" onclick="loadpage('viewallnotes')">Notifications<sup><span id='not_count'></sup></span></div>
			<div id="links" onclick="loadpage('faculty')">Faculty</div>
			<div id="links" onclick="loadpage('support')">Support</div>
		</div>
	</div>
	<div id="site_body">
		<div id="loader"><img src="images/loading.gif" alt="" /></div>
	</div>
	<div id="site_footer">
		<div style="float:left;font-size:13px;font-color:silver;">Site Best viewed in Firefox 14.0 or newer versions.</div>
		<div style="float:right;">Copyrights &copy; <span id="dept-footer-logo" onclick="loadpage('home')">Computer Science</span> 2012-13, IIIT-N.</div>
	</div>
</div>
</body>
</html>
