<?php

namespace App\Models;

use App\Enums\AuthRoleStatus;
use App\Enums\RegisterProfile;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory;
    use Notifiable;
    use HasUlids;

    /**
     * The attributes that are mass assignable
     * @var array<int, string>
     */
    protected $fillable = ['name', 'email', 'phone', 'password', 'avatar', 'profile', 'role', 'is_online', 'status'];

    /**
     * The attributes that should be hidden for serialization
     * @var array<int, string>
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * Get the attributes that should be cast
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'phone_verified_at' => 'datetime',
            'password'          => 'hashed',
            'profile'           => RegisterProfile::class,
            'role'              => AuthRoleStatus::class,
        ];
    }

    /**
     * Get conversation associate with this model
     * @return BelongsToMany
     */
    public function conversations(): BelongsToMany
    {
        return $this->belongsToMany(related: Conversation::class, table: Participant::class, foreignPivotKey: 'user_id', relatedPivotKey: 'room_id')
            ->withCasts(casts: Participant::withCasts())
            ->withPivot(columns: Participant::withPivot())
            ->withTimestamps();
    }
}
