@props([
    'icon' => 'https://randomuser.me/api/portraits/thumb/men/1.jpg',
    'side' => 'L'
])

<div class="chats {{ $side === 'R' ? 'chats-right' : '' }}">
    @if($side === 'R')
    <x:chats-creator :icon="$icon" />
    <div class="chat-content">
        {{ $slot }}
    </div>
    @else
    <x:chats-creator :icon="$icon" />
    <div class="chat-content">
        {{ $slot }}
    </div>
    @endif
</div>