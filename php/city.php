<?php 
	include("../conf/connection.php");

	if ($_GET['city']) {

		$SQL = "SELECT Nama FROM kota WHERE Nama LIKE '%".$_GET["city"]."%' or Nama LIKE '%".$_GET["city"]."%' ";
		$query_SQL = mysqli_query($connection, $SQL);
		$data = array();
		$i = 0;

		while( $row = mysqli_fetch_array($query_SQL) )
		{
			$data[$i] = array(
				"city" 	=> $row['Nama'],
			);
			$i++;
		}
		echo json_encode($data);

	}

	if ($_REQUEST['action'] == 'city') {

		$city 		= $_REQUEST['city_value'];
		date_default_timezone_set("Asia/Bangkok");
		$datakota	=file_get_contents('http://sugg.us.search.yahoo.net/gossip-gl-location/?appid=weather&output=sd1&p2=cn,t,pt,z&callback=YUI.Env.JSONP.yui_3_9_1_1_1385487674574_644&lc=en-US&p1=101.4499969482422,0.53329998254776&command='.$city);
		preg_match("#&woeid=(.*?)&#",  $datakota,$kodekota);
		preg_match("#&lon=(.*?)&#",  $datakota,$datalon);
		preg_match("#&lat=(.*?)&#",  $datakota,$datalat);
		$lon 	  = trim($datalon[1]);
		$lat 	  = trim($datalat[1]);
		$kodekota =trim($kodekota[1]);
		$BASE_URL = "http://query.yahooapis.com/v1/public/yql";
		$yql_query = 'SELECT * FROM weather.forecast WHERE woeid in ('.$kodekota.')';
		$yql_query_url = $BASE_URL . "?q=" . urlencode($yql_query) . "&format=json";
		$session = curl_init($yql_query_url);
		curl_setopt($session, CURLOPT_RETURNTRANSFER,true);
		$json = curl_exec($session);
		echo $json ;
	}
 ?>