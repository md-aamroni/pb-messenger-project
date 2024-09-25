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
        Schema::create(table: 'statements', callback: function (Blueprint $table) {
            $table->ulid(column: 'id')->primary();
            $table->foreignUlid(column: 'message_id')->constrained(table: 'messages', indexName: 'statement_message_id_fk_idx')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignUlid(column: 'user_id')->constrained(table: 'users', indexName: 'statement_user_id_fk_idx')->cascadeOnUpdate()->cascadeOnDelete();
            $table->boolean(column: 'is_read')->default(value: DatabaseStatus::INACTIVE)->comment(comment: 'Is read or not');
            $table->timestamp(column: 'read_at')->nullable();
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
        Schema::dropIfExists(table: 'statements');
    }
};
