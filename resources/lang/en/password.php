<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Password Reset Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are the default lines which match reasons
    | that are given by the password broker for a password update attempt
    | has failed, such as for an invalid token or invalid new password.
    |
    */

    'reset' => 'Your password has been reset!',
    'sent' => 'We have emailed your password reset link!',
    'throttled' => 'Please wait before retrying.',
    'token' => 'This password reset token is invalid.',
    'user' => "We can't find a user with that email address.",

    'required' => "Passwords must not be left blank.",
    'min' => "Password at least :min characters.",
    'incorrect' => "Incorrect password.",
    'change_success' => "Change password successfully.",
    'validate_failed' => "Validate password failed.",
    'new' => [
        'required' => "New passwords must not be left blank.",
        'min' => "New password at least :min characters.",
    ],
    'renew' => [
        'required' => "Re-new passwords must not be left blank.",
        'min' => "Re-new password at least :min characters.",
        'incorrect' => "Re-enter new incorrect password.",
    ]
];
