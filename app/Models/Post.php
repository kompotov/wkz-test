<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function toggleState(): bool
    {
        $this->state = !$this->state;
        return $this->state;
    }
}
