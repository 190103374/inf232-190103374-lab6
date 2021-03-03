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
 //RAW SQL
Route::get('/insert', function() {
    DB::insert("insert into student(name, date_of_birth, gpa, advisor) values('Nurzhakhan', '2002-03-28', 3.5, 'Zhangir Raev')");
});

Route::get('/select', function() {
    $results = DB::select("select * from student");
    foreach ($results as $student) {
        echo "name is ". $student->name . " date of birth is ". $student->date_of_birth . " GPA is ". 
        $student->gpa . " advisor is ". $student->advisor;
        echo "<br>";
    }
});

Route::get('/update', function() {
    $updated = DB::update("update student set gpa = 4.0 where id=?", [6]);
    return $updated;
});

Route::get('/delete', function() {
    $deleted = DB::delete("delete from student where id=?", [6]);
    return $deleted;
});


//MODEL
Route::get('/insert2', function() {
    $student = new Student;

    $student->name='Dastan';
    $student->date_of_birth='2002-02-24';
    $student->gpa=3.9;
    $student->advisor='Zhangir Raev';
    $student->save();
});

Route::get('/select2', function() {
    $students = Student::all();
    foreach($students as $student) {
        echo "name is ". $student->name . " date of birth is ". $student->date_of_birth . " GPA is ". 
        $student->gpa . " advisor is ". $student->advisor;
        echo "<br>";
    }
});

Route::get('/update2', function() {
    $student = Student::find(4);
    $student->name='Asel';
    $student->date_of_birth='2001-12-24';
    $student->advisor='Dauren';
    $student->save();
});

Route::get('/delete2', function() {
    $student = Student::find(5);
    $student->delete();
});