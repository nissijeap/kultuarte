function photoUp() {
    $("#dropzone").show();
    $("#exit").show();
}

function photoDown() {
    $("#dropzone").hide();
    $("#exit").hide();
}

document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('content').addEventListener('input', updateShareButtonState);
});

function updateShareButtonState() {
    console.log('update');
    var content = document.getElementById('content').value.trim();
    contentLength = content.length;
    var dropzoneFiles = Dropzone.forElement("#dropzone").getAcceptedFiles().length;
    console.log(dropzoneFiles);

    var shareButton = document.getElementById('shareButton');
    shareButton.disabled = contentLength <= 500 && dropzoneFiles === 0;

    // Check if the RdeleteReply is disabled
    if (shareButton.disabled) {
        shareButton.style.backgroundColor = 'rgba(239, 239, 239, 0.3)';
        shareButton.style.color = 'rgba(16, 16, 16, 0.3)';
    } else {
        shareButton.style.backgroundColor = '#e15600';
        shareButton.style.color = 'white';
    }

}

document.addEventListener('DOMContentLoaded', function () {
    var commentTextAreas = document.querySelectorAll('.comment-textarea');
    commentTextAreas.forEach(function (commentTextAreas) {
        commentTextAreas.addEventListener('input', updateCommentButtonState);
    });
});

function updateCommentButtonState() {
    var comment = this.value.trim();
    var postId = this.dataset.postId;
    console.log(comment, postId);

    var sendButton = document.getElementById('send-' + postId);
    sendButton.disabled = comment === "";

    // Check if the button is disabled
    if (sendButton.disabled) {
        sendButton.style.color = 'rgba(16, 16, 16, 0.3)';
    } else {
        sendButton.style.color = '#e15600';
    }
}

document.addEventListener('DOMContentLoaded', function () {
    var textareas = document.querySelectorAll('.auto-resize-textarea');
    textareas.forEach(function (textarea) {
        textarea.addEventListener('input', updateReplyButtonState);
    });
});

function updateReplyButtonState() {
    var comment = this.value.trim();
    var commentId = this.dataset.commentId;
    console.log(comment, commentId);

    var sendButton = document.getElementById('send-' + commentId);
    sendButton.disabled = comment === "";

    // Check if the button is disabled
    if (sendButton.disabled) {
        sendButton.style.color = 'rgba(16, 16, 16, 0.3)';
    } else {
        sendButton.style.color = '#e15600';
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
        this.on("addedfile", function (file) {
            setTimeout(function () {
                updateShareButtonState();
            }, 100); // Adjust the delay as needed
        });
        this.on("removedfile", function () {
            setTimeout(function () {
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
                    iconColor: '#fcc309',
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
                    iconColor: '#e15600',
                });
            }
        });
    }
}

$('div.modal').on('shown.bs.modal', function () {
    var id = $(this).attr('data-post-id');
    console.log(id);
    var media = $(this).find('.deleteButton');
    var mediaId = media.attr('data-image-id');
    console.log(mediaId);

    $("#updateButton-" + id).on("click", function () {
        updatePost(id);
    });

    $("#photoUp-" + id).on("click", function () {
        dropzoneUp(id);
    });

    $("#exit-" + id).on("click", function () {
        dropzoneDown(id);
    });
});

function dropzoneUp(id) {
    $(".dropzone-" + id).show();
    $("#exit-" + id).show();

    $(".image-container").hover(
        function () {
            // Mouse over
            $(this).css('opacity', 0.5);
            $(this).find(".delete-icon").show().css('opacity', 1);
        },
        function () {
            // Mouse out
            $(this).css('opacity', 1); // Resetting opacity to 1 when mouse is out
            $(this).find(".delete-icon").hide();
        }
    );
}

function dropzoneDown(id) {
    $(".dropzone-" + id).hide();
    $("#exit-" + id).hide();
}

