<?php 

$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'db_2018073';

// membuat koneksi
$koneksi = mysqli_connect($servername, $username, $password, $database);

// mengecek koneksi
if(!$koneksi) {
    die('Connection Failed:' . mysqli_connect_error());
}
 ?>