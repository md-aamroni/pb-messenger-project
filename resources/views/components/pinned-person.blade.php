@props(['item', 'isTyping' => false])

<div class="users-list-body">
    <div>
        <h5>{{ $item->name }}</h5>
        @if($isTyping === true)
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