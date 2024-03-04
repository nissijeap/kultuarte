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

$('div.modal').on('shown.bs.modal', function () {
    var id = $(this).attr('data-post-id');
    console.log(id);
    $("#updateButton-"+id).on("click", function () {
        updatePost(id);
    });

    $("#photoUp-"+id).on("click", function () {
        dropzoneUp(id);
    });

    $("#exit-"+id).on("click", function () {
        dropzoneDown(id);
    });
});

function dropzoneUp(id) {
    $(".dropzone-"+id).show();
    $("#exit-"+id).show();

    $(".image-container").hover(
        function() {
            // Mouse over
            $(this).css('opacity', 0.5);
            $(this).find(".delete-icon").show().css('opacity', 1);
        },
        function() {
            // Mouse out
            $(this).css('opacity', 1); // Resetting opacity to 1 when mouse is out
            $(this).find(".delete-icon").hide();
        }
    );
}

function dropzoneDown(id) {
    $(".dropzone-"+id).hide();
    $("#exit-"+id).hide();
}

function updatePost(id) {
    var content = document.getElementById('content-'+id).value;
    console.log('id' + id + 'content-' + content.length);

    const dropzoneForm = Dropzone.forElement(".dropzone-"+id);
    dropzoneForm.processQueue();

    var formData = new FormData(dropzoneForm.element);

    dropzoneForm.files.forEach(function (file) {
        formData.append('files[]', file);
    });

    formData.append('content', content);
    formData.append('id', id);

    if (content.length <= 500) {
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
            url: update,
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                // Handle success
                console.log('Updated successfully');
                Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "Updated Successfully",
                    showConfirmButton: false,
                    timer: 1500,
                }).then(() => {
                    location.reload();
                });
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

function deletePhoto() {
        var id = document.getElementById('deleteButton').getAttribute('data-image-id');
        console.log(id);

    $.ajax({
        method: 'POST',
        url: destroyImg,
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            id: id,
        },
        success: function (response) {
            // Handle success
            console.log('Deleted successfully');
            $('.image-container').remove();
        },
        error: function (error) {
            // Handle error
            console.error('Error deleting:', error);
        }
    });
}
