<?php

namespace OptimistDigital\NovaNotesField;

use Laravel\Nova\Fields\Field;

class NotesField extends Field
{
    public $component = 'nova-notes-field';
    public $showOnCreation = false;
    public $showOnUpdate = false;
    public $showOnIndex = false;
}
