@props(['converse' => '', 'side' => 'L'])

<div class="message-content award-link chat-award-link">
    @if($side === 'R')
    <a href="{{ $converse }}" target="_blank">{{ $converse }}</a>
    <a href="{{ $converse }}" class="text-decoration-none" target="_blank">
        <img src="https://img.youtube.com/vi/{{ str($converse)->after('=')->toString() }}/0.jpg" alt="img" class="object-fit-cover border-0 rounded-3" style="width: 100%; max-height: 180px;" />
    </a>
    <x:chats-reactor :side="$side" />
    @else
    <x:chats-reactor :side="$side" />
    <a href="{{ $converse }}" target="_blank">{{ $converse }}</a>
    <a href="{{ $converse }}" class="text-decoration-none" target="_blank">
        <img src="https://img.youtube.com/vi/{{ str($converse)->after('=')->toString() }}/0.jpg" alt="img" class="object-fit-cover border-0 rounded-3" style="width: 100%; max-height: 180px;" />
    </a>
    @endif
</div>