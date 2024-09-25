<?php

use App\Enums\AuthRoleStatus;
use App\Enums\DatabaseStatus;
use App\Enums\RegisterProfile;
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
        Schema::create(table: 'users', callback: function (Blueprint $table) {
            $table->ulid(column: 'id')->primary();
            $table->string(column: 'name');
            $table->string(column: 'email')->nullable();
            $table->string(column: 'phone')->nullable();
            $table->string(column: 'avatar')->nullable();
            $table->enum(column: 'profile', allowed: RegisterProfile::values())->default(value: RegisterProfile::GUEST);
            $table->enum(column: 'role', allowed: AuthRoleStatus::values())->default(value: AuthRoleStatus::UNKNOWN);
            $table->string(column: 'socket')->nullable()->comment(comment: 'Socket Connect ID');
            $table->boolean(column: 'is_online')->default(DatabaseStatus::INACTIVE);
            $table->string(column: 'uuid')->nullable()->comment(comment: 'Remote Database ID');
            $table->boolean(column: 'status')->default(value: DatabaseStatus::ACTIVE);
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create(table: 'sessions', callback: function (Blueprint $table) {
            $table->string(column: 'id')->primary();
            $table->foreignUlid(column: 'user_id')->nullable()->index();
            $table->string(column: 'ip_address', length: 45)->nullable();
            $table->text(column: 'user_agent')->nullable();
            $table->longText(column: 'payload');
            $table->integer(column: 'last_activity')->index();
        });
    }

    /**
     * Reverse the migrations
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists(table: 'users');
        Schema::dropIfExists(table: 'password_reset_tokens');
        Schema::dropIfExists(table: 'sessions');
    }
};
