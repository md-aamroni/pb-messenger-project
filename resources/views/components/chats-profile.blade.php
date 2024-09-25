@props([
    'name' => 'Ghost',
    'time' => now()->format('h:i A'),
    'side' => 'L'
])

<div class="chat-profile-name {{ $side == 'R' ? ' justify-content-end' : '' }}">
    <div>
        <span><i class="ti ti-check-double me-1 inactive-check"></i></span>
        <span class="fs-14 fw-600">{{ $name }}</span>
        <span class="fs-12 fw-400 text-slate-400 ms-1">{{ $time }}</span>
        <span class="check-star msg-star-one d-none">
            <i class="ti ti-star"></i>
        </span>
    </div>
    <div class="chat-action-btns ms-2">
        <x:chats-actions />
    </div>
</div>