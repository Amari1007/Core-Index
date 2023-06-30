<?php 
require("include/coreDB.php");
$conn->close(); //uncomment this to prevent execution
exit();

$home_team = "Mighty Tigers";
$away_team = "CIVO";
$MD = "5";
$home_score = 0;
$away_score = 1;
$date = "2022-05-29";
$time = "15:00:00";
$status = "disabled";
$competition = "TNM Super League";
$competition_code = "mwl-tsl";
$season = "2022-2023";
$venue = null;
$minutes_played = "FT";

$sql = "INSERT INTO `fixtures` (`competition`, `competition_code`, `season`, `country`, `MD`, `minutes_played`, `date`, `time`, `venue`, `referee`, `home_team`, `away_team`, `home_goals`, `away_goals`,`status`)
 VALUES ('$competition', '$competition_code', '$season', 'Malawi', '$MD', '$minutes_played', '$date', '$time', NULL, NULL, '$home_team', '$away_team', '$home_score', '$away_score','$status')
";

if($conn->query($sql)){
	echo "successfully added fixture";
	$conn->close();
	exit();
}else{
	echo "couldnt add fixture";
	$conn->close();
	exit();
}

//INSERT INTO `fixtures` (`match_ID`, `competition`, `competition_code`, `season`, `country`, `MD`, `minutes_played`, `date`, `time`, `venue`, `referee`, `home_team`, `away_team`, `home_goals`, `away_goals`, `home_scorers`, `away_scorers`, `home_lineup`, `away_lineup`, `home_reds`, `away_reds`, `home_yellows`, `away_yellows`, `home_possession`, `away_possession`, `home_shots`, `away_shots`, `home_corners`, `away_corners`, `home_fouls`, `away_fouls`, `home_votes`, `away_votes`, `draw_votes`, `status`) VALUES (NULL, NULL, NULL, NULL, 'Malawi', NULL, NULL, NULL, '14:30:00.000000', NULL, NULL, 'ssss', 'sss', '0', '0', NULL, NULL, NULL, NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 'upcoming')

?>