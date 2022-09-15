<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fetetype extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['nom_de_fete'];
}
