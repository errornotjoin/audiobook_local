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
    </header>
    <form action="serverside/add_time_info.php" method="POST">
    <main>
        <?php echo "<input type='hidden' name='book_id' value='".  $_GET["book_id"]."' >";
        ?>
        <div class="names_of_the_tables">
            <h2>Chapters Name</h2>
            <h2>Chapters Starts At (hh:mm)</h2>
            <h2>Chapters Last For (hh:mm)</h2>
        </div>
        <div class="the_holder_of_the_timestamps" id="the_holder_of_the_timestamps">

            <?php
                $file_localion = "Json/the_audiobook_info/";
                $ID_Code = $_GET["book_id"];
                $Json_Audiobook_file = file_get_contents($file_localion. $ID_Code . ".json");
                $Json_Audiobook_file = json_decode($Json_Audiobook_file, true);
                for($x = 0; $x <  count($Json_Audiobook_file["timestamps"]); $x++ )
                    {
                        echo "<div class='the_user_inputs'>";
                        

                        echo "<input type='text' name='Chapters_names_$x' value='".$Json_Audiobook_file["Chapters_names"][$x] ."'>";
                        echo "<input type='time' name='timestamps_$x' value='".$Json_Audiobook_file["timestamps"][$x] ."'>";
                        echo "<input type='time' name='Chapters_lengths_$x' value='".$Json_Audiobook_file["Chapters_lengths"][$x] ."'>";
                        echo "</div>";
                    }
                echo "<input type='hidden' id='Chapters_names' name='Chapters_namess' value='".  count($Json_Audiobook_file["Chapters_names"])."' >";
            ?>
        </div>
        <div class="add_more_things">
            <label>Create new table :</label>
            <input type="number" id="Incress_the_inputs_to_this">
            <button type="button" id="Add_more_inputs_button" onclick="incress_the_inputs()"></button>
            <div>
                <input type="reset">
                <input type="submit">
            </div>

        </div>
    </main>
    </form>
    <script src="javascript/add_more_inputs.js"></script>
    
</body>
</html>