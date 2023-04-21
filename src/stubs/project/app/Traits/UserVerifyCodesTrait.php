<?php
namespace App\Traits;

use App\Models\VerifyCode;
use App\Notifications\VerifyCodeSend;
use Illuminate\Support\Facades\DB;

trait UserVerifyCodesTrait {

    public static function bootUserVerifyCodesTrait() {
        static::deleting( static::class.'@onDeleting_verifyCode' );
    }

    public function createVerifyCode() {
        DB::transaction(function() {
            $this->onDeleting_verifyCode($this);
            $this->verifyCode()->create([
                'code' => VerifyCode::random(
                    config('marinar_verify_code_login.code_length'),
                    config('marinar_verify_code_login.code_random_lower'),
                    config('marinar_verify_code_login.code_random_numeric'),
                    config('marinar_verify_code_login.code_random_symbols'),
                    config('marinar_verify_code_login.code_random_upper')
                )
            ]);
            $this->load('verifyCode');
        });
    }

    public function sendVerifyCode() {
        $this->createVerifyCode();
        $this->notify(new VerifyCodeSend());
    }

    public function verifyCode() {
        return $this->hasOne(VerifyCode::class, 'user_id', 'id');
    }

    public function onDeleting_verifyCode($model) {
        $model->loadMissing('verifyCode');
        $this->verifyCode?->delete();
    }
}
