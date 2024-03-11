
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<div class="btn-toolbar">
    
<div class="btn-group">   
        <button type="button" class="btn btn-sm btn-outline-secondary btn-icon-text" onclick="goBack()">
            <i class="fa fa-arrow-left text-primary btn-icon-prepend"></i> Back
        </button>
    </div>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>

    <div class="btn-group" style="padding-left:30px; padding-right:20px;" >
        <a  href="{{ route('emails.create', ['rcpt_email' => $email->send_email]) }}" class="btn btn-sm btn-outline-secondary btn-icon-text">
            <i class="fas fa-reply text-primary btn-icon-prepend"></i> Reply
        </a>

        <a href="{{ route('emails.create', ['message' => $email->message, 'subject' => $email->subject]) }}" class="btn btn-sm btn-outline-secondary btn-icon-text">
            <i class="fa fa-share text-primary btn-icon-prepend"></i> Forward
        </a>


    </div>

    <form id="delete-form-{{ $email->id }}" action="{{ route('emails.destroy', $email->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <div class="btn-group">
            <button type="submit" class="btn btn-sm btn-outline-secondary btn-icon-text delete-btn" title="Delete" data-id="{{ $email->id }}">
                <i class="fas fa-trash text-primary btn-icon-prepend"></i>Delete
            </button>
        </div>
    </form>

</div>

<script>
    // Add a click event listener to all delete buttons
    document.querySelectorAll('.delete-btn').forEach(item => {
        item.addEventListener('click', function() {
            // Extract the data-id attribute
            const permissionId = this.getAttribute('data-id');

            // Show SweetAlert confirmation dialog
            Swal.fire({
                title: 'Are you sure?',
                text: 'You will not be able to recover this permission!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    // If user confirms, submit the form
                    document.getElementById('delete-form-' + permissionId).submit();
                }
            });
        });
    });
</script>