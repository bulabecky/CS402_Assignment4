<?php
	
  	if(isset($_POST['busStopNum'])){
  		$busStopNum = $_POST['busStopNum'];//fills table with bus stop number enter
  	}else{
  		$busStopNum = 103381;//loads page on original sourced link from assignment
  	}
	$bus_url = 'https://data.dublinked.ie/cgi-bin/rtpi/realtimebusinformation?stopid='.$busStopNum.'&format=xml';//if else sttement handles what xml file to load
	$xml = simplexml_load_file($bus_url);
	$busStopID = $xml->stopid;//restains bus stop id number
?>

<html>
	<head>
		<title> Assignment 4 CS402</title>
		<link rel="stylesheet" href="styles.css">
		  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	</head>
	<body>
	<img src="Logomakr_3Ft35j.png" alt="logo">
	<form action="/" method="POST">
			<div class="search">
				<input type="text" placeholder="Enter Bus Stop Number" name="busStopNum" required>
				<button type="submit" class="btn btn-warning">Search</button>

			</div>
		</form>
		<table>
		  <thead>
		  	<th>Bus Stop ID</th>
		    <th>Route</th> 
		    <th>Origin</th>
		    <th>Destination</th>
		    <th>Departure Due Time</th>
		    <th>Operator</th>
		  </thead>
		  <tbody>
		  <?php
		  	foreach($xml->results->result as $result){
		  		echo
		  		"<tr>
		  			<td>". $busStopID."</td>
					<td>". $result->route ."</td>
				  	<td>". $result->origin ."</td>
				    <td>". $result->destination ."</td>
				    <td>". $result->duetime ."</td>
				    <td>". $result->operator ."</td>
			  	</tr>";
		  	}
		  ?>
		 </tbody>
		</table>
		<p>Copyright &copy; made by Rebecca McGowan 13402658 as part of CA for CS402</p>
	</body>
</html>