<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class File extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'path',
        'user_id',
        'directory_id',
        'shared_id',
    ];

    public function directory(): BelongsTo
    {
        return $this->belongsTo(Directory::class);
    }

    public function shared(): BelongsTo
    {
        return $this->belongsTo(Shared::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
