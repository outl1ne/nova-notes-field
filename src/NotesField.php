<?php

namespace OptimistDigital\NovaNotesField;

use Laravel\Nova\Fields\Field;

class NotesField extends Field
{
    public $component = 'nova-notes-field';
    public $showOnCreation = false;
    public $showOnIndex = false;

    public $inputWidth = 'w-3/5';
    public $showAddNote = true;
    public $showNotes = true;

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
            'inputWidth' => $this->inputWidth,
            'showAddNote' => $this->showAddNote,
            'showNotes' => $this->showNotes
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
     * Sets the input size.
     *
     * @param string $inputWidth
     * @return NotesField
     **/
    public function inputWidth($inputWidth)
    {
        return $this->withMeta(['inputWidth' => $inputWidth]);
    }

    /**
     * Show or hide the AddNote input.
     *
     * @param string $showAddNote
     * @return NotesField
     **/
    public function showAddNote($showAddNote)
    {
        return $this->withMeta(['showAddNote' => $showAddNote]);
    }

    /**
     * Show or hide the notes section
     *
     * @param string $showNotes
     * @return NotesField
     **/
    public function showNotes($showNotes)
    {
        return $this->withMeta(['showNotes' => $showNotes]);
    }
    
}
