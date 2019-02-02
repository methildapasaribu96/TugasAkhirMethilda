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
    return view('pages.beranda');
});

Route::get('/informasi_sistem', function(){
  return view('guest.informasi_sistem');
});

Route::get('/informasi_nilai', function(){
  return view('guest.informasi_nilai');
});

Route::get('/informasi_ranking', function(){
  return view('guest.informasi_ranking');
});


Auth::routes();
Route::get('register', function () {
  return redirect('/');
})->name('register');
Route::get('logout', 'Auth\LoginController@logout');
// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/login', function(){
    if (auth()->check()) {
    return redirect('dashboard');
  } else {
    return view('auth.login');
  }
});

  Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function () {
  // Dashboard
  Route::get('/', 'DashboardController@index');
  Route::get('/teacher', 'DashboardController@teacher');
  Route::get('/criteria', 'DashboardController@criteria');
  Route::get('/grade', 'DashboardController@grade');
  Route::get('/ranking', 'DashboardController@ranking');
  //Route::get('/informasi_sistem','GuestController@informasi_sistem');
  
  // Teacher json
  Route::get('/teacher/table', 'TeacherController@table')->name('teacher');
  Route::resource('/teacher/json', 'TeacherController');

  // Criteria json
  Route::get('/criteria/table', 'CriteriaController@table')->name('criteria');
  Route::resource('/criteria/json', 'CriteriaController');

  // Grade json
  Route::get('/grade/table', 'GradeController@table')->name('grade');
  Route::resource('grade/json', 'GradeController');

  //Export Tabel Rangking
  Route::get('/exportranking', 'DashboardController@exportRangking');

});

 Route::get('/informasi_sekolah',function(){
    return view("guest.informasi_sekolah");
  });