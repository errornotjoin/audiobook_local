<?php
$getting_data = file_get_contents("php://input");
file_put_contents("tmp_files/temp.txt", $getting_data . "\n", FILE_APPEND);
echo $getting_data;



?>