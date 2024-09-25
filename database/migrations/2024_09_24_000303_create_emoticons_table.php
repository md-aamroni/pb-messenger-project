<?php

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
        Schema::create(table: 'emoticons', callback: function (Blueprint $table) {
            $table->ulid(column: 'id')->primary();
            $table->foreignUlid(column: 'message_id')->constrained(table: 'messages', indexName: 'emoticon_message_id_fk_idx')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string(column: 'emoji');
            $table->unsignedInteger(column: 'total')->comment(comment: 'Total Reaction Number');
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
        Schema::dropIfExists(table: 'emoticons');
    }
};
