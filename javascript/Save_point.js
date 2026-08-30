function save_point(type) 
{
    var audio = document.getElementById("audio_1");
    //this so i don't need to covert it 
    var current_time = audio.currentTime;
    //need the chaptrer id just incase
    var current_chapter = document.getElementById("Chapter_id").value;
    //this where the user stopped the audio
    //and the chapter information
    var current_chapter_name = document.getElementById("Chapter_name").innerHTML;
    var current_chapter_start_time = document.getElementById("Start_time").innerHTML;
    var current_chapter_length = document.getElementById("Ends_at").innerHTML;
    //this send data to php and php create a temp file 
    // to save ths information
    fetch("serverside/save_point.php", {
        method: "POST",
        headers: { "content-type": "application/json" },
        body: JSON.stringify({
            "current_time": current_time,
            "current_chapter": current_chapter,
            "current_chapter_name": current_chapter_name,
            "current_chapter_start_time": current_chapter_start_time,
            "current_chapter_length": current_chapter_length,
            "type": type
        })
    })

   





}