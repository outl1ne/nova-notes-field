<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Table Name
    |--------------------------------------------------------------------------
    |
    | Optionally provide your own table name for the notes table.
    | Default is `nova_notes`.
    |
    */

    'table_name' => 'nova_notes',


    /*
    |--------------------------------------------------------------------------
    | Avatar URL
    |--------------------------------------------------------------------------
    |
    | Callable which allows you to generate your own URL for the user. The
    | input parameter is the user model. By default, Gravatar is used
    | for the user's avatars.
    |
    | For example:
    | function (User $user) {
    |   return $user->getAvatarUrl();
    | }
    |
    */

    'get_avatar_url' => null,
];
