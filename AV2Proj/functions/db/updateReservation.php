<?php
include 'dbCon.php';

// get reservation data
@$room_number = $_POST['roomNumber'];
@$user_email = $_POST['userEmail'];
@$old_start_date = $_POST['oldStartDate'];
@$old_end_date = $_POST['oldEndDate'];
@$start_date = $_POST['startDate'];
@$end_date = $_POST['endDate'];

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

  //find the ID of the reservation which corresponds to the room id, user id, start date and end date
  $query3 = "SELECT id FROM reservations WHERE room_id = $room_id AND user_id = $user_id AND check_in = '$old_start_date' AND check_out = '$old_end_date'";
  $stmt = $db->query($query3);
  $reservation_id = $stmt->fetchAll(PDO::FETCH_ASSOC)[0]['id'];

  //update the reservation
  $query = "UPDATE reservations SET check_in = '$start_date', check_out = '$end_date' WHERE id = $reservation_id";
  $stmt = $db->query($query);

  header('HTTP/1.1 200 OK');
  echo "Reservation Date Changed";
}
