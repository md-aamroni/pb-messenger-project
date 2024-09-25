<?php

use App\Enums\ConversationGenre;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations
     * @return void
     */
    public function up(): void
    {
        Schema::create(table: 'conversations', callback: function (Blueprint $table) {
            $table->ulid(column: 'id')->primary();
            $table->string(column: 'room')->index(indexName: 'conversation_room_idx');
            $table->enum(column: 'channel', allowed: ConversationGenre::values())->default(value: ConversationGenre::SINGLE);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists(table: 'conversations');
    }
};
