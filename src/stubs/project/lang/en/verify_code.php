<?php
    return [
        'title' => 'Verify Code',
        'code' => 'Code',
        'resent' => 'Verify code was resent',
        'resend' => 'Resend',
        'submit' => 'Check',
        'validation' => \Illuminate\Support\Arr::undot([
            'code.required' => '`Code` field is required',
            'code.min' => '`Code` field is too small',
            'code.max' => '`Code` field is too big',
            'code.wrong' => '`Code` value is wrong',
            'code.expired' => '`Code` is expired resend new',
        ]),
    ];
