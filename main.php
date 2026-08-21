<?php 
#Session_start();
#$user = $session['user'];
#$session = $session['session'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Css/background.css">
    <link rel="stylesheet" href="Css/home.css">
    <title>Home -- errornotjoin audiobooks</title>
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
    <main>
    <div class="user_listing_right_now">
        <?php ##user list still list?>
        .
    </div>
    <div class="Master_list">
        
                <a href='add_the_audio_book.php'>
                    <div class='Master_holder'>
                        <div class='Master_img'>
                            <h3>Add More Audiobooks</h3> 
                        </div>
                    </div>
                </a>
        <?php 
        
        $Json_masterlist = file_get_contents("Json/Master_Redcon.json");
        $Json_masterlist = json_decode($Json_masterlist, true);
        if($Json_masterlist == null)
        {
            echo "<div class='Master_holder_error'>";
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
                    echo "<div class='Master_img'>";
                    echo "<img src='".$value['cover']."' alt='cover of the audiobook'>";
                    echo "</div>"; 
                    echo "<div class='Master_info'>";
                        echo "<h1>".$value['title']."</h1>";
                        echo "<div class='Master_author'>";
                            echo "<p>author</p>";
                            echo "<p>narrator</p>";
                            echo "<p>duration</p>";
                            echo "<p>".$value['author']."</p>";
                            echo "<p>".$value['narrator']."</p>";
                            echo "<p>".$value['duration']."</p>";
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