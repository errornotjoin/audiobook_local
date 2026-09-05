var timeout = null;
var audio = document.getElementById('audio_1');

function cap_the_timeout()
{
    if(timeout != null) {
        clearTimeout(timeout);
        timeout = null;
    }
    timeout = setTimeout(display_the_time, 1000);


}
function display_the_time() 
{
    var chapter_id = document.getElementById('Chapter_id');
    var chater = parseInt(chapter_id.value, 10) + 1
    if(!audio.paused) {
        
    
    var oldlenght = document.getElementById('Ends_at');
    var times =  convert_to_seconds(oldlenght.textContent) 

    if(times > 0) {
        times -= 1;
        oldlenght.textContent = convert_back_to_time(times) 
        cap_the_timeout()
    }
    else
    {
        var progressBar = document.getElementById('inner_track');
        progressBar.style.animationPlayState = "paused";
        clearTimeout(timeout);;
        pick_the_chapter(chater ,"user_made")

    }


    }
    else
    {
        //do nothing
        cap_the_timeout()
    }
   
    
    
}
