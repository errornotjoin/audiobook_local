
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Css/background.css">
    <link rel="stylesheet" href="Css/home.css">
    <link rel="stylesheet" href="Css/index_mid.css">
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
        <div class="header_of_optons">
            <a href='add_the_audio_book.php' class="images">
                <img src="images/add (2).svg">
            </a>
            <div class="search">
                <input type="text" placeholder="Search...">
                <button>Search</button>
            </div>
            <div class="search_results">
                <div id="found_results"><h2>1</h2></div>
                <div id="Total_results"><h2>/</h2></div>
                <div id="Out_of_results"><h2>3</h2></div>
            </div>
        </div>
        <div class="links_holders ">
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
                    echo "<div class='Master_image'>";
                    echo "<img src='".$value['cover']."' type='image/svg+xml'>";
                    echo "</div>";
                    echo "<div class='Master_info'>";
                        echo "<h1 title='".$value['title']."'>".$value['title']."</h1>";
                    echo "</div>";
                    echo "<div class='Master_details header_row'>";
                            echo "<div class=''>";
                            echo "<h3>author</h3>";
                            echo "</div>";
                            echo "<div >";
                            echo "<h3>narrator</h3>";
                            echo "</div>";
                            echo "<div class=''>";
                            echo "<h3>duration</h3>";
                            echo "</div>";
                    echo "</div>";
                    echo "<div class='Master_details'>";
                            echo "<div class='frist'>";
                            echo "<h3 title='".$value['author']."'>".$value['author']."</h3>";
                            echo "</div>";
                            echo "<div class='middle_div'>";
                            echo "<h3 title='".$value['narrator']."'>".$value['narrator']."</h3>";
                            echo "</div>";
                            echo "<div class='last'>";
                            echo "<h3 title='".$value['duration']."'>".$value['duration']."</h3>";
                            echo "</div>";
                    echo "</div>";
                echo "</div>";
                echo "</a>";
            }
        }
        
        
        
        
        ?>
        </div>
    </div>
    </main>
</body>
</html>