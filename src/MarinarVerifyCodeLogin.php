<?php
    namespace Marinar\VerifyCodeLogin;
    use Marinar\VerifyCodeLogin\Database\Seeders\MarinarVerifyCodeLoginInstallSeeder;

    class MarinarVerifyCodeLogin {

        public static function getPackageMainDir() {
            return __DIR__;
        }

        public static function injects() {
            return MarinarVerifyCodeLoginInstallSeeder::class;
        }
    }
