<html>
<body>
<?php

$username="root";$password="";$database="wad_project_db";
mysql_connect('localhost',$username,$password);
@mysql_select_db($database) or die( "Unable to select database");

$query="SELECT * FROM events";
$result=mysql_query($query);
$result = mysql_query($query) or die(mysql_error());


/*while($row = mysql_fetch_array($result)){
	$title=$row['title'];
	echo $title . $row['img_path']. " - ". $row['location']. " - ". $row['date']."-". $row['description'];
	echo "<br />";
	
	print '<img style="width: 200px;" src="../../' . $row['img_path'] . '" />';
}*/

function event_image($event_id, $file_temp, $file_extn){
	$file_path = 'pictures/' . substr(md5(time()), 0, 10) . '.' . file_extn;//hash file name
	move_uploaded_file($file_temp, $file_path);
	//insert in db:
	//mysql_query("UPDATE `events_art` SET `img_path` = '". mysql_escape_string($file_path) . "' WHERE event_id = " . (int)$event_id);
}


function register_event($register_data, $event_type) {
	array_walk($register_data, 'array_sanitize');
	
	$fields ='`' . implode('`, `', array_keys($register_data)) . '`';
	$data = '\'' . implode('\', \'', $register_data) . '\'';

	mysql_query("INSERT INTO `$event_type` ($fields) VALUES ($data)");
}	

function event_exists($title, $event_type){
	$title = sanitize($title);
	$query = mysql_query("SELECT COUNT(`event_id`) FROM `$event_type` WHERE `title` = '$title'");
	return (mysql_result($query, 0) ==1) ? true : false;
}

?>

</body>
</html>