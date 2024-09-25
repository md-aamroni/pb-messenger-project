<?php

use App\Enums\ContentBracket;
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
        Schema::create(table: 'messages', callback: function (Blueprint $table) {
            $table->ulid(column: 'id')->primary();
            $table->foreignUlid(column: 'room_id')->constrained(table: 'conversations', indexName: 'message_room_id_fk_idx')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignUlid(column: 'user_id')->constrained(table: 'users', indexName: 'message_user_id_fk_idx')->cascadeOnUpdate()->cascadeOnDelete();
            $table->enum(column: 'bracket', allowed: ContentBracket::values())->default(value: ContentBracket::TEXT);
            $table->text(column: 'content')->nullable();
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
        Schema::dropIfExists(table: 'messages');
    }
};
