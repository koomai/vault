<?php

/*
|--------------------------------------------------------------------------
| Vault Language File
|--------------------------------------------------------------------------
|
| This file contains all the copy used in the app. You can use it to easily
| customise the copy in another language or simply change some text.
|
*/

return [

    'copy'      => [
            'heading'       => 'Vault',
            'sub_heading'   => 'Share sensitive information securely',
            'footer'		=> 'Built with <a href="http://lumen.laravel.com/">Lumen</a> and <a href="http://semantic-ui.com/">Semantic UI</a>.',
    ],

    'sidebar'   =>  [
        'intro' 		    => 'Sensitive information sent via email lives forever. Not with Vault.',
        'intro2' 		    => 'Great for sharing login details and passwords with coworkers and clients.',
        'intro3'     	    => 'Don\'t be a n00b. Use Vault to send passwords and logins securely.',
    ],

    'form'      => [
        'text_label'        => 'Text to Encrpyt',
        'text_placeholder'  => 'Enter text here',
        'password_label'    => 'Password',
        'password_placeholder'  => 'Password to decrypt text',
        'expire_label'      => 'Text Expires After',
        'minutes'			=> ':minutes Minutes',
        'hour'     			=> ':hour Hour',
        'hours'     		=> ':hours Hours',
        'days'     			=> ':days Days',
        'submit_button'		=> 'Create Private Encrypted Link',

        'decrypt_password_label'        => 'Password',
        'decrypt_password_placeholder'	=> 'Enter the password you received with the link',
        'secret_text_label'             => 'Secret Text',
        'decrypt_button'                => 'Display Message',
    ],

    'error_title'           => 'Oops! Something went wrong.',
    'error_text'            => 'There was an error encrypting your text. Please try again.',
    'incorrect_password_title'  => 'Incorrect Password',
    'incorrect_password_text'   => 'Please try again with the correct password.',

    'loader_text'           => 'Decrypting',
    'copy_to_clipboard'		=> 'Copy URL to Clipboard & Close',
    'modal_title'			=> 'Your text has been successfully encrypted',
    'modal_text'			=> 'Share your encrypted message using the link and password below.',
    'modal_message'			=> "Temporary Encrypted Link\n------------------------------------------\nURL:         %link%\nPassword: %password%\n------------------------------------------\n",

    'expired_link_title'		=> 'This link has expired.',
    'expired_link_text'			=> 'The contents of this link has been deleted and is no longer available.',
];
