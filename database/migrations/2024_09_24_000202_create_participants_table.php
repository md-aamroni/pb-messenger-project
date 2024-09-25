<?php

use App\Enums\DatabaseStatus;
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
        Schema::create(table: 'participants', callback: function (Blueprint $table) {
            $table->ulid(column: 'id')->primary();
            $table->foreignUlid(column: 'room_id')->constrained(table: 'conversations', indexName: 'participant_room_id_fk_idx')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignUlid(column: 'user_id')->constrained(table: 'users', indexName: 'participant_user_id_fk_idx')->cascadeOnUpdate()->cascadeOnDelete();
            $table->boolean(column: 'status')->default(value: DatabaseStatus::ACTIVE);
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
        Schema::dropIfExists(table: 'participants');
    }
};
