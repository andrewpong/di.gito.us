<?
/***************************************************************************
 *		WebDB/index.php
 *                            -------------------
 *		begin                : Sunday, 12 November 2006
 *		copyright            : (C) 2007 Andrew W. Pong (Hakaslak)
 *		email                : hakaslak@gmail.com
 *
 ***************************************************************************/
 
require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/global.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/header.php');
?>
<h2>Andrew Pong's php excursions</h2>
<p><strong>Purpose:</strong> A place for me to test php scripts I write in a production environment. Scripts are released here for further refinement, and also for kind individuals to help me test. Thank you if you have tested! Your feedback has helped me alot!</p>
<p><strong>Testing methodology:</strong> I tend to post this website in IRC and forums in the hopes that people will let me know if anything needs changing. IRC people late at night are usually very helpful... I guess boredom makes people do anything ;)</p>
<h2>Accessibility is key!</h2>
<p>Why is this site so ugly? Because I placed accessibility above all else. Not to mention I believe in content over eye-candy, bling, jazz, whatever you call it. It is just not a priority right now.</p>
<h3><?=$current_domain_plain?> has been tested to be 100% functional with the following web browsers:</h3>
<ul>
<li>Opera 8.5</li>
<li>Opera 9</li>
<li>Internet Explorer 3.0</li>
<li>Internet Explorer 4.01</li>
<li>Internet Explorer 5.01</li>
<li>Internet Explorer 5.5</li>
<li>Internet Explorer 6.0</li>
<li>Internet Explorer 7.0</li>
<li>Mozilla Firefox 1.5</li>
<li>Mozilla Firefox 2.0</li>
<li>Netscape Navigator 8.1.2</li>
<li>Lynx 2.8.5</li>
</ul>
<h3><?=$current_domain_plain?> is also fully functional even with the following features disabled or unsupported:</h3>
<ul>
<li>Cookies</li>
<li>Scripting (i.e. <a href="http://www.noscript.net"><acronym title="FireFox">FF's</acronym> NoScript Add-On</a>)</li>
<li>Cascading Style Sheets (<acronym title="Cascading Style Sheets">CSS</acronym>)</li>
<li>Images</li>
</ul>
<p>I am unable to test with Linux or Macintosh based browsers. If you have tested with any such browsers, <a href="<?=$current_domain?>contact/">please contact me</a> with the OS and browser combination and I will update my list accordongly.</p>
<p><strong>You will also win many internets for your help. Thank you!</strong></p>
<p>Please respect my copyright. If you decide to use one of my scripts (retarded as the idea may sound) please give credit where credit is due.</p>
<?
require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/footer.php');
?>