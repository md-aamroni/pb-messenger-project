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
        Schema::create(table: 'reactions', callback: function (Blueprint $table) {
            $table->ulid(column: 'id')->primary();
            $table->foreignUlid(column: 'icon_id')->constrained(table: 'emoticons', indexName: 'reaction_icon_id_fk_idx')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignUlid(column: 'user_id')->constrained(table: 'users', indexName: 'reaction_user_id_fk_idx')->cascadeOnUpdate()->cascadeOnDelete();
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
        Schema::dropIfExists(table: 'reactions');
    }
};
