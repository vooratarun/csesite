<html>
<head>
<title></title>
<script type="text/javascript" src="scripts/resources.js"></script>
</head>
<body>
<div id="resource-wrapper">
	<div id="support-header">Resources</div>
	<div id="discussion-body">
		<div id="menu-categories">
			<div id="e3" class="category" onclick="changebg(e3)">Engg.3</div>
			<div id="e2" class="category" onclick="changebg(e2)">Engg.2</div>
			<div id="e1" class="category" onclick="changebg(e1)">Engg.1</div>
			<div id="pro" class="category" onclick="changebg(pro)">Programming</div>
			<div id="sw" class="category" onclick="changebg(sw)">Softwares</div>
			<div id="exam" class="category" onclick="changebg(exam)">ExamPapers</div>
		</div>
		<div id="category-body" class="one">
			<div id="e3-body" class="desc-body"></div>
			<div id="e2-body" class="desc-body"></div>
			<div id="e1-body" class="desc-body"></div>
			<div id="pro-body" class="desc-body"></div>
			<div id="sw-body" class="desc-body"></div>
			<div id="exam-body" class="desc-body"></div>
			<!-- <div id="all-body" class="desc-body"></div> -->
		</div>
		<div id="sidebar" class="one">
			<div id="new-book" onclick="newbook()" title="Click here to request a new book"> Request a Book </div>
			<div id="request-book">
				<table summary="" >
					<tr><td>Book Name</td></tr>
					<tr><td><input id="book-name" type="text" placeholder="Book Name" onfocus="godefault('book-name')"></td></tr>
					<tr><td>Book Author</td></tr>
					<tr><td><input id="book-author" type="text" placeholder="Book Author" onfocus="godefault('book-author')"></td></tr>
					<tr><td>Book Publishers</td></tr>
					<tr><td><input id="book-publishers" type="text" placeholder="Book Publishers" onfocus="godefault('book-publishers')"></td></tr>
					<tr><td>Other Information</td></tr>
					<tr><td><input id="book-info" type="text" placeholder="Ex: Subject,Edition" onfocus="godefault('book-info')"></td></tr>
					<tr><td><div id="req-book" onclick="submit_book_req()">Post</div></td></tr>
					<tr><td><div id="book-request-status"></div></td></tr>
				</table>		
			</div>
			<div id="search">
				<input type="text" id="search-resource" name="search-resource" placeholder="Search Resources" class="searchfield" onkeypress="gosearch()">
				<!--<input type="button" name="goandsearch" class="searchbutton" value="Search">-->			
			</div>
			<div id="results"></div>
		</div>
	</div>
</div>
</body>
</html>