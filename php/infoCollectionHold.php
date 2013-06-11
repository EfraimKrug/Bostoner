<?php
$iName = htmlentities($_POST['iName'],ENT_QUOTES);
$iMemory = htmlentities($_POST['iMemory'],ENT_QUOTES);
$iFileName = htmlentities($_FILES["file"]["name"]);
error_reporting(0); 

$allowedExts = array("jpg", "jpeg", "gif", "png", "JPG", "JPEG", "GIF", "PNG");
$extension = end(explode(".", $iFileName));

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
    echo "Upload: " . $iFileName . "<br>";
    echo "Type: " . $_FILES["file"]["type"] . "<br>";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
    }
  else
    {
    echo "Upload: " . $iFileName . "<br>";
    if (file_exists("../upload/" . $iFileName))
      {
      echo $iFileName . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "../upload/" . $iFileName);
      echo "Stored in: " . "../upload/" . $iFileName;
      }
    }
  }
//else
//  {
//	echo "No file attached... " . $iName . ": " . $iMemory;
//  }

// Update Database
$sqlInsertInfo = "INSERT INTO Info (infoPicture, infoMemory, infoName) VALUES ('" . $iFileName . "','" . $iMemory . "','" . $iName . "');";
$con = mysql_connect("efraimmkrugcom.domaincommysql.com","bostoner_7","torah_613");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("bostonerdb", $con);
mysql_query($sqlInsertInfo, $con);
mysql_close($con);

// print the web page... 
echo "<html><head></head><body></body></html>";
?>