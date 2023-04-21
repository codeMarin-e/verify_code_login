<?php

    namespace App\Http\Middleware;

    use Closure;
    use Illuminate\Support\Facades\URL;
    use Illuminate\Support\Facades\View;

    class VerifyCodeMiddleware
    {
        /**
         * Handle an incoming request.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  \Closure  $next
         * @return mixed
         */
        public function handle($request, Closure $next)
        {
            $authUser = auth()->user();
            if($authUser->verifyCode) {
                return redirect()->route( config('marinar_verify_code_login.middleware_redirect') );
            }

            return $next($request);
        }
    }
