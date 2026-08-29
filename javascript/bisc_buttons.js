function stop(audio)
{
    audio.pause();
}
function play(audio)
{
    audio.play();
}
function seek(audio)
{
    var start_time = document.getElementById("Start_time").innerHTML;
    var split_time = start_time.split(":");
    var seconds = (+split_time[0]) * 60 * 60 + (+split_time[1]) * 60 + (+split_time[2]); 
    Start_time = seconds;
    audio.currentTime = Start_time;
}
function next_chapter(audio)
{
    try {
        var current_chapter = document.getElementById("Chapter_id").innerHTML;
        var chapter_number = current_chapter.split("_")[1];
        var next_chapter_number = Number(chapter_number) + 1;
        User_pick_the_chapter(next_chapter_number);
    } catch (error) {
        console.log("No more chapters");
    }
}
function previous_chapter(audio)
{
 try {
        var current_chapter = document.getElementById("Chapter_id").innerHTML;
        var chapter_number = current_chapter.split("_")[1];
        var next_chapter_number = Number(chapter_number) - 1;
        User_pick_the_chapter(next_chapter_number);
    } catch (error) {
        console.log("No more chapters");
    }
}