<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
Class Product extends Model
{
    use HasFactory;
    protected $table = 'product_listings';
    protected $guarded = [];
    public function maker()
    {
        return $this->belongsTo(Maker::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, foreignPivotKey: 'product_listing_id');
    }
}