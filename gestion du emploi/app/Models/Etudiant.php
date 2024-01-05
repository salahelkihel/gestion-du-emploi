<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;
    protected $table='etudiants';
    protected $fillable=[ 'nom', 'prenom', 'email', 'Telephone', 'password', 'id_classe'];
}
