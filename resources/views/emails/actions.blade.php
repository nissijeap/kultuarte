<style>
        .unread-email {
            font-weight: bold; /* Make unread emails bold */
        }

        .mail-list:hover {
            background-color: #f0f0f0;
            border-radius: 5px;
        }

    </style>

<div class="row align-items-center">

<div class="col-md-9">
    <input class="form-control" type="search" placeholder="Search Mail" id="Mail-search" onkeyup="searchMail()">
</div>

<div class="btn-toolbar p-3 col-3 align-items-center" role="toolbar">
  <div class="btn-group me-2 mb-2 mb-sm-0">
      <input type="checkbox" id="select-all" class="checkbox-select-all" title="Select All" style="width: 20px; height: 20px;">
      <label for="select-all" class="toggle"></label>
  </div>
  <div class="btn-group me-2 mb-2 mb-sm-0">
      <button type="button" class="btn btn-primary waves-light waves-effect refresh" title="Refresh"><i class="fas fa-sync-alt"></i></button>
  </div>
  <div class="btn-group me-2 mb-2 mb-sm-0">
      <button type="button" class="btn btn-primary waves-light waves-effect delete-selected" data-bs-toggle="modal" data-bs-target="#deleteModal" title="Delete Selected"><i class="far fa-trash-alt"></i></button>
  </div>
  <div class="btn-group me-2 mb-2 mb-sm-0">
      <button type="button" class="btn btn-primary waves-light waves-effect mark-as-read" title="Mark as Read"><i class="fa fa-envelope-open"></i></button>
  </div>
  <div class="btn-group me-2 mb-2 mb-sm-0">
      <button type="button" class="btn btn-primary waves-light waves-effect mark-as-unread" title="Mark as Unread"><i class="fa fa-envelope"></i></button>
  </div>

</div>
</div>

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
