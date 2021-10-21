<?php
$host="sql109.epizy.com";
$user="epiz_29902722";
$password="repirhu9321";
$db="epiz_29902722_sibefa";

$kon = mysqli_connect($host,$user,$password,$db);
if (!$kon){
	die("Koneksi gagal:".mysqli_connect_error());
}
?>