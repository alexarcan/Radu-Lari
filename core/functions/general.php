<?php
function logged_in_redirect(){
	if(logged_in() === true){
		header('Location: index.php');
		exit();
	}
}	
	
//fct to redirect the user:
function protect_page(){
	if(logged_in() === false) {
		header('Location: protected.php');//redirect
		exit();
	}
}
	
	
function array_sanitize(&$item){//& pt ca vreau return value
	$item = mysql_real_escape_string($item);
}
function sanitize($data){
	return mysql_real_escape_string($data);
}

function output_errors($errors){
	$output = array();
	foreach($errors as $error){
		$output[] = '<li>' . $error . '</li>';
	}
	return '<ul>' . implode('', $output) . '</ul>';//pun intr-un string
}
?> 