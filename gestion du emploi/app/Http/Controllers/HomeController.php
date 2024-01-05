<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    { 
        $classe = DB::table('classe')->count();
        $etudiants = DB::table('etudiants')->count();
        $enseignants = DB::table('enseignants')->count();
        $seances = DB::table('seances')->count();
        return view('dashboard',compact('classe','etudiants','enseignants','seances'));
    }
}