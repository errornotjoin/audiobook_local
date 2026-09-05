<?php
$id = $_GET['ID'];
$getting_data = file_get_contents("php://input");

file_put_contents("tmp_files/temp_file_for_$id.json", $getting_data . "\n", FILE_APPEND);
echo $getting_data;



?>