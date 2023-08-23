<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Option extends Model
{
    use HasFactory;

    protected $fillable = ['name']; // fillable property for name

    // Create relationship between Option and Poll model
    public function poll(): BelongsTo // BelongsTo is a Laravel helper class
    {
        return $this->belongsTo(Poll::class); // Option belongs to Poll
    }

    // Create relationship between Option and Vote model
    public function votes(): HasMany // HasMany is a Laravel helper class
    {
        return $this->hasMany(Vote::class); // Option has many Votes
    }

}
