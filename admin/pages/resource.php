<html>
<head>
<script type="text/javascript" src="js/resource.js"></script>
<link rel="stylesheet" href="css/resource.css">
</head>
<body>
<div id="window-viewer">
	<div id="tabs-wrapper">
		<div class="tabs" id="view_all" onclick="loadtab('view_all')">View All</div>
		<div class="tabs" id="add_new" onclick="loadtab('add_new')">Add New</div>
	</div>
	<div id="tabs-loader">
		<div class="tabs_target" id="view_all_target">
			<div id="menu-categories">
				<div id="e3" class="category" onclick="changebg(e3)">Engg.3</div>
				<div id="e2" class="category" onclick="changebg(e2)">Engg.2</div>
				<div id="e1" class="category" onclick="changebg(e1)">Engg.1</div>
				<div id="pro" class="category" onclick="changebg(pro)">Programming</div>
				<div id="sw" class="category" onclick="changebg(sw)">Softwares</div>
				<div id="other" class="category" onclick="changebg(other)">Exam Papers</div>
			</div>
			<div id="category-body" class="one">
				<div id="e3-body" class="desc-body"></div>
				<div id="e2-body" class="desc-body"></div>
				<div id="e1-body" class="desc-body"></div>
				<div id="pro-body" class="desc-body"></div>
				<div id="sw-body" class="desc-body"></div>
				<div id="other-body" class="desc-body"></div>
			</div>
		</div>
		<div class="tabs_target" id="add_new_target">
		<iframe src="actions/add_file.php" style="border:none;height:400px;width:100%;"></iframe>		
		</div>	
	</div>
</div>
</body>
</html>
