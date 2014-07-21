<?
/***************************************************************************
 *		WebDB/forum/post.php
 *                            -------------------
 *		begin                : Sunday, 12 November 2006
 *		copyright            : (C) 2007 Andrew W. Pong (Hakaslak)
 *		email                : hakaslak@gmail.com
 *
 ***************************************************************************/
 
require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/global.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/header.php');
echo '<img src="http://cis.srvc.net/wdb33/chap14/images/banner_left.gif" />';
$sql = "SELECT tour_id, tour_name, tour_country, tour_description, tour_itinerary, tour_num_nights, tour_exercise_required, tour_img_url, tour_img_alt, tour_price_adult, tour_price_child, tour_meals FROM tours";
$getlist = mysql_query($sql) or die(mysql_error());
require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/header.php');
while ($list = mysql_fetch_array($getlist))
{
switch ($list["tour_country"])
{
	case '15':
	$bullshit = 'Argentina';
	case '1':
	$bullshit = 'Canada';
	case '11':
	$bullshit = 'Egypt';
	case '5':
	$bullshit = 'France';
	case '16':
	$bullshit = 'India';
	case '10':
	$bullshit = 'Israel';
	case '2':
	$bullshit = 'Italy';
	case '4':
	$bullshit = 'Japan';
	case '8':
	$bullshit = 'Mexico';
	case '14':
	$bullshit = 'Morocco';
	case '9':
	$bullshit = 'Namibia';
	case '7':
	$bullshit = 'Peru';
	case '3':
	$bullshit = 'Taiwan';
	case '13':
	$bullshit = 'Thailand';
	case '6':
	$bullshit = 'United Kingdom';
	case '12':
	$bullshit = 'United States';
}
	echo '
	<div id="tour">
	<h3>' . $list["tour_name"] . '</h2>
	<div id="tours_imgurl"><img src="' . $list["tour_img_url"] . '"alt="' . $list["tour_img_alt"] . '"</div>
	<div id="tours_country"><strong>Country name:</strong> ' . $bullshit . '</p>
	<div id="tours_description"><strong>Description:</strong> ' . $list["tour_description"] . '</div>
	<div id="tours_num_nights"><strong>Number of nights:</strong> ' . $list["tour_num_nights"] . '</div>
	<div id="tours_exercise"<strong>Amount of exercise:</strong> >' . $list["tour_exercise_required"] . '</div>
	<div id="tours_padult"><strong>Price / adult:</strong> ' . $list["tour_price_adult"] . '</div>
	<div id="tours_pchild"><strong>Price / child:</strong> ' . $list["tour_price_child"] . '</div>
	<div id="tours_meals"><strong>Meals / day:</strong> ' . $list["tour_meals"] . '</div>
	';
	if(isset($_SESSION['session_username']) && isset($_SESSION['session_password']))
	{
		echo '<a href="' . $current_domain . 'tours/admin/delete.php?deletetour=' . $list["tour_id"] . '">DELETE THIS TOUR</a>';
	}
	echo '
	</div></div>
	';
} // end while
require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/footer.php');
?>