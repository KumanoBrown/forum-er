<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Carbon\Carbon;

class Category extends Model
{
    use HasFactory;
    use HasTimestamps;

    protected $fillable = ['name', 'slug'];

    public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d/m/y');
    }

    protected function threads(): HasMany
    {
        return $this->hasMany(Thread::class);
    }

}
