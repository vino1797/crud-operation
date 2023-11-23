<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'user_form';

$conn = mysqli_connect($host, $username, $password, $database);

if(!$conn){
    die("Something Went Wrong;");
}
?>