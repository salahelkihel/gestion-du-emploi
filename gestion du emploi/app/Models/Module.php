<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;
    protected $table='modules';
    protected $primaryKey='id';
    protected $fillable=[ 'id', 'NomMod', 'SemestreMod', 'id_classe', 'updated_at', 'created_at'];
}
