function pick_the_chapter(chapter_id,type) {
    var chapter_name  = " "
    var chapter_length= " "
    var chapter_start = " "
    console.log("Picking chapter: " + chapter_id);

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
    
    var list_of_ui_value = [chapter_start.textContent, chapter_name.textContent, chapter_length.textContent];
    
    var audio = document.getElementById('audio_1');

    audio.currentTime = convert_to_seconds(chapter_start.textContent);
    update_ui(list_of_ui_value)




}