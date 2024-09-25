<?php

namespace App\Services\Contracts\Message;

use App\Enums\ContentBracket;
use App\Enums\DatabaseStatus;
use App\Models\Message;
use App\Models\Statement;
use App\Services\Adapters\ContractAdapter;
use App\Services\Resolvers\MessageRoomParticipant;
use Override;

readonly class CreateContract extends ContractAdapter
{
    /**
     * Create a new contract instance
     * @param string|null $roomID
     * @param string|null $userID
     * @param ContentBracket|null $bracket
     * @param string|null $content
     * @return void
     */
    final public function __construct(
        private ?string         $roomID     = null,
        private ?string         $userID     = null,
        private ?ContentBracket $bracket    = null,
        private ?string         $content    = null,
    )
    {
        // Skip Code Here...
    }

    /**
     * Get the response from incoming request
     * @return array|null
     */
    #[Override]
    public function process(): ?array
    {
        $instance = Message::query()->create(attributes: $this->mapper());
        if (isset($instance) && $instance instanceof Message) {
            return $this->withStatementRelationship(messageID: $instance->getKey());
        }
        return null;
    }

    /**
     * Define the model attributes
     * @return array
     */
    private function mapper(): array
    {
        return [
            'room_id' => $this->roomID,
            'user_id' => $this->userID,
            'bracket' => $this->bracket,
            'content' => $this->content,
        ];
    }

    /**
     * Handle the statement relationship
     * @param string $messageID
     * @return array
     */
    private function withStatementRelationship(string $messageID): array
    {
        $response = [];
        $resolver = MessageRoomParticipant::resolve(roomID: $this->roomID, userID: $this->userID);
        foreach ($resolver as $each) {
            $response[] = Statement::query()->updateOrCreate(attributes: ['message_id' => $messageID, 'user_id' => $each], values: [
                'is_read' => DatabaseStatus::INACTIVE
            ]);
        }
        return $response;
    }
}
