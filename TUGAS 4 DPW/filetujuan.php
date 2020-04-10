<?php
parse_str($_POST['dataku'], $hasil);
//print_r($_REQUEST);
//$hasil = $_REQUEST;
echo $sql = "insert into user values ('$hasil[firstName]', '$hasil[lastName]', '$hasil[username]',
'$hasil[Email]', '$hasil[Adress]', '$hasil[Address2]', '$hasil[Country)', '$hasil[state]', '$hasil[Zip]')";
?>