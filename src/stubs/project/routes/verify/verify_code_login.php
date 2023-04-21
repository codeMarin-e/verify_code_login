<?php
    Route::get('/verify_code', [\App\Http\Controllers\VerifyCodeController::class, 'index'])->name('verify_code.view');
    Route::post('/verify_code', [\App\Http\Controllers\VerifyCodeController::class, 'verifyCode'])->name('verify_code.check')
        ->middleware('throttle:verify_code');
    Route::get('/verify_code/resend', [\App\Http\Controllers\VerifyCodeController::class, 'resend'])->name('verify_code.resend')
        ->middleware('throttle:verify_code');
