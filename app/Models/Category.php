<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function assets()
    {
        return $this->hasMany(Asset::class);
    }

    public function requests()
    {
        return $this->hasMany(Request::class);
    }
}
