var audio = document.getElementById('audio_1');
var progressBar = document.getElementById('inner_track');
function play_audio() {
    audio.play();
    progressBar.style.animationPlayState = "running";
}
function mute_audio() {
    if (audio.muted) {
        audio.muted = false;
    } else {
        audio.muted = true;
    }
}
function stop_audio() {
    audio.pause();
    progressBar.style.animationPlayState = "paused";
}
function next_and_before_chapter(direction) {
    var chapter_id = document.getElementById('Chapter_id');
    var total_chapters = document.getElementById('chapter_list').children.length;

    var maths = chapter_id.value;
    var type = "user_change";
    console.log("Current chapter: " + total_chapters+ " : " + maths);

    if (direction === 'next' & maths < total_chapters - 1 ) {
        // Logic to go to the next chapter
            maths = parseInt(chapter_id.value, 10) + 1;
            chapter_id.value = maths;
            pick_the_chapter(maths,type)

    } else if (direction === 'before' & maths > 0) {
            maths = parseInt(chapter_id.value, 10) - 1;
            chapter_id.value = maths;
            pick_the_chapter(maths,type)
    }



}
function reset_audio() 
{
    var chapter_id = document.getElementById('Chapter_id').value;
        var type = "user_change";
    pick_the_chapter(chapter_id,type)
}