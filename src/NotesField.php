<?php

namespace OptimistDigital\NovaNotesField;

use Laravel\Nova\Fields\Field;

class NotesField extends Field
{
    public string   $component = 'nova-notes-field';
    public bool     $showOnCreation = false;
    public bool     $showOnIndex = false;

    public string   $inputWidth = 'w-3/5';
    public bool     $showAddNote = true;

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
            'showAddNote' => $this->showAddNote
        ]);
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
            'placeholder' => null,
            'addingNotesEnabled' => true,
            'fullWidth' => config('nova-notes-field.full_width_inputs', false),
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
     * @param string $addingNotesEnabled
     * @return NotesField
     **/
    public function addingNotesEnabled($addingNotesEnabled = true)
    {
        return $this->withMeta(['addingNotesEnabled' => $addingNotesEnabled]);
    }

    /**
     * Show or hide the AddNote input.
     *
     * @param boolean $fullWidth
     * @return NotesField
     **/
    public function fullWidth($fullWidth = true)
    {
        return $this->withMeta(['fullWidth' => $fullWidth]);
    }

}
