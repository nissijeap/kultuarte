@extends('layouts.app')
@section('content')
@include('Chatify::layouts.headLinks')
    <div class="preloader"></div>
    <div class="main-wrapper">
        @include('layouts.header')
        @include('layouts.sidebar')
        <div class="main-content">
            <div class="middle-sidebar-bottom">
                <div class="middle-sidebar-left">
                    @include('layouts.preloader')
                    <div class="row feed-body">
                        <div class="col-lg-8 post_container">
                            <div class="card d-flex w-100 shadow-xss rounded-xxl border-0 ps-3 pt-3 pe-3 pb-1 mb-3 mt-5">
                                <div class="d-flex pb-2 messageList listHead">
                                    <h3 class="mb-0 align-self-center" style="font-weight: bold;">Messages</h3>
                                    {{-- Search input --}}
                                    <div class="ms-auto d-flex w-50">
                                        <input type="text" class="messenger-search rounded-xxl d-none ms-auto" placeholder="Search" />
                                        <span class="material-symbols-outlined align-self-center ms-auto" id="toggleSearch" style="cursor:pointer; color: #e15600;">search</span>
                                    </div>
                                </div>
                                
                                {{-- header title [conversation name] amd buttons --}}
                                <div class="m-header m-header-messaging pb-2 d-none messageBody">
                                    <nav class="chatify-d-flex chatify-justify-content-between chatify-align-items-center" >
                                        {{-- header back button, avatar and user name --}}
                                        <div class="chatify-d-flex chatify-justify-content-between chatify-align-items-center">
                                            <div class="avatar av-s header-avatar" style="margin: 0px 10px; margin-top: -5px; margin-bottom: -5px;">
                                            </div>
                                            <a href="#" class="user-name">{{ config('chatify.name') }}</a>
                                        </div>
                                        {{-- header buttons --}}
                                        <nav class="m-header-right">
                                            <a href="#" class="add-to-favorite"><i class="fas fa-star"></i></a>
                                            <a href="#" class="show-listView"><i class="fas fa-arrow-left"></i></a>
                                        </nav>
                                    </nav>
                                </div>
                            </div>
                            <div class="card w-100 shadow-xss rounded-xxl border-0 p-4 mb-3 messageHeight">
                                {{-- ---------------- [ User Tab ] ---------------- --}}
                                <div class="show messenger-tab users-tab app-scroll messageList" data-view="users">
                                    {{-- Favorites --}}
                                    <div class="favorites-section">
                                        <p class="messenger-title"><span>Favorites</span></p>
                                        <div class="messenger-favorites app-scroll-hidden"></div>
                                    </div>
                                    {{-- Saved Messages --}}
                                    <p class="messenger-title"><span>Your Space</span></p>
                                    {!! view('Chatify::layouts.listItem', ['get' => 'saved']) !!}
                                    {{-- Contact --}}
                                    <p class="messenger-title"><span>All Messages</span></p>
                                    <div class="listOfContacts" style="width: 100%;height: calc(100% - 272px);position: relative;"></div>
                                </div>
                                    {{-- ---------------- [ Search Tab ] ---------------- --}}
                                <div class="messenger-tab search-tab app-scroll messageList" data-view="search">
                                    {{-- items --}}
                                    <p class="messenger-title"><span>Search</span></p>
                                    <div class="search-records">
                                        <p class="message-hint center-el"><span>Type to search..</span></p>
                                    </div>
                                </div>

                                <div class="messenger-messagingView rounded-xxl d-none messageBody" style="height:80vh !important;">
                                    <div class="m-header m-header-messaging">
                                        {{-- Internet connection --}}
                                        <div class="internet-connection">
                                            <span class="ic-connected">Connected</span>
                                            <span class="ic-connecting">Connecting...</span>
                                            <span class="ic-noInternet">No internet access</span>
                                        </div>
                                    </div>     
                                    {{-- Messaging area --}}
                                    <div class="m-body messages-container app-scroll">
                                        <div class="messages">
                                            <p class="message-hint center-el"><span>Please select a chat to start messaging</span></p>
                                        </div>
                                        {{-- Typing indicator --}}
                                        <div class="typing-indicator">
                                            <div class="message-card typing">
                                                <div class="message">
                                                    <span class="typing-dots">
                                                        <span class="dot dot-1"></span>
                                                        <span class="dot dot-2"></span>
                                                        <span class="dot dot-3"></span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    {{-- Send Message Form --}}
                                    @include('Chatify::layouts.sendForm')
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 ps-lg-0">
                            <div class="card w-100 shadow-xss rounded-xxl border-0 mb-3 mt-5 p-2 justify-content-center align-items-center info">
                                <div class="messenger-infoView rounded-xxl app-scroll d-none viewUserInfo">
                                    {{-- nav actions --}}
                                    <nav>
                                        <p>User Details</p>
                                    </nav>
                                    {!! view('Chatify::layouts.info')->render() !!}
                                </div>
                                <div class="messenger-infoView rounded-xxl d-flex justify-content-center align-items-center noView" style="flex-direction: column; color: #e15600;">
                                        <span class="material-symbols-outlined" style="font-size: xxx-large;">highlight_mouse_cursor</span>
                                        <h5>Select a message to view</h5>
                                </div>
                            </div>
                        </div>

                        
                    </div>
                </div>
            </div>
        </div>
    </div>
 <!-- <div class="messenger"> -->
 {{-- ----------------------Users/Groups lists side---------------------- --}}
                                <!-- <div class="messenger-listView {{ !!$id ? 'conversation-active' : '' }}">
                                    {{-- Header and search bar --}}
                                    <div class="m-header">
                                        <nav>
                                            <a href="#"><i class="fas fa-inbox"></i> <span class="messenger-headTitle">MESSAGES</span> </a>
                                            {{-- header buttons --}}
                                            <nav class="m-header-right">
                                                <a href="#"><i class="fas fa-cog settings-btn"></i></a>
                                                <a href="#" class="listView-x"><i class="fas fa-times"></i></a>
                                            </nav>
                                        </nav>
                                        {{-- Search input --}}
                                        <input type="text" class="messenger-search" placeholder="Search" />
                                        {{-- Tabs --}}
                                        {{-- <div class="messenger-listView-tabs">
                                            <a href="#" class="active-tab" data-view="users">
                                                <span class="far fa-user"></span> Contacts</a>
                                        </div> --}}
                                    </div>
                                    {{-- tabs and lists --}}
                                    <div class="m-body contacts-container">
                                    {{-- Lists [Users/Group] --}}
                                    
                                </div> -->

                                {{-- ----------------------Messaging side---------------------- --}}
                                <!-- <div class="messenger-messagingView">
                                    {{-- header title [conversation name] amd buttons --}}
                                    <div class="m-header m-header-messaging">
                                        <nav class="chatify-d-flex chatify-justify-content-between chatify-align-items-center">
                                            {{-- header back button, avatar and user name --}}
                                            <div class="chatify-d-flex chatify-justify-content-between chatify-align-items-center">
                                                <a href="#" class="show-listView"><i class="fas fa-arrow-left"></i></a>
                                                <div class="avatar av-s header-avatar" style="margin: 0px 10px; margin-top: -5px; margin-bottom: -5px;">
                                                </div>
                                                <a href="#" class="user-name">{{ config('chatify.name') }}</a>
                                            </div>
                                            {{-- header buttons --}}
                                            <nav class="m-header-right">
                                                <a href="#" class="add-to-favorite"><i class="fas fa-star"></i></a>
                                                <a href="/"><i class="fas fa-home"></i></a>
                                                <a href="#" class="show-infoSide"><i class="fas fa-info-circle"></i></a>
                                            </nav>
                                        </nav>
                                        {{-- Internet connection --}}
                                        <div class="internet-connection">
                                            <span class="ic-connected">Connected</span>
                                            <span class="ic-connecting">Connecting...</span>
                                            <span class="ic-noInternet">No internet access</span>
                                        </div>
                                    </div>

                                    {{-- Messaging area --}}
                                    <div class="m-body messages-container app-scroll">
                                        <div class="messages">
                                            <p class="message-hint center-el"><span>Please select a chat to start messaging</span></p>
                                        </div>
                                        {{-- Typing indicator --}}
                                        <div class="typing-indicator">
                                            <div class="message-card typing">
                                                <div class="message">
                                                    <span class="typing-dots">
                                                        <span class="dot dot-1"></span>
                                                        <span class="dot dot-2"></span>
                                                        <span class="dot dot-3"></span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    {{-- Send Message Form --}}
                                    @include('Chatify::layouts.sendForm')
                                </div> -->
                                {{-- ---------------------- Info side ---------------------- --}}
                                <!-- <div class="messenger-infoView app-scroll">
                                    {{-- nav actions --}}
                                    <nav>
                                        <p>User Details</p>
                                        <a href="#"><i class="fas fa-times"></i></a>
                                    </nav>
                                    {!! view('Chatify::layouts.info')->render() !!}
                                </div> -->
                            <!-- </div> -->
@include('Chatify::layouts.modals')
@include('Chatify::layouts.footerLinks')
@endsection
