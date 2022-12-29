<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function temporary_requests()
    {
        return $this->hasMany(TemporaryRequest::class);
    }

    public function requestTransactions()
    {
        return $this->hasMany(RequestTransaction::class);
    }

    public function returnAssets()
    {
        return $this->hasMany(ReturnAsset::class);
    }

    public function borrowedAssets()
    {
        return $this->hasMany(BorrowedAsset::class);
    }

    public function unreturnedAssets()
    {
        return $this->hasMany(UnreturnedAsset::class);
    }
}
