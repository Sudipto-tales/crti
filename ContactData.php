<?php 
	
if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
				
	function get_data() { 
		$file_name='contactData'. '.json'; //name of the json file

		if(file_exists("$file_name")) { 
			$current_data=file_get_contents("$file_name"); //pick data from json
			$array_data=json_decode($current_data, true); //decode the data
				
			//array field for the data came from html page
			$extra=array( 
				'Name' => $_POST['firstname'].$_POST['lastname'],
				'PH_No' => $_POST['phonenumber'], 
				'Email' => $_POST['email'], 
				'Subject' => $_POST['subject'], 
				'Massege' => $_POST['massage']
			); 
			$array_data[]=$extra; //store array
			echo "file exist<br/>"; 
			return json_encode($array_data); //return json data
		} 
		else { 
			$datae=array(); 
			$datae[]=array( 
				'Name' => $_POST['firstname'].$_POST['lastname'],
				'PH_No' => $_POST['phonenumber'], 
				'Email' => $_POST['email'], 
				'Subject' => $_POST['subject'], 
				'Massege' => $_POST['massage']
			); 
			echo "file not exist<br/>"; 
			return json_encode($datae); 
		} 
	} 

	$file_name= 'contactData'. '.json'; //json file name
	
	if(file_put_contents("$file_name", get_data())) { 
		header("Location: 'contact_us.html");//html page name
        exit;
 
	}				 
	else { 
		echo 'There is some error';				 
	} 
} 
	
?> 
