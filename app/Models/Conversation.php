<?php

namespace App\Models;

use App\Casts\DateCast;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Conversation extends Model
{
    use HasFactory;
    use HasUlids;

    /**
     * The table associated with the model
     * @var string
     */
    protected $table = 'conversations';

    /**
     * The attributes that are mass assignable
     * @var array<int, string>
     */
    protected $fillable = ['room', 'channel'];

    /**
     * The attributes that should be hidden for serialization
     * @var array<int, string>
     */
    protected $hidden = [];

    /**
     * Get the attributes that should be cast
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            //            'created_at' => DateCast::class,
            //            'updated_at' => DateCast::class,
            //            'deleted_at' => DateCast::class,
        ];
    }

    /**
     * Get users associate with this model
     * @return BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(related: User::class, table: Participant::class, foreignPivotKey: 'room_id', relatedPivotKey: 'user_id')
            ->withCasts(casts: Participant::withCasts())
            ->withPivot(columns: Participant::withPivot())
            ->withTimestamps();
    }
}
