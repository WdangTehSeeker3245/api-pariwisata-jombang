<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tourism extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'tourism';
    protected $fillable = [
        "tourism_place_name",
        "address",
        "ticket_price",
        "open_time",
        "latitude",
        "longitude"
    ];

    protected $hidden = [];

}
