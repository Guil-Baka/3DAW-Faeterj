<?php
include 'dbCon.php';

// get room data
@$room_number = $_POST['roomNumber'];
@$roomName = $_POST['roomName'];

// generate random values for debugging
// $room_number = 101;
// $roomName = 'Quarto 101';
// $price = 100.00;
// $number_of_beds = 2;
// $descri = 'Quarto com cama de casal e banheiro privativo';


// check if any of the fields are empty
if (empty($roomName) || empty($room_number)) {
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


    $query = "DELETE FROM rooms (name,price,number,number_of_beds,description) VALUES ('$roomName','$price','$room_number','$number_of_beds','$descri')";
    $stmt = $db->query($query);

    header('HTTP/1.1 200 OK');
    echo "Room deleted successfully";
}
