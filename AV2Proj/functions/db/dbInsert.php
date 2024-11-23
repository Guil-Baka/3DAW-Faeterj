<?php

$uri = "postgres://avnadmin:AVNS_LwNARX0E7U0Ceig-Y_1@postgres-test-db-guil0baka-a6e9.g.aivencloud.com:11780/defaultdb?sslmode=require";

$fields = parse_url($uri);

// build the DSN including SSL settings
$conn = "pgsql:";
$conn .= "host=" . $fields["host"];
$conn .= ";port=" . $fields["port"];;
$conn .= ";dbname=defaultdb";
$conn .= ";sslmode=verify-ca;sslrootcert=ca.pem";

$db = new PDO($conn, $fields["user"], $fields["pass"]);


// // call the sql script in scripts folder
// $sql = file_get_contents('scripts/dbSchema.sql');

// // execute the sql script
// $db->exec($sql);

$sql = file_get_contents('scripts/dbInsert.sql');

// execute the sql script
$db->exec($sql);
