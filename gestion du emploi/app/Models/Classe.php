<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;
 
    protected $table='classe';
    protected $fillable=['id','niveau', 'updated_at', 'created_at'];
}
