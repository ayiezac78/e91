<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\DB;

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
/*
Route::get('/about', function () {
    return view('about');
});
Route::get('/home', function () {
    return view('home');
});
Route::get('/welcome', function () {
    return view('welcome');
});
//Route::get('/services-fadsfasd-fasdfasd', [ContactController::class, 'index'])->name('services')->middleware('check');
Route::get('/services-fadsfasd-fasdfasd', [ContactController::class, 'index'])->name('services');
*/

//this route is automatically provided upon installing jetstream
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        //eloquent ORM getting all the data
        //$users=User::all();
        //query builder
        $users=DB::table('users')->get();
        return view('dashboard', compact('users'));
    })->name('dashboard');
});
