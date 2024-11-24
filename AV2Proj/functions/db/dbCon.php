<?php
function dbCon()
{
  $uri = "postgres://avnadmin:AVNS_LwNARX0E7U0Ceig-Y_1@postgres-test-db-guil0baka-a6e9.g.aivencloud.com:11780/defaultdb?sslmode=require";

  $fields = parse_url($uri);

  // build the DSN including SSL settings
  $conn = "pgsql:";
  $conn .= "host=" . $fields["host"];
  $conn .= ";port=" . $fields["port"];
  $conn .= ";dbname=defaultdb";
  $conn .= ";sslmode=verify-ca;sslrootcert=C:/xampp/htdocs/3DAW-Faeterj/AV2Proj/ca.pem";

  $db = new PDO($conn, $fields["user"], $fields["pass"]);

  // foreach ($db->query("SELECT VERSION()") as $row) {
  //   print($row[0]);
  // }

  // foreach ($db->query("SELECT * FROM users") as $row) {
  //   print($row[0]);
  // }

  return $db;
}



// dbCon();
