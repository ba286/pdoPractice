<?php
require 'pdobasics.php';
class User {
	function displayer()
	{
		$sql = "SELECT * FROM ba286.accounts";
		$results = runQuery($sql);
		if(count($results) > 0)
		{
			echo "<table border=\"5\">
			<tr><th>ID</th>
				<th>Email</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Phone</th>
				<th>Gender</th>
				<th>Birthday</th>
				<th>Password</th></tr>";
			foreach ($results as $row) {
				echo "<tr>
						<td>".$row["id"]."</td>
						<td>".$row["email"]."</td>
						<td>".$row["fname"]."</td>
						<td>".$row["lname"]."</td>
						<td>".$row["phone"]."</td>
						<td>".$row["gender"]."</td>
						<td>".$row["birthday"]."</td>
						<td>".$row["password"]."</td>
					</tr>";
			}
		}
		else{
		    echo '0 results';
		}
	}
	function remover($email)
	{	
		$this->email = $email;
		$sql = "DELETE FROM ba286.accounts WHERE email = ".$this->email;
		$results = runQuery($sql);
	}
	function adder($email, $fname, $lname, $phone, $birthday, $gender, $password)
	{
		$sql = "INSERT INTO ba286.accounts (email, fname, lname, phone, birthday, gender, password) VALUES ('$email', 
		'$fname', '$lname', '$phone', '$birthday', '$gender', '$password')";
		$results = runQuery($sql);
	}
	function updater($email, $password)
	{
		$this->email = $email;
		$this->password = $password;
		$sql = "UPDATE ba286.accounts SET password = ".$this->password." where email = ".$this->email;
		$results = runQuery($sql);
	}
}
$x = new User;
$x->updater('test@njit.edu', 'school');
$x->remover('test@njit.edu');
$x->adder('jake@statefarm', 'Jake', 'FromStateFarm', '000-000-0012', '1990-02-29', 'male', 'khakis');

$x->displayer();
?>