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
        {
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
            echo "<a href='add_time_stamps.php?book_id=".$ID_Code ."'>";
            echo "<h2>Add Timestamps</h2>";
            echo "</a>";
            echo "</div>";
            echo "<div>";
            echo "<ol style='list-style:none;, padding-left:0;'>";
            $x = 0;
            for($x = 0; $x < count($Json_Audiobook_file["Chapters_names"]); $x++)
            {//change the button
                $y = 0;
                
                echo "<li class='the_chapter_buttons_and_other' id='the_chapter_buttons_and_other_$x'>";
               
                
                
                echo "<button class='' id='' onclick='User_pick_the_chapter($x)'>
                ";

                echo "<h2 id='Chaptername_$x'>".$Json_Audiobook_file["Chapters_names"][$x]."</h2>";
                echo "<div>";
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
        echo "<div class='audio_play'>";
        echo "<audio controls id='audio_1' preload='metadata'>
        <source src=".$Json_Audiobook_file['audio_book_link']." type='audio/ogg; codecs=opus'> >
        
        </audio>";
            echo "<h2 id='Total_time_Left'>Total time Left: 2:22:02</h2>";
            echo "<div class='the_main_audio_items'>";
                echo "<button> before </button>";
                echo "<div class='outer_track'><div class='inner_track' id='inner_track'></div></div>";
                echo "<button> next </button>";
            echo "</div>";
            echo "<div class='timing_and_name'>";
            echo "<h2 id='Start_time'>15:04</h2>";
            echo "<h2 id='Chapter_name'>Chapter Name</h2>";
            echo "<h2 id='Ends_at'>20:00</h2>";
            echo "</div>";
            echo "<div class='User_inputs'>";
                echo "<button> Stop </button>";
                echo "<button >Start</button>";
                echo "<button> Reset </button>";
        echo "</div>";}
    ?>
    


    </main>
    <script src="Javascript/pick_the_chapter.js"></script>
    <script src="Javascript/update_the_progress_bar.js"></script>

    
</body>
</html>
