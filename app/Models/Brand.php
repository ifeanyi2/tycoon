<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brand extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'make',
        'model',
        'fuel',
        'engine_size',
        'color',
        'price',
        'power',
        'image1',
        'extra',
        'description',
        'first_registration',
        'number_of_seat',
        'doors',
        'mileage',
        'gearbox'

    ];
}
