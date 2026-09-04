var audio = document.getElementById('audio_1');
function update_ui(list_of_ui_value) 
{
     document.getElementById('Start_time').textContent = list_of_ui_value[0];
     document.getElementById('Chapter_name').textContent = list_of_ui_value[1];
     document.getElementById('Ends_at').textContent = list_of_ui_value[2];
     progress_bar(list_of_ui_value[2]);

}
function progress_bar(percentage) 
{

     var progressBar = document.getElementById('inner_track');

     progressBar.style.animation = ""; 
     void progressBar.offsetWidth; 


     progressBar.style.animation = "speed 5  linear";
     progressBar.style.animationDuration = convert_to_seconds(percentage) + "s"
     if(audio.paused) {
         progressBar.style.animationPlayState = "paused";
     }
     else{
     progressBar.style.animationPlayState = "running";
     }}