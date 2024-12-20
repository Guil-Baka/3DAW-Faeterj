<?php
include 'dbCon.php';

// get room data
@$room_number = $_POST['roomNumber'];
@$roomName = $_POST['roomName'];
@$price = $_POST['price'];
@$number_of_beds = $_POST['numberOfBeds'];
@$descri = $_POST['descri'];

// generate random values for debugging
// $room_number = 101;
// $roomName = 'Quarto 101';
// $price = 100.00;
// $number_of_beds = 2;
// $descri = 'Quarto com cama de casal e banheiro privativo';


// check if any of the fields are empty
if (empty($roomName) || empty($number_of_beds) || empty($price) || empty($room_number) || empty($descri)) {
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
    $number_of_beds = intval($number_of_beds);

    $query = "SELECT id FROM rooms WHERE number = $room_number";
    $stmt = $db->query($query);
    $room_id = $stmt->fetchAll(PDO::FETCH_ASSOC)[0]['id'];
   // (name,price,number,number_of_beds,description)
    $query = " UPDATE rooms SET name = '$roomName', price = '$price', number = '$room_number',number_of_beds = '$number_of_beds', description = '$descri'WHERE id= $room_id ";
    $stmt = $db->query($query);

    header('HTTP/1.1 200 OK');
    echo "Room updated successfully";
}
