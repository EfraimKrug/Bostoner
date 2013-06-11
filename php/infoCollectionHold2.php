<?php
$iName = htmlentities($_POST['iName'],ENT_QUOTES);
$iMemory = htmlentities($_POST['iMemory'],ENT_QUOTES);
error_reporting(0); 

$allowedExts = array("jpg", "jpeg", "gif", "png", "JPG", "JPEG", "GIF", "PNG");
$extension = end(explode(".", $_FILES["file"]["name"]));

if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/png")
|| ($_FILES["file"]["type"] == "image/pjpeg"))
&& ($_FILES["file"]["size"] < 1000000)
&& in_array($extension, $allowedExts))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
    echo "Type: " . $_FILES["file"]["type"] . "<br>";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
    }
  else
    {
    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
    if (file_exists("../upload/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "../upload/" . $_FILES["file"]["name"]);
      echo "Stored in: " . "../upload/" . $_FILES["file"]["name"];
      }
    }
  }
else
  {
	echo "No file attached... " . $iName . ": " . $iMemory;
  }
//exit;
// Update Database
$sqlInsertInfo = "INSERT INTO Info (infoPicture, infoMemory, infoName) VALUES ('" . $_FILES["file"]["name"] . "','" . $iMemory . "','" . $iName . "');";
$con = mysql_connect("efraimmkrugcom.domaincommysql.com","bostoner_7","torah_613");		//production
//$con = mysql_connect("localhost","root","");		//test
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("bostonerdb", $con);		//production
//mysql_select_db("BostonerDB", $con);		//test
mysql_query($sqlInsertInfo, $con);
mysql_close($con);

// print the web page... 
echo "<html><head></head><body></body></html>";
?>