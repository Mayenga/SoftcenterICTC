<?php
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\SuperController;
use Illuminate\Support\Facades\Route;

Route::get('/register', [RegisteredUserController::class, 'create'])->middleware('guest')->name('register');

Route::post('/register', [RegisteredUserController::class, 'store'])->middleware('guest');

Route::get('/email_verification', [RegisteredUserController::class, 'email_verification'])
                ->middleware('guest')
                ->name('email_verification');
Route::post('/resend_code', [RegisteredUserController::class, 'resend_code'])
                ->middleware('guest')
                ->name('resend_code');
Route::post('/verify_email', [RegisteredUserController::class, 'verify_email'])
                ->middleware('guest')
                ->name('verify_email');
Route::get('/login', [AuthenticatedSessionController::class, 'create'])
                ->middleware('guest')
                ->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
                ->middleware('guest');

Route::get('/forgot_password', [SuperController::class, 'forgot_password']); 
Route::post('/forgot_password', [SuperController::class, 'forgot_password_function']);
Route::get('/forgot_password_newpasswordlink/{id}', [SuperController::class, 'forgot_password_newpasswordlink']);


Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
                ->middleware('guest')
                ->name('password.reset');

Route::post('/reset-password', [NewPasswordController::class, 'store'])
                ->middleware('guest')
                ->name('password.update');

Route::get('/verify-email', [EmailVerificationPromptController::class, '__invoke'])
                ->middleware('auth')
                ->name('verification.notice');

Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
                ->middleware(['auth', 'signed', 'throttle:6,1'])
                ->name('verification.verify');

Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware(['auth', 'throttle:6,1'])
                ->name('verification.send');

Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->middleware('auth')
                ->name('password.confirm');

Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store'])
                ->middleware('auth');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
                ->middleware('auth')
                ->name('logout');

Route::post('/changepassword', [SuperController::class, 'changepassword'])
                ->middleware('auth')
                ->name('changepassword');

Route::post('/chaangeuserinfo', [SuperController::class, 'chaangeuserinfo'])
                ->middleware('auth')
                ->name('chaangeuserinfo');
Route::post('/contact_form', [SuperController::class, 'contact_form'])
                ->middleware('guest')
                ->name('contact_form');

Route::post('/listData', [SuperController::class, 'listData'])
                ->middleware('guest')
                ->name('listData');

Route::get('startup-download-file', [PDFController::class,'startup_download']);

Route::post('/sendVerificationCode', [RegisteredUserController::class, 'sendVerificationCode'])
                ->middleware('guest')
                ->name('sendVerificationCode');
