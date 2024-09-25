<?php

namespace App\Livewire\Traits;

trait EventStringTrait
{
    /**
     * Define the name of the socket connection
     * @var string
     */
    public const string SOCKET_CONNECTION = 'socketConnection';

    /**
     * Define the name of the socket disconnect
     * @var string
     */
    public const string SOCKET_DISCONNECT = 'socketDisconnect';

    /**
     * Define the name of the socket connection
     * @var string
     */
    public const string RELOAD_ONLINE_STATUS = 'reloadOnlineStatus';

    //
    // ============================================== //
    //

    /**
     * Defined on initialize a new chat room
     * @var string
     */
    public const string INITIALIZE_CHAT_ROOM = 'initializeChatRoom';

    /**
     * Defined on sent a new message content
     * @var string
     */
    public const string SEND_MESSAGE_CONTENT = 'sentMessageContent';

    /**
     * Defined on when load new messages
     * @var string
     */
    public const string RELOAD_MESSAGE_STACK = 'reloadMessageStack';
}
