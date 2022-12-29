<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnreturnedAsset extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }
}