function updatePost(id) {
    var content = document.getElementById('content-' + id).value;
    console.log('id' + id + 'content-' + content.length);

    const dropzoneForm = Dropzone.forElement(".dropzone-" + id);
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
                    iconColor: '#fcc309',
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
                    iconColor: '#e15600',
                });
            }
        });
    }
}
document.querySelectorAll('.deleteButton').forEach(function (deleteButton) {
    deleteButton.addEventListener('click', function () {
        var id = deleteButton.getAttribute('data-image-id');
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
                $('#image-container-' + id).remove();
            },
            error: function (error) {
                // Handle error
                console.error('Error deleting:', error);
            }
        });
    });
});

document.querySelectorAll('.send').forEach(function (send) {
    send.addEventListener('click', function () {
        if (send.disabled) {
            return;
        }
        var post_id = send.getAttribute('data-post-id');
        var comment = document.getElementById('commentContent-' + post_id).value;
        console.log(post_id, comment);

        $.ajax({
            method: 'POST',
            url: commentRoute,
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                post_id: post_id,
                comment: comment
            },
            success: function (response) {
                // Handle success
                console.log('Commented successfully');
                var commentData = response.commentData;
                document.getElementById("userComments-" + post_id).style.display = 'block';
                document.getElementById('commentContent-' + post_id).value = '';
                var count = $('#commentCount-' + post_id).text();
                count = parseInt(count) + 1;
                $('#commentCount-' + post_id).text(count);
                var newComment = `<div class="row" id="delComment-{{ $comment->id }}">
                <div class="d-flex flex-start" id="userReplies-{{ $comment->id }}">
                    <figure class="avatar me-3"><img src="${assetBaseUrl}assets/images/user-7.png" alt="image" class="shadow-sm rounded-circle w45"></figure>
                    <div class="flex-grow-1 flex-shrink-1">
                        <div>
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="fw-700 text-grey-900 font-xssss mt-1">${commentData.user_name} &#xb7 <span class="font-xsssss fw-500 mt-1 lh-3 text-grey-500">${commentData.created_at}</span></h4>

                                <a href="#!" class="d-flex align-items-center justify-content-center reply" style="color: #e15600 !important;" data-comment-id="{{ $comment->id }}" id="reply-{{ $comment->id }}"><span class="material-symbols-outlined">reply</span>reply</a>
                            </div>
                            <p class="small mb-0" id="editComment-{{ $comment->id }}">
                                ${commentData.comment_text}
                            </p>
                            <span class="material-symbols-outlined font-xssss">thumb_up</span> &#xb7
                            <a href="#" class="font-xssss editComment" style="color: #e15600 !important;" data-comment-id="{{ $comment->id }}" data-comment-content="{{ $comment->comment }}">Edit</a> &#xb7
                            <a href="#" class="font-xssss deleteComment" style="color: #e15600 !important;" data-comment-id="{{ $comment->id }}">Delete</a>
                        </div>
                    </div>
                </div>
            </div>`;

                $('#userComments-' + post_id).append(newComment);
                send.disabled = true;
                send.style.color = 'rgb(167, 164, 164)';
            },
            error: function (error) {
                // Handle error
                console.error('Error commenting:', error);
            }
        });
    });
});

document.querySelectorAll('.sendReply').forEach(function (send) {
    send.addEventListener('click', function () {

        if (send.disabled) {
            return;
        }

        var comment_id = send.getAttribute('data-comment-id');
        var post_id = send.getAttribute('data-post-id');
        var reply = document.getElementById('commentReply-' + comment_id).value;
        console.log(post_id, reply, comment_id);

        $.ajax({
            method: 'POST',
            url: commentRoute,
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                post_id: post_id,
                comment: reply,
                comment_id: comment_id
            },
            success: function (response) {
                // Handle success
                console.log('Replied successfully');
                var commentData = response.commentData;
                document.getElementById('commentReply-' + comment_id).value = '';
                var count = $('#commentCount-' + post_id).text();
                count = parseInt(count) + 1;
                $('#commentCount-' + post_id).text(count);
                var newComment = `<div class="d-flex flex-start mt-1">
                                    <figure class="avatar me-3"><img src="${assetBaseUrl}assets/images/user-7.png" alt="image" class="shadow-sm rounded-circle w45"></figure>
                                    <div class="flex-grow-1 flex-shrink-1">
                                        <div>
                                        <div class="d-flex justify-content-between align-items-center">
                                        <h4 class="fw-700 text-grey-900 font-xssss mt-1">${commentData.user_name} &#xb7 <span class="font-xsssss fw-500 mt-1 lh-3 text-grey-500">${commentData.created_at}</span></h4>
                                        
                                        </div>
                                        <p class="small mb-0">
                                        ${commentData.comment_text}
                                        </p>
                                        </div>
                                    </div>
                                </div>`;
                $('#userReplies-' + comment_id).append(newComment);
                send.disabled = true;
                send.style.color = 'rgb(167, 164, 164)';
            },
            error: function (error) {
                // Handle error
                console.error('Error commenting:', error);
            }
        });
    });
});

