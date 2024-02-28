<div class="menu-bar">
    <ul class="menu-items">
    <li class="compose mb-3">
        <a href="{{ route('emails.create') }}" class="btn btn-primary btn-block">Compose</a>
    </li>

    <li class="active"><a href="#"><i class="fa fa-envelope-open"></i> Inbox</a><span class="badge badge-pill badge-success">8</span></li>
    <li><a href="#"><i class="fa fa-share"></i> Sent</a></li>
    <li><a href="#"><i class="fas fa-file"></i> Draft</a><span class="badge badge-pill badge-warning">4</span></li>
    <li><a href="#"><i class="fa fa-upload"></i> Outbox</a><span class="badge badge-pill badge-danger">3</span></li>
    <li><a href="#"><i class="fa fa-star"></i> Starred</a></li>
    <li><a href="#"><i class="fas fa-trash"></i> Trash</a></li>
    </ul>
    <div class="wrapper">
    <div class="online-status d-flex justify-content-between align-items-center">
    <p class="chat">Chats</p> <span class="status offline online"></span></div>
    </div>
    <ul class="profile-list">
    <li class="profile-list-item"> <a href="#"> <span class="pro-pic"><img src="<?php echo url('melody')?>/images/faces/face1.jpg" alt=""></span><div class="user"><p class="u-name">David</p><p class="u-designation">Python Developer</p></div> </a></li>
    <li class="profile-list-item"> <a href="#"> <span class="pro-pic"><img src="<?php echo url('melody')?>/images/faces/face2.jpg" alt=""></span><div class="user"><p class="u-name">Stella Johnson</p><p class="u-designation">SEO Expert</p></div> </a></li>
    </ul>
</div>