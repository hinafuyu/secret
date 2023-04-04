<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SpotsController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\BookmarksController;
use App\Models\Bookmark;
use PHPUnit\Framework\Attributes\RunTestsInSeparateProcesses;

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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


/**
 * SpotsController
 */
// /,/indexでindex()関数を実行
Route::get('/', [SpotsController::class, 'index'])->name('/');
Route::get('/index', [SpotsController::class, 'index'])->name('index');

// /indexPでindexP()を実行
Route::get('/indexP', [SpotsController::class, 'indexP'])->name('indexP');

// /indexAでindexA()を実行
Route::get('/indexA', [SpotsController::class, 'indexA'])->name('indexA');

// /secretでsecret()を実行
Route::get('/secret', [SpotsController::class, 'secret']);

// /secretPでsecretP()を実行
Route::get('/secretP', [SpotsController::class, 'secretP']);

// /secretAでsecretA()を実行
Route::get('/secretA', [SpotsController::class, 'secretA']);

// /でshowUser()を実行
Route::get('/index', [SpotsController::class, 'showUser'])->name('showUser');

// /bookmarkでlike()を実行
Route::post('/bookmark', [BookmarksController::class, 'like'])->name('spot.like');

/**
 * ContactsController
 */
// /contactでsend関数を実行
Route::post('/contact', [ContactsController::class, 'send'])->name('inquery');

// /adminListでadmincontact()を実行
Route::get('/adminList', [ContactsController::class, 'admincontact'])->name('admincontact');

// /completeでcomplete()を実行
Route::get('/complete', [ContactsController::class, 'complete'])->name('secret.complete');

// /contactでcotanct()を実行
Route::get('/contact', [ContactsController::class, 'contact'])->name('contact');

// /adminList/{id}でdelContact()を実行
Route::get('/adminList/{id}', [ContactsController::class, 'delContact'])->name('delContact');

/**
 * BookmarksController
 */
// /indexP,/secretPでlike()を実行
Route::post('/indexP', [BookmarksController::class, 'like']);
Route::post('/secretP', [BookmarksController::class, 'like']);
Route::post('/bookmark', [BookmarksController::class, 'like']);

// /bookmarkでbookmark()を実行
Route::get('/bookmark', [BookmarksController::class, 'bookmark'])->name('bookmark');
