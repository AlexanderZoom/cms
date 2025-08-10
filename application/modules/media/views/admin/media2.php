<?php defined('SYSPATH') OR die('No direct script access.'); ?>
<style type="text/css">
	#loading-wrap {
		position:fixed;
		height:100%;
		width:100%;
		overflow:hidden;
		top:0;
		left:0;
		display:block;
		background: white url(/admin-content/images/wait30trans.gif) no-repeat center center;
		z-index:999;
	}
</style>
<div class="row">
<div class="col-lg-12">
<div id="loading-wrap"><!-- loading wrapper / removed when loaded --></div>
<div class = "fmbody">
<form id="uploader" method="post">
	<h1></h1>
	<div id="uploadresponse"></div>
	<button id="level-up" name="level-up" type="button" value="LevelUp">&nbsp;</button>
	<button id="home" name="home" type="button" value="Home">&nbsp;</button>
	<input id="mode" name="mode" type="hidden" value="add" /> 
	<input id="currentpath" name="currentpath" type="hidden" />
	<div id="file-input-container">
		<div id="alt-fileinput">
			<input id="filepath" name="filepath" type="text" /><button id="browse" name="browse" type="button" value="Browse"></button>
		</div>
		<input	id="newfile" name="newfile" type="file" />
	</div>
	<button id="upload" name="upload" type="submit" value="Upload" class="em"></button>
	<button id="newfolder" name="newfolder" type="button" value="New Folder" class="em"></button>
	<button id="grid" class="ON" type="button">&nbsp;</button>
	<button id="list" type="button">&nbsp;</button>
</form>
<div id="splitter">
<div id="filetree"></div>
	<div id="fileinfo">
	<h1></h1>
	</div>
</div>
<div id="footer">
<form name="search" id="search" method="get">
		<div>
			<input type="text" value="" name="q" id="q" />
			<a id="reset" href="#" class="q-reset"></a>
			<span class="q-inactive"></span>
		</div> 
</form>
<a href="" id="link-to-project"></a>
<div id="folder-info"></div>
</div>

<ul id="itemOptions" class="contextMenu">
	<li class="select"><a href="#select"></a></li>
	<li class="download"><a href="#download"></a></li>
	<li class="rename"><a href="#rename"></a></li>
	<li class="move"><a href="#move"></a></li>
	<li class="replace"><a href="#replace"></a></li>
	<li class="delete separator"><a href="#delete"></a></li>
</ul>


</div>
</div>