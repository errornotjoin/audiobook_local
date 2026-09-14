<?php
$js_fetch_data = json_decode(file_get_contents("php://input"), true);

$send_code_back = $js_fetch_data;
echo json_encode($send_code_back);
return  json_encode("test");
?>