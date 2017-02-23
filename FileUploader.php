<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>File Uploader</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
</head>
<body>
<form action="FileUploader.php" method="POST" enctype="multipart/form-data">
Name:<br />
<input type="text" name="name" /><br />
Description:<br />
<input type="text" name="description" /><br />
<input type="hidden" name="MAX_FILE_SIZE" value="25000" /><br />
File to upload:<br />
<input type="file" name="new_file" /><br />
(25,000 byte limit) <br />
<input type="submit" name="upload" value="Upload the File" /><br />
</form>
<?php
$Dir = "files";
if (isset($_POST['upload'])) {
 if(empty($_POST['name']) || empty($_POST['description']))
  echo "Enter the name and decription of the image\n";
 else if(!isset($_FILES['new_file']))
 {
  echo "Select an image to upload\n";
 }
 else
 {
  $Name=addslashes($_POST['name']);
  $Description=addslashes($_POST['description']);
  $FileName=$Dir . "/" . $_FILES['new_file']['name'];
  $ImageList=fopen("image_description.txt","ab");
  if(is_writeable("image_description.txt"))
  {
   if(fwrite($ImageList,$Name."|".$Description."|".$FileName."\n"))
    echo "<p>Thankyou for Uploading</p>\n";
   else
    echo "cannot uplaod\n";
  }
  else
   echo"<p> cannot write to the file.</p>\n";
   fclose($ImageList);
  }
 
 if (isset($_FILES['new_file']))
  {
 if(move_uploaded_file( $_FILES['new_file']['tmp_name'], $Dir . "/" . $_FILES['new_file']['name']) == TRUE) 
 {
  chmod($Dir . "/" . $_FILES['new_file'] ['name'], 0777);
 echo "File \"" . htmlentities($_FILES['new_file'] ['name']) . "\"successfully uploaded. <br />\n";
 }
 else
 echo "There was an error  uploading \"" . htmlentities($_FILES['new_file']['name']) . "\".<br />\n";
 }
}

?>

</body>
</html>