<?php

include "db_con.php";
//This is the all id leagues
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
  		die('Could not connect: ' . mysql_error());
}else {

		$db_selected = mysql_select_db($database, $conn);
		if (!$db_selected) {
			die ('Can\'t use foo : ' . mysql_error());
		}

}
		
		//$idss = mysql_fetch_array($retval0);
		$idss = array('3037', '3058', '3062', '676767');

		foreach($idss  as $ids ) {

				echo $ids;
				$date = array();
				$date = '2016-04-16';
				//$date = date('Y-m-d');
				echo "<pre>";
				echo $xmlfile ='http://bolaworld.com/ws/result/date/'."$ids".'/'."$date";
				//echo $xmlfile = "'$url'" . "'$id'" ."".$date."'";
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

				print_r($array);
				$_serialize_data = serialize($array);




          $_serialize_data = serialize($tabledata);
            $sql = "INSERT INTO lp_league_match (lId,data) VALUES ('$ids','$_serialize_data')";
            if ($conn->query($sql) === TRUE) {
            //  echo "Record updated successfully";

            echo "pasok";

            } else {
            echo "Error updating record: " . $conn->error;
            }

            $conn->close();




		}
?>


