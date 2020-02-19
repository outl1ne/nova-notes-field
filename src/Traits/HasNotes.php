<?php

namespace OptimistDigital\NovaNotesField\Traits;

use Illuminate\Support\Facades\Auth;
use OptimistDigital\NovaNotesField\FieldServiceProvider;

trait HasNotes
{
    /**
     * Creates a new note and attaches it to the model.
     *
     * @param string $note The note text which can contain raw HTML.
     * @param bool $user Enables or disables the use of `Auth::user()` to set as the creator.
     * @param bool $system Defines whether the note is system created and can be deleted or not.
     * @return \OptimistDigital\NovaNotesField\Models\Note
     **/
    public function addNote($note, $user = true, $system = true)
    {
        $user = $user ? Auth::user() : null;
        return $this->notes()->create([
            'text' => $note,
            'created_by' => isset($user) ? $user->id : null,
            'system' => $system,
        ]);
    }

    /**
     * Deletes a note with given ID and dissociates it from the model.
     *
     * @param int|string $noteId The ID of the note to delete.
     * @return void
     **/
    public function deleteNote($noteId)
    {
        $this->notes()->where('id', '=', $noteId)->delete();
    }

    public function notes()
    {
        return $this->morphMany(FieldServiceProvider::getNotesModel(), 'notable');
    }
}
