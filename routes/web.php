<?php

use App\Http\Controllers\HelpController;
use App\Http\Controllers\ProfileController;
use App\Models\Blog;
use App\Models\Help;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/help', function (){
    $helps = Help::all();
    return view('/help', ['helps' => $helps]);

    return view('help');});
Route::post('/help', [HelpController::class, 'store'])->middleware(['auth'])->name('help');



Route::post('/addblog',[BlogController::class, 'store'])->middleware(['auth'])->name('addblog');
Route::get('/blog',function (){

    $blogs = Blog::all();
    $blogs = $blogs->sortBy([
        ['created_at', 'asc'],
    ]);


    return view('/blog', ['blogs' => $blogs]);



})->name('blog');

Route::get('/requests', function () {

    $helps = Help::all();

    return view('requests.indexrequest', ['helps' => $helps]);
})  ->name('requests.indexrequest')
    ->middleware(['auth']);

require __DIR__.'/auth.php';
