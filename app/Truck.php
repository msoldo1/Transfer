<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Truck extends Model
{

    use SoftDeletes;

    protected $guarded = [];

    public function offers(){
        return $this->hasMany(Offer::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
