function photoUp() {
    $("#dropzone").show();
    $("#exit").show();
}

function photoDown() {
    $("#dropzone").hide();
    $("#exit").hide();
}

document.addEventListener('DOMContentLoaded', function () {
    // Add event listeners for the textarea and dropzone
    document.getElementById('content').addEventListener('input', updateShareButtonState);
});

// Function to update the state of the SHARE button
function updateShareButtonState() {
    console.log('update');
    var content = document.getElementById('content').value.trim();
    contentLength = content.length;
    var dropzoneFiles = Dropzone.forElement("#dropzone").getAcceptedFiles().length;
    console.log(dropzoneFiles);

    var shareButton = document.getElementById('shareButton');
    shareButton.disabled = contentLength <= 500 && dropzoneFiles === 0;

    // Check if the button is disabled
    if (shareButton.disabled) {
        shareButton.style.backgroundColor = 'rgb(167, 164, 164)';  
        shareButton.style.color = 'rgb(114, 114, 114)';     
    } else {
        shareButton.style.backgroundColor = '#ffdb57';  
        shareButton.style.color = 'black';              
    }

}

Dropzone.options.dropzone = {
    autoProcessQueue: false,
    maxFilesize: 500,
    renameFile: function (file) {
        var dt = new Date();
        var time = dt.getTime();
        return time + file.name;
    },
    acceptedFiles: ".jpeg,.jpg,.png,.gif,.mp4,",
    addRemoveLinks: true,
    init: function () {
        console.log("Dropzone initialized");
        console.log(Dropzone.forElement("#dropzone").getAcceptedFiles().length); // Check the type of updateShareButtonState
        this.on("addedfile", function(file) {
            setTimeout(function() {
                updateShareButtonState();
            }, 100); // Adjust the delay as needed
        });
        this.on("removedfile", function() {
            setTimeout(function() {
                updateShareButtonState();
            }, 100); // Adjust the delay as needed
        });
        //this.on("queuecomplete", updateShareButtonState);
    },
    success: function (file, response) {
        Dropzone.reset();
        console.log(response);
    },
    error: function (file, response) {
        return false;
    }
};

function storePost() {
    var content = document.getElementById('content').value;
    console.log(content.length);

    const dropzoneForm = Dropzone.forElement("#dropzone");
    dropzoneForm.processQueue();

    var formData = new FormData(dropzoneForm.element);

    dropzoneForm.files.forEach(function (file) {
        formData.append('files[]', file);
    });

    formData.append('content', content);

    if(content.length <= 500){
        Swal.fire({
            position: "center",
            icon: "error",
            title: "That did not work, please add a longer caption",
            showConfirmButton: false,
            timer: 1500,
        });
    } else {
    $.ajax({
        method: 'POST',
        url: store,
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            // Handle success
            console.log('Posted successfully');
            Swal.fire({
                position: "center",
                icon: "success",
                title: "Posted Successfully",
                showConfirmButton: false,
                timer: 1500,
            });
            $('textarea').val('');
            var dropzone = Dropzone.forElement("#dropzone");
            dropzone.removeAllFiles();
            updateShareButtonState();
        },
        error: function (error) {
            // Handle error
            console.error('Error posting:', error);
            Swal.fire({
                position: "center",
                icon: "error",
                title: "That did not work, please add a caption",
                showConfirmButton: false,
                timer: 1500,
            });
        }
    });
}
}

