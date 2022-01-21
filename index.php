<?php

require 'AuthCheck.php';

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=UTF-8');

$AuthStatus = AuthorizationCheck();

if($AuthStatus) {

$conn = mysqli_connect("localhost","USER","PASSWORD","TestDB");
$response = array();
$varlength = $_GET['length'];
$varrating = $_GET['rating'];
$maxlimit = $_GET['maxlimit'];
$offset = $_GET['offset'];

if($maxlimit && $offset) {
$sql = "SELECT title, rating, length, release_year FROM film WHERE length >= ".strval($varlength)." AND rating = '".strval($varrating)."' ORDER BY length DESC LIMIT ".strval($maxlimit)." OFFSET ".strval($offset);
}

else {
  $sql = "SELECT title, rating, length, release_year FROM film WHERE length >= ".strval($varlength)." AND rating = '".strval($varrating)."' ORDER BY length DESC";
}

if($conn) {
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);

if ($count > 0) {
	$i = 0;
  while($row = mysqli_fetch_assoc($result)) {
    $response[$i]['Title'] = $row['title'];
    $response[$i]['Rating'] = $row['rating'];
    $response[$i]['Length'] = $row['length'];
    $response[$i]['ReleaseYear'] = $row['release_year'];
    $i++;
  }
  
  echo json_encode($response, JSON_PRETTY_PRINT);
}
  
}

mysqli_close($conn);

}

else {
  http_response_code(401);
}

?>