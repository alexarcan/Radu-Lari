<!DOCTYPE html>
<html>
    <head>
	  

	<script type="text/javascript" src="join.js"></script>
	<link rel="stylesheet" type="text/css" href="style_web-2.css">
	</head>
	
	<body>
	<h1 style="padding:10px">Evenimente muzicale &#238n Timi&#351oara </h1>
	
	<!--   -->
	<?php

   $username="root";$password="";$database="wad_project_db";
   mysql_connect('localhost',$username,$password);
   @mysql_select_db($database) or die( "Unable to select database");

   $query="SELECT * FROM events_music ORDER BY date ASC, time ASC";
   $result=mysql_query($query);
   $result = mysql_query($query) or die(mysql_error());
   

   while($row = mysql_fetch_array($result)){
	$title=$row['title'];
    $img=$row['img_path'];
	$location=$row['location'];
	$date=$row['date'];
	$time=$row['time'];
	$description=$row['description'];

	echo '<div class="music1">';
	print '<img class="event_pic" src="' . $img . '" />';
	
echo "	<input type='submit' class='button'id='join' name='insert' value='JOIN' />";
	echo '<h3>' . $title . '</h3>';
	echo '<p><b>Loca&#355ie: ' . $location . '</b><br>';
	
	echo '<b>Data: ' . $date . '</b><br>';
	echo '<b>Ora: ' .$time .'</b><br><br>';
	echo $description . '</p>';
	//" - ". $row['location']. " - ". $row['date']."-". $row['description'];
	
	echo '</div>';
}



