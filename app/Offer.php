<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Offer extends Model
{

    use SoftDeletes;

    protected $guarded = [];

    public function truck()
    {
        return $this->belongsTo(Truck::class);
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    public function company()
    {
        return $this->belongsTo(User::class, 'company_id');
    }

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

}
