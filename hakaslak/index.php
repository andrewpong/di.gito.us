<?
/***************************************************************************
 *		WebDB/hakaslak/index.php
 *                            -------------------
 *		begin                : Sunday, 12 November 2006
 *		copyright            : (C) 2007 Andrew W. Pong (Hakaslak)
 *		email                : hakaslak@gmail.com
 *
 ***************************************************************************/
 
require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/global.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/header.php');

if (isset($_POST['n00b_submit']))
{
	if($_POST['check_1'] == $_POST['check_2'])
	{
		header('Location: http://lfvjh.redu.us/=?u=livejournal');
	}
}
else
{
?>
<h2>This shit is really really really nasty</h2>
<form method="post" action="<?=($_SERVER['PHP_SELF']); ?>">
<table summary="<?=$current_domain_plain?> n00b protection form. Single column, seperate row for each type of information." width="100%" id="n00b" cellspacing="0" cellpadding="10" >
	<caption>n00b protection form</caption>
	<tr>
	<td>
	<label for="check_1">Do you really want to see this shit? (type "yes")</label>
	<br />
	<input type="text" name="check_1" id="check_1" />
	</td>
	</tr>
	<tr>
	<td>
	<label for="check_2">Are you really sure? (type "yes")</label>
	<br />
	<input type="text" name="check_2" id="check_2" />
	</td>
	</tr>
	<tr>
	<td>
	<input type="submit" name="Submit" id="Submit" value="SHOW ME THE PICS!!" />
	<input type="hidden" name="n00b_submit" id="n00b_submit" value="n00b_submit" />
	</td>
	</tr>
</table>
<?
}
require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/footer.php');
?>