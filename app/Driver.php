<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Driver extends Model
{

    use SoftDeletes;

    protected $guarded = [];

    public function scopeActive($query){
        return $query->where('active', 1);
    }

    public function scopeInactive($query){
        return $query->where('active', 2);
    }

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
