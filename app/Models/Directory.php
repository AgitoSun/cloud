<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Directory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'path',
        'directory_id',
        'user_id',
    ];

    public function file(): HasOne
    {
        return $this->hasOne(File::class);
    }
}
