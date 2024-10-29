<?php 

namespace App\Traits;

trait HasTimestamps
{
    public function createAt(): String{
        return $this->created_at->format('d-m-Y');
    }

    public function updateAt(): String{
        return $this->update_at->format('d-m-Y');
    }

}