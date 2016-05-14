   <!DOCTYPE html>
<html>
    <head>
		<link rel="stylesheet" type="text/css" href="style_web-5.css">
	</head>
	<body>
	<h1>M&#226nc&#259ruri in Timisoara </h1>
	
	
	<?php

   $username="root";$password="";$database="cef_project_db";
   mysql_connect('localhost',$username,$password);
   @mysql_select_db($database) or die( "Unable to select database");

   $query="SELECT * FROM events_food ORDER BY date ASC, time ASC";
   $result=mysql_query($query);
   $result = mysql_query($query) or die(mysql_error());
   

   while($row = mysql_fetch_array($result)){
	$title=$row['title'];
    $img=$row['img_path'];
	$location=$row['location'];
	$date=$row['date'];
	$time=$row['time'];
	$description=$row['description'];
	
	echo '<div class="food1">';
	print '<img class="event_pic" src="' . $img . '" />';
	echo '<h3>' . $title . '</h3>';
	echo '<p><b>Loca&#355ie: ' . $location . '</b><br>';
	
	echo '<br><br>';
	
	echo $description . '</p>';
	//" - ". $row['location']. " - ". $row['date']."-". $row['description'];
	
	echo '</div>';
}
?>
	
	<body>
	
	
</html>