<html>
<head>
<title>Discussions</title>
<script type="text/javascript" src="scripts/forums.js"></script>
<script text='text/javascript'>
function getSelectionStart(){
    var node = document.getSelection().anchorNode;
    var startNode = (node.nodeType == 3 ? node.parentNode : node);
    return startNode.id;
}
function pasteHtmlAtCaret(event,id) {
    var sel, range;
    html='&lt;pre&gt;<br>//your code here<br>&lt;/pre&gt;';
    if (getSelectionStart()==id&&window.getSelection) {
        sel = window.getSelection();
        if (sel.getRangeAt && sel.rangeCount) {
            range = sel.getRangeAt(0);
            range.deleteContents();
            var el = document.createElement("div");
            el.innerHTML = html;
            var frag = document.createDocumentFragment(), node, lastNode;
            while ( (node = el.firstChild) ) {
                lastNode = frag.appendChild(node);
            }
            range.insertNode(frag);
            // Preserve the selection
            if (lastNode) {
                range = range.cloneRange();
                range.setStartAfter(lastNode);
                range.collapse(true);
                sel.removeAllRanges();
                sel.addRange(range);
            }
        }
    } else if (document.selection && document.selection.type != "Control") {
        // IE < 9
        document.selection.createRange().pasteHTML(html);
    }
}
</script>
<link rel="stylesheet" type="text/css" href="css/forums.css"></link>
</head>
<body>
<div class="page-title"><span style="cursor:pointer;" onclick="loadpage('forums')">Discussions</span><div id="nav-cat-title" style="display:inline-block;margin-left:10px;font-size:16px;font-weight:normal;"></div></div>
<input type="hidden" id="temptab">
<div id="discussions-wrapper">
	<div id="disc-nav-tabs">
		<div id="all" class="nav-tabs" onclick="changetab('all')">All</div>
		<div id="solved" class="nav-tabs" onclick="changetab('solved')">Answered</div>
		<div id="unsolved" class="nav-tabs" onclick="changetab('unsolved')">Unanswered</div>
		<div id="most" class="nav-tabs" onclick="changetab('most')">Most Viewed</div>
		<div id="recent" class="nav-tabs" onclick="changetab('recent')">Recently Posted</div>
		<div id="startnew" class="nav-tabs" onclick="changetab('startnew')">Start New Discussion</div>
	</div>
	<div id="disc-nav-body">
		<div id="search-wrapper">
			<input class="inputBox" id="disc_search_key" placeholder="Search by titles, keywords" onkeyup="search_disc()">
		</div>
		<div class="disc-body" id="search-body"></div>
		<div class="disc-body" id="all-body"><center><img src="images/loading.gif" alt="" ></center></div>
		<div class="disc-body" id="solved-body"></div>
		<div class="disc-body" id="unsolved-body"></div>
		<div class="disc-body" id="most-body"></div>
		<div class="disc-body" id="recent-body"></div>
		<div class="disc-body" id="startnew-body">
			<table summary="" style="width:100%;">
				<tr><td>Discussion Title<br><input type="text" id="disc-title" class="inputBox" placeholder='Discussion Title'></td></tr>
				<tr>
					<td>
						Discussion Category
						<input id="disc-cats" class="inputBox smallInput" placeholder='Category Ex:Other' onkeyup="getsuggestions(this.value)"><br>
						<div id="cat_results" class="inputBox sResults"></div>
					</td>
				</tr>
				<tr>
					<td>
						Key words
						<input id="disc-keyws" class="inputBox smallInput" placeholder='Key words'>
					</td>
				</tr>
				<tr>
					<td>Discussion Body
						<!--<textarea class="inputBox" style="resize:none;" rows="8" id="disc-body"></textarea>-->
						<div id="editor" style="border: 1px solid silver;">
							<div id="top_bar" style="background:white;">
								<button id="pBold" class="top_list" title="Select text and click here to make it Bold"><b>B</b></button>
								<button id="pItalic" class="top_list" title="Select text and click here to maki it Italic"><i>i</i></button>
								<button id="punderLine" class="top_list" title="Select text and click here to Underline"><u>U</u></button>
								<button id="pinsCode" class="top_list" title="Click here to insert code" onclick="pasteHtmlAtCaret(event,'disc-body');">{Code}</button>
								<button id="pinsLink" class="top_list" style="color:blue;" title="Select text and click here to insert link">Link</button>
								<button id="pul" class="top_list" title="Ordered List"><img src="images/ol.gif" alt="" ></button>
								<button id="pol" class="top_list" title="Unordered List"><img src="images/ul.gif" alt="" ></button>
							</div>
							<div contenteditable="true" id="disc-body" onkeyup="hideerror()"></div>
							<!--<textarea id="answer-input" onkeyup="hideerror()" contenteditable='true' rows="10"></textarea>-->
						</div>
					</td>
				</tr>
				<tr><td><button id="#postarticle" onclick="postarticle();" class="Button">Post Discussion</button></td></tr>
				<tr><td><div id="disc-suggestion" style="display:none;"></div></td></tr>
			</table>
		</div>
	</div>
	<div id="getdesiredpost" style="float:left;width:100%;display:none;border:1px solid #e7eef4;">
		<input type="hidden" id="qorg-id">
		<input type="hidden" id="post-catid">
		<input type="hidden" id="post-id">
		<input type="hidden" id="views-count">
		<input type="hidden" id="answercount">
		<div id="sidebar1" style="float:left;width:10%;">
			<table summary="" style="text-align:center;font-size:12px;color:rgb(67, 67, 67);width:100%;">
				<tr><td style="padding: 5px;border:2px ridge #e7eef4;background:white;"><div id="post-views" style="padding: 5px;">1</div>Views</td></tr>
				<tr><td style="padding: 5px;border:2px ridge #e7eef4;background:white;"><div id="answered-status" style="padding: 5px;"><img src="images/answered.png" alt="" ></div>Answered</td></tr>
				<tr><td style="padding: 5px;border:2px ridge #e7eef4;background:white;"><img src="images/time.png" alt="" ><div id="posted-time" style="padding: 5px;">Just now</div></td></tr>
				<tr><td style="padding: 5px;border:2px ridge #e7eef4;background:white;" id="voting_td"></td></tr>
				<tr><td style="padding: 15px 5px;border:2px ridge #e7eef4;background:white;" id="rply" onclick="reply()"><img src="images/reply.png" alt="" ><br>Reply to Post</td></tr>
			</table>
		</div>
		<div id="mainbar1">
			<div id="getqtitle"></div>
			<div id="qmetadata" style="border-bottom: 1px solid #e7eef4;"></div>
			<div id="getqbody" style="font-size:14px;color:rgb(67,67,67);"></div>
		</div>
		<table summary="" id="ans-head" style="background:white;color:#214b7e;border-top: 1px solid #e7eef4;border-bottom: 1px solid #e7eef4;float:left; width: 100%;padding: 15px;">
			<tr><td>Answers(<span id="total_ans_count"></span>)</td></tr>
		</table>
		<div id="mainbar2">
			<table summary="" id="adata" width="100%">
				
			</table>
			<div id="answer" style="margin-top: 5%;background:white;border:1px solid rgb(0,114,198);">
				<table id="post-top-section">
					<tr>
						<td><div id="post-text">Post your Answer :</div></td>
					</tr>
				</table>
				<div id="editor">
					<div id="top_bar">
						<button id="mkBold" class="top_list" title="Select text and click here to make it Bold"><b>B</b></button>
						<button id="mkItalic" class="top_list" title="Select text and click here to maki it Italic"><i>i</i></button>
						<button id="underLine" class="top_list" title="Select text and click here to Underline"><u>U</u></button>
						<button id="insCode" class="top_list" title="Click here to insert code" onclick="pasteHtmlAtCaret(event,'answer-input');">{Code}</button>
						<button id="insLink" class="top_list" style="color:blue;" title="Select text and click here to insert link">Link</button>
						<button id="ul" class="top_list" title="Ordered List"><img src="images/ol.gif" alt="" ></button>
						<button id="ol" class="top_list" title="Unordered List"><img src="images/ul.gif" alt="" ></button>
						<div id="post-button" style="float:right;" class="Button" onclick="replyquestion()">Reply to this Discussion</div>
					</div>
					<div contenteditable="true" id="answer-input" onkeyup="hideerror()"></div>
					<!--<textarea id="answer-input" onkeyup="hideerror()" contenteditable='true' rows="10"></textarea>-->
				</div>
			</div>
			<div id="answer-results"></div>
		</div>
	</div>
</div>
</body>
</html>