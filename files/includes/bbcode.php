<?
/************************************************/
/*    bbcode v1.0a                              */
/*    Date: 03/2003                             */
/*                                              */
/* A simple and effective script that           */
/* allows you to implement bbcode type          */
/* behaviour on your php website.               */
/*                                              */
/* Contact: bbcode@swaziboy.com                 */
/* feel free to contact me for support if you   */
/* need help                                    */
/*                                              */
/* Usage:                                       */
/*                                              */
/* Put the following line at the top of         */
/* the page you want to have the bbocde         */
/* in...(assumes both pages are in the          */
/* folder                                       */
/*                                              */
/* include("bbcode.php");                       */
/*                                              */
/* Pass the text to the function:               */
/*                                              */
/* $mytext = bbcode("This is my bbcode");       */
/* or                                           */
/* $mytext = "This is my text";                 */
/* $mytext = bbcode($mytext);                   */
/*                                              */
/* echo $mytext;                                */
/*                                              */
/************************************************/

require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/global.php');

function bbcode($Text)
{
	// Replace any html brackets with HTML Entities to prevent executing HTML or script
	// Don't use strip_tags here because it breaks [url] search by replacing & with amp
	$Text = str_replace("<", "&lt;", $Text);
	$Text = str_replace(">", "&gt;", $Text);
	
	// Convert new line chars to html <br /> tags
	$Text = nl2br($Text);
	
	// Set up the parameters for a URL search string
	$URLSearchString = " a-zA-Z0-9\:\/\-\?\&\.\=\_\~\#\'";
	// Set up the parameters for a MAIL search string
	$MAILSearchString = $URLSearchString . " a-zA-Z0-9\.@";
	
	// Perform URL Search
	$Text = preg_replace("/\[url\]([$URLSearchString]*)\[\/url\]/", '<a href="$1" target="_blank">$1</a>', $Text);
	$Text = preg_replace("(\[url\=([$URLSearchString]*)\](.+?)\[/url\])", '<a href="$1" target="_blank">$2</a>', $Text);
	//$Text = preg_replace("(\[url\=([$URLSearchString]*)\]([$URLSearchString]*)\[/url\])", '<a href="$1" target="_blank">$2</a>', $Text);
	
	// Perform MAIL Search
	$Text = preg_replace("(\[mail\]([$MAILSearchString]*)\[/mail\])", '<a href="mailto:$1">$1</a>', $Text);
	$Text = preg_replace("/\[mail\=([$MAILSearchString]*)\](.+?)\[\/mail\]/", '<a href="mailto:$1">$2</a>', $Text);
	
	// Check for bold text
	$Text = preg_replace("(\[b\](.+?)\[\/b])is",'<span class="bold">$1</span>',$Text);
	
	// Check for Italics text
	$Text = preg_replace("(\[i\](.+?)\[\/i\])is",'<span class="italics">$1</span>',$Text);
	
	// Check for Underline text
	$Text = preg_replace("(\[u\](.+?)\[\/u\])is",'<span class="underline">$1</span>',$Text);
	
	// Check for strike-through text
	$Text = preg_replace("(\[s\](.+?)\[\/s\])is",'<span class="strikethrough">$1</span>',$Text);
	
	// Check for over-line text
	$Text = preg_replace("(\[o\](.+?)\[\/o\])is",'<span class="overline">$1</span>',$Text);
	
	// Check for colored text
	$Text = preg_replace("(\[color=(.+?)\](.+?)\[\/color\])is","<span style=\"color: $1\">$2</span>",$Text);
	
	// Check for sized text
	$Text = preg_replace("(\[size=(.+?)\](.+?)\[\/size\])is","<span style=\"font-size: $1px\">$2</span>",$Text);
	
	// Check for list text
	$Text = preg_replace("/\[list\](.+?)\[\/list\]/is", '<ul class="listbullet">$1</ul>' ,$Text);
	$Text = preg_replace("/\[list=1\](.+?)\[\/list\]/is", '<ul class="listdecimal">$1</ul>' ,$Text);
	$Text = preg_replace("/\[list=i\](.+?)\[\/list\]/s", '<ul class="listlowerroman">$1</ul>' ,$Text);
	$Text = preg_replace("/\[list=I\](.+?)\[\/list\]/s", '<ul class="listupperroman">$1</ul>' ,$Text);
	$Text = preg_replace("/\[list=a\](.+?)\[\/list\]/s", '<ul class="listloweralpha">$1</ul>' ,$Text);
	$Text = preg_replace("/\[list=A\](.+?)\[\/list\]/s", '<ul class="listupperalpha">$1</ul>' ,$Text);
	$Text = str_replace("[*]", "<li>", $Text);
	
	// Check for font change text
	$Text = preg_replace("(\[font=(.+?)\](.+?)\[\/font\])","<span style=\"font-family: $1;\">$2</span>",$Text);
	
	// Declare the format for [code] layout
	$CodeLayout = '<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
						<tr>
							<td class="quotecodeheader"> Code:</td>
						</tr>
						<tr>
							<td class="codebody">$1</td>
						</tr>
				   </table>';
	// Check for [code] text
	$Text = preg_replace("/\[code\](.+?)\[\/code\]/is","$CodeLayout", $Text);
	
	// Declare the format for [quote] layout
	$QuoteLayout = '<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
						<tr>
							<td class="quotecodeheader"> Quote:</td>
						</tr>
						<tr>
							<td class="quotebody">$1</td>
						</tr>
				   </table>';
			 
	// Check for [code] text
	$Text = preg_replace("/\[quote\](.+?)\[\/quote\]/is","$QuoteLayout", $Text);
	
	// Images
	// [img]pathtoimage[/img]
	$Text = preg_replace("/\[img\](.+?)\[\/img\]/", '<img src="$1">', $Text);
	
	// [img=widthxheight]image source[/img]
	$Text = preg_replace("/\[img\=([0-9]*)x([0-9]*)\](.+?)\[\/img\]/", '<img src="$3" height="$2" width="$1">', $Text);
	
	// Hakaslak - Add smilies
	
	$smilie_root = ('http://' . ($_SERVER['HTTP_HOST']) . '/files/images/smilies/');
	
	// :)
	$Text = preg_replace("/\:\)/", '<img src="' . $smilie_root . 'smile.gif" alt="*smiles*"/>', $Text);
	// :(
	$Text = preg_replace("/\:\(/", '<img src="' . $smilie_root . 'frown.gif" alt="*frowns*"/>', $Text);
	// :|
	$Text = preg_replace("/\:\|/", '<img src="' . $smilie_root . 'erf.gif" alt="...erm..."/>', $Text);
	// 8)
	$Text = preg_replace("/8\)/", '<img src="' . $smilie_root . 'glasses.gif" alt="Cool!"/>', $Text);
	// :P
	$Text = preg_replace("/\:p/", '<img src="' . $smilie_root . 'tongue.gif" alt="nyaaa"/>', $Text);
	$Text = preg_replace("/\:P/", '<img src="' . $smilie_root . 'tongue.gif" alt="nyaaa"/>', $Text);
	// :D
	$Text = preg_replace("/\:d/", '<img src="' . $smilie_root . 'biggrin.gif" alt="haha"/>', $Text);
	$Text = preg_replace("/\:D/", '<img src="' . $smilie_root . 'biggrin.gif" alt="haha"/>', $Text);
	// XD
	$Text = preg_replace("/xd/", '<img src="' . $smilie_root . 'xd.gif" alt="HAHA!"/>', $Text);
	$Text = preg_replace("/XD/", '<img src="' . $smilie_root . 'xd.gif" alt="HAHA!"/>', $Text);
	$Text = preg_replace("/xD/", '<img src="' . $smilie_root . 'xd.gif" alt="HAHA!"/>', $Text);
	$Text = preg_replace("/Xd/", '<img src="' . $smilie_root . 'xd.gif" alt="HAHA!"/>', $Text);
	// ^_^
	$Text = preg_replace("/\^\_\^/", '<img src="' . $smilie_root . '^^.gif" alt="hehe"/>', $Text);

	return $Text;
}
?>