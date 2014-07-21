<? require_once('global.php');?>
<? settings_hack_2();?>
</div></div>
<div id="copyright">Copyright &copy; 2006 Andrew W. Pong | <a href="<?=$current_domain?>privacy/" title="<?=$current_domain_plain?>'s privacy policy">Privacy Policy</a> | <a href="<?=$current_domain?>colophon/" title="<?=$current_domain_plain?>'s colophon">Colophon</a></div>
<div id="page_timer">Powered by the Di.gito.us CMS Beta 1<br /><? $time = microtime();$time = explode(" ", $time);$time = $time[1] + $time[0];$finish = $time;$totaltime = ($finish - $start);printf ("This page took %f seconds to load.", $totaltime);?></div>
</body>
</html>