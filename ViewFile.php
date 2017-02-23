<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Reunion Images</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
</head>
<body>
<?php
$Display=file("image_description.txt");
echo "<h1> High School Reunion Images</h1>\n";
foreach ($Display as $show)
{
 $image=explode('|',$show,3);
 //echo "<p>From" . $image[0]."<br />\n";
 //echo "<img src='" . $image[2] . "' alt='" . $image[1]."'><br />\n";
 //echo $image[1]."</p>\n";
 echo "<img src='".$image[2]."' alt='".$image[1]."'><br />\n";
 echo "$image[1]<br />\n";
}
?>
</body>
</html>