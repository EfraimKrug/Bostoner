<!DOCTYPE html>
<html>
<body>
/*
 * NOTE: CHANGE INDEX FROM 0 TO 1 DEPENDING ON CREATING THE DATABASE OR NOT...
 */
 
<?php

$sql = array(	
"CREATE DATABASE bostonerdb",
"DROP TABLE Info",
"CREATE TABLE  Info
	(InfoID smallint NOT NULL AUTO_INCREMENT,
	infoPicture varchar(75),
	infoMemory varchar(1024),
	infoName varchar(75),
	infoDonation varchar(75),
	PRIMARY KEY(InfoID))",
);

	
$con = mysql_connect("efraimmkrugcom.domaincommysql.com","bostoner_7","torah_613");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("bostonerdb", $con);
for($i=1;$i<count($sql);$i++)
{
if (mysql_query($sql[$i],$con))
  {
  echo "<br>" . $sql[$i] . " Successful<br>";
  }
else
  {
  echo "<br>Database Error: (" . $sql[$i] . ")" . mysql_error();
  }
}
//FOREIGN KEY (PhoneNumber) REFERENCES Contractor (PhoneNumber),
mysql_close($con);
?> 

</body>
</html>