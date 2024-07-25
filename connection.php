<?php
$server = 'localhost:3307';
$username = 'root';
$password = '';
$database = 'contact_management_system';

$conn = mysqli_connect($server, $username, $password, $database);
if ($conn) {
    echo "";
} else {
    echo "Failed to connect with Database";
}
