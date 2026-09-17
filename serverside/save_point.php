<?php



//fetching the JSON data sent via POST request by javascript 
//(javascript/Save_point.js)
$js_fetch_data = json_decode(file_get_contents("php://input"), true);
//This is the ID for All DATA 
$Book_id = $js_fetch_data['book_id'];
//location of the temporary JSON file
$getting_json_file = "tmp_files/$Book_id.json";
//decode the temporary JSON file
$decode = json_decode(file_get_contents($getting_json_file), true);

//error handling if the temporary JSON file does not exist
if (!file_exists($getting_json_file)) {
    echo json_encode(["status" => "error", "message" => "Temporary JSON file not found."]);
    exit;
}

//error handling if the required fields are missing in the JSON data
$required_fields = ['book_id', 'current_chapter', 'current_chapter_length', 'current_chapter_name', 'current_chapter_start_time', 'current_time', 'type'];
foreach ($required_fields as $field) {
    if (!isset($js_fetch_data[$field])) {
        echo json_encode(["status" => "error", "message" => "Missing required field: $field."]);
        exit;
    }
}

//merging the new data with the existing data
$decode['book_id'][] = $js_fetch_data['book_id'];
$decode['current_chapter'][] = $js_fetch_data['current_chapter'];
$decode['current_chapter_length'][] = $js_fetch_data['current_chapter_length'];
$decode['current_chapter_name'][] = $js_fetch_data['current_chapter_name'];
$decode['current_chapter_start_time'][] = $js_fetch_data['current_chapter_start_time'];
$decode['current_time'][] = $js_fetch_data['current_time'];
$decode['type'][] = $js_fetch_data['type'];

//saving the merged data back to the temporary JSON file
file_put_contents($getting_json_file, json_encode($decode), JSON_PRETTY_PRINT);
//returning a success response to the client
echo json_encode(["status" => "History saved successfully"]);






?>