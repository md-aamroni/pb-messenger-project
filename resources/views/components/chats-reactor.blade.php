@props(['side' => 'L'])

<div class="{{ $side == 'R' ? 'emoj-group-right' : 'emoj-group' }}">
    <ul>
        <li class="emoj-action"><a href="javascript:;"><i class="ti ti-mood-happy"></i></a>
            <div class="emoj-group-list">
                <x:emoji-default />
            </div>
        </li>
        <li>
            <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#forward-message">
                <i class="ti ti-share-3"></i>
            </a>
        </li>
    </ul>
</div>