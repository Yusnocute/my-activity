<?php
$koneksi = mysqli_connect("localhost", "root", "", "formyus");


echo $action = $_REQUEST['action'];


parse_str($_POST['dataku'], $hasil);


$gambarku = $_FILES["gambarku"];

$ccnumber = trim($hasil['ccnumber']);
if (!empty($gambarku["name"]) and !empty($ccnumber)){
	$namafile = $gambarku["name"];		//nama filenya
	preg_match("/([^\.]+$)/", $namafile, $ext);		//Regex: mencari string sesudah titik terakhir, saved in array ext
	$file_ext = strtolower($ext[1]);
	$namafilebaru = $hasil['ccnumber'].".".$ext[1];	//nama file barunya [ccnumber].png
    $file = $gambarku["tmp_name"];						//source filenya
    //perform the upload operation
	$extensions= array("jpeg","jpg","png");				//extensi file yang diijinkan
	//Kirim pesan error jika extensi file yang diunggah tidak termasuk dalam extensions
	$errors = array();
	if(in_array($file_ext,$extensions) === false)
	 $errors[] = "Extensi yang diperbolehkan jpeg atau png.";

	//Kirim pesan error jika ukuran file > 500kB
	$file_size = $gambarku['size'];
	if($file_size > 2097152)
	 $errors[] = "Ukuran file harus lebih kecil dari 2MB.";

	//Upload file
	if(empty($errors)){
		if(move_uploaded_file($file, "uploads/" . $namafilebaru))
			echo "Uploaded dengan nama $namafilebaru";
	}
}else echo $errors[] = "Lengkapi nomor kartu kredit dan gambarnya. ";
echo "<br/>";

if(!empty($errors)){
	echo "Error : ";
	foreach ($errors as $val)
		echo $val;
}
if(empty($errors)){
	if($action == 'insert')
	$syntaxsql = "INSERT INTO user (FirstName, LastName, Username, Email, Address, Address2, 
	Country, State, ZIP, Payment, Name_Card, Credit_Number, Expiration, CVV, foto, Time_Insert) VALUES 
	('$hasil[firstName]','$hasil[lastName]','$hasil[Username]','$hasil[Email]','$hasil[Address]',
	'$hasil[Address2]','$hasil[Country]','$hasil[State]','$hasil[Zip]','$hasil[paymentMethod]',
	'$hasil[NameCard]','$hasil[ccnumber]','$hasil[Expiration]','$hasil[CVV]','$namafilebaru', now())";

elseif ($action == 'update') 
	$syntaxsql = "UPDATE user SET FirstName='$hasil[firstName]',LastName='$hasil[lastName]',
	Username='$hasil[Username]',Email='$hasil[Email]',Address='$hasil[Address]',Address2='$hasil[Address2]',
	Country='$hasil[Country]',State='$hasil[State]',ZIP='$hasil[Zip]',Payment='$hasil[paymentMethod]',
	Name_Card='$hasil[NameCard]',Credit_Number='$hasil[ccnumber]',Expiration='$hasil[Expiration]',
	CVV='$hasil[CVV]', foto='$namafilebaru' WHERE Username='$hasil[Username]'";

elseif ($action == 'delete') 
	$syntaxsql = "DELETE FROM user WHERE Username='$hasil[Username]'";

elseif ($action == 'read') 
	$syntaxsql = "SELECT FirstName, LastName, Username, Email, Address, Address2, Country, State, ZIP, 
	Payment, Name_Card, Credit_Number, Expiration, CVV, foto  FROM user ";

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
}
$koneksi->close();
?>