$(document).ready(function () {
    $('input[type="checkbox"]').on('change', function () {
        var checkboxId = $(this).attr('id');
        var formId = checkboxId + '-form';
        var tinyMCEEditor = tinymce.get(formId);
        if (tinyMCEEditor) {
            tinyMCEEditor.setContent("");
        }
        $('#' + formId).toggleClass('d-none', !this.checked);
    });
});

function storeBlog() {
    // Gather data from the form
    var title = $('#title').val();
    var categories = $('input[name="categories"]:checked').map(function () {
        return $(this).val();
    }).get();
    console.log('categories'+categories);
    var categoriesID = $('input[name="categories"]:checked').map(function () {
        return $(this).attr('id');
    }).get();    
    var ethnicity = $('input[name="ethnicity"]:checked').val();
    console.log('ethnicity'+ethnicity);
    var additionalInfoMap = {};

    for (var i = 0; i < categoriesID.length; i++) {
        var categoryID = categoriesID[i];
        var additionalInfo = $('#' + categoryID + '-form textarea').val();
        additionalInfoMap[categoryID] = additionalInfo;
    }
    
    var additionalInfoValues = Object.values(additionalInfoMap);

    if (title == "") {
        Swal.fire({
            position: "center",
            icon: "error",
            title: "That did not work, please provide a title",
            showConfirmButton: false,
            timer: 1500,
            iconColor: '#e15600',
        });
    } else if (categories == null || ethnicity == undefined){
        Swal.fire({
            position: "center",
            icon: "error",
            title: "That did not work, please choose category or ethnic group",
            showConfirmButton: false,
            timer: 1500,
            iconColor: '#e15600',
        });
    } else if (additionalInfoValues.some(function (additionalInfo) {
        return additionalInfo.trim().length <= 1000;
    })) {
        Swal.fire({
            position: "center",
            icon: "error",
            title: "Please provide more information, 1000 characters minimum.",
            showConfirmButton: false,
            timer: 1500,
            iconColor: '#e15600',
        });
        
    } else {
        $.ajax({
            type: 'POST',
            url: blogStore,
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                title: title,
                categories: categories,
                ethnicity: ethnicity,
                additionalInfoMap: additionalInfoMap
            },
            success: function (response) {
                console.log('Blog stored successfully:', response);
                Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "Posted Successfully",
                    showConfirmButton: false,
                    timer: 1500,
                    iconColor: '#fcc309',  
                });
                $('#title').val('');
                $('input[name="ethnicity"]').prop('checked', false);
                $('input[name="categories"]').prop('checked', false);
                for (var i = 0; i < categoriesID.length; i++) {
                    var categoryID = categoriesID[i];
                    $('#' + categoryID + '-form').addClass('d-none');
                }
            },
            error: function (error) {
                console.error('Error storing blog:', error);
            }
        });
    }
}

$(document).ready(function() {
    // Add a click event handler to the tab links
    $('.nav-link').on('click', function(e) {
      e.preventDefault();

      // Hide all tab content
      $('.tab-pane').removeClass('show active');

      // Show the corresponding tab content based on the clicked tab link
      var tabId = $(this).attr('href');
      $(tabId).addClass('show active');
    });
  });
