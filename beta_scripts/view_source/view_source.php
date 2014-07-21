<?
/***************************************************************************
 *		WebDB/view_source.php
 *                            -------------------
 *		begin                : Sunday, 12 November 2006
 *		copyright            : (C) 2007 Andrew W. Pong (Hakaslak)
 *		email                : hakaslak@gmail.com
 *
 ***************************************************************************/
 
// All thanks to Xiven over at http://www.xiven.com/weblog/2002/12/18/MoreInvalidHTMLXHTMLProblems for this.
// This code fixes the XHTML invalidation caused php PHP's highlight_file() function used in view_source.php

$search[0] = '<font color="'.ini_get('highlight.html').'">';
$search[1] = '<font color="'.ini_get('highlight.default').'">';
$search[2] = '<font color="'.ini_get('highlight.keyword').'">';
$search[3] = '<font color="'.ini_get('highlight.string').'">';
$search[4] = '<font color="'.ini_get('highlight.comment').'">';
$search[5] = '</font>';
$search[6] = '<br />';
$search[7] = "\r";
$search[8] = '&nbsp;';
$replace[0] = '<code class="html" xml:lang="x-html">';
$replace[1] = '<code class="default" xml:lang="x-php">';
$replace[2] = '<code class="keyword" xml:lang="x-php">';
$replace[3] = '<code class="string" xml:lang="x-php">';
$replace[4] = '<code class="comment" xml:lang="x-php">';
$replace[5] = '</code>';
$replace[6] = "\n";
$replace[7] = '';
$replace[8] = ' ';

// Stolen from http://www.php.net/manual/en/function.highlight-file.php#69045 .
// Thanks to "paul at cheddar dot vaughany dot com"

if(isset($_GET['file']))
{
	switch($_GET['file'])
	{
		case "signup":
			require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/header.php');
			echo '<pre class="page_viewsource">';
			$source = (highlight_file($_SERVER['DOCUMENT_ROOT'] . "/beta_scripts/signup/index.php", true));
			echo str_replace($search,$replace,$source);
			echo '</pre>';
			require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/footer.php');
break;
		
		case "lottery":
			require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/header.php');
			echo '<pre class="page_viewsource">';
			$source = (highlight_file($_SERVER['DOCUMENT_ROOT'] . "/beta_scripts/lottery/index.php", true));
			echo str_replace($search,$replace,$source);
			echo '</pre>';
			require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/footer.php');
break;

		case "memberlist":
			require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/header.php');
			echo '<pre class="page_viewsource">';
			$source = (highlight_file($_SERVER['DOCUMENT_ROOT'] . "/beta_scripts/memberlist/index.php", true));
			echo str_replace($search,$replace,$source);
			echo '</pre>';
			require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/footer.php');
break;
		
		case "entrants":
			require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/header.php');
			echo '<pre class="page_viewsource">';
			$source = (highlight_file($_SERVER['DOCUMENT_ROOT'] . "/beta_scripts/lottery/entrants.php", true));
			echo str_replace($search,$replace,$source);
			echo '</pre>';
			require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/footer.php');

break;
		
		case "login":
			require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/header.php');
			echo '<pre class="page_viewsource">';
			$source = (highlight_file($_SERVER['DOCUMENT_ROOT'] . "/beta_scripts/login/index.php", true));
			echo str_replace($search,$replace,$source);
			echo '</pre>';
			require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/footer.php');

break;
		
		case "settings":
			require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/header.php');
			echo '<pre class="page_viewsource">';
			$source = (highlight_file($_SERVER['DOCUMENT_ROOT'] . "/settings/index.php", true));
			echo str_replace($search,$replace,$source);
			echo '</pre>';
			require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/footer.php');

break;
		
		case "forumindex":
			require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/header.php');
			echo '<pre class="page_viewsource">';
			$source = (highlight_file($_SERVER['DOCUMENT_ROOT'] . "/forum/index.php", true));
			echo str_replace($search,$replace,$source);
			echo '</pre>';
			require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/footer.php');

break;
		
		case "showtopic":
			require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/header.php');
			echo '<pre class="page_viewsource">';
			$source = (highlight_file($_SERVER['DOCUMENT_ROOT'] . "/forum/showthread.php", true));
			echo str_replace($search,$replace,$source);
			echo '</pre>';
			require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/footer.php');

break;
		
		case "post":
			require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/header.php');
			echo '<pre class="page_viewsource">';
			$source = (highlight_file($_SERVER['DOCUMENT_ROOT'] . "/forum/post.php", true));
			echo str_replace($search,$replace,$source);
			echo '</pre>';
			require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/footer.php');

break;
			}
}
else
{
	header("Location: " . $current_domain);
}
?>