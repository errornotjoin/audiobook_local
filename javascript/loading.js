

function loading() {
      var form = document.getElementById('forms');
      var forLoading = document.getElementById('for_loading');
      var mulitLoading = document.querySelector('.muilt_loading');
      var fileAudio = document.getElementById('file_audio');
      var narrator = document.getElementById('narrator');
      // Check if the required fields are filled
      // i picked these as most of time all othjer been filled in 
      if(!fileAudio.value || !narrator.value){

            return false;
      }
      else{
            form.style.display = 'none';
            mulitLoading.style.display = 'flex';

            forLoading.style.display = 'block';
            forLoading.className = 'loading';
            forLoading.style.animation = 'spin 2s linear infinite';
      }
}