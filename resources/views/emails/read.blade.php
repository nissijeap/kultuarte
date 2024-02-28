<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.urbanui.com/melody/template/pages/apps/email.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Sep 2018 06:09:09 GMT -->
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Melody Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?php echo url('melody')?>/vendors/iconfonts/font-awesome/css/all.min.css">
  <link rel="stylesheet" href="<?php echo url('melody')?>/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="<?php echo url('melody')?>/vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo url('melody')?>/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?php echo url('melody')?>/images/favicon.png" />
</head>


<style>
        .unread-email {
            font-weight: bold; /* Make unread emails bold */
        }

        .mail-list:hover {
            background-color: #f0f0f0;
            border-radius: 5px;
        }

    </style>


<body class="sidebar-icon-only">
  <div class="container-scroller">
    @include('superadmin.layouts.navbar')
    <div class="container-fluid page-body-wrapper">

    @include('superadmin.layouts.settings')
    
    @include('superadmin.layouts.sidebar')


  <!-- main-panel -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="email-wrapper wrapper">
            <div class="row align-items-stretch">
              <div class="mail-sidebar d-none d-lg-block col-md-2 pt-3 bg-white">
              @include('emails.menu')
              </div>

              <div class="mail-list-container col-md-10 pt-4 pb-4 border-right bg-white">
                <div class="border-bottom pb-4 mb-3 px-3">
                   @include('emails.actions')

                </div>
                <div class="mail-list align-items-center">
                <div class="content align-items-center" >
                    @forelse($read as $email)
                        @php
                            $emailClass = $email->status ? '' : 'unread-email';
                        @endphp
                        <a href="{{ route('emails.show', ['id' => $email->id]) }}" class="email-link">
                          <div class="message row mb-3  align-items-center">
                            <div class="col-md-1 checkbox-wrapper-mail">
                                <input type="checkbox" id="chk{{ $email->id }}" class="checkbox-bulk" data-id="{{ $email->id }}" style="width: 20px; height: 20px;">
                                <label for="chk{{ $email->id }}" class="toggle"></label>
                            </div>
                            <div class="col-md-8">
                                <p class="sender-name">{{ $email->send_name }}</p>
                                <p class="message_text"><h7 style="font-style: italic;">Subject: </h7>{{ $email->subject }}</p>
                            </div>
                            <div class="col-md-3 text-right">
                                <p class="message_time text-muted">{{ $email->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                        </a>
                    @empty
                        <p class="message_text" style="text-align: center;">No emails received.</p>
                    @endforelse
                </div>
                </div>

            </div>


            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->

        @include('superadmin.layouts.footer')

        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="<?php echo url('melody')?>/vendors/js/vendor.bundle.base.js"></script>
  <script src="<?php echo url('melody')?>/vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="<?php echo url('melody')?>/js/off-canvas.js"></script>
  <script src="<?php echo url('melody')?>/js/hoverable-collapse.js"></script>
  <script src="<?php echo url('melody')?>/js/misc.js"></script>
  <script src="<?php echo url('melody')?>/js/settings.js"></script>
  <script src="<?php echo url('melody')?>/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->

    <!-- Bulk Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Bulk Delete Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete the selected emails?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger confirm-bulk-delete">Delete</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Bulk Delete Modal -->


<script>
    // Function to handle select all checkbox
    $('#select-all').on('change', function () {
        // Check/uncheck all checkboxes based on the select all checkbox state
        $('.checkbox-bulk').prop('checked', $(this).prop('checked'));
    });
</script>


<script>
    $('.confirm-bulk-delete').on('click', function () {
    var selectedIds = [];
    $('.checkbox-bulk:checked').each(function () {
        selectedIds.push($(this).data('id'));
    });
    if (selectedIds.length > 0) {
        // Send an AJAX request to the server to delete the selected emails
        $.ajax({
            url: '{{ route('emails.destroyInbox', ':id') }}', // Updated route
            type: 'DELETE',
            data: {ids: selectedIds},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Add CSRF token
            },
            success: function (response) {
                // Handle success response
                console.log(response.message);
                // Reload the page after successful deletion
                window.location.reload();
            },
            error: function (xhr, status, error) {
                // Handle error response
                console.error(xhr.responseText);
                // Optionally, display an error message to the user
            }
        });
    } else {
        alert('Please select emails to delete.');
    }
});
</script>


<script>
    $(document).ready(function () {
        // Function to handle marking emails as read
        $('.mark-as-read').on('click', function () {
            var selectedIds = getSelectedEmailIds();
            markEmails(selectedIds, '{{ route("emails.markAsRead") }}');
        });

        // Function to handle marking emails as unread
        $('.mark-as-unread').on('click', function () {
            var selectedIds = getSelectedEmailIds();
            markEmails(selectedIds, '{{ route("emails.markAsUnread") }}');
        });

        // Helper function to get selected email IDs
        function getSelectedEmailIds() {
            var selectedIds = [];
            $('.checkbox-bulk:checked').each(function () {
                selectedIds.push($(this).data('id'));
            });
            return selectedIds;
        }

        // Helper function to mark emails
        function markEmails(selectedIds, url) {
            if (selectedIds.length > 0) {
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {ids: selectedIds, _token: '{{ csrf_token() }}'},
                    success: function (response) {
                        console.log(response.message);
                        window.location.reload(); // Reload the page after successful operation
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                        // Handle error response
                    }
                });
            } else {
                alert('Please select emails to mark.');
            }
        }
    });
</script>

<script>
    // Function to handle refresh button click
    $('.refresh').on('click', function () {
        // Reload the current page
        window.location.reload();
    });
</script>


</body>


<!-- Mirrored from www.urbanui.com/melody/template/pages/apps/email.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Sep 2018 06:09:23 GMT -->
</html>
