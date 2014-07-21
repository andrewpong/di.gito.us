<?
/***************************************************************************
 *		WebDB/beta_scripts/index.php
 *                            -------------------
 *		begin                : Sunday, 12 November 2006
 *		copyright            : (C) 2007 Andrew W. Pong (Hakaslak)
 *		email                : hakaslak@gmail.com
 *
 ***************************************************************************/
 
require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/global.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/header.php');
?>

<h2>Andrew Pong's work in progress</h2>
<p>This page is a listing of all the scripts I am currently working on.</p>
<h3>Memberlist</h3>
<p>This is supposed to output a list of everyone who has an account on <?=$current_domain_plain?>. Simple stuff I guess.</p>
<p><a href="<?=$current_domain?>beta_scripts/memberlist/">View memberlist</a> | [<a href="<?=$current_domain?>beta_scripts/view_source/view_source.php?file=memberlist">View source code</a>]</p>
<h3>Lottery</h3>
<p>This was a homework assignment for my class, but my teacher seems to be ignoring me or somehting. Anyways, this is stuill up for that. As soon as he grades it I plan to take it down.</p>
<p><a href="<?=$current_domain?>beta_scripts/lottery/">View lottery</a> | [<a href="<?=$current_domain?>beta_scripts/view_source/view_source.php?file=lottery">View source code</a>]</p>
<h3>Lottery entrants listing</h3>
<p>Similar to the memberlist, except this show everyone who entered into the lottery.</p>
<p><a href="<?=$current_domain?>beta_scripts/lottery/entrants.php">View lottery entrants</a> | [<a href="<?=$current_domain?>beta_scripts/view_source/view_source.php?file=entrants">View source code</a>]</p>
<h3>User Control Panel</h3>
<p>Place for users to manage their account settings. Ugh...</p>
<p><a href="<?=$current_domain?>settings/">View UserCP form</a> | [<a href="<?=$current_domain?>beta_scripts/view_source/view_source.php?file=settings">View source code</a>]</p>
<h3>User Control Panel - Edit Password</h3>
<p>3 guesses what this does... yep. It let's people change their password!.</p>
<p><a href="<?=$current_domain?>settings/index.php?do=editpassword">View editpassword form</a> | [<a href="<?=$current_domain?>beta_scripts/view_source/view_source.php?file=editpassword">View source code</a>]</p>
<h3>The forum index</h3>
<p><a href="<?=$current_domain?>forum/">View forum index</a> | [<a href="<?=$current_domain?>beta_scripts/view_source/view_source.php?file=forumindex">View source code</a>]</p>
<h3>The posting form for the forum</h3>
<p>Cannot view output - requires $_GET input  | [<a href="<?=$current_domain?>beta_scripts/view_source/view_source.php?file=post">View source code</a>]</p>
<h3>The forum index</h3>
<p>Cannot view output - requires $_GET input | [<a href="<?=$current_domain?>beta_scripts/view_source/view_source.php?file=showtopic">View source code</a>]</p>
<?
require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/footer.php');
?>