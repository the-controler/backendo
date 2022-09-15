<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservation extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['id_client','id_package','id_fetetype','id_res_fete'];
}
