<?php
/*
 * get the form fields, etc...
 * and validate the email address - if not ok, 
 * send the user back to the previous page
 */
echo "<br>================ I N F O R M A T I O N  ==========================<br><br>";

$sql = "SELECT * FROM Info";
$con = mysql_connect("efraimmkrugcom.domaincommysql.com","bostoner_7","torah_613");
//$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("bostonerdb", $con);
$rs = mysql_query($sql, $con);

while($row = mysql_fetch_array($rs))
	{
	echo "<br>(" . $row['InfoID'] . ") (" . $row['infoPicture'] . ") {" . $row['infoDonation'] . "}[" . $row['infoMemory'] . "] -->" . $row['infoName'] . "<--";
	}
	
mysql_close($con);

?>