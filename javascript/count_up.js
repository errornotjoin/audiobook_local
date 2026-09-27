var  timeout = ""
var doc = document.getElementById("found_results");
var i = 1;
function countUp(total)
{
    if(i <= total)
    {
        doc.innerHTML = "<h2>" + i + "</h2>";
        console.log(i);
        i  = i + 1;
    }
}