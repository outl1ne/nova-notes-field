<?php

namespace OptimistDigital\NovaNotesField\Traits;

use OptimistDigital\ZaveEcommerce\Models\OrderActivityItem;
use Illuminate\Support\Facades\Auth;
use OptimistDigital\NovaNotesField\Models\Note;

trait HasNotes
{
    public function addActivity($activityText, $system = true)
    {
        $user = Auth::user();
        return OrderActivityItem::create([
            'order_id' => $this->id,
            'text' => $activityText,
            'created_by' => isset($user) ? $user->id : null,
            'system' => $system,
        ]);
    }

    public function addNote($note)
    {
        return OrderActivityItem::create([
            'order_id' => $this->id,
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
