<?php
	$username=filter_input(INPUT_POST,'username');
	$password=filter_input(INPUT_POST,'password');
	
	if(!empty($username))
	{
		if(!empty($password))
		{
			$conn=new mysqli ("localhost:3308","root","","signupdb");
			if(mysqli_connect_error())
			{
				die('Connect error ('. mysqli_connect_errno() .')'. mysqli_connect_error());
			}
			else{
				$sql = "INSERT INTO signuptable (username,password)
				values('$username','$password')";
			}
			if($conn ->query($sql))
			{
					header("Location: main.html");
			}
			else{
				echo "Error: " . $sql ."</br>". $conn->error;
			}
			$conn->close();
		}
		else{
			echo "Password should not be empty!!!";
			die();
		}
	}
	else
	{
		echo "Username should not be empty!!!";
		die();
	}
?>


