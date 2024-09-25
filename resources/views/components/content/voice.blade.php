@props(['side' => 'L'])

<div class="message-content">
    @if($side === 'R')
    <x:chats-reactor :side="$side" />
    <div class="chat-voice-group">
        <ul>
            <li>
                <a href="javascript:;">
                    <span>
                        <img src="{{ asset('assets/icon/play-01.svg') }}" alt="image" />
                    </span>
                </a>
            </li>
            <li>
                <img src="{{ asset('assets/icon/voice.svg') }}" alt="image" />
            </li>
            <li>{{ $converse ?? '0:05' }}</li>
        </ul>
    </div>
    @else
    <div class="chat-voice-group">
        <ul>
            <li>
                <a href="javascript:;">
                    <span>
                        <img src="{{ asset('assets/icon/play-01.svg') }}" alt="image" />
                    </span>
                </a>
            </li>
            <li>
                <img src="{{ asset('assets/icon/voice.svg') }}" alt="image" />
            </li>
            <li>{{ $converse ?? '0:05' }}</li>
        </ul>
    </div>
    <x:chats-reactor :side="$side" />
    @endif
</div>