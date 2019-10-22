<?php

namespace OptimistDigital\NovaNotesField\Traits;

use Illuminate\Support\Facades\Auth;
use OptimistDigital\NovaNotesField\Models\Note;

trait HasNotes
{
    public function addActivity($activityText, $system = true)
    {
        $user = Auth::user();
        return $this->notes()->create([
            'text' => $activityText,
            'created_by' => isset($user) ? $user->id : null,
            'system' => $system,
        ]);
    }

    public function addNote($note)
    {
        return $this->notes()->create([
            'text' => $note,
            'created_by' => Auth::user()->id,
            'system' => false,
        ]);
    }

    public function notes()
    {
        return $this->morphMany(Note::class, 'notable');
    }
}
