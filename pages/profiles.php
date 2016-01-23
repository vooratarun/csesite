<html>
<head>
<script type="text/javascript" src="scripts/profiles.js"></script>
</head>
<body>
<div id="profile-wrapper">
<div id="support-header">Profiles</div>
<div id="profile-body">
	
</div>
</div>
<div id="start-new-bg" class="new-book"></div>
<div id="search-profile-ui" class="new-book">
	<div id="search-title-bar">
		<div id="disc-ui-close" onclick="closenewbook()">&times;</div>
		<div id="disc-ui-title">Search Profiles</div>		
	</div>
	<table id="search-ribbon">
		<tr>
			<td align="center"><input type="text" name="searchproterms" id="search-profs" style="width:30%;" placeholder="Ex: ID,Name" onkeyup="search_profiles()"></td>
		</tr>
	</table>
	<div id="search-profile-ui-body">
		<div id="results-area"></div>
	</div>
	<div id="profile-ui-footer">
		<div id="required"></div>
	</div>
</div>
<div id="edit-profile-ui" class="new-book">
	<div id="profile-title-bar">
		<div id="disc-ui-close" onclick="closenewbook()">&times;</div>
		<div id="disc-ui-title">Edit Your Profile</div>
	</div>
	<table id="search-ribbon" >
		<tr><td>Name<span class="star">*</span></td><td>Mobile No.</td><td>E-mail<span class="star">*</span></td></tr>
		<tr>
			<td><input type="text" name="usersname" id="user_name" class="head-input" onfocus="godefault('user_name')" value=""></td>		
			<td><input type="text" name="phonenum" id="user_phone" class="head-input" onfocus="godefault('user_phone')" value=""></td>
			<td><input type="text" name="usersname" id="user_email" class="head-input" onfocus="godefault('user_email')" value=""></td>
		</tr>
	</table>
	<div id="edit-profile-ui-body">
		<table width="100%" >
			<tr>
				<td width='10%' class='fieldlabel'>Date of Birth<span class='star'>*</span></td>	
				<td>
					<select name='date' id='user_date' style='margin-left: 5px;' class='button-style' selected='01' onfocus="godefault('user_date')">
						<option value='' id="current_date"></option>
						<option value='1'>01</option>
						<option value='2'>02</option>
						<option value='3'>03</option>
						<option value='4'>04</option>
						<option value='5'>05</option>
						<option value='6'>06</option>
						<option value='7'>07</option>
						<option value='8'>08</option>
						<option value='9'>09</option>
						<option value='10'>10</option>
						<option value='11'>11</option>
						<option value='12'>12</option>
						<option value='13'>13</option>
						<option value='14'>14</option>
						<option value='15'>15</option>
						<option value='16'>16</option>
						<option value='17'>17</option>
						<option value='18'>18</option>
						<option value='19'>19</option>
						<option value='20'>20</option>
						<option value='21'>21</option>
						<option value='22'>22</option>
						<option value='23'>23</option>
						<option value='24'>24</option>
						<option value='25'>25</option>
						<option value='26'>26</option>
						<option value='27'>27</option>
						<option value='28'>28</option>
						<option value='29'>29</option>
						<option value='30'>30</option>
						<option value='31'>31</option>
					</select>
					<select name='month' id='user_month' class='button-style' onfocus="godefault('user_month')">
						<option value='' id="current_month"></option>
						<option value='January'>Jan</option>
						<option value='February'>Feb</option>
						<option value='March'>Mar</option>
						<option value='April'>Apr</option>
						<option value='May'>May</option>
						<option value='June'>Jun</option>
						<option value='July'>Jul</option>
						<option value='August'>Aug</option>
						<option value='September'>Sep</option>
						<option value='October'>Oct</option>
						<option value='November'>Nov</option>
						<option value='December'>Dec</option>							
					</select>
					<select name="year" id="user_year" class="button-style" onfocus="godefault('user_year')">
						<option value='' id="current_year"></option>
						<option value="1985">1985</option>
						<option value="1986">1986</option>
						<option value="1987">1987</option>
						<option value="1988">1988</option>
						<option value="1989">1989</option>
						<option value="1990">1990</option>
						<option value="1991">1991</option>
						<option value="1992">1992</option>
						<option value="1993">1993</option>
						<option value="1994">1994</option>
						<option value="1995">1995</option>
					</select>				
				</td>
				<td width='10%' class='fieldlabel'>Avatar</td><td><iframe src='pages/upload.php' id='pic-uploader'></iframe></td>		
			</tr>
			<tr>
				<td width='10%' class='fieldlabel'>Introduction</td><td><textarea class='inputs' id='introduction' onfocus="godefault('introduction')" style='resize: none'></textarea></td>
				<td width='10%' class='fieldlabel'>Hobbies<span class="star">*</span></td><td><textarea class='inputs' id='interests' onfocus="godefault('interests')" style='resize: none'></textarea></div></td>			
			</tr>
			<tr>
				<td width='10%' class='fieldlabel'>Programming Languages Known</td><td><textarea class='inputs' onfocus="godefault('skills')" id='skills' style='resize: none'></textarea></div></td>		
				<td width='10%' class='fieldlabel'>Achievements</td><td><textarea class='inputs' id='achievements' onfocus="godefault('achievements')" style='resize: none'></textarea></td>			
			</tr>
			<tr>
				<td width='10%' class='fieldlabel'>Areas of Interest<span class='star'>*</span></td><td><textarea class='inputs' onfocus="godefault('areasofinterest')" id='areasofinterest' style='resize: none'></textarea></td>
				<td width='10%' class='fieldlabel'>Address<span class='star'>*</span></td><td><textarea class='inputs' id='address' onfocus="godefault('address')" style='resize: none'></textarea></td>
			</tr>
		</table>
		<input type='hidden' value='' id='hiddenuid'>
	</div>
	<div id="profile-ui-footer">
		<div id='required-footer'>(<span class='star'>*</span>) fields are required fields.</div>
		<div id='disc-post' onclick="updatemyprofile('hiddenuid','user_name','user_phone','user_email','user_date','user_month','user_year','introduction','interests','skills','achievements','areasofinterest','address')">UPDATE</div><!--<div id='disc-post' onclick='clearall()'>CLEAR</div>-->	
	</div>
</div>
</body>
</html>
