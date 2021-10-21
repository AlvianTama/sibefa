<?php
$host="";
$user="";
$password="";
$db="";

$kon = mysqli_connect($host,$user,$password,$db);
if (!$kon){
	die("Koneksi gagal:".mysqli_connect_error());
}
?>
