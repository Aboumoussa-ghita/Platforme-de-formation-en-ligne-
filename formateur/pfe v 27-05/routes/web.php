<?php
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategController;
use App\Http\Controllers\ChapitreController;
use App\Http\Controllers\essai;
use App\Http\Controllers\TestController;
use App\Http\Controllers\FormateurController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login',[AuthController::class,'login']);
Route::get('/insc_formateur',[AuthController::class,'registr_form']);
Route::get('/insc_apprenti',[AuthController::class,'registr_app']);
Route::post('/apprenti_inscription',[AuthController::class,'apprenti_inscription'])->name('apprenti_inscription');
Route::post('/formateur_inscription',[AuthController::class,'formateur_inscription'])->name('formateur_inscription');

Route::post('/login2',[AuthController::class,'login_2'])->name('login');
//Route::post('login_formateur',[AuthController::class,'login_formateur'])->name('login_form');
Route::get('/test_de_competences', [TestController::class,'test'] )->name('test_comp');
// route pour page d accueil du formateur : Route::get('/formateur/home',[FormController::class,'form_home']);
Route::get('/categories', [CategController::class,'choix'] );
Route::post('/ajout_categ',[CategController::class,'categ_ajout'])->name('ajout_categ');
Route::get('/new_for',[FormateurController::class,'creation']);
Route::post('/ajout_for',[FormateurController::class,'ajout_for'])->name('ajout_for');
Route::get('/chapitre{i}',[ChapitreController::class,'ajout_chap']);
Route::post('/soumettre_chap',[ChapitreController::class,'submit'])->name('soumettre_chap');

Route::get('/essai',[essai::class,'add']);
Route::post('/essai_2',[essai_2::class,'store'])->name('essai_2');

?>