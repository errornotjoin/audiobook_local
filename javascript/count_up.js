
var doc = document.getElementById("found_results");
var total = document.getElementById("total");
var i = 1;
function countUp()
{
    if(i <= total.innerHTML)
    {
        doc.innerHTML = "<h2>" + i + "</h2>";
        console.log(i);
        i  = i + 1;
    }
}