<?php

include('dbconnection.php');

$user_id = $_GET['user_id'];

$sql = " DELETE FROM `user_data` WHERE user_id = $user_id";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

header('location:http://localhost/phpTraning/fatchData.php', true, 301)

?>