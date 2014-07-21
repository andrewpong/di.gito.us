<?
/***************************************************************************
 *		WebDB/test/varclean/index.php
 *                            -------------------
 *		begin                : Monday, 11 December 2006
 *		copyright            : (C) 2007 Andrew W. Pong (Hakaslak)
 *		email                : hakaslak@gmail.com
 *
 ***************************************************************************/
if(isset($_POST['varclean_submit']))
{
	require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/global.php');
	require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/header.php');
	$result_1 = varclean($_POST['string']);
	$result_2 = md5($result_1);
	$result_4 = md5("");
	echo '
	<h2>This is the varcleaned variable...</h2>
	<code>' . $result_1 . '</code>
	<h2>This is the md5 of the varcleaned variable...</h2>
	<code>' . $result_2 . '</code>
	<h2>This is the md5 of a blank string...</h2>
	<code>' . $result_4 . '</code>
	';
	if($result_2 == $result_4)
	{
	echo '
	<p>Evidently, the md5 hash of the returned string is identical to that of a blank string because of the following possible reasons:</p>
	<ul>
	<li>The entered string was an (X)HTML tag. strip_tags() removed it, returning a blank variable.</li>
	<li>The entered string really did have an identical hash to a blank string, amazingly!</li>
	<li>You entered a blank string into the box. (i.e. just pressed submit)</li>
	';
	}
	echo '
	<p>Go back and try another variable!</p>
	<p><input type="button" value="Retry" onClick="history.go(-1)"></p>
	';
	require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/footer.php');
}
else
{
	require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/global.php');
	require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/header.php');
	?>
	<form method="post" action="<?=($_SERVER['PHP_SELF']); ?>">
	<table summary="<?=$current_domain_plain?> test form for the varclean function." width="100%" id="register" cellspacing="0" cellpadding="10" >
		<caption><?=$current_domain_plain?>'s varclean function test script.</caption>
		<tr>
		<td>
		<label for="string">String to use varclean() on:</label>
		<br />
		<input type="text" name="string" id="string" />
		</td>
		</tr>
		<tr>
		<td>
		<input type="submit" name="Submit" id="Submit" value="Submit" />
		<input type="hidden" name="varclean_submit" id="varclean_submit" value="varclean_submit" />
		</td>
		</tr>
	</table>
	<p>Your Internet Protocol (IP) address is being logged as <?= getenv("REMOTE_ADDR"); ?></p>
	</form>
<?
	require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/footer.php');
}
?>