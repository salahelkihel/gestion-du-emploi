<?php
use App\Http\Controllers\Logincontroller;

use App\Http\Controllers\ClasseController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\EtudientController;
use App\Http\Controllers\EnseignantsController;
use App\Http\Controllers\SeancesController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\UserController;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\adminMiddleware;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('loginpage');
});

Route::get('/Calendar', function () {
    return view('Calendar');
});

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout'); 

    Route::group(['middleware'=>['adminMiddleware']], function(){ 
        Route::get('dashboard',[HomeController::class,'index'])->name('dashboard');

Route::get('/Classe',[ClasseController::class,'index']);
Route::get('/Module',[ModuleController::class,'index']);
Route::get('/Etudiant',[EtudientController::class,'index']);
Route::get('/Enseignants',[EnseignantsController::class,'index']);
Route::get('/Seances',[SeancesController::class,'index']);
Route::get('/Calendar',[CalendarController::class,'index']);


Route::post('classe',[ClasseController::class,'add'])->name('Classe.add');
Route::put('/update_classe/{id}',[ClasseController::class,'update'])->name('update_classe');
Route::delete('/deletec/{id}',[ClasseController::class,'delete'])->name('delete');

Route::post('Module',[ModuleController::class,'add'])->name('Module.add');
Route::put('/update_Module/{id}',[ModuleController::class,'update'])->name('update_Module');
Route::delete('/deletem/{id}',[ModuleController::class,'delete'])->name('delete');

Route::post('Etudiant',[EtudientController::class,'add'])->name('Etudiant.add');
Route::put('/update_Etudiant/{id}',[EtudientController::class,'update'])->name('update_Etudiant');
Route::delete('/delete_et/{id}',[EtudientController::class,'delete'])->name('delete');

Route::post('Enseignants',[EnseignantsController::class,'add'])->name('Enseignants.add');
Route::put('/update_Enseignants/{id}',[EnseignantsController::class,'update'])->name('update_Enseignants');
Route::delete('/delete_en/{id}',[EnseignantsController::class,'delete'])->name('delete');

Route::post('Seances',[SeancesController::class,'add'])->name('Seances.add');
Route::put('/update_Seances/{id}',[SeancesController::class,'update'])->name('update_Seances');
Route::delete('/deletes/{id}',[SeancesController::class,'delete'])->name('delete');
//users
Route::get('/users', [UserController::class, 'index']);
Route::put('/update_user/{id}',[UserController::class,'update'])->name('user.update');
Route::post('/add_user',[UserController::class,'add'])->name('user.add');
Route::get('/edit_user/{id}',[UserController::class,'edit']);
Route::delete('/delete_user/{id}',[UserController::class,'delete'])->name('user.delete');
});
