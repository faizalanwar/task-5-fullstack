<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Articles extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 
        'content',
        'image',
        'user_id',
        'category_id'
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
 
    public function categories(): BelongsTo
    {
        return $this->belongsTo(Categories::class);
    }
}
