<?php
$koneksi = mysqli_connect("localhost", "root", "", "formyus");
parse_str($_POST['datakirim'], $hasil);
$action = $_POST['action'];

if ($action == 'insert') {
	$syntaxsql = "INSERT INTO user (FirstName, LastName, Username, Email, Address, Address2, 
	Country, State, ZIP, Payment, Name_Card, Credit_Number, Expiration, CVV, Time_Insert) VALUES 
	('$hasil[firstName]','$hasil[lastName]','$hasil[Username]','$hasil[Email]','$hasil[Address]',
	'$hasil[Address2]','$hasil[Country]','$hasil[State]','$hasil[Zip]','$hasil[paymentMethod]',
	'$hasil[NameCard]','$hasil[CreditCardNumber]','$hasil[Expiration]','$hasil[CVV]',now())";
}
elseif ($action == 'update') {
	$syntaxsql = "UPDATE user SET FirstName='$hasil[firstName]',LastName='$hasil[lastName]',
	Username='$hasil[Username]',Email='$hasil[Email]',Address='$hasil[Address]',Address2='$hasil[Address2]',
	Country='$hasil[Country]',State='$hasil[State]',ZIP='$hasil[Zip]',Payment='$hasil[paymentMethod]',
	Name_Card='$hasil[NameCard]',Credit_Number='$hasil[CreditCardNumber]',Expiration='$hasil[Expiration]',
	CVV='$hasil[CVV]' WHERE Username='$hasil[Username]'";
}
elseif ($action == 'delete') {
	$syntaxsql = "DELETE FROM user WHERE Username='$hasil[Username]'";
}
elseif ($action == 'read') {
	$syntaxsql = "SELECT FirstName, LastName, Username, Email, Address, Address2, Country, State, ZIP, 
	Payment, Name_Card, Credit_Number, Expiration, CVV FROM user WHERE Username='$hasil[Username]'";
}
else {
	echo "ERROR ACTION";
	exit();
}

if (mysqli_errno($koneksi)) {
	echo "Gagal Terhubung ke Database".$koneksi -> connect_error; 
	exit();
}else{
	//echo "Database Terhubung";	
}

if ($koneksi -> query($syntaxsql) === TRUE) {
	echo "$action berhasil";
}
elseif ($koneksi->query($syntaxsql) === FALSE){
	echo "Error:  $syntaxsql" .$koneksi -> error;
}
else {
	$result = $koneksi->query($syntaxsql); //bukan true false tapi data array asossiasi
	if($result->num_rows > 0){
		echo "<table id='tresult' class='table table-striped table-bordered'>";
		echo "<thead><th>Firstname</th><th>Lastname</th><th>Username</th><th>Email</th><th>Address</th><th>Address2</th><th>Country</th><th>State</th><th>ZIP</th><th>Payment</th><th>Name on Card</th><th>Credit Card Number</th><th>Expiration</th><th>CVV</th></thead>";
		//echo "<tbody>";
		while($row = $result->fetch_assoc()) {
			echo "<tr><td>".$row['FirstName']."</td><td>". $row['LastName']."</td><td>".$row['Username']."</td><td>". $row['Email']."</td><td>".$row['Address']."</td><td>". $row['Address2']."</td><td>".$row['Country']."</td><td>". $row['State']."</td><td>".$row['ZIP']."</td><td>". $row['Payment']."</td><td>".$row['Name_Card']."</td><td>". $row['Credit_Number']."</td><td>".$row['Expiration']."</td><td>". $row['CVV']."</td></tr>";
		}
		echo "</tbody>";
		echo "</table>";
	}
	else{
		echo "Data Not Available";
	}
}
$koneksi->close();
?>