<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="Css/background.css">
        <link rel="stylesheet" href="Css/add_the_audio_book.css">
    <title>add audiobook</title>
</head>
<body>
        <header>
        <div class="header_left">
            <h1>errornotjoin</h1>
        </div>
        <div class="header_right">
        <a href="main.php">Go Back</a>    
        <a href="index.php">Logout</a>
            
        </div>
    </header>
    <!--<div class="Cover_the_whole_page" id="cover_the_page" ="getElementById('cover_the_page').style.display = 'none';">
        <div class="The_are_you_sure">
            <h2>Are you Sure?</h2>
            <p>Are you sure you want to add this audiobook?</p>
            <button>Yes</button>
            <button>No</button>
        </div>
    </div>
    -->
    
    <form action="serverside/add.php" method="post"  enctype="multipart/form-data"  >
        <div class="main_items">
            <input type="text" name="title" placeholder="Enter the title of the audiobook" required>
            <div class="some_info">
                <input type="text" name="author" placeholder="Enter the author of the audiobook" required>
                <input type="text" name="narrator" placeholder="Enter the narrator of the audiobook" required>
                <input type="date" name="release_date" placeholder="Enter the release date of the audiobook" required>
                <input type="time" name="duration" required>
            </div>
            <div>
                <textarea name="description" placeholder="Enter the description of the audiobook" required></textarea>
            </div>
            <div class="file_upload">
                <input type="file" name="audiobook_upload" accept=".mp3,.m4a" required  title="Upload the audiobook file">
                <input type="file" name="cover_art" accept=".jpg,.svg,.png" required>
            </div>
        </div>
        <div class="next_step">
            <button type="submit">Submit</button>
        </div> 
    </form>
    
</body>
</html>