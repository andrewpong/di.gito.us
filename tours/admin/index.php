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
if(isset($_SESSION['session_username']) && isset($_SESSION['session_password']))
{
	if (isset($_POST['tour_submit']))
	{	
		$aa = ($_POST['tourName']);
		$bb = $_POST['country'];
		$cc = $_POST['description'];
		$dd = $_POST['ininerary'];
		$ee = $_POST['numNights'];
		$ff = $_POST['exerciseReqd'];
		$gg = $_POST['tour_imageURL'];
		$hh = $_POST['tour_imageALT'];
		$ii = $_POST['basePriceAdult'];
		$jj = $_POST['basePriceChild'];
		$kk = $_POST['meals_per_day'];
		
		$sql = "INSERT INTO tours SET
		tour_name = '$aa',
		tour_country = '$bb',
		tour_description = '$cc',
		tour_itinerary = '$dd',
		tour_num_nights = '$ee',
		tour_exercise_required = '$ff',
		tour_img_url = '$gg',
		tour_img_alt = '$hh',
		tour_price_adult = '$ii',
		tour_price_child = '$jja',
		tour_meals = '$kk'
		";

		if (mysql_query($sql) or die('The server died... contact Hakaslak!'))
		{
			require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/global.php');
			require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/header.php');
			echo ('
			<h2>Congratualtions!</h2>
			<p>Your tour has been submitted!</p>
			<p><a href="' . $current_domain . 'tours/">Click here to return to the tours</a></p>
			');
			echo(var_dump($aa) . '<br />');
			echo(var_dump($bb) . '<br />');
			echo(var_dump($cc) . '<br />');
			echo(var_dump($dd) . '<br />');
			echo(var_dump($ee) . '<br />');
			echo(var_dump($ff) . '<br />');
			echo(var_dump($gg) . '<br />');
			echo(var_dump($hh) . '<br />');
			echo(var_dump($ii) . '<br />');
			echo(var_dump($jj) . '<br />');
			echo(var_dump($kk));
			require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/footer.php');
		}
	}
	else
	{
	require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/global.php');
	require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/header.php');
	?>
	<img src="http://cis.srvc.net/wdb33/chap14/images/banner_left.gif" />
	<form method="post" name="form1" action="<?=$_SERVER['PHP_SELF']?>">
	<table align="center">
	<caption>Add an new tour</caption>
	<tr valign="baseline">
	<td nowrap align="right">TourName:</td>
	<td><input type="text" name="tourName" id="tourName"value="" size="32"></td>
	</tr>
	<tr valign="baseline">
	
	<td nowrap align="right">Country:</td>
	<td><select name="country" id="country">
	<option value="15" >Argentina</option>
	<option value="1" >Canada</option>
	<option value="11" >Egypt</option>
	<option value="5" >France</option>
	
	<option value="16" >India</option>
	<option value="10" >Israel</option>
	<option value="2" >Italy</option>
	<option value="4" >Japan</option>
	<option value="8" >Mexico</option>
	<option value="14" >Morocco</option>
	
	<option value="9" >Namibia</option>
	<option value="7" >Peru</option>
	<option value="3" >Taiwan</option>
	<option value="13" >Thailand</option>
	<option value="6" >United Kingdom</option>
	<option value="12" >United States</option>
	
	</select>
	</td>
	<tr>
	<tr valign="baseline">
	<td nowrap align="right">Description:</td>
	<td><input type="text" name="description" id="description" value="" size="32"></td>
	</tr>
	<tr valign="baseline">
	
	<td nowrap align="right">Itinerary:</td>
	<td><input type="text" name="itinerary" id="itinerary" value="" size="32"></td>
	</tr>
	<tr valign="baseline">
	<td nowrap align="right">NumNights:</td>
	<td><input type="text" name="numNights" id="numNights" value="" size="32"></td>
	</tr>
	<tr valign="baseline">
	
	<td nowrap align="right">ExerciseReqd:</td>
	<td><input type="text" name="exerciseReqd" id="exerciseReqd" value="" size="32"></td>
	</tr>
	<tr valign="baseline">
	<td nowrap align="right">Tour_imageURL:</td>
	<td><input type="text" name="tour_imageURL" id="tour_imageURL" value="" size="32"></td>
	</tr>
	<tr valign="baseline">
	<td nowrap align="right">Tour_imageALT:</td>
	<td><input type="text" name="tour_imageALT" id="tour_imageALT" value="" size="32"></td>
	</tr>
	<tr valign="baseline">
	<td nowrap align="right">BasePriceAdult:</td>
	<td><input type="text" name="basePriceAdult" id="basePriceAdult" value="" size="32"></td>
	</tr>
	<tr valign="baseline">
	
	<td nowrap align="right">BasePriceChild:</td>
	<td><input type="text" name="basePriceChild" id="basePriceChild" value="" size="32"></td>
	</tr>
	<tr valign="baseline">
	<td nowrap align="right">Meals_per_day:</td>
	<td><input type="text" name="meals_per_day" id="meals_per_day" value="" size="32"></td>
	</tr>
	<tr valign="baseline">
	<td nowrap align="right">&nbsp;</td>
	<td><input type="submit" value="Insert record"></td>
	</tr>
	</table>
	<input type="hidden" name="tour_submit" value="tour_submit">
	</form>
	<?
	$sql = "SELECT tour_name, tour_country, tour_description, tour_itinerary, tour_num_nights, tour_exercise_required, tour_img_url, tour_img_alt, tour_price_adult, tour_price_child, tour_meals FROM tours WHERE tour_country = '$goddamnit'";
	$getlist = mysql_query($sql) or die(mysql_error());
	require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/header.php');
	while ($list = mysql_fetch_array($getlist))
	{
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
	}
	require_once($_SERVER['DOCUMENT_ROOT'] . '/files/includes/footer.php');
	}
}
else
{
	header('Location: ' . $current_domain . 'errors/not_logged_in/');
}
?>