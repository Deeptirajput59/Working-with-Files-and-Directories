<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Update Bug Report</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
</head>
<body>
Update Bug Report:</h3>
<form action="BugList.php" name="create" method="post">
<table border="1">
<h3><br />
<?php 	$reading = fopen('bugreport.txt', 'r');

	while (!feof($reading)) {
	  $line = fgets($reading);
	  if(!empty($line)){

		  $details = explode(",",$line);
		  if($details[0] == $_GET['BugId']){
				?>
				<input type="hidden" name="BugId" value="<?php  echo $details[0] ?>"/>
				<tr><td>Product Name</td><td><input type="text" name="ProductName" value="<?php  echo $details[1] ?>"/></td></tr> 
				<tr><td>Product Version</td><td><input type="text" name="ProductVersion" value="<?php  echo $details[2] ?>" /></td></tr> 
				<tr><td>Type of Hardware</td><td><input type="text" name="HardwareType" value="<?php  echo $details[3] ?>" /></td></tr> 
				<tr><td>Operating System</td><td><input type="text" name="OS" value="<?php  echo $details[4] ?>" /></td></tr> 
				<tr><td>Frequency of Occurrence</td><td><input type="text" name="Frequency"  value="<?php  echo $details[5] ?>"/></td></tr> 
				<tr><td>Proposed Solution</td><td><input type="text" name="Solution" value="<?php  echo $details[6] ?>" /></td></tr> 
				</table>
			  <?php
		  }

			
		}
	}
	fclose($reading); 
	?>
<input type="submit" name="Update" value="Update Report" />
</form>
</body>
</html>