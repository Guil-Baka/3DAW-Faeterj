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
  // @$user_email = 'guilam.dev@gmail.com';
  class Reservation
  {
    public $room_name;
    public $room_number;
    public $start_date;
    public $end_date;
  }
  $db = dbCon();

  //find the ID of the user which corresponds to the user email
  $query2 = "SELECT id FROM users WHERE email = '$user_email'";
  $stmt = $db->query($query2);
  $user_id = $stmt->fetchAll(PDO::FETCH_ASSOC)[0]['id'];



  // caralho essa query vai ficar insana
  $query_master =
    "SELECT reservations.*, rooms.*
    FROM reservations
    INNER JOIN rooms ON reservations.room_id = rooms.id
    WHERE reservations.user_id ='$user_id';";

  $stmt = $db->query($query_master);
  $reservations = $stmt->fetchAll(PDO::FETCH_ASSOC);
  // caralhoooooo o retorno disso é gigantesco hahahahhaha

  // create an array of reservation objects
  $reservationList = array();

  foreach ($reservations as $reservation) {
    @$reservationObj = new Reservation();
    @$reservationObj->room_name = $reservation['name'];
    @$reservationObj->room_number = $reservation['number'];
    @$reservationObj->start_date = $reservation['check_in'];
    @$reservationObj->end_date = $reservation['check_out'];
    array_push($reservationList, $reservationObj);
  }

  // print_r($reservationList);

  // return reservation object
  header('HTTP/1.1 200 OK');
  echo json_encode($reservationList);
}
