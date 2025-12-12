<?php

use App\Http\Controllers\Admin\AnnouncementController;
use App\Http\Controllers\Admin\QualificationController;
use App\Http\Controllers\QuestionController as AppQuestionController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\QuestionTypeController;
use App\Http\Controllers\SubjectController as AppSubjectController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\TextbookController;
use App\Http\Controllers\TextbookController as AppTextbookController;
use App\Http\Controllers\TopicController as AppTopicController;
use App\Http\Controllers\Admin\TopicController;
use App\Http\Controllers\Admin\UploadImageController;
use App\Http\Controllers\UserAttemptController as AppUserAttemptController;
use App\Http\Controllers\Admin\UserAttemptController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLogin'])->name('show.login');
    Route::post('/login', [LoginController::class, 'login'])->name('login');

    Route::get('/register', [RegisterController::class, 'showRegistration'])->name('show.register');
    Route::post('/register', [RegisterController::class, 'register'])->name('register');

    Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('admin.show.login');
    Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login');
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{id}', [BlogController::class, 'show'])->name('blog.show');
Route::get('textbooks', [AppTextbookController::class, 'index'])->name('textbooks');
Route::get('/textbooks/{id}/download', [AppTextbookController::class, 'download'])
    ->name('textbooks.download');
Route::get('/subjects/{question_type_id}', [AppSubjectController::class, 'index'])->name('subjects');

Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    Route::get('profile', [ProfileController::class, 'profile'])->name('profile');
    Route::put('profile/{user}', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('/questions/{question_type}/subject/{subject}/test/{topic?}', [AppQuestionController::class, 'test'])->name('questions.test');
    Route::get('/questions/{question_type}/subject/{subject}/topics', [AppTopicController::class, 'list'])->name('topics.list');

    Route::post('/attempt/submit', [AppUserAttemptController::class, 'submit'])->name('attempt.submit');
});

Route::prefix('admin')->middleware('admin')->group(function () {
    Route::resource('qualifications', QualificationController::class);
    Route::resource('subjects', SubjectController::class);
    Route::resource('question-types', QuestionTypeController::class);
    Route::resource('topics', TopicController::class);
    Route::resource('questions', QuestionController::class);
    Route::resource('announcements', AnnouncementController::class);
    Route::resource('textbooks', TextbookController::class);

    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::get('users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

    Route::get('user-attempts', [UserAttemptController::class, 'index'])->name('user-attempts.index');
    Route::delete('user-attempts/{user_attempt}', [UserAttemptController::class, 'destroy'])->name('user-attempts.destroy');

    Route::post('/admin/upload-image', [UploadImageController::class, 'uploadImage'])->name('admin.upload.image');
    Route::get('/topics/by-subject/{subject}', [TopicController::class, 'bySubject'])->name('admin.topics.by.subject');

    Route::get('/dashboard', static function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});
