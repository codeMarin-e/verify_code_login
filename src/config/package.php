<?php
	return [
		'install' => [
            'php artisan db:seed --class="\Marinar\VerifyCodeLogin\Database\Seeders\MarinarVerifyCodeLoginInstallSeeder"',
		],
        'remove' => [
            'php artisan db:seed --class="\Marinar\VerifyCodeLogin\Database\Seeders\MarinarVerifyCodeLoginRemoveSeeder"',
        ]
	];
