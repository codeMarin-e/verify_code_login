<?php

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;

if(in_array(request()->whereIAm(),(array)config('marinar_verify_code_login.environments'))) {
    RateLimiter::for('verify_code', function (Request $request) {
        return Limit::perMinute(5)->by($request->user()?->id ?: $request->ip());
    });

    \Illuminate\Support\Facades\Event::listen(
        \Illuminate\Auth\Events\Login::class,
        [\App\Listeners\VerifyCodeLoginListener::class, 'handle']
    );
}
