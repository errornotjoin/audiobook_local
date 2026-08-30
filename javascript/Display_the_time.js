//var has_ended = false;
let stop_time_out = null;
function stop_the_time_out()
{
    //there is already a timeout running, 
    //this will clear it and start a new one
    if(stop_time_out !== null)
    {
        clearTimeout(stop_time_out);
    }
    stop_time_out =  setTimeout(Update_time, 1000);
    
}
function Update_time(jeff)
{

stop_the_time_out()

    var Ends_at = document.getElementById("Ends_at");
    var ends_at_innderHTML = Ends_at.innerHTML;
    var split_time = ends_at_innderHTML.split(":");
    var time = 0;
        if(document.getElementById("audio_1").paused)
        {
        }
        else{
            if(split_time[0] == 0 && split_time[1] == 0 && split_time[2] == 0)
            {
                console.log("The chapter has ended");
                clearTimeout(stop_time_out);

                var current_chapter = document.getElementById("Chapter_id").value ;  
                console.log("The next chapter is " + current_chapter );
                var next_chapter_number = Number(current_chapter) + 1;
                User_pick_the_chapter(next_chapter_number, true)

                stop_the_time_out()

                //has_ended = true;
            }
            else if(split_time[2] == 0 )
                {
                    if(split_time[1] == 0)
                    {
                        
                        split_time[0] = split_time[0] - 1;
                        split_time[1] = 59;
                        split_time[2] = 59;
                        var new_time = split_time[0].toString().padStart(2, '0')  + ":" + split_time[1].toString().padStart(2, '0') + ":" + split_time[2].toString().padStart(2, '0');
                        Ends_at.innerHTML =   new_time;
                    }
                    else
                    {
                        split_time[1] = split_time[1] - 1;
                        split_time[2] = 59;
                        var new_time = split_time[0].toString().padStart(2, '0')  + ":" + split_time[1].toString().padStart(2, '0') + ":" + split_time[2].toString().padStart(2, '0');
                        Ends_at.innerHTML =   new_time;
                    }
                }
            else
            {
                split_time[2] = Number(split_time[2]) - 1;
                var new_time = split_time[0].toString().padStart(2, '0')  + ":" + split_time[1].toString().padStart(2, '0') + ":" + split_time[2].toString().padStart(2, '0');
                Ends_at.innerHTML =   new_time;
            }
        }
}
    


