<div class="chat-footer">
    <form wire:submit="store">
        <x:chat.footer-action />
        <x:chat.footer-emoji />
        <x:chat.footer-voice />
        <div class="replay-forms">
            <x:chat.footer-reply />
            <input wire:model="content" x-on:keyup.enter="isSentMessageStack()" type="input" class="form-control" placeholder="Type your message here...">
        </div>
        <x:chat.footer-button />
    </form>
</div>