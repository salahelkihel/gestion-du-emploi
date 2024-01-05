<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enseignants extends Model
{
    use HasFactory;
    protected $table='enseignants';

    protected $fillable=[ 'nom', 'prenom', 'email', 'Adresse', 'password', 'id_module', 'updated_at', 'created_at'];
}
