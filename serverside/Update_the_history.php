<?php
//getting the two JSON files: the temporary one and the main one for updating the history
$Book_id = $_GET['book_id'];
$getting_json_file = "tmp_files/$Book_id.json";
$main_json_file = "../Json/the_audiobook_info/$Book_id.json";



