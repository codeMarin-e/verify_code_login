<?php
return [
    implode(DIRECTORY_SEPARATOR, [ base_path(), 'config', 'marinar.php']) => [
        "// @HOOK_MARINAR_CONFIG_ADDONS" => "\t\t\\Marinar\\VerifyCodeLogin\\MarinarVerifyCodeLogin::class, \n"
    ],
    implode(DIRECTORY_SEPARATOR, [ base_path(), 'app', 'Models', 'User.php']) => [
        "// @HOOK_TRAITS" => "\t\t use \\App\\Traits\\UserVerifyCodesTrait; \n"
    ],
];
