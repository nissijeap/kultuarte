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
                                        @php $firstTab = true; @endphp
                                        @foreach(['people', 'language', 'food_drink', 'music_dances', 'arts_crafts', 'location', 'religion', 'politics', 'events', 'history'] as $tab)
                                            @if($blog->$tab)
                                                <div class="tab-pane mt-4 fade {{ $firstTab ? 'show active' : '' }}" id="{{ $tab }}-3" role="tabpanel" aria-labelledby="{{ $tab }}-tab-custom">
                                                    <h4 style="text-align: center;">About {{ $blog->ethnicity->ethnic_name }} {{ ucwords(str_replace('_', ' and ', $tab)) }}</h4><hr><br>
                                                    <p class="mt-4 ms-2 me-2">
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