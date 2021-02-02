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
    | Return the model attribute that accesses the avatar url.
    |
    | For example
    | 'get_avatar_url' => 'avatar_url',
    |
    | This assumes that you have the following on your User model:
    | public function getAvatarUrlAttribute(): string
    | {
    |   //Code to return the correct avatar url
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
