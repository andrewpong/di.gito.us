<?
/***************************************************************************
 *		WebDB/lottery/index.php
 *                            -------------------
 *		begin                : Sunday, 12 November 2006
 *		copyright            : (C) 2007 Andrew W. Pong (Hakaslak)
 *		email                : hakaslak@gmail.com
 *
 ***************************************************************************/
 
require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/global.php');

//
// Start main code
//
if(isset($_POST['lottery_submit']))
{
	//
	// Some basic variables set
	//
	$lottery_firstname = $_POST['lottery_firstname'];
	$lottery_lastname = $_POST['lottery_lastname'];
	$lottery_email_1 = $_POST['lottery_email_1'];
	$lottery_email_2 = $_POST['lottery_email_2'];
	$lottery_area_code = $_POST['lottery_area_code'];
	$lottery_favorite_color = $_POST['lottery_favorite_color'];
	$lottery_ip = getenv("REMOTE_ADDR");
	$lottery_prize = ($lottery_area_code * $lottery_favorite_color);
	//
	// Setting up the variables for the $_GET and error reporting
	//
	$sent_firstname = ("&sent_firstname=" . $lottery_firstname);
	$sent_lastname = ("&sent_lastname=" . $lottery_lastname);
	$sent_email_1 = ("&sent_email_1=" . $lottery_email_1);
	$sent_email_2 = ("&sent_email_2=" . $lottery_email_2);
	$sent_area_code = ("&sent_area_code=" . $lottery_area_code);
	$sent_favorite_color = ("&sent_favorite_color=" . $lottery_favorite_color);
	$sent_email_problem = ("&sent_email_problem=" . $lottery_email_1);


	if ($lottery_email_1 == $lottery_email_2)
	{
		if (validate_email($lottery_email_1))
		{
			$check_email_availability = mysql_query("SELECT * FROM hw_lottery WHERE (user_email='$lottery_email_1')");
			if (mysql_num_rows($check_email_availability) == 0)
			{
				if (validate_area_code($lottery_area_code))
				{
					$lottery_user_information = "
					INSERT INTO hw_lottery (user_firstname, user_lastname, user_email, user_area_code, user_favorite_color, user_ip, user_noob_level) 
					VALUES ('$lottery_firstname', '$lottery_lastname', '$lottery_email_1', '$lottery_area_code', 'lottery_favorite_color', '$lottery_ip', '$lottery_prize')";
					mysql_query($lottery_user_information) or die('The server made a boo boo! Not your fault! Go lynch Hakaslak!');
					require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/global.php');
					require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/header.php');
					echo ("
					<p>You win money!!! lolwtf?? You win...</p>
					<div id=\"main_content_announcemets\"><span style=\"text-decoration: blink\">$" . $lottery_prize . "</span></div>
					<p>But... on this site, ONE \"$\" (dollar) is equal to one noob point. Guess what?</p>
					<div id=\"main_content_announcemets\">j00 = n00b</div>
					<p>So is Hakaslak by the way, for thinking it's a good idea to use the BLINK tag. (\"text-decoration: blink\" by the way.. so it valifates LMAO). It is the suffering that the n00blet gets for filling out the form.</p>
					<p>Schr&ouml;dinger's cat is <span style=\"text-decoration: blink\">not</span> dead.</p>
					");
					require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/footer.php');
				}
				else
				{
						$error_message_send = 5; // Area code invailid
						header("Location: index.php?error_msg=" . $error_message_send . $sent_firstname . $sent_lastname . $sent_email_1 . $sent_email_2 . $sent_favorite_color); 
				}
			}
			else
			{
				$error_message_send = 6; // Email taken
				header("Location: index.php?error_msg=" . $error_message_send . $sent_firstname . $sent_lastname . $sent_area_code . $sent_favorite_color . $sent_email_problem); 
			}
		}
		else
		{
			$error_message_send = 2; // Emails is invalid
			header("Location: index.php?error_msg=" . $error_message_send . $sent_firstname . $sent_lastname . $sent_area_code . $sent_favorite_color . $sent_email_problem); 
		}
	}
	else
	{
		$error_message_send = 1; // Emails do not match
		header("Location: index.php?error_msg=" . $error_message_send . $sent_firstname . $sent_lastname . $sent_area_code . $sent_favorite_color); 
	}// end of email / password check
}// end of isset
else
{
require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/global.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/header.php');
?>
<form method="post" action="<?= ($_SERVER['PHP_SELF']); ?>">
<table summary="A form for a homework assignment of mine. YOU DO NOT WIN ANYTHING." width="100%" id="lottery" cellspacing="0" cellpadding="10" >
	<caption>Simple. Submit information, get money. Right....$j00 = n00b</caption>
	<tr>
	<td>
	<label for="lottery_firstname">Your first name:</label>
	<br />
	<input type="text" name="lottery_firstname" id="lottery_firstname" value="<? if (isset($_GET['sent_firstname'])){echo (htmlspecialchars($_GET['sent_firstname']));}?>"/><? if (!isset($_GET['sent_firstname'])){echo ('<span style="color:red;font-size:large"> &#171;</span>');}?>
	</td>
	</tr>
	<tr>
	<td>
	<label for="lottery_lastname">Your last name:</label>
	<br />
	<input type="text" name="lottery_lastname" id="lottery_lastname" value="<? if (isset($_GET['sent_lastname'])){echo (htmlspecialchars($_GET['sent_lastname']));}?>"/><? if (!isset($_GET['sent_lastname'])){echo ('<span style="color:red;font-size:large"> &#171;</span>');}?>
	</td>
	</tr>
	<tr>
	<td>
	<label for="lottery_email_1">Email:</label>
	<br />
	<input type="text" name="lottery_email_1" id="lottery_email_1" value="<? if (isset($_GET['sent_email_1'])){echo (htmlspecialchars($_GET['sent_email_1']));}?>"/><? if (!isset($_GET['sent_email_1'])){echo ('<span style="color:red;font-size:large"> &#171;</span>');}?>
	</td>
	</tr>
	<tr>
	<td>
	<label for="lottery_email_2">Re-enter email:</label>
	<br />
	<input type="text" name="lottery_email_2" id="lottery_email_2" value="<? if (isset($_GET['sent_email_2'])){echo (htmlspecialchars($_GET['sent_email_2']));}?>"/><? if (!isset($_GET['sent_email_2'])){echo ('<span style="color:red;font-size:large"> &#171;</span>');}?>
	</td>
	</tr>
	<tr>
	<td>
	<label for="lottery_area_code">Your area code:</label>
	<br />
	<input type="text" name="lottery_area_code" id="lottery_area_code" size="3" maxlength="3" value="<? if (isset($_GET['sent_area_code'])){echo (htmlspecialchars($_GET['sent_area_code']));}?>"/><? if (!isset($_GET['sent_area_code'])){echo ('<span style="color:red;font-size:large"> &#171;</span>');}?>
	</td>
	</tr>
	<tr>
	<td>
	<label for="lottery_favorite_color">Your favorite color:</label>
	<br />
	<select name="lottery_favorite_color" id="lottery_favorite_color">
	<option value="1" <? if (isset($_GET['sent_favorite_color'])){if (($_GET['sent_favorite_color']) == 1){echo ("selected=\"selected\"");}}?>>Blue</option>
	<option value="2" <? if (isset($_GET['sent_favorite_color'])){if (($_GET['sent_favorite_color']) == 2){echo ("selected=\"selected\"");}}?>>Green</option>
	<option value="3" <? if (isset($_GET['sent_favorite_color'])){if (($_GET['sent_favorite_color']) == 3){echo ("selected=\"selected\"");}}?>>Yellow</option>
	<option value="4" <? if (isset($_GET['sent_favorite_color'])){if (($_GET['sent_favorite_color']) == 4){echo ("selected=\"selected\"");}}?>>Orange</option>
	<option value="5" <? if (isset($_GET['sent_favorite_color'])){if (($_GET['sent_favorite_color']) == 5){echo ("selected=\"selected\"");}}?>>Purple</option>
	</select><? if (!isset($_GET['sent_favorite_color'])){echo ('<span style="color:red;font-size:large"> &#171;</span>');}?>
	</td>
	</tr>
	<tr>
	<td>
	<input type="submit" name="Submit" id="Submit" value="Show me the money!" />
	<input type="hidden" name="lottery_submit" value="lottery_submit" />
	</td>
	</tr>
</table>
<p>Your Internet Protocol (IP) address is being logged as <?= getenv("REMOTE_ADDR"); ?></p>
</form>
<?
require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/footer.php');
}// end of main if/else statement for showing results or not...
?>