<?
/***************************************************************************
 *		WebDB/colophon/index.php
 *                            -------------------
 *		begin                : Saturday, 02 December 2006
 *		copyright            : (C) 2007 Andrew W. Pong (Hakaslak)
 *		email                : hakaslak@gmail.com
 *
 ***************************************************************************/
 
require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/header.php');
?>
<h2><?=$current_domain_plain?>'s Colophon</h2>
<h3><?=$current_domain_plain?> has been tested to be 100% functional with the following web browsers:</h3>
<ul>
<li>Opera 8.5</li>
<li>Opera 9</li>
<li>Internet Explorer 3.0</li>
<li>Internet Explorer 4.01</li>
<li>Internet Explorer 5.01</li>
<li>Internet Explorer 5.5</li>
<li>Internet Explorer 6.0</li>
<li>Internet Explorer 7.5730.11</li>
<li>Firefox 1.5</li>
<li>Firefox 2.0</li>
<li>Lynx</li>
</ul>
<h3><?=$current_domain_plain?> is also fully functional even with the following features disabled or unsupported:</h3>
<ul>
<li>Cookies</li>
<li>Scripting (i.e. FF's NoScript Add-On)</li>
<li>Cascading Style Sheets <acronym title="Cascading Style Sheets">CSS</acronym></li>
<li>Images</li>
</ul>
<p>I am unable to test with Linux or Macintosh based browsers. If you have tested with any such browsers, <a href="<?=$current_domain?>contact/">please contact me</a> with the OS and browser combination and I will update my list accordongly.</p>
<p><strong>You will also win many internets for your help. Thank you!</strong></p>
<h3><?=$current_domain_plain?> is accessible:</h3>
<ul>
<li>Conforms to <acronym title="World Wide Web Consortium">W3C</acronym> Double-A of the <a href="http://www.w3.org/TR/WAI-WEBCONTENT/" title="Web Content Accessibility Guidelines 1.0">Web Content Accessibility Guidelines 1.0</a></li>
<li>Is created with valid, clean XHTML markup.</li>
<li>Syled with valid Cascading Style Sheets <acronym title="Cascading Style Sheets">CSS</acronym></li>
<li>Functional without images</li>
</ul>


<?
//
// Begin standard footer...
//
require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/footer.php');
//
// End standard footer.
//
?>