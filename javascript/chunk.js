var fileAudio = document.getElementById('file_audio');
fileAudio.addEventListener('change', async function(event) 
{
    //set main items
    var file = event.target.files[0];
    var file_size = file.size;
    //calculate total chunks based on 1MB size
    var chunk_mb = Number(20); // 20MB chunks
    //convert chunk size from MB to bytes
    var the_kb = 1024 * 1024;
    if(file_size > 20 * the_kb) // if file size is greater than 20MB
    {
        var chunk_mb = (file_size / the_kb ) / 10;
    }
    else
    {
        var chunk_mb = Number(20); 
    }

    var chunks_size = parseInt(chunk_mb) * the_kb; 
    var total_chunks = Math.ceil(file_size / chunks_size);
    //generate unique identifier for the file
    var random = crypto.randomUUID();
    //store total file size
    var total_file_size = file.size;    


    if(file == false || total_file_size == 0)
    {
        return;
    }
    else
        {
             for(var chunk_index = 0; chunk_index < total_chunks; chunk_index++)
             {
                //calculate start and end positions for the current chunk
                var start = chunk_index * chunks_size;
                //calculate end position for the current chunk
                var end = Math.min(start + chunks_size, total_file_size);
                //extract the current chunk from the file
                var chunk = file.slice(start, end);
                //log the current chunk information
                console.log('Chunk ' + (chunk_index + 1) + ' of ' + total_chunks + ':', chunk);
                //getting the file ready to be sent to the server
                var newdate = new FormData();
                newdate.append('chunk', chunk);
                newdate.append('chunk_index', chunk_index);
                newdate.append('total_chunks', total_chunks);
                newdate.append('file_id', random);
                //send it to the serverside to be reassembled into the complete file
                //var send_to_be_reassble = await fetch('your_upload_endpoint', {
                //    method: 'POST',
                //    body: newdate
                //});
                //var response = await send_to_be_reassble.json();
                //console.log('Server response for chunk ' + (chunk_index + 1) + ':', response);
                //if(response.success)
                //{
                //    console.log('Chunk ' + (chunk_index + 1) + ' uploaded successfully.');
                //}
                //else
                //{
                //    console.error('Failed to upload chunk ' + (chunk_index + 1) + '.');
                //}

             }
        }
    
});