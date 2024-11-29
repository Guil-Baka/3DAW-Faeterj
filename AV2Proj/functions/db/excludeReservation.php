<?php
include 'dbCon.php';

// get reservation data
@$room_number = $_POST['roomNumber'];
@$user_email = $_POST['userEmail'];
@$start_date = $_POST['startDate'];
@$end_date = $_POST['endDate'];

//generate random values for testing
// $room_number = 105;
// $start_date = '2024-11-28';
// $end_date = '2024-11-29';
// $user_email = 'guilam.dev@gmail.com';


// check if any of the fields are empty
if (empty($room_number) || empty($user_email) || empty($start_date) || empty($end_date)) {
  header('HTTP/1.1 418 I\'m a teapot');
  echo "All fields are required";
} else {

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

  //print data
  echo "Room ID: $room_id\n";
  echo "User ID: $user_id\n";
  echo "Start Date: $start_date\n";
  echo "End Date: $end_date\n";

  //remove the reservation
  $query = "DELETE FROM reservations WHERE room_id = $room_id AND user_id = $user_id AND check_in = '$start_date' AND check_out = '$end_date'";
  $stmt = $db->query($query);

  header('HTTP/1.1 200 OK');
  echo "Reservation canceled";
}
