<?
function render_avatar()
{
	switch($_FILES['image_file']['type'])
	{
		case 'image/png':
		case 'image/x-png':
		$type = 'png';
		break;
	
		case 'image/jpeg':
		case 'image/pjpeg':
		$type = 'jpg';
		break;
	
		case 'image/gif':
		$type = 'gif';
		break;
	
		default:
		$type = 'none';
		break;
	}   
	$temp_file_name = $_FILES['image_file']['name'];
	$image_attribs = getimagesize($temp_file_name);
	if($type == 'png')
	{
		$im_temp = imageCreateFromPNG($temp_file_name);
	}
	elseif($type == 'jpg')
	{
		$im_temp = imageCreateFromJPEG($temp_file_name);
	}
	elseif($type == 'gif')
	{
		$im_temp = imageCreateFromGIF($temp_file_name);
	}
	$th_max_width = 100;
	$th_max_height = 100;
	$ratio = ($image_attribs[0] > $image_attribs[1]) ? $th_max_width/$image_attribs[0] : $th_max_height/$image_attribs[1];
	$th_width = $image_attribs[0] * $ratio;
	$th_height = $image_attribs[1] * $ratio;
	$im_new = imagecreatetruecolor($th_width,$th_height);
	imageAntiAlias($im_new,true);
	$th_file_name = 'thumbs/' . $_FILES['image_file']['name'];
	imageCopyResampled($im_new,$im_temp,0,0,0,0,$th_width,$th_height, $image_attribs[0], $image_attribs[1]);
	imagePNG($im_new);
	imagedestroy($im_new);
}
?>