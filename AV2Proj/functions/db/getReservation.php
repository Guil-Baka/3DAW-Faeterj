<?php
include 'dbCon.php';

// get reservation data
@$user_email = $_GET['userEmail'];


@$user_email = 'guilam.dev@gmail.com';


// check if any of the fields are empty
if (empty($user_email)) {
  header('HTTP/1.1 418 I\'m a teapot');
  echo "Email is Required";
} else {

  // generate random values for testing
  // $room_number = 101;
  // $start_date = '2020-01-01';
  // $end_date = '2020-01-02';
  @$user_email = 'guilam.dev@gmail.com';

  $db = dbCon();

  //find the ID of the user which corresponds to the user email
  $query2 = "SELECT id FROM users WHERE email = '$user_email'";
  $stmt = $db->query($query2);
  $user_id = $stmt->fetchAll(PDO::FETCH_ASSOC)[0]['id'];

  //get the reservation which corresponds to the user ID
  $query = "SELECT * FROM reservations WHERE user_id = '$user_id'";
  $stmt = $db->query($query);
  $reservations = $stmt->fetchAll(PDO::FETCH_ASSOC);


  // return reservation object
  header('HTTP/1.1 200 OK');
  echo json_encode($reservations);
}
