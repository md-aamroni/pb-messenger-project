@props(['converse' => '', 'side' => 'L'])

<div class="message-content">
    @if($side == 'R')
    <div>{!! $converse !!}</div>
    <x:chats-reactor :side="$side" />
    @else
    <x:chats-reactor :side="$side" />
    <div>{!! $converse !!}</div>
    @endif
</div>