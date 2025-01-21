<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Maker extends Model
{
    /** @use HasFactory<\Database\Factories\MakerFactory> */
    use HasFactory;
    protected $guarded = [];
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function user(): BelongsTo
    {
       return $this->belongsTo(User::class); 
    }
}
