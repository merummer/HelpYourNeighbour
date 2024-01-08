<?php

use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\HelpController;
use App\Http\Controllers\ProfileController;
use App\Models\Blog;
use App\Models\Help;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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
    return view('/help/help', ['helps' => $helps]);

    return view('help');});
Route::post('/help', [HelpController::class, 'store'])->middleware(['auth'])->name('help');
Route::delete('/helps/{help}', [HelpController::class, 'destroy'])
    ->middleware(['auth']);

Route::get('/helps/{help:id}/edit', [HelpController::class, 'edit'])
    ->middleware('auth');

Route::patch('/helps/{help}', [HelpController::class, 'update'])
    ->middleware('auth');

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

Route::get('auth/google',[GoogleAuthController::class, 'redirect'])->name('google-auth');
Route::get('auth/google/call-back', [GoogleAuthController::class, 'callbackGoogle'] );


require __DIR__.'/auth.php';
