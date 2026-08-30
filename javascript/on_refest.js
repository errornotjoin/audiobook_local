var audio_1 = document.getElementById("audio_1");
audio_1.addEventListener("timeupdate", function() {
    var currentTime = audio_1.currentTime;
    var duration = audio_1.duration;
    var progress = (currentTime / duration) * 100;
    document.getElementById("inner_track").style.width = progress + "%";
});

window.addEventListener("load", function() {
    var audio_1 = document.getElementById("audio_1");
    audio_1.addEventListener("timeupdate", function() {
        var currentTime = audio_1.currentTime;
        var duration = audio_1.duration;
        var progress = (currentTime / duration) * 100;
        document.getElementById("inner_track").style.width = progress + "%";
    });
});   