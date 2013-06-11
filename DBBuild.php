<!DOCTYPE html>
<html>
<body>

<?php

$sql = array(	"CREATE DATABASE HomeAdmin",
"CREATE TABLE  Contractor
	(ContractorID smallint NOT NULL AUTO_INCREMENT,
	FirstName varchar(26),
	MiddleName varchar(26),
	LastName varchar(26),
	Email varchar(75),
	SocialSecurityNumber varchar(11),
	PhoneNumber varchar(12),
	TextAddress varchar(32),
	ActiveFlag varchar(1),
	StartDate date,
	HouseNumber varchar(18),
	Street varchar(32),
	City varchar(26),
	Country varchar(32),
	MailingCode varchar(18),
	PRIMARY KEY(ContractorID))",

"CREATE TABLE  OutsideContractor
	(ContractorID smallint NOT NULL AUTO_INCREMENT,
	FirstName varchar(26),
	MiddleName varchar(26),
	LastName varchar(26),
	Email varchar(75),
	SocialSecurityNumber varchar(11),
	PhoneNumber varchar(12),
	TextAddress varchar(32),
	ActiveFlag varchar(1),
	AssociatedPropertyID smallint,
	WorkType  varchar(32),
	PRIMARY KEY(ContractorID))",

"CREATE TABLE  Manager
	(ManagerID smallint NOT NULL AUTO_INCREMENT,
	FirstName varchar(26),
	MiddleName varchar(26),
	LastName varchar(26),
	Email varchar(75),
	SocialSecurityNumber varchar(11),
	PhoneNumber varchar(12),
	TextAddress varchar(32),
	ActiveFlag varchar(1),
	StartDate date,
	HouseNumber varchar(18),
	Street varchar(32),
	City varchar(26),
	Country varchar(32),
	MailingCode varchar(18),
	PRIMARY KEY(ManagerID))",

"CREATE TABLE  Owner
	(OwnerID smallint NOT NULL AUTO_INCREMENT,
	FirstName varchar(26),
	MiddleName varchar(26),
	LastName varchar(26),
	Email varchar(75),
	SocialSecurityNumber varchar(11),
	PhoneNumber varchar(12),
	TextAddress varchar(32),
	ActiveFlag varchar(1),
	StartDate date,
	HouseNumber varchar(18),
	Street varchar(32),
	City varchar(26),
	Country varchar(32),
	MailingCode varchar(18),
	PRIMARY KEY(OwnID))",

"CREATE TABLE  Property
	(PropertyID smallint NOT NULL AUTO_INCREMENT,
	OwnerID smallint,
	ContractorID smallint,
	ManagerID smallint,
	PhoneNumber varchar(12),
	PolicePhoneNumber varchar(12),
	FirePhoneNumber varchar(12),
	ActiveFlag varchar(1),
	StartDate date,
	HouseNumber varchar(18),
	Street varchar(32),
	City varchar(26),
	Country varchar(32),
	MailingCode varchar(18),
	FrequencyNeeded varchar(1),
	PRIMARY KEY(PropertyID))",

"CREATE TABLE  EmergencyContact
	(ID smallint,
	TypeID varchar(1),
	EmergencyContact varchar(75),
	EmergencyEmail varchar(75),
	EmergencyPhoneNumber varchar(12),
	PolicePhoneNumber varchar(12),
	FirePhoneNumber varchar(12),
	HospitalPhoneNumber varchar(12),
	PRIMARY KEY(ID))",

"CREATE TABLE ContractorManager
	(ManagerID smallint,
	ContractorID smallint,
	PRIMARY KEY(ContractorID))",

"CREATE TABLE OwnerProperty
	(OwnerID smallint,
	PropertyID smallint,
	PRIMARY KEY(OwnerID))",

"CREATE TABLE ContractorProperty
	(ContractorID smallint,
	PropertyID smallint,
	PRIMARY KEY(ContractorID))",

	
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("HomeAdmin", $con);
for($i=1;$i<count($sql);$i++)
{
if (mysql_query($sql[$i],$con))
  {
  echo $sql[$i] . "Successful<br>";
  }
else
  {
  echo "<br>Database Error: (" . $sql[$i] . ")" . mysql_error();
  }
}

mysql_close($con);
?> 

</body>
</html>