function pick_the_chapter(chapter_id,type) {
    console.log(chapter_id, document.getElementById('Chapter_id'));
    console.log(type)
    var total_chapters = document.getElementById('chapter_list').children.length;
    var audio = document.getElementById('audio_1');
    if(chapter_id >= total_chapters) {
        audio.pause()
    }
    
    var chapter_name  = " "
    var chapter_length= " "
    var chapter_start = " "
    var list_of_ui_value = [];
    if(type === "history" && type !== undefined) {
        
        chapter_name   = document.getElementById("history_Chaptername_" + chapter_id);
        chapter_length = document.getElementById("history_End_" + chapter_id);
        chapter_start  = document.getElementById("history_start_" + chapter_id);
        
        var list_of_ui_value = [chapter_start.textContent, chapter_name.textContent, chapter_length.textContent];
        //this make sure it selects the correct chapter in the list based on the history entry
        //as history can be larger then chapters and cause index out of bounds errors
        var owner = document.getElementById("chapter_list");
        for(var i = 0; i < owner.children.length; i++) {
            if(document.getElementById("Chaptername_" + i).textContent === chapter_name.textContent) {
                chapter_id = i;
                break;
            }
            
        }
    }
    else{
        chapter_name   = document.getElementById("Chaptername_" + chapter_id);
        chapter_length = document.getElementById("End_" + chapter_id);
        chapter_start  = document.getElementById("start_" + chapter_id);
        var list_of_ui_value = [chapter_start.textContent, chapter_name.textContent, chapter_length.textContent];
    }
    //seek to the correct time in the audio
    var seek = () => {
        audio.currentTime = convert_to_seconds(chapter_start.textContent);
    }
    //ios need a small delay before seeking to the correct time
    //as it might not work or reset it to 0 
    if(/iphone|ipad|ipod/i.test(navigator.userAgent)) {
                    setTimeout(() => {
                seek();
            }, 50);
    }
    else
    {
        seek()
    }

    var old_chapter_id = document.getElementById('Chapter_id');
    old_chapter_id.value = parseInt(chapter_id);
     console.log(chapter_id, document.getElementById('Chapter_id'));

  
;
    audio.play();



    update_ui(list_of_ui_value)
    cap_the_timeout(type)




}