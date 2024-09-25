@props(['data'])

<li class="user-list-item chat-user-list">
    <a x-on:click="$dispatch('initializeChatRoom', { roomID: '{{ $data->id }}' })" href="javascript:;">
        <div class="avatar">
            <img loading="lazy" src="{{ $data->icon }}" class="rounded-circle" alt="Group Icon Image" />
        </div>
        <div class="users-list-body">
            <div>
                <h5>{{ $data->room }}</h5>
                <p class="m-0 text-slate-600">Have you called them?</p>
            </div>
            <div class="last-chat-time">
                <small class="text-muted">Just Now</small>
                <div class="chat-pin">
                    <span class="count-message">{{ $data->total }}</span>
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
                <span class="dropdown-item" data-bs-toggle="modal" data-bs-target="#mute-notification">
                    <span><i class="ti ti-volume-off"></i></span>
                    Mute Notification
                </span>
                <span class="dropdown-item">
                    <span><i class="ti ti-circle-check"></i></span>
                    Mark as Unread
                </span>
            </div>
        </div>
    </div>
</li>