<?php

include 'dbCon.php';

@$start_date = $_GET['startDate'];
@$end_date = $_GET['endDate'];

// dates for debugging
// yyyy-mm-dd
$start_date = '2024-12-03';
$end_date = '2024-12-06';

if (empty($start_date) || empty($end_date)) {
  header('HTTP/1.1 418 I\'m a teapot');
  echo "All fields are required";
} else {
  $db = dbCon();

  $query = "SELECT * FROM rooms WHERE id NOT IN
  (SELECT room_id FROM reservations
  WHERE check_in <= '$end_date' 
  AND check_out >= '$start_date')";
  $stmt = $db->query($query);
  $rooms = $stmt->fetchAll(PDO::FETCH_ASSOC);

  echo json_encode($rooms);
}
