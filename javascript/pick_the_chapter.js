function User_pick_the_chapter(number, auto_play) {
    console.log(document.getElementById("start_" + number).innerHTML );
    var get_audio = document.getElementById("audio_1");

    get_audio.seekable = true;

    //getting the start time of the chapter and converting it to seconds
    var split_time = document.getElementById("start_" + number).innerHTML.split(":");
    var seconds = (+split_time[0]) * 60 * 60 + (+split_time[1]) * 60 + (+split_time[2]); 
    get_audio.currentTime = seconds;
    if(get_audio.paused) {
        get_audio.play();
    }
    document.getElementById("Chapter_id").value =  number;
    document.getElementById("Start_time").innerHTML = " " + document.getElementById("start_" + number).innerHTML; ;
    document.getElementById("Chapter_name").innerHTML = " " + document.getElementById("Chaptername_" + number).innerHTML; ;
    document.getElementById("Ends_at").innerHTML = " " + document.getElementById("End_" + number).innerHTML; 
    
    var Ends_at = document.getElementById("Ends_at");
    var ends_at_innderHTML = Ends_at.innerHTML;
    var split_time = ends_at_innderHTML.split(":");
    var inner_track = document.getElementById("inner_track");
    inner_track.style.animationName = " ";
    var seconds = (+split_time[0]) * 60 * 60 + (+split_time[1]) * 60 + (+split_time[2]); 
    inner_track.style.animationDuration = seconds + "s";
    inner_track.style.animationName = "speed";
    inner_track.style.animationIterationCount = "infinite";
    save_point("Started a new chapter/seeked to a chapter");



}