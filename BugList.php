<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Bug List</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
</head>
<body>
</u><span style="float:right"><a href="NewBugReport.html">New Bug Report</a></span></p>
<h2>Bug List</h2>
<table border="1">
<td><strong>Product Name</strong></td><td><strong>Product Version</strong></td><td><strong>Type of Hardware</strong></td><td><strong>Operating System</strong></td><td><strong>Frequency of Occurrence</strong></td><td><strong>Proposed Solution</strong></td><td>&nbsp;</td></tr>

<?php 

	if (isset($_POST['Submit'])) {
		$BugId = uniqid();
		$ProductName = addslashes($_POST['ProductName']);
		$ProductVersion = addslashes($_POST['ProductVersion']);
		$HardwareType = addslashes($_POST['HardwareType']);
		$OS = addslashes($_POST['OS']);
		$Frequency = addslashes($_POST['Frequency']);
		$Solution = addslashes($_POST['Solution']);
		$BugReport = fopen("bugreport.txt", "a");
		if (is_writeable("bugreport.txt")) {
			if (fwrite($BugReport, $BugId.",".$ProductName . "," . $ProductVersion . "," .  $HardwareType."," .  $OS."," .  $Frequency."," .  $Solution."\r\n"))
				echo "<p>Thank you for reporting new bug!</p>\n";
			else
				echo "<p>Cannot add your name to the bowlers book.</p>\n";
		}else
			echo "<p>Cannot write to the file.</p>\n";
			
		fclose($BugReport);
	}
	if (isset($_POST['Update'])) {
	
		$BugId = addslashes($_POST['BugId']);
		$ProductName = addslashes($_POST['ProductName']);
		$ProductVersion = addslashes($_POST['ProductVersion']);
		$HardwareType = addslashes($_POST['HardwareType']);
		$OS = addslashes($_POST['OS']);
		$Frequency = addslashes($_POST['Frequency']);
		$Solution = addslashes($_POST['Solution']);
		
		$reading = fopen('bugreport.txt', 'r');
		$writing = fopen('bugreportTemp.txt', 'w');

		$replaced = false;

		while (!feof($reading)) {
		  $line = fgets($reading);
		  if (stristr($line,$BugId)) {
			$line = $BugId.",".$ProductName . "," . $ProductVersion . "," .  $HardwareType."," .  $OS."," .  $Frequency."," .  $Solution."\r\n";
			$replaced = true;
		  }
		  fputs($writing, $line);
		  echo $line;
		}
		fclose($reading); fclose($writing);
		if ($replaced) 
		{
		  rename('bugreportTemp.txt', 'bugreport.txt');
		} else {
		  unlink('bugreportTemp.txt');
		}
	}
	
	$reading = fopen('bugreport.txt', 'r');

	while (!feof($reading)) {
	  $line = fgets($reading);
	  if(!empty($line)){

		  $details = explode(",",$line);
		  ?>
			<tr><td colspan='7'>&nbsp;</td></tr>
			<tr><td><?php  if (count($details) > 1) echo $details[1];  ?>
			</td><td><?php if (count($details) > 1) echo $details[2];  ?>
			</td><td><?php if (count($details) > 1) echo $details[3];  ?>
			</td><td><?php if (count($details) > 1) echo $details[4];  ?>
			</td><td><?php if (count($details) > 1) echo $details[5];  ?>
			</td><td><?php if (count($details) > 1) echo $details[6];  ?>
			</td>
			</strong><td><a href="UpdateBugReport.php?BugId=<?php if (count($details) > 1) echo $details[0] ?>">Update</a></td></tr>
			<?php
		}
	}
	fclose($reading); 
?>
</table>
</body>
</html>
