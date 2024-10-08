<?php

namespace App\Traits;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

trait HasTags{
    public function tags(){
        return $this->tagRelation;
    }

    public function syncTags(array $tags){
        $this->save();
        $this->tagsRelation()->sync($tags);
        $this->unsetRelation('tagsRelation');
    }

    public function tagsRelation(): MorphToMany
    {
        return $this->morphToMany(Tag::class, 'taggable')->withTimestamps();
    }
}