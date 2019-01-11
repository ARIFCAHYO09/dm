<?php
$servername = "localhost";
$username = "root";
$password = "";
$db="dm";

// Create connection
$conn =  new mysqli($servername, $username, $password,$db);

//nitip indra
// function query($query){
//     global $conn;
//     $result = mysqli_query($conn, $query);
//     $rows = [];
//     while( $row = mysqli_fetch_assoc($result)){
//         $rows[] = $row;
//     }
//     return $rows;
// }

?>