<?php
    $file_localion = "../Json/the_audiobook_info/";
    $ID_Code = $_POST["book_id"];
    $Json_Audiobook_file = file_get_contents($file_localion. $ID_Code . ".json");
    $Json_Audiobook_file = json_decode($Json_Audiobook_file, true);

    $new_timestamps = [];
    $new_Chapters_lengths =[];
    $new_Chapters_names = [];
    


    for($x = 0; $x <  $_POST["Chapters_namess"] + 1 ; $x++ )
        {
            //check if the user has removed (by emptying it) the input and to skip it
            if(empty($_POST["Chapters_names_$x"]) || empty($_POST["timestamps_$x"] ) || empty($_POST["Chapters_lengths_$x"]))
            {
                //debugging to see what is being skipped
                //echo $_POST["Chapters_names_$x"]. "<br>";
                //if empty skip
                //by just conytinuing the loop and not adding it to the new arrays
                continue;
            }
            //add the new data to the new arrays
            $new_Chapters_names[] = $_POST["Chapters_names_$x"];
            $new_timestamps[] = $_POST["timestamps_$x"];
            $new_Chapters_lengths[] = $_POST["Chapters_lengths_$x"];
        }
    // remove as the user might removed it as empty input and to reorder the list
    unset($Json_Audiobook_file["timestamps"]);
    unset($Json_Audiobook_file["Chapters_lengths"]);
    unset($Json_Audiobook_file["Chapters_names"]);
    
    echo "<br> new_timestamps: " . $new_timestamps[2] . "<br>";
    echo "<br> new_Chapters_lengths: " . $new_Chapters_lengths[2] . "<br>";
    echo "<br> new_Chapters_names: " . $new_Chapters_names[2] . "<br>";
    
    //recreateing the list with the new data and the old data
    // as the user might have removed some of the data or to reorder the list
    $add_new_data = array_merge($Json_Audiobook_file, [
        "timestamps" => $new_timestamps,
        "Chapters_lengths"=> $new_Chapters_lengths,
        "Chapters_names" => $new_Chapters_names
    ]);



    //encoding the new data to json and saving it to the file
    $Json_Audiobook_file = json_encode($add_new_data, JSON_PRETTY_PRINT);
    file_put_contents($file_localion. $ID_Code . ".json", $Json_Audiobook_file);
    #
    header("Location: ../book.php?book=$ID_Code");

?>



    