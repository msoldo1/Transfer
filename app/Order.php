<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    protected $guarded = [];


    public function company()
    {
        return $this->belongsTo(User::class, 'company_id');
    }

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

}
