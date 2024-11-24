<?php
include 'dbCon.php';
// error_reporting(0);
$db = dbCon();

$query = "SELECT * FROM rooms";
$stmt = $db->query($query);

$rooms = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
  @$roomObj->num = $room['num'];
  @$roomObj->num_beds = $room['num_beds'];
  array_push($roomList, $roomObj);
}

header('HTTP/1.1 200 OK');

echo json_encode($roomList);
