@props(['side' => 'L'])

<div class="message-content fancy-msg-box">
    @if($side == 'R')
    <x:chats-reactor :side="$side" />
    <div class="download-col">
        <ul class="nav mb-0">
            @foreach(range(1, 3) as $i)
            <li>
                <div class="image-download-col">
                    <a href="{{ asset('assets/icon/media-big-0'. $i .'.jpg') }}" target="_blank" class="fancybox">
                        <img src="{{ asset('assets/icon/media-0'. $i .'.jpg') }}" alt>
                    </a>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
    @else
    <div class="download-col">
        <ul class="nav mb-0">
            @foreach(range(1, 3) as $i)
            <li>
                <div class="image-download-col">
                    <a href="{{ asset('assets/icon/media-big-0'. $i .'.jpg') }}" target="_blank" class="fancybox">
                        <img src="{{ asset('assets/icon/media-0'. $i .'.jpg') }}" alt>
                    </a>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
    <x:chats-reactor :side="$side" />
    @endif
</div>