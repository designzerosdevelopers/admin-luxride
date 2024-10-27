<?php

use App\Http\Controllers\Admin\InquiryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SettingController;
use App\Models\Inquiry;

Route::get('/dashboard', function () {
    //return view('adminside.dashboard');
        return view('adminside.inquiry.index',['inquiries'=> Inquiry::with('car')->get()]);

})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::patch('/upload-profile-picture', [ProfileController::class, 'profile_picture'])->name('upload.profile.picture');



    Route::resource('inquiry', InquiryController::class);
    Route::resource('setting', SettingController::class);
});

require __DIR__ . '/auth.php';
