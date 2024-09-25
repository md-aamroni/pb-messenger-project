<div class="chat-options">
                <ul class="list-inline">
                    <li class="list-inline-item">
                        <a href="javascript:void(0)" class="btn btn-outline-light chat-search-btn" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Search">
                            <i class="ti ti-search"></i>
                        </a>
                    </li>
                    <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Video Call">
                        <a href="javascript:void(0)" class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#video_call">
                            <i class="ti ti-video"></i>
                        </a>
                    </li>
                    <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Voice Call">
                        <a href="javascript:void(0)" class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#voice_call">
                            <i class="ti ti-phone"></i>
                        </a>
                    </li>
                    <li class="list-inline-item dream_profile_menu" id="showProfileInfo">
                        <a href="javascript:void(0)" class="btn btn-outline-light not-chat-user" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Contact Info">
                            <i class="ti ti-info-circle"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a class="btn btn-outline-light no-bg" href="javascript:;" data-bs-toggle="dropdown">
                            <i class="ti ti-dots-vertical"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="{{ route('home') }}" class="dropdown-item">
                                <span><i class="ti ti-x"></i></span>Close
                            </a>
                            <a href="javascript:;" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#mute-notification">
                                <span><i class="ti ti-volume-mute"></i></span>Mute
                            </a>
                            <a href="javascript:;" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#disappearing-messages">
                                <span><i class="ti ti-time-five"></i></span>Disappear
                            </a>
                            <a href="javascript:;" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#clear-chat">
                                <span><i class="ti ti-brush-alt"></i></span>Clear
                            </a>
                            <a href="javascript:;" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#change-chat">
                                <span><i class="ti ti-trash"></i></span>Delete
                            </a>
                            <a href="javascript:;" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#report-user">
                                <span><i class="ti ti-dislike"></i></span>Report
                            </a>
                            <a href="javascript:;" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#block-user">
                                <span><i class="ti ti-block"></i></span>Block
                            </a>
                        </div>
                    </li>
                </ul>
            </div>