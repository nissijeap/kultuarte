
@extends('layouts.app')
    @section('content')
        <div class="preloader"></div>

        
        <div class="main-wrapper">

        @include('layouts.header')
        @include('layouts.sidebar')

            <!-- main content -->
            <div class="main-content">
                
                <div class="middle-sidebar-bottom">
                    <div class="middle-sidebar-left">
                        @include('layouts.preloader')
                        <div class="row feed-body">
                            <div class="mb-4 post_container mt-4">
                                <div class="card w-100 shadow-xss rounded-xxl border-0 p-4 mb-0">
                                    <h3 style="font-weight:bold !important;">{{ $blog->title }}</h3>
                                    <p class="card-description"><code>{{ $blog->user->name }}</code> | {{ $blog->created_at->format('M d, Y') }}</p>
                                    <!-- <ul class="nav nav-tabs nav-tabs-vertical-custom" role="tablist">
                                        @if($blog->people)
                                        <li class="nav-item">
                                            <a class="nav-link" id="people-tab-custom" data-toggle="tab" href="#people-3" role="tab" aria-controls="people-3" aria-selected="false">
                                                <i class="fas fa-users col-3"></i> People
                                            </a>
                                        </li>
                                        @endif
                                        @if($blog->language)
                                            <li class="nav-item">
                                                <a class="nav-link" id="language-tab-custom" data-toggle="tab" href="#language-3" role="tab" aria-controls="language-3" aria-selected="false">
                                                    <i class="fas fa-language col-3"></i> Language
                                                </a>
                                            </li>
                                        @endif
                                        @if($blog->food_drink)
                                        <li class="nav-item">
                                            <a class="nav-link" id="food-tab-custom" data-toggle="tab" href="#food-3" role="tab" aria-controls="food-3" aria-selected="false">
                                                <i class="fas fa-utensils col-3"></i> Food & Drink
                                            </a>
                                        </li>
                                        @endif
                                        @if($blog->music_dances)
                                        <li class="nav-item">
                                            <a class="nav-link" id="music-tab-custom" data-toggle="tab" href="#music-3" role="tab" aria-controls="music-3" aria-selected="false">
                                                <i class="fas fa-music col-3"></i> Music & Dances
                                            </a>
                                        </li>
                                        @endif
                                        @if($blog->arts_crafts)
                                        <li class="nav-item">
                                            <a class="nav-link" id="arts-tab-custom" data-toggle="tab" href="#arts-3" role="tab" aria-controls="arts-3" aria-selected="false">
                                                <i class="fas fa-paint-brush col-3"></i> Arts & Crafts
                                            </a>
                                        </li>
                                        @endif
                                        @if($blog->location)
                                        <li class="nav-item">
                                            <a class="nav-link" id="location-tab-custom" data-toggle="tab" href="#location-3" role="tab" aria-controls="location-3" aria-selected="false">
                                                <i class="fas fa-map-marker-alt col-3"></i> Location
                                            </a>
                                        </li>
                                        @endif
                                        @if($blog->religion)
                                        <li class="nav-item">
                                            <a class="nav-link" id="religion-tab-custom" data-toggle="tab" href="#religion-3" role="tab" aria-controls="religion-3" aria-selected="false">
                                                <i class="fas fa-church col-3"></i> Religion
                                            </a>
                                        </li>
                                        @endif
                                        @if($blog->politics)
                                        <li class="nav-item">
                                            <a class="nav-link" id="politics-tab-custom" data-toggle="tab" href="#politics-3" role="tab" aria-controls="politics-3" aria-selected="false">
                                                <i class="fas fa-balance-scale col-3"></i> Politics
                                            </a>
                                        </li>
                                        @endif
                                        @if($blog->events)
                                        <li class="nav-item">
                                            <a class="nav-link" id="events-tab-custom" data-toggle="tab" href="#events-3" role="tab" aria-controls="events-3" aria-selected="false">
                                                <i class="fas fa-calendar-alt col-3"></i> Events
                                            </a>
                                        </li>
                                        @endif
                                        @if($blog->history)
                                        <li class="nav-item">
                                            <a class="nav-link" id="history-tab-custom" data-toggle="tab" href="#history-3" role="tab" aria-controls="history-3" aria-selected="false">
                                                <i class="fas fa-history col-3"></i> History
                                            </a>
                                        </li>
                                        @endif
                                    </ul> -->

                                    <ul class="nav nav-tabs nav-tabs-vertical-custom" role="tablist">
                                        @php $firstTab = 'active'; @endphp
                                        @foreach(['people', 'language', 'food_drink', 'music_dances', 'arts_crafts', 'location', 'religion', 'politics', 'events', 'history'] as $tab)
                                            @if($blog->$tab)
                                                <li class="nav-item">
                                                    <a class="nav-link {{ $firstTab }}" id="{{ $tab }}-tab-custom" data-toggle="tab" href="#{{ $tab }}-3" role="tab" aria-controls="{{ $tab }}-3" aria-selected="{{ $firstTab ? 'true' : 'false' }}">
                                                        {{ ucwords(str_replace('_', ' ', $tab)) }}
                                                    </a>
                                                </li>
                                                @php $firstTab = ''; @endphp
                                            @endif
                                        @endforeach
                                    </ul>
                                    <div class="tab-content tab-content-vertical tab-content-vertical-custom">
                                        @if($blog->people)
                                            <div class="tab-pane fade" id="people-3" role="tabpanel" aria-labelledby="people-tab-custom">
                                            <hr><h4 style="text-align: center;">PEOPLE</h4><hr><br>
                                            <p class="mt-4">
                                                {!! $blog->people->content !!}
                                            </p>
                                            </div>
                                        @endif

                                        @if($blog->language)
                                            <div class="tab-pane fade" id="language-3" role="tabpanel" aria-labelledby="language-tab-custom">
                                            <hr><h4 style="text-align: center;">LANGUAGE</h4><hr><br>
                                            <p class="mt-4">
                                                {!! $blog->language->content !!}
                                            </p>
                                            </div>
                                        @endif

                                        @if($blog->food_drink)
                                            <div class="tab-pane fade" id="food-3" role="tabpanel" aria-labelledby="food-tab-custom">
                                            <hr><h4 style="text-align: center;">FOOD AND DRINK</h4><hr><br>
                                            <p class="mt-4">
                                                {!! $blog->food_drink->content !!}
                                            </p>
                                            </div>
                                        @endif

                                        @if($blog->music_dances)
                                            <div class="tab-pane fade" id="music-3" role="tabpanel" aria-labelledby="music-tab-custom">
                                            <hr><h4 style="text-align: center;">MUSIC AND DANCES</h4><hr><br>
                                            <p class="mt-4">
                                                {!! $blog->music_dances->content !!}
                                            </p>
                                            </div>
                                        @endif

                                        @if($blog->arts_crafts)
                                            <div class="tab-pane fade" id="arts-3" role="tabpanel" aria-labelledby="arts-tab-custom">
                                            <hr><h4 style="text-align: center;">ARTS AND CRAFTS</h4><hr><br>
                                            <p class="mt-4">
                                                {!! $blog->arts_crafts->content !!}
                                            </p>
                                            </div>
                                        @endif

                                        @if($blog->location)
                                            <div class="tab-pane fade" id="location-3" role="tabpanel" aria-labelledby="location-tab-custom">
                                            <hr><h4 style="text-align: center;">LOCATION</h4><hr><br>
                                            <p class="mt-4">
                                                {!! $blog->location->content !!}
                                            </p>
                                            </div>
                                        @endif

                                        @if($blog->religion)
                                            <div class="tab-pane fade" id="religion-3" role="tabpanel" aria-labelledby="religion-tab-custom">
                                            <hr><h4 style="text-align: center;">RELIGION</h4><hr><br>
                                            <p class="mt-4">
                                                {!! $blog->religion->content !!}
                                            </p>
                                            </div>
                                        @endif

                                        @if($blog->politics)
                                            <div class="tab-pane fade" id="politics-3" role="tabpanel" aria-labelledby="politics-tab-custom">
                                            <hr><h4 style="text-align: center;">POLITICAL SYSTEM</h4><hr><br>
                                            <p class="mt-4">
                                                {!! $blog->politics->content !!}
                                            </p>
                                            </div>
                                        @endif

                                        @if($blog->events)
                                            <div class="tab-pane fade" id="events-3" role="tabpanel" aria-labelledby="events-tab-custom">
                                            <hr><h4 style="text-align: center;">EVENTS</h4><hr><br>
                                            <p class="mt-4">
                                                {!! $blog->events->content !!}
                                            </p>
                                            </div>
                                        @endif

                                        @if($blog->history)
                                            <div class="tab-pane fade" id="history-3" role="tabpanel" aria-labelledby="history-tab-custom">
                                            <hr><h4 style="text-align: center;">HISTORY</h4><hr><br>
                                            <p class="mt-4">
                                                {!! $blog->history->content !!}
                                            </p>
                                            </div>
                                        @endif

                                    </div>
                                    <div class="tab-content tab-content-vertical tab-content-vertical-custom">
                                        @php $firstTab = true; @endphp
                                        @foreach(['people', 'language', 'food_drink', 'music_dances', 'arts_crafts', 'location', 'religion', 'politics', 'events', 'history'] as $tab)
                                            @if($blog->$tab)
                                                <div class="tab-pane fade {{ $firstTab ? 'show active' : '' }}" id="{{ $tab }}-3" role="tabpanel" aria-labelledby="{{ $tab }}-tab-custom">
                                                    <!-- Tab Content for {{ ucwords(str_replace('_', ' ', $tab)) }} -->
                                                    <hr><h4 style="text-align: center;">About {{ $blog->ethnicity->ethnic_name }} {{ ucwords(str_replace('_', ' ', $tab)) }}</h4><hr><br>
                                                    <p class="mt-4">
                                                        {!! $blog->$tab->content !!}
                                                    </p>
                                                </div>
                                                @php $firstTab = false; @endphp
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                    
                </div>            
            </div>
            <!-- main content -->

            <!-- right chat -->
            <div class="right-chat nav-wrap mt-2 right-scroll-bar">
                <div class="middle-sidebar-right-content bg-white shadow-xss rounded-xxl">

                    <!-- loader wrapper -->
                    <div class="preloader-wrap p-3">
                        <div class="box shimmer">
                            <div class="lines">
                                <div class="line s_shimmer"></div>
                                <div class="line s_shimmer"></div>
                                <div class="line s_shimmer"></div>
                                <div class="line s_shimmer"></div>
                            </div>
                        </div>
                        <div class="box shimmer mb-3">
                            <div class="lines">
                                <div class="line s_shimmer"></div>
                                <div class="line s_shimmer"></div>
                                <div class="line s_shimmer"></div>
                                <div class="line s_shimmer"></div>
                            </div>
                        </div>
                        <div class="box shimmer">
                            <div class="lines">
                                <div class="line s_shimmer"></div>
                                <div class="line s_shimmer"></div>
                                <div class="line s_shimmer"></div>
                                <div class="line s_shimmer"></div>
                            </div>
                        </div>
                    </div>
                    <!-- loader wrapper -->

                </div>
            </div>

    @endsection