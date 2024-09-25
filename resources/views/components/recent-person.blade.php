@props(['item', 'status' => null, 'isTyping' => false])

<li {{ $attributes->merge(['class' => 'user-list-item chat-user-list']) }}>
    <a href="javascript:;">
        <div class="avatar avatar-online">
            <img loading="lazy" src="{{ $item->avatar }}" class="rounded-circle" alt="image" />
        </div>
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
                <small class="text-muted">Just Now</small>
                <div class="chat-pin">
                    @if($status === 'mute')
                    <i class="ti ti-microphone-off"></i>
                    @elseif($status === 'count')
                    <span class="count-message">5</span>
                    @else
                    <i class="ti ti-check"></i>
                    @endif
                </div>
            </div>
        </div>
    </a>
    <div class="chat-hover ms-1">
        <x:person-action />
    </div>
</li>