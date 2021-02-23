<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Auth\LoginController;


Route::group(['prefix'=>'admin'],function(){
   
    Route::get('/login', [AdminLoginController::class, 'ShowLoginForm'])->name('admin.login');
    Route::post('/login', [AdminLoginController::class, 'Login'])->name('admin.login.submit');
    Route::get('/logout', [AdminLoginController::class, 'Logout'])->name('admin.logout');
    Route::get('/', [AdminController::class, 'index'])->name('admin.home');
   
});


Auth::routes();

Route::get('/student/manage-student', [HomeController::class, 'ManageStudent'])->name('manage-student');
Route::get('/student/enable-student/{id}', [HomeController::class, 'EnableStudent'])->name('enable-student');
Route::get('/student/view-marks', [HomeController::class, 'ViewMarks'])->name('view-marks');

Route::get('/student/disable-student/{id}', [HomeController::class, 'DisableStudent'])->name('disable-student');

//Admin Subject part
Route::get('/subject/add-subject', [SubjectController::class, 'add_subject'])->name('add-subject-form');
Route::post('/subject/save-subject', [SubjectController::class, 'save_subject'])->name('save-subject');
Route::get('/subject/subject-list', [SubjectController::class, 'SubjectList'])->name('subject-list');
Route::get('/subject/edit-subject/{id}', [SubjectController::class, 'EditSubject'])->name('edit-subject');
Route::post('/subject/update-subject/{id}', [SubjectController::class, 'UpdateSubject'])->name('update-subject');
Route::get('/subject/delete-subject/{id}', [SubjectController::class, 'DeleteSubject'])->name('delete-subject');
//Admin Question part
Route::get('/question/add-question', [QuestionController::class, 'AddQuestion'])->name('add-question-form');
Route::post('/question/save-question', [QuestionController::class, 'SaveQuestion'])->name('save-question');
Route::get('/question/view-question', [QuestionController::class, 'ViewQuestion'])->name('view-question');
Route::get('/question/edit-question/{id}', [QuestionController::class, 'EditQuestion'])->name('edit-question');
Route::post('/question/update-question/{id}', [QuestionController::class, 'UpdateQuestion'])->name('update-question');
Route::get('/question/delete-question/{id}', [QuestionController::class, 'DeleteQuestion'])->name('delete-question');


//student part
Route::get('/home', [StudentController::class, 'Dashboard'])->name('student-dashboard');
Route::get('/logout', [LoginController::class, 'StudentLogout'])->name('student.logout');
Route::get('/student/give-exam-form', [StudentController::class, 'GiveExamForm'])->name('give-exam-form');
Route::get('/student/give-exam/{subject_code?}', [StudentController::class, 'GiveExam'])->name('give-exam');
Route::post('/student/view-result/{code}', [StudentController::class, 'ViewResult'])->name('view-result');
Route::get('/student/view-ans/{code}', [StudentController::class, 'ViewAns'])->name('view-ans');
Route::get('/student/mistakes', [StudentController::class, 'Mistakes'])->name('mistakes');
Route::get('/student/show-profile', [StudentController::class, 'ShowPofile'])->name('show-profile');
Route::post('/student/update-profile/{email}', [StudentController::class, 'UpdatePofile'])->name('update-profile');

Route::get('/student/show-marks', [StudentController::class, 'ShowMarks'])->name('show-mark');
Route::get('/student/delete-mistke/{id}', [StudentController::class, 'DeleteMistake'])->name('delete-mistake');

