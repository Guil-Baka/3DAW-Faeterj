<?php

// Include the dbCon function
include 'dbCon.php';

function dbInsert()
{
  //call the dbCon function
  $db = dbCon();

  // $sql = file_get_contents('scripts/dbSchema.sql');
  // // print the sql script
  // print($sql);
  // $db->exec($sql);
  // $sql = file_get_contents('scripts/dbInsert.sql');
  // // print the sql script
  // print($sql);
  // // execute the sql script
  // $db->exec($sql);

  //query db for all users

  // foreach ($db->query("SELECT * FROM users") as $row) {
  //   print($row[0] . "\n");
  // }

  $query = "SELECT * FROM users";
  $stmt = $db->query($query);
  $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

  foreach ($users as $user) {
    // print_r($user);
    // print("\n");
    print($user['name']);
    print("\n");
    print($user['email']);
    print("\n");
    print($user['password']);
  }
}

// Call the function
dbInsert();
