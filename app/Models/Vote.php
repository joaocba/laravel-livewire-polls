<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vote extends Model
{
    use HasFactory;

    // Create relationship between Vote and Option models
    public function option(): BelongsTo // BelongsTo is a Laravel helper class which is type of relationship
    {
        return $this->belongsTo(Option::class); // Vote belongs to Option
    }
}
