<?php

namespace App\Models;

use App\Casts\DateCast;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
    use HasFactory;
    use HasUlids;
    use SoftDeletes;

    /**
     * The table associated with the model
     * @var string
     */
    protected $table = 'messages';

    /**
     * The attributes that are mass assignable
     * @var array<int, string>
     */
    protected $fillable = ['room_id', 'user_id', 'bracket', 'content'];

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
}
