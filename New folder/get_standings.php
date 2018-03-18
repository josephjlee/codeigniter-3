<?php
include "db_con.php";
$url ="http://192.168.100.159/bolaworld/ws/standing/league/";
//This is the all id leagues
$ids = array("3037", "3102", "3232");


$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}else {


$db_selected = mysql_select_db($database, $conn);
if (!$db_selected) {
    die ('Can\'t use foo : ' . mysql_error());
}


foreach ($ids as $id ) {
echo "</br>";

echo $xmlfile = ''.$url.$id.'';


//Setup cURL Request
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $xmlfile);
curl_setopt($curl, CURLOPT_TIMEOUT, 130);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);


$response = curl_exec($curl);
            curl_close($curl);  


$xml = simplexml_load_string($response); 
$array = json_decode(json_encode((array)$xml), TRUE); 
$result = array();


 $_serialize_data = serialize($array);

$sql = "INSERT INTO lp_league_standings (lId,data) VALUES ('$id','$_serialize_data')";


$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not enter data: ' . mysql_error());
}


}
exit();

		foreach($array as $k=>$v) {
			foreach($v as $k1=>$v1) {

			$result[$k][$k1] = $v1;
					echo "</br>"; 


					echo $v1['team_id'];
					echo $v1['team_name'];
					echo $v1['overall_goals_attempted'];
					echo $v1['overall_goals_scored'];
					echo $v1['overall_lose'];
					echo $v1['overall_draw'];   
					echo $v1['overall_win'];
					echo $v1['overall_played'];
					echo $v1['home_goals_attempted'];
					echo $v1['home_goals_scored'];
					echo $v1['home_lose'];   
					echo $v1['home_draw'];
					echo $v1['home_win'];
					echo $v1['home_played'];
					echo $v1['away_goals_scored'];
					echo $v1['away_lose'];
					echo $v1['away_draw'];
					echo $v1['away_win'];
					echo $v1['away_played'];
					echo $v1['goal_difference'];
					echo $v1['points'];
				}
			}

}



?>


