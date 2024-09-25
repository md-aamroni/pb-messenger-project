<div class="messages"> 
    @if(isset($collection) && $collection->count() > 0)
    @foreach($collection as $each)
    <x:chats-content icon="https://randomuser.me/api/portraits/thumb/men/1.jpg" :side="$each->separator">
        <x:chats-profile name="John Smith" :time="now()->format('h:i A')" />
        <x:content.reply :converse="$each->content" :side="$each->separator" />
    </x:chats-content>
    @endforeach
    @endif
</div>