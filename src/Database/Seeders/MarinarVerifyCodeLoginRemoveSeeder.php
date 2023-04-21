<?php
namespace Marinar\VerifyCodeLogin\Database\Seeders;

use Illuminate\Database\Seeder;
use Marinar\VerifyCodeLogin\MarinarVerifyCodeLogin;

class MarinarVerifyCodeLoginRemoveSeeder extends Seeder {

    use \Marinar\Marinar\Traits\MarinarSeedersTrait;

    public static function configure() {
        static::$packageName = 'marinar_verify_code_login';
        static::$packageDir = MarinarVerifyCodeLogin::getPackageMainDir();
    }

    public function run() {
        if(!in_array(env('APP_ENV'), ['dev', 'local'])) return;

        $this->autoRemove();

        $this->refComponents->info("Done!");
    }
}