?> <!--    -->
	
	
<!--	<div class="music1">
			<img class="event_pic" src="pictures/music/1.jpg">
			<h3>Concert la cinema: Ed Sheeran - Jumpers for Goalposts</h3>
			<p><b>Loca&#355ie: Colegiul Na&#355ional de Art&#259 "Ion Vidu" </b><br><b>Data: 22.10.2015</b><br><b>Ora: 20:30</b><br>
			Timi&#351oara D'STARS &#238n parteneriat cu ScreenLive va aduce &#238n Rom&#226nia un concert &#238n premier&#259 mondial&#259, prin satelit de la Londra.
			Transmisia prin satelit debuteaza cu o sectiune speciala Live (60'), in care artistul va canta pe suprafata de iarba din P-ta Leicester, Londra, dupa care va fi difuzat filmul concert "Jumpers for Goalposts" (100').

            In iulie 2015, Ed Sheeran a devenit primul artist care a cantat solo pe celebrul stadion Wembley din Londra. 
            Trei seri istorice, cu 240.000 de fani, si un artist aflat singur pe scena.

            Ed Sheeran isi entuziasmeaza fanii cu hiturile sale muzicale, plasate in top pe intreg mapamondul. Printre ele: Sing, The A Team, Don't, sau Thinking Out Loud. 
            Spre surpriza generala si mare satisfactie a publicului, pe scena i s-a alăturat pentru un duet, legendarul muzician Sir Elton John.
			Evenimentul cinematografic va oferi miloanelor sale de fani de pe tot mapamondul, oportunitatea unei cunoasteri mai intime a lui Ed Sheeran, artist ce-a reusit sa devina protagonistul unor vanzari cu tiraje record multi-platina, 
			iar celor care au fost deja la un concert de-al sau, ocazia de-a retrai interpretarile sale fermecatoare.</p>
	</div>
	<div class="music1">
			<img class="event_pic" src="http://i.ytimg.com/vi/iR4nF18vyTk/maxresdefault.jpg" >
			<h3>Concert la cinema: Ed Sheeran - Jumpers for Goalposts</h3>
			<p><b>Loca&#355ie: Colegiul Na&#355ional de Art&#259 "Ion Vidu" </b><br><b>Data: 22.10.2015</b><br><b>Ora: 20:30</b><br>
			Timi&#351oara D'STARS &#238n parteneriat cu ScreenLive va aduce &#238n Rom&#226nia un concert &#238n premier&#259 mondial&#259, prin satelit de la Londra.
			Transmisia prin satelit debuteaza cu o sectiune speciala Live (60'), in care artistul va canta pe suprafata de iarba din P-ta Leicester, Londra, dupa care va fi difuzat filmul concert "Jumpers for Goalposts" (100').

            In iulie 2015, Ed Sheeran a devenit primul artist care a cantat solo pe celebrul stadion Wembley din Londra. 
            Trei seri istorice, cu 240.000 de fani, si un artist aflat singur pe scena.

            Ed Sheeran isi entuziasmeaza fanii cu hiturile sale muzicale, plasate in top pe intreg mapamondul. Printre ele: Sing, The A Team, Don't, sau Thinking Out Loud. 
            Spre surpriza generala si mare satisfactie a publicului, pe scena i s-a alăturat pentru un duet, legendarul muzician Sir Elton John.
			Evenimentul cinematografic va oferi miloanelor sale de fani de pe tot mapamondul, oportunitatea unei cunoasteri mai intime a lui Ed Sheeran, artist ce-a reusit sa devina protagonistul unor vanzari cu tiraje record multi-platina, 
			iar celor care au fost deja la un concert de-al sau, ocazia de-a retrai interpretarile sale fermecatoare.</p>
	</div>
	<div class="music1">
			<img class="event_pic" src="http://i.ytimg.com/vi/iR4nF18vyTk/maxresdefault.jpg"  >
			<h3>Concert la cinema: Ed Sheeran - Jumpers for Goalposts</h3>
			<p><b>Loca&#355ie: Colegiul Na&#355ional de Art&#259 "Ion Vidu" </b><br><b>Data: 22.10.2015</b><br><b>Ora: 20:30</b><br>
			Timi&#351oara D'STARS &#238n parteneriat cu ScreenLive va aduce &#238n Rom&#226nia un concert &#238n premier&#259 mondial&#259, prin satelit de la Londra.
			Transmisia prin satelit debuteaza cu o sectiune speciala Live (60'), in care artistul va canta pe suprafata de iarba din P-ta Leicester, Londra, dupa care va fi difuzat filmul concert "Jumpers for Goalposts" (100').

            In iulie 2015, Ed Sheeran a devenit primul artist care a cantat solo pe celebrul stadion Wembley din Londra. 
            Trei seri istorice, cu 240.000 de fani, si un artist aflat singur pe scena.

            Ed Sheeran isi entuziasmeaza fanii cu hiturile sale muzicale, plasate in top pe intreg mapamondul. Printre ele: Sing, The A Team, Don't, sau Thinking Out Loud. 
            Spre surpriza generala si mare satisfactie a publicului, pe scena i s-a alăturat pentru un duet, legendarul muzician Sir Elton John.
			Evenimentul cinematografic va oferi miloanelor sale de fani de pe tot mapamondul, oportunitatea unei cunoasteri mai intime a lui Ed Sheeran, artist ce-a reusit sa devina protagonistul unor vanzari cu tiraje record multi-platina, 
			iar celor care au fost deja la un concert de-al sau, ocazia de-a retrai interpretarile sale fermecatoare.</p>
	</div>
	<div class="music1">
			<img class="event_pic" src="http://i.ytimg.com/vi/iR4nF18vyTk/maxresdefault.jpg" >
			<h3>Concert la cinema: Ed Sheeran - Jumpers for Goalposts</h3>
			<p><b>Loca&#355ie: Colegiul Na&#355ional de Art&#259 "Ion Vidu" </b><br><b>Data: 22.10.2015</b><br><b>Ora: 20:30</b><br>
			Timi&#351oara D'STARS &#238n parteneriat cu ScreenLive va aduce &#238n Rom&#226nia un concert &#238n premier&#259 mondial&#259, prin satelit de la Londra.
			Transmisia prin satelit debuteaza cu o sectiune speciala Live (60'), in care artistul va canta pe suprafata de iarba din P-ta Leicester, Londra, dupa care va fi difuzat filmul concert "Jumpers for Goalposts" (100').

            In iulie 2015, Ed Sheeran a devenit primul artist care a cantat solo pe celebrul stadion Wembley din Londra. 
            Trei seri istorice, cu 240.000 de fani, si un artist aflat singur pe scena.

            Ed Sheeran isi entuziasmeaza fanii cu hiturile sale muzicale, plasate in top pe intreg mapamondul. Printre ele: Sing, The A Team, Don't, sau Thinking Out Loud. 
            Spre surpriza generala si mare satisfactie a publicului, pe scena i s-a alăturat pentru un duet, legendarul muzician Sir Elton John.
			Evenimentul cinematografic va oferi miloanelor sale de fani de pe tot mapamondul, oportunitatea unei cunoasteri mai intime a lui Ed Sheeran, artist ce-a reusit sa devina protagonistul unor vanzari cu tiraje record multi-platina, 
			iar celor care au fost deja la un concert de-al sau, ocazia de-a retrai interpretarile sale fermecatoare.</p>
	</div>-->
	<body>
	
	
</html>