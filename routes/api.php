<?php

Route::get('/notes', 'NotesController@getNotes');
Route::post('/notes', 'NotesController@addNote');
