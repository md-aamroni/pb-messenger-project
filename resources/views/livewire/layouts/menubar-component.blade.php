<div class="sidebar-menu">
    <div class="logo-col">
        <a href="{{ url('/') }}">
            <img src="{{ asset('assets/img/laravel-icon.svg') }}" alt="Logo">
        </a>
    </div>
    <div class="menus-col">
        <div class="chat-menus">
            <ul>
                <li>
                    <a href="{{ route('chat') }}" class="chat-unread active" data-bs-toggle="tooltip" data-bs-placement="right" title data-bs-original-title="Chat">
                        <i class="ti ti-message-2"></i>
                    </a>
                </li>
                <li>
                    <a href="group.html" class="chat-unread" data-bs-toggle="tooltip" data-bs-placement="right" title data-bs-original-title="Group">
                        <i class="ti ti-users"></i>
                    </a>
                </li>
                <li>
                    <a href="{{ route('reel') }}" class="chat-unread" data-bs-toggle="tooltip" data-bs-placement="right" title data-bs-original-title="Status">
                        <i class="ti ti-clock-stop"></i>
                    </a>
                </li>
                <li>
                    <a href="call.html" class="chat-unread" data-bs-toggle="tooltip" data-bs-placement="right" title data-bs-original-title="Call">
                        <i class="ti ti-phone"></i>
                    </a>
                </li>
                <li>
                    <a href="contact.html" class="chat-unread" data-bs-toggle="tooltip" data-bs-placement="right" title data-bs-original-title="Contact">
                        <i class="ti ti-address-book"></i>
                    </a>
                </li>
                <li>
                    <a href="settings.html" class="chat-unread" data-bs-toggle="tooltip" data-bs-placement="right" title data-bs-original-title="Settings">
                        <i class="ti ti-settings"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="bottom-menus">
            <ul>
                <li>
                    <a href="javascript:;" id="dark-mode-toggle" class="dark-mode-toggle active">
                        <i class="ti ti-moon"></i>
                    </a>
                    <a href="javascript:;" id="light-mode-toggle" class="dark-mode-toggle">
                        <i class="ti ti-sun"></i>
                    </a>
                </li>
                <li>
                    <div class="avatar avatar-online">
                        <a href="javascript:;" class="chat-profile-icon" data-bs-toggle="dropdown">
                            <img loading="lazy" src="{{ $authUser->avatar }}" alt="" />
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="javascript:;" class="dropdown-item">
                                <span><i class="ti ti-settings-2"></i></span>Settings
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="route('logout')" class="dropdown-item" onclick="event.preventDefault(); this.closest('form').submit();">
                                    <span><i class="ti ti-power"></i></span>Logout
                                </a>
                            </form>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>