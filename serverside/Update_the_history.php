<?php
//getting the two JSON files: the temporary one and the main one for updating the history
$Book_id = $_GET['bookID'];
$getting_json_file = "tmp_files/$Book_id.json";
$main_json_file = "../Json/the_audiobook_info/$Book_id.json";
//decode
$decode_temp = json_decode(file_get_contents($getting_json_file), true);
$decode_main = json_decode(file_get_contents($main_json_file), true);
if (empty($decode_temp['book_id']) || count($decode_temp['book_id']) === 0) {
    header("Location: ../book.php?book=$Book_id");
    exit();
}
//adding to the main JSON file from the temporary JSON file
foreach ($decode_temp['book_id'] as $key => $book_id) {
    $decode_main['book_id'][] = $book_id;
    if($decode_temp['current_chapter'][$key] === null) {
        continue;
    }
    else{
    $decode_main['current_chapter'][] = $decode_temp['current_chapter'][$key];
    $decode_main['current_chapter_length'][] = $decode_temp['current_chapter_length'][$key];
    $decode_main['current_chapter_name'][] = $decode_temp['current_chapter_name'][$key];
    $decode_main['current_chapter_start_time'][] = $decode_temp['current_chapter_start_time'][$key];
    $decode_main['current_time'][] = $decode_temp['current_time'][$key];
    $decode_main['type'][] = $decode_temp['type'][$key];
    }
}
//remove the temp data
$decode_temp['book_id'] = [];
$decode_temp['current_chapter'] = [];
$decode_temp['current_chapter_length'] = [];
$decode_temp['current_chapter_name'] = [];
$decode_temp['current_chapter_start_time'] = [];
$decode_temp['current_time'] = [];
$decode_temp['type'] = [];

$old_encode = json_encode($decode_temp, JSON_PRETTY_PRINT);
file_put_contents($getting_json_file, $old_encode);





//
$encode = json_encode($decode_main, JSON_PRETTY_PRINT);
file_put_contents($main_json_file, $encode);




echo "text";
header("Location: ../book.php?book=$Book_id");
exit();