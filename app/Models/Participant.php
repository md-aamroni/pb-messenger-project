<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Participant extends Pivot
{
    use HasUlids;

    /**
     * The table associated with the model
     * @var string
     */
    protected $table = 'participants';

    /**
     * The attributes that are mass assignable
     * @var array<int, string>
     */
    protected $fillable = ['room_id', 'user_id', 'status'];

    /**
     * The attributes that should be hidden for serialization
     * @var array<int, string>
     */
    protected $hidden = [];

    /**
     * Get the pivot columns
     * @return string[]
     */
    public static function withPivot(): array
    {
        return ['status'];
    }

    /**
     * Get the pivot casts
     * @return string[]
     */
    public static function withCasts(): array
    {
        return [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    /**
     * Get room associate with this model
     * @return BelongsTo
     */
    public function room(): BelongsTo
    {
        return $this->belongsTo(related: Conversation::class, foreignKey: 'room_id', ownerKey: 'id');
    }

    /**
     * Get room associate with this model
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(related: User::class, foreignKey: 'user_id', ownerKey: 'id');
    }
}
