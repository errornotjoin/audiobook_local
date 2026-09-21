function change_audio(start_time, type, pre_seconds ) {
    var audio = document.getElementById('audio_1');
    var progressBar = document.getElementById('inner_track');
    var seek = () => {
        if(type === 'history') {
            audio.currentTime = pre_seconds;
            progressBar.style.animationPlayState = "running";
        }
        else {
            audio.currentTime = convert_to_seconds(start_time);
            progressBar.style.animationPlayState = "running";
        }
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
     audio.play();
    return;
}