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


}
