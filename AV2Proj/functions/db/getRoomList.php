<?php
include 'dbCon.php';
// error_reporting(0);
$db = dbCon();

$query = "SELECT * FROM rooms";
$stmt = $db->query($query);

$rooms = $stmt->fetchAll(PDO::FETCH_ASSOC);

// print_r($rooms);

class Room
{
  public $name;
  public $description;
  public $price;
  public $num;
  public $num_beds;
}

$roomList = array();

foreach ($rooms as $room) {
  @$roomObj = new Room();
  @$roomObj->name = $room['name'];
  @$roomObj->description = $room['description'];
  @$roomObj->price = $room['price'];
  @$roomObj->num = $room['number'];
  @$roomObj->num_beds = $room['number_of_beds'];
  array_push($roomList, $roomObj);
}

header('HTTP/1.1 200 OK');

echo json_encode($roomList);
