<?php
session_start();
//recving the data
$received_chunk = $_FILES['chunk'];
$chunk_index = $_POST['chunk_index'];
$total_chunks = $_POST['total_chunks'];
$file_id = $_POST['file_id'];
//sending the chunks to temp file 
$upload_dir = 'temp_audio_files/';
if (!is_dir($upload_dir)) {
    mkdir($upload_dir, 0777, true);
}
$save_chunk_size = [];
//temporary file path for the current chunk
$chunk_file_path = $upload_dir . $file_id . '_' . $chunk_index;

//move that package to the temporary file 
move_uploaded_file($received_chunk['tmp_name'], $chunk_file_path);
$save_chunk_size[] = $received_chunk['size'];
echo json_encode(['success' => true]);

$_SESSION['Save_file_ID'] = $file_id;

$_SESSION['save_chunk_size'] = $save_chunk_size;