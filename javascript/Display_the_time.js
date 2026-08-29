var has_ended = false;
function Update_time()
{
    var time_out =  setTimeout(Update_time, 1500);
    if(!document.getElementById("audio_1").paused)
    {
 


    }
    else{
                    console.log(ends_at_innderHTML);
        if(split_time[2] == 0 )
            {
                if(split_time[1] == 0)
                {
                    
                    split_time[0] = split_time[0] - 1;
                    split_time[1] = 59;
                    split_time[2] = 59;
                }
                else
                {
                    split_time[1] = split_time[1] - 1;
                    split_time[2] = 59;
                }
            }
        else
        {
            split_time[2] = Number(split_time[2]) - 1;
        }}

        var new_time = split_time[0].toString().padStart(2, '0')  + ":" + split_time[1].toString().padStart(2, '0') + ":" + split_time[2].toString().padStart(2, '0');
        Ends_at.innerHTML =   new_time;

}
    


