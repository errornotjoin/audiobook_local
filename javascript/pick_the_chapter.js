function User_pick_the_chapter(number) {
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
    document.getElementById("Chapter_id").innerHTML =  number;
    document.getElementById("Start_time").innerHTML = " " + document.getElementById("start_" + number).innerHTML; ;
    document.getElementById("Chapter_name").innerHTML = " " + document.getElementById("Chaptername_" + number).innerHTML; ;
    document.getElementById("Ends_at").innerHTML = " " + document.getElementById("End_" + number).innerHTML; 
    
    //Update_time()
    
}