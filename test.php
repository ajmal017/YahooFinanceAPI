<?php $page_name="Dashboard"?>
<?php include("head.php"); ?>
	
	<div id="wrapper">
  		<!-- Navigation -->
  		<?php require 'nav.php';?>
	</div>

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
	
	
	
	$json = file_get_contents($xml, true, stream_context_create($arrContextOptions));
	
	$array = json_decode($json,TRUE);
	
	
	?>
	<div id="page-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"><?php echo $array["query"]["results"]["quote"]["Name"] . "<small> (" . strtoupper($array["query"]["results"]["quote"]["symbol"]) . ")</small>" ?></h1>
				<h5>Currency in <?php echo $array["query"]["results"]["quote"]["Currency"] ?> </h5>
				<?php
				if($array["query"]["results"]["quote"]["Change"] >= 0){
					$change = "label label-success";
				} else {
					$change = "label label-danger";
				}
				?>
				<h1><?php echo $array["query"]["results"]["quote"]["LastTradePriceOnly"]; ?>
					<small>
						<span class="<?php echo $change; ?>">
							<?php echo $array["query"]["results"]["quote"]["Change"]; ?>
						</span>&nbsp;
						<span class="<?php echo $change; ?>">
							<?php echo $array["query"]["results"]["quote"]["PercentChange"]; ?>
						</span>
					</small>
				</h1>
				<?php $date = date_create($array["query"]["results"]["quote"]["LastTradeDate"]);?>
				<h5>At close: <?php echo date_format($date, 'F d, Y'); ?> </h5>
			

			</div> <!-- col-lg-12 -->
		</div> <!-- row -->
		<br/>
		<div class="row">
			<div class="col-lg-4">
				<div class="panel panel-default">
					<div class="panel-body">
						<table class="table">
                    <tbody>
                        <tr>
                            <td>Previous Close</td>
                            <td class="text-right"><strong><?php echo $array["query"]["results"]["quote"]["PreviousClose"]; ?></strong></td>
                        </tr>
                        <tr>
                            <td>Open</td>
                            <td class="text-right"><strong><?php echo $array["query"]["results"]["quote"]["Open"]; ?></strong></td>
                        </tr>
                        <tr>
                            <td>Bid</td>
                            <td class="text-right"><strong><?php echo $array["query"]["results"]["quote"]["Bid"]; ?></strong></td>
                        </tr>
                        <tr>
                            <td>Ask</td>
                            <td class="text-right"><strong><?php echo $array["query"]["results"]["quote"]["Ask"]; ?></strong></td>
                        </tr>
                        <tr>
                            <td>Day's Range</td>
                            <td class="text-right"><strong><?php echo $array["query"]["results"]["quote"]["DaysRange"]; ?></strong></td>
                        </tr>
                        <tr>
                            <td>52 Week Range</td>
                            <td class="text-right"><strong><?php echo $array["query"]["results"]["quote"]["YearRange"]; ?></strong></td>
                        </tr>
                        <tr>
                            <td>Volume</td>
                            <td class="text-right"><strong><?php echo $array["query"]["results"]["quote"]["Volume"]; ?></strong></td>
                        </tr>
                        <tr>
                           <td>Avg. Volume</td>
                           <td class="text-right"><strong><?php echo $array["query"]["results"]["quote"]["AverageDailyVolume"]; ?></strong></td>
                        </tr>
                        
                    </tbody>
                </table>		
					</div>
				</div>
				
					
			</div>

			<div class="col-lg-4">
				<div class="panel panel-default">
					<div class="panel-body">
						<table class="table">
                    <tbody>
                        <tr>
                            <td>Market Cap</td>
                            <td class="text-right"><strong><?php echo $array["query"]["results"]["quote"]["MarketCapitalization"]; ?></strong></td>
                        </tr>
                        <tr>
                            <td>Beta</td>
                            <td class="text-right"><strong>&nbsp;</strong></td>
                        </tr>
                        <tr>
                            <td>PE Ratio (TTM)</td>
                            <td class="text-right"><strong>&nbsp;</strong></td>
                        </tr>
                        <tr>
                            <td>EPS (TTM)</td>
                            <td class="text-right"><strong><?php echo $array["query"]["results"]["quote"]["EarningsShare"]; ?></strong></td>
                        </tr>
                        <tr>
                            <td>Earnings Date</td>
                            <td class="text-right"><strong>&nbsp;</strong></td>
                        </tr>
                        <tr>
                            <td>Dividend &amp; Yield</td>
                            <td class="text-right"><strong><?php echo $array["query"]["results"]["quote"]["DividendYield"]; ?></strong></td>
                        </tr>
                        <tr>
                            <td>Ex-Dividend Date</td>
                            <td class="text-right"><strong><?php echo $array["query"]["results"]["quote"]["ExDividendDate"]; ?></strong></td>
                        </tr>
                        <tr>
                           <td>1y Target Est</td>
                           <td class="text-right"><strong><?php echo $array["query"]["results"]["quote"]["OneyrTargetPrice"]; ?></strong></td>
                        </tr>
                        
                    </tbody>
                </table>		
					</div>
				</div>
				
			</div>
		</div>

		<!-- Historical Data -->
		<?php
		
		
		$hendDate = $date->format('Y-m-d'); 
		$hstartDate = date("Y-m-d", strtotime('-1 year', strtotime($hendDate)));

		$url = "https://query.yahooapis.com/v1/public/yql?q=";
		$url.= urlencode("select * from yahoo.finance.historicaldata where symbol =" . $Symbol . " and startDate=\"" . $hstartDate . "\" and endDate=\"". $hendDate . "\"");
		$url.= "&format=json&diagnostics=true&env=";
		$url.= urlencode("store://datatables.org/alltableswithkeys");
		$url.= "&callback=";
		
		
		
		$hjson = file_get_contents($url, true, stream_context_create($arrContextOptions));
		
		$harray = json_decode($hjson,TRUE);		
		

		?>

		<div class="row">
			<!-- Google Chart -->
			<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		    <script type="text/javascript">
		      google.charts.load('current', {'packages':['corechart']});
		      google.charts.setOnLoadCallback(drawChart);

		      function drawChart() {
		        var data = google.visualization.arrayToDataTable([
		          ['Day', 'Price']
		          <?php

					foreach (array_reverse($harray["query"]["results"]["quote"]) as $day){
						echo ", ['" . $day["Date"] . "', " . $day["Adj_Close"] . "]";
					}
		          ?>
		          
		        ]);

		        var options = {
		          chartArea: {'width': '90%', 'height': '80%'},
		          legend: 'none',
		          hAxis: { textPosition: 'none' },
		        };
		         

		        var chart = new google.visualization.AreaChart(document.getElementById('chart'));
		        chart.draw(data, options);
		      }
		      
		    </script>

			<div class="col-lg-8">
				<div class="panel panel-default">           
		            <div class="panel-heading">
		            	Last 12 months
		            </div>
		            <div class="panel-body">
		                <div id="chart" style="height:314px;"></div>
		            </div>
		            <!-- /.panel-body -->
	            </div>
			</div>

			
		</div>

	</div>
	
 <?php include("footer.php"); ?>
 

