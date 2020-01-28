 <?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('register', 'PetugasController@register');
Route::post('login', 'PetugasController@login');
Route::get('/',function(){
  return Auth::user()->level;
})->middleware('jwt.verify');

//tabel buku

Route::post('buku','BukuController@store')->middleware('jwt.verify');
Route::get('buku', 'BukuController@tampil')->middleware('jwt.verify');
Route::put('buku/{id}', 'BukuController@update')->middleware('jwt.verify');
Route::delete('buku/{id}', 'BukuController@delete')->middleware('jwt.verify');

//tabel Anggota

Route::post('anggota','AnggotaController@store')->middleware('jwt.verify');
Route::get('anggota', 'AnggotaController@tampil')->middleware('jwt.verify');
Route::put('anggota/{id}', 'AnggotaController@update')->middleware('jwt.verify');
Route::delete('anggota/{id}', 'AnggotaController@delete')->middleware('jwt.verify');

//tabel Peminjaman

Route::post('peminjaman','PeminjamanController@store')->middleware('jwt.verify');
Route::get('peminjaman', 'PeminjamanController@tampil')->middleware('jwt.verify');
Route::put('peminjaman/{id}', 'PeminjamanController@update')->middleware('jwt.verify');
Route::delete('peminjaman/{id}', 'PeminjamanController@delete')->middleware('jwt.verify');
