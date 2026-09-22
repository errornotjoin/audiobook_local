<?php
$Id = $_GET["bookID"];
$tmp_json = "tmp_files/".$Id.".json";
$audiobook_json = "../JSON/the_audiobook_info/".$Id.".json";

if(file_exists($tmp_json))
{
    $tmp_json = file_get_contents($tmp_json);
    $tmp_json = json_decode($tmp_json, true);
    $tmp_json["book_id"] = [];
    $tmp_json["current_chapter"] = [];
    $tmp_json["current_chapter_length"] = [];
    $tmp_json["current_chapter_name"] = [];
    $tmp_json["current_chapter_start_time"] = [];
    $tmp_json["current_time"] = [];
    $tmp_json["type"] = [];
    file_put_contents("tmp_files/".$Id.".json", json_encode($tmp_json), JSON_PRETTY_PRINT);
}
if(file_exists($audiobook_json))
{
    $audiobook_json = file_get_contents($audiobook_json);
    $audiobook_json = json_decode($audiobook_json, true);
    $audiobook_json["book_id"] = [];
    $audiobook_json["current_chapter"] = [ ];
    $audiobook_json["current_chapter_length"] =[];
    $audiobook_json["current_chapter_name"] = [];
    $audiobook_json["current_chapter_start_time"] = [];
    $audiobook_json["current_time"] = [];
    $audiobook_json["type"] = [];
    file_put_contents("../JSON/the_audiobook_info/".$Id.".json", json_encode($audiobook_json), JSON_PRETTY_PRINT);
}
header("Location: ../book.php?book=".$Id); // Redirect to a specific page after clearing history
?>