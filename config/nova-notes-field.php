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
    | Notes Model
    |--------------------------------------------------------------------------
    |
    | Optionally provide your own Note model.
    |
    */

    'notes_model' => \OptimistDigital\NovaNotesField\Models\Note::class,


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


    /*
    |--------------------------------------------------------------------------
    | Date format
    |--------------------------------------------------------------------------
    |
    | Set custom Moment JS date format.
    |
    */

    'date_format' => 'DD MMM YYYY HH:mm',


    /*
    |--------------------------------------------------------------------------
    | Trix input
    |--------------------------------------------------------------------------
    |
    | Set to 'true' if you wish to use the Trix WYSIWYG input instead
    | of the default textarea.
    |
    */

    'use_trix_input' => false,
];
