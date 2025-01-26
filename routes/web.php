<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\Note;


Route::get('vuenotes','App\Http\Controllers\NotesController@index')->name('vuenotes.index');
Route::post('getnotes', 'App\Http\Controllers\NotesController@getNotes');
Route::post('createnotes', 'App\Http\Controllers\NotesController@createNote');
Route::post('deletenotes', 'App\Http\Controllers\NotesController@deleteNote');
Route::post('updatenotes', 'App\Http\Controllers\NotesController@updateNote');
