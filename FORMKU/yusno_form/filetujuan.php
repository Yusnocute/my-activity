<?php
 
//Tipe data dan operator: semua variabel di php diawal dengan $
//Global constant
//array: array - $hasil = ["yusno","bos"];
//record: associated array - $hasil = [firstName => yusno, lastName =>bos]
//$_REQUEST = POST/GET

//DATA YANG DIKIRIM ASYNC => $_REQUEST= {dataku : "firstName=yusno&lastName=bos"}
/*ASYNC*/
parse_str($_REQUEST['dataku'], $hasil);

//ASYNC, data yang diterima format array of record memerlukan looping untuk parsing data - tidak digunakan di sini
//$arrrecordhasil = $_REQUEST['dataku'];

//DATA YANG DIKIRIM SYNC => $_REQUEST = ["firstName" => "yusno", "lastName" => "bos"]
/* SYNC */
//$hasil = $_REQUEST;

/* SQL */
echo $syntaxsql = "insert into user values ('$hasil[firstName]', '$hasil[lastName]')";
//eksekusi syntaxsql


?>