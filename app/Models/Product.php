<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    
    public function getRouteKeyName()
    {
        return 'route_name';
    }

    protected $guarded = [];
}
