<?php

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
    return view('absencontent');
    // return view('welcome');
});

Route::get('/gettgl','PagesController@GetTgl');

Route::get('cekpr','PagesController@Cekabsen_cs');

Route::get('lst_pr/{nis}','PagesController@Lst_presensi');

// Route::get('getabsen/{tgl}','PagesController@GetAbsen');
Route::get('getabsen','PagesController@GetAbsen');

Route::get('tmb',function(){

  DB::table('tb_kelas')->insert([
     [
       'tk'=>'kelas 2'
     ]
   ]);
});
