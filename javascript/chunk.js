var fileAudio = document.getElementById('file_audio');

fileAudio.addEventListener('change', async function(event) 
{
    loading()
    document.getElementById('disable_this').setAttribute('disabled', 'true');
    var allow_files_type = ['audio/x-m4a', 'audio/mp4', 'audio/mp3'];
    var check_chunk_size = [];
    var file = event.target.files[0];
    var file_size = file.size;
    if(file == false || file_size == 0)
    {
        return;
    }
    else if(!allow_files_type.includes(file.type))
    {
        return ;
    }

    var chunk_mb = 0; 
    var the_kb = 1024 * 1024;
    //changing this as your server might have diffrent limiteds 
    var server_max_upload_size = 300 * the_kb;
    var server_min_upload_size = 20 * the_kb;

    if(file_size > chunk_mb * the_kb) 
    {
        var chunk_mb = server_max_upload_size / the_kb;
    }
    else
    {
        var chunk_mb = server_min_upload_size / the_kb; 
    }
    //turn into mb
    var chunks_size = parseInt(chunk_mb) * the_kb;
    //getting how many chunks there going to be  
    var total_chunks = Math.ceil(file_size / chunks_size);
    //create a ID for the chunks 
    var random = crypto.randomUUID();
    //store total file size
    for(var chunk_index = 0; chunk_index < total_chunks; chunk_index++)
    {
        //calculate start and end positions for the current chunk
        var start = chunk_index * chunks_size;
        //calculate end position for the current chunk
        var end = Math.min(start + chunks_size, file_size);
        //extract the current chunk from the file
        var chunk = file.slice(start, end);
        //log the current chunk information
        console.log('Chunk ' + (chunk_index + 1) + ' of ' + total_chunks + ':', chunk);
        //getting the file ready to be sent to the server
        check_chunk_size.push(chunk.size);
        sessionStorage.setItem('total_chunks', total_chunks);
        var newdate = new FormData();
        newdate.append('chunk', chunk);
        newdate.append('chunk_index', chunk_index);
        newdate.append('total_chunks', total_chunks);
        newdate.append('file_id', random);
        //send it to the serverside to be reassembled into the complete file
        var send_to_be_reassble = await fetch('serverside/assble_audio_files.php', {
            method: 'POST',
            body: newdate
        });
        var response = await send_to_be_reassble.json();
        console.log('Server response for chunk ' + (chunk_index + 1) + ':', response);
        if(response.success)
        {
            console.log('Chunk ' + (chunk_index + 1) + ' uploaded successfully.');
            if(chunk_index  === total_chunks - 1) {
                document.getElementById('disable_this').removeAttribute('disabled');
            }
        }
        else
        {
            console.error('Failed to upload chunk ' + (chunk_index + 1) + '.');
        }
    }
   
        
    
});