<?php

$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');

if(!empty($email)){
	if(!empty($password)){
		$host = "localhost";
		$dbusername = "root";
		$dbpassword = "";
		$dbname = "genie";

		//Create connection
		$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

		//check connection error
		if(mysqli_connect_error()){
			die('Connect Error('.mysqli_connect_errno().')').mysqli_connect_error());
		}else{
			$sql = "INSERT INTO account (email, password)
			values ('$email','$password')";
			if($conn->query($sql)){
				echo "New record is inserted successfully";
			}else{
				echo "Error: ". $sql . "<br>". $conn->error;
			}
		}
	}else{
		echo "Password should not be empty";
		die();
	}
}else{
	echo "Email should not be empty";
	die();
}

?>