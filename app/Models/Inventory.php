<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function assets()
    {
        return $this->hasMany(Asset::class, 'id', 'asset_id');
    }
}
