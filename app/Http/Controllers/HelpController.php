<?php

namespace App\Http\Controllers;

use App\Models\Help;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HelpController extends Controller
{
    public function store(){


        $attributes = request()->validate([
            'title' => 'required|min:2|max:255',
            'content' => 'required|min:2|max:255',
            'location' => 'required|min:2|max:30'
        ]);

        auth()
            ->user()
            ->help()
            ->create($attributes);

        return back()->with('success', 'Saved');

    }
    public function destroy(Help $help) {

        $help->delete();

        return back()->with('success', 'Your note has been deleted');
    }


}
