window.onload = function () {

    var history = document.getElementById("history_list").children;
    if (history.length > 0) {
        // Do something with the history items
        pick_the_chapter(history.length - 1, "history");
    }
    else
    {
        pick_the_chapter(0, "user_picked");
    }
};