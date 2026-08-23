function incress_the_inputs()
{
    var total_amount = Number(document.getElementById("Incress_the_inputs_to_this").value)
    var total_all_ready_there = document.getElementById("the_holder_of_the_timestamps").children.length

    var the_div_holder = document.getElementById("the_holder_of_the_timestamps")
    //console.log(total_all_ready_there, total_amount);
    
    for(var x = 0; x < total_amount; x++ )
    {
        var the_correct_order = total_all_ready_there +  x 
        var the_user_inputs = document.createElement("div")
        var Chapter_names = document.createElement("input")
        var Chapter_StartsAT = document.createElement("input")
        var chater_lastfor = document.createElement("input")

        the_user_inputs.className = "the_user_inputs"
        Chapter_names.name = "chater_lastfor"+the_correct_order
        Chapter_StartsAT.name = "timestamps_"+ the_correct_order
        chater_lastfor.name = "Chapters_lengths_"+the_correct_order
        
        Chapter_names.placeholder = "Chapters Name"

        Chapter_names.type = "text"
        Chapter_StartsAT.type = "time" 
        chater_lastfor.type = "time"
        
        the_div_holder.appendChild(the_user_inputs)
        the_user_inputs.appendChild(Chapter_names)
        the_user_inputs.appendChild(Chapter_StartsAT)
        the_user_inputs.appendChild(chater_lastfor)
        

        console.log(total_all_ready_there +  x );
    }
}