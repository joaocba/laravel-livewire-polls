<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Poll extends Model
{
    use HasFactory;

    protected $fillable = ['title']; // fillable property for title

    // Create relationship between Poll and Option models
    public function options(): HasMany // HasMany is a Laravel helper class
    {
        return $this->hasMany(Option::class); // Poll has many Options
    }
}
