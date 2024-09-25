<ul>
    @foreach(range(1, 5) as $i)
    <li>
        <a href="javascript:;">
            <img src="{{ asset('assets/icon/emoji-0'. $i .'.svg') }}" alt="Icon">
        </a>
    </li>
    @endforeach
    <li class="add-emoj"><a href="javascript:;"><i class="ti ti-plus"></i></a></li>
</ul>