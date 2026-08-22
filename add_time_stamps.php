<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Css/background.css">
    <link rel="stylesheet" href="Css/add_time_stamps.css">
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
        <div class="add_more_things">
            <label>Create new table :</label>
            <input type="number">
            <button></button>

        </div>
        <div class="names_of_the_tables">

            <h2>Chapters Name</h2>
            <h2>Chapters Starts At (hh:mm)</h2>
            <h2>Chapters Last For (hh:mm)</h2>
        </div>
        <div>

            <?php
                $file_localion = "Json/the_audiobook_info/";
                $ID_Code = $_GET["book_id"];
                $Json_Audiobook_file = file_get_contents($file_localion. $ID_Code . ".json");
                $Json_Audiobook_file = json_decode($Json_Audiobook_file, true);
                for($x = 0; $x <  count($Json_Audiobook_file["timestamps"]); $x++ )
                    {
                        echo "<div class='the_user_inputs'>";

                        echo "<input type='text' value='".$Json_Audiobook_file["Chapters_names"][$x] ."'>";
                        echo "<input type='time' value='".$Json_Audiobook_file["timestamps"][$x] ."'>";
                        echo "<input type='time' value='".$Json_Audiobook_file["Chapters_lengths"][$x] ."'>";
                        echo "</div>";
                    }
            ?>
        </div>
    </main>
    
</body>
</html>