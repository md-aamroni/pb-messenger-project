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
        Schema::create(table: 'notifications', callback: function (Blueprint $table) {
            $table->uuid(column: 'id')->primary();
            $table->string(column: 'type');
            $table->foreignUlid(column: 'user_id')->constrained(table: 'users');
            $table->text(column: 'data');
            $table->timestamp(column: 'read_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists(table: 'notifications');
    }
};
