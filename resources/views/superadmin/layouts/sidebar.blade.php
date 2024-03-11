<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
          <div class="nav-link">
            <div class="row align-items-center">
                <div class="col">
                    @auth
                        @if (Auth::user()->photo)
                            <div class="profile-image d-flex justify-content-center">
                                <img src="{{ asset('images/photos/' . Auth::user()->photo) }}" alt="Profile Photo" class="shadow-sm rounded-circle" style="width: 40px; height: 40px; object-fit: cover;">
                            </div>        
                        @else
                            <div class="profile-image d-flex justify-content-center">
                                <img src="{{ asset('images/avatars/null-user.jpg') }}" alt="Default Photo" class="shadow-sm rounded-circle" style="width: 40px; height: 40px; object-fit: cover;">
                            </div>
                        @endif
                    @endauth
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col text-center">
                    @php
                        $user = Auth::user();
                    @endphp
                    @if ($user)
                        <div class="profile-name">
                            <p class="name">
                                Welcome, {{ explode(' ', $user->name)[0] }}!
                            </p>
                            <p class="designation">
                            @forelse ($user->getRoleNames() as $role)
                            {{ $role }}
                            @empty
                              No role assigned.
                            @endforelse
                            </p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
          </li>



          <li class="nav-item">
              <a class="nav-link disabled-link" href="#" style="color:#e15600;">
                  <span class="menu-title" style="font-size: small; ">Menu</span> 
              </a>    
          </li>

          <li class="nav-item">
            <!-- @canany(['view-dashboard']) -->
            <a class="nav-link" href="/">
              <i class="fa fa-globe menu-icon"></i>
              <span class="menu-title">Explore Site</span> 
            </a>
            <!-- @endcanany     -->
          </li>

          <li class="nav-item">
            @canany(['view-dashboard'])
            <a class="nav-link" href="{{ route('superadmin.dashboard') }}">
              <i class="fa fa-home menu-icon"></i>
              <span class="menu-title">Dashboard</span> 
            </a>
            @endcanany    
          </li>

          <li class="nav-item">
            @canany(['view-notification', 'delete-notification'])
              <a class="nav-link" href="{{ route('notifications.index') }}">
                <i class="fas fa-bell menu-icon"></i>
                <span class="menu-title">Notifications</span> 
              </a>
            @endcanany
          </li>


          <li class="nav-item">
              <a class="nav-link disabled-link" href="#" style="color:#e15600;">
                  <span class="menu-title" style="font-size: small; ">Authorization</span> 
              </a>    
          </li>

          <li class="nav-item">
          @canany(['create-permission', 'edit-permission', 'delete-permission'])
            <a class="nav-link" href="{{ route('permissions.index') }}">
              <i class="fa fa-key menu-icon"></i>
              <span class="menu-title">Permissions</span> 
            </a>
            @endcanany
          </li>

          <li class="nav-item">
          @canany(['create-role', 'edit-role', 'delete-role'])
            <a class="nav-link" href="{{ route('roles.index') }}">
              <i class="fas fa-lock menu-icon"></i>
              <span class="menu-title">Roles</span> 
            </a>
            @endcanany
          </li>

          <li class="nav-item">
          @canany(['create-user', 'edit-user', 'delete-user'])
            <a class="nav-link" data-toggle="collapse" href="#users" aria-expanded="false" aria-controls="apps">
              <i class="fa fa-users menu-icon"></i>
              <span class="menu-title">Users</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="users">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('users.index') }}"> Manage </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('users.pending') }}"> Pending </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('users.approved') }}"> Approved </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('users.denied') }}"> Denied </a></li>
              </ul>`
            </div>
            @endcanany
          </li>

          <li class="nav-item">
              <a class="nav-link disabled-link" href="#" style="color:#e15600;">
                  <span class="menu-title" style="font-size: small; ">Engagement</span> 
              </a>    
          </li>


            <li class="nav-item">
          @canany(['create-category', 'edit-category', 'delete-category'])
            <a class="nav-link" href="{{ route('categories.index') }}">
              <i class="fa fa-th-large menu-icon"></i>
              <span class="menu-title">Categories</span> 
            </a>
            @endcanany
          </li>

            <li class="nav-item">
          @canany(['create-blog', 'edit-blog', 'delete-blog'])
            <a class="nav-link" href="{{ route('blogs.index') }}">
              <i class="fa fa-fire menu-icon"></i>
              <span class="menu-title">Culture</span> 
            </a>
            @endcanany
          </li>

          <li class="nav-item">
          @canany(['create-post', 'edit-post', 'delete-post'])
            <a class="nav-link" data-toggle="collapse" href="#arts" aria-expanded="false" aria-controls="apps">
              <i class="fa fa-paint-brush menu-icon"></i>
              <span class="menu-title">Arts</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="arts">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('posts.index') }}"> Manage </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('posts.artists') }}"> Artists </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('posts.exhibits') }}"> Exhibits </a></li>
                <li class="nav-item"> <a class="nav-link" href="#"> Gallery </a></li>
              </ul>`
            </div>
            @endcanany
          </li>

          <li class="nav-item">
          @canany(['view-gallery'])
            <a class="nav-link" href="{{ route('superadmin.gallery') }}">
              <i class="fa fa-file-image menu-icon"></i>
              <span class="menu-title">Gallery</span> 
            </a>
            @endcanany
          </li>



          <li class="nav-item">
              <a class="nav-link disabled-link" href="#" style="color:#e15600;">
                  <span class="menu-title" style="font-size: small; ">Communication</span> 
              </a>    
          </li>


          <li class="nav-item">
            @canany(['create-email', 'edit-email', 'delete-email'])
              <a class="nav-link" href="{{ route('emails.index') }}">
                <i class="fas fa-envelope menu-icon"></i>
                <span class="menu-title">Emails</span> 
              </a>
            @endcanany
          </li>

          <li class="nav-item">
            @canany(['create-chat', 'edit-chat', 'delete-chat'])
              <a class="nav-link" href="{{ route('chatify') }}">
                <i class="fas fa-comments menu-icon"></i>
                <span class="menu-title">Chats</span> 
              </a>
            @endcanany
          </li>

 
          <li class="nav-item">
              <a class="nav-link disabled-link" href="#" style="color:#e15600;">
                  <span class="menu-title" style="font-size: small; ">Transaction</span> 
              </a>    
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#payment" aria-expanded="false" aria-controls="apps">
                <i class="fas fa-money-bill-alt menu-icon"></i>
              <span class="menu-title">Payment</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="payment">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="#"> Manage </a></li>
                <li class="nav-item">
                    <a class="nav-link" href="https://m.gcash.com/gcash-login-web/index.html#/" target="_blank">GCash</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="https://payout.maya.ph/" target="_blank">Maya</a>
                </li>
              </ul>`
            </div>
          </li>


            <li class="nav-item">
            <!-- @canany(['create-event', 'edit-event', 'delete-event',]) -->
              <a class="nav-link" href="#">
                <i class="fa fa-briefcase menu-icon"></i>
                <span class="menu-title">Hiring</span> 
              </a>
            <!-- @endcanany -->
          </li>
 
          <li class="nav-item">
              <a class="nav-link disabled-link" href="#" style="color:#e15600;">
                  <span class="menu-title" style="font-size: small; ">Planning</span> 
              </a>    
          </li>

          <li class="nav-item">
            @canany(['create-event', 'edit-event', 'delete-event',])
              <a class="nav-link" href="{{ route('calendars.index') }}">
                <i class="fa fa-calendar menu-icon"></i>
                <span class="menu-title">Calendar</span> 
              </a>
            @endcanany
          </li>

          <li class="nav-item">
            @canany(['create-todo', 'edit-todo', 'delete-todo'])
              <a class="nav-link" href="{{ route('toDos.index') }}">
                <i class="fa fa-th-list menu-icon"></i>
                <span class="menu-title">ToDo List</span> 
              </a>
            @endcanany
          </li>

          <!-- <li class="nav-item">
            <a class="nav-link" href="<?php echo url('melody')?>/pages/widgets.html">
              <i class="fa fa-puzzle-piece menu-icon"></i>
              <span class="menu-title">Widgets</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#page-layouts" aria-expanded="false" aria-controls="page-layouts">
              <i class="fab fa-trello menu-icon"></i>
              <span class="menu-title">Page Layouts</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="page-layouts">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="<?php echo url('melody')?>/pages/layout/boxed-layout.html">Boxed</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo url('melody')?>/pages/layout/rtl-layout.html">RTL</a></li>
                <li class="nav-item d-none d-lg-block"> <a class="nav-link" href="<?php echo url('melody')?>/pages/layout/horizontal-menu.html">Horizontal Menu</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item d-none d-lg-block">
            <a class="nav-link" data-toggle="collapse" href="#sidebar-layouts" aria-expanded="false" aria-controls="sidebar-layouts">
              <i class="fas fa-columns menu-icon"></i>
              <span class="menu-title">Sidebar Layouts</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="sidebar-layouts">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?php echo url('melody')?>/pages/layout/compact-menu.html">Compact menu</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo url('melody')?>/pages/layout/sidebar-collapsed.html">Icon menu</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo url('melody')?>/pages/layout/sidebar-hidden.html">Sidebar Hidden</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo url('melody')?>/pages/layout/sidebar-hidden-overlay.html">Sidebar Overlay</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo url('melody')?>/pages/layout/sidebar-fixed.html">Sidebar Fixed</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="far fa-compass menu-icon"></i>
              <span class="menu-title">Basic UI Elements</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?php echo url('melody')?>/pages/ui-features/accordions.html">Accordions</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo url('melody')?>/pages/ui-features/buttons.html">Buttons</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo url('melody')?>/pages/ui-features/badges.html">Badges</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo url('melody')?>/pages/ui-features/breadcrumbs.html">Breadcrumbs</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo url('melody')?>/pages/ui-features/dropdowns.html">Dropdowns</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo url('melody')?>/pages/ui-features/modals.html">Modals</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo url('melody')?>/pages/ui-features/progress.html">Progress bar</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo url('melody')?>/pages/ui-features/pagination.html">Pagination</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo url('melody')?>/pages/ui-features/tabs.html">Tabs</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo url('melody')?>/pages/ui-features/typography.html">Typography</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo url('melody')?>/pages/ui-features/tooltips.html">Tooltips</a></li>
              </ul>
              </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-advanced" aria-expanded="false" aria-controls="ui-advanced">
              <i class="fas fa-clipboard-list menu-icon"></i>
              <span class="menu-title">Advanced Elements</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-advanced">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?php echo url('melody')?>/pages/ui-features/dragula.html">Dragula</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo url('melody')?>/pages/ui-features/clipboard.html">Clipboard</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo url('melody')?>/pages/ui-features/context-menu.html">Context menu</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo url('melody')?>/pages/ui-features/slider.html">Sliders</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo url('melody')?>/pages/ui-features/carousel.html">Carousel</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo url('melody')?>/pages/ui-features/colcade.html">Colcade</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo url('melody')?>/pages/ui-features/loaders.html">Loaders</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
              <i class="fab fa-wpforms menu-icon"></i>
              <span class="menu-title">Form elements</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="<?php echo url('melody')?>/pages/forms/basic_elements.html">Basic Elements</a></li>                
                <li class="nav-item"><a class="nav-link" href="<?php echo url('melody')?>/pages/forms/advanced_elements.html">Advanced Elements</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo url('melody')?>/pages/forms/validation.html">Validation</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo url('melody')?>/pages/forms/wizard.html">Wizard</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#editors" aria-expanded="false" aria-controls="editors">
              <i class="fas fa-pen-square menu-icon"></i>
              <span class="menu-title">Editors</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="editors">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="<?php echo url('melody')?>/pages/forms/text_editor.html">Text editors</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo url('melody')?>/pages/forms/code_editor.html">Code editors</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
              <i class="fas fa-chart-pie menu-icon"></i>
              <span class="menu-title">Charts</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="charts">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?php echo url('melody')?>/pages/charts/chartjs.html">ChartJs</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo url('melody')?>/pages/charts/morris.html">Morris</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo url('melody')?>/pages/charts/flot-chart.html">Flot</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo url('melody')?>/pages/charts/google-charts.html">Google charts</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo url('melody')?>/pages/charts/sparkline.html">Sparkline js</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo url('melody')?>/pages/charts/c3.html">C3 charts</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo url('melody')?>/pages/charts/chartist.html">Chartists</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo url('melody')?>/pages/charts/justGage.html">JustGage</a></li>
              </ul>
              </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
              <i class="fas fa-table menu-icon"></i>
              <span class="menu-title">Tables</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tables">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?php echo url('melody')?>/pages/tables/basic-table.html">Basic table</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo url('melody')?>/pages/tables/data-table.html">Data table</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo url('melody')?>/pages/tables/js-grid.html">Js-grid</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo url('melody')?>/pages/tables/sortable-table.html">Sortable table</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo url('melody')?>/pages/ui-features/popups.html">
              <i class="fas fa-minus-square menu-icon"></i>
              <span class="menu-title">Popups</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo url('melody')?>/pages/ui-features/notifications.html">
              <i class="fas fa-bell menu-icon"></i>
              <span class="menu-title">Notifications</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
              <i class="fa fa-stop-circle menu-icon"></i>
              <span class="menu-title">Icons</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="icons">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?php echo url('melody')?>/pages/icons/flag-icons.html">Flag icons</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo url('melody')?>/pages/icons/font-awesome.html">Font Awesome</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo url('melody')?>/pages/icons/simple-line-icon.html">Simple line icons</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo url('melody')?>/pages/icons/themify.html">Themify icons</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#maps" aria-expanded="false" aria-controls="maps">
              <i class="fas fa-map-marker-alt menu-icon"></i>
              <span class="menu-title">Maps</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="maps">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?php echo url('melody')?>/pages/maps/mapeal.html">Mapeal</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo url('melody')?>/pages/maps/vector-map.html">Vector Map</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo url('melody')?>/pages/maps/google-maps.html">Google Map</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="fas fa-window-restore menu-icon"></i>
              <span class="menu-title">User <?php echo url('melody')?>/pages</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?php echo url('melody')?>/pages/samples/login.html"> Login </a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo url('melody')?>/pages/samples/login-2.html"> Login 2 </a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo url('melody')?>/pages/samples/register.html"> Register </a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo url('melody')?>/pages/samples/register-2.html"> Register 2 </a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo url('melody')?>/pages/samples/lock-screen.html"> Lockscreen </a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#error" aria-expanded="false" aria-controls="error">
              <i class="fas fa-exclamation-circle menu-icon"></i>
              <span class="menu-title">Error pages</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="error">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?php echo url('melody')?>/pages/samples/error-404.html"> 404 </a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo url('melody')?>/pages/samples/error-500.html"> 500 </a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages">
              <i class="fas fa-file menu-icon"></i>
              <span class="menu-title">General Pages</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="general-pages">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?php echo url('melody')?>/pages/samples/blank-page.html"> Blank Page </a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo url('melody')?>/pages/samples/profile.html"> Profile </a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo url('melody')?>/pages/samples/faq.html"> FAQ </a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo url('melody')?>/pages/samples/faq-2.html"> FAQ 2 </a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo url('melody')?>/pages/samples/news-grid.html"> News grid </a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo url('melody')?>/pages/samples/timeline.html"> Timeline </a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo url('melody')?>/pages/samples/search-results.html"> Search Results </a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo url('melody')?>/pages/samples/portfolio.html"> Portfolio </a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#apps" aria-expanded="false" aria-controls="apps">
              <i class="fas fa-briefcase menu-icon"></i>
              <span class="menu-title">Apps</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="apps">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?php echo url('melody')?>/pages/apps/email.html"> Email </a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo url('melody')?>/pages/apps/calendar.html"> Calendar </a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo url('melody')?>/pages/apps/todo.html"> Todo </a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo url('melody')?>/pages/apps/gallery.html"> Gallery </a></li>
              </ul>`
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#e-commerce" aria-expanded="false" aria-controls="e-commerce">
              <i class="fas fa-shopping-cart menu-icon"></i>
              <span class="menu-title">E-commerce</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="e-commerce">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?php echo url('melody')?>/pages/samples/invoice.html"> Invoice </a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo url('melody')?>/pages/samples/pricing-table.html"> Pricing Table </a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo url('melody')?>/pages/samples/orders.html"> Orders </a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo url('melody')?>/pages/documentation.html">
              <i class="far fa-file-alt menu-icon"></i>
              <span class="menu-title">Documentation</span>
            </a>
          </li> -->

          <br>
          <br>
          <br>
        </ul>
      </nav>
      <!-- partial -->


<script>
    // JavaScript to disable click on the link
    document.querySelectorAll('.disabled-link').forEach(function(link) {
        link.addEventListener('click', function(event) {
            event.preventDefault();
        });
    });
</script>

<style>
  /* Add this CSS style to your stylesheet or within a <style> tag */
  .nav-item .nav-link.disabled-link:hover {
    background-color: transparent !important;
  }

</style>