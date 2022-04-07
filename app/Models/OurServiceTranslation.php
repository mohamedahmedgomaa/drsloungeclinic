<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurServiceTranslation extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [ 'name', 'description' ];

}
