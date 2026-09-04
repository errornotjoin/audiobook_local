function convert_to_seconds(arr) 
{
    
    var covert_this = arr.split(':');
    var hours = parseInt(covert_this[0], 10);
    var minutes = parseInt(covert_this[1], 10);
    var seconds = parseInt(covert_this[2], 10);
    var total_seconds = hours * 3600 + minutes * 60 + seconds;
    return total_seconds
}

function convert_back_to_time(arr) 
{
    var hours = Math.floor(arr / 3600);
    var minutes = Math.floor((arr % 3600) / 60);
    var seconds = arr % 60;
    return hours.toString().padStart(2, '0') + ':' + minutes.toString().padStart(2, '0') + ':' + seconds.toString().padStart(2, '0');
}