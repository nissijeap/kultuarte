document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.see-more').forEach(function (seeMoreLink) {
        seeMoreLink.addEventListener('click', function (event) {
            event.preventDefault();
            var postId = this.getAttribute('data-post-id');
            document.getElementById('post' + postId).querySelector('.truncated-content').style.display = 'none';
            document.getElementById('post' + postId).querySelector('.full-content').style.display = 'block';
        });
    });

    document.querySelectorAll('.see-less').forEach(function (seeLessLink) {
        seeLessLink.addEventListener('click', function (event) {
            event.preventDefault();
            var postId = this.getAttribute('data-post-id');
            document.getElementById('post' + postId).querySelector('.full-content').style.display = 'none';
            document.getElementById('post' + postId).querySelector('.truncated-content').style.display = 'block';
        });
    });
});

document.querySelectorAll('.saved').forEach(function (saved) {
    saved.addEventListener('click', function () {
        var post_id = this.getAttribute('data-post-id');
        $.ajax({
            method: 'POST',
            url: save,
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                post_id: post_id,
                user_id: user_id
            },
            success: function (response) {
                // Handle success
                console.log('success');

                // likeIcon.classList.remove("like", "text-red");
                // likeIcon.classList.add("unlike", "bg-red-gradiant", "text-white");
            },
            error: function (error) {
                // Handle error
                console.error('Error liking post:', error);
            }
        });
    });
});

document.querySelectorAll('.saveParent').forEach(function(saveParent) {
    var saveIcon = saveParent.querySelector('.save, .unsave');
    var post_id = saveIcon.getAttribute('data-post-id');

    saveIcon.addEventListener('click', function () {
        console.log("post: " + post_id);

        console.log("user: " + user_id);

        if (saveIcon.classList.contains("save")) {
            console.log("saved");
            $.ajax({
                method: 'POST',
                url: save,
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    post_id: post_id,
                    user_id: user_id
                },
                success: function (response) {
                    // Handle success
                    console.log('success');
                    $('span#bookmark-'+post_id).text('bookmark_remove');
                    $('h4#save-'+post_id).text('Unsave Post');
                    $('h4#save-'+post_id).find('span').text('Remove this from your saved items');
                    saveIcon.classList.remove("save");
                    saveIcon.classList.add("unsave");
                },
                error: function (error) {
                    // Handle error
                    console.error('Error liking post:', error);
                }
            });
        } else {
            console.log("unsaved");
            $.ajax({
                method: 'POST',
                url: unsave,
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    post_id: post_id,
                    user_id: user_id
                },
                success: function (response) {
                    // Handle success
                    console.log('success');
                    $('span#bookmark-'+post_id).text('bookmark_add');
                    $('h4#unsave-'+post_id).text('Save Post');
                    $('h4#unsave-'+post_id).find('span').text('Add this to your saved items');
                    saveIcon.classList.remove("unsave");
                    saveIcon.classList.add("save");
                },
                error: function (error) {
                    // Handle error
                    console.error('Error liking post:', error);
                }
            });
        }
    });
    
});

document.querySelectorAll('.likeParent').forEach(function(likeParent) {
    var likeIcon = likeParent.querySelector('.like, .unlike');
    var post_id = likeIcon.getAttribute('data-post-id');

    likeIcon.addEventListener('click', function () {
        console.log("post: " + post_id);

        console.log("user: " + user_id);

        if (likeIcon.classList.contains("like")) {
            $.ajax({
                method: 'POST',
                url: like,
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    post_id: post_id,
                    user_id: user_id
                },
                success: function (response) {
                    // Handle success
                    console.log('success');
                    var count = $('#count-'+post_id).text();
                    count = parseInt(count) + 1;
                    $('#count-'+post_id).text(count);
                    likeIcon.classList.remove("like", "text-red");
                    likeIcon.classList.add("unlike", "bg-red-gradiant", "text-white");
                },
                error: function (error) {
                    // Handle error
                    console.error('Error liking post:', error);
                }
            });
        } else {
            $.ajax({
                method: 'POST',
                url: unlike,
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    post_id: post_id,
                    user_id: user_id
                },
                success: function (response) {
                    // Handle success
                    console.log('success');
                    var count = $('#count-'+post_id).text();
                    count = parseInt(count) - 1;
                    $('#count-'+post_id).text(count);
                    likeIcon.classList.remove("unlike", "bg-red-gradiant", "text-white");
                    likeIcon.classList.add("like", "text-red");
                },
                error: function (error) {
                    // Handle error
                    console.error('Error liking post:', error);
                }
            });
        }
    });
    
});

