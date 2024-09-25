<div class="sidebar-group left-sidebar chat_sidebar">
    <div id="chats" class="left-sidebar-wrap sidebar active slimScroll">
        <div class="slimScroll">
            <div class="left-chat-title all-chats d-flex justify-content-between align-items-center">
                <div class="select-group-chat">
                    <div class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle" data-bs-toggle="dropdown">
                            All Chats<i class="ti ti-chevron-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="chat.html">All Chat</a></li>
                            <li><a class="dropdown-item" href="archive-chat.html">Archive Chat</a></li>
                            <li><a class="dropdown-item" href="pinned-chat.html">Pinned Chat</a></li>
                        </ul>
                    </div>
                </div>
                <div class="add-section">
                    <ul>
                        <li>
                            <a href="javascript:;" class="user-chat-search-btn">
                                <i class="ti ti-search"></i>
                            </a>
                        </li>
                        <li>
                            <div class="chat-action-btns">
                                <div class="chat-action-col">
                                    <a class="" href="javascript:;" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="ti ti-dots-vertical"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a href="javascript:;" class="dropdown-item " data-bs-toggle="modal" data-bs-target="#new-chat"><span><i class="bx bx-message-rounded-add"></i></span>New Chat </a>
                                        <a href="javascript:;" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#new-group"><span><i class="bx bx-user-circle"></i></span>Create Group</a>
                                        <a href="javascript:;" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#invite-other"><span><i class="bx bx-user-plus"></i></span>Invite Others</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <div class="user-chat-search">
                        <form>
                            <span class="form-control-feedback"><i class="ti ti-search"></i></span>
                            <input type="text" name="chat-search" placeholder="Search" class="form-control" />
                            <div class="user-close-btn-chat"><i class="ti ti-x"></i></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="top-online-contacts">
                <!-- <div class="fav-title">
                    <h6>Online Now</h6>
                </div> -->
                <div class="d-flex justify-content-between align-items-center ps-0 pe-0">
                    <div class="fav-title pin-chat">
                        <h6><i class="ti ti-cloud me-2 fs-18"></i>Online</h6>
                    </div>
                </div>
                @if(isset($collection->online))
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        @foreach($collection->online as $each)
                        <div class="swiper-slide">
                            <div class="top-contacts-box">
                                <div class="profile-img online">
                                    <a href="javascript:;">
                                        <img loading="lazy" src="{{ $each->avatar }}" alt="Image" />
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @else
                <div class="display-6 fs-16 mb-3">No record found</div>
                @endif
            </div>
            <div class="sidebar-body chat-body" id="chatsidebar">
                <div class="d-flex justify-content-between align-items-center ps-0 pe-0">
                    <div class="fav-title pin-chat">
                        <h6><i class="ti ti-messages me-2 fs-18"></i>Personal</h6>
                    </div>
                </div>
                @if(isset($collection->single) && $collection->single->count() > 0)
                <ul class="user-list space-chat">
                    @foreach($collection->single as $n => $each)
                    <li class="user-list-item chat-user-list">
                        <a x-on:click="$dispatch('conversationID', { userID: '{{ $each->id }}' })" href="javascript:;">
                            <div class="avatar avatar-online">
                                <img loading="lazy" src="{{ $each->avatar }}" class="rounded-circle" alt="image">
                            </div>
                            <div class="users-list-body">
                                <div>
                                    <h5>{{ $each->name }}</h5>
                                    @if(true)
                                    <p>
                                        <span class="animate-typing-col">
                                            <span>Typing</span>
                                            <span class="dot"></span>
                                            <span class="dot"></span>
                                            <span class="dot"></span>
                                        </span>
                                    </p>
                                    @else
                                    <p>Have you called them?</p>
                                    @endif
                                </div>
                                <div class="last-chat-time">
                                    <small class="text-muted">10:20 PM</small>
                                    <div class="chat-pin">
                                        <i class="ti ti-pinned me-2"></i>
                                        <i class="ti ti-checks"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <div class="chat-hover ms-1">
                            <div class="chat-action-col">
                                <span class="d-flex" data-bs-toggle="dropdown">
                                    <i class="ti ti-dots-vertical"></i>
                                </span>
                                <div class="dropdown-menu chat-drop-menu dropdown-menu-end">
                                    <span class="dropdown-item">
                                        <span><i class="ti ti-archive"></i></span>
                                        Archive Chat
                                    </span>
                                    <span class="dropdown-item" data-bs-toggle="modal" data-bs-target="#mute-notification">
                                        <span><i class="ti ti-volume-off"></i></span>
                                        Mute Notification
                                    </span>
                                    <span class="dropdown-item" data-bs-toggle="modal" data-bs-target="#change-chat">
                                        <span><i class="ti ti-trash"></i></span>
                                        Delete Chat
                                    </span>
                                    <span class="dropdown-item">
                                        <span><i class="ti ti-pinned-off"></i></span>
                                        Unpin Chat
                                    </span>
                                    <span class="dropdown-item">
                                        <span><i class="ti ti-circle-check"></i></span>
                                        Mark as Unread
                                    </span>
                                </div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
                @else
                <div class="display-6 fs-16 mb-5">No record found</div>
                @endif
                <div class="d-flex justify-content-between align-items-center ps-0 pe-0">
                    <div class="fav-title pin-chat">
                        <h6><i class="ti ti-message-2 me-2 fs-18"></i>Groups</h6>
                    </div>
                </div>
                @if(isset($collection->groups) && $collection->groups->count() > 0)
                <ul class="user-list">
                    @foreach($collection->groups as $each)
                    <x:sidebar.groups :data="$each" />
                    @endforeach
                </ul>
                @else
                <div class="display-6">No chat found</div>
                @endif
            </div>
        </div>
    </div>
</div>