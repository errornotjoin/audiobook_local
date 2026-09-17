
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Css/background.css">
    <link rel="stylesheet" href="Css/home.css">
    <link rel="stylesheet" href="Css/index_small.css">
    <title>Home -- errornotjoin audiobooks</title>
</head>
<body>
    <header>

        <div class="header_right">
            <a href="main.php">Home</a>
            <a href="index.php">Logout</a>
        </div>
    </header>
    <main>
    
    <div class="Master_list">
        
                <a href='add_the_audio_book.php' class="images">
                    <img src="images/add (2).svg">
                </a>
        <?php 
        
        $Json_masterlist = file_get_contents("Json/Master_Redcon.json");
        $Json_masterlist = json_decode($Json_masterlist, true);
        if($Json_masterlist == null)
        {
            echo "<div class='Master_holder'>";
            echo "<h1>Error</h1>";
            echo "<p>There is NO Audiobooks available</p>";
            echo "</div>";
        }
        else
        {   
            foreach($Json_masterlist as $key => $value)
            {
                echo "<a href='book.php?book=".$value['ID']."'>";
                echo "<div class='Master_holder'>";
                    echo "<div class='Master_info'>";
                        echo "<h1>".$value['title']."</h1>";
                        echo "<div class='Master_author'>";
                            echo "<div>";
                            echo "<h3>author</h3>";
                            echo "<p>".$value['author']."</p>";
                            echo "</div>";
                            echo "<div>";
                            echo "<h3>narrator</h3>";
                            echo "<p>".$value['narrator']."</p>";
                            echo "</div>";
                            echo "<div>";
                            echo "<h3>duration</h3>";
                            echo "<p>".$value['duration']."</p>";
                            echo "</div>";
                        echo "</div>";
                    echo "</div>";
                echo "</div>";
                echo "</a>";
            }
        }
        
        
        
        
        ?>
    </div>
    </main>
</body>
</html>