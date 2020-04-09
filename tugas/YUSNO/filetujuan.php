<?php
parse_str($_POST['dataform'], $hasil);

echo 'firstname : ' . $hasil['firstname'];
echo 'lastname  : ' . $hasil['lastname'];
echo 'username : ' . $hasil['username'];
echo 'Email : ' . $hasil['Email'];
echo 'Address : ' . $hasil['Address'];
echo 'Address2 : ' . $hasil['Address2'];

//$hostname = "localhost";
//$username = "root";
//$password = "";
//$databaseName = "FORMKU";

$link = mysqli_connect("localhost","root","","FORMKU");
//$sql = "INSERT INTO user ('firstname','lastname','username','email','address','address2') VALUES ('$hasil','$hasil','$hasil','$hasil','$hasil','$hasil')";
//$sql = "INSERT INTO user ('firstname','lastname','username','email','address','address2') VALUES ('$hasil[firstname]','$hasil[lastname]','$hasil[username]','$hasil[email]','$hasil[address]','$hasil[address2]')";
$sql = "INSERT INTO `user`(`firstname`, `lastname`, `username`, `email`, `address`, `address2`) VALUES ('$hasil[firstname]','$hasil[lastname]','$hasil[username]','$hasil[email]','$hasil[address]','$hasil[address2]')";

if(mysqli_query($link,$sql))
{
  echo "records added successfully.";}
  else
  {
    echo "ERROR: Could not able to execute $sql.".
    mysqli_error($link);
  }
mysqli_close($link);
?>
