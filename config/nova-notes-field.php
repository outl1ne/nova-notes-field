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
    | Callable or the model attribute that accesses the avatar URL.
    |
    | For example:
    | 'get_avatar_url' => fn($user) => $user->getAvatarUrl();
    | // or
    | 'get_avatar_url' => 'avatarUrl'
    |
    | This assumes that you have the following on your User model:
    | public function getAvatarUrlAttribute() {}
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


    /*
    |--------------------------------------------------------------------------
    | Full-width inputs
    |--------------------------------------------------------------------------
    |
    | Set to 'true' if you wish to use the full width for the input.
    |
    */

    'full_width_inputs' => false,

    /*
    |--------------------------------------------------------------------------
    | Display order
    |--------------------------------------------------------------------------
    |
    | Set to the order used for displaying notes.
    |
    */

    'display_order' => 'DESC',

];
