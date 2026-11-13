<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ad extends Model
{

    protected $fillable = [
        'title',
        'price',
        'location',
        'message',
        'category_id',
    ];


    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
