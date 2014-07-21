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

<li><a href="<?=$current_domain?>tours/find_a_tour/">Find a Tour</a></li>
<li><a href="<?=$current_domain?>tours/specific_country/showtour.php?tour=AF"> > Africa</a></li>
<li><a href="<?=$current_domain?>tours/specific_country/showtour.php?tour=CAM"> > America, Central</a></li>
<li><a href="<?=$current_domain?>tours/specific_country/showtour.php?tour=NAM"> > America, North</a></li>
<li><a href="<?=$current_domain?>tours/specific_country/showtour.php?tour=SAM"> > America, South</a></li>
<li><a href="<?=$current_domain?>tours/specific_country/showtour.php?tour=CAS"> > Asia, Central</a></li>
<li><a href="<?=$current_domain?>tours/specific_country/showtour.php?tour=EAS"> > Asia, East</a></li>
<li><a href="<?=$current_domain?>tours/specific_country/showtour.php?tour=WAS"> > Asia, West</a></li>
<li><a href="<?=$current_domain?>tours/specific_country/showtour.php?tour=EU"> > Europe</a></li>
<li><a href="<?=$current_domain?>tours/country_profiles/">Country Profiles</a></li>
<li><a href="<?=$current_domain?>tours/contact_an_agent/">Contact an Agent</a></li>


if(isset($_GET['tour']))
{
	switch ($_GET['tour'])
	{
		case 'AF';
		$goddamnit = 
		$sql = "SELECT tour_name, tour_country, tour_description, tour_itinerary, tour_num_nights, tour_exercise_required, tour_img_url, tour_img_alt, tour_price_adult, tour_price_child, tour_meals FROM tours WHERE tour_country = '$goddamnit'";
		$getlist = mysql_query($sql) or die(mysql_error());
		require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/header.php');
		while ($list = mysql_fetch_array($getlist)) {
		echo '
		<div id="tour">
		<h3>' . $list["tour_name"] . '</h2>
		<div id="tours_imgurl"><img src="' . $list["tour_img_url"] . '"alt="' . $list["tour_img_alt"] . '"</div>
		<div id="tours_country"><strong>Country name:</strong> ' . $list["tour_country"] . '</p>
		<div id="tours_description"><strong>Description:</strong> ' . $list["tour_description"] . '</div>
		<div id="tours_num_nights"><strong>Number of nights:</strong> ' . $list["tour_num_nights"] . '</div>
		<div id="tours_exercise"<strong>Amount of exercise:</strong> >' . $list["tour_exercise_required"] . '</div>
		<div id="tours_padult"><strong>Price / adult:</strong> ' . $list["tour_price_adult"] . '</div>
		<div id="tours_pchild"><strong>Price / child:</strong> ' . $list["tour_price_child"] . '</div>
		<div id="tours_meals"><strong>Meals / day:</strong> ' . $list["tour_meals"] . '</div>
		</div>
		';
} // end while

		break
		case 'CAM';
		
		break
		case 'NAM';
		
		break
		case 'SAM';
		
		break
		case 'CAS';
		
		break
		case 'EAS';
		
		break
		case 'WAS';
		
		break
		case 'EU';
		
		break
	}
}
else
{
header ('Location: ' . $current_domain . 'tours\');
}
$sql = "SELECT tour_name, tour_country, tour_description, tour_itinerary, tour_num_nights, tour_exercise_required, tour_img_url, tour_img_alt, tour_price_adult, tour_price_child, tour_meals FROM tours";
$getlist = mysql_query($sql) or die(mysql_error());
require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/header.php');
while ($list = mysql_fetch_array($getlist)) {
	echo '
	<div id="tour">
	<h3>' . $list["tour_name"] . '</h2>
	<div id="tours_imgurl"><img src="' . $list["tour_img_url"] . '"alt="' . $list["tour_img_alt"] . '"</div>
	<div id="tours_country"><strong>Country name:</strong> ' . $list["tour_country"] . '</p>
	<div id="tours_description"><strong>Description:</strong> ' . $list["tour_description"] . '</div>
	<div id="tours_num_nights"><strong>Number of nights:</strong> ' . $list["tour_num_nights"] . '</div>
	<div id="tours_exercise"<strong>Amount of exercise:</strong> >' . $list["tour_exercise_required"] . '</div>
	<div id="tours_padult"><strong>Price / adult:</strong> ' . $list["tour_price_adult"] . '</div>
	<div id="tours_pchild"><strong>Price / child:</strong> ' . $list["tour_price_child"] . '</div>
	<div id="tours_meals"><strong>Meals / day:</strong> ' . $list["tour_meals"] . '</div>
	</div>
	';
} // end while
require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/footer.php');
?>