document.querySelectorAll('.deleteComment').forEach(function (deleteComment) {
    deleteComment.addEventListener('click', function () {
        var id = deleteComment.getAttribute('data-comment-id');
        var post_id = deleteComment.getAttribute('data-post-id');
        console.log(id, post_id);

        $.ajax({
            method: 'POST',
            url: delComment,
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                id: id,
            },
            success: function (response) {
                // Handle success
                console.log('Deleted successfully');
                $('#delComment-' + id).remove();
                var count = $('#commentCount-' + post_id).text();
                console.log('#delComment-' + post_id, '#commentCount-' + post_id);
                count = parseInt(count) - 1;
                
                $('#commentCount-' + post_id).text(count);
            },
            error: function (error) {
                // Handle error
                console.error('Error deleting:', error);
            }
        });
    });
});

document.querySelectorAll('.editComment').forEach(function (editComment) {
    editComment.addEventListener('click', function () {
        var comment_id = editComment.getAttribute('data-comment-id');
        var comment_content = editComment.getAttribute('data-comment-content');
        console.log(comment_id, comment_content);

        $('#editComment-' + comment_id).html('<textarea class="auto-resize-textarea rounded-xl theme-dark-bg bg-grey font-xssss fw-500 border-0 lh-5 pt-2 pb-2 ps-3 pe-3" rows="1" id="content-' + comment_id + '" data-comment-id="' + comment_id + '">' + comment_content + '</textarea> <button type="button" style="border: none; background: none;" id="cancel-' + comment_id + '"><span class="material-symbols-outlined">cancel</span></button> <button type="button" style="border: none; background: none; color:#e15600;" id="send-' + comment_id + '"><span class="material-symbols-outlined">send</span></button>');

        $('#send-' + comment_id).on('click', function () {
            saveChanges(comment_id);
        });

        $('#cancel-' + comment_id).on('click', function () {
            // Cancel editing
            $('#editComment-' + comment_id).text(comment_content);
        });

        var commentTextarea = document.getElementById('content-' + comment_id);
        commentTextarea.addEventListener('input', updateEditButtonState.bind(null, comment_id));
    });
});

function updateEditButtonState(comment_id) {
    var commentTextarea = document.getElementById('content-' + comment_id);
    var sendButton = document.getElementById('send-' + comment_id);
    sendButton.disabled = commentTextarea.value.trim() === "";

    // Check if the button is disabled
    if (sendButton.disabled) {
        sendButton.style.color = 'rgb(167, 164, 164)';
    } else {
        sendButton.style.color = '#e15600';
    }
}

function saveChanges(comment_id) {
    // Collect the updated values and send them to the server using AJAX
    var comment = $('#content-' + comment_id).val();
    console.log(comment, comment_id);

    $.ajax({
        method: 'POST',
        url: editComment,
        data: {
            id: comment_id,
            comment: comment,
            _token: $('meta[name="csrf-token"]').attr('content'),
        },
        success: function (response) {
            // Handle success
            console.log('Comment updated successfully');
            // Hide the Save and Cancel buttons
            $('#editComment-' + comment_id).text(comment);
        },
        error: function (error) {
            // Handle error
            console.error('Error updating comment:', error);
        }
    });
}

