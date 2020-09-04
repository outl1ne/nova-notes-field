<?php

namespace OptimistDigital\NovaNotesField\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Laravel\Nova\Nova;

class NotesController extends Controller
{
    // GET /notes
    public function getNotes(Request $request)
    {
        $validationResult = $this->validateRequest($request);
        if ($validationResult['has_errors'] === true) return response($validationResult['errors'], 400);

        $model = $validationResult['model'];
        $notes = $model->notes()->orderBy('created_at', 'DESC')->orderBy('id', 'DESC')->get();

        return response()->json([
            'date_format' => config('nova-notes-field.date_format', 'DD MMM YYYY HH:mm'),
            'trix_enabled' => config('nova-notes-field.use_trix_input', false),
            'notes' => $notes,
        ], 200);
    }

    // POST /notes
    public function addNote(Request $request)
    {
        $validationResult = $this->validateRequest($request);
        if ($validationResult['has_errors'] === true) return response($validationResult['errors'], 400);

        $model = $validationResult['model'];
        $note = $request->input('note');

        if (empty($note)) return response(['errors' => ['note' => 'required']], 400);

        $model->addNote($note, true, false);

        return response('', 204);
    }

    // DELETE /notes
    public function deleteNote(Request $request)
    {
        $validationResult = $this->validateRequest($request);
        if ($validationResult['has_errors'] === true) return response()->json($validationResult['errors'], 400);

        $model = $validationResult['model'];
        $noteId = $request->input('noteId');

        if (empty($noteId)) return response()->json(['errors' => ['noteId' => 'required']], 400);

        $note = $model->notes()->where('id', $noteId)->first();
        if (empty($noteId)) return response('', 204);

        if (!$note->canDelete) return response()->json(['error' => 'unauthorized'], 400);

        $model->deleteNote($noteId);

        return response('', 204);
    }

    private function validateRequest(Request $request)
    {
        $resourceId = $request->get('resourceId');
        $resourceName = $request->get('resourceName');

        $errors = [];
        if (empty($resourceId)) $errors['resourceId'] = 'required';
        if (empty($resourceName)) $errors['resourceName'] = 'required';

        if (!empty($resourceName)) {
            $resourceClass = Nova::resourceForKey($resourceName);
            if (empty($resourceClass)) $errors['resourceName'] = 'invalid_name';
            else {
                $modelClass = $resourceClass::$model;
                $model = $modelClass::find($resourceId);
                if (empty($model)) $errors['resourceId'] = 'not_found';
            }
        }

        return [
            'has_errors' => sizeof($errors) > 0,
            'errors' => $errors,
            'model' => isset($model) ? $model : null,
        ];
    }
}
