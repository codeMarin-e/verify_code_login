<?php
namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Contracts\LoginResponse;

class VerifyCodeController extends Controller
{
    public function index() {
        return view('verify_code');
    }

    public function resend() {
        auth()->user()->sendVerifyCode();
        return back()->with('resent', 1);
    }

    public function verifyCode(Request $request) {
        $inputs = request()->all();
        $inputs = $inputs['verify']?? [];
        if(empty($inputs)) {
            throw ValidationException::withMessages([
                'no_data' => trans('verify_code.validation.no_data'),
            ]);
        }
        $authUser = auth()->user();
        $messages = Arr::dot((array)trans('verify_code.validation'));
        $rules = [
            'code' => [
                'required',
                'max:'.config("marinar_verify_code_login.code_length"),
                'min:'.config("marinar_verify_code_login.code_length"),
                function($attribute, $value, $fail) use ($authUser){
                    if(!$authUser->verifyCode) return;
                    if(now()->subMinutes( config('marinar_verify_code_login.code_expire_in') ) > $authUser->verifyCode->created_at) {
                        return $fail( trans('verify_code.validation.code.expired') );
                    }
                    if($authUser->verifyCode && $authUser->verifyCode->code !== $value) {
                        return $fail( trans('verify_code.validation.code.wrong') );
                    }
                }
            ]
        ];

        // @HOOK_VALIDATE

        Validator::make($inputs, $rules, $messages)->validateWithBag('verify');

        $authUser->onDeleting_verifyCode($authUser);

        return app(LoginResponse::class);
    }
}
