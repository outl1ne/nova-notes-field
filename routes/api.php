<?php

Route::get('/notes', '\OptimistDigital\NovaNotesField\Http\NotesController@getNotes');
Route::post('/notes', '\OptimistDigital\NovaNotesField\Http\NotesController@addNote');
