<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Css/background.css">
    <link rel="stylesheet" href="Css/book.css">
    <title>Document</title>
</head>
<body>
     <header>
        <div class="header_left">
            <h1>errornotjoin</h1>
        </div>
        <div class="header_right">
            <a href="index.php">Logout</a>
        </div>
    </head1er>
        <main>
    <?php
    $file_localion = "Json/the_audiobook_info/";
    $ID_Code = $_GET["book"];
    $Json_Audiobook_file = file_get_contents($file_localion. $ID_Code . ".json");
    $Json_Audiobook_file = json_decode($Json_Audiobook_file, true);
    if($Json_Audiobook_file == null)
    {
            echo "<div class='Master_holder_error'>";
            echo "<h1>Error</h1>";
            echo "<p>There is NO Audiobooks available</p>";
            echo "</div>";
    }
    else
        {echo "<div class='Master_holder'>";
                echo "<div class='chapters_and_add_more'>";
            echo "<div class='items'>";

            echo "<h2>History</h2>";
            echo "<button onclick='window.location(save_file.php?bookID=".$_GET["book"].")'>Save History</button>";
            echo "</div>";
            echo "<div>";
            echo "<ol id='history_list' style='list-style:none;, padding-left:0;'>";
            $x = 0;
            for($x = 0; $x < count($Json_Audiobook_file["history_types"]); $x++)
            {//change the button
                $y = 0;
                
                echo "<li class='the_chapter_buttons_and_other' id='the_chapter_buttons_and_other_$x'>";
               
                
                
                echo "<button class='' id='' onclick='User_pick_the_chapter($x),stop_the_time_out() '>
                ";

                echo "<h2 >".$Json_Audiobook_file["history_types"][$x]."</h2>";
                echo "<div class='Times_items'> ";
                    echo "<p id='start_$x'>".$Json_Audiobook_file["history_timestamps"][$x]."</p>";
                    echo "<p id='Chaptername_$x'>".$Json_Audiobook_file["history_Chapters_names"][$x]."</p>";
                    echo "<p id='End_$x'>  ".$Json_Audiobook_file["history_Chapters_lengths"][$x]." </p>";
                echo "</div>";
                
                
                echo"

                
                
                
                </button>";
                echo "<h2></h2>";

            }
        echo "</ol>";
        echo "</div>";
        echo "</div>";

            echo "<div class='image_and_creaters' s>";
                echo "<img src='".$Json_Audiobook_file['cover']."'>";
                echo "<div class='the_creaters_and_info'>"; 
                    echo "<div>";
                        echo "<h2>";
                        echo $Json_Audiobook_file['author'];
                        echo "</h2>";
                    echo "</div>";
                    echo "<div>";
                        echo "<h2>";
                        echo    $Json_Audiobook_file['narrator'];
                        echo "</h2>";
                    echo "</div>";
                    echo "<div>";
                        echo "<h2>";
                        echo$Json_Audiobook_file['duration'];
                        echo "</h2>";
                    echo "</div>";
                echo "</div>";
            echo  "</div>";
            echo "<div class='chapters_and_add_more'>";
            echo "<div>";
            echo "<a class='items' href='add_time_stamps.php?book_id=".$ID_Code ."'>";
            echo "<h2></h2>";
            echo "<h2>Timestamps</h2>";
            echo "<h2><butto>+ Add </button></h2>";
            echo "</a>";
            echo "</div>";
            echo "<div>";
            echo "<ol id='chapter_list' style='list-style:none;, padding-left:0;'>";
            $x = 0;
            for($x = 0; $x < count($Json_Audiobook_file["Chapters_names"]); $x++)
            {//change the button
                $y = 0;
                
                echo "<li class='the_chapter_buttons_and_other' id='the_chapter_buttons_and_other_$x'>";
               
                
                
                echo "<button class='' id='' onclick='pick_the_chapter($x),cap_the_timeout()'>
                ";

                echo "<h2 id='Chaptername_$x'>".$Json_Audiobook_file["Chapters_names"][$x]."</h2>";
                echo "<div class='Times_items'>";
                    echo "<p id='start_$x'>".$Json_Audiobook_file["timestamps"][$x]."</p>";
                    echo "<p id=''>/</p>";
                    echo "<p id='End_$x'>  ".$Json_Audiobook_file["Chapters_lengths"][$x]." </p>";
                echo "</div>";
                
                
                echo"

                
                
                
                </button>";
                echo "<h2></h2>";

            }
        echo "</ol>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "<div class='audio_play'>";
        echo "<audio controls id='audio_1' style='visibility: hidden ;' preload='metadata'>
        <source src=".$Json_Audiobook_file['audio_book_link']." type='audio/ogg; codecs=opus'> >
        
        </audio>";
           
            echo "<div class='timing_and_name'>";
            echo "<h2 id='Start_time'>15:04</h2>";

            echo "<h2 id='Chapter_name'>Chapter Name</h2>";
            echo "<h2 id='Ends_at'>20:00</h2>";
            echo "</div>";
             echo "<div class='the_main_audio_items'>";
                echo "<button onclick='next_and_before_chapter(\"before\")'> before </button>";
                echo "<div class='outer_track'><div class='inner_track' id='inner_track'></div></div>";
                echo "<button onclick='next_and_before_chapter(\"next\")'> next </button>";
            echo "</div>";
            echo "<div class='User_inputs'>";
                echo "<button onclick='stop_audio()'> Stop </button>";
                echo "<button onclick='play_audio()'>Start</button>";
                echo "<button onclick='mute_audio()'> mute  </button>";
                echo "<button onclick='reset_audio()'> Reset </button>";
        echo "</div>";
                    echo "<input id='Chapter_id' style='visibility: hidden ;' value='0'>";
                    echo "<input id='book_Id' style='visibility: hidden ;' value='".$ID_Code ."'>";
        }
    ?>
    </main>
    <!-- Change the Chapter -->
    <script src="Javascript/pick_the_chapter.js"></script>
    <!-- Convert items into seconds or reformat time   -->
    <script src="Javascript/count_the_secons.js"></script>
    <!-- Handle the bisc buttons -->
    <script src="Javascript/bisc_buttons.js"></script>
    <!-- its an count down timer for the audio -->
    <script src="Javascript/Display_the_time.js"></script>
    <!-- Update All UI Elements -->
    <script src="Javascript/update_ui.js"></script>
    <!-- When page loads -->
    <script src="Javascript/on_load.js"></script>
    <!-- save point-->
    <script src="Javascript/save_point.js"></script>

</body>
</html>
