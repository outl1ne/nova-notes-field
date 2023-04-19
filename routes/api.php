<?php

Route::get('/notes', 'NotesController@getNotes');
Route::post('/notes', 'NotesController@addNote');
Route::delete('/notes', 'NotesController@deleteNote');
Route::patch('/notes', 'NotesController@editNote');
