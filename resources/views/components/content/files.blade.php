@props(['side' => 'L'])

<div class="message-content review-files">
    @if($side == 'R')
    <p>Please check and review the files</p>
    <div class="file-download d-flex align-items-center mb-0">
        <div class="file-type d-flex align-items-center justify-content-center me-2">
            <i class="ti ti-download"></i>
        </div>
        <div class="file-details">
            <span class="file-name">example-file.doc</span>
            <ul>
                <li>80 Bytes</li>
                <li><a href="javascript:;">Download</a></li>
            </ul>
        </div>
    </div>
    <x:chats-reactor :side="$side" />
    @else
    <x:chats-reactor :side="$side" />
    <p>Please check and review the files</p>
    <div class="file-download d-flex align-items-center mb-0">
        <div class="file-type d-flex align-items-center justify-content-center me-2">
            <i class="ti ti-download"></i>
        </div>
        <div class="file-details">
            <span class="file-name">example-file.doc</span>
            <ul>
                <li>80 Bytes</li>
                <li><a href="javascript:;">Download</a></li>
            </ul>
        </div>
    </div>
    @endif
</div>