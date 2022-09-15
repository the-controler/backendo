<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pack_basic extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['id_orchestre', 'id_traiteure','id_salle','id_cameramen','id_tartes','id_ziana','id_voiture','id_hotel','id_lebsa'];
}
