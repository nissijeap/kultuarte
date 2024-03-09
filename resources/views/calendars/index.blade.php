<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.urbanui.com/melody/template/pages/apps/calendar.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Sep 2018 06:09:23 GMT -->
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>KultuArte: Culture and Visual Arts</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicons -->
    <link href="{{url('guest/assets/img/logo.png')}}" rel="icon">
    <link href="{{url('guest/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">
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

<body>
  <div class="container-scroller">
    @include('superadmin.layouts.navbar')
    <div class="container-fluid page-body-wrapper">
    @include('superadmin.layouts.settings')
    @include('superadmin.layouts.sidebar')

      <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              Calendar
            </h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('superadmin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Calendar</li>
              </ol>
            </nav>
          </div>

          <div class="row">
            <div class="col-md-3">
              <div class="fc-external-events">
                  <div class='fc-event' style="height: 300px; overflow-y: auto;">
                      <h6>Current Events</h6><hr>
                      @forelse($currentCalendars as $calendar)
                          <p>{{ $calendar->title }}</p>
                          <p class="small-text text-muted" style="margin-bottom: 0px;">Start:<code>{{ \Carbon\Carbon::parse($calendar->start_date)->format('F j, Y') }} at {{ \Carbon\Carbon::parse($calendar->start_time)->format('h:i A') }}</code></p>
                          <p class="small-text text-muted">End:<code>{{ \Carbon\Carbon::parse($calendar->end_date)->format('F j, Y') }} at {{ \Carbon\Carbon::parse($calendar->end_time)->format('h:i A') }}</code></p>
                      @empty
                          <p class="text-muted">No current events.</p>
                      @endforelse
                      <hr>
                  </div>

                  <div class='fc-event' style="height: 300px; overflow-y: auto;">
                      <h6>Past Events</h6><hr>
                      @forelse($pastCalendars as $calendar)
                          <p>{{ $calendar->title }}</p>
                          <p class="small-text text-muted" style="margin-bottom: 0px;">Start:<code>{{ \Carbon\Carbon::parse($calendar->start_date)->format('F j, Y') }} at {{ \Carbon\Carbon::parse($calendar->start_time)->format('h:i A') }}</code></p>
                          <p class="small-text text-muted">End:<code>{{ \Carbon\Carbon::parse($calendar->end_date)->format('F j, Y') }} at {{ \Carbon\Carbon::parse($calendar->end_time)->format('h:i A') }}</code></p>
                      @empty
                          <p class="text-muted">No past events.</p>
                      @endforelse
                      <hr>
                  </div>

                  <div class='fc-event' style="height: 300px; overflow-y: auto;">
                      <h6>Upcoming Events</h6><hr>
                      @forelse($upcomingCalendars as $calendar)
                          <p>{{ $calendar->title }}</p>
                          <p class="small-text text-muted" style="margin-bottom: 0px; margin-top: -15px;">Start:<code>{{ \Carbon\Carbon::parse($calendar->start_date)->format('F j, Y') }} at {{ \Carbon\Carbon::parse($calendar->start_time)->format('h:i A') }}</code></p>
                          <p class="small-text text-muted">End:<code>{{ \Carbon\Carbon::parse($calendar->end_date)->format('F j, Y') }} at {{ \Carbon\Carbon::parse($calendar->end_time)->format('h:i A') }}</code></p>
                      @empty
                          <p class="text-muted">No upcoming events.</p>
                      @endforelse
                      <hr>
                  </div>
            </div>

            </div>
            <div class="col-md-9">
                 @can('create-event')
                    <a href="{{ route('calendars.create') }}" class="btn btn-primary" style="width:100%;"><i class="fa fa-plus-circle"></i> Create New Event</a><br><br>
                @endcan
                
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Events Calendar</h4>
                  <div id="calendar" class="full-calendar"></div>
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

  <script>
  (function($) {
  'use strict';
  $(function() {
    if ($('#calendar').length) {
      $('#calendar').fullCalendar({
        header: {
          left: 'prev,next today',
          center: 'title',
          right: 'month,basicWeek,basicDay'
        },
        defaultDate: new Date(),
        navLinks: true,
        editable: true,
        eventLimit: true,
        events: '/events'
      });
    }
  });
})(jQuery);
  </script>

</body>

<!-- Mirrored from www.urbanui.com/melody/template/pages/apps/calendar.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Sep 2018 06:09:24 GMT -->
</html>
