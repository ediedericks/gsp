<?php  

	require('connections.php');
	Include('mailer.php');

	if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['msg'])){

		$name = $_POST['name'];
		$email = $_POST['email'];
		$subject = $_POST['subject'];
		$msg = $_POST['msg'];
		// echo $_POST['name'].' '.$_POST['subject'].' '.$_POST['email'].' '.$_POST['msg'];
	
		$query = 'INSERT INTO mails (sender_name, email, subject, message) VALUES("'.mysqli_escape_string($conn, $name).'", "'.mysqli_escape_string($conn, $email).'", "'.mysqli_escape_string($conn, $subject).'", "'.mysqli_escape_string($conn, $msg).'")';

		if ($conn->query($query) === TRUE) {

			// sentMail($name, $email, $subject, $msg);
			$response = sentMail($name, $email, $subject, $msg);

			if($response == 'true'){
				$clientResponse = sentClientMail($name, $email, $subject);
				if($clientResponse == 'true'){
					echo 'true';
				}
					
			} else {
				echo 'nope';
			}
			
		} else {
			echo 'false';
			// echo "Error: " . $query . "<br>" . $conn->error;
		}
		$conn->close();


	};

?>