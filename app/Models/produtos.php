<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produtos extends Model
{
    use HasFactory;

    protected $fillable =[
        'name', 'description', 'price', 'is_sun_glass', 'image_path', 'main_page', 'idformat', 'idcolor', 'idmaterial', 'parcels'
    ];
}
