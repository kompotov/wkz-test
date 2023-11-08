<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory, HasTimestamps;
    protected $guarded = [];

    public function toggleState(): bool
    {
        $this->state = !$this->state;
        return $this->state;
    }
}
