<?
/***************************************************************************
 *		WebDB/files/inlcudes/global.php
 *                            -------------------
 *		begin                : Sunday, 30 November 2006
 *		copyright            : (C) 2007 Andrew W. Pong (Hakaslak)
 *		email                : hakaslak@gmail.com
 *
 ***************************************************************************/

require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/sessions.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/db.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/avatar.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/bbcode.php');
// Echo this whereever we need the domain name i.e. http://www.google.com/

$current_domain_plain = ucwords($_SERVER['HTTP_HOST']);
$current_domain = ('http://' . ($_SERVER['HTTP_HOST']) . '/');
function current_site_level()
{
	$parent_dir = basename(realpath("."));
	if ($parent_dir == 'httpdocs')
	{
		$parent_dir = 'home';
	}
	$parent_dir = str_replace('_', ' ', $parent_dir);
	$parent_dir = ucwords($parent_dir);
	echo($parent_dir);
}

function format_time($str)
{
	$str = date('n-j-y g:i A', $str);
	return $str;
}

function check_is_number($str)
{
	preg_match("[0-9]+", $str);
}

function post_check($str)
{
	$foo = strlen($srt);
	if ($foo <= 20000)
	{
		return true;
	}
	else
	{
		return false;
	}
}

function login_check()
{
	if(isset($_SESSION['session_username']) && isset($_SESSION['session_password']))
	{
		return true;
	}
	else
	{
		return false;
	}
}

// Hack for the UserCP so I don;t have to put in any more includes. Easier for me to track... I'm a bum... sure there are better ways than this O_o
function settings_hack_1()				
{
	$parent_dir = basename(realpath("."));
	$parent_dir = str_replace('_', ' ', $parent_dir);
	$parent_dir = ucwords($parent_dir);
	if ($parent_dir == 'Settings')
	{
		return true;
	}
}


function settings_display_advanced()
{
	$username = $_SESSION['session_username'];
	$query_user_group = $db->prepare('SELECT user_group FROM cms_users WHERE user_username = :user_username');
	$query_user_group->bindParam(':username', $username);
	$query_user_login->execute();
	$result = $query_user_group->fetchColumn();
	if ($result == 2)
	{
		echo('
		<h2>Forum Settings</h2>
		<ul class="subsidebar_menu">
		<li><a href="<?=$current_domain?>settings/admin/editfora.php">Add a forum</a></li>
		</ul>
		');
	}
}

function tours_hack_1()				
{
	$parent_dir = basename(realpath("."));
	$parent_dir = str_replace('_', ' ', $parent_dir);
	$parent_dir = ucwords($parent_dir);
	if ($parent_dir == 'Tours')
	{
		return true;
	}
}

		
/* FORMATS LINE BREAKS WITH PROPER HTML TAGS */
function format_html($content)
{
	$content = "<p>" . str_replace("\r\n", "<br/>", $content) . "";
	$content = "" . str_replace("<br/><br/>", "</p><p>", $content) . "";
	return "" . str_replace("<br/><li>", "<li>", $content) . "";
}

// Page generation timer from http://www.totallyphp.co.uk/code/page_load_time.htm
// The second half is under files/includes/footer.php as of 20061203
$time = microtime();
$time = explode(" ", $time);
$time = $time[1] + $time[0];
$start = $time;

// Some functions for validation...

function check_login()
{
	if(isset($_COOKIE['cookname']) && isset($_COOKIE['cookpass']))
	{
		$_SESSION['session_username'] = $_COOKIE['cookname'];
		$_SESSION['session_password'] = $_COOKIE['cookpass'];
	}
}

// Clean a var I guess...
function varclean($str)
{
	strip_tags(trim(htmlspecialchars($str)));
	return preg_replace(array('/</', '/>/', '/"/'), array('&lt;', '&gt;', '&quot;'), ($str));
}

function varclean_lite($str)
{
	strip_tags(htmlspecialchars($str));
	return preg_replace(array('/</', '/>/', '/"/'), array('&lt;', '&gt;', '&quot;'), ($str));
}

function nlbr($text, $replacement = '<br /><br />')
{
	return preg_replace("((\r\n)+)", trim($replacement), $text);
}


// Phone numbers, with area codes if defined

function validate_area_code($area_code)
{ 
if (eregi("([0-9]{3})", $area_code))
	{
		return true;
	}
	else
	{
		return false;
	}
}

function validate_usphone($phonenumber,$useareacode=true) //regex and function pilfered from http://codewalkers.com/seecode/397.html
{ 
	if ( preg_match("/^[ ]*[(]{0,1}[ ]*[0-9]{3,3}[ ]*[)]{0,1}[-]{0,1}[ ]*[0-9]{3,3}[ ]*[-]{0,1}[ ]*[0-9]{4,4}[ ]*$/",$phonenumber) || (preg_match("/^[ ]*[0-9]{3,3}[ ]*[-]{0,1}[ ]*[0-9]{4,4}[ ]*$/",$phonenumber) && !$useareacode)) return eregi_replace("[^0-9]", "", $phonenumber); 
	return false; 
}

// Emails
function validate_email($email_address) //regex nipped from http://www.regular-expressions.info/regexbuddy/email.html
{
	if(eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$", $email_address))
	{
		return true;
	}
	else
	{
		return false;
	}
}

// Usernames, alpha characters only, no numbers, case insensitive.
function validate_username($user_username)
{
	if(eregi("[a-z]{3-15}", $user_username))
	{
		return true;
	}
	else
	{
		return false;
	}
}

// password alphanumeric 10-20 chars
function validate_password($user_password)
{
	if(eregi("[a-z0-9]{10-20}", $user_password))
	{
		return true;
	}
	else
	{
		return false;
	}
}
?>