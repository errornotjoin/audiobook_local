<?php
$book_txt = "";
$getting_data = file_get_contents("php://input");
$book_txt = json_decode($getting_data, true);
$id = $book_txt['ID'];

file_put_contents("tmp_files/temp_file_for_$id.json", $getting_data . "\n", FILE_APPEND);
echo $getting_data;



?>