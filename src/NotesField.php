<?php

namespace OptimistDigital\NovaNotesField;

use Laravel\Nova\Fields\Field;

class NotesField extends Field
{
    public $component = 'nova-notes-field';
    public $showOnCreation = false;
    public $showOnIndex = false;

    /**
     * Sets the placeholder value displayed on the field.
     *
     * @param string $placeholder
     * @return \OptimistDigital\NovaNotesField\NotesField
     **/
    public function placeholder($placeholder)
    {
        return $this->withMeta(['placeholder' => $placeholder]);
    }
}
