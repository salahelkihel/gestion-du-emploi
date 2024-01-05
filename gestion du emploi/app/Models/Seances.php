<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seances extends Model
{
    use HasFactory;
    protected $table='seances';
    protected $primaryKey='id';
    protected $fillable=[ 'id', 'date_Debut', 'date_Fin', 'JOUR', 'classe_id', 'module_id', 'enseignant_id'];
}
