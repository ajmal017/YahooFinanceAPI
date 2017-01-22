<?php $page_name="Dashboard"?>
<?php include("head.php"); ?>

<?php

	$arrContextOptions=array(
    	"ssl"=>array(
    	    "verify_peer"=>false,
        	"verify_peer_name"=>false,
        ),
	);

	if(isset($_GET['symbol'])){
		$Symbol = "\"" . $_GET['symbol'] . "\"";
	} else {
		$Symbol = "\"YHOO\"";	
	}

	$xml = "https://query.yahooapis.com/v1/public/yql?q=";
	$xml.= urlencode("select * from yahoo.finance.quotes where symbol in (" 
		. $Symbol . ")");
	$xml.= "&format=json&env=";
	$xml.= urlencode("store://datatables.org/alltableswithkeys");
	$xml.= "&callback=";
	
	// echo $xml;
	
	$json = file_get_contents($xml, true, stream_context_create($arrContextOptions));
	// $json = file_get_contents($xml);
	// var_dump($http_response_header);
	$array = json_decode($json,TRUE);
	
	/*echo "<pre>";
	print_r($array);
	echo "</pre>"; */
	
	echo "Symbol= " . $array["query"]["results"]["quote"]["symbol"] . "<br/>";
	echo "Name= " . $array["query"]["results"]["quote"]["Name"] . "<br/>";
	echo "Currency= " . $array["query"]["results"]["quote"]["Currency"] . "<br/>";
	echo "Price= " . $array["query"]["results"]["quote"]["LastTradePriceOnly"] . "<br/>";
	echo "Average Daily Volume= " . $array["query"]["results"]["quote"]["AverageDailyVolume"] . "<br/>";
	
	
	?>    
	
 <?php include("footer.php"); ?>