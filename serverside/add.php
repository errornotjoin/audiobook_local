<?php
// change me to the correct path to the upload directory
$upload_directory_audiobook = "../audiobook/";
$upload_directory_cover = "../images/";
$Json_master_list = "../JSON/Master_Redcon.json";
$json_audiobook_localtion = "../JSON/the_audiobook_info/";

//this infor comes from "add_the_audio_book.php"
$title = htmlspecialchars( $_POST['title'], ENT_QUOTES, 'UTF-9');
$author = htmlspecialchars($_POST['author']);
$narrator = htmlspecialchars($_POST['narrator']);
$duration = htmlspecialchars($_POST['duration']);
$release_date = htmlspecialchars($_POST['release_date']);
$description = htmlspecialchars($_POST['description']);
//
$audio_book_file = $_FILES['audiobook_upload'];
$cover_art_file = $_FILES['cover_art'];
//
$create_unique_id = uniqid();

//IMPORTING array 
//audiobook file infor

$audiobook_info = 
[
    "name" => $audio_book_file['name'],
    "type" => $audio_book_file['type'],
    "size" => $audio_book_file['size'],
    "tmp_name" => $audio_book_file['tmp_name'],
    "error" => $audio_book_file['error']
];
//cover art file infor
$cover_art_info = 
[
    "name" => $cover_art_file['name'],
    "type" => $cover_art_file['type'],
    "size" => $cover_art_file['size'],
    "tmp_name" => $cover_art_file['tmp_name'],
    "error" => $cover_art_file['error']
];

// i moved this to the here beacuse i need to accese and change it (add or remove )
// look at create_new_json_file() for any changes 
$format_for_json = array(
    
    "ID" => $title. "_". $create_unique_id ,
    "title" =>$title ,
    "author" => $author,
    "narrator" => $narrator,
    "duration" => $duration,
    "cover" => $cover_art_info['name'],
    "book_link_page" => "book.php?ID=$create_unique_id",
    "audio_book_link" => $audiobook_info
);

function Update_names($audiobook_info,$cover_art_info,  $unique_id, $title)
{
        try{
        // Update the names of the audiobook and cover art files with the unique ID and title
        $audiobook_file_name = $title . "_" . $unique_id . "_audiobook." . pathinfo($audiobook_info['name'], PATHINFO_EXTENSION);
        $cover_art_file_name = $title . "_" . $unique_id . "_cover." . pathinfo($cover_art_info['name'], PATHINFO_EXTENSION);
        //
        $audiobook_info['name'] = $audiobook_file_name; 
        $cover_art_info['name'] = $cover_art_file_name;
         
        //
        return [$audiobook_info, $cover_art_info];
        }
        catch(Exception $e)
        {
            header("Location: ../main.php?Error=01");


        }

}
function upload_to_file($audiobook_info, $cover_art_info, $upload_directory_audiobook, $upload_directory_cover)
{
         try{
    // Upload the audiobook and cover art files to the server
    move_uploaded_file($audiobook_info['tmp_name'], $upload_directory_audiobook . $audiobook_info['name']);
    move_uploaded_file($cover_art_info['tmp_name'], $upload_directory_cover . $cover_art_info['name']);
}catch(Exception $e)
    {
        header("Location: ../main.php?Error=02");
    }

}
list($audiobook_info, $cover_art_info) = Update_names($audiobook_info, $cover_art_info, $create_unique_id, $title);
//update the cover link 
$format_for_json['cover'] = "images/" . $cover_art_info['name'];
$format_for_json['audio_book_link'] = "audiobook/" . $audiobook_info['name'];
function add_data_to_master_list($format_for_json, $Json_master_list)
{
            try{
    //change me when the master list has been moved
    $import_the_list = file_get_contents($Json_master_list);
    //decod the list
    $data_in_list = json_decode($import_the_list, true);
    //add the new data to the old 
    $data_in_list[] = $format_for_json;
    //encoding it 
    $save_the_updated = json_encode($data_in_list, JSON_PRETTY_PRINT);
    //sending it to the  master list and saving the update
    file_put_contents($Json_master_list, $save_the_updated);
}catch(Exception $e)
    {
        header("Location: ../main.php?Error=03");
    }
}
function create_new_json_file($format_for_json, $json_audiobook_localtion, $title, $create_unique_id)
{

        try{
    //this items for user to add the vaules (on that audiobook page)
    $format_for_json = array_merge($format_for_json, [
        "timestamps" => [],
        "Chapters_lengths"=> [],
        "Chapters_names" => [], 
        "User_stopped_at" => 0
    ]);

    $json_encode_for_new_file = json_encode($format_for_json, JSON_PRETTY_PRINT);
    
    file_put_contents($json_audiobook_localtion.$title."_".$create_unique_id.".json", $json_encode_for_new_file, LOCK_EX);
    } catch(Exception $e)
    {
        header("Location: ../main.php?Error=04");
    }
}

//this is the correct order 
upload_to_file($audiobook_info, $cover_art_info, $upload_directory_audiobook, $upload_directory_cover);
add_data_to_master_list($format_for_json, $Json_master_list);
create_new_json_file($format_for_json, $json_audiobook_localtion, $title, $create_unique_id);
header("Location: ../main.php?message=Complet")
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/background.css">
    <link rel="stylesheet" href="../Css/add.css">
    <title>Loading the upload -- errornotjoin</title>
</head>
<body>
    <section class="loading_info">
        <h1 class="Load_top">Loading the upload</h1>
        <p>Please wait while we process your audiobook upload.</p>
        <p>This may take a few moments depending on the size of the files.</p>
        <p>Once the upload is complete, you will be redirected to the main page.</p>
        <div class="amin">
            <div class="outer_loading">
                <div class="inner_loading"></div>
            </div>
            <div class="outer_loading">
                <div class="inner_loading">
                </div>
            </div>    
            <div class="outer_loading">
                <div class="inner_loading">
                </div>
            </div>
            <div class="outer_loading">
                <div class="inner_loading">
                </div>
            </div>
            
        </div>
    </section>
</body>
</html>
