<html>
<head>
<title></title>
<link rel="stylesheet" type="text/css" href="styles/support.css"></link>
<script type="text/javascript" src="scripts/support.js"></script>
</head>
<body>
<div id="support-content">
	<div id="dev-word-title" style="padding: 2.5%;">Support Center</div>
	<div id="support-body">
		<div class="product-items" id="library" onclick="animate(library)" title="LIBRARY | Click once to Expand or Collapse the area.">
			<span class="letter">L</span><br /><span class="letter-title">Library</span><input type="hidden" value="0" id="library-state" class="status"><br />
			<span class="options" id="library-desc"><div id="product-desc">Get all books for your subjects</div><div id="writetous" onclick="write2us('LIBRARY')">Contact Us</div></span>
		</div>
		<div class="product-items" id="drive" onclick="animate(drive)" title="CLOUDE STORE | Click once to Expand or Collapse the area.">
			<span class="letter">S</span><br /><span class="letter-title">Cloud Store</span><input type="hidden" value="0" id="drive-state" class="status"><br />
			<span class="options" id="drive-desc"><div id="product-desc">Keep everything Share anything</div><div id="writetous" onclick="alert('Currently this feature is enabled for faculty and developers only.')">Contact Us</div></span>
		</div>
		<div class="product-items" id="innovation" onclick="animate(innovation)" title="INNOVATION | Click once to Expand or Collapse the area.">
			<span class="letter">I</span><br /><span class="letter-title">Innovation</span><input type="hidden" value="0" id="innovation-state" class="status"><br />
			<span class="options" id="innovation-desc"><div id="product-desc">To Act different<br />Think Different</div><div id="writetous" onclick="write2us('INNOVATION')">Suggest Us</div></span>
		</div>
		<div class="product-items" id="forums" onclick="animate(forums)" title="DISCUSSIONS | Click once to Expand or Collapse the area.">
			<span class="letter">D</span><br /><span class="letter-title">Discussions</span><input type="hidden" value="0" id="forums-state" class="status"><br />
			<div class="options" id="forums-desc"><div id="product-desc">Discuss Problems<br />Get them solved</div><div id="writetous" onclick="write2us('DISCUSSIONS')">Contact Us</div></div>
		</div>
		<div class="product-items" id="csecareers" onclick="animate(csecareers)" title="CAREERS | Click once to Expand or Collapse the area.">
			<span class="letter">C</span><br /><span class="letter-title">Careers</span><input type="hidden" value="0" id="csecareers-state" class="status"><br />
			<div class="options" id="csecareers-desc"><div id="product-desc">Know your career from our Faculty</div><div id="writetous" onclick="write2us('CAREERS')">Contact Us</div></div>
		</div>
		<div class="product-items" id="webmasters" onclick="animate(webmasters)" title="WEBMASTERS | Click once to Expand or Collapse the area.">
			<span class="letter">W</span><br /><span class="letter-title">Webmasters</span><input type="hidden" value="0" id="webmasters-state" class="status"><br />
			<div class="options" id="webmasters-desc"><div id="product-desc">Send suggestions to devolp website</div><div id="writetous" onclick="write2us('WEBMASTERS')">Contact Us</div></div>
		</div>
	</div>
</div>
<div id="dev-word">
	<table>
		<tr id="dev-word-title"><td colspan="3">Developer's Word</td></tr>
		<tr id="dev-word-body">
			<td colspan="3">
			Hello and welcome to the <span style="font-weight:bold;">Computer Science and Engineering Support-Center!</span>
			Here you can find answers to your questions from our Services, whether you're a user or administrator. 
			We help users by giving useful answers and feedback. Keep an eye out for Top Contributors in <span style="cursor:pointer;font-weight:bold;" onclick="loadpage('discussions')">Discussions</span>, too: they are experienced users and administrators who know well and enjoy helping others. 
			Before you begin, please check our help services.
			Have a great time!
			</td>
		</tr>
	</table>
</div>
<div id="start-new-bg" class="new-book"></div>
<div id="contactus" class="new-book">
	<div id="writetous-ui">
		<div id="close_contact" title="Click Here or Press Esc to Close">&times;</div>
		<div style="width: 100%;float: right;">
			<table>
				<tr><td align="right" class="fieldlabel">Full Name &nbsp;</td><td><input type="text" id="user-name" class="head-input" disabled="disabled" value="USERNAME"></td></tr>
				<tr><td align="right" class="fieldlabel">Student ID &nbsp;</td><td><input type="text" id="userid" class="head-input" disabled="disabled" value="" maxlength="7"></td></tr>
				<tr><td align="right" class="fieldlabel">Category ID &nbsp;</td><td><input type="text" id="categoryid" class="head-input" disabled="disabled" value="CATEGORYNAME" ></td></tr>
				<tr><td align="right" class="fieldlabel" style="vertical-align:top;"><br>Type Message &nbsp;</td><td><textarea rows="4" id="user-problem" style="resize:none;margin-left:0px;" placeholder="Type your message" class="inputs" onfocus="godefault('user-problem')"></textarea></td></tr>
			</table>
		</div>
		<div id="required-footer">Please send message regarding the problems that you are facing with our services.</div><div id="problem-post" onclick="postproblem('user-problem')">POST</div>
	</div>
</div>
</body>
</html>