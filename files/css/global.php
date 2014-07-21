<?
header('Content-type: text/css');
ob_start('compress');
function compress($buffer2)
{
	$buffer = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $buffer);
	$buffer = str_replace(array("\r\n", "\r", "\n", "\t", '	', '		', '		'), '', $buffer);
	return $buffer2;
	}
$bgcolor = "#000";
?>

html {
color:#333;
font-size:small;
font-family:geneva,arial,helvetica,sans-serif;
line-height:150%;
margin:0;
padding:0;
text-align:center;
min-width:95%;
background-color:<?=$bgcolor?>;
}

body {
text-align:left;
max-width:95%;
margin:0 auto;
padding:0;
background-color:<?=$bgcolor?>;
min-width:900px;
}

table, tr, td {
border:0;
padding:0;
maring:0;
border-collapse:collapse;
font-size:small;
}

.page_viewsource {width:100%;max-height:500px;overflow:auto;font-size:medium;}
.page_viewsource code.html { color:#000000}
.page_viewsource code.default { color:#0000BB}
.page_viewsource code.keyword { color:#007700}
.page_viewsource code.string { color:#DD0000}
.page_viewsource code.comment { color:#FF9900}

tr {
padding:0.2em;
}

tr a {
display: block;
}

form textarea {
width:90%;
}

#fieldset:
font-weight:bold;
}

label {
cursor:pointer;
}

#display_signature {
padding:1em;
border:2px dashed #666;
}

a:visited,a:link {
color:#069;
text-decoration:none;
}

a:hover {
color:#000;
background-color:#fc0;
text-decoration:underline;
}

#h1 {
font-size:x-large;
margin:0;
padding:0;
color:#000;
overflow:visible;
}

h2, caption {
font-size:large;
padding:0.2em 1em;
color:#000;
text-align:center;
}

h3 {
font-size:medium;
margin:0;
padding:1em;
color:#000;
}

#search {
color:#fff;
text-align:right;
margin:0;
padding:0;
}

.smallfont {
font-size:x-small;
}

#search a:visited, #search a:link, #copyright a:visited, #copyright a:link {
color:#999;
text-decoration:none;
}

#header {
background:#fff url(../images/tl.png) no-repeat;
padding:2em;
overflow:auto;
}

#navbar {
margin:0;
padding:0;
}

ul.mainlinks {
list-style:none;
display:block;
text-indent:0;
font-size:medium;
font-weight:bold;
margin:0;
padding:0;
}

ul.mainlinks li {
display:block;
float:left;
margin:0;
padding:0.2em 0.5em;
}

ul.mainlinks li a {
display:block;
margin:0;
padding:0.2em 0.5em;
color: #fff;
}

ul.mainlinks li a:hover {
display:block;
margin:0;
padding:0.2em 0.5em;
color:#000;
background-color:#fc0;
}

#page_commentary {
background-color:#ff9;
border:1px solid #333;
margin:0;
padding:0;
}

.clearing_div {
width:100%;
clear:both;
}

#main_content {
text-align:justify;
background:#fff url(../images/tl.png) no-repeat;
_margin-right: 210px;
padding:2em;
overflow:hidden;
}

#main_content p{
padding:0 0 0 1em;
}

#subcontent {
text-align:justify;
background:#fff;
_margin-left: 190px;
padding:0 2em;
overflow:hidden;
}

#subsidebar_wrapper {
width: 170px;
float: left;
display:inline;
text-align:justify;
background:#fff;
overflow:hidden;
margin-right:10px;
_margin-right:0;
border-right:1px solid #000;
}

ul.subsidebar_menu {
list-style:none;
display:block;
text-indent:0;
font-size:small;
font-weight:bold;
margin:0;
padding:0;
}

ul.subsidebar_menu li,ul.subsidebar_menu li a {
display:block;
float:left;
margin:0;
padding:0.2em 0.5em;
}

ul.subsidebar_menu li a:hover {
display:block;
}

#breadcrumbs {
border-bottom:1px solid #333;
margin:0 0 1.5em;
padding:0;
}

#breadcrumbs_bottom {
border-top:1px solid #333;
margin:0 0 1.5em;
padding:0;
}


#page_viewsource {
width:100%;
background-color:#ff9;
border:1px solid #333;
margin:0;
padding:0;
}

#main_content_information {
width:150px;
float:right;
}

#sidebar_wrapper {
width: 200px;
float: right;
display:inline;
text-align:justify;
background:#000 url(../images/tl.png) no-repeat;
overflow:hidden;
margin-left:10px;
_margin-left:0;
}

#sidebar {
padding:2em;
margin-bottom:2em;
background:#fff;
}

#sidebar_header {
border-bottom:1px solid #333;
margin:0 0 1.5em;
padding:0;
}

#copyright {
clear:both;
color:#fff;
margin:0;
padding:0.1em 0;
text-align:left;
}

#footer {
background-color:#000;
margin:0;
padding:0.1em 1em;
}

#page_timer {
color:#fff;
text-align:center;
margin:0;
padding:0.1em 2em;
font-size:x-small;
}

#error_message {
background-color:red;
color:#fff;
font-weight:700;
padding:1em;
margin:0 0 1.5em 0;
border:1px solid #000;
}


#topbar {
color:#333;
position:absolute;
border:1px solid #000;
background-color:#ffc;
width:35em;
visibility:hidden;
z-index:100;
float:right;
padding:0;
font-size:x-small;
line-height:100%;
}

#forum_index_bottom {
clear:both;
}

#forum_index_bottom_l {
width:50%;
font-size:small;
color:#333;
float:left;
text-align:left;
}

#forum_index_bottom_r {
width:50%;
font-size:small;
color:#333;
float:right;
text-align:right;
}

#forum_index_footer {
margin-top:2em;
font-size:large;
color:#333;
text-align:right;
clear:both;
}

.topic_title h3{
padding:0;
padding-bottom:1em;
margin:0;
text-align:center;
font-size:large;
}

.postbit {
font-size:x-small;
padding:0.5em 1em;
margin-bottom:2em;
border-bottom:1px solid #666;
border-left:1px solid #666;
border-right:1px solid #666;
border-top:1px solid #666;
text-align:right;
}

.postbit_stats {
border-bottom:1px solid #666;
}

.postbit_name {
font-size:medium;
width:50%;
float:left;
font-style:italic;
text-align:left;
}

.postbit_time {
font-size:small;
width:50%;
float:left;
}

.postbit_body {
font-size:small;
clear:both;
padding:1em 0;
text-align:left;
}

.postbit_signature {
border-top:1px solid #666;
display:block;
font-size:x-small;
text-align:left;
}

table#forum_index tr{
border-bottom:1px solid #999;
}

.author_name {
font-size:x-small;
font-style:italic;
}
<? ob_end_flush();?>