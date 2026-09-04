function pick_the_chapter(chapter_id,type) {
    var total_chapters = document.getElementById('chapter_list').children.length;
    var audio = document.getElementById('audio_1');
    if(chapter_id >= total_chapters) {
        audio.pause()
    }
    
    var chapter_name  = " "
    var chapter_length= " "
    var chapter_start = " "
    if(type === "history") {
        
        chapter_name   = document.getElementById("Chaptername_" + chapter_id);
        chapter_length = document.getElementById("End_" + chapter_id);
        chapter_start  = document.getElementById("start_" + chapter_id);
    }
    else{
        chapter_name   = document.getElementById("Chaptername_" + chapter_id);
        chapter_length = document.getElementById("End_" + chapter_id);
        chapter_start  = document.getElementById("start_" + chapter_id);
    }
        audio.currentTime = convert_to_seconds(chapter_start.textContent)
    var list_of_ui_value = [chapter_start.textContent, chapter_name.textContent, chapter_length.textContent];
    var old_chapter_id = document.getElementById('Chapter_id');
    old_chapter_id.value = parseInt(chapter_id);

  
;
    audio.play();



    update_ui(list_of_ui_value)
    cap_the_timeout()




}