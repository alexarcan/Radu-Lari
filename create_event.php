<?php 
	include 'core/init.php';
	//check if user logged:
	protect_page();
	include 'includes/overall/header.php'; 
	
	if (empty($_POST) == false){
		$required_fields = array('title','location','date','time','description');
		foreach($_POST as $key=>$value){
			if(empty($value) && in_array($key, $required_fields) === true){
				$errors[] = 'Fields marked with an asterisk are required.';
				break 1;
			}
		}
		
		if (empty($errors) === true){
			if (event_exists($_POST['title'],'events_art') === true){
				$errors[] = 'Sorry, the title \'' . $_POST['title'] . '\' already exists.';
			}
			if(preg_match("/\\s/", $_POST['date']) == true){//check for spaces
				$errors[] = 'Your date must not contain any spaces.';
			}	
			if(preg_match("/\\s/", $_POST['time']) == true){//check for spaces
				$errors[] = 'Your time must not contain any spaces.';
			}
			if (strlen($_POST['title']) < 6){
				$errors[] = 'Your title must be at least 6 characters';
			}
			if (strlen($_POST['description']) < 15){
				$errors[] = 'Your description is too short';
			}
			
			
		}	
	}
	
	//print_r($errors);
?>

<?php
	
	if (isset($_GET['success']) && empty($_GET['success'])){
		echo 'Your event has been added successfully!';
		} else {
		
		//check if img submitted
		/*
			if(isset($_FILES['eventimg']) === true){
			echo 'OK';
			if(empty($_FILES['eventimg']['name']) === true){
			echo 'Please choose a file!';
			} else{//validate file extension
			
			$allowed = array('jpg', 'jpeg', 'gif', 'png');
			
			$file_name = $_FILES['eventimg']['name'];//img.png
			$file_extn = strtolower(end(explode('.', $file_name)));//take last elem of array
			$file_temp = $_FILES['eventimg']['temp_name'];
			
			if(in_array($file_extn, $allowed) === true){
			//upload file
			if (isset($_POST['uploadpic_button']))
			event_image($_SESSION['event_id'], $file_temp, $file_extn);
			
			}else{
			echo 'Incorrect file type. Allowed: ';
			echo implode(', ', $allowed);
			}
			}
			}
		*/			
		if (empty($_POST) === false && empty($errors) === true){//if form is submitted & no errors we register the errors
			//register event
			$category='';
			if (!empty($_POST['categ'])){ //get radio button value
				if ($_POST['categ']=="music") { $category='events_music'; }
				if ($_POST['categ']=="sport") { $category='events_sport'; }
				if ($_POST['categ']=="art")   { $category='events_art'; }
				if ($_POST['categ']=="food")  { $category='events_food'; }
				if ($_POST['categ']=="dezv")  { $category='events_dezpers'; }
			}
			//DE PUS : CKEDITOR 
			//SAU text area
			
			echo "Incorrect file type. Allowed: jpg, jpeg, gif, png.";
			$file_path = '';
			//echo 'OKkkkkkkkkkkkkkkkkkkkkkkkkk';
			//if(isset($_FILES['eventimg']) === true){
				
				if(empty($_FILES['eventimg']['name']) === true){
					echo 'Please choose a file!';
				
				} else{//validate file extension
					
					$allowed = array('jpg', 'jpeg', 'gif', 'png');
					
					$file_name = $_FILES['eventimg']['name'];//img.png
					$file_extn = strtolower(end(explode('.', $file_name)));//take last elem of array
					@$file_temp = $_FILES['eventimg']['temp_name'];
					
					if(in_array($file_extn, $allowed) === true){
						
						$file_path = 'pictures/' . $_FILES['eventimg']['name'] ;
						//move_uploaded_file($file_temp, $file_path);
						move_uploaded_file($_FILES['eventimg']['tmp_name'], $file_path );
						
						}else{
						$errors[] ='Incorrect file type. Allowed: $allowed';
						//echo $errors;
						exit();
						
						//echo implode(', ', $allowed);
					}
				}
		

			
			
			$register_data = array(
			'title'		 	 => $_POST['title'],
			'location' 		 => $_POST['location'],
			'date' 		     => $_POST['date'],
			'time' 	 		 => $_POST['time'],
			'description'    => $_POST['description'],
			'img_path'       => $file_path
			);
			register_event($register_data,$category);
			//redirect
			header('Location: create_event.php?success');
			exit();
			
			} else if (empty($errors) === false){//output errors
			echo output_errors($errors);
		}
		
	?>
	
	<h1>Adaugare eveniment</h1>
	<form action="" method="post" enctype="multipart/form-data">
		<ul>
			<li>
				Selectare categorie*:<br>
				<input type="radio" name="categ" value="music" checked> Muzica 
				<input type="radio" name="categ" value="sport"> Sport
				<input type="radio" name="categ" value="art"> Arta
				<input type="radio" name="categ" value="food"> Mancaruri
				<input type="radio" name="categ" value="dezv"> Dezvoltare personala
			</li>
			<li>
				Titlu eveniment*:<br>
				<input type="text" name="title">
			</li>
			<li>
				Locatia evenimentului*:<br>
				<input type="text" name="location">
			</li>
			<li>
				Data evenimentului(aaaa-ll-zz)*:<br>
				<input type="text" name="date">
			</li>
			<li>
				Ora de inceput a evenimentului(oo:mm:ss)*:<br>
				<input type="text" name="time">
			</li>
			<li>
				Detalii eveniment:<br>
				<input type="text" name="description">
			</li>
			<li>
				Adaugare imagine:<br>
				<input type="file" name="eventimg">
				
			</li>
			<li>
				<input type="submit" name ="add_event_button" value="Adauga eveniment">
			</li>
		</ul>
	</form>
	<?php
	}
	include 'includes/overall/footer.php';
?>
