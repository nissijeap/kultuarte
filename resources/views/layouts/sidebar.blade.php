        <!-- navigation left -->
        <nav class="navigation bg-white" style="width:100px;">
            <div class="container ps-0 pe-0 bg-white">
                <div class="nav-content" style="width:100px;">
                    <!-- <div class="nav-wrap bg-white bg-transparent-card rounded-xxl shadow-xss pt-3 pb-1 mb-2 mt-2">
                        <div class="nav-caption fw-600 font-xssss text-grey-500"><span>New </span>Feeds</div>
                        <ul class="mb-1 top-content">
                            <li class="logo d-none d-xl-block d-lg-block"></li>
                            <li><a href="default.html" class="nav-content-bttn open-font" ><i class="feather-tv btn-round-md bg-blue-gradiant me-3"></i><span>Newsfeed</span></a></li>
                            <li><a href="default-badge.html" class="nav-content-bttn open-font" ><i class="feather-award btn-round-md bg-red-gradiant me-3"></i><span>Badges</span></a></li>
                            <li><a href="default-storie.html" class="nav-content-bttn open-font" ><i class="feather-globe btn-round-md bg-gold-gradiant me-3"></i><span>Explore Stories</span></a></li>
                            <li><a href="default-group.html" class="nav-content-bttn open-font" ><i class="feather-zap btn-round-md bg-mini-gradiant me-3"></i><span>Popular Groups</span></a></li>
                            <li><a href="user-page.html" class="nav-content-bttn open-font"><i class="feather-user btn-round-md bg-primary-gradiant me-3"></i><span>Author Profile </span></a></li>                        
                        </ul>
                    </div> -->

                        <ul class="mb-3">
                            <li><a href="{{ route('home') }}" class="nav-content-bttn open-font icons"><span class="font-xl text-current material-symbols-outlined">home</span></a></li>
                            <li><a href="default-hotel.html" class="nav-content-bttn open-font icons"><span class="font-xl text-current material-symbols-outlined">notifications</span></a></li>
                            <li><a href="default-event.html" class="nav-content-bttn open-font icons"><span class="font-xl text-current material-symbols-outlined">chat</span></a></li>
                            <li><a href="{{ route('postCreate') }}" class="nav-content-bttn open-font icons"><span class="font-xl text-current material-symbols-outlined">add_circle</span></a></li>
                            <li><a href="{{ route('arts') }}" class="nav-content-bttn open-font icons"><span class="font-xl text-current material-symbols-outlined">palette</span></a></li>
                            <li><a href="default-live-stream.html" class="nav-content-bttn open-font icons"><span class="font-xl text-current material-symbols-outlined">newsmode</span></a></li>
                            <li><a href="default-live-stream.html" class="nav-content-bttn open-font icons"><span class="font-xl text-current material-symbols-outlined">settings</span></a></li>
                            <li><a href="" class="nav-content-bttn open-font icons"><span class="font-xl text-current material-symbols-outlined" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">power_settings_new</span></a></li>
                            <li class="logo d-none d-xl-block d-lg-block"></li>
                        </ul>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                </div>
            </div>
        </nav>
        <!-- navigation left -->