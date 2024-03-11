<style>
        .unread-email {
            font-weight: bold; /* Make unread emails bold */
        }

        .profile-list-item:hover {
            background-color: #f0f0f0;
            border-radius: 5px;
        }

    </style>

<div class="menu-bar">
    <ul class="menu-items">
        <li class="compose mb-3">
            <a href="{{ route('emails.create') }}" class="btn btn-primary btn-block">Compose</a>
        </li>
        <li class="{{ request()->is('emails/inbox') ? 'active' : '' }}">
            <a href="{{ route('emails.index') }}">
                <i class="fa fa-inbox"></i> All Inbox
            </a>
            @if($inboxCount > 0)
                <span class="badge badge-pill badge-info">{{ $inboxCount }}</span>
            @endif
        </li>

        <li class="{{ request()->is('emails/unread') ? 'active' : '' }}">
            <a href="{{ route('emails.unread') }}">
                <i class="fa fa-envelope"></i> Unread Mails
            </a>
            @if($unreadCount > 0)
                <span class="badge badge-pill badge-danger">{{ $unreadCount }}</span>
            @endif
        </li>

        <li class="{{ request()->is('emails/read') ? 'active' : '' }}">
            <a href="{{ route('emails.read') }}">
                <i class="fa fa-envelope-open"></i> Read Mails
            </a>
            @if($readCount > 0)
                <span class="badge badge-pill badge-success">{{ $readCount }}</span>
            @endif
        </li>

        <li class="{{ request()->is('emails/sent') ? 'active' : '' }}">
            <a href="{{ route('emails.sent') }}">
                <i class="fa fa-share"></i> Sent Mails
            </a>
            @if($sentCount > 0)
                <span class="badge badge-pill badge-warning">{{ $sentCount }}</span>
            @endif
        </li>

    </ul>
    <br>
    <br>
 
    <div class="wrapper">
    <div class="border-bottom">
            <div class="form-group">
                <input class="form-control" style="margin-top: -10px; margin-bottom: -15px;" type="search" placeholder="Search User" id="Mail-search" onkeyup="searchUser()">
            </div>
    </div>
    </div>
    <div class="profile-list-container" style="max-height: 700px; overflow-y: auto;">
    <ul class="profile-list" id="userList">
        @foreach($users as $user)
        <li class="profile-list-item">
            <a href="{{ route('emails.create', ['rcpt_email' => $user->email]) }}">
                <div class="user-photo-container">
                    @if ($user->photo)
                        <img src="{{ asset('images/photos/' . $user->photo) }}" alt="Profile Photo" class="shadow-sm rounded-circle" style="width: 35px; height: 35px; object-fit: cover;">
                    @else
                        <img src="{{ asset('images/avatars/null-user.jpg') }}" alt="Default Photo" class="shadow-sm rounded-circle" style="width: 35px; height: 35px; object-fit: cover;">
                    @endif
                </div>
            
                <div class="user">
                    <p class="u-name">{{ $user->name }}</p>
                    <p class="u-designation">{{ $user->email }}</p>
                </div>
            </a>
        </li>
        @endforeach
    </ul>
</div>

</div>

<script>
    function searchUser() {
        var input, filter, ul, li, a, i, txtValue;
        input = document.getElementById('Mail-search');
        filter = input.value.toUpperCase();
        ul = document.getElementById('userList');
        li = ul.getElementsByTagName('li');

        for (i = 0; i < li.length; i++) {
            a = li[i].getElementsByTagName('a')[0];
            txtValue = a.textContent || a.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                li[i].style.display = '';
            } else {
                li[i].style.display = 'none';
            }
        }
    }
</script>
