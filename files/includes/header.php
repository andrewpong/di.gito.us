<? require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/global.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<title><?=$current_domain_plain?> | <? current_site_level();?></title>
<meta http-equiv="content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Andrew Pong, php, mysql, testing, scripts, diablo valley college, personal website, blog" />
<meta name="description" content="Andrew Pong's personal website for PHP/MySQL development" />
<meta name="robots" content="follow,index" />
<meta http-equiv="pics-Label" content='(pics-1.1 "http://www.icra.org/pics/vocabularyv03/" l gen true for "<?=$current_domain?>" r (n 0 s 0 v 0 l 0 oa 0 ob 0 oc 0 od 0 oe 0 of 0 og 0 oh 0 c 3) gen true for "<?=$current_domain?>" r (n 0 s 0 v 0 l 0 oa 0 ob 0 oc 0 od 0 oe 0 of 0 og 0 oh 0 c 3))' />
<link rel="meta" href="<?=$current_domain?>labels.rdf" type="application/rdf+xml" title="ICRA labels" />
<link rel="stylesheet" href="<?=$current_domain?>files/css/global.php" type="text/css" media="screen" />
<link rel="stylesheet" href="<?=$current_domain?>files/css/tours.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?=$current_domain?>files/css/bbcode.css" type="text/css" media="screen" />
<link rel="shortcut icon" href="<?=$current_domain?>favicon.ico" type="image/x-icon" />
<link rel="icon" href="<?=$current_domain?>favicon.ico" type="image/x-icon" />
<script type="text/javascript" src="<?=$current_domain?>files/scripts/bbcode.js"></script>
<script type="text/javascript" src="http://www.google-analytics.com/urchin.js"></script><script type="text/javascript">_uacct = "UA-673849-4";urchinTracker();</script>
</head>
<body>
<div id="search"><a href="#main_content" title="Skip to main content.">Skip to main content</a> | <a href="#navbar" title="Skip to navigation.">Skip to navigation</a> | <a href="#sidebar" title="Skip to sidebar.">Skip to sidebar</a></div>
<div id="header"><h1><?=$current_domain_plain?> | <? current_site_level();?></h1></div>
<div id="navbar">
<ul class="mainlinks">
<li><a href="<?=$current_domain?>" title="Return to homepage">Home</a></li>
<li><a href="<?=$current_domain?>contact/" title="Contact Andrew Pong">Contact me</a></li>
<li><a href="<?=$current_domain?>about/" title="About Andrew Pong">About me</a></li>
<li><a href="<?=$current_domain?>signup/" title="Signup for an <?=$current_domain_plain?> account.">Free signup</a></li>
<li><a href="<?=$current_domain?>forum/" title="<?=$current_domain_plain?> forums.">Forum</a></li>
<li><a href="<?=$current_domain?>beta_scripts/" title="Beta Scripts written by Andrew Pong">Beta Scripts</a></li>
</ul>
</div>
<div class="clearing_div"></div>
<div id="content_body">
<div id="sidebar_wrapper">
<div id="sidebar">
<? require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/sidebar.php');?>
</div>
</div>
<div id="main_content">
<div id="breadcrumbs"><? require_once($_SERVER['DOCUMENT_ROOT'] . '/files/scripts/backlinks.php');?></div>
<? require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/error.php');
if (settings_hack_1())
{
?>
<div id="subsidebar_wrapper">
<div id="subsidebar">
<h2>Options</h2>
<ul class="subsidebar_menu">
<li><a href="<?=$current_domain?>settings/editsignature.php">Edit Signature</a></li>
<li><a href="<?=$current_domain?>settings/editpassword.php">Edit Password</a></li>
<li><a href="<?=$current_domain?>settings/editprofile.php">Edit Profile</a></li>
<li><a href="<?=$current_domain?>settings/editoptions.php">Edit Options</a></li>
<li><a href="<?=$current_domain?>settings/editavatar.php">Edit Avatar</a></li>
</ul>
</div>
</div>
<div id="subcontent">
<h2>Settings</h2>
<?
}
if (tours_hack_1())
{
?>
<div id="subsidebar_wrapper">
<div id="subsidebar">
<h2>Tours</h2>
<ul class="subsidebar_menu">
<li><a href="<?=$current_domain?>tours/">Tours</a></li>
<?	if(isset($_SESSION['session_username']) && isset($_SESSION['session_password']))
	{
		echo '<li><a href="' . $current_domain . 'tours/admin/">Add a new tour</a></li>';
	}
?>
</ul>
</div>
</div>
<div id="subcontent">
<h2>Settings</h2>
<?
}
?>