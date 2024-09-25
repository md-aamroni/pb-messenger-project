<div class="chat chat-messages" id="middle" x-data="socketIOHandler(@js($authUser))">
    <div>
        <livewire:pages.chat.partials.header-component />
        <div class="chat-body chat-page-group scrollbar" id="chatBox">
            <livewire:pages.chat.partials.scroll-component lazy />
        </div>
    </div>
    <livewire:pages.chat.partials.footer-component />
</div>

@push('script')
<script type="text/javascript">
// @TODO: Re-Init Scrollbar Behavior
window.addEventListener('initializeChatRoom', () => shouldBeScrollToBottomOnSetInterval())
window.addEventListener('sendMessageContent', () => shouldBeScrollToBottomOnSetTimeout())
window.addEventListener('reloadMessageStack', () => shouldBeScrollToBottomOnSetTimeout())

document.addEventListener('alpine:init', () => {
    Alpine.data('socketIOHandler', (user) => ({
        // @TODO: define properties
        socket: null,
        connID: null,
        logger: {
            id: user.id,
            name: user.name,
            email: user.email
        },
        user(id) {
            return {
                state: {
                    id: this.logger.id,
                    io: id
                }
            }
        },
        // @TODO: initiate alpine js
        init() {
            this.socket = io("ws://localhost:3000", {
                auth: this.logger
            })

            this.onSocketConnection()
            this.onSocketDisconnect()
        },
        // @TODO: if connect to the socket server
        onSocketConnection() {
            this.socket.on('connect', () => {
                this.$dispatch('socketConnection', this.user(this.socket.id))
                sentPushNotification(`Hi ${this.logger.name}! you have been connected`)


                this.shouldLoadMessages()
            });
        },
        // @TODO: if disconnect from the socket
        onSocketDisconnect() {
            this.socket.on('disconnect', () => {
                this.$dispatch('socketDisconnect', this.user(this.socket.id))
                sentPushNotification(`${this.logger.name} has been leave from chat`)
            });
        },


        isSentMessageStack() {
            this.socket.emit('sentMessageContent', this.reload)
            // shouldBeScrollToBottomOnSetTimeout()
            this.$dispatch('reloadMessageStack', this.reload)
        },
        shouldLoadMessages() {
            this.socket.on('reloadMessageStack', (data) => {
                // shouldBeScrollToBottomOnSetTimeout()
                this.$dispatch('reloadMessageStack', this.reload)
            });
        }
    }))
});
</script>
@endpush