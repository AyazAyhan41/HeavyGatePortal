<?php

return [
    'title' => 'Verification System Messages Translation File',
    'text' => [
        'group_id_required' => 'Group ID is required field. Please try again.',
        'group_id_numeric' => 'Group ID can only contain numbers. Please try again.',

        'first_name_required' => 'Namespace is a required field. Please try again.',
        'first_name_string' => 'The namespace can only contain alphabetic characters. Please try again.',
        'first_name_min_length' => 'The name must contain at least 3 characters.',

        'sur_name_required' => 'The last name field is a required field. Please try again.',
        'sur_name_string' => 'The last name field can only contain alphabetic characters. Please try again.',
        'sur_name_min_length' => 'The surname must contain at least 3 characters.',

        'email_required' => 'The email field is a required field. Please try again.',
        'email_valid_email' => 'Your e-mail address is not legal. Please try again.',

        'password_required' => 'The password field is a required field. Please try again.',
        'password_min_length' => 'Password must be at least 3 characters. Please try again.',

        'password2_required' => 'The password field is a required field. Please try again.',
        'password2_min_length' => 'Password must be at least 3 characters. Please try again.',
        'password2_matches' => 'The passwords you entered do not match. Please try again.',

        'verify_key_required' => 'The authentication key is a required field. Please try again.',
        'verify_key_alpha' =>  'The verification key can only contain alphabetic characters. Please try again.',

        'verify_code_numeric'   =>  'The verification code can only contain numbers, please try again.',
        'verify_code_min_length'    =>  'The verification code must be at least 6 characters. Please try again.',

        'status_required'  =>  'User status is a required field. Please try again.',

        'groups_slug_required' => 'Slug Field It is a required field. please try again.',
        'group_slug_is_unique' => 'Slug Field must be Unique. please try again.',

        'group_title_required' => 'Title Field is a required field. Please try again.',

        'group_permissions_required' => 'Permission Field It is a required field. please try again.',

        'language_code_required' => 'Language Code Field This is a required field. please check.',
        'language_code_is_unique' => 'Language Code Field is a unique field. please check.',
        'language_code_min_length' => 'Language Code Field must consist of at least 2 characters. please check.',

        'language_flag_required' => 'Flag Field is a required field. please check.',
        'language_flag_min_length' => 'Flag Field must consist of at least 2 characters.',

        'language_title_required' => 'Language Title is a required field. please check.',

    ]
];