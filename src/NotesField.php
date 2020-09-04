<?php

namespace OptimistDigital\NovaNotesField;

use Laravel\Nova\Fields\Field;

class NotesField extends Field
{
    public $component = 'nova-notes-field';
    public $showOnCreation = false;
    public $showOnIndex = false;

    public $showAddNote = true;

    /**
     * NovaNotesField constructor.
     *
     * @param $name
     * @param null $attribute
     * @param callable|null $resolveCallback
     */
    public function __construct($name, $attribute = null, callable $resolveCallback = null)
    {
        parent::__construct($name, $attribute, $resolveCallback);

        $this->withMeta([
            'showAddNote' => $this->showAddNote,
        ]);
    }

    /**
     * Sets the placeholder value displayed on the field.
     *
     * @param string $placeholder
     * @return NotesField
     **/
    public function placeholder($placeholder)
    {
        return $this->withMeta(['placeholder' => $placeholder]);
    }

    /**
     * Show or hide the AddNote input.
     *
     * @param string $showAddNote
     * @return NotesField
     **/
    public function showAddNoteButton($showAddNote)
    {
        return $this->withMeta(['showAddNote' => $showAddNote]);
    }


}
