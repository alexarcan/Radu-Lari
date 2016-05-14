<!DOCTYPE html>
<html> 
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link rel="stylesheet" type="text/css" href="style_results.css">
		<link rel="stylesheet" type="text/css" href="search_style.css">
		
		<title>Motor de  cautare </title>
	</head>
	
	<body style="background:#e5f2ff">
	
		<h2 style="margin:20px">Rezultate</h2>
		
		
		<form class="search" action='./search.php' method='get'>
			<input type='text' name='k' size='50' value='<?php echo $_GET['k'] ?>'/>
			<button type='submit'>Caut&#259 </button>
		</form>
		
		
		<?php
			STATIC $check = 0; //var to see if there are no results
			$k = '';
			function getDataFromTable($tablename){
				
				$GLOBALS['k'] = $_GET['k'];
				
				$terms = explode(" ",$GLOBALS['k']);
				$query = "SELECT * FROM $tablename WHERE ";
				
				foreach($terms as $each){
					@$i++;
					if($i == 1)
					$query .= "description LIKE '%$each%' ";
					else
					$query .= "OR description LIKE '%$each%' ";
				}
				//connect to db 
				mysql_connect('localhost', 'root', '') or die($connect_error);
				mysql_select_db('wad_project_db') or die($connect_error);
				
				$query .= " ORDER BY date ASC, time ASC ";
				$result = mysql_query($query);
				$numrows = mysql_num_rows($result);
				if($numrows > 0){
					while($row = mysql_fetch_assoc($result)){
						$title=$row['title'];
						$img=$row['img_path'];
						$location=$row['location'];
						$date=$row['date'];
						$time=$row['time'];
						$description=$row['description'];
	
						
						//echo "<h2><a href='$title'>$title</a></h2>
						//$description<br /> <br />";
						
						echo '<div class="result">';
	                    print '<img class="event_pic" src="' . $img . '" />';
						echo '<h3>' . $title . '</h3>';
						echo '<p><b>Loca&#355ie: ' . $location . '</b><br>';
	
						echo '<b>Data: ' . $date . '</b><br>';
						echo '<b>Ora: ' .$time .'</b><br><br>';
						echo $description . '</p>';
						echo '</div>';
					}
					
				}
				else 
				
				$GLOBALS['check'] = $GLOBALS['check'] + 1; //no result found
				
				
				
				
			}
			
			
			getDataFromTable('events_art');
			getDataFromTable('events_dezpers');
			getDataFromTable('events_food');
			getDataFromTable('events_music');
			getDataFromTable('events_sport');
			
			if($check==5) //no result found in any table
				echo "No results found for \"<b>$k</b>\"";
			
			//disconnect
			mysql_close();
			
			error_reporting( error_reporting() & ~E_NOTICE );
		?>
	</body>
</html>