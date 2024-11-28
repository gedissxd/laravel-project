<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maker extends Model
{
    /** @use HasFactory<\Database\Factories\MakerFactory> */
    use HasFactory;
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
