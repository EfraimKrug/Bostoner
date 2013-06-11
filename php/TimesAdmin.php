<?php
unset($_POST['submit']);
$times = $_POST;
$daysArray = array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Shabbos");
$daviningArray = array("Shacharis","Mincha","Maariv","Ma'ariv");
$arr = array();
$holdDay = "";
$printDay = "";
$htmlFile = fopen("../html/DailyTimes.html", "w") or exit("DailyTimes.html could not be opened!");

fwrite($htmlFile, "<html><head>");
fwrite($htmlFile, "<style>.yomtif {color:yellow;}</style>");
fwrite($htmlFile, "</head><body><h1>Davining Times this week</h1><table>");

foreach ($times as $key => $value){
		$key_hold = preg_replace("/([A-Z])/", " $1", $key);
		$arr = explode(" ", $key_hold);
		if(in_array("Yomtif", $arr)){
			if(in_array($arr[1], $daysArray)){
				if($value > ""){
					if(in_array("Name", $arr)){
						fwrite($htmlFile, "<tr><td></td><td class='yomtif'></td><td  class='yomtif'>" . $value . "</td></tr>");
						}
					if(in_array("Time", $arr)){
						fwrite($htmlFile, "<tr><td></td><td></td><td class='yomtif'>Licht Benchen:</td><td  class='yomtif'>" . $value . "</td></tr>");
						}
					}
				}
			}
		else {
		if(in_array($arr[1], $daysArray)){	
				if($arr[1] == $holdDay){
					$printDay = "";
					}
				else {
					$printDay = $arr[1];
					$holdDay = $arr[1];
					}
				}
		fwrite($htmlFile, "<tr><td>" . $printDay . "</td><td>" . $arr[2] . "</td><td>" . $value . "</td></tr>");
		}
	}
fwrite ($htmlFile, "</table></body></html>");
fclose($htmlFile);
header("Location:../html/DailyTimes.html");
?>