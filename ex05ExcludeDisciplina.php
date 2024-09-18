<?php
// receive via post name
$name = $_POST["nome"];
// read the file
$file = fopen('disciplinas.txt', 'r');
//create temporary file
$temp = fopen('temp.txt', 'w');
while (!feof($file)) {
  $line = fgets($file);
  $data = explode(';', $line);
  // if the name is different from the one received, write it in the temporary file
  if ($data[0] != $name) {
    fwrite($temp, $line);
  }
}
fclose($file);
fclose($temp);
// delete the original file
unlink('disciplinas.txt');
// rename the temporary file to the original file
rename('temp.txt', 'disciplinas.txt');
echo $name;
