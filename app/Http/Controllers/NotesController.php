<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    public function index()
    {
        return view('notes.vuenotes');
    }

    public function getNotes(Request $request)
    {
        $notes = Note::all();
        return response()->json($notes);
    }

    public function createNote(Request $request)
    {
        $note = new Note();
        $note->title = $request->title;
        $note->content = $request->content;
        $note->save();
        return response()->json($note);
    }

    public function deleteNote(Request $request)
    {
        $note = Note::find($request->id);
        if ($note) {
            $note->delete();
            return response()->json();
        }
    }

    public function updateNote(Request $request)
    {
        $note = Note::find($request->id);
        if ($note) {
            $note->title = $request->title;
            $note->content = $request->content;
            $note->save();
            return response()->json($note);
        }
    }
}
