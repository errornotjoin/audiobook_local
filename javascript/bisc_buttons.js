function stop(audio)
{
    audio.pause();
    save_point("stop"); 
}
function play(audio)
{
    audio.play();
    save_point("played"); 
}
function seek(audio)
{
    try {
        var current_chapter = document.getElementById("Chapter_id");
        var next_chapter_number = Number(current_chapter.value) ;
        User_pick_the_chapter(next_chapter_number);
    } catch (error) {
        console.log(error);
    }


}
function next_chapter(audio)
{
    try {
        var current_chapter = document.getElementById("Chapter_id");
        var next_chapter_number = Number(current_chapter.value) + 1;
        User_pick_the_chapter(next_chapter_number);
        save_point("Skipped to next chapter"); 

    } catch (error) {
        console.log(error);
    }
}
function previous_chapter(audio)
{
 try {
        var current_chapter = document.getElementById("Chapter_id");
        var next_chapter_number = Number(current_chapter.value) - 1;

        User_pick_the_chapter(next_chapter_number);
        save_point("went back to a  chapter");
    } catch (error) {
        console.log("No more chapters");
    }
}
function mute(audio)
{
    if(audio.muted)
    {
        audio.muted = false;
        
    }
    else
    {
        audio.muted = true;
    }
}