<?php

namespace App\Models;

use App\Traits\HasTags;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Laravel\Jetstream\HasTeams;

class Thread extends Model
{
    use HasFactory;
    use HasTags;

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

}
