<?php
$localhost = 'localhost';
$username = 'root';
$password = 'Enjay@crm123';// Password of linux system :-Enjay@crm123
$db_name = 'loginsystem';

$conn = new mysqli($localhost,$username,$password,$db_name);

if($conn->connect_error){
    die('Connection Failed'.$conn->connect_error);
}
?>