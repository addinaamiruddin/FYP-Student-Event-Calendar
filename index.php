<?php
include 'Calendar.php';
$calendar = new Calendar('2022-01-28');
$calendar->add_event('Video', '2022-01-03', 1, 'green');
$calendar->add_event('Meeting', '2022-01-04', 1, 'red');
$calendar->add_event('Virtual Talk', '2022-01-16', 7);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Event Calendar</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link href="calendar.css" rel="stylesheet" type="text/css">
	</head>
	<body>
	    <nav class="navtop">
	    	<div>
	    		<h1>Event Calendar</h1>
	    	</div>
	    </nav>
		<div class="content home">
			<?=$calendar?>
		</div>
	</body>
</html>