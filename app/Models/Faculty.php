<?php

namespace App\Models;

use App\Models\Major;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Faculty extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function majors(): HasMany
    {
        return $this->hasMany(Major::class);
    }

    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }
}
