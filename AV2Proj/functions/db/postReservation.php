<?php
include 'dbCon.php';

// get reservation data
$room_number = $_POST['roomNumber'];
$user_email = $_POST['userEmail'];
$start_date = $_POST['startDate'];
$end_date = $_POST['endDate'];



// check if any of the fields are empty
if (empty($room_number) || empty($user_email) || empty($start_date) || empty($end_date)) {
  header('HTTP/1.1 418 I\'m a teapot');
  echo "All fields are required";
} else {

  // generate random values for testing
  // $room_number = 101;
  // $start_date = '2020-01-01';
  // $end_date = '2020-01-02';
  // $user_email = 'guilam.dev@gmail.com';

  $db = dbCon();

  // convert room number to integer
  $room_number = intval($room_number);


  //find the ID of the room which corresponds to the room number
  $query = "SELECT id FROM rooms WHERE number = $room_number";
  $stmt = $db->query($query);
  $room_id = $stmt->fetchAll(PDO::FETCH_ASSOC)[0]['id'];

  //find the ID of the user which corresponds to the user email
  $query2 = "SELECT id FROM users WHERE email = '$user_email'";
  $stmt = $db->query($query2);
  $user_id = $stmt->fetchAll(PDO::FETCH_ASSOC)[0]['id'];


  $query = "INSERT INTO reservations (room_id,user_id,check_in,check_out) VALUES ($room_id,$user_id,'$start_date','$end_date')";
  $stmt = $db->query($query);

  header('HTTP/1.1 200 OK');
  echo "Reservation made successfully";
}
