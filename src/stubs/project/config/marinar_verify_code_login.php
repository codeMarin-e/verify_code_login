<?php
return [
    /**
     * Behavior when package is installed or update
     * true - normal
     * false - do not do anything
     */
    'install_behavior' => env('MARINAR_VERIFY_CODE_LOGIN_INSTALL_BEHAVIOR', env('MARINAR_INSTALL_BEHAVIOR', true)),

    /**
     * Behavior when package is removed from composer
     * true - delete all
     * false - delete all, but not changed stubs files
     * 1 - delete all, but keep the stub files and injection
     * 2 - keep everything
     */
    'delete_behavior' => env('MARINAR_VERIFY_CODE_LOGIN_DELETE_BEHAVIOR', env('MARINAR_DELETE_BEHAVIOR', false)),

    /**
     * File stubs that return arrays that are configurable,
     * If path is directory - its files and sub directories
     */
    'values_stubs' => [
        __DIR__,
        dirname(__DIR__).DIRECTORY_SEPARATOR.'lang'
    ],

    /**
     * Exclude stubs to be updated
     * If path is directory - exclude all its files
     * If path is file - only it
     */
    'exclude_stubs' => [
        dirname(dirname(__DIR__)).DIRECTORY_SEPARATOR.'public_html'.DIRECTORY_SEPARATOR.'admin'.DIRECTORY_SEPARATOR.'ext_icons',
        // @HOOK_CONFIG_EXCLUDE_STUBS
    ],

    /**
     * Exclude addon injections
     * file_path => [ '@hook1', '@hook2' ]
     * file_path => * - all from this file
     */
    'exclude_injects' => [
        // @HOOK_CONFIG_EXCLUDE_INJECTS
    ],

    /**
     * Disk driver to be used - check filesystem.php
     * null - use the default
     */
    'disk' => null,

    /**
     * Keep original file name when uploading. Not very safe if true
     */
    'keep_original_name' => false,

    /**
     * Addons hooked to the package
     */
    'addons' => [
        // @HOOK_CONFIG_ADDONS
    ],

    /**
     * In which environments - whereIam
     */
    'environments' => ['web'],

    /**
     * Middleware redirect route name if not loged user is not code verified
     */
    'middleware_redirect' => 'verify_code.view',

    /**
     * Verify code string random characters
     */
    'code_random_lower' => false, //to use lower case letters
    'code_random_numeric' => true, //to use digits
    'code_random_symbols' => false, //to use special symbols
    'code_random_upper' => false, //to use upper case letters

    /**
     * How many characters verify code to have
     */
    'code_length' => 6,

    /**
     * Which notification channels to be used
     */
    'notification_channels' => ['mail', \App\Models\FrontSmsChannel::class],

    /**
     * Minutes untill code expired
     */
    'code_expire_in' => 2

    // @HOOK_CONFIG
];

