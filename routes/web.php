<?php

use Illuminate\Support\Facades\Route;
use App\Student;

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
    return view('welcome');
});

Route::get('/insert', function() {
    DB::insert("insert into student(name, date_of_birth, gpa, advisor) values('Nurzhakhan', '2002-03-28', 3.5, 'Zhangir Raev')");
});

Route::get('/insert2', function() {
    $student = new Student;

    $student->name='Arman';
    $student->date_of_birth='2002-02-24';
    $student->gpa=3.8;
    $student->advisor='Maksat';
    $student->save();
});