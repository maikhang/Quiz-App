<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\UserController;
// use App\Http\Controllers\Answer;
use Illuminate\Support\Facades\Route;

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

Auth::routes([
	'register'=>false,
	'reset'=> false,
	'verify'=> false,
]);

// Route::get('/', [App\Http\Controllers\HomeController::class, 'adminIndex'])->name('admin.index');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware'=>'isAdmin'], function(){
	Route::get('/welcome', function () {
		return view('admin.index');
	})->name('admin.index');

	Route::resource('quiz', QuizController::class);
	Route::resource('question', QuestionController::class);
	Route::resource('user', UserController::class);
	
	Route::get('/quiz/{id}/questions', [QuizController::class, 'questions'])->name('quiz.question');
});

// Route::delete('quiz/{id}/question/delete', [QuestionController::class, 'destroyInQuiz'])->name('destroyInQuiz');
// Route::post('quiz/{id}/question/update', [QuestionController::class, 'updateInQuiz'])->name('updateInQuiz');
