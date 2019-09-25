<?php

namespace App\Http\Controllers;

use App\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index()
    {
        $notes = Note::all();
        return view('note.index', compact('notes'));
    }

    public function create()
    {
        $note = new Note();
        return view('note.create', compact('note'));
    }

    public function store()
    {
        request()->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $note = new Note();
        $note->name = request('name');
        $note->description = request('description');
        $note->save();
        
        return redirect(route('notes'));
    }
}
